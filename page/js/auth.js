const input = document.querySelector('#key');
const button = document.querySelector('#button');
const form = document.querySelector('.form-input');
const loader = document.querySelector('.loader');
const error = document.querySelector('.error-key');

button.addEventListener('click', function(){
  if(input.value.length < 10){
    input.style.boxShadow = "0 0 5px red";
    setTimeout(function(){
      input.style.boxShadow = "0 0 0px red";
    }, 1000)
    return false;
  } else {
    button.style.display = 'none';
    loader.style.display = 'block';
    // window.location = 'server/auth.php';
    sendServer();
  }
})

function sendServer(){
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'server/auth.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        const response = xhr.responseText;

        if(response == "Нет"){
          error.style.display = 'block';
          button.style.display = 'block';
          loader.style.display = 'none';
        } else {
          error.style.display = 'block';
          error.style.color = 'green';
          error.innerHTML = "Вы успешно авторизовались!"
          setTimeout(function(){
            window.location = 'server/main.php';
          }, 3000)
        }
      } else {
        alert('Произошла ошибка при выполнении запроса.');
        button.style.display = 'block';
        loader.style.display = 'none';
        
      }
    }
  };
  xhr.send('data=' + encodeURIComponent(input.value));
}

function getCookie(name) {
	var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
	return matches ? decodeURIComponent(matches[1]) : undefined;
}
