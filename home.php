<?php include "includes/_header.php"; ?>
<?php $session->redirectIndexIfNotAuthenticated(); ?>
<div class="bg-white dark:bg-gray-800 dark:text-white shadow-xl rounded-md xl:w-1/4 w-3/4 mx-auto">
    <div class="flex justify-between items-center p-4 pb-2">
        <div class="flex">
            <img src="<?= $user->getProfilePicturePath(); ?>" alt="logo" class="self-center w-16 rounded-full border border-2 dark:border-gray-700">
            <span class="self-center ml-4 md:text-2xl font-semibold"><?= $user->getFirstname(); ?></span>
        </div>
        <div>
            <button id="modeButton" class="dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 shadow-md bg-gray-50 border-gray-300 text-gray-500 p-1 px-3 mx-1 rounded-md text-sm font-semibold border border-1 dark:border-gray-600"><i class="fa-solid fa-moon"></i></button>
            <a class="bg-cyan-400 hover:bg-cyan-500 p-1 px-3 rounded-md shadow-md border border-cyan-500 border-1 text-gray-100 font-semibold text-sm" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
    </div>

    <!--search form -->
    <div class="flex items-center p-4 pt-2">
        <div class="relative w-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <input type="text" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="Search user" required>
        </div>
    </div>

    <!-- all conversations -->
    <div class="overflow-auto h-80" id="users">
        <div class="text-sm ml-4 font-semibold text-gray-400">Chats</div>

    </div>

</div>
<script>
    readAllConversation();
    setInterval(readAllConversation, 2000);

    function readAllConversation() {
        const xhr = new XMLHttpRequest();
        const userId = <?= $user->getId(); ?>;
        const params = 'userId=' + userId;
        xhr.open('POST', '../ajax_php/allConversations.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            document.getElementById('users').innerHTML = this.responseText;
        }

        xhr.send(params);
    }
</script>
<?php include "includes/_footer.php"; ?>