<?php

namespace App\Model;

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

     public function salvar($imagem)
     {
         $query = "INSERT INTO $this->tabelaname (nome, nome_original, caminho)
             VALUES (:nome, :nome_original, :caminho)";
 
         $stmt = $this->pdo->prepare($query);
 
         $salvou = $stmt->execute([
             ':nome' => $imagem['nome'],
             ':nome_original' => $imagem['nome_original'],
             ':caminho' => $imagem['caminho']
         ]);
 
         if ($salvou) {
             $query = "select * from $this->tabelaname order by id desc limit 1";
             $stmt = $this->pdo->prepare($query);
             $stmt->execute();
             return $stmt->fetch();
         }
     }
 
     /**
      * Summary of buscarTodas
      * @return array
      *      [ 'id', 'nome', 'nome_original', 'data_envio', 'caminho' ]
      */
     public function buscarTodas(): array
     {
         $query = "SELECT * FROM $this->tabelaname";
 
         $stmt = $this->pdo->prepare($query);
         $stmt->execute();
 
         return $stmt->fetchAll();
     }
}