<?php 
require_once __DIR__ ."/app/model/GaleriaModel.php";

use App\Model\GaleriaModel;

?>

<?php require_once __DIR__ . '/componetes/head.php'; ?>  

<body>
    <header>
        <nav>
            <a href="upUsuario.php">Cadastro de Usuario</a>
        </nav> 
    </header>
    <main>
        <div class="container-upload">
            <h1>Upload de Fotos</h1>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="usuarioId">Usuario Id</label>
                    <input type="text" name="usuarioId" required>
                </div>
                <div>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="upload" accept="image/*" required>
                </div>
                <button type="submit" class="btn">Enviar</button>
            </form> 
        </div>
        <div class="container-fotos">
            <h1>Fotos</h1>
            <div class="fotos">
                <?php
                $GaleriaModel = new GaleriaModel();
                $fotos = $GaleriaModel->buscarTodas() ?? [];
                foreach ($fotos as $foto) {
                    echo "
                    <figure class='foto'>
                        <a href='{$foto['imagem_caminho']}' download>
                            <img src='{$foto['imagem_caminho']}' class='card-foto' alt='Foto'>
                        </a>
                        <figcaption>
                            {$foto['imagem_nome_original']}<br>
                            <a class='usuario-link' href='usuarioGaleria.php?id={$foto['usuario_id']}'>
                                Enviado por {$foto['usuario_nome']}<br>
                            </a>
                            <small>
                                 em: {$foto['imagem_data_envio']}
                            </small>

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
