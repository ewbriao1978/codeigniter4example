-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 01/05/2020 às 20:54
-- Versão do servidor: 10.4.6-MariaDB
-- Versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `PurchasesDB`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `passwd`) VALUES
(6, 'Eduardo BriÃ£o', 'eduardo.briao@gmail.com', '6d6354ece40846bf7fca65dfabd5d9d4'),
(7, 'Leonel Messi', 'leonel.messi@barcelona.com.es', 'd94d81a75c0e8c0aef4e46a08206426b'),
(8, 'Fernando Carvalho', 'fernando.carvalho@unisul.com.br', 'cebdd715d4ecaafee8f147c2e85e0754'),
(9, 'Christiano Ronaldo', 'christiano.ronaldo@juventus.com.it', '22e4a29fca09d9a15981388cddaed67a'),
(10, 'Paulo Isidoro', 'paulo.isidoro@hotmail.com', 'dd41cb18c930753cbecf993f828603dc'),
(11, 'admin', 'admin@admin.adm', '21232f297a57a5a743894a0e4a801fc3'),
(12, 'Ricardo Almeida', 'ricardo.almeida@prado.net', '6720720054e9d24fbf6c20a831ff287e'),
(26, 'Emanuelle Dourado Brião', 'emanuelle.briao@roblox.com', '9d61e037ecd00b1005f3384d54fdcaf2'),
(27, 'Henrique Dourado Brião', 'henrique.briao@lego.com', '83a6c8fb8e054de73cb4f76c3c6f9701');

-- --------------------------------------------------------

--
-- Estrutura para tabela `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `orders`
--

INSERT INTO `orders` (`id`, `description`, `amount`, `customer_id`) VALUES
(4, 'Chuteira de ouro', 7, 7),
(5, 'Titulos', 50, 7),
(8, 'External HDs ', 6, 6),
(14, 'Book', 1, 6),
(15, 'Computador', 1, 8),
(16, 'External HDs', 2, 8),
(17, 'Mouse', 2, 8),
(18, 'Nintendo Switch', 1, 9),
(19, 'The Legend of Zelda - Breath of the Wild', 1, 9),
(21, 'Mouse', 10, 6),
(22, 'MousePad', 1, 6),
(23, 'IPad', 1, 6),
(24, 'Iphone X', 1, 6),
(25, 'Samsung J8', 1, 6);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_order` (`customer_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_id_order` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
