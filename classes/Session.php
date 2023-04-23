<?php

final class Session
{
    const FLASH = 'flash_messages';

    const FLASH_ERROR = 'error';
    const FLASH_WARNING = 'warning';
    const FLASH_SUCCESS = 'success';

    public function __construct()
    {
        session_start();
    }

    public function setFlashMessage(string $type, string $message)
    {
        if ($this->correctFlashMessageType($type))
            $_SESSION[self::FLASH][$type] = $message;
    }

    public function getFlashMessages(): void
    {
        if (isset($_SESSION[self::FLASH])) {
            foreach ($_SESSION[self::FLASH] as $type => $message) {
                echo $this->formatFlashMessage($type, $message);
                unset($_SESSION[self::FLASH]);
            }
        }
    }

    public function loginUser(User $user)
    {
        foreach ($user->props as $key => $value) {
            $geterName = 'get' . ucfirst($value);
            $_SESSION[$value] = $user->$geterName();
        }
        header("Location: home.php");
    }

    public function logoutUser(User $user)
    {
        session_unset();
        session_destroy();
        // $user->unsetUser();
        $this->setFlashMessage('success', 'You have been logout successfully!');
        header('Location: index.php');
    }

    private function formatFlashMessage(string $type, string $message)
    {
        $color = $this->getAlertColor($type);
        return sprintf("
            <div class='bg-$color-100 border border-$color-400 text-$color-700 px-4 py-3 xl:w-1/4 md:w-3/4 mb-4 rounded md:absolute md:top-10' role='alert'>
                <strong class='font-bold'>%s</strong>
                <span class='block sm:inline'>%s</span>
            </div>
      ", ucfirst($type), $message);
    }

    public function isErrorMessage(): bool
    {
        return isset($_SESSION[self::FLASH][self::FLASH_ERROR]);
    }

    private function correctFlashMessageType(string $type): bool
    {
        return in_array($type, [self::FLASH_ERROR, self::FLASH_WARNING, self::FLASH_SUCCESS]);
    }

    private function getAlertColor(string $type): string
    {
        if ($type === self::FLASH_ERROR) return 'red';
        if ($type === self::FLASH_WARNING) return 'orange';
        if ($type === self::FLASH_SUCCESS) return 'teal';
    }
}
