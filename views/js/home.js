const template = document.querySelector("#article-template");
const recentTemplate = document.querySelector("#recent-article-template");

if (template && template.content && recentTemplate && recentTemplate.content) {
  let posts = [];
  let recentPosts = [];
  $.ajax({
    url: "./modules/posts/homeGetPost.php",
    method: "POST",
    dataType: "json",
    success: (dato) => {
      $.each(dato, (index, data) => {
        // Cloning and populating the main template
        const clonedTemplate = template.content.cloneNode(true);
        const portraitImg = clonedTemplate.querySelector(".img");
        const newPost = clonedTemplate.querySelector(".articlesDescriptions");
        const title = newPost.querySelector("h2");
        const id = data["idPosts"];
        const category = newPost.querySelector(".category");
        const description = newPost.querySelector(
          ".articleDescriptionParagraph"
        );
        clonedTemplate.querySelector(".article").id = id;
        title.textContent = data["title"];
        category.textContent = data["name"];
        description.textContent = data["subtitle"];
        portraitImg.src = data["portraitImg"].replace(/^(\.\.\/)+/, "");

        // Add classes by size
        if (index === 0) {
          clonedTemplate.querySelector(".article").classList.add("big");
        } else if (index === 1 || index === 2) {
          clonedTemplate.querySelector(".article").classList.add("medium");
        } else {
          clonedTemplate.querySelector(".article").classList.add("small");
        }
        posts.push(clonedTemplate);

        // Cloning and populating the recent articles template
        const clonedRecentTemplate = recentTemplate.content.cloneNode(true);
        const recentImg = clonedRecentTemplate.querySelector(".img.recent");
        const recentDescription = clonedRecentTemplate.querySelector(
          ".recent-description"
        );
        const recentId = data["idPosts"];
        const recentTitle = recentDescription.querySelector("h3");
        const recentDesc = recentDescription.querySelector("p");
        clonedRecentTemplate.querySelector(".recent-article").id = recentId;
        recentTitle.textContent = data["title"];
        recentDesc.textContent = data["subtitle"];
        recentImg.src = data["portraitImg"].replace(/^(\.\.\/)+/, "");
        recentPosts.push(clonedRecentTemplate);
        // call reader.php in recents
        const clickedRecentArticle =
          clonedRecentTemplate.querySelector(".recent-article");
        clickedRecentArticle.addEventListener("click", function () {
          const id = this.id;
          console.log(id);
          $.ajax({
            url: "./modules/posts/readerGet.php",
            method: "post",
            data: { articleId: id },
            dataType: "json",
            success: (postReaderData) => {
              console.log(postReaderData);
              const dataToUse = postReaderData[0];
              let ui = `
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página13 - Artículo</title>
    <link rel="shortcut icon" href="./views/img/enterprise_logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./views/css/reader.css">
</head>
<body>
    <div id='containerAllReaderRecent'>
        <div id='containerAllReader'>
        <div id='readerRelatedContent'>
            <div id="categoriesReader">
                <!-- <p id="category1" class="category" style="background-color: rgb(244, 164, 49);">Categoría</p> -->
                <p id="category2" class="category" style="background-color: rgb(14, 46, 89);">${
                  dataToUse["name"]
                }</p>
            </div>
            <h2 id="readerTitle">${dataToUse["title"]}</h2>
            <div id="reader">
                <p id="readerSubtitle">${dataToUse["subtitle"]}</p>
                <img id="readerPortrait" src="${dataToUse[
                  "portraitImg"
                ].replace(/^(\.\.\/)+/, "")}">
                <div id="author">
                    <img src="./views/img/sin perfil.png" alt="Author Image">
                    <p>${dataToUse["authorName"]}</p>
                </div>
                <hr>
                <p id="descriptionReader">${dataToUse["description"]}</p>
            </div>
            </div>
            <div id="recentArticlesListContainerReader">
  <ul class="recent-post-list">
    <h4>Artículos recientes</h4>
  </ul>
</div>
        </div>
    </div>
</body>
`;
              $("#content").html(ui);
              console.log(recentPosts);
            //   const recentPostsReader = document.querySelector(
            //     "#recentArticlesListContainerReader .recent-post-list"
            //   );

            //   recentPosts.forEach((post) => {
            //     recentPostsReader.appendChild(post);
            //     console.log(post);
            //   });
            },
          });
        });
        // call reader.php in posts
        const clickedArticle = clonedTemplate.querySelector(".article");
        clickedArticle.addEventListener("click", function () {
          const id = this.id;
          console.log(id);
          $.ajax({
            url: "./modules/posts/readerGet.php",
            method: "post",
            data: { articleId: id },
            dataType: "json",
            success: (postReaderData) => {
              console.log(postReaderData);
              const dataToUse = postReaderData[0];
              let ui = `
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página13 - Artículo</title>
    <link rel="shortcut icon" href="./views/img/enterprise_logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./views/css/reader.css">
</head>
<body>
    <div id='containerAllReaderRecent'>
        <div id='containerAllReader'>
        <div id='readerRelatedContent'>
            <div id="categoriesReader">
                <!-- <p id="category1" class="category" style="background-color: rgb(244, 164, 49);">Categoría</p> -->
                <p id="category2" class="category" style="background-color: rgb(14, 46, 89);">${
                  dataToUse["name"]
                }</p>
            </div>
            <h2 id="readerTitle">${dataToUse["title"]}</h2>
            <div id="reader">
                <p id="readerSubtitle">${dataToUse["subtitle"]}</p>
                <img id="readerPortrait" src="${dataToUse[
                  "portraitImg"
                ].replace(/^(\.\.\/)+/, "")}">
                <div id="author">
                    <img src="./views/img/sin perfil.png" alt="Author Image">
                    <p>${dataToUse["authorName"]}</p>
                </div>
                <hr>
                <p id="descriptionReader">${dataToUse["description"]}</p>
            </div>
            </div>
            <div id="recentArticlesListContainerReader">
  <ul class="recent-post-list">
    <h4>Artículos recientes</h4>
  </ul>
</div>
        </div>
    </div>
</body>
`;
              $("#content").html(ui);
              console.log(recentPosts);
            //   const recentPostsReader = document.querySelector(
            //     "#recentArticlesListContainerReader .recent-post-list"
            //   );

            //   recentPosts.forEach((post) => {
            //     recentPostsReader.appendChild(post);
            //     console.log(post);
            //   });
            },
          });
        });
      });

      // Add posts to the main containers
      const bigMediumContainer = document.querySelector(
        ".bigMediumArticlesContainer"
      );
      const smallContainer = document.querySelector("#smallArticlesContainer");
      posts.forEach((post, index) => {
        if (index === 0 || index === 1 || index === 2) {
          bigMediumContainer.appendChild(post);
        } else {
          smallContainer.appendChild(post);
        }
      });

      // Add recent posts to the recent articles container
      const recentArticlesListContainer = document.querySelector(
        "#recentArticlesListContainer .recent-post-list"
      );
      recentPosts.forEach((post) => {
        recentArticlesListContainer.appendChild(post);
      });
    },
  });
} else {
  console.error("Uno de los templates no existe o no tiene contenido.");
}
