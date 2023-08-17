-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 17-Ago-2023 às 14:33
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--
CREATE DATABASE IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `biblioteca`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acervo`
--

DROP TABLE IF EXISTS `acervo`;
CREATE TABLE `acervo` (
  `id` int(11) NOT NULL,
  `nome` varchar(140) NOT NULL,
  `genero` varchar(140) NOT NULL,
  `autor` varchar(140) NOT NULL,
  `anoPublicado` int(11) NOT NULL,
  `qtdLivros` int(11) NOT NULL,
  `capaLivro` varchar(140) NOT NULL,
  `editora` varchar(140) NOT NULL,
  `rua` varchar(140) NOT NULL,
  `estante` varchar(140) NOT NULL,
  `nPags` int(140) NOT NULL,
  `isbn` varchar(140) NOT NULL,
  `prateleira` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acervo`
--

INSERT INTO `acervo` (`id`, `nome`, `genero`, `autor`, `anoPublicado`, `qtdLivros`, `capaLivro`, `editora`, `rua`, `estante`, `nPags`, `isbn`, `prateleira`) VALUES
(1, 'Harry Potter', 'Fantasia', 'J. K. Rowling', 2001, 10, '2023.08.16-07.59.09.jpg', 'ksadsad', 'Rua Germano Bastos', '2', 200, '1234(3)-12', '3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastroalunos`
--

DROP TABLE IF EXISTS `cadastroalunos`;
CREATE TABLE `cadastroalunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(140) NOT NULL,
  `turma` varchar(140) NOT NULL,
  `telefone` varchar(25) NOT NULL,
  `endereco` varchar(140) NOT NULL,
  `nMatricula` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadastroalunos`
--

INSERT INTO `cadastroalunos` (`id`, `nome`, `turma`, `telefone`, `endereco`, `nMatricula`) VALUES
(1, 'Fellas', '301', '(47) 9 8432-1234', 'Rua SÃ£o Vicente', 1234567890),
(2, 'Dassa', '1ÂºA', '(47) 9 4002-8422', 'Rua ButuÃ­', 1324657890);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastroturmas`
--

DROP TABLE IF EXISTS `cadastroturmas`;
CREATE TABLE `cadastroturmas` (
  `id` int(11) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `num_alunos` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `devolucoes`
--

DROP TABLE IF EXISTS `devolucoes`;
CREATE TABLE `devolucoes` (
  `id` int(11) NOT NULL,
  `emprestimoID` int(11) DEFAULT NULL,
  `dataDevolucao` date DEFAULT NULL,
  `multaPaga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `devolucoes`
--

INSERT INTO `devolucoes` (`id`, `emprestimoID`, `dataDevolucao`, `multaPaga`) VALUES
(3, 12, '2023-08-24', '0.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimos`
--

DROP TABLE IF EXISTS `emprestimos`;
CREATE TABLE `emprestimos` (
  `id` int(11) NOT NULL,
  `livroID` int(11) NOT NULL,
  `estudanteID` int(140) DEFAULT NULL,
  `dataEmprestimo` date NOT NULL,
  `dataDevolucao` date NOT NULL,
  `devolvido` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `emprestimos`
--

INSERT INTO `emprestimos` (`id`, `livroID`, `estudanteID`, `dataEmprestimo`, `dataDevolucao`, `devolvido`) VALUES
(12, 1, 1, '2023-08-17', '2023-08-24', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `loginadm`
--

DROP TABLE IF EXISTS `loginadm`;
CREATE TABLE `loginadm` (
  `id` int(11) NOT NULL,
  `nomeUsuario` varchar(140) NOT NULL,
  `senha` varchar(16) NOT NULL,
  `telefone` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `loginadm`
--

INSERT INTO `loginadm` (`id`, `nomeUsuario`, `senha`, `telefone`) VALUES
(1, 'Administrador', 'adminsesi', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acervo`
--
ALTER TABLE `acervo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cadastroalunos`
--
ALTER TABLE `cadastroalunos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cadastroturmas`
--
ALTER TABLE `cadastroturmas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devolucoes`
--
ALTER TABLE `devolucoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emprestimoID` (`emprestimoID`);

--
-- Indexes for table `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livro_id` (`livroID`),
  ADD KEY `usuario_id` (`estudanteID`);

--
-- Indexes for table `loginadm`
--
ALTER TABLE `loginadm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acervo`
--
ALTER TABLE `acervo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cadastroalunos`
--
ALTER TABLE `cadastroalunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cadastroturmas`
--
ALTER TABLE `cadastroturmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `devolucoes`
--
ALTER TABLE `devolucoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `loginadm`
--
ALTER TABLE `loginadm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `devolucoes`
--
ALTER TABLE `devolucoes`
  ADD CONSTRAINT `devolucoes_ibfk_1` FOREIGN KEY (`emprestimoID`) REFERENCES `emprestimos` (`id`);

--
-- Limitadores para a tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD CONSTRAINT `emprestimos_ibfk_1` FOREIGN KEY (`livroID`) REFERENCES `acervo` (`id`),
  ADD CONSTRAINT `emprestimos_ibfk_2` FOREIGN KEY (`estudanteID`) REFERENCES `cadastroalunos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
