const observer = new MutationObserver((mutations) => {
  mutations.forEach((mutation) => {
    if (mutation.type === "childList") {
      attachEventListeners(); // Re-attach event listeners every time there is a change in #content
    }
  });
});

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
    });
  });

  $(".bx-star").off("click").on("click", () => {
    const id = $("#main-post").data("postId");
    $.ajax({
      url: "./modules/posts/favoriteAdd.php",
      method: "POST",
      data: { postId: id },
      success: (data) => {
        $(".bx-star").addClass("active");
      },
    });
  });
}

// Observe changes of #content
observer.observe(document.querySelector("#content"), {
  childList: true,
  subtree: true,
});

// Initialize event-listeners
attachEventListeners();
