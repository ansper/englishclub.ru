// Получаем элементы DOM
var modalSignUp = document.getElementById("myModalSignUp");
var btnSignUp = document.getElementById("openModalBtnSignUp");
var spanSignUp = document.getElementsByClassName("close")[1];
var formSignUp = document.getElementById("feedbackFormSignUp");

// При клике на кнопку открываем модальное окно
btnSignUp.onclick = function() {
  modalSignUp.style.display = "block";
}

// При клике на крестик закрываем модальное окно
spanSignUp.onclick = function() {
  modalSignUp.style.display = "none";
}

// При клике вне модального окна, закрываем его
window.onclick = function(event) {
  if (event.target == modalSignUp) {
    modalSignUp.style.display = "none";
  }
}