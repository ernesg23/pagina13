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
const edit = document.querySelector(".editArticle")
const author = getCookie("username");
$(edit).click (()=> {
    let id = this.id
    $.ajax({
        url: "./modules/posts/articleEdit.php",
        data: {articleId: id},
        method: "POST",
        success: (data) => {
            console.log("anda")
        }
    })
})
$.ajax({
    url: "./modules/posts/articleWrittenGet.php",
    data: {authorName: author},
    method: "POST",
    success: (data)=>{
        console.log(data)
    }
})
