<?php

require_once __DIR__ . "/app/model/ImagensModel.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['foto'])) {
        $imagem = $_FILES['foto'];

        // tratamento para tipo de arquivo apenas imagens
        $mimeTypesPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
        $extensoesPermitidas = ['jpg', 'png', 'gif'];

        if (!in_array($imagem['type'], $mimeTypesPermitidos)) {
            echo "Tipo de arquivo não permitido.";
            exit;
        }

        // parse da extensão do arquivo e verifica se é permitida
        $extensaoImagem = strtolower(pathinfo(
            $imagem['name'],
            PATHINFO_EXTENSION
        ));

        if (!in_array($extensaoImagem, $extensoesPermitidas)) {
            echo "extensão de arquivo não permitida.";
            exit;
        }

        // validação do tamanho da imagem
        $tamanhoMaximo = 16 * 1024 * 1024; // 16mb
        if ($imagem['size'] > $tamanhoMaximo) {
            echo "tamanho da imagem muito grande.";
            exit;
        }

        // tratamento para tipo de arquivo apenas imagens

        $diretorioDestino = "assets/uploads/";

        if (!is_dir($diretorioDestino)) {
            mkdir($diretorioDestino, 0777, true);
        }

        // tratamento para criar nome unico
        $nomeUnico = uniqid() . "_" . $imagem['name'];
        $caminhoDaImagem = $diretorioDestino . $nomeUnico;

        $salvou = move_uploaded_file(
            from: $imagem['tmp_name'],
            to: $caminhoDaImagem
        );

        if ($salvou) {
            $imagensModel = new ImagensModel();
            $imagensModel->salvar([
                'nome' => $nomeUnico,
                'nome_original' => $imagem['name'],
                'caminho' => $caminhoDaImagem
            ]);
        }
    }
}

?>

<?php require_once __DIR__ . '/componetes/head.php'; ?>

<body>
    <div class="upload-container">
        <?php if (isset($salvou) && $salvou): ?>
            <div class="upload-message upload-success">
                <h2>Upload Concluído!</h2>
                <p>Arquivo enviado com sucesso.</p>
                <?php if (file_exists($caminhoDaImagem)): ?>
                    <img src="<?= $caminhoDaImagem ?>" alt="Imagem enviada" class="upload-preview">
                <?php endif; ?>
            </div>
            <div class="upload-links">
                <a href="<?= $caminhoDaImagem ?>" class="upload-link" target="_blank">Ver imagem</a>
                <a href="index.php" class="upload-link secondary">Voltar para início</a>
            </div>
        <?php else: ?>
            <div class="upload-message upload-error">
                <h2>Erro no Upload</h2>
                <p>Não foi possível enviar o arquivo. Por favor, tente novamente.</p>
            </div>
            <div class="upload-links">
                <a href="index.php" class="upload-link secondary">Voltar para início</a>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>