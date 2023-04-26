<?php

function returnUserTile(string $profilePicture, string $firstname)
{
    return sprintf(
        "
    <div class='flex justify-between items-center border-b p-3 px-4 border-gray-300 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-700'>
        <div class='flex'>
            <img src='profile_pics/%s' alt='logo' class='self-center w-16 rounded-full border border-2 dark:border-gray-700'>
            <span class='self-center ml-4 text-xl font-medium'>%s</span>
        </div>
    </div>",
        $profilePicture,
        $firstname
    );
}
