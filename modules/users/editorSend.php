<?php
include "../../config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "../../views/img/uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $fileUploaded = !empty($_FILES["file"]["tmp_name"]);
    $uploadOk = 1;
    $target_file = "";

    if ($fileUploaded) {
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
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
            exit();
        } else {
            if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "Error al subir tu archivo.";
                exit();
            }
        }
    }

    $email = urldecode($_COOKIE['email']);

    // Verificar conexión
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Obtener la fecha actual
    $publishedDate = date("Y-m-d H:i:s");

    // Obtener ID del post y evitar inyecciones SQL
    $postId = mysqli_real_escape_string($connection, $_POST['id']);

    // Verificar existencia del post
    $queryCheckPost = $connection->prepare("SELECT idPosts FROM `posts` WHERE idPosts = ? AND Users_idUsers = (SELECT idUsers FROM `users` WHERE email = ?)");
    if ($queryCheckPost === false) {
        die("Error preparando queryCheckPost: " . $connection->error);
    }
    $queryCheckPost->bind_param("is", $postId, $email);
    $queryCheckPost->execute();
    $resultCheckPost = $queryCheckPost->get_result();

    if ($resultCheckPost->num_rows > 0) {
        // Preparar la consulta de actualización con o sin imagen
        if ($fileUploaded) {
            $queryUpdatePost = $connection->prepare("UPDATE `posts` SET `title` = ?, `subtitle` = ?, `description` = ?, `portraitImg` = ?, `created_at` = ?, `isArchived` = ? WHERE `idPosts` = ?");
            $queryUpdatePost->bind_param("ssssssi", $_POST['title'], $_POST['subtitle'], $_POST['description'], $target_file, $publishedDate, $_POST['isArchived'], $postId);
        } else {
            $queryUpdatePost = $connection->prepare("UPDATE `posts` SET `title` = ?, `subtitle` = ?, `description` = ?, `created_at` = ?, `isArchived` = ? WHERE `idPosts` = ?");
            $queryUpdatePost->bind_param("sssssi", $_POST['title'], $_POST['subtitle'], $_POST['description'], $publishedDate, $_POST['isArchived'], $postId);
        }

        if ($queryUpdatePost === false) {
            die("Error preparando queryUpdatePost: " . $connection->error);
        }
        if (!$queryUpdatePost->execute()) {
            die("Error ejecutando queryUpdatePost: " . $queryUpdatePost->error);
        }
    } else {
        echo "El post no existe.";
        exit();
    }

    // Eliminar relaciones anteriores de categorías con el post
    $queryDeletePostCategories = $connection->prepare("DELETE FROM `posts_has_categories` WHERE `Posts_idPosts` = ?");
    if ($queryDeletePostCategories === false) {
        die("Error preparando queryDeletePostCategories: " . $connection->error);
    }
    $queryDeletePostCategories->bind_param("i", $postId);
    if (!$queryDeletePostCategories->execute()) {
        die("Error ejecutando queryDeletePostCategories: " . $queryDeletePostCategories->error);
    }

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

    // Cerrar conexiones
    $queryCheckPost->close();
    $queryUpdatePost->close();
    $queryDeletePostCategories->close();
    $queryCheckCategory->close();
    $queryPostCategory->close();

    echo "Post actualizado correctamente";
}

// Cerrar la conexión
$connection->close();
?>
