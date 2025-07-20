<?php

function checkSessionTimeout($timeout = 300) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout) {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }

    $_SESSION['last_activity'] = time();
}

function authrizeUser() {
    if (!isset($_SESSION['username'])) {
    header("Location: index.php"); 
    exit();
    }
}
