<?php
if (isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $message) {
        echo "<div class='bad'>{$message}</div>";
    }
    $_SESSION['errors'] = array();
    $_SESSION['repopulate'] = array();
    $_SESSION['isValid'] = array();
}

