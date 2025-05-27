-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/05/2025 às 16:11
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
-- Banco de dados: `academia`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `idcarrinho` int(11) NOT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `compras`
--

CREATE TABLE `compras` (
  `idcompra` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` decimal(10,2) NOT NULL,
  `frete` decimal(10,2) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `status` enum('Pendente','Pago','Enviado','Entregue','Cancelado') DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `contato`
--

CREATE TABLE `contato` (
  `idcontato` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `assunto` varchar(150) DEFAULT NULL,
  `mensagem` text DEFAULT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `loja`
--

CREATE TABLE `loja` (
  `idloja` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estoque` int(11) DEFAULT 0,
  `categoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `plano`
--

CREATE TABLE `plano` (
  `idplano` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `descricao` text DEFAULT NULL,
  `duracao` int(11) DEFAULT NULL,
  `beneficios` text DEFAULT NULL,
  `status` enum('Pendente','Pago','Cancelado') DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `idproduto` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `frete` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `treino`
--

CREATE TABLE `treino` (
  `idtreino` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `dias` varchar(50) NOT NULL,
  `tempo` time NOT NULL,
  `grupomuscular` enum('Peito','Costas','Pernas','Ombros','Abdomem') NOT NULL,
  `dataexecucao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `treino`
--

INSERT INTO `treino` (`idtreino`, `nome`, `descricao`, `dias`, `tempo`, `grupomuscular`, `dataexecucao`) VALUES
(1, 'crucifixo ', 'nenhuma', 'quarta', '00:20:00', 'Ombros', '2005-06-05');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nomeuser` varchar(100) NOT NULL,
  `cpf` char(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `dataNascimento` date NOT NULL,
  `genero` enum('Masculino','Feminino','Outro') NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cep` char(8) NOT NULL,
  `info_medica` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`iduser`, `nomeuser`, `cpf`, `email`, `telefone`, `dataNascimento`, `genero`, `endereco`, `cidade`, `estado`, `cep`, `info_medica`, `senha`) VALUES
(4, 'lalau', '030.105.154', 'iandemeloely@gmail.com', '15151515', '0552-02-04', 'Masculino', 'ruaruaruaruaruarua', 'cidadecidadecidadecidade', 'estado', 'rs', 'sim', '$2y$10$UdZQvPWCArjFo7PbE2a4zOCxL7ooRFnQp02uuyeiW7c1Fm7lWi1xC'),
(10, 'lucas', '85988596053', 'eunsei@gmail.com', '54996307651', '6666-06-06', 'Outro', 'whasinton luis', 'porto alegre', 'Rio Grande do Sul', '90020020', 'possuo uma perna machucada', '$2y$10$s57Ys17t.DAR4ERnAme83OMvUgpWZFH40IzzWllLe0BXjmH99Fh1.'),
(11, 'Rech', '14465633765', 'eunsei@gmail.com', '54996307651', '2208-06-05', 'Feminino', 'whasinton luis', 'porto alegre', 'Rio Grande do Sul', '90020020', 'Nenhuma', '$2y$10$yeRrPU49Vp.MCGRSTuTQ6eDkGTvic3udBy.Kxc/B/KY1fr9lYQxh2'),
(12, 'William Ávila', '85988596053', 'wbavila@gmail.com', '51 995130469', '1995-07-20', 'Masculino', 'Rua dos Alfeneiros', 'Porto Alegre', 'Rio Grande do Sul', '91787197', 'Sou manco e não tenho um olho', '$2y$10$pZbIZ4aBThnPWenafqEmc.I34oS4NFvW6d4sbyoQLJOEx6CwpBWmm'),
(14, 'bruno osorio', '123456789', 'ney@gmail.com', '519934589', '2000-12-21', 'Masculino', 'acesso g', 'porto alegre', 'rs', '9179010', 'nao tenho os dois braços ', '$2y$10$Y44LMjS9X365K2G9aNHjW.zUyqmuow2c72ZPBQ9454m1sFlXARbDq'),
(15, 'pedro', '14465633765', 'eunsei@gmail.com', '54996307651', '0004-04-01', 'Masculino', 'whasinton luis', 'porto alegre', 'Rio Grande do Sul', '90020020', 'ss', '$2y$10$MNzURZ/oo5P6rpvFElqEjuqobrzYP02hPnaroEJvoFwFhlmoVWT8u'),
(26, 'laco', '03089047020', 'eunsei@gmail.com', '54996307651', '0002-06-05', 'Masculino', 'whasinton luis', 'porto alegre', 'Rio Grande do Sul', '90020020', 'Nenhuma', '$2y$10$yc8TwicPbQV8NlNIKXJlwOYq5aOFCDctuX8YEuHSEfKeHHSswtKUC'),
(27, 'lalaco', '123456', 'eunsei@gmail.com', '54996307651', '0005-02-01', 'Feminino', 'whasinton luis', 'porto alegre', 'Rio Grande do Sul', '90020020', '123', '$2y$10$DmS9c78a2wlASEJlCq7SUefwW.nYb2YyJGRSrqmAo623Emnncgt8u'),
(28, 'Aninha', '12345678956', 'ana123@gmail.com', '54996307651', '1969-10-31', 'Feminino', 'whasinton luis', 'porto alegre', 'Rio Grande do Sul', '90020020', 'None', '$2y$10$c5tiBzsU2ptE2H4z4jI99uAo7sLmb1k2IaiI6AhwFJZKGzyca6uNO'),
(29, 'aaaa', '11111', '111@111', '11', '1111-11-11', 'Masculino', 'aaaa', 'bbb', 'Rio Grande do Sul', '90880370', 'possuo uma perna machucada', '$2y$10$6af7AYUkV6v2owIf8/NElO0INpcHXMA.mi9sflAP0F4XbHuhdFZya'),
(30, 'Josmar Falcade', '123456789', 'josmarfalcade@gmail.com', '12347546', '1996-02-24', 'Masculino', 'Rua Beco sem Saída', 'Porto Alegre', 'Rio Grande do Sul', '90020020', 'hernia de disco e hemorroida', '$2y$10$UGkvk7/6nq0tvS7iumCKVeZU3mt3lk7nUAy9KUi8azMmiiUba8UHC');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`idcarrinho`);

--
-- Índices de tabela `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idcompra`);

--
-- Índices de tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`idcontato`);

--
-- Índices de tabela `loja`
--
ALTER TABLE `loja`
  ADD PRIMARY KEY (`idloja`);

--
-- Índices de tabela `plano`
--
ALTER TABLE `plano`
  ADD PRIMARY KEY (`idplano`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idproduto`);

--
-- Índices de tabela `treino`
--
ALTER TABLE `treino`
  ADD PRIMARY KEY (`idtreino`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `idcarrinho` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `idcompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `idcontato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `loja`
--
ALTER TABLE `loja`
  MODIFY `idloja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `plano`
--
ALTER TABLE `plano`
  MODIFY `idplano` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idproduto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `treino`
--
ALTER TABLE `treino`
  MODIFY `idtreino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
