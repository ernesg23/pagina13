const template = document.querySelector("#article-template");
const recentTemplate = document.querySelector("#recent-article-template");
// Colores definidos para las categorías
const categoryColors = {
  "Base de Datos": "#1abc9c",
  "Matemáticas": "#3498db",
  "Organización Computacional": "#9b59b6",
  "Lógica Computacional": "#e67e22",
  "Lengua y Literatura": "#e74c3c",
  "Inglés Técnico": "#34495e",
  "Laboratorio de Algoritmos": "#f1c40f",
  "Proyecto Informático": "#2ecc71",
  "Sistemas Operativos": "#95a5a6",
};

// Verificación de existencia de templates
if (template && template.content && recentTemplate && recentTemplate.content) {
  let posts = [];
  let recentPosts = [];

  $.ajax({
    url: "./modules/posts/homeGetPost.php",
    method: "POST",
    dataType: "json",
    success: (data) => {
      $.each(data, (index, article) => {
        // Clonar y poblar el template principal
        const clonedTemplate = template.content.cloneNode(true);
        const portraitImg = clonedTemplate.querySelector(".img");
        const descriptionContainer = clonedTemplate.querySelector(".articlesDescriptions");
        const title = descriptionContainer.querySelector("h2");
        const categoryContainer = descriptionContainer.querySelector(".category");
        const description = descriptionContainer.querySelector(".articleDescriptionParagraph");
        const articleElement = clonedTemplate.querySelector(".article");
        articleElement.id = article.idPosts;

        // Llenar datos del artículo principal
        title.textContent = article.title;
        description.textContent = article.subtitle;
        portraitImg.src = article.portraitImg.replace(/^(\.\.\/)+/, "");

        // Manejar categorías en los artículos principales (nombre y color visibles)


        // Definir tamaño del artículo
        if (index === 0) {
          articleElement.classList.add("big");
        } else if (index === 1 || index === 2) {
          articleElement.classList.add("medium");
        } else {
          articleElement.classList.add("small");
        }

        // Manejar categorías en los artículos principales (solo color, sin nombre)
        const categories = article.categoryNames.split(",");
        categories.forEach((categoryName) => {
          const categorySpan = document.createElement("span");
          categorySpan.style.backgroundColor = categoryColors[categoryName] || "#cccccc";
          categorySpan.style.width = "15px"; // Ajustar ancho
          categorySpan.style.height = "15px"; // Ajustar alto
          categorySpan.style.borderRadius = "50%"; // Convertir en círculo
          categorySpan.style.display = "inline-block"; // Asegurar que se muestre como bloque en línea
          categorySpan.style.margin = "0 5px"; // Espaciado entre los colores
          categoryContainer.appendChild(categorySpan); // Añadir al contenedor de categorías
        });

        // Añadir evento de clic al artículo principal
        articleElement.addEventListener("click", function () {
          const id = this.id;
          $.ajax({
            url: "./modules/posts/reader.php",
            method: "POST",
            data: { articleId: id },
            dataType: "html",
            success: (postReaderData) => {
              $("#content").html(postReaderData);
            },
          });
        });

        posts.push(clonedTemplate);

        // Clonar y poblar el template de artículos recientes
        const clonedRecentTemplate = recentTemplate.content.cloneNode(true);
        const recentImg = clonedRecentTemplate.querySelector(".img.recent");
        const recentDescription = clonedRecentTemplate.querySelector(".recent-description");
        const recentCategoryContainer = clonedRecentTemplate.querySelector(".recent-categories"); // Contenedor de categorías recientes
        const recentArticleElement = clonedRecentTemplate.querySelector(".recent-article");
        recentArticleElement.id = article.idPosts;

        // Llenar datos del artículo reciente
        recentDescription.querySelector("h3").textContent = article.title;
        recentDescription.querySelector("p").textContent = article.subtitle;
        recentImg.src = article.portraitImg.replace(/^(\.\.\/)+/, "");

        // Manejar categorías en los artículos recientes (solo color, sin texto)
        categories.forEach((categoryName) => {
          const categorySpan = document.createElement("span");
          categorySpan.style.backgroundColor = categoryColors[categoryName] || "#cccccc";
          categorySpan.style.width = "15px"; // Ajustar ancho
          categorySpan.style.height = "15px"; // Ajustar alto
          categorySpan.style.borderRadius = "50%"; // Convertir en círculo
          categorySpan.style.display = "inline-block"; // Asegurar que se muestre como bloque en línea
          categorySpan.style.margin = "0 5px"; // Espaciado entre los colores
          recentCategoryContainer.appendChild(categorySpan);
        });

        // Añadir evento de clic al artículo reciente
        recentArticleElement.addEventListener("click", function () {
          const id = this.id;
          $.ajax({
            url: "./modules/posts/reader.php",
            method: "POST",
            data: { articleId: id },
            dataType: "html",
            success: (postReaderData) => {
              $("#content").html(postReaderData);
            },
          });
        });

        recentPosts.push(clonedRecentTemplate);
      });

      // Agregar artículos principales a los contenedores
      const bigMediumContainer = document.querySelector(".bigMediumArticlesContainer");
      const smallContainer = document.querySelector("#smallArticlesContainer");
      posts.forEach((post, index) => {
        if (index === 0 || index === 1 || index === 2) {
          bigMediumContainer.appendChild(post);
        } else {
          smallContainer.appendChild(post);
        }
      });

      // Agregar artículos recientes al contenedor
      const recentArticlesListContainer = document.querySelector("#recentArticlesListContainer .recent-post-list");
      recentPosts.forEach((post) => {
        recentArticlesListContainer.appendChild(post);
      });
    },
    error: (err) => console.error("Error al obtener los artículos:", err),
  });
} else {
  console.error("Uno de los templates no existe o no tiene contenido.");
}