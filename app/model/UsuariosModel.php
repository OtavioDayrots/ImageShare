<?php
require_once __DIR__ . "/BaseModel.php";

class UsuariosModel extends BaseModel {
    public function __construct() {
        $this->tabelaname = 'usuarios';
        parent::__construct();
    }

    /**
     * sumary of criar
     * @param array $usuario
     *   ['nome', 'email', 'img_perfil_id']
     * @return void
     */

    public function salvar($usuario) {
        $query = "INSERT INTO $this->tabelaname (nome, email, img_perfil_id)
            Values (:nome, :email, :img_perfil_id)";

            $stmt = $this->pdo->prepare($query);

            $stmt->execute([
                ':nome' => $usuario['nome'],
                ':email' => $usuario['email'],
                ':img_perfil_id' => $usuario['img_perfil_id']
            ]);
    }
}