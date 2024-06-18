<?php
require '../controllers/UserController.php';
require '../controllers/RequestController.php';

$request_method = $_SERVER["REQUEST_METHOD"];
$request_uri = explode('/', $_SERVER['REQUEST_URI']);
$resource = $request_uri[2];
$id = isset($request_uri[3]) ? $request_uri[3] : null;

header("Content-Type: application/json");

switch($request_method) {
    case 'POST':
        if ($resource == 'register') {
            $data = json_decode(file_get_contents("php://input"));
            $userController = new UserController();
            $result = $userController->register($data->nome, $data->email, $data->senha);
            echo json_encode($result);
        } elseif ($resource == 'login') {
            $data = json_decode(file_get_contents("php://input"));
            $userController = new UserController();
            $result = $userController->login($data->email, $data->senha);
            echo json_encode($result);
        } elseif ($resource == 'requests') {
            $data = json_decode(file_get_contents("php://input"));
            $requestController = new RequestController();
            $result = $requestController->create($data->usuario_id, $data->descricao, $data->tipo);
            echo json_encode($result);
        }
        break;

    case 'GET':
        if ($resource == 'requests' && $id) {
            $requestController = new RequestController();
            $result = $requestController->read($id);
            echo json_encode($result);
        }
        break;

    case 'PUT':
        if ($resource == 'requests' && $id) {
            $data = json_decode(file_get_contents("php://input"));
            $requestController = new RequestController();
            $result = $requestController->update($id, $data->descricao, $data->tipo, $data->status);
            echo json_encode($result);
        }
        break;

    case 'DELETE':
        if ($resource == 'requests' && $id) {
            $requestController = new RequestController();
            $result = $requestController->delete($id);
            echo json_encode($result);
        }
        break;
}
?>
