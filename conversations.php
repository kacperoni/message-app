<?php include "_header.php"; ?>
<?php

if (isset($_GET['userId'])) {
    $secondUserId = (int) $database->escapeString($_GET['userId']);
    $conversationId = $conversation->findConversationByUsersId($user->getId(), $secondUserId)['id'];

    $secondUser = new User;
    $secondUser->instantiation($database->findUserById($secondUserId));
    $conversation->setId($conversationId);
}
?>
<div class="bg-white dark:bg-gray-800 dark:text-white shadow-xl rounded-md xl:w-1/4 w-3/4 mx-auto">
    <div class="flex justify-between items-center p-4 pb-2">
        <!-- second user info -->
        <div class="flex">
            <img src="<?= $secondUser->getProfilePicturePath(); ?>" alt="logo" class="self-center w-16 rounded-full border border-2 dark:border-gray-700">
            <span class="self-center ml-4 md:text-2xl font-semibold"><?= $secondUser->getFirstname(); ?></span>
        </div>
        <div>
            <button id="modeButton" class="dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 shadow-md bg-gray-50 border-gray-300 text-gray-500 p-1 px-3 mx-1 rounded-md text-sm font-semibold border border-1 dark:border-gray-600"><i class="fa-solid fa-moon"></i></button>
            <a class="bg-cyan-400 hover:bg-cyan-500 p-1 px-3 rounded-md border border-cyan-500 border-1 shadow-md text-gray-100 font-semibold text-sm" href="home.php"><i class="fa-solid fa-arrow-left"></i></a>
        </div>

    </div>
    <div class="px-4 text-sm font-semibold text-gray-400 border-b border-gray-300 dark:border-gray-700">Messages</div>
    <!-- all messages container -->
    <div class="h-80 p-4 flex flex-col overflow-y-scroll md:text-base text-xs" id="chat">
    </div>

    <hr class="h-px bg-gray-300 dark:bg-gray-700 border-0 mb-2">
    <!-- sent message form -->
    <form method="POST" class="flex items-center p-4 pt-2">
        <input type="text" name="message" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:border-cyan-400
                focus:ring-1 focus:ring-cyan-400 block w-full p-2.5
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="Aa" autocomplete="off" required>
        <button type="submit" name="sendMessage" class="bg-cyan-400 hover:bg-cyan-500 ml-2 p-2.5 px-4 rounded-md shadow-md text-gray-100 font-semibold text-sm"><i class="fa-solid fa-paper-plane"></i></a>
    </form>
    <?php
    if (isset($_POST["sendMessage"])) {
        $messageContent = $database->escapeString($_POST["message"]);
        $sql = "INSERT INTO messages (conversationId, authorId, recipientId, content) VALUES (?, ?, ?, ?)";
        $database->query($sql, [$conversationId, $user->getId(), $secondUser->getId(), $messageContent]);
    }
    ?>
</div>
<script>
    const xhr = new XMLHttpRequest();
    const conversationId = <?= $conversation->getId(); ?>;
    const authorId = <?= $user->getId(); ?>;
    const recipientId = <?= $secondUser->getId(); ?>;
    const url = "messages.php?conversationId=" + conversationId + "&authorId=" + authorId + "&recipientId=" + recipientId;
    const chat = document.getElementById("chat");
    xhr.open("GET", url, true);

    xhr.onload = function() {
        chat.innerHTML = this.responseText;
    }

    xhr.send();
</script>
<?php include "_footer.php"; ?>