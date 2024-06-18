<?php
include_once '../config/database.php';
include_once '../controllers/RequestController.php';
include_once '../middleware/authMiddleware.php';

AuthMiddleware::authenticate();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];

    $requestController = new RequestController();
    $result = $requestController->delete($id);

    if ($result) {
        echo "Requerimento excluído com sucesso!";
    } else {
        echo "Erro ao excluir requerimento.";
    }
}
?>
