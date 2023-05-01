<?php

function returnUserTile(array $userParams, string $redirectPath = '#')
{
    if ($userParams['active'])
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
            $userParams['profilePicture'],
            $userParams['firstname']
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
                    Last seen: <div>%s</div>
                </div>
            </div>
        </a>",
        $redirectPath,
        $userParams['profilePicture'],
        $userParams['firstname'],
        getLastSeenDate($userParams['lastSeen'])
    );
}

function getLastSeenDate(string $lastSeen): string
{
    $timezone = new DateTimeZone('Europe/Warsaw');

    $lastSeen = new DateTime($lastSeen);
    $lastSeen->setTimezone($timezone);

    $currentTime = new DateTime();
    $currentTime->setTimeZone($timezone);

    $lastSeen = $currentTime->diff($lastSeen);
    if ($lastSeen->d <= 0 && $lastSeen->h <= 0) {
        return $lastSeen->i != 0 ? $lastSeen->i . ' min ago' : '1 min ago';
    } else if ($lastSeen->d <= 0 && $lastSeen->h >= 0) {
        return $lastSeen->h . ' hours ago';
    }

    return $lastSeen->d . ' days ago';
}
