-- =====================================================
-- BANCO DE DADOS: Gestão Financeira Rural
-- =====================================================

CREATE DATABASE IF NOT EXISTS gestao_financeira_rural
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE gestao_financeira_rural;

-- =====================================================
-- TABELA: RECEITAS
-- =====================================================
CREATE TABLE receitas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(150) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    data DATE NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- TABELA: DESPESAS
-- =====================================================
CREATE TABLE despesas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(150) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    data DATE NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- TABELA: INVESTIMENTOS
-- =====================================================
CREATE TABLE investimentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(150) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    data DATE NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- VIEW: FLUXO DE CAIXA (RESUMO FINANCEIRO)
-- =====================================================
CREATE VIEW fluxo_caixa AS
SELECT 
    (SELECT IFNULL(SUM(valor), 0) FROM receitas) AS total_receitas,
    (SELECT IFNULL(SUM(valor), 0) FROM despesas) AS total_despesas,
    (SELECT IFNULL(SUM(valor), 0) FROM investimentos) AS total_investimentos,
    (
        (SELECT IFNULL(SUM(valor), 0) FROM receitas) -
        (
            (SELECT IFNULL(SUM(valor), 0) FROM despesas) +
            (SELECT IFNULL(SUM(valor), 0) FROM investimentos)
        )
    ) AS saldo_final;

    -- =====================================================
-- Usuarios
-- =====================================================

    CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (usuario, senha)
VALUES ('admin', '$2y$10$wH9vZzKZ6qKJq5uU7uQH0eQx3uXz9YQ0X8x0wM6x7Xnq0m1oK');


