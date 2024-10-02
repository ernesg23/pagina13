const resposiveCategory = document.querySelector(".categoryOpen");
const categoryButtons = document.querySelector(".categoryButtons");
$(".MainTitle").click(()=> {
  location.reload()
})
resposiveCategory.addEventListener("click", () => {
  categoryButtons.classList.add("active");
  document.addEventListener("click", (event) => {
    if (
      categoryButtons.classList.contains("active") &&
      !categoryButtons.contains(event.target) &&
      !event.target.classList.contains("categoryOpen")
    ) {
      categoryButtons.classList.remove("active");
    }
  });
});

$.ajax({
  url: "./modules/users/layoutVerify.php",
  dataType: "html",
  success: (data) => {
    if (data != false) {
      let profile = `<p class='userName userActionsClick'>${data} </p>
          <img src="./views/img/sin perfil.png" class='userImg userActionsClick' alt="${data} profile picture" loading="lazy">`;
      const menu = document.querySelector(".navMenu");
      $(menu).html(profile);
      $(".userActionsClick").click(() => {
        const menu = document.querySelector(".actionsMenu");
        menu.classList.toggle("active");
        document.addEventListener("click", (event) => {
          const menuActions = document.querySelector(".actionsMenu");
          if (
            menuActions.classList.contains("active") &&
            !menuActions.contains(event.target) &&
            !event.target.classList.contains("userActionsClick")
          ) {
            menuActions.classList.remove("active");
          }
        });
      });
    }
  },
});
