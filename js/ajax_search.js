const search = document.getElementById('search');
console.log(search.value);
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

    readAllConversation();
setInterval(readAllConversation, 5000)


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