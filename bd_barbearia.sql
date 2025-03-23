-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/03/2025 às 18:41
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_barbearia`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agenda_1`
--

CREATE TABLE `agenda_1` (
  `id` int(11) NOT NULL,
  `clienteId` int(11) NOT NULL,
  `profissionalId` int(11) NOT NULL,
  `servicoId` int(11) NOT NULL,
  `data` date NOT NULL,
  `horarioId` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `tipoDeUsuario` varchar(100) NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `telefone`, `email`, `senha`, `tipoDeUsuario`) VALUES
(1, 'joao pedro teixeira da silva', '(19) 99999-9999', 'adm@gmail.com', '1234', 'admin'),
(3, 'João Teixeira', '(19) 99888-8888', 'jj@gmail.com', '12345678', 'usuario');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `produto` varchar(255) DEFAULT NULL,
  `pix` varchar(100) NOT NULL,
  `cnpj` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `horario` varchar(100) NOT NULL,
  `reservado` tinyint(1) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `unidade` int(11) NOT NULL DEFAULT 1,
  `descricao` varchar(200) NOT NULL,
  `preco` varchar(150) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `unidade`, `descricao`, `preco`, `foto`) VALUES
(5, 'Creme de barbear', 1, 'Desfrute de uma experiência de barbear suave e confortável com o nosso Creme de Barbear Premium 300ml. Formulado com ingredientes de alta qualidade', ' 60.00', '../img/Creme-de-barbear.png'),
(6, 'Máscara para cabelo', 1, 'Revitalize e nutra seus cabelos com a nossa Máscara de Cabelos Intensa 200ml. Desenvolvida com ingredientes de alta qualidade, esta máscara proporciona uma hidratação profunda, reparação dos fios e um', '25.90', '../img/Máscara-para-cabelo.png'),
(11, 'Gel', 1, 'Gel de cabelo com fórmula de fixação forte, perfeito para modelar e estilizar os fios, garantindo um visual duradouro e sem frizz. De fácil aplicação, proporciona acabamento natural ou com brilho, con', ' 50.00', '../img/Gel.png'),
(12, 'Pomada modeladora', 1, 'Pomada modeladora com efeito molhado, ideal para criar penteados com brilho intenso e acabamento natural. Sua fórmula flexível proporciona fixação duradoura, sem deixar resíduos, e é perfeita para con', ' 60.00', '../img/Pomada-modeladora.png'),
(13, 'Óleo para Barba', 1, 'Hidrata, amacia e dá brilho à barba, além de ajudar no controle de fios rebeldes. Ideal para manter a barba saudável e bem cuidada 100ml..', ' 25.00', '../img/Óleo-para-Barba.png'),
(14, 'Loção Pós-Barba', 1, 'Refresca e acalma a pele após o barbear, ajudando a prevenir irritações e queimaduras, além de deixar um aroma agradável.', ' 30.00', '../img/Loção-Pós-Barba.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `servico` varchar(100) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `preco` varchar(100) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agenda_1`
--
ALTER TABLE `agenda_1`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda_1`
--
ALTER TABLE `agenda_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
