-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/06/2024 às 03:55
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
-- Banco de dados: `m_up`
--
DROP DATABASE IF EXISTS `m_up`;
CREATE DATABASE IF NOT EXISTS `m_up`;
USE `m_up`; 
-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `idCom` int(11) NOT NULL,
  `usuario_idUsu` int(11) NOT NULL,
  `produto_idPro` int(11) NOT NULL,
  `estrelas` int(11) DEFAULT 1,
  `comentarioPro` varchar(250) DEFAULT NULL,
  `situacaoComentarioPro` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `comentario`
--

INSERT INTO `comentario` (`idCom`, `usuario_idUsu`, `produto_idPro`, `estrelas`, `comentarioPro`, `situacaoComentarioPro`) VALUES
(1, 2, 3, 4, 'Muito bom! Gostei.', 'Ativo'),
(2, 2, 2, 5, 'Excelente. Produto top.', 'Ativo'),
(13, 17, 2, 4, 'Sempre fui bastante fã desse!', 'Ativo'),
(14, 17, 3, 2, 'Não achei que esse funcionou bem em mim', 'Ativo'),
(15, 19, 4, 5, 'Esse é um dos melhores da BlackSkull, o preço pode parecer meio alto mas o resultado é bem real', 'Ativo'),
(16, 20, 4, 3, 'O produto é bom mas eu acho o preço meio alto pra 300 gramas', 'Ativo'),
(17, 20, 2, 5, 'esse aqui eu curto tanto pela quantidade mas pelo preço tambem', 'Ativo'),
(19, 20, 3, 5, '	É um dos que eu mais gosto pro pré treino, o preço tá ótimo diferente de uns outros aí', 'Ativo'),
(20, 21, 11, 5, 'Adquiri este multivitamínico para complementar minha dieta e estou muito satisfeito. A qualidade dos ingredientes é excelente e o preço é competitivo em relação a outras opções no mercado.', 'Ativo'),
(21, 21, 3, 3, 'Testei ele durante esses ultimos dias e achei que era um pouco melhor pelacapa', 'Ativo'),
(22, 21, 1, 1, 'achei esse horrivel', 'Ativo'),
(23, 23, 4, 1, 'Fui compra esse negócio ruim pq tinha um cara falando bem, vá toma no cu Carlos. Joguei grana fora por tua causa', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `idPro` int(11) NOT NULL,
  `nomePro` varchar(100) NOT NULL,
  `valorPro` decimal(13,2) DEFAULT 0.00,
  `imagemPro` varchar(100) DEFAULT NULL,
  `marcaPro` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`idPro`, `nomePro`, `valorPro`, `imagemPro`, `marcaPro`) VALUES
(1, '100% Whey Protein Gold Standard Sabor Rocky Road - 907g', 200.00, '6658b8a23044a_dourado-Photoroom.png-Photoroom.png', 'OPTIMUM NUTRITION'),
(2, 'Whey Protein Pote Sabor Cookies & Cream - 900g', 200.00, '6658c2bea92cc_potreico-azul-Photoroom.png-Photoroom.png', 'MAX TITANIUM'),
(3, 'Pré-Treino Haze Hardcore Sabor Tutti Frutti - 300g', 100.00, '6658c2689e452_haze-Photoroom.png', 'GROWTH SUPPLEMENTS'),
(4, 'Pré-Treino B.O.P.E Frutas Vermelhas - 300g', 122.00, '6658bae05b469_blackSkull-Photoroom.png-Photoroom.png', 'BLACK SKULL'),
(5, 'Creatina Monohidratada - 150G', 125.00, '6658c373ea208_creatinaBlackSkull-Photoroom.png-Photoroom.png', 'BLACK SKULL'),
(6, 'Creatina Monohidratada Powder Hardcore - 300g', 100.00, '6658c51f89afd_creatinaIntegral-Photoroom.png-Photoroom.png', 'INTEGRALMEDICA'),
(7, 'Creatina 100% Pura Monohidratada - 300g', 100.00, '6658c73e83dbe_creatinaMaxtitanium-Photoroom.png-Photoroom.png', 'MAX TITANIUM'),
(11, 'Multivitamínico (120 CÁPS) (NOVA FÓRMULA)', 36.90, '666a24af2c951_produto-principal.png', 'GROWTH SUPPLEMENTS'),
(16, 'Pré-Treino Insanity Sabor Limão - 300G', 108.00, '666a2f2a624d8_insanity-300g-growth-supplements-v3.png', 'GROWTH SUPPLEMENTS'),
(17, 'Beta-Alanina em pó (NOVA FÓRMULA) - 250G', 63.00, '666a30de724ca_Capturar.PNG', 'GROWTH SUPPLEMENTS'),
(18, 'Chocolate Fit - Display C/ 8UN.', 29.70, '666a32c311776_Chocolate-Growth.PNG', 'GROWTH SUPPLEMENTS'),
(19, 'Pasta de Amendoim Crocante - 500G', 25.20, '666a3563e606b_produto01.png', 'GROWTH SUPPLEMENTS'),
(20, 'Triple Joint - 60 CAPS', 59.90, '666a373b470a2_blackSkull-pilulas.PNG', 'BLACK SKULL'),
(21, 'Gluta C19 - Glutamina com Vitaminas e Minerais - 300G', 129.90, '666a3bd570092_157144-1200-auto.png', 'BLACK SKULL'),
(23, 'Whey Protein Concentrado 80% HD ', 109.90, '666a3d0642abb_blackSkullWhey.PNG', 'BLACK SKULL');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsu` int(11) NOT NULL,
  `nomeUsu` varchar(150) NOT NULL,
  `telefoneUsu` varchar(25) DEFAULT NULL,
  `emailUsu` varchar(150) DEFAULT NULL,
  `senhaUsu` varchar(50) DEFAULT NULL COMMENT 'Criptografia por MD5',
  `perfilUsu` varchar(45) DEFAULT 'Cliente' COMMENT 'Administrador\nFuncionário\nCliente',
  `situacaoUsu` char(7) DEFAULT 'Ativo' COMMENT 'Ativo\nInativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idUsu`, `nomeUsu`, `telefoneUsu`, `emailUsu`, `senhaUsu`, `perfilUsu`, `situacaoUsu`) VALUES
(1, 'Administrador do Sistema', '', 'adm@gmail.com', '202cb962ac59075b964b07152d234b70', 'Administrador', 'Ativo'),
(2, 'Guilherme Messias', '', 'Messias @gmail.com', '202cb962ac59075b964b07152d234b70', 'Administrador', 'Ativo'),
(4, 'guilherme bortone cardoso', '', 'gui@gmail.com', '202cb962ac59075b964b07152d234b70', 'Funcionário', 'Ativo'),
(8, 'Joana Sampaio', NULL, 'jojosam@gmail.com', '202cb962ac59075b964b07152d234b70', 'Cliente', 'Ativo'),
(17, 'Graziela B Cardoso', '', 'grazi@gmailcom', '202cb962ac59075b964b07152d234b70', 'Funcionário', 'Ativo'),
(18, 'José Castro Alves', '', 'joseca@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Funcionário', 'Ativo'),
(19, 'Carlos Horbus Eduardo', '', 'cadu@hotmail.com', '202cb962ac59075b964b07152d234b70', 'Cliente', 'Ativo'),
(20, 'Bruno Varella', '', 'brunoaldeia@gmail.com', '202cb962ac59075b964b07152d234b70', 'Cliente', 'Ativo'),
(21, 'Ronaldo Fernandes', '', 'ronaldin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Cliente', 'Ativo'),
(22, 'Gabriel Estevão', '', 'gabigol@hotmail.com', '202cb962ac59075b964b07152d234b70', 'Cliente', 'Ativo'),
(23, 'Daniel Alves', '', 'danibel@outlook.com', '202cb962ac59075b964b07152d234b70', 'Cliente', 'Ativo');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idCom`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idPro`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsu`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idCom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idPro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
