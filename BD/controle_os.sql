-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 04:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `controle_os`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_alocar`
--

CREATE TABLE `tb_alocar` (
  `id` int(11) NOT NULL,
  `situacao` smallint(1) NOT NULL,
  `data_alocacao` date NOT NULL,
  `data_remocao` date DEFAULT NULL,
  `equipamento_id` int(11) NOT NULL,
  `setor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_chamado`
--

CREATE TABLE `tb_chamado` (
  `id` int(11) NOT NULL,
  `data_abertura` datetime NOT NULL,
  `descricao_problema` varchar(500) NOT NULL,
  `data_atendimento` datetime DEFAULT NULL,
  `data_encerramento` datetime DEFAULT NULL,
  `laudo_tecnico` varchar(500) DEFAULT NULL,
  `funcionario_id` int(11) NOT NULL,
  `tecnico_atendimento` int(11) DEFAULT NULL,
  `tecnico_encerramento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cidade`
--

CREATE TABLE `tb_cidade` (
  `id` int(11) NOT NULL,
  `nome_cidade` varchar(45) NOT NULL,
  `estado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_endereco`
--

CREATE TABLE `tb_endereco` (
  `id` int(11) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `cidade_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_equipamento`
--

CREATE TABLE `tb_equipamento` (
  `id` int(11) NOT NULL,
  `identificacao` varchar(20) NOT NULL,
  `descricao` varchar(90) NOT NULL,
  `tipoequip_id` int(11) NOT NULL,
  `modeloequip_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_estado`
--

CREATE TABLE `tb_estado` (
  `id` int(11) NOT NULL,
  `nome_estado` varchar(45) NOT NULL,
  `sigla_estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `funcionario_id` int(11) NOT NULL,
  `setor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `usuario_id` int(11) NOT NULL,
  `data_log` date NOT NULL,
  `hora` time NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_modeloequip`
--

CREATE TABLE `tb_modeloequip` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_setor`
--

CREATE TABLE `tb_setor` (
  `id` int(11) NOT NULL,
  `nome_setor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tecnico`
--

CREATE TABLE `tb_tecnico` (
  `tecnico_id` int(11) NOT NULL,
  `empresa_tecnico` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipoequip`
--

CREATE TABLE `tb_tipoequip` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id` int(11) NOT NULL,
  `tipo` smallint(1) NOT NULL COMMENT '1 - Adm\n2 - funcionario\n3 - tecnico',
  `nome` varchar(50) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `telefone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alocar`
--
ALTER TABLE `tb_alocar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_alocar_tb_setor1` (`setor_id`),
  ADD KEY `fk_tb_alocar_tb_equipamento1` (`equipamento_id`);

--
-- Indexes for table `tb_chamado`
--
ALTER TABLE `tb_chamado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_chamado_tb_funcionario1` (`funcionario_id`),
  ADD KEY `fk_tb_chamado_tb_tecnico1` (`tecnico_atendimento`),
  ADD KEY `fk_tb_chamado_tb_tecnico2` (`tecnico_encerramento`);

--
-- Indexes for table `tb_cidade`
--
ALTER TABLE `tb_cidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_cidade_tb_estado1` (`estado_id`);

--
-- Indexes for table `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_endereco_tb_cidade1` (`cidade_id`),
  ADD KEY `fk_tb_endereco_tb_usuario1` (`usuario_id`);

--
-- Indexes for table `tb_equipamento`
--
ALTER TABLE `tb_equipamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_equipamento_tb_tipoequip1` (`tipoequip_id`),
  ADD KEY `fk_tb_equipamento_tb_modeloequip1` (`modeloequip_id`);

--
-- Indexes for table `tb_estado`
--
ALTER TABLE `tb_estado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD PRIMARY KEY (`funcionario_id`),
  ADD KEY `fk_tb_funcionario_tb_setor1` (`setor_id`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`usuario_id`,`data_log`,`hora`);

--
-- Indexes for table `tb_modeloequip`
--
ALTER TABLE `tb_modeloequip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_setor`
--
ALTER TABLE `tb_setor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tecnico`
--
ALTER TABLE `tb_tecnico`
  ADD PRIMARY KEY (`tecnico_id`);

--
-- Indexes for table `tb_tipoequip`
--
ALTER TABLE `tb_tipoequip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_alocar`
--
ALTER TABLE `tb_alocar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_chamado`
--
ALTER TABLE `tb_chamado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_cidade`
--
ALTER TABLE `tb_cidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_endereco`
--
ALTER TABLE `tb_endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_equipamento`
--
ALTER TABLE `tb_equipamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_estado`
--
ALTER TABLE `tb_estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_modeloequip`
--
ALTER TABLE `tb_modeloequip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_setor`
--
ALTER TABLE `tb_setor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tipoequip`
--
ALTER TABLE `tb_tipoequip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_alocar`
--
ALTER TABLE `tb_alocar`
  ADD CONSTRAINT `fk_tb_alocar_tb_equipamento1` FOREIGN KEY (`equipamento_id`) REFERENCES `tb_equipamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_alocar_tb_setor1` FOREIGN KEY (`setor_id`) REFERENCES `tb_setor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_chamado`
--
ALTER TABLE `tb_chamado`
  ADD CONSTRAINT `fk_tb_chamado_tb_funcionario1` FOREIGN KEY (`funcionario_id`) REFERENCES `tb_funcionario` (`funcionario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_chamado_tb_tecnico1` FOREIGN KEY (`tecnico_atendimento`) REFERENCES `tb_tecnico` (`tecnico_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_chamado_tb_tecnico2` FOREIGN KEY (`tecnico_encerramento`) REFERENCES `tb_tecnico` (`tecnico_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_cidade`
--
ALTER TABLE `tb_cidade`
  ADD CONSTRAINT `fk_tb_cidade_tb_estado1` FOREIGN KEY (`estado_id`) REFERENCES `tb_estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD CONSTRAINT `fk_tb_endereco_tb_cidade1` FOREIGN KEY (`cidade_id`) REFERENCES `tb_cidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_endereco_tb_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_equipamento`
--
ALTER TABLE `tb_equipamento`
  ADD CONSTRAINT `fk_tb_equipamento_tb_modeloequip1` FOREIGN KEY (`modeloequip_id`) REFERENCES `tb_modeloequip` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_equipamento_tb_tipoequip1` FOREIGN KEY (`tipoequip_id`) REFERENCES `tb_tipoequip` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD CONSTRAINT `fk_tb_funcionario_tb_setor1` FOREIGN KEY (`setor_id`) REFERENCES `tb_setor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_funcionario_tb_usuario1` FOREIGN KEY (`funcionario_id`) REFERENCES `tb_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD CONSTRAINT `fk_tb_log_tb_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_tecnico`
--
ALTER TABLE `tb_tecnico`
  ADD CONSTRAINT `fk_tb_tecnico_tb_usuario` FOREIGN KEY (`tecnico_id`) REFERENCES `tb_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
