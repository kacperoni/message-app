<?php include "_header.php"; ?>

<div class="bg-white dark:bg-gray-800 dark:text-white shadow-xl rounded-md xl:w-1/4 w-3/4 mx-auto">
    <div class="flex justify-between items-center p-4 pb-2">
        <div class="flex">
            <img src="<?= $user->getProfilePicturePath(); ?>" alt="logo" class="self-center w-16 rounded-full">
            <span class="self-center ml-4 md:text-2xl font-semibold"><?= $user->getFirstname(); ?></span>
        </div>
        <a class="self-center bg-cyan-400 hover:bg-cyan-500 p-1 px-3 rounded-md shadow-md text-gray-100 font-semibold text-sm" href="logout.php">Logout</a>
    </div>
    <!--search form -->
    <form class="flex items-center p-4 pt-2">   
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="Search" required>
        </div>
        <button type="submit" class="p-2.5 ml-2 text-sm font-semibold text-white bg-cyan-500 rounded-md hover:bg-cyan-600 focus:ring-0 focus:outline-none focus:ring-cyan-600 dark:bg-cyan-500 dark:hover:bg-cyan-600 dark:focus:ring-cyan-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </button>
    </form>
    <!-- all chats -->
    <div class="overflow-auto">
        <div class="flex justify-between items-center border-b p-3 px-4 border-gray-300 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-700">
            <div class="flex">
                <img src="profile_pics/default_profile.png" alt="logo" class="self-center w-16 rounded-full">
                <span class="self-center ml-4 text-xl font-medium">User3</span>
            </div>
        </div>
        <div class="flex justify-between items-center border-b p-2 px-4 border-gray-300 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-700">
            <div class="flex">
                <img src="profile_pics/default_profile.png" alt="logo" class="self-center w-16 rounded-full">
                <span class="self-center ml-4 text-xl font-medium">User3</span>
            </div>
        </div>
        <div class="flex justify-between items-center border-b p-2 px-4 border-gray-300 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-700">
            <div class="flex">
                <img src="profile_pics/default_profile.png" alt="logo" class="self-center w-16 rounded-full">
                <span class="self-center ml-4 text-xl font-medium">User3</span>
            </div>
        </div>
    </div>


    </div>
</div>
</body>

</html>