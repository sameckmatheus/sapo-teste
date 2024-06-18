<?php
include_once '../../middleware/authMiddleware.php';
AuthMiddleware::isAdmin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração de Requerimentos</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Administração de Requerimentos</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>Descrição</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Data de Criação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aqui você vai iterar sobre todos os requerimentos -->
                <!-- Exemplo de linha de tabela -->
                <tr>
                    <td>1</td>
                    <td>Nome do Usuário</td>
                    <td>Descrição do requerimento</td>
                    <td>Tipo do requerimento</td>
                    <td>Status do requerimento</td>
                    <td>Data de criação</td>
                    <td>
                        <a href="update_request.php?id=1">Atualizar Status</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
