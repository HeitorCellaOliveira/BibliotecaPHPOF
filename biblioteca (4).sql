-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 23-Ago-2023 às 23:52
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acervo`
--

DROP TABLE IF EXISTS `acervo`;
CREATE TABLE IF NOT EXISTS `acervo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(140) NOT NULL,
  `genero` varchar(140) NOT NULL,
  `autor` varchar(140) NOT NULL,
  `anoPublicado` int NOT NULL,
  `qtdLivros` int NOT NULL,
  `capaLivro` varchar(140) NOT NULL,
  `editora` varchar(140) NOT NULL,
  `rua` varchar(140) NOT NULL,
  `estante` varchar(140) NOT NULL,
  `nPags` int NOT NULL,
  `isbn` varchar(140) NOT NULL,
  `prateleira` varchar(140) NOT NULL,
  `qtdEmprestimo` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acervo`
--

INSERT INTO `acervo` (`id`, `nome`, `genero`, `autor`, `anoPublicado`, `qtdLivros`, `capaLivro`, `editora`, `rua`, `estante`, `nPags`, `isbn`, `prateleira`, `qtdEmprestimo`) VALUES
(12, 'Harry Potter', 'Fantasia', 'J.K Rolling', 2001, 10, '2023.08.23-19.05.41.png', 'Bloomsbury', '2', 'A', 448, '978-8532530783', '1A', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastroalunos`
--

DROP TABLE IF EXISTS `cadastroalunos`;
CREATE TABLE IF NOT EXISTS `cadastroalunos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(140) NOT NULL,
  `turma` varchar(140) NOT NULL,
  `telefone` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `endereco` varchar(140) NOT NULL,
  `nMatricula` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastroturmas`
--

DROP TABLE IF EXISTS `cadastroturmas`;
CREATE TABLE IF NOT EXISTS `cadastroturmas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(140) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `num_alunos` varchar(140) NOT NULL,
  `turno` varchar(140) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clubelivro`
--

DROP TABLE IF EXISTS `clubelivro`;
CREATE TABLE IF NOT EXISTS `clubelivro` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(140) NOT NULL,
  `turma` varchar(140) NOT NULL,
  `nomeLivro` varchar(140) NOT NULL,
  `atualPag` varchar(140) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `clubelivro`
--

INSERT INTO `clubelivro` (`id`, `nome`, `turma`, `nomeLivro`, `atualPag`, `telefone`) VALUES
(2, 'Heitor Cella Oliveira', '3º EM', 'Harry Potter', '205', '(47) 9 9151-2930');

-- --------------------------------------------------------

--
-- Estrutura da tabela `devolucoes`
--

DROP TABLE IF EXISTS `devolucoes`;
CREATE TABLE IF NOT EXISTS `devolucoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emprestimoID` int DEFAULT NULL,
  `dataDevolucao` date DEFAULT NULL,
  `multaPaga` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emprestimoID` (`emprestimoID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimos`
--

DROP TABLE IF EXISTS `emprestimos`;
CREATE TABLE IF NOT EXISTS `emprestimos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `livroID` int NOT NULL,
  `estudanteID` int DEFAULT NULL,
  `dataEmprestimo` date NOT NULL,
  `dataDevolucao` date NOT NULL,
  `devolvido` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `livro_id` (`livroID`),
  KEY `usuario_id` (`estudanteID`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `loginadm`
--

DROP TABLE IF EXISTS `loginadm`;
CREATE TABLE IF NOT EXISTS `loginadm` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomeUsuario` varchar(140) NOT NULL,
  `senha` varchar(16) NOT NULL,
  `telefone` varchar(140) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `loginadm`
--

INSERT INTO `loginadm` (`id`, `nomeUsuario`, `senha`, `telefone`) VALUES
(1, 'Administrador', 'adminsesi', '');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `devolucoes`
--
ALTER TABLE `devolucoes`
  ADD CONSTRAINT `devolucoes_ibfk_2` FOREIGN KEY (`emprestimoID`) REFERENCES `emprestimos` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD CONSTRAINT `emprestimos_ibfk_1` FOREIGN KEY (`livroID`) REFERENCES `acervo` (`id`),
  ADD CONSTRAINT `emprestimos_ibfk_2` FOREIGN KEY (`estudanteID`) REFERENCES `cadastroalunos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
