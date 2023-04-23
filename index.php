<?php include "_header.php" ?>
<?php
if (isset($_POST['login_submit'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $session->setFlashMessage('warning', 'Fields cannot be empty!');
        header("Location: index.php");
    } else {
        $email = $database->escapeString($_POST['email']);
        $password = $database->escapeString($_POST['password']);
        $sql = "SELECT * FROM users WHERE email = ?";
        if ($database->numRows($sql, [$email])) {
            $user->instantiation($database->fetchAssoc($sql, [$email]));
            if (password_verify($password, $user->getPassword())) {
                $session->loginUser($user);
            } else {
                $session->setFlashMessage('error', 'Wrong password! Try again!');
                header('Location: index.php');
            }
        } else {
            $session->setFlashMessage('error', 'These credentials do not match our records! Try again!');
            header("Location: index.php");
        }
    }
}
?>
<div class="bg-white dark:bg-gray-800 dark:text-white shadow-xl rounded-md xl:w-1/4 w-3/4 mx-auto p-8">
    <img src="../images/379512_chat_icon.png" alt="logo" class="w-48 mx-auto">
    <form method="POST">
        <div>
            <label for="email" class="block mb-2 font-medium text-sm ml-1 text-gray-900 dark:text-white">E-mail</label>
            <input type="text" name="email" class="block w-full p-2 rounded-lg border border-gray-300 dark:border-gray-700 mb-4 bg-gray-50 dark:bg-gray-700 text-black dark:text-white
                    focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400" placeholder="E-mail" />
        </div>
        <div>
            <label for="password" class="block mb-2 font-medium text-sm ml-1 text-gray-900 dark:text-white">Password</label>
            <input type="password" name="password" class="block w-full p-2 rounded-lg border border-gray-300 dark:border-gray-700 mb-4 bg-gray-50 dark:bg-gray-700 text-black dark:text-white
                    focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400" placeholder="Password" />
        </div>
        <div class="md:flex md:justify-between items-center">
            <button type="submit" name="login_submit" class="bg-cyan-400 hover:bg-cyan-500 p-2 px-5 rounded-md shadow-md text-gray-100 font-semibold">Login</button>
            <div class="md:mt-0 mt-4"><a href="register.php" class="text-gray-400 font-medium text-sm">Register for an account</a></div>
        </div>
    </form>

</div>
</div>
</body>

</html>