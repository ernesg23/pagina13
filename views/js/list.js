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

function attachArticleClickListeners() {
  const clickedRecentArticle = document.querySelectorAll(".recent-article-search");
  const clickedArticles = document.querySelectorAll(".articleSearch");
  
  $.each(clickedArticles, (index, article) => {
    $(article).off("click", articleClick).on("click", articleClick);
  });
  $.each(clickedRecentArticle, (index, article) => {
    $(article).off("click", articleClick).on("click", articleClick);
  });
}

// Initialize event-listeners
attachArticleClickListeners();

// Create MutationObserver for #content
const observer = new MutationObserver((mutations) => {
  mutations.forEach((mutation) => {
    if (mutation.type === "childList") {
      attachArticleClickListeners(); // Re-attach event listeners cada vez que haya un cambio en #content
    }
  });
});

// Check changes of #content
observer.observe(document.querySelector("#content"), {
  childList: true,
  subtree: true,
});
