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

$file = $_FILES['foto'];

echo "<pre>";
print_r($file);
echo "</pre>";


?>

<?php require_once __DIR__ . '/componetes/head.php'; ?>

<body>
    <?php if ($salvou): ?>
        <p>
            Arquivo enviado com sucesso em <?= $caminhoDaImagem ?>.
            <a href="<?= $caminhoDaImagem ?>">Ver imagem</a>
            <a href="index.php">Voltar</a>
        </p>
    <?php else: ?>
        <p>Erro ao enviar o arquivo.</p>
    <?php endif; ?>
</body>

</html>