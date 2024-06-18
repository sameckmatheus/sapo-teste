<?php
include_once '../config/database.php';
include_once '../controllers/RequestController.php';
include_once '../middleware/authMiddleware.php';

AuthMiddleware::isAdmin();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $status = $_POST['status'];

    $requestController = new RequestController();
    $result = $requestController->updateStatus($id, $status);

    if ($result) {
        echo "Status do requerimento atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar status do requerimento.";
    }
}
?>
