-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 09-Ago-2023 às 14:41
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `acervo`
--

CREATE TABLE `acervo` (
  `id` int(11) NOT NULL,
  `nome` varchar(140) NOT NULL,
  `genero` varchar(140) NOT NULL,
  `autor` varchar(140) NOT NULL,
  `anoPublicado` int(11) NOT NULL,
  `qtdLivros` int(11) NOT NULL,
  `capaLivro` varchar(140) NOT NULL,
  `editora` varchar(140) NOT NULL,
  `cdd` varchar(140) NOT NULL,
  `cdu` varchar(140) NOT NULL,
  `nPags` int(140) NOT NULL,
  `isbn` varchar(140) NOT NULL,
  `qtdEmprestimo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acervo`
--

INSERT INTO `acervo` (`id`, `nome`, `genero`, `autor`, `anoPublicado`, `qtdLivros`, `capaLivro`, `editora`, `cdd`, `cdu`, `nPags`, `isbn`, `qtdEmprestimo`) VALUES
(1, 'Harry Potter', 'Fantasia', 'J. K. Rowling', 2001, 10, '2023.08.09-10.44.59.jpg', 'ksadsad', '1234(3)-12', '1234(3)-12', 200, '1234(3)-12', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastroalunos`
--

CREATE TABLE `cadastroalunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(140) NOT NULL,
  `turma` varchar(140) NOT NULL,
  `telefone` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastroturmas`
--

CREATE TABLE `cadastroturmas` (
  `id` int(11) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `num_alunos` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimos`
--

CREATE TABLE `emprestimos` (
  `id` int(11) NOT NULL,
  `aluno` varchar(140) NOT NULL,
  `telefone` varchar(140) NOT NULL,
  `livro` varchar(140) NOT NULL,
  `dataEmprestimo` date NOT NULL,
  `dataDevolucao` date NOT NULL,
  `capaLivro` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `loginadm`
--

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
-- Indexes for table `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cadastroalunos`
--
ALTER TABLE `cadastroalunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cadastroturmas`
--
ALTER TABLE `cadastroturmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loginadm`
--
ALTER TABLE `loginadm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;