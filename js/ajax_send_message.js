document.getElementById("sendMessageForm").addEventListener("submit", function(event) {
    event.preventDefault();
    const message = document.getElementById("message").value;
    const xhr = new XMLHttpRequest();
    const params = "message=" + message + "&authorId=" + authorId + "&recipientId=" + recipientId + "&conversationId=" + conversationId;
    xhr.open("POST", "../ajax_php/sendMessage.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        console.log(this.responseText);
    }
    xhr.send(params);
    document.getElementById("message").value = '';
});