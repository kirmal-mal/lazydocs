<?php
require_once "header.php";
?>
    <div class="workArea" id="loginFormArea">
        <form method="POST" action="login_handler.php">
            <div>Email: <input class=<?= isset($_SESSION['isValid']['email']) ? $_SESSION['isValid']['email'] ? "validInput" : "invalidInput" : "" ?> type="text" name="email" id="email" value=<?= isset($_SESSION['repopulate']['email']) ? "{$_SESSION['repopulate']['email']}" : "" ?>></div>
            <div>Password: <input class=<?= isset($_SESSION['isValid']['passw']) ? $_SESSION['isValid']['passw'] ? "" : "invalidInput" : "" ?> type="password" name="passw" id="passw"></div>
            <input type="submit" value="Login">
        </form>
        <a href="newuser.php">Create an account</a>
        <a href="resetPassword.php">Reset password</a>
    </div>
<?php require_once "printErrors.php" ?>

<?php
require_once "footer.php"
?>