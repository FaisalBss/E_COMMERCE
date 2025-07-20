<?php
function checkSessionTimeout($timeout = 300) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout) {
        session_unset();
        session_destroy();
        header("Location: index.php?timeout=true");
        exit();
    }

    $_SESSION['last_activity'] = time();
}
