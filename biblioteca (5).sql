-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 30-Ago-2023 às 12:47
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
  `rua` varchar(140) NOT NULL,
  `estante` varchar(140) NOT NULL,
  `nPags` int(11) NOT NULL,
  `isbn` varchar(140) NOT NULL,
  `prateleira` varchar(140) NOT NULL,
  `qtdEmprestimo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastroalunos`
--

CREATE TABLE `cadastroalunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(140) NOT NULL,
  `turma` varchar(140) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `endereco` varchar(140) NOT NULL,
  `nMatricula` int(11) NOT NULL,
  `qtdEmprestimo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadastroalunos`
--

INSERT INTO `cadastroalunos` (`id`, `nome`, `turma`, `telefone`, `endereco`, `nMatricula`, `qtdEmprestimo`) VALUES
(1, 'HEITOR CELLA OLIVEIRA', '2', '(47) 9 9151-2930', 'Rua Comandante Didio Costa', 1234567890, 0),
(2, 'Helena Gomes', '2', '(47) 9 8456-3628', 'Rua SÃ£o Paulo', 4545, 0),
(3, 'Morgana Battisti da Silva', '2', '47 9 9452-3614', 'Murta', 4546, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastroturmas`
--

CREATE TABLE `cadastroturmas` (
  `id` int(11) NOT NULL,
  `nome` varchar(10) NOT NULL,
  `num_alunos` varchar(140) NOT NULL,
  `turno` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadastroturmas`
--

INSERT INTO `cadastroturmas` (`id`, `nome`, `num_alunos`, `turno`) VALUES
(2, '105', '30', 'Matutino'),
(3, '205', '30', 'Matutino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clubelivro`
--

CREATE TABLE `clubelivro` (
  `id` int(11) NOT NULL,
  `nome` varchar(140) NOT NULL,
  `turma` varchar(140) NOT NULL,
  `nomeLivro` varchar(140) NOT NULL,
  `atualPag` varchar(140) NOT NULL,
  `telefone` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clubelivro`
--

INSERT INTO `clubelivro` (`id`, `nome`, `turma`, `nomeLivro`, `atualPag`, `telefone`) VALUES
(6, 'HEITOR CELLA OLIVEIRA', '301', 'Harry Potter', '150', '(47) 9 9151-2930');

-- --------------------------------------------------------

--
-- Estrutura da tabela `devolucoes`
--

CREATE TABLE `devolucoes` (
  `id` int(11) NOT NULL,
  `emprestimoID` int(11) DEFAULT NULL,
  `dataDevolucao` date DEFAULT NULL,
  `multaPaga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimos`
--

CREATE TABLE `emprestimos` (
  `id` int(11) NOT NULL,
  `livroID` int(11) NOT NULL,
  `estudanteID` int(11) DEFAULT NULL,
  `dataEmprestimo` date NOT NULL,
  `dataDevolucao` date NOT NULL,
  `devolvido` tinyint(1) DEFAULT '0',
  `qtdEmprestimo` int(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `horaleitura`
--

CREATE TABLE `horaleitura` (
  `id` int(11) NOT NULL,
  `nome` varchar(140) NOT NULL,
  `turma` varchar(140) NOT NULL,
  `nomeLivro` varchar(140) NOT NULL,
  `atualPag` int(140) NOT NULL,
  `telefone` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `horaleitura`
--

INSERT INTO `horaleitura` (`id`, `nome`, `turma`, `nomeLivro`, `atualPag`, `telefone`) VALUES
(13, 'HEITOR CELLA OLIVEIRA', '301', 'Harry Potter', 56, '(47) 9 9151-2930');

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
-- Indexes for table `clubelivro`
--
ALTER TABLE `clubelivro`
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
-- Indexes for table `horaleitura`
--
ALTER TABLE `horaleitura`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cadastroalunos`
--
ALTER TABLE `cadastroalunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cadastroturmas`
--
ALTER TABLE `cadastroturmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `clubelivro`
--
ALTER TABLE `clubelivro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `devolucoes`
--
ALTER TABLE `devolucoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `horaleitura`
--
ALTER TABLE `horaleitura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
  ADD CONSTRAINT `devolucoes_ibfk_2` FOREIGN KEY (`emprestimoID`) REFERENCES `emprestimos` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD CONSTRAINT `emprestimos_ibfk_1` FOREIGN KEY (`livroID`) REFERENCES `acervo` (`id`),
  ADD CONSTRAINT `emprestimos_ibfk_2` FOREIGN KEY (`estudanteID`) REFERENCES `cadastroalunos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
