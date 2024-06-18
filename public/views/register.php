<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Registro</h1>
        <form action="../register_action.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <br>
            <button type="submit">Registrar</button>
        </form>
        <p>Já tem uma conta? <a href="login.php">Faça login aqui</a>.</p>
    </div>
</body>
</html>
