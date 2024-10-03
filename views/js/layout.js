const resposiveCategory = document.querySelector(".categoryOpen");
const categoryButtons = document.querySelector(".categoryButtons");
$(".MainTitle").click(() => {
  location.reload();
});
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
      const menuNav = document.querySelector(".navMenu");
      $(menuNav).html(profile);
      const menu = document.querySelector(".actionsMenu");
      const toggleButton = document.querySelector(".userActionsClick");

      toggleButton.addEventListener("click", (event) => {
        event.stopPropagation();
        toggleButton.style.pointerEvents = "none"; // Deshabilitar el botón
        menu.classList.toggle("active");

        if (menu.classList.contains("active")) {
          menu.style.display = "flex";
          menu.style.animation = "appear 0.4s forwards";
        } else {
          menu.style.animation = "vanish 0.3s forwards";
          menu.addEventListener(
            "animationend",
            () => {
              menu.style.display = "none";
              toggleButton.style.pointerEvents = "auto"; // Habilitar el botón después de la animación
            },
            { once: true }
          );
        }
      });

      document.addEventListener("click", (event) => {
        if (
          menu.classList.contains("active") &&
          !menu.contains(event.target) &&
          !event.target.closest(".userActionsClick")
        ) {
          menu.style.animation = "vanish 0.3s forwards";
          menu.addEventListener(
            "animationend",
            () => {
              menu.classList.remove("active");
              menu.style.display = "none";
              toggleButton.style.pointerEvents = "auto"; // Habilitar el botón cuando se hace clic fuera del menú
            },
            { once: true }
          );
        }
      });
    }
  },
});
function expandSearchBar() {
  const searchBar = document.getElementById("searchBar");
  searchBar.focus();
}
