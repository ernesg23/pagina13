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

    // Verify image
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }

    // Verify size
    if ($_FILES["file"]["size"] > 17000000) {
        echo "Archivo muy pesado";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "No se pudo subir el archivo";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            // echo "El archivo " . htmlspecialchars(basename($_FILES["file"]["name"])) . " ha sido subido.";
        } else {
            echo "Error al subir tu archivo.";
        }
    }

    $email = urldecode($_COOKIE['email']);

    // verify connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // get date
    $publishedDate = date("Y-m-d H:i:s");

    // get idPost and evade sql injection
    $postId = mysqli_real_escape_string($connection, $_POST['id']);

    // verify post existence
    $queryCheckPost = $connection->prepare("SELECT idPosts FROM `posts` WHERE idPosts = ? AND Users_idUsers = (SELECT idUsers FROM `users` WHERE email = ?)");
    if ($queryCheckPost === false) {
        die("Error preparing queryCheckPost: " . $connection->error);
    }
    $queryCheckPost->bind_param("is", $postId, $email);
    $queryCheckPost->execute();
    $resultCheckPost = $queryCheckPost->get_result();

    if ($resultCheckPost->num_rows > 0) {
        // Yes, then update
        $queryUpdatePost = $connection->prepare("UPDATE `posts` SET `title` = ?, `subtitle` = ?, `description` = ?, `portraitImg` = ?, `created_at` = ?, `isArchived` = ? WHERE `idPosts` = ?");
        if ($queryUpdatePost === false) {
            die("Error preparing queryUpdatePost: " . $connection->error);
        }
        $queryUpdatePost->bind_param("ssssssi", $_POST['title'], $_POST['subtitle'], $_POST['description'], $target_file, $publishedDate, $_POST['isArchived'], $postId);
        if (!$queryUpdatePost->execute()) {
            die("Error executing queryUpdatePost: " . $queryUpdatePost->error);
        }
    } else {
        echo "El post no existe.";
        exit();
    }

    // Verify if category exists
    $category = mysqli_real_escape_string($connection, $_POST['categories']);
    $queryCheckCategory = $connection->prepare("SELECT idCategories FROM categories WHERE name = ?");
    if ($queryCheckCategory === false) {
        die("Error preparing queryCheckCategory: " . $connection->error);
    }
    $queryCheckCategory->bind_param("s", $category);
    $queryCheckCategory->execute();
    $resultCheckCategory = $queryCheckCategory->get_result();
    $categoryId = null;

    if ($resultCheckCategory->num_rows > 0) {
        $row = $resultCheckCategory->fetch_assoc();
        $categoryId = $row['idCategories'];

        // create a relation
        $queryPostCategory = $connection->prepare("SELECT COUNT(*) as count FROM `posts_has_categories` WHERE `Posts_idPosts` = ? AND `Categories_idCategories` = ?");
        if ($queryPostCategory === false) {
            die("Error preparing queryPostCategory: " . $connection->error);
        }
        $queryPostCategory->bind_param("ii", $postId, $categoryId);
        $queryPostCategory->execute();
        $resultPostCategory = $queryPostCategory->get_result();
        $rowPostCategory = $resultPostCategory->fetch_assoc();
        
        if ($rowPostCategory['count'] == 0) {
            $queryInsertPostCategory = $connection->prepare("INSERT INTO `posts_has_categories`(`Posts_idPosts`, `Categories_idCategories`) VALUES (?, ?)");
            if ($queryInsertPostCategory === false) {
                die("Error preparing queryInsertPostCategory: " . $connection->error);
            }
            $queryInsertPostCategory->bind_param("ii", $postId, $categoryId);
            if (!$queryInsertPostCategory->execute()) {
                die("Error executing queryInsertPostCategory: " . $queryInsertPostCategory->error);
            }
            $queryInsertPostCategory->close();
        }
        
    } else {
        echo "La categoría no existe.";
        exit();
    }

    // close queries
    $queryCheckPost->close();
    $queryUpdatePost->close();
    $queryCheckCategory->close();
    $queryPostCategory->close();
}

// close connection
$connection->close();
