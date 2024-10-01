<?php
include '../users/connection.php';
// $query = "SELECT p.idPosts, p.Users_idUsers, p.title, p.subtitle, p.description, p.portraitImg, p.isArchived, p.created_at, pc.Categories_idCategories, c.idCategories, c.name, (SET @authorName = u.name)
//           FROM posts p
//           INNER JOIN posts_has_categories pc ON p.idPosts = pc.Categories_idCategories
//           inner join categories c on pc.Categories_idCategories = c.idCategories
//           inner join users u on p.Users_idUsers = u.idUsers
//           WHERE p.isArchived = 0 and p.idPosts = '". $_POST['articleId']."'
//           ORDER BY p.idPosts DESC";
$query = "SELECT p.idPosts, p.Users_idUsers, p.title, p.subtitle, p.description, p.portraitImg, p.isArchived, p.created_at, 
       pc.Categories_idCategories, c.idCategories, c.name, u.name AS authorName
FROM posts p
INNER JOIN posts_has_categories pc ON p.idPosts = pc.Posts_idPosts
INNER JOIN categories c ON pc.Categories_idCategories = c.idCategories
INNER JOIN users u ON p.Users_idUsers = u.idUsers
WHERE p.isArchived = 0 AND p.idPosts = '" . $_POST['articleId'] . "'
ORDER BY p.idPosts DESC";
// $query = "SELECT * from posts where idPosts = '". $_POST['articleId']."';";
$r = mysqli_query($connection, $query);
if (!$r) {
    die('Error en la consulta: ' . mysqli_error($connection));
}
$rows = [];
while ($response = mysqli_fetch_assoc($r)) {
    $rows[] = $response;
}
// echo json_encode($rows);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página13 - Artículo</title>
    <link rel="shortcut icon" href="./views/img/enterprise_logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./views/css/reader.css">
</head>

<body>
    <main>
        <section>
            <div id="main-post">
                <div id="categoriesReader">
                    <p id="category1" class="category" style="background-color: rgb(244, 164, 49);"><?php echo $rows[0]['name'] ?></p>
                    <p id="category2" class="category" style="background-color: rgb(14, 46, 89);"><?php echo $rows[0]['name'] ?></p>
                </div>
                <h2 id="readerTitle"><?php echo $rows[0]['title'] ?></h2>
                <div id="reader">
                    <p id="readerSubtitle"><?php echo $rows[0]['subtitle'] ?></p>
                    <img id="readerPortrait" src="<?php echo $rows[0]['portraitImg'] = str_replace('../', '', $rows[0]['portraitImg']); ?>">
                    <div id="author">
                        <img src="./views/img/sin perfil.png">
                        <p><?php echo $rows[0]['authorName'] ?></p>
                    </div>
                    <hr>
                    <p id="descriptionReader"><?php echo $rows[0]['description'] ?></p>
                </div>
            </div>
            <div id="recentPosts">
                <h2>Artículos Recientes</h2>
                <div class="recent">
                    <img src="<?php echo $rows[0]['portraitImg'] = str_replace('../', '', $rows[0]['portraitImg']); ?>" alt="Imagen del artículo 1">
                    <div>
                        <h3><?php echo $rows[0]['title'] ?></h3>
                        <p><?php echo $rows[0]['subtitle'] ?></p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>