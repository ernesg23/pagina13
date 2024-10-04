function articleClick() {
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
}

const clickedRecentArticle = document.querySelectorAll(".recent-article-search");
const clickedArticles = document.querySelectorAll(".articleSearch");
$.each(clickedArticles, (index, article) => {
    article.addEventListener("click", articleClick);
})
$.each(clickedRecentArticle, (index, article) => {
    article.addEventListener("click", articleClick);
})
