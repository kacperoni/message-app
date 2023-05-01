<?php
include "../autoload.php";
include "../includes/helpers.php";
$connection = new Database();
$conversation = new Conversation($connection);

if (isset($_POST['search'])) {
    //setting search value equals to input value or to 'all' if input is empty
    $searchValue = $connection->escapeString($_POST['search']) . '%';

    $sql = "SELECT * FROM users WHERE firstname LIKE ? ORDER BY firstname ASC";
    $result = $connection->fetchAll($sql, [$searchValue]);
    // if search input is empty, display all user's conversation and set search flag to false

}

//if users stopped searching display results or dont if there is no results
if (empty($result)) {
    echo "<div class='text-center text-2xl font-semibold text-gray-500 dark:text-gray-500'>No results.</div>";
} else {
    echo '<div class="text-sm ml-4 font-semibold text-gray-400">Results</div>';
    foreach ($result as $foundUser) {
        if ($foundUser['id'] != $_POST['userId'])
            echo returnUserTile($foundUser, 'conversations.php?userId=' . $foundUser['id']);
    }
}
