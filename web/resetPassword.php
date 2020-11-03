<?php
require_once "header.php"
?>

    <div class="workArea" id="loginFormArea">
        <form method="POST" action="login_handler.php">
            <div>Email: <input type="text" name="email" id="email" /></div>
            <input type="submit" value="Reset password">
        </form>
        <a href="newuser.php">Create an account</a>
        <a href="login.php">Login into existing account</a>
    </div>

<?php
require_once "footer.php"
?>