<?php
require_once "header.php";
?>

    <div class="workArea" id="loginFormArea">

        <form method="POST" action="newuser_handler.php">
            <div>Name: <input class=<?= isset($_SESSION['isValid']['name']) ? $_SESSION['isValid']['name'] ? "validInput" : "invalidInput" : "" ?> type="text" name="name" id="name" value=<?= isset($_SESSION['repopulate']['name']) ? "{$_SESSION['repopulate']['name']}" : "" ?>></div>
            <div>Email: <input class=<?= isset($_SESSION['isValid']['email']) ? $_SESSION['isValid']['email'] ? "validInput" : "invalidInput" : "" ?> type="text" name="email" id="email" value=<?= isset($_SESSION['repopulate']['email']) ? "{$_SESSION['repopulate']['email']}" : "" ?>></div>
            <div>Password: <input class=<?= isset($_SESSION['isValid']['passw']) ? $_SESSION['isValid']['passw'] ? "validInput" : "invalidInput" : "" ?> type="password" name="passw" id="passw"></div>
            <div>Confirm password: <input type="password" name="confPassw" id="confPassw"></div>
            <input type="submit" value="Create new account">
        </form>
        <a href="login.php">Login into existing account</a>
        <a href="resetPassword.php">Reset password</a>
        <?php require_once "printErrors.php" ?>
    </div>


<?php
require_once "footer.php"
?>