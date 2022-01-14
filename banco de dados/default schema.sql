CREATE DATABASE IF NOT EXISTS db_kawan;

USE db_kawan;

CREATE TABLE IF NOT EXISTS tb_pessoas(
	user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_nome VARCHAR(25),
    user_sobrenome VARCHAR(25),
    user_genero VARCHAR(50),
    user_idade TINYINT,
    user_frase VARCHAR(100)
);