<?php require_once __DIR__ ."/app/model/ImagensModel.php";?>

<?php require_once __DIR__ . '/componetes/head.php'; ?>  

<body>
    <header>
        <nav>
            <a href="up_usuario.php">Cadastro de Usuario</a>
        </nav>
    </header>
    <main>
        <div class="container-upload">
            <h1>Upload de Fotos</h1>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="upload" accept="image/*">
                <button type="submit" class="btn">Enviar</button>
            </form>
        </div>
        <div class="container-fotos">
            <h1>Fotos</h1>
            <div class="fotos">
                <?php
                $imagensModel = new ImagensModel();
                $fotos = $imagensModel->buscarTodas() ?? [];
                foreach ($fotos as $foto) {
                    echo "
                    <figure class='foto'>
                        <a href='{$foto['caminho']}' download>
                            <img src='{$foto['caminho']}' class='card-foto' alt='Foto'>
                        </a>
                        <figcaption>
                            {$foto['nome_original']}<br>
                            <small>Enviado em: {$foto['data_envio']}</small>
                        </figcaption>
                    </figure>
                    ";
                }
                ?>
            </div>
        </div>
    </main>
</body>

</html>