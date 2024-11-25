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
    
    // Verificar si es realmente una imagen
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }

    // Verificar el tamaño del archivo
    if ($_FILES["file"]["size"] > 17000000) {
        echo "Archivo muy pesado";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "No se pudo subir el archivo";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            // Éxito al subir el archivo
        } else {
            echo "Error al subir tu archivo.";
        }
    }

    echo print_r($_POST);
    $email = urldecode($_COOKIE['email']);
    
    // Verificar conexión
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    
    // Obtener la fecha actual
    $publishedDate = date("Y-m-d H:i:s");

    // Insertar post evitando inyecciones SQL con prepare
    $queryCreatePost = $connection->prepare("INSERT INTO `posts`(`title`, `subtitle`, `description`, `portraitImg`, `created_at`, `Users_idUsers`, `isArchived`) 
    VALUES (?, ?, ?, ?, ?, (SELECT idUsers FROM `users` WHERE email = ?), ?)");
    if ($queryCreatePost === false) {
        die("Error preparando queryCreatePost: " . $connection->error);
    }
    $queryCreatePost->bind_param("ssssssi", $_POST['title'], $_POST['subtitle'], $_POST['description'], $target_file, $publishedDate, $email, $_POST['isArchived']);
    if (!$queryCreatePost->execute()) {
        die("Error ejecutando queryCreatePost: " . $queryCreatePost->error);
    }
    $postId = $connection->insert_id;

    // Recibir las categorías seleccionadas
    $categories = $_POST['categories'];

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
}