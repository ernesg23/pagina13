let write = document.querySelector("#write");
let writecontainer = document.querySelector("#writecontainer");
let imagesVideos = document.querySelector("#imagesVideos");
let mediaContainer = document.querySelector(".mediaContainer");
let sources = document.querySelector("#source");
let sourcesContainer = document.querySelector(".sourcesContainer")

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
