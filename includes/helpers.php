<?php

function returnUserTile(string $profilePicture, string $firstname, bool $active, string $redirectPath = '#')
{
    if ($active)
        return sprintf(
            "
            <a href='%s'>
                <div class='flex justify-between items-center border-b p-3 px-4 border-gray-300 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-700'>
                    <div class='flex items-center'>
                        <img src='profile_pics/%s' alt='logo' class='self-center w-16 rounded-full border border-2 dark:border-gray-700'>
                        <span class='self-center ml-4 text-xl font-medium'>%s</span>
                    </div>
                    <div class='w-4 h-4 bg-green-400 rounded-full mr-8'>
                    </div>
                </div>
            </a>",
            $redirectPath,
            $profilePicture,
            $firstname
        );

    return sprintf(
        "
        <a href='%s'>
            <div class='flex justify-between items-center border-b p-3 px-4 border-gray-300 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-700'>
                <div class='flex items-center'>
                    <img src='profile_pics/%s' alt='logo' class='self-center w-16 rounded-full border border-2 dark:border-gray-700'>
                    <span class='self-center ml-4 text-xl font-medium'>%s</span>
                </div>
                <div class='text-xs font-semibold text-gray-400'>
                    Last seen:
                </div>
            </div>
        </a>",
        $redirectPath,
        $profilePicture,
        $firstname
    );
}
