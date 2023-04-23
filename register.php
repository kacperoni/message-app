<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Message App</title>
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
</head>
<?php
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$database = new Database();

?>
<?php
if (isset($_POST['register_submit'])) {
    $firstname = $database->escapeString($_POST['name']);
    $email = $database->escapeString($_POST['email']);
    $password = $database->escapeString($_POST['password']);
    echo $profilePicture = $_FILES['profilePicture']['name'];
}
?>

<body class="bg-gray-200 dark:bg-gray-700">
    <div class="w-full mx-auto">
        <div class="bg-white dark:bg-gray-800 dark:text-white shadow-xl rounded-md xl:w-1/4 w-3/4 mx-auto md:mt-16 mt-16  p-8">
            <img src="../images/379512_chat_icon.png" alt="logo" class="w-32 mx-auto">
            <form method="POST" enctype="multipart/form-data">
                <div>
                    <label for="name" class="block mb-2 font-medium text-sm ml-1 text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="name" class="block w-full p-2 rounded-lg border border-gray-300 dark:border-gray-700 mb-4 bg-gray-50 dark:bg-gray-700 text-black dark:text-white
                    focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400" placeholder="First name" />
                </div>
                <label class="block font-medium text-sm mb-2 ml-1 text-gray-900 dark:text-white">Profile picture</label>
                <input type="file" name="profilePicture" class="block w-full text-sm text-gray-400 mb-4
                      file:mr-4 file:p-2 file:px-5
                      file:rounded-lg file:border-0
                      file:font-semibold
                      file:bg-cyan-400 file:text-gray-100
                      hover:file:bg-cyan-500
                    " />

                <div>
                    <label for="email" class="block mb-2 font-medium text-sm ml-1 text-gray-900 dark:text-white">E-mail</label>
                    <input type="text" name="email" class="block w-full p-2 rounded-lg border border-gray-300 dark:border-gray-700 mb-4 bg-gray-50 dark:bg-gray-700 text-black dark:text-white
                    focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400" placeholder="E-mail" />
                </div>
                <div>
                    <label for="email" class="block mb-2 font-medium text-sm ml-1 text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="e-mail" class="block w-full p-2 rounded-lg border border-gray-300 dark:border-gray-700 mb-4 bg-gray-50 dark:bg-gray-700 text-black dark:text-white
                    focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400" placeholder="Password" />
                </div>
                <div class="flex justify-between items-center">
                    <button type="submit" name="register_submit" class="bg-cyan-400 hover:bg-cyan-500 p-2 px-5 rounded-md shadow-md text-gray-100 font-semibold">Register</button>
                    <div><a href="index.html" class="text-gray-400 font-medium text-sm">Login</a></div>
                </div>
            </form>

        </div>
    </div>
</body>

</html>