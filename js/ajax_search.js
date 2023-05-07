const search = document.getElementById('search');
if(search !== null){
    search.addEventListener('keyup', (event) => {
        event.preventDefault();
        if(search.value){
            const xhr = new XMLHttpRequest();
            const params = 'search=' + search.value + '&userId=' + userId;
            xhr.open('POST', '../ajax_php/search.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                document.getElementById('users').innerHTML = this.responseText;
            }

            xhr.send(params);
        }
        else{
            readAllConversation();
        }
    });
}
if(document.getElementById('users') !== null){
    readAllConversation();
setInterval(readAllConversation, 5000)
}


function readAllConversation() {
    const xhr = new XMLHttpRequest();
    const params = 'userId=' + userId;
    xhr.open('POST', '../ajax_php/allConversations.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        document.getElementById('users').innerHTML = this.responseText;
    }

    xhr.send(params);
}