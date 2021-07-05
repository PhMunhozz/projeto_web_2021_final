-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jul-2021 às 01:13
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
  `situacao` tinyint(4) NOT NULL,
  `data_hora_criacao` datetime NOT NULL DEFAULT current_timestamp(),
  `data_hora_atualizacao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `situacao`, `data_hora_criacao`, `data_hora_atualizacao`) VALUES
(1, 'Bebidas', 1, '2021-06-30 20:59:33', '2021-07-05 11:48:07'),
(2, 'Salgados', 0, '2021-06-30 21:01:41', '2021-07-05 19:59:15');

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

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`id`, `nome`, `telefone`, `email`, `mensagem`, `cidade_id`, `data_hora`) VALUES
(1, 'Fabricio', '23123123', 'paulo.henriquemcf@gmail.com', 'BOA PA NOIIS', 2, '2021-07-05 19:54:27');

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
(1, 1, 'categorias', 'Categoria \"Bebidas\" criada com sucesso', '2021-06-30 20:59:33'),
(2, 2, 'categorias', 'Categoria \"Salgados\" criada com sucesso', '2021-06-30 21:01:41'),
(3, 3, 'categorias', 'Categoria \"Eletronicos\" criada com sucesso', '2021-06-30 21:01:50'),
(4, 3, 'categorias', 'Categoria \"Eletronicos\" alterada com sucesso', '2021-06-30 21:01:58'),
(5, 2, 'categorias', 'Categoria \"Salgados\" alterada com sucesso', '2021-06-30 21:02:03'),
(6, 3, 'categorias', 'Categoria \"Eletronicos\" deletada com sucesso', '2021-06-30 21:02:06'),
(7, 1, 'produtos', 'Produto \"Coca\" criado com sucesso', '2021-06-30 21:02:35'),
(8, 1, 'produtos', 'Produto \" TESTE 1\" alterado com sucesso', '2021-06-30 21:02:54'),
(9, 1, 'produtos', 'Produto \"Coca\" deletado com sucesso', '2021-06-30 21:03:50'),
(10, 2, 'produtos', 'Produto \"dfs\" criado com sucesso', '2021-06-30 21:04:31'),
(11, 2, 'produtos', 'Produto \"dfs\" deletado com sucesso', '2021-06-30 21:04:36'),
(12, 1, 'usuarios', 'Usuário \"gustavo\" criado com sucesso', '2021-07-01 10:11:05'),
(13, 2, 'usuarios', 'Usuário \"michel\" criado com sucesso', '2021-07-01 10:21:47'),
(14, 3, 'usuarios', 'Usuário \"paulo\" criado com sucesso', '2021-07-01 11:44:32'),
(15, 4, 'usuarios', 'Usuário \"rafael\" criado com sucesso', '2021-07-01 11:44:56'),
(16, 3, 'usuarios', 'Usuário \"paulo\" alterado com sucesso', '2021-07-01 11:46:17'),
(17, 3, 'usuarios', 'Usuário \"paulao\" alterado com sucesso', '2021-07-01 11:46:34'),
(18, 3, 'usuarios', 'Usuário \"paulo\" alterado com sucesso', '2021-07-01 11:46:46'),
(19, 4, 'usuarios', 'Usuário \"rafael\" alterado com sucesso', '2021-07-01 11:46:54'),
(20, 4, 'usuarios', 'Usuário \"rafaela\" alterado com sucesso', '2021-07-01 11:47:04'),
(21, 4, 'usuarios', 'Usuário \"rafael\" alterado com sucesso', '2021-07-01 11:47:19'),
(22, 5, 'usuarios', 'Usuário \"admin\" criado com sucesso', '2021-07-04 13:09:54'),
(23, 5, 'usuarios', 'Usuário \"admin\" alterado com sucesso', '2021-07-04 13:10:06'),
(24, 5, 'usuarios', 'Usuário \"admin\" alterado com sucesso', '2021-07-04 13:10:16'),
(25, 1, 'usuarios', 'Usuário \"admin\" criado com sucesso', '2021-07-04 13:11:29'),
(26, 1, 'categorias', 'Categoria \"Bebidas\" alterada com sucesso', '2021-07-05 11:48:07'),
(27, 3, 'produtos', 'Produto \"Coca Cola\" criado com sucesso', '2021-07-05 11:48:51'),
(28, 3, 'produtos', 'Produto \"Coca Cola\" alterado com sucesso', '2021-07-05 19:35:24'),
(29, 3, 'produtos', 'Produto \"Coca Cola\" alterado com sucesso', '2021-07-05 19:35:53'),
(30, 3, 'produtos', 'Produto \"Coca Cola\" alterado com sucesso', '2021-07-05 19:38:19'),
(31, 3, 'produtos', 'Produto \"Coca Cola\" alterado com sucesso', '2021-07-05 19:38:30'),
(32, 3, 'produtos', 'Produto \"Coca Cola\" alterado com sucesso', '2021-07-05 19:39:03'),
(33, 3, 'produtos', 'Produto \"Coca Cola\" alterado com sucesso', '2021-07-05 19:39:54'),
(34, 3, 'produtos', 'Produto \"Coca Cola\" alterado com sucesso', '2021-07-05 19:40:05'),
(35, 3, 'produtos', 'Produto \"Coca Cola\" alterado com sucesso', '2021-07-05 19:45:27'),
(36, 3, 'produtos', 'Produto \"Coca Cola\" alterado com sucesso', '2021-07-05 19:45:37'),
(37, 3, 'produtos', 'Produto \"Coca Cola\" alterado com sucesso', '2021-07-05 19:46:47'),
(38, 2, 'categorias', 'Categoria \"Salgados\" alterada com sucesso', '2021-07-05 19:59:15'),
(39, 3, 'produtos', 'Produto \"Coca Cola 2\" alterado com sucesso', '2021-07-05 20:03:41'),
(40, 3, 'produtos', 'Produto \"Coca Cola 2\" alterado com sucesso', '2021-07-05 20:07:50');

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
(3, 'Coca Cola 2', '            Refrigerante Coca Cola 2 litros  ', 'foto_produto_3', 'jpg', '2021-07-05 11:48:51', '2021-07-05 20:07:50', 1);

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
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `data_hora_criacao`, `data_hora_atualizacao`) VALUES
(1, 'Administrador', 'admin', '0192023a7bbd73250516f069df18b500', '2021-07-04 13:11:29', '2021-07-04 13:11:29');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
