<?php include "_header.php"; ?>

<div class="bg-white dark:bg-gray-800 dark:text-white shadow-xl rounded-md xl:w-1/4 w-3/4 mx-auto">
    <div class="flex justify-between items-center p-4 pb-2">
        <div class="flex">
            <img src="<?= $user->getProfilePicturePath(); ?>" alt="logo" class="self-center w-16 rounded-full border border-2 dark:border-gray-700">
            <span class="self-center ml-4 md:text-2xl font-semibold"><?= $user->getFirstname(); ?></span>
        </div>
        <div>
            <button id="modeButton" class="dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 shadow-md bg-gray-50 border-gray-300 text-gray-500 p-1 px-3 mx-1 rounded-md text-sm font-semibold border border-1 dark:border-gray-600"><i class="fa-solid fa-moon"></i></button>
            <a class="bg-cyan-400 hover:bg-cyan-500 p-1 px-3 rounded-md border border-cyan-500 border-1 shadow-md text-gray-100 font-semibold text-sm" href="home.php"><i class="fa-solid fa-arrow-left"></i></a>
        </div>

    </div>
    <div class="px-4 text-sm font-semibold text-gray-400 border-b border-gray-300 dark:border-gray-700">Messages</div>
    <div class="overflow-auto h-80 p-4 flex flex-col ">
        <div class="bg-gray-300 w-fit overflow-hidden max-w-xs rounded-md p-1 px-2 mb-2 text-black">
            Contrary to popular belief, Lorem Ipsum is not simply random text.
        </div>

        <div class="bg-cyan-400 w-fit overflow-hidden max-w-xs rounded-md p-1 px-2 mb-2 text-white text-justify self-end">
            when an unknown printer took a galley of type and scrambled it to
        </div>
        <div class="bg-cyan-400 w-fit overflow-hidden max-w-xs overflow-none rounded-md p-1 px-1.5 mb-2 text-white text-justify self-end ">
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
        </div>
        <div class="bg-cyan-400 w-fit overflow-hidden max-w-xs overflow-none rounded-md p-1 px-1.5 mb-2 text-white text-justify self-end ">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        </div>
    </div>
    <div class="flex items-center p-4 pt-2">
        <input type="text" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:border-cyan-400
            focus:ring-1 focus:ring-cyan-400 block w-full p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="Aa" required>
        <a class="bg-cyan-400 hover:bg-cyan-500 ml-2 p-2.5 px-4 rounded-md shadow-md text-gray-100 font-semibold text-sm" href="home.php"><i class="fa-solid fa-paper-plane"></i></a>
    </div>

</div>
<?php include "_footer.php"; ?>