'use strict';
//установка
function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    var secureFlag = location.protocol === 'https:' ? '; Secure' : '';
    document.cookie = name + "=" + encodeURIComponent(value || "") + expires + "; path=/" + secureFlag;
}
//Получение
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) {
            return decodeURIComponent(c.substring(nameEQ.length, c.length));
        }
    }
    return null;
}
//Очистка по имени
function eraseCookie(name) {   
    document.cookie = name+'=; Max-Age=-99999999;';  
}

var lastLogin = getCookie("lastLogin");

if (lastLogin) {
    showMessage("Последний вход был: " + lastLogin);
} else {
    showMessage("Добро пожаловать на сайт!");
}

//сохранить текущее время в cookies
var currentDate = new Date();
currentDate.setHours(currentDate.getHours() + 3);
setCookie("lastLogin", currentDate.toUTCString(), 30); //хранятся 30 дней

// кнопка для очистки куки
var button = document.createElement("button");
button.textContent = "Очистить Cookie";
button.classList.add("button");

button.addEventListener("click", function() {
    eraseCookie("lastLogin");
    showMessage("Cookie была очищена!");
});

var footer = document.getElementById("footer");

footer.appendChild(button);

