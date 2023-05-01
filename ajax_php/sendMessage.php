<?php
include "../autoload.php";
$connection = new Database();

if (isset($_POST['message']) && isset($_POST['authorId']) && isset($_POST['recipientId']) && isset($_POST['conversationId'])) {
    $messageContent = $connection->escapeString($_POST['message']);
    $authorId = $connection->escapeString($_POST['authorId']);
    $recipientId = $connection->escapeString($_POST['recipientId']);
    $conversationId = $connection->escapeString($_POST['conversationId']);
    $sql = "INSERT INTO messages (conversationId, authorId, recipientId, content) VALUES (?, ?, ?, ?)";
    $connection->query($sql, [$conversationId, $authorId, $recipientId, $messageContent]);
}
