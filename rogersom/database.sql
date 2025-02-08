-- Criar o banco de dados chamado 'contato'
CREATE DATABASE IF NOT EXISTS contato;

-- Usar o banco de dados 'contato'
USE contato;

-- Criar a tabela 'mensagens'
CREATE TABLE IF NOT EXISTS mensagens (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Identificador único para cada mensagem
    nome VARCHAR(100) NOT NULL,       -- Campo para armazenar o nome do usuário
    email VARCHAR(150) NOT NULL,      -- Campo para armazenar o e-mail do usuário
    mensagem TEXT NOT NULL,           -- Campo para armazenar a mensagem enviada
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Data e hora de envio
);

