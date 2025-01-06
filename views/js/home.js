const template = document.querySelector("#article-template");
const recentTemplate = document.querySelector("#recent-article-template");

if (template && template.content && recentTemplate && recentTemplate.content) {
  let posts = [];
  let recentPosts = [];

  // Petición para obtener los artículos principales
  $.ajax({
    url: "./modules/posts/homeGetPost.php",
    method: "POST",
    dataType: "json",
    success: (dato) => {
      $.each(dato, (index, data) => {
        // Clonar y poblar el template principal
        const clonedTemplate = template.content.cloneNode(true);
        const portraitImg = clonedTemplate.querySelector(".img");
        const newPost = clonedTemplate.querySelector(".articlesDescriptions");
        const title = newPost.querySelector("h2");
        const id = data["idPosts"];
        const category = newPost.querySelector(".category");
        const description = newPost.querySelector(".articleDescriptionParagraph");
        clonedTemplate.querySelector(".article").id = id;
        title.textContent = data["title"];
        category.textContent = data["categoryNames"];
        description.textContent = data["subtitle"];
        portraitImg.src = data["portraitImg"].replace(/^(\.\.\/)+/, "");

        // Agregar clases por tamaño
        if (index === 0) {
          clonedTemplate.querySelector(".article").classList.add("big");
        } else if (index === 1 || index === 2) {
          clonedTemplate.querySelector(".article").classList.add("medium");
        } else {
          clonedTemplate.querySelector(".article").classList.add("small");
        }
        posts.push(clonedTemplate);

        // Llamar a reader.php en artículos principales
        const clickedArticle = clonedTemplate.querySelector(".article");
        clickedArticle.addEventListener("click", function () {
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
    },
    error: (err) => console.error("Error al obtener los artículos:", err),
  });

  // Petición para obtener los artículos recientes
  $.ajax({
    url: "./modules/users/layoutRecent.php",
    method: "POST",
    dataType: "json",
    success: (dato) => {
      $.each(dato, (index, data) => {
        // Clonar y poblar el template de artículos recientes
        const clonedRecentTemplate = recentTemplate.content.cloneNode(true);
        const recentImg = clonedRecentTemplate.querySelector("img");
        const recentDescription = clonedRecentTemplate.querySelector(".recent-description");
        const recentId = data["idPosts"];
        const recentTitle = recentDescription.querySelector("h3");
        const recentDesc = recentDescription.querySelector("p");
        clonedRecentTemplate.querySelector(".recent-article").id = recentId;
        recentTitle.textContent = data["title"];
        recentDesc.textContent = data["subtitle"];
        recentImg.src = data["portraitImg"].replace(/^(\.\.\/)+/, "");
        recentPosts.push(clonedRecentTemplate);

        // Llamar a reader.php en artículos recientes
        const clickedRecentArticle = clonedRecentTemplate.querySelector(".recent-article");
        clickedRecentArticle.addEventListener("click", function () {
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
      });

      // Agregar artículos recientes al contenedor
      const recentArticlesListContainer = document.querySelector("#recentArticlesListContainer .recent-post-list");
      recentPosts.forEach((post) => {
        recentArticlesListContainer.appendChild(post);
      });
    },
    error: (err) => console.error("Error al obtener los artículos recientes:", err),
  });
} else {
  console.error("Uno de los templates no existe o no tiene contenido.");
}
