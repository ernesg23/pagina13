function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
const edits = document.querySelectorAll(".editArticle");
const author = getCookie("username");

edits.forEach(edit => {
    edit.addEventListener("click", function (e) {
        e.stopPropagation(); // Makes the click function on clickedArticles not work, so this works and does not break everything
        let id = this.id;
        $.ajax({
            url: "./modules/posts/editArticle.php",
            data: { articleId: id },
            dataType: "html",
            method: "POST",
            success: (data) => {
                console.log("anda");
                $("#content").html(data);
            },
            
        });
    });
});
$.ajax({
    url: "./modules/posts/articleWrittenGet.php",
    data: { authorName: author },
    method: "POST",
    success: (data) => {},
});
const clickedArticles = document.querySelectorAll(".writtenPosts");
clickedArticles.forEach(article => {
    article.addEventListener("click", function () {
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
});

