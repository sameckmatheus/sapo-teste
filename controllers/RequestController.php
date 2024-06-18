<?php
include_once '../config/database.php';
include_once '../models/Request.php';

class RequestController {
    private $db;
    private $request;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->request = new Request($this->db);
    }

    public function create($usuario_id, $descricao, $tipo) {
        $this->request->usuario_id = $usuario_id;
        $this->request->descricao = $descricao;
        $this->request->tipo = $tipo;
        $this->request->status = 'pendente';
        $this->request->data_criacao = date('Y-m-d H:i:s');
        $this->request->prazo_exclusao = date('Y-m-d H:i:s', strtotime('+72 hours'));

        if ($this->request->create()) {
            return true;
        } else {
            return false;
        }
    }

    public function read($usuario_id) {
        $this->request->usuario_id = $usuario_id;
        $stmt = $this->request->read();
        $requests = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $request_item = [
                'id' => $id,
                'descricao' => $descricao,
                'tipo' => $tipo,
                'status' => $status,
                'data_criacao' => $data_criacao,
                'prazo_exclusao' => $prazo_exclusao,
            ];
            array_push($requests, $request_item);
        }

        return $requests;
    }

    public function update($id, $descricao, $tipo, $status) {
        $this->request->id = $id;
        $this->request->descricao = $descricao;
        $this->request->tipo = $tipo;
        $this->request->status = $status;

        if ($this->request->update()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id) {
        $this->request->id = $id;

        if ($this->request->canBeDeleted()) {
            if ($this->request->delete()) {
                return true;
            }
        }

        return false;
    }

    public function updateStatus($id, $status) {
        if ($this->request->updateStatus($id, $status)) {
            return true;
        } else {
            return false;
        }
    }
}
?>
