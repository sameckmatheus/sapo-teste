<?php
include_once '../config/database.php';
include_once '../controllers/RequestController.php';
include_once '../middleware/authMiddleware.php';

AuthMiddleware::authenticate();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $descricao = $_POST['descricao'];
    $tipo = $_POST['tipo'];
    $status = $_POST['status'];

    $requestController = new RequestController();
    $result = $requestController->update($id, $descricao, $tipo, $status);

    if ($result) {
        echo "Requerimento atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar requerimento.";
    }
}
?>
