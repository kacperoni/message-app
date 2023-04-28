<?php
include "autoload.php";
include "helpers.php";
$connection = new Database();
$conversation = new Conversation($connection);
$message = new Message();
$user = new User();
if (isset($_GET['conversationId']) && isset($_GET['authorId']) && isset($_GET['recipientId'])) {
    $conversation->setId($connection->escapeString($_GET['conversationId']));
    $authorId = $connection->escapeString($_GET['authorId']);
    $recipientId = $connection->escapeString($_GET['recipientId']);
    $user->instantiation($connection->findUserById($recipientId));
    $messages = $conversation->getAllMessages();
    foreach ($messages as $messageParams) {
        $message->instantiation($messageParams);
        echo $message->getAuthorId() == $authorId ? $message->displayMessageAsAuthor() : $message->displayMessageAsRecipient($user->getProfilePicturePath());
    }
}
