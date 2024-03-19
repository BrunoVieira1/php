-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19-Mar-2024 às 16:38
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`codigo`, `nome`) VALUES
(1, 'honda'),
(2, 'fiat'),
(3, 'fds');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE `modelo` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `codmarca` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`codigo`, `nome`, `codmarca`) VALUES
(1, 'Type-R', 1),
(2, 'fodase', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo`, `nome`, `login`, `senha`) VALUES
(1, 'a', 'b', 'xesq'),
(2, 'aa', 'aa', 'xesque');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `codigo` int(5) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `codmodelo` int(5) NOT NULL,
  `ano` int(4) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `opcionais` varchar(100) NOT NULL,
  `valor` float(10,2) NOT NULL,
  `foto1` varchar(150) NOT NULL,
  `foto2` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`codigo`, `descricao`, `codmodelo`, `ano`, `cor`, `placa`, `opcionais`, `valor`, `foto1`, `foto2`) VALUES
(1, 'bmw x7', 1, 2024, 'preto', 'xesqdele', 'sei la', 1000000.00, '97bf3a24ddfccce4b8e656a9416f2f36.jpg', '97bf3a24ddfccce4b8e656a9416f2f362.jpeg'),
(2, 'RAM RAMPAGE', 2, 2023, 'Vermelho', 'xesqdele', '2.0 TURBO DIESEL REBEL 4X4 AUTOMATICO', 214890.00, 'baf5ec5e2600a8a59662edc7f607d1c8.jpg', 'baf5ec5e2600a8a59662edc7f607d1c81).jpg'),
(3, 'AUDI Q5', 1, 2023, 'Branco', 'xesquedele', '2.0 55 TFSIE PHEV SPORTBACK PERFORMANCE QUATTRO S TRONIC', 399900.00, 'b8209686585e65c81bfa16dd811750b7.jpg', 'b8209686585e65c81bfa16dd811750b749.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codmarca` (`codmarca`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codmodelo` (`codmodelo`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`codmarca`) REFERENCES `marca` (`codigo`);

--
-- Limitadores para a tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `veiculo_ibfk_1` FOREIGN KEY (`codmodelo`) REFERENCES `modelo` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
