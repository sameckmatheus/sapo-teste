<?php
class AuthMiddleware {
    public static function authenticate() {
        session_start();

        // Verifica se o usuário está autenticado
        if (!isset($_SESSION['user_id'])) {
            // Redireciona para a página de login se não estiver autenticado
            header("Location: ../public/views/login.php");
            exit();
        }
    }

    public static function isAdmin() {
        session_start();

        // Verifica se o usuário é um administrador
        if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'administrador') {
            // Redireciona para a página de login se não for administrador
            header("Location: ../public/views/login.php");
            exit();
        }
    }
}
?>
