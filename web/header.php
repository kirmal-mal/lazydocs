<?php
session_start();

?>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <div class="headerCenterElement">
        <h1><?php
            $filename = explode('.', basename($_SERVER['REQUEST_URI']))[0];
            switch ($filename) {
                case "login":
                    echo "_Login";
                    break;
                case "newuser":
                    echo "_Create New Account";
                    break;
                case "resetPassword":
                    echo "_Reset Password";
                    break;
                case "workspace":
                    $username="";
                    if (isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];
                        echo "_{$username}'s Workspace";
                    } else {
                        echo "_Workspace";
                    }
                    break;
                case "help":
                    echo "_Help";
                    break;
                default:
                    echo "";
            }
            ?></h1>
    </div>
    <div class="flexRight">
        <div id="login" class="flexElement flexFirstRightElement">
            <?php
            if (isset($_SESSION['auth']) && $_SESSION['auth'] == true) {
                echo "<a id=\"logoutLink\" href=\"logout.php\">Logout</a>";
            } else {
                echo "<a id=\"loginLink\" href=\"login.php\">Login</a>";
            }
            ?>
        </div>
        <div id="userIcon" class="flexElement">
            <?php
            if (isset($_SESSION['auth']) && $_SESSION['auth'] == true) {
                echo "<a href=\"workspace.php\"><img class=\"headerIcon\" src=\"img\\avatar_person.png\"></a>";
            } else {
                echo "<a href=\"/\"><img class=\"headerIcon\" src=\"img\\question_person.png\"></a>";
            }
            ?>

        </div>
    </div>

</div>
