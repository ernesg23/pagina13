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
    // $check = getimagesize($_FILES["file"]["tmp_name"]);
    // if ($check !== false) {
    //     $uploadOk = 1;
    // } else {
    //     echo "El archivo no es una imagen.";
    //     $uploadOk = 0;
    // }

    // Verify if the file does exist
    // if (file_exists($target_file)) {
    //     echo "Lo siento, el archivo ya existe.";
    //     $uploadOk = 0;
    // }

    // Verify file size
    if ($_FILES["file"]["size"] > 10500000) {
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
            echo "Lo siento, hubo un error al subir tu archivo.";
        }
    }
}
echo print_r($_POST);
$email = urldecode($_COOKIE['email']);
// Query that creates the post, has a sub query that calls the id from the user that made the post 
$queryCreatePost = "INSERT INTO `posts`(`title`, `subtitle`, `description`, `portraitImg`, `created_at`, `Users_idUsers`, `isArchived`) 
VALUES ('" . $_POST['title'] . "', '" . $_POST['subtitle'] . "', '" . $_POST['description'] . "', '" . $target_file . "', '" . $_POST['publishedDate'] . "', 
(SELECT idUsers FROM `users` WHERE email = '" . $email . "'), '". $_POST['isArchived'] ."')";

// If that creates the category if it does not exist
$category = mysqli_real_escape_string($connection, $_POST['categories']);
$queryCheckCategory = "SELECT * FROM CATEGORIES WHERE NAME = '$category'";

if (mysqli_num_rows(mysqli_query($connection, $queryCheckCategory)) == 0) {
    $queryInsertCategory = "INSERT INTO CATEGORIES(name) VALUES ('$category')";
    mysqli_query($connection, $queryInsertCategory);
}

// Query that makes a relation between a post and a category
$queryPostCategory = "INSERT INTO `posts_has_categories`(`Posts_idPosts`, `Categories_idCategories`) 
VALUES (
    (SELECT idPosts FROM posts WHERE title = '" . $_POST['title'] . "'),
    (SELECT idCategories FROM categories WHERE name = '" . $_POST['categories'] . "')
)";
$r1 = mysqli_query($connection, $queryCreatePost);
$r2 = mysqli_query($connection, $queryPostCategory);