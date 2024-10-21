<?php
include "../posts/profileGetPosts.php";
include '../posts/configPostGetPost.php';
?>

<head>
    <link rel="stylesheet" href="./views/css/configPosts.css">
    <title>Pagina13 - Mis articulos</title>

</head>
<div class="buttonsCont">
    <button id="users-configSettings" class="buttons">Ajustes</button>
    <button id="users-configPosts" class="buttons">Mis Artículos</button>
</div>
<div id="contAllConfigPosts">
    <div id="title">
        <h4>Mis Artículos</h4>
    </div>
    <h5 id="previewPost">Vista Previa</h5>
    <div id="contPosts">
        <div id="previewPostsCont">
            <div id="contPostW">
                <div class="writtenPosts" id="<?php echo $rows[0]['idPosts']; ?>">
                    <img src="<?php echo str_replace('../../', '', $rows[0]['portraitImg']); ?>" class="imgPost" alt="Imagen del artículo">
                    <div id="titleEdit">
                        <h4 class="titlePost"><?php echo $rows[0]['title']; ?></h4>
                    </div>
                    <div class="postDescription">
                        <p class="categoryPost"><?php echo $rows[0]['name']; ?></p>
                        <p class="subtitlePost"><?php echo $rows[0]['subtitle']; ?></p>
                    </div>
                </div>
            </div>
            <div id="postButtons">
                <button id="editPostBtn" class="postBtn">Editar</button>
                <button id="deletePostBtn" class="postBtn">Eliminar</button>
            </div>
        </div>
        <ul id="writtenPostsList">
            <?php foreach ($rows2 as $post): ?>
                <li class="written" id="<?php echo $post['idPosts']; ?>">
                    <img src="<?php echo str_replace('../../', '', $post['portraitImg']); ?>" class="imgWritten" alt="Imagen del artículo">
                    <div class="written-description">
                        <h3><?php echo $post['title']; ?></h3>
                        <p><?php echo $post['subtitle']; ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>




















































































<script>
    $(".written").click(function() {
    const postView = document.querySelector("#contPostW");
        $.ajax({
        method: "post",
        url: "./modules/posts/configPGCP.php",        
        dataType: "json",
        data: {id:$(this).attr("id")},
        success: (data) => {
          console.log(data);
          let written = `<div class="writtenPosts" id="` + data[0]["idPosts"] + `">
            <img src="` + data[0]['portraitImg'].replace('../../', './').replace('%20', ' ') + `" class="imgPost" alt="Imagen del artículo">
            <div id="titleEdit">
              <h4 class="titlePost">` + data[0]["title"] + `</h4>
            </div>
            <div class="postDescription">
              <p class="categoryPost">` + data[0]["name"] + `</p>
              <p class="subtitlePost">` + data[0]["description"] + `</p>
            </div>
          </div>`;
          $(postView).html(written);
        }
      });
    });

</script>