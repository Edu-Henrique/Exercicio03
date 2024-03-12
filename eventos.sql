-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/03/2024 às 12:17
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `eventos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidade`
--

CREATE TABLE `cidade` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `sigla` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cidade`
--

INSERT INTO `cidade` (`id`, `nome`, `sigla`) VALUES
(1, 'Cáceres', 'MT'),
(2, 'Cuiaba', 'MT'),
(3, 'Sinop', 'MT'),
(4, 'Lucas do Rio Verde', 'MT'),
(5, 'Porto Velho', 'RO'),
(6, 'Belém', 'PA'),
(7, 'Curitiba', 'PR'),
(8, 'Belo Horizonte', 'MG'),
(9, 'Campo Grande', 'MS'),
(10, 'Florianópolis', 'SC');

-- --------------------------------------------------------

--
-- Estrutura para tabela `inscricao`
--

CREATE TABLE `inscricao` (
  `id` int(11) NOT NULL,
  `id_participante` int(11) DEFAULT NULL,
  `id_palestra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `inscricao`
--

INSERT INTO `inscricao` (`id`, `id_participante`, `id_palestra`) VALUES
(1, 1, 1),
(2, 2, 7),
(3, 4, 7),
(4, 3, 11),
(5, 4, 3),
(6, 6, 7),
(7, 7, 11),
(8, 4, 1),
(9, 6, 1),
(10, 4, 20),
(11, 2, 3),
(12, 7, 20),
(13, 3, 20);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ministrante`
--

CREATE TABLE `ministrante` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `telefone` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ministrante`
--

INSERT INTO `ministrante` (`id`, `nome`, `telefone`, `email`) VALUES
(1, 'Eduardo', '999999999', 'eduardo@teste.com'),
(2, 'Henrique', '988888888', 'henrique@teste.com'),
(3, 'João', '977777777', 'joao@teste.com'),
(4, 'Pedro', '966666666', 'pedro@teste.com'),
(5, 'Gustavo', '998989898', 'gustavo@teste.com'),
(6, 'Anderson', '997979797', 'anderson@teste.com'),
(7, 'Wallatan', '987777777', 'wallatan@teste.com'),
(8, 'Emilly', '995555555', 'emilly@teste.com'),
(9, 'Isabele', '995959595', 'isabele@teste.com'),
(10, 'Ana', '999999999', 'ana@teste.com'),
(14, 'Gabriella', '995555555', 'gabi@teste.com'),
(18, 'Rafael', '65996969696', 'rafael@teste.com'),
(19, 'teste 2', '6598888888', 'jpedro@teste.com'),
(20, 'José', '995555555', 'jose@teste.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `palestras`
--

CREATE TABLE `palestras` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `data` text NOT NULL,
  `turno` text NOT NULL,
  `duracao` text NOT NULL,
  `tema` text NOT NULL,
  `sala` text NOT NULL,
  `ministrante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `palestras`
--

INSERT INTO `palestras` (`id`, `nome`, `data`, `turno`, `duracao`, `tema`, `sala`, `ministrante`) VALUES
(1, 'Programação Orientada a Objetos', '2024-03-15', 'matutino', '5', 'Programação', '10', 1),
(3, 'Educação Financeira', '2024-03-17', 'noturno', '3', 'Eduacação', '5', 8),
(7, 'Protegendo Servidores Cloud', '2024-03-16', 'vespertino', '5', 'segurança', '18', 5),
(11, 'Evolução do JS', '2024-03-17', 'matutino', '2', 'Programação', '1', 4),
(15, 'Testes Automatizados 1.1', '2024-03-16', 'vespertino', '7', 'Programação', '2', 14),
(20, 'Protegendo Servidores', '2024-03-21', 'noturno', '5', 'Eduacação', '31', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `participante`
--

CREATE TABLE `participante` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `endereco` text NOT NULL,
  `bairro` text NOT NULL,
  `cidade` int(11) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `participante`
--

INSERT INTO `participante` (`id`, `nome`, `endereco`, `bairro`, `cidade`, `telefone`, `email`) VALUES
(1, 'Eduardo', 'Rua do Além', 'Centro', 2, '65999999999', 'eduardo@teste.com'),
(2, 'Henrique', 'Rua do Além, 123', 'Centro', 5, '6598888888', 'henrique@teste.com'),
(3, 'João', 'Rua a', 'Centro', 8, '6598888888', 'jpedro@teste.com'),
(4, 'Anderson Primal', 'Rua do Além', 'Vitória Regia', 6, '6598888888', 'anderson@teste.com'),
(5, 'Wallatan', 'Rua do Além', 'Centro', 10, '6598888888', 'wallatan@teste.com'),
(6, 'Maria', 'rua ksl', 'Ácre', 7, '65987777777', 'maria@teste.com'),
(7, 'Emilly', 'Rua da madeira', 'centro', 8, '65987777777', 'emilly@teste.com'),
(12, 'Bruna', 'Rua das Dores', 'Centro', 4, '65999999999', 'bruna@teste.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `ministrante`
--
ALTER TABLE `ministrante`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `palestras`
--
ALTER TABLE `palestras`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `inscricao`
--
ALTER TABLE `inscricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `ministrante`
--
ALTER TABLE `ministrante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `palestras`
--
ALTER TABLE `palestras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `participante`
--
ALTER TABLE `participante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
