function fetchData() {
    const xhr = new XMLHttpRequest();
    const url = "../ajax_php/messages.php?conversationId=" + conversationId + "&authorId=" + authorId + "&recipientId=" + recipientId;
    const chat = document.getElementById("chat");
    xhr.open("GET", url, true);

    xhr.onload = function() {
        chat.innerHTML = this.responseText;
    }

    xhr.send();
}

fetchData();
setInterval(fetchData, 500);