<?php
include "../../config.php";
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
// Recibir las categorías seleccionadas
$categories = $_POST['categories'];

// Insertar el post
$queryCreatePost = $connection->prepare("INSERT INTO `posts`(`title`, `subtitle`, `description`, `portraitImg`, `created_at`, `Users_idUsers`, `isArchived`) 
VALUES (?, ?, ?, ?, ?, (SELECT idUsers FROM `users` WHERE email = ?), ?)");
$queryCreatePost->bind_param("ssssssi", $_POST['title'], $_POST['subtitle'], $_POST['description'], $target_file, $publishedDate, $email, $_POST['isArchived']);
$queryCreatePost->execute();
$postId = $connection->insert_id;

// Insertar categorías y hacer la relación con el post
foreach ($categories as $category) {
    // Verificar si la categoría existe
    $queryCheckCategory = $connection->prepare("SELECT idCategories FROM categories WHERE name = ?");
    $queryCheckCategory->bind_param("s", $category);
    $queryCheckCategory->execute();
    $resultCheckCategory = $queryCheckCategory->get_result();

    $categoryId = null;
    if ($resultCheckCategory->num_rows == 0) {
        // Si no existe, insertamos la categoría
        $queryInsertCategory = $connection->prepare("INSERT INTO categories(name) VALUES (?)");
        $queryInsertCategory->bind_param("s", $category);
        $queryInsertCategory->execute();
        $categoryId = $connection->insert_id;
    } else {
        // Si existe, obtenemos el id
        $row = $resultCheckCategory->fetch_assoc();
        $categoryId = $row['idCategories'];
    }

    // Relacionar post con categoría
    $queryPostCategory = $connection->prepare("INSERT INTO `posts_has_categories`(`Posts_idPosts`, `Categories_idCategories`) VALUES (?, ?)");
    $queryPostCategory->bind_param("ii", $postId, $categoryId);
    $queryPostCategory->execute();
}