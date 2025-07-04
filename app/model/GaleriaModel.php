<?php

namespace App\Model;

require_once __DIR__ . "/BaseModel.php";

class GaleriaModel extends BaseModel {
    public function __construct() {
        $this->tabelaname = 'galeria';
        parent::__construct();
    }
    /**
     * Summary of salvar
     * @param string $imagemId
     * @param string $usuarioId
     *
     * @return bool
     */

     public function salvar($imagemId, $usuarioId)
     {
         $query = "INSERT INTO $this->tabelaname (imagem_id, usuario_id)
             VALUES (:imagemId, :usuarioId)";
 
         $stmt = $this->pdo->prepare($query);

         return $stmt->execute([
             ':imagemId' => $imagemId,
             ':usuarioId' => $usuarioId
         ]);
     }
  /**
     * Summary of buscarTodas
     * @return array
     *      [ 'imagem_nome', 'imagem_nome_original', 'imagem_caminho', 'usuario_id', 'usuario_nome' ]
     */
    public function buscarTodas(): array
    {
        $query = "SELECT 
            i.nome as imagem_nome, 
            i.nome_original as imagem_nome_original,
            i.caminho as imagem_caminho,
            i.data_envio as imagem_data_envio,
            u.id as usuario_id,
            u.nome as usuario_nome
            from galeria g
            join imagens i on i.id = g.imagem_id
            join usuarios u on u.id = g.usuario_id
        ";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * Summary of buscarPorUsuarioId
     * @param string $usuarioId
     * @return array
     *      [ 'imagem_nome', 'imagem_nome_original', 'imagem_caminho', 'usuario_id', 'usuario_nome' ]
     */
    public function buscarPorUsuarioId($usuarioId): array
    {
        $query = "SELECT 
            i.nome as imagem_nome, 
            i.nome_original as imagem_nome_original,
            i.caminho as imagem_caminho,
            i.data_envio as imagem_data_envio,
            u.id as usuario_id,
            u.nome as usuario_nome
            from galeria g
            join imagens i on i.id = g.imagem_id
            join usuarios u on u.id = g.usuario_id
            WHERE g.usuario_id = :usuarioId
        ";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':usuarioId' => $usuarioId
        ]);

        return $stmt->fetchAll();
    }
}
