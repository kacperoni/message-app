<?php
include "../autoload.php";
include "../includes/helpers.php";
$connection = new Database();
$conversation = new Conversation($connection);

if (isset($_POST['search'])) {
    $searchFlag = true;
    //setting search value equals to input value or to 'all' if input is empty
    $searchValue = $_POST['search'] ? $connection->escapeString($_POST['search']) . '%' : "all";

    if ($searchValue != 'all') {
        $sql = "SELECT * FROM users WHERE firstname LIKE ? ORDER BY firstname ASC";
        $result = $connection->fetchAll($sql, [$searchValue]);
    } else { // if search input is empty, display all user's conversation and set search flag to false
        echo '<div class="text-sm ml-4 font-semibold text-gray-400">Chats</div>';
        $allUserConv = $conversation->fetchAllByUserId($_POST['userId']);
        $searchFlag = false;
        if (!empty($allUserConv)) {
            foreach ($allUserConv as $conver) {
                $secondUserId = $_POST['userId'] != $conver['user1_id'] ? $conver['user1_id'] : $conver['user2_id'];
                $secondUser = $connection->findUserById($secondUserId);
                echo returnUserTile(
                    $secondUser['profilePicture'],
                    $secondUser['firstname'],
                    $secondUser['active'],
                    'conversations.php?userId=' . $secondUserId
                );
            }
        } else {
            echo '<div class="text-center mt-4 text-gray-400 font-semibold">No conversations.</div>';
        }
    }

    //if users stopped searching display results or dont if there is no results
    if (empty($result) && $searchFlag) {
        echo "<div class='text-center text-2xl font-semibold text-gray-500 dark:text-gray-500'>No results.</div>";
    } else if (!empty($result) && $searchFlag) {
        echo '<div class="text-sm ml-4 font-semibold text-gray-400">Results</div>';
        foreach ($result as $user) {
            echo returnUserTile($user['profilePicture'], $user['firstname'], $user['active'], 'conversations.php?userId=' . $user['id']);
        }
    }
}
