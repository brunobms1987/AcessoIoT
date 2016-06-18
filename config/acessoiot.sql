-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Jun-2016 às 21:53
-- Versão do servidor: 5.6.26-log
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acessoiot`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `histlocal`
--

CREATE TABLE `histlocal` (
  `id` int(11) NOT NULL,
  `histLocalData` datetime NOT NULL,
  `histLocalInfo` varchar(45) NOT NULL,
  `PessoaLocal_pessoa_id` int(11) NOT NULL,
  `PessoaLocal_local_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `histpessoa`
--

CREATE TABLE `histpessoa` (
  `id` int(11) NOT NULL,
  `histPessoaData` datetime NOT NULL,
  `histPessoaInfo` varchar(45) NOT NULL,
  `PessoaLocal_pessoa_id` int(11) NOT NULL,
  `PessoaLocal_local_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `local`
--

CREATE TABLE `local` (
  `id` int(11) NOT NULL,
  `localDescricao` varchar(45) NOT NULL,
  `tipoLocalId` int(11) NOT NULL,
  `localUser01` int(11) NOT NULL,
  `localUser02` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `local`
--

INSERT INTO `local` (`id`, `localDescricao`, `tipoLocalId`, `localUser01`, `localUser02`) VALUES
(1, 'Sala B12', 2, 1, 3),
(2, 'Laboratório B18', 1, 1, 2),
(3, 'Sala de Testes', 1, 2, 1),
(4, 'Sala B14', 2, 2, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `logacesso`
--

CREATE TABLE `logacesso` (
  `id` int(11) NOT NULL,
  `data_acesso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pessoa` varchar(10) NOT NULL,
  `local` varchar(10) DEFAULT NULL,
  `tag` varchar(10) DEFAULT NULL,
  `situacao` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `logacesso`
--

INSERT INTO `logacesso` (`id`, `data_acesso`, `pessoa`, `local`, `tag`, `situacao`) VALUES
(1, '2016-06-18 14:51:35', 'bruno', 'B18', 'BRUNO123', 'LIBERADO'),
(2, '2016-06-20 14:55:50', 'jose', 'B12', 'JOSE1234', 'LIBERADO'),
(3, '2016-06-19 23:20:20', 'bruno', 'B12', 'BRUNO123', 'NEGADO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `pessoaNome` varchar(45) NOT NULL,
  `pessoaCPF` varchar(14) NOT NULL DEFAULT '999.999.999-99',
  `pessoaNascimento` date NOT NULL,
  `pessoaTelefone` varchar(12) DEFAULT NULL,
  `pessoaCelular` varchar(12) DEFAULT NULL,
  `pessoaRFID` varchar(45) DEFAULT NULL,
  `pessoaLogin` varchar(45) NOT NULL,
  `pessoaSenha` varchar(45) NOT NULL,
  `pessoaEmail` varchar(45) NOT NULL,
  `tipoUsuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `pessoaNome`, `pessoaCPF`, `pessoaNascimento`, `pessoaTelefone`, `pessoaCelular`, `pessoaRFID`, `pessoaLogin`, `pessoaSenha`, `pessoaEmail`, `tipoUsuario_id`) VALUES
(1, 'Bruno Martins', '123.456.789-01', '1987-01-16', '55-9999-9999', '55-8888-8888', 'BRUNO123', 'bruno', '1234', 'brunobms1987@gmail.com', 1),
(2, 'José da Silva', '12345612301', '2001-02-20', '55-6666-6666', '55-7777-7777', 'JOSE1234', 'jose', '1234', 'jose_silva@jose.gmail.js', 2),
(3, 'Pedro Hernesto Editado', '82893902012', '1987-04-18', '66-5555-7777', '44-5555-8888', 'ABCD0011', 'pedroEditado', '1234', 'teste@esder.coasdsa.Editado', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoalocal`
--

CREATE TABLE `pessoalocal` (
  `pessoa_id` int(11) NOT NULL,
  `local_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipolocal`
--

CREATE TABLE `tipolocal` (
  `id` int(11) NOT NULL,
  `tipoLocalDescricao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipolocal`
--

INSERT INTO `tipolocal` (`id`, `tipoLocalDescricao`) VALUES
(1, 'Laboratório'),
(2, 'Sala de Aula');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id` int(11) NOT NULL,
  `tipoUsuarioDescricao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `tipoUsuarioDescricao`) VALUES
(1, 'Administrador'),
(2, 'Comum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `histlocal`
--
ALTER TABLE `histlocal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_histLocal_PessoaLocal1_idx` (`PessoaLocal_pessoa_id`,`PessoaLocal_local_id`);

--
-- Indexes for table `histpessoa`
--
ALTER TABLE `histpessoa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_histPessoa_PessoaLocal1_idx` (`PessoaLocal_pessoa_id`,`PessoaLocal_local_id`);

--
-- Indexes for table `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_local_tipoLocal1_idx` (`tipoLocalId`);

--
-- Indexes for table `logacesso`
--
ALTER TABLE `logacesso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pessoaCPF_UNIQUE` (`pessoaCPF`),
  ADD UNIQUE KEY `pessoaLogin_UNIQUE` (`pessoaLogin`),
  ADD KEY `fk_pessoa_tipoUsuario1_idx` (`tipoUsuario_id`);

--
-- Indexes for table `pessoalocal`
--
ALTER TABLE `pessoalocal`
  ADD PRIMARY KEY (`pessoa_id`,`local_id`),
  ADD KEY `fk_pessoa_has_local_local1_idx` (`local_id`),
  ADD KEY `fk_pessoa_has_local_pessoa1_idx` (`pessoa_id`);

--
-- Indexes for table `tipolocal`
--
ALTER TABLE `tipolocal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `histlocal`
--
ALTER TABLE `histlocal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `histpessoa`
--
ALTER TABLE `histpessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `local`
--
ALTER TABLE `local`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `logacesso`
--
ALTER TABLE `logacesso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipolocal`
--
ALTER TABLE `tipolocal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `histlocal`
--
ALTER TABLE `histlocal`
  ADD CONSTRAINT `fk_histLocal_PessoaLocal1` FOREIGN KEY (`PessoaLocal_pessoa_id`,`PessoaLocal_local_id`) REFERENCES `pessoalocal` (`pessoa_id`, `local_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `histpessoa`
--
ALTER TABLE `histpessoa`
  ADD CONSTRAINT `fk_histPessoa_PessoaLocal1` FOREIGN KEY (`PessoaLocal_pessoa_id`,`PessoaLocal_local_id`) REFERENCES `pessoalocal` (`pessoa_id`, `local_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `fk_local_tipoLocal1` FOREIGN KEY (`tipoLocalId`) REFERENCES `tipolocal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `fk_pessoa_tipoUsuario1` FOREIGN KEY (`tipoUsuario_id`) REFERENCES `tipousuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pessoalocal`
--
ALTER TABLE `pessoalocal`
  ADD CONSTRAINT `fk_pessoa_has_local_local1` FOREIGN KEY (`local_id`) REFERENCES `local` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pessoa_has_local_pessoa1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
