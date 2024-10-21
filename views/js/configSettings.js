const configSettings = document.querySelector("#users-configSettings");
const configPosts = document.querySelector("#users-configPosts");
const postView = document.querySelector("#contPostW");
const postsClick = document.querySelector(".written");



function addEventListeners() {

  const configSettings = document.querySelector("#users-configSettings");
  const configPosts = document.querySelector("#users-configPosts");
    if (configPosts) {
    configPosts.addEventListener("click", function () {
      $.ajax({
        method: "POST",
        url: "./modules/users/configPostsContent.php",
        success: (html) => {
          $(".contSett").html(html);
        },
      });
    });
  }

  if (configSettings) {
    configSettings.addEventListener("click", function () {
      $.ajax({
        method: "POST",
        url: "./modules/users/configSettingsContent.php",
        success: (html) => {
          $(".contSett").html(html);
        },
      });
    });
  }
  $("#editPostBtn").on("click", function () {
    $.ajax({
      method: "POST",
      url: "./modules/posts/editArticle.php",
      dataType: "html",
      success: (data) => {
        console.log('Success:', data);
        $("#content").html(data);
      },
    });
  });
  $("#deletePostBtn").on("click", function () {
    $.ajax({
      method: "POST",
      url: "./modules/posts/editArticle.php",
      dataType: "html",
      success: (data) => {
        console.log('Success:', data);
        $("#content").html(data);
      },
    });
  });
  $("#sendBtn").on("click", function () {
    $.ajax({
      method: "POST",
      url: "./modules/users/configPostsChanges.php",
      data: $("#data").serialize(),
      success: (data) => {
        location.reload();
      },
    });
  });
}

addEventListeners();

// Create mutation observer
const observer = new MutationObserver((mutations) => {
  mutations.forEach((mutation) => {
    if (mutation.type === "childList" || mutation.type === "subtree") {
      addEventListeners();
    }
  });
});

// Setup mutation observer
observer.observe(document.body, { childList: true, subtree: true });
