<?php
require_once __DIR__ . "/BaseModel.php";

class ImagensModel extends BaseModel {
    public function __construct() {
        $this->tabelaname = 'imagens';
        parent::__construct();
    }

    /**
     * sumary of criar
     * @param array $imagem
     *   ['nome', 'nome_original', 'caminho']
     * @return void
     */

    public function salvar($imagem) {
        $query = "INSERT INTO $this->tabelaname (nome, nome_original, caminho)
            Values (:nome, :nome_original, :caminho)";

            $stmt = $this->pdo->prepare($query);

            $stmt->execute([
                ':nome' => $imagem['nome'],
                ':nome_original' => $imagem['nome_original'],
                ':caminho' => $imagem['caminho']
            ]);
    }

    /**
     * sumary of buscarTodas
     * @param array $imagem
     *   ['nome', 'nome_original', 'caminho']
     * @return void
     */

    public function buscarTodas():array {
        $query = "SELECT * FROM $this->tabelaname";

            $stmt = $this->pdo->prepare($query);    
            $stmt->execute();

            return $stmt->fetchAll();
    }
}