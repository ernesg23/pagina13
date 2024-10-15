const configSettings = document.querySelector("#users-configSettings");
const configPosts = document.querySelector("#users-configPosts");

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

$("#save").off("click");
$("#save").on("click", function () {
  $.ajax({
    method: "POST",
    url: "./modules/users/configPostsChanges.php",
    data: $("#data").serialize(),
    success: (data) => {
      location.reload();
    },
  });
});
