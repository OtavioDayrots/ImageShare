CREATE DATABASE webapp;
USE webapp;

CREATE TABLE imagens (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    nome_original VARCHAR(255) NOT NULL,
    data_envio DATETIME DEFAULT CURRENT_TIMESTAMP,
    caminho VARCHAR(255) NOT NULL
);

create table usuarios (
	id int primary key auto_increment,
    nome varchar(255) not null,
    email varchar(255) not null,
    data_envio DATETIME DEFAULT CURRENT_TIMESTAMP,
    img_perfil_id INT, -- chave estrangeira
    FOREIGN KEY (img_perfil_id) REFERENCES imagens(id)
)
