<?php
class Request {
    private $conn;
    private $table_name = "requests";

    public $id;
    public $usuario_id;
    public $descricao;
    public $tipo;
    public $status;
    public $data_criacao;
    public $prazo_exclusao;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET usuario_id=:usuario_id, 
                      descricao=:descricao, 
                      tipo=:tipo, 
                      status=:status, 
                      data_criacao=:data_criacao, 
                      prazo_exclusao=:prazo_exclusao";

        $stmt = $this->conn->prepare($query);

        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->tipo = htmlspecialchars(strip_tags($this->tipo));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->data_criacao = htmlspecialchars(strip_tags($this->data_criacao));
        $this->prazo_exclusao = htmlspecialchars(strip_tags($this->prazo_exclusao));

        $stmt->bindParam(":usuario_id", $this->usuario_id);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":tipo", $this->tipo);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":data_criacao", $this->data_criacao);
        $stmt->bindParam(":prazo_exclusao", $this->prazo_exclusao);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE usuario_id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->usuario_id);
        $stmt->execute();

        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET descricao = :descricao, 
                      tipo = :tipo, 
                      status = :status 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->tipo = htmlspecialchars(strip_tags($this->tipo));
        $this->status = htmlspecialchars(strip_tags($this->status));

        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function canBeDeleted() {
        $query = "SELECT data_criacao FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $data_criacao = new DateTime($row['data_criacao']);
            $now = new DateTime();
            $interval = $now->diff($data_criacao);
            $hours = $interval->h + ($interval->days * 24);

            return $hours <= 72;
        }

        return false;
    }

    public function updateStatus($id, $status) {
        $query = "UPDATE " . $this->table_name . " 
                  SET status = :status 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
