-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/12/2021 às 15:19
-- Versão do servidor: 10.4.17-MariaDB
-- Versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdfacilita`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbavaliacao`
--

CREATE TABLE `tbavaliacao` (
  `idAvaliacao` int(11) NOT NULL,
  `descAvaliacao` text DEFAULT NULL,
  `dataAvaliacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `idStatusServico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbchat`
--

CREATE TABLE `tbchat` (
  `idChat` int(11) NOT NULL,
  `conversaChat` text NOT NULL,
  `dataChat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idUsuario` int(11) NOT NULL,
  `visualizacao` int(11) NOT NULL,
  `registro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcontato`
--

CREATE TABLE `tbcontato` (
  `idContato` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `contatoStatus` bit(1) NOT NULL,
  `contato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcontratante`
--

CREATE TABLE `tbcontratante` (
  `idContratante` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nomeContratante` varchar(60) NOT NULL,
  `cnpjContratante` char(14) DEFAULT NULL,
  `cpfContratante` char(11) NOT NULL,
  `cepContratante` char(8) NOT NULL,
  `logradouroContratante` varchar(100) NOT NULL,
  `bairroContratante` varchar(100) NOT NULL,
  `cidadeContratante` varchar(20) NOT NULL,
  `ufContratante` char(2) NOT NULL,
  `complementoContratante` varchar(100) DEFAULT NULL,
  `fotoPerfil` varchar(1000) NOT NULL,
  `biografia` varchar(255) DEFAULT NULL,
  `dataNascimento` date NOT NULL,
  `statusPerfil` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbhabilidades`
--

CREATE TABLE `tbhabilidades` (
  `idHabilidades` int(11) NOT NULL,
  `descHabilidades` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbhabilidades`
--

INSERT INTO `tbhabilidades` (`idHabilidades`, `descHabilidades`) VALUES
(1, 'Cuidar de criança'),
(2, 'Cuidar de idosos'),
(3, 'Programar'),
(4, 'Marketing Digital'),
(5, 'Carpintaria'),
(6, 'Organizar Projetos'),
(7, 'Química'),
(8, ' Tele-vendas'),
(9, 'Atuar'),
(10, 'Marcenaria'),
(11, 'Jogar bola'),
(12, 'Dublar'),
(13, 'Cozinhar'),
(14, 'Gestão empresarial');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbhabilidadesprofissional`
--

CREATE TABLE `tbhabilidadesprofissional` (
  `idHabilidadesProfissional` int(11) NOT NULL,
  `idProfissional` int(11) NOT NULL,
  `idHabilidades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbprofissional`
--

CREATE TABLE `tbprofissional` (
  `idProfissional` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nomeProfissional` varchar(60) NOT NULL,
  `rgProfissional` char(14) NOT NULL,
  `cpfProfissional` char(11) NOT NULL,
  `cepProfissional` char(8) NOT NULL,
  `logradouroProfissional` varchar(100) NOT NULL,
  `bairroProfissional` varchar(100) NOT NULL,
  `cidadeProfissional` varchar(30) NOT NULL,
  `ufProfissional` char(2) NOT NULL,
  `complementoProfissional` varchar(100) DEFAULT NULL,
  `fotoPerfil` varchar(1000) NOT NULL,
  `biografia` varchar(255) DEFAULT NULL,
  `dataNascimento` date NOT NULL,
  `statusPerfil` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbpublicacao`
--

CREATE TABLE `tbpublicacao` (
  `idPublicacao` int(11) NOT NULL,
  `textoPublicacao` text DEFAULT NULL,
  `imagemPublicacao` varchar(1000) DEFAULT NULL,
  `dataPublicacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `curtidaPublicacao` int(11) DEFAULT NULL,
  `comentarioPublicacao` text DEFAULT NULL,
  `compartilhamentoPublicacao` int(11) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbqualificacoes`
--

CREATE TABLE `tbqualificacoes` (
  `idQualificacoes` int(11) NOT NULL,
  `formacaoQualificacao` varchar(200) DEFAULT NULL,
  `dataInicioFormacao` date DEFAULT NULL,
  `dataFimFormacao` date DEFAULT NULL,
  `idProfissional` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbservico`
--

CREATE TABLE `tbservico` (
  `idServico` int(11) NOT NULL,
  `descServico` text NOT NULL,
  `dataInicialServico` date NOT NULL,
  `dataFimServico` date NOT NULL,
  `valorServico` double NOT NULL,
  `idContratante` int(11) NOT NULL,
  `idProfissional` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbstatusservico`
--

CREATE TABLE `tbstatusservico` (
  `idStatusServico` int(11) NOT NULL,
  `descStatus` int(1) NOT NULL,
  `idServico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbtelcontratante`
--

CREATE TABLE `tbtelcontratante` (
  `idTelContratante` int(11) NOT NULL,
  `descTelContratante` char(11) NOT NULL,
  `idContratante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbtelprofissional`
--

CREATE TABLE `tbtelprofissional` (
  `idTelProfissional` int(11) NOT NULL,
  `descTelProfissional` char(11) NOT NULL,
  `idProfissional` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `idUsuario` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `dataCriacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  ADD PRIMARY KEY (`idAvaliacao`),
  ADD KEY `FK_idStatusServico` (`idStatusServico`);

--
-- Índices de tabela `tbchat`
--
ALTER TABLE `tbchat`
  ADD PRIMARY KEY (`idChat`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices de tabela `tbcontato`
--
ALTER TABLE `tbcontato`
  ADD PRIMARY KEY (`idContato`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices de tabela `tbcontratante`
--
ALTER TABLE `tbcontratante`
  ADD PRIMARY KEY (`idContratante`),
  ADD KEY `FK_idUsuario` (`idUsuario`);

--
-- Índices de tabela `tbhabilidades`
--
ALTER TABLE `tbhabilidades`
  ADD PRIMARY KEY (`idHabilidades`);

--
-- Índices de tabela `tbhabilidadesprofissional`
--
ALTER TABLE `tbhabilidadesprofissional`
  ADD PRIMARY KEY (`idHabilidadesProfissional`),
  ADD KEY `FK_idProfissional` (`idProfissional`),
  ADD KEY `FK_idHabilidades` (`idHabilidades`);

--
-- Índices de tabela `tbprofissional`
--
ALTER TABLE `tbprofissional`
  ADD PRIMARY KEY (`idProfissional`),
  ADD KEY `FK_idUsuario` (`idUsuario`);

--
-- Índices de tabela `tbpublicacao`
--
ALTER TABLE `tbpublicacao`
  ADD PRIMARY KEY (`idPublicacao`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices de tabela `tbqualificacoes`
--
ALTER TABLE `tbqualificacoes`
  ADD PRIMARY KEY (`idQualificacoes`),
  ADD KEY `FK_idProfissional` (`idProfissional`);

--
-- Índices de tabela `tbservico`
--
ALTER TABLE `tbservico`
  ADD PRIMARY KEY (`idServico`),
  ADD KEY `FK_idProfissional` (`idProfissional`),
  ADD KEY `FK_idContratante` (`idContratante`);

--
-- Índices de tabela `tbstatusservico`
--
ALTER TABLE `tbstatusservico`
  ADD PRIMARY KEY (`idStatusServico`),
  ADD KEY `idServico` (`idServico`);

--
-- Índices de tabela `tbtelcontratante`
--
ALTER TABLE `tbtelcontratante`
  ADD PRIMARY KEY (`idTelContratante`),
  ADD KEY `FK_idContratante` (`idContratante`);

--
-- Índices de tabela `tbtelprofissional`
--
ALTER TABLE `tbtelprofissional`
  ADD PRIMARY KEY (`idTelProfissional`),
  ADD KEY `FK_idProfissional` (`idProfissional`);

--
-- Índices de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  MODIFY `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbchat`
--
ALTER TABLE `tbchat`
  MODIFY `idChat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcontato`
--
ALTER TABLE `tbcontato`
  MODIFY `idContato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcontratante`
--
ALTER TABLE `tbcontratante`
  MODIFY `idContratante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbhabilidades`
--
ALTER TABLE `tbhabilidades`
  MODIFY `idHabilidades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tbhabilidadesprofissional`
--
ALTER TABLE `tbhabilidadesprofissional`
  MODIFY `idHabilidadesProfissional` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbprofissional`
--
ALTER TABLE `tbprofissional`
  MODIFY `idProfissional` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbpublicacao`
--
ALTER TABLE `tbpublicacao`
  MODIFY `idPublicacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbqualificacoes`
--
ALTER TABLE `tbqualificacoes`
  MODIFY `idQualificacoes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbservico`
--
ALTER TABLE `tbservico`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbstatusservico`
--
ALTER TABLE `tbstatusservico`
  MODIFY `idStatusServico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtelcontratante`
--
ALTER TABLE `tbtelcontratante`
  MODIFY `idTelContratante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtelprofissional`
--
ALTER TABLE `tbtelprofissional`
  MODIFY `idTelProfissional` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  ADD CONSTRAINT `tbavaliacao_ibfk_1` FOREIGN KEY (`idStatusServico`) REFERENCES `tbstatusservico` (`idStatusServico`);

--
-- Restrições para tabelas `tbcontato`
--
ALTER TABLE `tbcontato`
  ADD CONSTRAINT `tbcontato_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Restrições para tabelas `tbhabilidadesprofissional`
--
ALTER TABLE `tbhabilidadesprofissional`
  ADD CONSTRAINT `tbhabilidadesprofissional_ibfk_1` FOREIGN KEY (`idProfissional`) REFERENCES `tbprofissional` (`idProfissional`),
  ADD CONSTRAINT `tbhabilidadesprofissional_ibfk_2` FOREIGN KEY (`idHabilidades`) REFERENCES `tbhabilidades` (`idHabilidades`);

--
-- Restrições para tabelas `tbprofissional`
--
ALTER TABLE `tbprofissional`
  ADD CONSTRAINT `tbprofissional_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Restrições para tabelas `tbpublicacao`
--
ALTER TABLE `tbpublicacao`
  ADD CONSTRAINT `tbpublicacao_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Restrições para tabelas `tbqualificacoes`
--
ALTER TABLE `tbqualificacoes`
  ADD CONSTRAINT `tbqualificacoes_ibfk_1` FOREIGN KEY (`idProfissional`) REFERENCES `tbprofissional` (`idProfissional`);

--
-- Restrições para tabelas `tbservico`
--
ALTER TABLE `tbservico`
  ADD CONSTRAINT `tbservico_ibfk_1` FOREIGN KEY (`idProfissional`) REFERENCES `tbprofissional` (`idProfissional`),
  ADD CONSTRAINT `tbservico_ibfk_2` FOREIGN KEY (`idContratante`) REFERENCES `tbcontratante` (`idContratante`);

--
-- Restrições para tabelas `tbstatusservico`
--
ALTER TABLE `tbstatusservico`
  ADD CONSTRAINT `tbstatusservico_ibfk_1` FOREIGN KEY (`idServico`) REFERENCES `tbservico` (`idServico`);

--
-- Restrições para tabelas `tbtelcontratante`
--
ALTER TABLE `tbtelcontratante`
  ADD CONSTRAINT `tbtelcontratante_ibfk_1` FOREIGN KEY (`idContratante`) REFERENCES `tbcontratante` (`idContratante`);

--
-- Restrições para tabelas `tbtelprofissional`
--
ALTER TABLE `tbtelprofissional`
  ADD CONSTRAINT `tbtelprofissional_ibfk_1` FOREIGN KEY (`idProfissional`) REFERENCES `tbprofissional` (`idProfissional`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
