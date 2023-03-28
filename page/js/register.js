const button = document.querySelector('.button');
const loader = document.querySelector('.loader');
const login = document.querySelector('.login');
const phone = document.querySelector('.phone');
let photoButton = document.getElementById("photo");
let error = document.querySelector('.error');

const ERROR_LOGIN = "user";
const ERROR_PHOTO = "user";

let xhr = new XMLHttpRequest();

button.addEventListener('click', function(){
    if(login.value.length < 5 || login.value.length > 16 || !isValidLogin(login.value)) {
        invalidInput(login);
        return false;
    }
    if(!isValidPhoneNumber(phone.value)){

        invalidInput(phone);
        return false;
    }
    // Получаем файл из формы
    let file = document.getElementById("file").files[0];

    if (!file) {
        invalidInput(photoButton);
        return false;
      }

    const fileSize = file.size;

    if (fileSize > 1024 * 1024) {
        error.style.display = "block";
        error.innerHTML = "Фото должно быть не более 1мб!";
        return false;
    } 
    if(!/^image\/jpeg$/.test(file.type)){
        error.style.display = "block";
        error.innerHTML = "Только формат .jpg!";
        return false;
    }


    // Создаем объект FormData и добавляем в него файл
    let formData = new FormData();
    formData.append("file", file);
    formData.append("login", login.value);
    formData.append("phone", phone.value);

    // Создаем объект XMLHttpRequest и отправляем запрос на сервер
    xhr.open("POST", "complete.php", true);
    xhr.send(formData);
    this.style.display = "none";
    loader.style.display = "block";

});

xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        if(xhr.responseText == "user"){
            error.style.display = "block";
            error.innerHTML = "Логин занят!";
            button.style.display = "block";
            loader.style.display = "none";
            return false;
        }

        // Файл загружен успешно
        console.log(xhr.responseText);
        setTimeout(function(){
            window.location = '../php/main.php';
        }, 500)
    }
};

function invalidInput(e){
    e.style.boxShadow = "0 0 5px red";
    setTimeout(function(){
      e.style.boxShadow = "0 0 0px red";
    }, 1000)
}

function isValidPhoneNumber(phoneNumber) {
    let regex = /^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/;
    return regex.test(phoneNumber);
}

function isValidLogin(str) {
    return str.match(/^[a-z0-9_.,'"!?;:& ]+$/i);
}
