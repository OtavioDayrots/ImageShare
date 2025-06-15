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
    <div class="form-cadastro-container">
        <h1 class="form-cadastro-title">Cadastro de Usuário</h1>
        <form action="" method="POST">
            <div class="form-cadastro-group">
                <label class="form-cadastro-label" for="nome">Nome:</label>
                <input class="form-cadastro-input" type="text" name="nome" required placeholder="Digite seu nome">
            </div>
            <div class="form-cadastro-group">
                <label class="form-cadastro-label" for="email">Email:</label>
                <input class="form-cadastro-input" type="text" name="email" required placeholder="Digite seu email">
            </div>
            <button type="submit" class="form-cadastro-button">Cadastrar</button>
        </form>
    </div>
</body>
</html>