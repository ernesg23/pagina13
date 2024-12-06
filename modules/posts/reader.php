<?php
include "../../config.php";
include './readerGet.php';
include './readerGetPost.php';
include './favGet.php';

// Obtener categorías asignadas al artículo actual
$query_categories = "SELECT c.name, c.idCategories 
                     FROM categories c 
                     JOIN posts_has_categories phc ON phc.Categories_idCategories = c.idCategories
                     WHERE phc.Posts_idPosts = ?";
try {
    // Establecer la conexión usando PDO
    $pdo = new PDO("mysql:host=localhost;dbname=pagina13;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Habilitar excepciones en caso de errores
} catch (PDOException $e) {
    // Manejo de errores si la conexión falla
    echo "Error de conexión: " . $e->getMessage();
    exit;
}
$stmt = $pdo->prepare($query_categories);
$stmt->execute([$rows[0]['idPosts']]);
$categories = $stmt->fetchAll();
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
    <script type="module" src="./views/js/reader.js"></script>
</head>

<body>
    <main>
        <section>
            <div id="main-post" data-post-id="<?php echo $rows[0]['idPosts']; ?>">
                <div id="categoriesReader">
                    <?php
                    // Lista de colores de categorías
                    $category_colors = [
                        'Base de Datos' => '#1abc9c',
                        'Matemáticas' => '#3498db',
                        'Organización Computacional' => '#9b59b6',
                        'Lógica Computacional' => '#e67e22',
                        'Lengua y Literatura' => '#e74c3c',
                        'Inglés Técnico' => '#34495e',
                        'Laboratorio de Algoritmos' => '#f1c40f',
                        'Proyecto Informático' => '#2ecc71',
                        'Sistemas Operativos' => '#95a5a6'
                    ];

                    // Mostrar las categorías asignadas al artículo con su color
                    foreach ($categories as $category) {
                        echo '<p class="category" style="background-color: ' . $category_colors[$category['name']] . ';" data-content="' . $category['name'] . '"></p>';
                    }
                    ?>
                </div>
                <h2 id="readerTitle"><?php echo $rows[0]['title'] ?></h2>
                <div id="reader">
                    <p id="readerSubtitle"><?php echo $rows[0]['subtitle'] ?></p>
                    <img id="readerPortrait" src="<?php echo $rows[0]['portraitImg'] = str_replace('../', '', $rows[0]['portraitImg']); ?>">
                    <div id="writFavCont">
                        <div id="author">
                            <img src="./views/img/sin perfil.png">
                            <p><?php echo $rows[0]['authorName'] ?></p>
                        </div>
                        <i class="bx bx-star <?php echo $activeClass; ?>"></i>
                    </div>
                    <div id="alertError"></div>
                    <hr>
                    <p id="descriptionReader"><?php echo $rows[0]['description'] ?></p>
                </div>
            </div>
            <div id="recentPosts">
                <h2>Artículos Recientes</h2>
                <ul id="recentArticlesListContainer" class="recent-post-list recentListReader">
                    <?php
                    // Mostrar artículos recientes con categorías
                    foreach ($rows2 as $post):
                        // Obtener las categorías de cada artículo reciente
                        $query_recent_categories = "SELECT c.name 
                                                    FROM categories c 
                                                    JOIN posts_has_categories phc ON phc.Categories_idCategories = c.idCategories 
                                                    WHERE phc.Posts_idPosts = ?";
                        $stmt_recent_categories = $pdo->prepare($query_recent_categories);
                        $stmt_recent_categories->execute([$post['idPosts']]);
                        $recent_categories = $stmt_recent_categories->fetchAll();
                    ?>
                        <li class="recent" id="<?php echo $post['idPosts']; ?>">
                            <img src="<?php echo str_replace('../../', '', $post['portraitImg']); ?>" class="img" alt="Imagen del artículo">
                            <div class="recent-description">
                                <div class="recent-text">
                                <h3><?php
                                    if (strlen($post['title']) > 25) {
                                        $post['title'] = substr($post['title'], 0, 25);
                                        $lastSpace = strrpos($post['title'], ' ');
                                        if ($lastSpace !== false) {
                                            $post['title'] = substr($post['title'], 0, $lastSpace);
                                        }
                                        echo $post['title'] . '...';
                                    } else {
                                        echo $post['title'];
                                    }
                                    ?></h3>
                                <p><?php
                                    if (strlen($post['subtitle']) > 30) {
                                        $post['subtitle'] = substr($post['subtitle'], 0, 30);
                                        $lastSpace = strrpos($post['subtitle'], ' ');
                                        if ($lastSpace !== false) {
                                            $post['subtitle'] = substr($post['subtitle'], 0, $lastSpace);
                                        }
                                        echo $post['subtitle'] . '...';
                                    } else {
                                        echo $post['subtitle'];
                                    }
                                    ?></p>
                                </div>
                                
                                <div class="category-list">
                                    <?php
                                    // Mostrar las categorías del artículo reciente con sus colores
                                    foreach ($recent_categories as $category):
                                        echo '<span class="category" style="background-color: ' . $category_colors[$category['name']] . '"></span>';
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
    </main>
</body>

</html>