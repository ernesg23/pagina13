<?php
include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "../../views/img/uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // verify if it is really an image
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }

    // Verify if the file does exist
    // if (file_exists($target_file)) {
    //     echo "Lo siento, el archivo ya existe.";
    //     $uploadOk = 0;
    // }

    // Verify file size
    if ($_FILES["file"]["size"] > 17000000) {
        echo "Archivo muy pesado";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "No se pudo subir el archivo";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            //echo $target_file;
            // echo "El archivo ". htmlspecialchars(basename($_FILES["file"]["name"])) . " ha sido subido.";
        } else {
            echo "Error al subir tu archivo.";
        }
    }
}
echo print_r($_POST);
$email = urldecode($_COOKIE['email']);
// Verify connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
// get actual date in format Y-m-d H:i:s
$publishedDate = date("Y-m-d H:i:s");

// Insert post evading SQL injections with prepare
$queryCreatePost = $connection->prepare("INSERT INTO `posts`(`title`, `subtitle`, `description`, `portraitImg`, `created_at`, `Users_idUsers`, `isArchived`) 
VALUES (?, ?, ?, ?, ?, (SELECT idUsers FROM `users` WHERE email = ?), ?)");
if ($queryCreatePost === false) {
    die("Error preparing queryCreatePost: " . $connection->error);
}
$queryCreatePost->bind_param("ssssssi", $_POST['title'], $_POST['subtitle'], $_POST['description'], $target_file, $publishedDate, $email, $_POST['isArchived']);
if (!$queryCreatePost->execute()) {
    die("Error executing queryCreatePost: " . $queryCreatePost->error);
}
// Get post id
$postId = $connection->insert_id;
// Evade SQL injections
$category = mysqli_real_escape_string($connection, $_POST['categories']);
// Verify the existence of the category
$queryCheckCategory = $connection->prepare("SELECT idCategories FROM categories WHERE name = ?");
if ($queryCheckCategory === false) {
    die("Error preparing queryCheckCategory: " . $connection->error);
}
$queryCheckCategory->bind_param("s", $category);
if (!$queryCheckCategory->execute()) {
    die("Error executing queryCheckCategory: " . $queryCheckCategory->error);
}
$resultCheckCategory = $queryCheckCategory->get_result();
$categoryId = null;
if ($resultCheckCategory->num_rows == 0) {
    // Insert a new cat if it does not exist
    $queryInsertCategory = $connection->prepare("INSERT INTO categories(name) VALUES (?)");
    if ($queryInsertCategory === false) {
        die("Error preparing queryInsertCategory: " . $connection->error);
    }
    $queryInsertCategory->bind_param("s", $category);
    if (!$queryInsertCategory->execute()) {
        die("Error executing queryInsertCategory: " . $queryInsertCategory->error);
    }
    // get new id
    $categoryId = $connection->insert_id;
} else {
    // get id if cat exist
    $row = $resultCheckCategory->fetch_assoc();
    $categoryId = $row['idCategories'];
}

// Make a relation between posts and cat
$queryPostCategory = $connection->prepare("INSERT INTO `posts_has_categories`(`Posts_idPosts`, `Categories_idCategories`) VALUES (?, ?)");
if ($queryPostCategory === false) {
    die("Error preparing queryPostCategory: " . $connection->error);
}
$queryPostCategory->bind_param("ii", $postId, $categoryId);
if (!$queryPostCategory->execute()) {
    die("Error executing queryPostCategory: " . $queryPostCategory->error);
}
// close queries
$queryCreatePost->close();
$queryCheckCategory->close();
$queryInsertCategory->close();
$queryPostCategory->close();

// Close connection
$connection->close();