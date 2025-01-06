const observer = new MutationObserver((mutations) => {
  mutations.forEach((mutation) => {
    if (mutation.type === "childList") {
      attachEventListeners(); // Re-attach event listeners every time there is a change in #content 
    }
  });
});

observer.observe(document.getElementById('content'), { childList: true, subtree: true });

function attachEventListeners() {
  const recentArticles = document.querySelectorAll(".recent");
  recentArticles.forEach((article) => {
    $(article).off("click").on("click", (event) => {
      const id = event.currentTarget.id;
      console.log(id);
      $.ajax({
        url: "./modules/posts/reader.php",
        method: "POST",
        data: { articleId: id },
        dataType: "html",
        success: (postReaderData) => {
          $("#content").html(postReaderData);
        },
        error: () => {
          console.log("Error al cargar la publicación.");
        }
      });
    });
  });

  $(".category").off("click").on("click", (event) => {
    const cat = $(event.target).data("content");
    $.ajax({
      url: "./modules/posts/list.php",
      method: "POST",
      dataType: "html",
      data: { content: cat },
      success: (data) => {
        $("#content").html(data);
      },
      error: () => {
        console.log("Error al cargar las categorías.");
      }
    });
  });

  $(".bx-star").off("click").on("click", function () {
    const id = $("#main-post").data("post-id");
    const $star = $(this);

    if ($star.hasClass("active")) {
      $.ajax({
        url: "./modules/posts/favoriteDelete.php",
        method: "POST",
        data: { postId: id },
        success: (data) => {
          console.log(data);
          if (data === "true") {
            $star.removeClass("active");
          } else {
            const alert = "Hubo un error al intentar quitar de favoritos este post";
            $("#alertError").html(alert);
          }
        },
        error: () => {
          console.log("Error al intentar quitar de favoritos.");
        }
      });
    } else {
      $.ajax({
        url: "./modules/posts/favoriteAdd.php",
        method: "POST",
        data: { postId: id },
        success: (data) => {
          console.log(data);
          if (data === "true") {
            $star.addClass("active");
          } else {
            const alert = "Inicie sesión o regístrese para poder marcar este post como favorito";
            $("#alertError").html(alert);
          }
        },
        error: () => {
          console.log("Error al intentar agregar a favoritos.");
        }
      });
    }
  });
}
attachEventListeners(); // Call the function initially to set the event listeners
