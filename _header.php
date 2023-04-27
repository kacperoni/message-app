<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <title>Message App</title>
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
</head>
<?php
ob_start();
include "autoload.php";
include "helpers.php";
$database = new Database();
$session = new Session();
$user = new User();
$conversation = new Conversation($database);
?>

<body class="bg-gray-200 dark:bg-gray-700">
    <div class="w-full mx-auto md:pt-32 pt-8">
        <div class="xl:w-1/4 w-3/4 mx-auto">
            <?= $session->getFlashMessages() ?>
        </div>