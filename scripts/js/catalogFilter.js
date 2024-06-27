document.addEventListener("DOMContentLoaded", function() {
    // Получаем все кнопки фильтрации
    var buttons = document.querySelectorAll('.filter-button');

    // Добавляем обработчик событий для каждой кнопки
    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            var filter = button.dataset.filter; // Получаем значение атрибута data-filter
            
            for(let i = 0; i < buttons.length; i++) {
                buttons[i].classList.remove('filter-button-active');
            }
            button.classList.add('filter-button-active');

            // Получаем все элементы для фильтрации
            var items = document.querySelectorAll('.catalog__block');

            // Проходимся по каждому элементу и скрываем те, которые не соответствуют выбранному фильтру
            items.forEach(function(item) {
                if (filter === 'all' || item.classList.contains(filter)) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        });
    });
});