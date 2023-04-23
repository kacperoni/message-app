<?php include "_header.php"; ?>

<div class="bg-white dark:bg-gray-800 dark:text-white shadow-xl rounded-md xl:w-1/4 w-3/4 mx-auto p-8">
    <div class="flex items-center">
        <img src="<?= $user->getProfilePicturePath(); ?>" alt="logo" class="self-center w-16 rounded-full">
        <span class="self-center ml-8 text-2xl font-semibold"><?= $user->getFirstname(); ?></span>
        <a class="justify-self-end bg-cyan-400 hover:bg-cyan-500 p-1 px-3 rounded-md shadow-md text-gray-100 font-semibold text-sm" href="logout.php">Logout</a>
    </div>

</div>
</div>
</body>

</html>