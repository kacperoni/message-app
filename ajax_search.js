const search = document.getElementById('search');
search.addEventListener('keyup', (event) => {
event.preventDefault();

const xhr = new XMLHttpRequest();
const params = 'search=' + search.value + '&userId=' + userId;
xhr.open('POST', 'search.php', true);
xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

xhr.onload = function() {
console.log(this.responseText);
document.getElementById('users').innerHTML = this.responseText;
}

xhr.send(params);
});