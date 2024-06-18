<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: views/login.php");
    exit();
} else {
    header("Location: views/list_requests.php");
    exit();
}
?>
