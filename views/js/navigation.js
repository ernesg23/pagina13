
    $(".buttonnav").on("click", function () {
        var parts = $(this).attr("data-page").split('-');

        var module = parts[0];
        var action = parts[1];

        $.ajax({
            method: "GET",
            url: "modules/" + module + "/" + action + ".php",
            // data: {
            //     module: module,
            //     action: action
            // }
        })
            .done(function (html) {
                let url = "modules/" + module + "/" + action + ".php"
                if (url == "modules/users/logOut.php") {
                    document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                    location.reload();
                    
                } else{
                    $("#content").html(html);
                    if(url == "modules/users/creator.php") {
                        initializeCreator()
                    }
                }
            });

    });
const initializeCreator = ()=> {
    let write = document.querySelector("#write");
let writecontainer = document.querySelector("#writecontainer");
let imagesVideos = document.querySelector("#imagesVideos");
let mediaContainer = document.querySelector(".mediaContainer");
let sources = document.querySelector("#source");
let sourcesContainer = document.querySelector(".sourcesContainer");
const sendBtn = document.querySelector("#sendButton");
const archiveBtn = document.querySelector("#archiveButton");
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
// Add class to the element
write.addEventListener("click", function () {
  write.classList.add("active");
  writecontainer.classList.add("active");
  imagesVideos.classList.remove("active");
  mediaContainer.classList.remove("active");
  sourcesContainer.classList.remove("active");
  source.classList.remove("active");
});
imagesVideos.addEventListener("click", function () {
  imagesVideos.classList.add("active");
  mediaContainer.classList.add("active");
  write.classList.remove("active");
  writecontainer.classList.remove("active");
  sourcesContainer.classList.remove("active");
  source.classList.remove("active");
});
sources.addEventListener("click", function () {
  sourcesContainer.classList.add("active");
  source.classList.add("active");
  write.classList.remove("active");
  writecontainer.classList.remove("active");
  imagesVideos.classList.remove("active");
  mediaContainer.classList.remove("active");
});
document.querySelector("#files").onchange = function () {
  const fileName = this.files[0]?.name;
  const label = document.querySelector("label[for=files]");
  label.innerText = fileName ?? "Browse Files";
};
sendBtn.addEventListener("click", () => {
  let formData = new FormData();
  let file = $("#files")[0].files[0];
  const imagesAndVideos = $(".newImage").val();
  const title = $(".titletextArea").val();
  const subtitle = $(".subtitletextArea").val();
  const description = $(".descriptiontextArea").val();
  const sources = $("#sources").val();
  const category = $(".categoryCreator").val();
  const author = getCookie("username");
  const authorEmail = getCookie("email");
  const date = new Date();
  let actualDate = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();

  formData.append('file', file);
  formData.append('title', title);
  formData.append('subtitle', subtitle);
  formData.append('description', description);
  formData.append('sources', sources);
  formData.append('categories', category);
  formData.append('author', author);
  formData.append('images', imagesAndVideos);
  formData.append('email', authorEmail);
  formData.append('publishedDate', actualDate);
  formData.append('isArchived', 0);

  $.ajax({
    url: "./modules/users/creatorSend.php",
    data: formData,
    method: "POST",
    contentType: false,
    processData: false,
    success: () => {
      alert("Articulo creado con exito");
      location.reload()
    },
    error: (jqXHR, textStatus, errorThrown) => {
      console.error('Error:', textStatus, errorThrown);
    }
  });
});
archiveBtn.addEventListener("click", () => {
  let formData = new FormData();
  let file = $("#files")[0].files[0];
  const imagesAndVideos = $(".newImage").val();
  const title = $(".titletextArea").val();
  const subtitle = $(".subtitletextArea").val();
  const description = $(".descriptiontextArea").val();
  const sources = $("#sources").val();
  const category = $(".categoryCreator").val();
  const author = getCookie("username");
  const authorEmail = getCookie("email");
  const date = new Date();
  let actualDate = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();

  formData.append('file', file);
  formData.append('title', title);
  formData.append('subtitle', subtitle);
  formData.append('description', description);
  formData.append('sources', sources);
  formData.append('categories', category);
  formData.append('author', author);
  formData.append('images', imagesAndVideos);
  formData.append('email', authorEmail);
  formData.append('publishedDate', actualDate);
  formData.append('isArchived', 1);

  $.ajax({
    url: "./modules/users/creatorSend.php",
    data: formData,
    method: "POST",
    contentType: false,
    processData: false,
    success: () => {
      alert("Articulo creado y archivado con exito");
    },
    error: (jqXHR, textStatus, errorThrown) => {
      console.error('Error:', textStatus, errorThrown);
    }
  });
});

}