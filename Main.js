function showAboutInfo() {
  var aboutInfo = document.getElementById("aboutInfo");
  if (aboutInfo.style.display === "none") {
      aboutInfo.style.display = "block";
  } else {
      aboutInfo.style.display = "none";
  }
}
// открытиe окна
function openModal(photoId) {
  var modal = document.getElementById("myModal");
  var img = document.getElementById(photoId);
  var modalImg = document.getElementById("modalImg");
  modal.style.display = "block";
  modalImg.src = img.src;
}
// закрытиe окна
function closeModal() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}
// Закрыть при клике вне изображения
window.onclick = function(event) {
  var modal = document.getElementById("myModal");
  if (event.target == modal) {
      modal.style.display = "none";
  }
}
