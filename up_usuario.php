<?php 
require_once __DIR__ . "/app/model/UsuariosModel.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nome']) && isset($_POST['email'])) {
        $usuario = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'img_perfil_id' => null
        ];

        $usuarioModel = new UsuariosModel();
        $usuarioModel->salvar($usuario);
    }
}
?>

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
        <!-- <div class="input_user">
            <label for="img_perfil">Foto de Perfil:</label>
            <input type="file" name="img_perfil" accept="image/*">
        </div> -->
        <button type="submit" class="btn">Enviar</button>
    </form>
</body>
</html>