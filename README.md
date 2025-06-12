# 📸 Galeria Fácil

Um sistema web simples e intuitivo para upload, exibição e download de imagens. Permite que usuários cadastrem-se, enviem suas fotos, visualizem todas as imagens em uma galeria organizada e façam o download das imagens desejadas.

## Funcionalidades

- Cadastro de usuários
- Upload de imagens com nome original e data de envio
- Visualização das fotos em uma galeria responsiva
- Download das imagens diretamente pela interface
- Organização e exibição das informações de cada foto

## Tecnologias Utilizadas

- PHP
- MySQL
- HTML5 & CSS3 (Grid Layout)
- XAMPP (para ambiente local)

## Instalação

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
   ```

2. **Coloque o projeto na pasta `htdocs` do XAMPP:**
   ```
   C:\xampp\htdocs\download_imgs
   ```

3. **Crie o banco de dados MySQL:**
   - Acesse o phpMyAdmin.
   - Importe o arquivo `database.sql` (caso exista) ou crie as tabelas manualmente conforme o modelo abaixo:

   ```sql
   CREATE TABLE usuarios (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nome VARCHAR(100) NOT NULL
   );

   CREATE TABLE imagens (
       id INT AUTO_INCREMENT PRIMARY KEY,
       caminho VARCHAR(255) NOT NULL,
       nome_original VARCHAR(255),
       data_envio DATETIME,
       usuario_id INT,
       FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
   );
   ```

4. **Configure a conexão com o banco de dados:**
   - Edite o arquivo de configuração (ex: `app/config/database.php`) com os dados do seu MySQL.

5. **Inicie o servidor Apache e MySQL pelo XAMPP.**

6. **Acesse o sistema pelo navegador:**
   ```
   http://localhost/download_imgs
   ```

## Como usar

- Cadastre um usuário.
- Faça upload de imagens.
- Visualize e baixe as imagens na galeria.

## Contribuição

Sinta-se à vontade para abrir issues ou enviar pull requests!

## Licença

Este projeto está sob a licença MIT. 