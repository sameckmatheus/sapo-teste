<?php
include_once '../config/database.php';
include_once '../controllers/UserController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $userController = new UserController();
    $result = $userController->login($email, $senha);

    if ($result) {
        session_start();
        $_SESSION['user_id'] = $userController->user->id;
        $_SESSION['user_type'] = $userController->user->tipo;
        header("Location: views/home.php");
        exit();
    } else {
        echo "Erro ao fazer login.";
    }
}
?>
