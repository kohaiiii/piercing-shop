$('.product_counter').change(function() {
    var elements = $('.product_price');
    var counters = $('.product_counter');
    var sum_price = 0;
    var total = $('#total_sum');
    
    elements.each(function(index, element) {
        // Извлекаем цену, удаляя все символы кроме чисел и запятой/точки
        let product_value = element.innerText.replace(/[^\d.,]/g, '');
        let number = parseFloat(product_value.replace(',', '.')); // Преобразуем строку в число с плавающей точкой
        
        let count = parseInt(counters.eq(index).val()); // Получаем количество из соответствующего инпута
        if (!isNaN(number) && !isNaN(count)) { // Проверяем, что оба значения валидны
            sum_price += number * count;
        }
    });

    total.val(sum_price + " ₽"); // Округляем до 2 знаков после запятой
});

  
  // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })
  })()

$("#btn_card1").click(function(){
    $("#btn_card").removeClass("active_card");
    $(this).addClass("active_card");
});

$("#btn_card").click(function(){
    $("#btn_card1").removeClass("active_card");
    $(this).addClass("active_card");
});

$("#btn_card3").click(function(){
    $("#btn_card4").removeClass("active_card");
    $("#btn_card2").removeClass("active_card");
    $(this).addClass("active_card");
});

$("#btn_card4").click(function(){
    $("#btn_card3").removeClass("active_card");
    $("#btn_card2").removeClass("active_card");
    $(this).addClass("active_card");
});

$("#btn_card2").click(function(){
    $("#btn_card3").removeClass("active_card");
    $("#btn_card4").removeClass("active_card");
    $(this).addClass("active_card");
});

$("#btn_card2").click(function(){
    $("#btn_card3").removeClass("active_card");
    $("#btn_card4").removeClass("active_card");
    $(this).addClass("active_card");
});

// navigate

$("#ex1-tab-1").click(function(){
    $("#ex1-tab-2").removeClass("active_pills");
    $(this).addClass("active_pills");
});

$("#ex1-tab-2").click(function(){
    $("#ex1-tab-1").removeClass("active_pills");
    $(this).addClass("active_pills");
});




// counter
document.addEventListener("DOMContentLoaded", function() {
    const countElement = document.getElementById("count");
    const incrementButton = document.getElementById("increment");
    const decrementButton = document.getElementById("decrement");
    const maxCount = parseInt(document.getElementById("maxCount").value, 10);

    let count = 0;

    function updateCount() {
        countElement.textContent = count;
        decrementButton.disabled = count <= 0;
        incrementButton.disabled = count >= maxCount;
    }

    incrementButton.addEventListener("click", function() {
        if (count < maxCount) {
            count++;
            updateCount();
        }
    });

    decrementButton.addEventListener("click", function() {
        if (count > 0) {
            count--;
            updateCount();
        }
    });

    // Initialize the counter
    updateCount();
});

$(document).ready(function(){
    $('#phone').mask('+7 (999) 999-99-99');
});

// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })
  })()