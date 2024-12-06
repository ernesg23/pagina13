let write = document.querySelector("#write");
let writecontainer = document.querySelector("#writecontainer");
let imagesVideos = document.querySelector("#imagesVideos");
let mediaContainer = document.querySelector(".mediaContainer");
let sources = document.querySelector("#source");
let sourcesContainer = document.querySelector(".sourcesContainer");
let selectedCategories = []; // Array para almacenar las categorías seleccionadas
const sendBtn = document.querySelector("#sendButton");
const sendBtnEd = document.querySelector("#sendButtonEdit");
const archiveBtn = document.querySelector("#archiveButton");
const archiveBtnEd = document.querySelector("#archiveButtonEdit");
const categoryButtons = document.querySelectorAll(".categoryCreator");

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

// Agregar clases al hacer clic en las secciones
write.addEventListener("click", function () {
  write.classList.add("active");
  writecontainer.classList.add("active");
  imagesVideos.classList.remove("active");
  mediaContainer.classList.remove("active");
});
imagesVideos.addEventListener("click", function () {
  imagesVideos.classList.add("active");
  mediaContainer.classList.add("active");
  write.classList.remove("active");
  writecontainer.classList.remove("active");
});

document.addEventListener("DOMContentLoaded", function () {
  // Verificamos que `window.selectedCategories` esté disponible
  console.log(window.selectedCategories); // Verificar en la consola si llega el array correctamente

  // Las categorías preseleccionadas se pasan desde PHP como un array JSON
  const preselectedCategories = window.selectedCategories || []; // Usamos `window.selectedCategories` que está definida desde PHP

  // Seleccionamos todos los botones de categoría
  const categoryButtons = document.querySelectorAll(".categoryCreator");

  // Recorremos los botones de categorías y los activamos si están en el array de categorías seleccionadas
  categoryButtons.forEach((button) => {
    const category = button.dataset.category;
    if (preselectedCategories.includes(category)) {
      button.classList.add("active");  // Marcamos como activa la categoría si está seleccionada
      selectedCategories.push(category); // Aseguramos que se mantengan en el array de categorías seleccionadas
    }
  });

  // Manejar selección de categorías
  categoryButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const category = button.dataset.category;
      if (selectedCategories.includes(category)) {
        selectedCategories = selectedCategories.filter((cat) => cat !== category);
        button.classList.remove("active");
      } else {
        selectedCategories.push(category);
        button.classList.add("active");
      }
    });
  });
});

// Manejo del cambio de archivo
document.querySelector("#files").onchange = function () {
  const fileName = this.files[0]?.name;
  const label = document.querySelector("label[for=files]");
  label.innerText = fileName ?? "Browse Files";
};

// Enviar el artículo
sendBtnEd.addEventListener("click", () => {
    let formData = new FormData();
    const id = $(".buttonsContainer").attr("id");
  let file = $("#files")[0].files[0];
  const imagesAndVideos = $("label[for='files']").text(); // Obtener valor del label
  const title = $(".titletextArea").val();
  const subtitle = $(".subtitletextArea").val();
  const description = $(".descriptiontextArea").val();
  // const sources = $("#sources").val();
  const category = $(".categoryCreator").val();
  if (
    !title ||
    !subtitle ||
    !description ||
    selectedCategories.length === 0 // Validar que se haya seleccionado al menos una categoría
  ) {
    $("#alertError").html("Complete todos los campos y seleccione al menos una categoría.");
  } else {
    const author = getCookie("username");
    const authorEmail = getCookie("email");

    if (file) {
      formData.append("file", file);
    } else {
      formData.append("images", imagesAndVideos);
    }
    formData.append("title", title);
    formData.append("subtitle", subtitle);
    formData.append("description", description);
    // formData.append('sources', sources);
    formData.append("categories", category);
    formData.append("author", author);
    formData.append("email", authorEmail);
    formData.append("isArchived", 0);

    // Enviar categorías como un array
    selectedCategories.forEach(cat => {
      formData.append("categories[]", cat);
    });

    $.ajax({
      url: "./modules/users/editorSend.php",
      data: formData,
      method: "POST",
      contentType: false,
      processData: false,
      success: () => {
        $("#alertGood").html("Artículo editado y creado con éxito");
        setTimeout(() => location.reload(), 500);
      },
      error: (jqXHR, textStatus, errorThrown) => {
        console.error("Error:", textStatus, errorThrown);
      },
    });
  }
});

// Archivar artículo
archiveBtnEd.addEventListener("click", () => {
  let formData = new FormData();
  let file = $("#files")[0].files[0];
  const id = $(".buttonsContainer").attr("id");
  const imagesAndVideos = $(".newImage").val();
  const title = $(".titletextArea").val();
  const subtitle = $(".subtitletextArea").val();
  const description = $(".descriptiontextArea").val();
  const sources = $("#sources").val();
  const category = $(".categoryCreator").val();
  if (
    !title ||
    !subtitle ||
    !description ||
    selectedCategories.length === 0 // Validar que se haya seleccionado al menos una categoría
  ) {
    let alert = `Complete todos los campos para poder subir un articulo`;
    $("#alertError").html(alert);
  }else {
    const author = getCookie("username");
    const authorEmail = getCookie("email");

    if (file) {
      formData.append("file", file);
    } else {
      formData.append("images", imagesAndVideos);
    }
    formData.append("title", title);
    formData.append("subtitle", subtitle);
    formData.append("description", description);
    formData.append("sources", sources);
    formData.append("author", author);
    formData.append("email", authorEmail);
    formData.append("isArchived", 1);
    $.ajax({
      url: "./modules/users/editorSend.php",
      data: formData,
      method: "POST",
      contentType: false,
      processData: false,
      success: () => {
        $("#alertGood").html("Artículo archivado con éxito");
        setTimeout(() => location.reload(), 500);
      },
      error: (jqXHR, textStatus, errorThrown) => {
        console.error("Error:", textStatus, errorThrown);
      },
    });
  }
});