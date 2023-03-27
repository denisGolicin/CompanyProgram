const button = document.querySelector('.button');
const login = document.querySelector('.input-text');

button.addEventListener('click', function(){
    if(login.value.length < 5){
        console.log("Не ввел логин!");
        return false;
    }
    if(login.value.length > 12){
        console.log("Больше 12!");
        return false;
    }
    // Получаем файл из формы
    var file = document.getElementById("file").files[0];

    if (!file) {
        console.log("файл не выбрал!");
        return false;
      }

    const fileSize = file.size;

    if (fileSize > 2044 * 1024) {
        console.log('Файл слишком большой!');
        return false;
    } 


    // Создаем объект FormData и добавляем в него файл
    var formData = new FormData();
    formData.append("file", file);
    formData.append("login", login.value);

    // Создаем объект XMLHttpRequest и отправляем запрос на сервер
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "photo.php", true);
    xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        // Файл загружен успешно
        console.log(xhr.responseText);
    }
    };
    xhr.send(formData);

});
