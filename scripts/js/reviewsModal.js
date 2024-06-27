// Получаем элементы DOM
var modal = document.getElementById("myModal");
var btn = document.getElementById("openModalBtn");
var span = document.getElementsByClassName("close")[0];
var form = document.getElementById("feedbackForm");

// При клике на кнопку открываем модальное окно
btn.onclick = function() {
  modal.style.display = "block";
}

// При клике на крестик закрываем модальное окно
span.onclick = function() {
  modal.style.display = "none";
}

// При клике вне модального окна, закрываем его
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

