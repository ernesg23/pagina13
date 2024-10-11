const observer = new MutationObserver(() => {
  const recentArticles = document.querySelectorAll(".recent");
  recentArticles.forEach((article) => {
    $(article)
      .off("click")
      .on("click", (event) => {
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
});
// observer reacts to the change of #content content
observer.observe(document.querySelector("#content"), {
  childList: true,
  subtree: true,
});
// repeating the code again
const recentArticles = document.querySelectorAll(".recent");
recentArticles.forEach((article) => {
  $(article).click((event) => {
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
$(".category").click((event) => {
  const cat = $(event.target).data("content");
  $.ajax({
    url: "./modules/posts/list.php",
    method: "post",
    dataType: "html",
    data: { content: cat },
    success: (data) => {
      $("#content").html(data);
    },
  });
});
$(".bx-star").click(() => {
  const id = $("#main-post").data("postId");
  
  $.ajax({
    url: "./modules/posts/favoriteAdd.php",
    method: "post",
    data: { postId: id },
    success: (data) => {
      $(".bx-star").addClass("active");
    },
  });
});
