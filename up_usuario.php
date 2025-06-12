<?php require_once __DIR__ . "/app/model/UsuariosModel.php"; ?>

<?php require_once __DIR__ . '/componetes/head.php'; ?>  

<body>
    <form action="" method="POST">
        <div class="input_user">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>
        </div>
        <div class="input_user">
            <label for="email">email:</label>
            <input type="text" name="email" required>
        </div>
        <div class="input_user">
            <label for="img_perfil">Foto de Perfil:</label>
            <input type="file" name="img_perfil" accept="image/*" value="NULL">
        </div>
    </form>
</body>
</html>