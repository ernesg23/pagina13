const recentTemplate = document.querySelector("#recent-article-template");
let recentPosts = [];

$.ajax({
    url: "./modules/posts/homeGetPost.php",
    method: "POST",
    dataType: "json",
    success: (dato) => {
        $.each(dato, (index, data) => {
            const clonedRecentTemplate = recentTemplate.content.cloneNode(true);
            const recentImg = clonedRecentTemplate.querySelector(".img");
            const recentDescription = clonedRecentTemplate.querySelector(".recent-description");
            const recentId = data["idPosts"];
            const recentTitle = recentDescription.querySelector("h3");
            const recentDesc = recentDescription.querySelector("p");

            const recentArticle = clonedRecentTemplate.querySelector(".recent");
            recentArticle.id = recentId;
            recentTitle.textContent = data["title"];
            recentDesc.textContent = data["subtitle"];
            recentImg.src = data["portraitImg"].replace(/^(\.\.\/)+/, "");

            recentArticle.addEventListener("click", function () {
                const id = this.id;
                console.log(id);

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
    },
});
