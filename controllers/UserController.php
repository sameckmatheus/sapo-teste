<?php
include_once '../config/database.php';
include_once '../models/User.php';

class UserController {
    private $db;
    public $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function register($nome, $email, $senha) {
        $this->user->nome = $nome;
        $this->user->email = $email;
        $this->user->senha_raw = $senha;
        $this->user->tipo = 'usuario';

        if ($this->user->create()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $senha) {
        $this->user->email = $email;
        $this->user->senha_raw = $senha;

        if ($this->user->login()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
