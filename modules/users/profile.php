<?php
include "../posts/profileGetPosts.php";
include "../posts/profileGetFavPosts.php";
include "../users/profileGetInfo.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página13 - Mi Perfil</title>
    <link rel="shortcut icon" href="./views/img/enterprise_logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./views/js/profile.js"></script>
    <link rel="stylesheet" href="./views/css/profile.css">

</head>

<body>
    <div id="userProfCont">
        <div id="userInfCont">
            <img src="<?php
                        if ($userInfo[0]['profileImg'] == "") {
                            echo './views/img/sin perfil.png';
                        } else {
                            echo str_replace('../', '', $userInfo[0]['profileImg']);
                        }
                        ?>" loading="lazy" />
            <div id="infoDescCont">
                <h5 id="userName"><?php echo $userInfo[0]['name'] ?></h5>
                <p class="userEmail"><?php echo $userInfo[0]['email'] ?></p>
                <p class="userRol"><?php
                                    if ($userInfo[0]['role'] == "reader") {
                                        echo 'Lector';
                                    } else {
                                        echo 'Escritor';
                                    }
                                    ?></p>
                <p id="userDesc">Descripción</p>
                <p class="userDescription"><?php
                                            if ($userInfo[0]['description'] == "") {
                                                echo "Todavía no cuentas con una descripción. Ve a ajustes y escribe una";
                                            } else {
                                                echo $userInfo[0]['description'];
                                            }
                                            ?></p>
            </div>
        </div>
        <div id="posts">
            <div id="written">
                <h3>Artículos Escritos</h3>
                <div class="writtenPostContainer">
                    <?php foreach ($rows as $post): ?>
                        <div class="writtenPosts" id="<?php echo $post['idPosts']; ?>">
                            <img src="<?php echo str_replace('../../', '', $post['portraitImg']); ?>" class="imgPost" alt="Imagen del artículo">
                            <div id="titleEdit">
                                <h4 class="titlePost"><?php echo $post['title']; ?></h4>
                                <i class='bx bx-edit editArticle' id="<?php echo $post['idPosts']; ?>"></i>
                            </div>
                            <div class="postDescription">
                                <p class="categoryPost"><?php echo $post['name']; ?></p>
                                <p class="subtitlePost"><?php echo $post['subtitle']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="favoritesCont">
                <h3>Artículos Favoritos</h3>
                <div class="favoritePostContainer">
                    <?php foreach ($rows2 as $post): ?>
                        <div class="writtenPosts" id="<?php echo $post['idPosts']; ?>">
                            <img src="<?php echo str_replace('../../', '', $post['portraitImg']); ?>" class="imgPost" alt="Imagen del artículo">
                            <div id="titleEdit">
                                <h4 class="titlePost"><?php echo $post['title']; ?></h4>
                            </div>
                            <div class="postDescription">
                                <p class="categoryPost"><?php echo $post['name']; ?></p>
                                <p class="subtitlePost"><?php echo $post['subtitle']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>