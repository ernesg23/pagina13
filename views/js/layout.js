const resposiveCategory = document.querySelector(".categoryOpen");
const categoryButtons = document.querySelector(".categoryButtons");
const resultsTemplate = document.querySelector("#search-result-template");
const resultsContainer = document.querySelector(".searchResults");
const searchBar = document.querySelector(".searchBar");
const searchForm = document.querySelector(".searchBarForm");
const dropContent = document.querySelector(".dropdown-content");
const navMen = document.querySelector(".navMenu")
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

navMen.addEventListener("click", (event) => { 
  event.stopPropagation();
  if (!dropContent.classList.contains("active")) {
    dropContent.classList.add("active");
    dropContent.style.display = "block";
    dropContent.style.pointerEvents = "auto";
   // dropContent.style.animation = "appear 0.4s forwards";
  }
});
document.addEventListener("click", (event) => {
  if (dropContent.classList.contains("active") && 
  !dropContent.contains(event.target) && 
  !navMen.contains(event.target)) {
    dropContent.style.animation = "vanish 0.3s forwards";
    dropContent.addEventListener(
      "animationend",
      () => {
        dropContent.style.display = "none";
        dropContent.style.pointerEvents = "none";
        dropContent.classList.remove("active");
      },
      { once: true }
    );
  }
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
        toggleButton.style.pointerEvents = "none";
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
              toggleButton.style.pointerEvents = "auto";
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
searchForm.addEventListener("submit", (event) => {
  const content = $(searchBar).val();
  event.preventDefault();
  $.ajax({
    url: "./modules/posts/list.php",
    method: "post",
    dataType: "html",
    data: { content: content },
    success: (data) => {
      $("#content").html(data);
      initializeSearchList();
    },
  });
});
const searchIcon = document.querySelector(".searchIconR");
searchIcon.addEventListener("click", (event) => {
  const responsiveSearch = document.querySelector(".responsiveSearch");
  const content = $(responsiveSearch).val();
  event.preventDefault();
  $.ajax({
    url: "./modules/posts/list.php",
    method: "post",
    dataType: "html",
    data: { content: content },
    success: (data) => {
      $("#content").html(data);
      initializeSearchList();
    },
  });
});
const initializeSearchList = () => {
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
  const clickedRecentArticle = document.querySelectorAll(
    ".recent-article-search"
  );
  const clickedArticles = document.querySelectorAll(".articleSearch");
  $.each(clickedArticles, (index, article) => {
    article.addEventListener("click", articleClick);
  });
  $.each(clickedRecentArticle, (index, article) => {
    article.addEventListener("click", articleClick);
  });
};
searchForm.addEventListener("input", (event) => {
  event.preventDefault();
  let searchResult = [];
  const content = $(searchBar).val();
  $(resultsContainer).empty();

  $.ajax({
    url: "./modules/posts/searchGet.php",
    method: "post",
    dataType: "json",
    data: { content: content },
    success: (data) => {
      $.each(data, (index, dato) => {
        const clonedTemplate = resultsTemplate.content.cloneNode(true);
        const portraitImg = clonedTemplate.querySelector(".img");
        const newPost = clonedTemplate.querySelector(".search-description");
        const title = newPost.querySelector("h3");
        const id = dato["idPosts"];
        const description = newPost.querySelector("p");
        clonedTemplate.querySelector(".search-post").id = id;
        title.textContent = dato["title"];
        description.textContent = dato["subtitle"];
        portraitImg.src = dato["portraitImg"].replace(/^(\.\.\/)+/, "");
        searchResult.push(clonedTemplate);

        const clickedArticle = clonedTemplate.querySelector(".search-post");
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
      });

      searchResult.forEach((post) => {
        resultsContainer.appendChild(post);
      });
    },
  });
});

searchBar.addEventListener("click", (event) => {
  event.stopPropagation();
  searchBar.style.pointerEvents = "none";
  resultsContainer.classList.toggle("active");

  if (resultsContainer.classList.contains("active")) {
    resultsContainer.style.display = "flex";
    resultsContainer.style.animation = "appear 0.4s forwards";
  } else {
    resultsContainer.style.animation = "vanish 0.3s forwards";
    resultsContainer.addEventListener(
      "animationend",
      () => {
        resultsContainer.style.display = "none";
        searchBar.style.pointerEvents = "auto";
      },
      { once: true }
    );
  }
});

document.addEventListener("click", (event) => {
  if (
    resultsContainer.classList.contains("active") &&
    // !resultsContainer.contains(event.target) && --esta linea hace que la barra de busqueda no desaparesca cuando haces click en un resultado--
    !event.target.closest(".searchBar")
  ) {
    resultsContainer.style.animation = "vanish 0.3s forwards";
    resultsContainer.addEventListener(
      "animationend",
      () => {
        resultsContainer.classList.remove("active");
        resultsContainer.style.display = "none";
        searchBar.style.pointerEvents = "auto";
      },
      { once: true }
    );
  }
});
$(".category-buttonnav").click((event) => {
  const cat = event.target.value;
  $.ajax({
    url: "./modules/posts/list.php",
    method: "post",
    dataType: "html",
    data: { content: cat },
    success: (data) => {
      $("#content").html(data);
      initializeSearchList();
    },
  });
});
$(".categorySearch").click((event) => {
  const cat = event.target.value;
  $.ajax({
    url: "./modules/posts/list.php",
    method: "post",
    dataType: "html",
    data: { content: cat },
    success: (data) => {
      $("#content").html(data);
      initializeSearchList();
    },
  });
});

$.ajax({
  url: "./modules/users/layoutRecent.php",
  dataType: "json",
  success: function (data) {
    const articulos = data.articulos || [];
    const articuloTemplate = document.getElementById("articulo-template");
    const articulosContainer = document.getElementById("articulos-container");
    articulos.slice(0, 3).forEach(articulo => {
      const { idPosts = "#", title = "Título faltante", categoria_nombre = "Categoría faltante" } = articulo;
      const articuloClone = articuloTemplate.content.cloneNode(true);
      const tituloElemento = articuloClone.querySelector(".articulo-titulo");
      
      tituloElemento.textContent = title;
      tituloElemento.setAttribute("data-id", idPosts);
      articulosContainer.appendChild(articuloClone);

      tituloElemento.addEventListener("click", function () {
        $.ajax({
          url: "./modules/posts/reader.php",
          method: "post",
          data: { articleId: idPosts },
          dataType: "html",
          success: function (postReaderData) {
            $("#content").html(postReaderData);
          },
          error: function () {
            console.log("Error al cargar la publicación.");
          }
        });
      });
    });
    const categoriasContador = articulos.reduce((acc, { categoria_nombre }) => {
      acc[categoria_nombre] = (acc[categoria_nombre] || 0) + 1;
      return acc;
    }, {});
    const categoriasOrdenadas = Object.keys(categoriasContador).sort((a, b) => categoriasContador[b] - categoriasContador[a]);
    const categoriaTemplate = document.getElementById("categoria-template");
    const categoriasContainer = document.getElementById("categorias-container");
    categoriasOrdenadas.slice(0, 3).forEach(categoria => {
      const categoriaClone = categoriaTemplate.content.cloneNode(true);
      const categoriaTitulo = categoriaClone.querySelector(".categoria-titulo");
      categoriaTitulo.textContent = categoria || "Categoría faltante";
      categoriaTitulo.setAttribute("data-name", categoria);
      categoriasContainer.appendChild(categoriaClone);
      $(".categoria-titulo").click((event) => {
        const cat = event.target.getAttribute("data-name");
        $.ajax({
          url: "./modules/posts/list.php",
          method: "post",
          dataType: "html",
          data: { content: cat },
          success: (data) => {
            $("#content").html(data);
            initializeSearchList();
          }
        });
      });
    });
  }
});
