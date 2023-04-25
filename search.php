<?php
include "autoload.php";
$connection = new Database();
$conversation = new Conversation($connection);
if (isset($_POST['search'])) {
    $searchFlag = true;
    $searchValue = $_POST['search'] ? $connection->escapeString($_POST['search']) . '%' : "all";
    if ($searchValue != 'all') {
        $sql = "SELECT * FROM users WHERE firstname LIKE ? ORDER BY firstname ASC";
        $result = $connection->fetchAll($sql, [$searchValue]);
    } else {
        echo '<div class="text-sm ml-4 font-semibold text-gray-400">Chats</div>';
        $allUserConv = $conversation->fetchAllByUserId($_POST['userId']);
        $searchFlag = false;
        if (!empty($allUserConv)) {
            foreach ($allUserConv as $conver) {
                $secondUserId = $_POST['userId'] != $conver['user1_id'] ? $conver['user1_id'] : $conver['user2_id'];
                $secondUser = $connection->findUserById($secondUserId);
                echo sprintf(
                    "
                <div class='flex justify-between items-center border-b p-3 px-4 border-gray-300 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-700'>
                    <div class='flex'>
                        <img src='profile_pics/%s' alt='logo' class='self-center w-16 rounded-full border border-2 dark:border-gray-700'>
                        <span class='self-center ml-4 text-xl font-medium'>%s</span>
                    </div>
                </div>",
                    $secondUser['profilePicture'],
                    $secondUser['firstname']
                );
            }
        } else {
            echo '<div class="text-center mt-4 text-gray-400 font-semibold">No conversations.</div>';
        }
    }

    if (empty($result) && $searchFlag) {
        echo "<div class='text-center text-2xl font-semibold text-gray-500 dark:text-gray-500'>No results.</div>";
    } else if (!empty($result) && $searchFlag) {
        echo '<div class="text-sm ml-4 font-semibold text-gray-400">Results</div>';
        foreach ($result as $user) {
            echo sprintf(
                "
        <div class='flex justify-between items-center border-b p-3 px-4 border-gray-300 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-700'>
            <div class='flex'>
                <img src='profile_pics/%s' alt='logo' class='self-center w-16 rounded-full border border-2 dark:border-gray-700'>
                <span class='self-center ml-4 text-xl font-medium'>%s</span>
            </div>
        </div>",
                $user['profilePicture'],
                $user['firstname']
            );
        }
    }
}
