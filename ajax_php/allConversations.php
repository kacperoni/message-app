<?php
include "../autoload.php";
include "../includes/helpers.php";
$connection = new Database();
$conversation = new Conversation($connection);

if (isset($_POST['userId'])) {
    $userId = $connection->escapeString($_POST['userId']);

    $allUserConv = $conversation->fetchAllByUserId($userId);
    echo '<div class="text-sm ml-4 font-semibold text-gray-400">Chats</div>';
    if (!empty($allUserConv)) {
        foreach ($allUserConv as $conver) {
            $secondUserId = $userId != $conver['user1_id'] ? $conver['user1_id'] : $conver['user2_id'];
            $secondUser = $connection->findUserById($secondUserId);
            echo returnUserTile(
                $secondUser,
                'conversations.php?userId=' . $secondUserId
            );
        }
    } else {
        echo '<div class="text-center mt-4 text-gray-400 font-semibold">No conversations.</div>';
    }
}
