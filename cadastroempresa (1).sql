-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Jul-2020 às 06:45
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastroempresa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `razaosocial` varchar(40) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `rua` varchar(40) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `cidade` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `razaosocial`, `cnpj`, `cep`, `rua`, `bairro`, `estado`, `cidade`) VALUES
(48, 'google', '81131777000197', '88523340', 'Rua Doutor Jorge Blayer', 'Coral', 'SC', 'Lages'),
(49, 'microsoft', '37910543000156', '13480', 'Rua Carlos Gomes', 'Centro', 'SP', 'Limeira');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `datanascimento` date NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `salario` decimal(10,0) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `sobrenome`, `cpf`, `datanascimento`, `empresa`, `salario`, `data_hora`) VALUES
(89, 'gustavo', 'vinte', '33889736017', '2004-11-28', 'google', '1300', '2020-07-30 04:43:40'),
(90, 'joao', 'vinte', '11321809964', '2004-11-28', 'microsoft', '1000', '2020-07-30 04:43:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relacionamenrto`
--

CREATE TABLE `relacionamenrto` (
  `id` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `salario` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnpj` (`cnpj`);

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices para tabela `relacionamenrto`
--
ALTER TABLE `relacionamenrto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`),
  ADD KEY `id_pessoa` (`id_pessoa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de tabela `relacionamenrto`
--
ALTER TABLE `relacionamenrto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `relacionamenrto`
--
ALTER TABLE `relacionamenrto`
  ADD CONSTRAINT `relacionamenrto_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `relacionamenrto_ibfk_2` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
