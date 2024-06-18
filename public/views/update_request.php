<?php
include_once '../../middleware/authMiddleware.php';
AuthMiddleware::authenticate();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Requerimento</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Atualizar Requerimento</h1>
        <form action="../update_request_action.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <label for="tipo">Tipo de Requerimento:</label>
            <select id="tipo" name="tipo">
                <option value="ABONO DE FALTA">ABONO DE FALTA</option>
                <option value="ABONO FAMILIAR">ABONO FAMILIAR</option>
                <option value="ANOTAÇÃO EM MINHA FICHA FUNCIONAL">ANOTAÇÃO EM MINHA FICHA FUNCIONAL</option>
                <option value="DECLARAÇÃO">DECLARAÇÃO</option>
                <option value="DIVERSOS">DIVERSOS</option>
                <option value="EXONERAÇÃO">EXONERAÇÃO</option>
                <option value="FÉRIAS NO PERÍODO DE">FÉRIAS NO PERÍODO DE</option>
                <option value="LICENÇA MATERNIDADE">LICENÇA MATERNIDADE</option>
                <option value="LICENÇA PATERNIDADE">LICENÇA PATERNIDADE</option>
                <option value="OUTRO TIPO DE LICENÇA">OUTRO TIPO DE LICENÇA</option>
            </select>
            <br>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" required></textarea>
            <br>
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="pendente">Pendente</option>
                <option value="em andamento">Em Andamento</option>
                <option value="concluído">Concluído</option>
            </select>
            <br>
            <button type="submit">Atualizar Requerimento</button>
        </form>
    </div>
</body>
</html>
