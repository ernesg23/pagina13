const clickedRecentArticle =
  document.querySelector(".recent-article-search");
clickedRecentArticle.addEventListener("click", function () {
  const id = this.id;
  $.ajax({
    url: "./modules/posts/reader.php",
    method: "post",
    data: { articleId: id },
    dataType: "html",
    success: (postReaderData) => {
      $("#content").html(postReaderData);
    },
  });
});
// call reader.php in posts
const clickedArticle = document.querySelector(".articleSearch");
clickedArticle.addEventListener("click", function () {
  const id = this.id;
  $.ajax({
    url: "./modules/posts/reader.php",
    method: "post",
    data: { articleId: id },
    dataType: "html",
    success: (postReaderData) => {
      $("#content").html(postReaderData);
    },
  });
});
