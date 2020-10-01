<html>

<head>
    <title>
        Lazydocuments
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="header" class="headerFooter">
        <div class="flexLeft">
            <div class="flexElement">
                <a href="/">
                    <img id="logoimg" class="headerIcon" src="img\android-chrome-192x192.png" alt="Website logo">
                </a>
            </div>
            <div class="flexElement">
                <h1>Lazydocuments</h1>
            </div>
        </div>
        <div>
            <!--Name of a section goes here-->
        </div>
        <div class="flexRight">
            <div id="login" class="flexElement flexFirstRightElement">
                <a id="loginLink" href="login.php">Login</a>
            </div>
            <div id="userIcon" class="flexElement">
                <a href=""><img class="headerIcon" src="img\iconfinder_user-ciecle-round-account-person_3209203 (1).png"></a>
            </div>
        </div>

    </div>

    <div class="workArea" id="loginFormArea">
       
            <form method="POST" action="login_handler.php">
                <div>Email: <input type="text" name="email" id="email" /></div>
                <div>Comment: <input type="password" name="passw" id="passw" /></div>
                <input type="submit" value="Login">
            </form>
            <a href="">Create an account</a>
            <a href="">Restore password</a>

    </div>

    <div id="footer" class="headerFooter">
        <div class="flexLeft"></div>
        <div id="copyright">Copyright 2020</div>
        <div class="flexRight">
            <div class="flexElement flexFirstRightElement"><a href="help.php">Help</a></div>
        </div>
</body>

</html>