<?php include "_header.php" ?>
<?php
if (isset($_POST['register_submit'])) {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
        $session->setFlashMessage('warning', 'Fields cannot be empty!');
        header("Location: register.php");
    } else {
        $firstname = $database->escapeString($_POST['name']);
        $email = $database->escapeString($_POST['email']);
        $password = $database->escapeString($_POST['password']);
        $profilePictureName = $_FILES['profilePicture']['name'];
        $profilePictureTmpName = $_FILES['profilePicture']['tmp_name'];
        $targetDir = "profile_pics/";
        $tmp = explode('.', $profilePictureName);
        $profilePictureExtension = strtolower(end($tmp));
        $allowedExtensions = ['jpeg', 'jpg', 'png'];

        if ($database->numRows("SELECT id FROM users WHERE email = ?", [$email])) {
            $session->setFlashMessage('warning', "This email is already taken.");
            header("Location: register.php");
        } else {
            if (!empty($profilePictureName) && !in_array($profilePictureExtension, $allowedExtensions)) {
                $session->setFlashMessage('error', "Extension not allowed, please choose a JPEG or PNG file.");
                header("Location: register.php");
            }
            if (!$session->isErrorMessage()) {
                if (!empty($profilePictureName))
                    move_uploaded_file($profilePictureTmpName, $targetDir . $profilePictureName);
                else
                    $profilePictureName = 'default_profile.png';

                $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
                $sql = "INSERT INTO users (email, firstname, password, profilePicture) VALUES (?, ?, ?, ?)";
                $database->query($sql, [$email, $firstname, $password, $profilePictureName]);
                $session->setFlashMessage('success', 'Account has been created!');
                header("Location: index.php");
            }
        }
    }
}
?>
<div class="bg-white dark:bg-gray-800 dark:text-white shadow-xl rounded-md xl:w-1/4 w-3/4 mx-auto p-8">
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
            <input type="password" name="password" class="block w-full p-2 rounded-lg border border-gray-300 dark:border-gray-700 mb-4 bg-gray-50 dark:bg-gray-700 text-black dark:text-white
                    focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400" placeholder="Password" />
        </div>
        <div class="flex justify-between items-center">
            <button type="submit" name="register_submit" class="bg-cyan-400 hover:bg-cyan-500 p-2 px-5 rounded-md shadow-md text-gray-100 font-semibold">Register</button>
            <div><a href="index.php" class="text-gray-400 font-medium text-sm">Login</a></div>
        </div>
    </form>

</div>
</div>
</body>

</html>