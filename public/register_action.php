<?php
include_once '../config/database.php';
include_once '../controllers/UserController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $userController = new UserController();
    $result = $userController->register($nome, $email, $senha);

    if ($result) {
        session_start();
        $_SESSION['user_id'] = $userController->user->id;
        $_SESSION['user_type'] = $userController->user->tipo;
        header("Location: views/list_requests.php");
        exit();
    } else {
        echo "Erro ao registrar usuário.";
    }
}
?>
