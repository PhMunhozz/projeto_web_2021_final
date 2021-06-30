-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Jun-2021 às 14:00
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_web_2021_1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `situacao` bit(1) NOT NULL DEFAULT b'1',
  `data_hora_criacao` datetime NOT NULL DEFAULT current_timestamp(),
  `data_hora_atualizacao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `situacao`, `data_hora_criacao`, `data_hora_atualizacao`) VALUES
(1, 'Bebidas', b'1', '2021-06-30 08:45:57', '2021-06-30 08:45:57'),
(2, 'Frutas', b'1', '2021-06-30 08:46:13', '2021-06-30 08:46:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id`, `estado_id`, `nome`) VALUES
(1, 1, 'Belo Horizonte'),
(2, 2, 'São Paulo'),
(3, 3, 'Rio de Janeiro'),
(4, 1, 'Três Corações');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mensagem` varchar(200) NOT NULL,
  `cidade_id` int(11) NOT NULL,
  `data_hora` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sigla` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id`, `nome`, `sigla`) VALUES
(1, 'Minas Gerais', 'MG'),
(2, 'São Paulo', 'SP'),
(3, 'Rio de Janeiro', 'RJ'),
(4, 'Bahia', 'BA'),
(5, 'Rondônia', 'RO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `codigoid` int(11) NOT NULL,
  `tabela` varchar(50) NOT NULL,
  `observacao` varchar(250) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `logs`
--

INSERT INTO `logs` (`id`, `codigoid`, `tabela`, `observacao`, `data`) VALUES
(1, 2, 'categorias', 'Categoria \"Bebidas\" criada com sucesso', '2021-06-30 08:43:41'),
(2, 1, 'categorias', 'Categoria \"Bebidas\" criada com sucesso', '2021-06-30 08:45:57'),
(3, 2, 'categorias', 'Categoria \"Frutas\" criada com sucesso', '2021-06-30 08:46:13'),
(4, 1, 'produtos', 'Produto \"Coca\" criado com sucesso', '2021-06-30 08:52:50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `ext` varchar(5) DEFAULT NULL,
  `data_hora_criacao` datetime NOT NULL,
  `data_hora_atualizacao` datetime NOT NULL,
  `idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `foto`, `ext`, `data_hora_criacao`, `data_hora_atualizacao`, `idcategoria`) VALUES
(1, 'Coca', 'Cocacola 2l', 'foto_produto_1', 'jpg', '2021-06-30 08:52:50', '2021-06-30 08:52:50', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `data_hora_criacao` datetime NOT NULL,
  `data_hora_atualizacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cidades_FK` (`estado_id`);

--
-- Índices para tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contatos_FK` (`cidade_id`);

--
-- Índices para tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produtos_categorias_idx` (`idcategoria`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cidades`
--
ALTER TABLE `cidades`
  ADD CONSTRAINT `cidades_FK` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`);

--
-- Limitadores para a tabela `contatos`
--
ALTER TABLE `contatos`
  ADD CONSTRAINT `contatos_FK` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_categorias` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
