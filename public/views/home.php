<?php
include_once '../../middleware/authMiddleware.php';
AuthMiddleware::authenticate();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Bem-vindo ao Sistema SAAP</h1>
        <p>Visão geral do sistema.</p>
        <nav>
            <ul>
                <li><a href="create_request.php">Criar Requerimento</a></li>
                <li><a href="list_requests.php">Meus Requerimentos</a></li>
                <?php if ($_SESSION['user_type'] === 'administrador'): ?>
                    <li><a href="admin_requests.php">Administração de Requerimentos</a></li>
                <?php endif; ?>
                <li><a href="request_results.php">Resultados dos Requerimentos</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>
