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
