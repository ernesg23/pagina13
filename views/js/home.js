document.addEventListener("DOMContentLoaded", () => {
    const template = document.querySelector("#article-template");
    const recentTemplate = document.querySelector("#recent-article-template");;

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
                    const category = newPost.querySelector(".category");
                    const description = newPost.querySelector(".articleDescriptionParagraph");
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
                    const recentDescription = clonedRecentTemplate.querySelector(".recent-description");
                    const recentTitle = recentDescription.querySelector("h3");
                    const recentDesc = recentDescription.querySelector("p");
                    recentTitle.textContent = data["title"];
                    recentDesc.textContent = data["subtitle"];
                    recentImg.src = data["portraitImg"].replace(/^(\.\.\/)+/, "");
                    recentPosts.push(clonedRecentTemplate);
                });

                // Add posts to the main containers
                const bigMediumContainer = document.querySelector(".bigMediumArticlesContainer");
                const smallContainer = document.querySelector("#smallArticlesContainer");
                posts.forEach((post, index) => {
                    if (index === 0 || index === 1 || index === 2) {
                        bigMediumContainer.appendChild(post);
                    } else {
                        smallContainer.appendChild(post);
                    }
                });

                // Add recent posts to the recent articles container
                const recentArticlesListContainer = document.querySelector("#recentArticlesListContainer .recent-post-list");
                recentPosts.forEach((post) => {
                    recentArticlesListContainer.appendChild(post);
                });
            },
        });
    } else {
        console.error("Uno de los templates no existe o no tiene contenido.");
    }
});

