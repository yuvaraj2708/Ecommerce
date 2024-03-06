<?php
session_start();

function checkLoggedIn() {
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
}
