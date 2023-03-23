-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 17, 2023 at 12:48 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzar15_db_os`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_alocar`
--

CREATE TABLE `tb_alocar` (
  `id` int(11) NOT NULL,
  `situacao` smallint(6) NOT NULL,
  `data_alocacao` date NOT NULL,
  `data_remocao` date DEFAULT NULL,
  `equipamento_id` int(11) NOT NULL,
  `setor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_anexo`
--

CREATE TABLE `tb_anexo` (
  `AnxID` int(11) NOT NULL,
  `AnxNome` varchar(45) DEFAULT NULL,
  `AnxUrl` varchar(100) DEFAULT NULL,
  `AnxPath` varchar(100) DEFAULT NULL,
  `AnxOsID` int(11) NOT NULL,
  `AnxUserID` int(11) NOT NULL,
  `AnxEmpID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_anexo`
--

INSERT INTO `tb_anexo` (`AnxID`, `AnxNome`, `AnxUrl`, `AnxPath`, `AnxOsID`, `AnxUserID`, `AnxEmpID`) VALUES
(18, 'dsfsdfds', 'logo.jpeg', 'arquivos/632614f6e91d1.jpeg', 22, 6, 10),
(19, 'teste', '2.pdf', 'arquivos/63a9f47688614.pdf', 69, 9, 13);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cidade`
--

CREATE TABLE `tb_cidade` (
  `id` int(11) NOT NULL,
  `nome_cidade` varchar(45) NOT NULL,
  `estado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_cidade`
--

INSERT INTO `tb_cidade` (`id`, `nome_cidade`, `estado_id`) VALUES
(6, 'Londrina', 1),
(7, 'teste', 1),
(8, 'Jacarezinho', 1),
(9, 'Andirá', 1),
(10, 'Cambará', 1),
(11, 'Ibiporã', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `CliID` int(11) NOT NULL,
  `CliNome` varchar(150) NOT NULL,
  `CliDtNasc` date DEFAULT NULL,
  `CliTelefone` varchar(45) NOT NULL,
  `CliEmail` varchar(100) NOT NULL,
  `CliCep` varchar(45) NOT NULL,
  `CliEndereco` varchar(150) NOT NULL,
  `CliNumero` varchar(20) NOT NULL,
  `CliBairro` varchar(100) NOT NULL,
  `CliCidade` varchar(100) NOT NULL,
  `CliEstado` varchar(100) NOT NULL,
  `CliDescricao` text,
  `CliEmpID` int(11) NOT NULL,
  `CliStatus` char(1) NOT NULL DEFAULT 'A',
  `CliUserID` int(11) NOT NULL,
  `CliCpfCnpj` varchar(45) DEFAULT NULL,
  `CliTipo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_cliente`
--

INSERT INTO `tb_cliente` (`CliID`, `CliNome`, `CliDtNasc`, `CliTelefone`, `CliEmail`, `CliCep`, `CliEndereco`, `CliNumero`, `CliBairro`, `CliCidade`, `CliEstado`, `CliDescricao`, `CliEmpID`, `CliStatus`, `CliUserID`, `CliCpfCnpj`, `CliTipo`) VALUES
(1, 'Jose Tadeu', '1987-06-03', '(43) 9 9645-6338', 'jose.junior@acessorias.com', '86.040-022', 'Rua Marize Benato Cruz Trento', '702', 'Jardim Pequena Londres', 'Londrina', 'PR', 'asdasdas', 10, 'A', 6, '010.273.869-62', 'C'),
(4, 'Keila', '2022-01-01', '(43) 9 6454-5565', 'josetadeu33217610@gmail.com', '86.040-022', 'Rua Marize Benato Cruz Trento', '50', 'Jardim Pequena Londres', 'Londrina', 'PR', 'asdasdsadsadsad', 10, 'A', 6, NULL, NULL),
(7, 'Jonas', '2021-01-01', '(45) 6 4654-5646', 'josetadeu33217610@gmail.com', '86.040-022', 'Rua Marize Benato Cruz Trento', '123', 'Jardim Pequena Londres', 'Londrina', 'PR', '5456456456', 10, 'A', 6, NULL, NULL),
(8, 'Marcos', '2022-08-10', '(45) 6 4564-6545', 'josetadeu33217610@gmail.com', '86.040-027', 'Rua Francisco Gonzales Donoso', '456', 'Jardim Pequena Londres', 'Londrina', 'PR', 'asdasasdsadsa', 10, 'A', 6, '232.223.323-23', 'C'),
(9, 'JOSE TADEU ROSA JUNIOR', '2022-08-03', '(55) 4 3996-4563', 'josetadeu33217610@gmail.com', '86.040-022', 'Rua Marize Benato Cruz Trento', '50', 'Jardim Pequena Londres', 'Londrina', 'PR', '65655645646', 10, 'A', 6, NULL, NULL),
(14, 'JOSE TADEU ROSA JUNIOR', '2022-08-10', '(43) 5 4564-6545', 'josetadeu33217610@gmail.com', '86.040-022', 'Rua Marize Benato Cruz Trento', '50', 'Jardim Pequena Londres', 'Londrina', 'a', 'asdadasd', 8, 'A', 4, NULL, NULL),
(15, 'Pedro', '2021-01-01', '(45) 6 4564-6545', 'jiasjdiad@gmail.com', '86.040-022', 'Rua Marize Benato Cruz Trento', '50', 'Jardim Pequena Londres', 'Londrina', 'PR', 'TEste', 10, 'A', 6, '', ''),
(16, 'Enzo Caleb Novaes', '1999-01-11', '(31) 3 8701-384_', 'enzo-novaes75@casaarte.com.br', '32.641-274', 'Rua Irmã Gioconda', '178', 'Colônia Santa Isabel', 'Betim', 'MG', 'Testando', 16, 'A', 12, NULL, NULL),
(17, 'Cliente para teste', '2021-01-01', '(43) 9 9645-6338', 'suporte@gmail.com', '86.040-027', 'Rua Francisco Gonzales Donoso', '702', 'Jardim Pequena Londres', 'Londrina', 'PR', '', 18, 'A', 14, '', 'C'),
(18, 'JOSE TADEU ROSA JUNIOR', '2022-09-08', '(55) 4 3996-4563', 'josetadeu33217610@gmail.com', '86.040-022', 'Rua Marize Benato Cruz Trento', '333', 'Jardim Pequena Londres', 'Londrina', 'PR', '', 10, 'A', 6, '32.423.423/4234-23', 'F'),
(19, 'JOSE TADEU ROSA JUNIOR', '2022-09-21', '(55) 4 3996-4563', 'josetadeu33217610@gmail.com', '86.040-022', 'Rua Marize Benato Cruz Trento', '444', 'Jardim Pequena Londres', 'Londrina', 'PR', '', 10, 'A', 6, '56.456.456/4564-56', 'C'),
(21, 'JOSE TADEU ROSA JUNIOR', '2022-09-21', '(55) 4 3996-4563', 'josetadeu33217610@gmail.com', '86.040-022', 'Rua Marize Benato Cruz Trento', '444', 'Jardim Pequena Londres', 'Londrina', 'PR', '', 10, 'A', 6, '56.456.456/4564-56', 'C'),
(22, 'JOSE TADEU ROSA JUNIOR', '2022-09-21', '(55) 4 3996-4563', 'josetadeu33217610@gmail.com', '86.040-022', 'Rua Marize Benato Cruz Trento', '444', 'Jardim Pequena Londres', 'Londrina', 'PR', '', 10, 'A', 6, '56.456.456/4564-56', 'C'),
(23, 'Junior', '1987-06-03', '(43) 9 9645-6338', 'josetadeu33217610@gmail.com', '86040022', 'Rua Marize Benato Cruz Trento', '50', 'Jardim Pequena Londres', 'Londrina', 'PR', '', 10, 'A', 6, '010.273.869-62', 'C'),
(24, 'Nubank', '2021-01-01', '(54) 5 4654-5646', '', '', '', '', '', '', '', '', 10, 'A', 6, '21.231.321/3213-21', 'F'),
(25, 'CredCard', '0000-00-00', '(45) 6 6546-5465', '', '', '', '', '', '', '', '', 10, 'A', 6, '16.556.456/4654-65', 'F'),
(26, 'JOSE ROBERTO', '0000-00-00', '(44) 9 9433-147', '', '87.820-000', '', '00', 'vila', 'Cidade Gaúcha', 'PR', '', 19, 'A', 14, '565.656.565-56', 'C'),
(27, 'miriam do santos teodorio', '2022-09-09', '(44) 9 9940-0537', '', '87.820-000', 'rua lagoa vermelha', '1565', 'bairo boa vista', 'Cidade Gaúcha', 'PR', 'perto da pisina', 19, 'A', 15, '023.058.229-01', 'C'),
(29, 'eliane rezende', '2022-09-10', '(44) 9 9951-5354', '', '87.820-000', '', '1479', 'vila', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '082.311.909-29', 'C'),
(30, 'jean antoine', '0000-00-00', '(44) 9 9768-9680', '', '87.820-000', 'rua tolo da luz barbosa', '1222', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '702.503.372-31', 'C'),
(33, 'jose edurado', '0000-00-00', '(44) 9 9951-4270', '', '87.820-000', '', '', '', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '84.646.646/4656', 'C'),
(34, 'lavinia costa', '2022-09-12', '(44) 9 9715-426', '', '87.820-000', 'rua cruz alta', '02', 'vila', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '088.074.275-59', 'C'),
(35, 'BRUNA VITORIA SILVIA PEREIRA', '2022-09-07', '(44) 9 9839-4153', '', '87.820-000', 'JARDIM PALMITA', '1904', '', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '54.656.516/5454-5', 'C'),
(36, 'natannael ferreira do nacimento', '0000-00-00', '(44) 9 9115-1522', 'jovairmarques20@gmail.com', '87.820-000', 'joa paizinho', '1841', '', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '54.645.456/8545', 'C'),
(37, 'isabela', '2022-09-15', '(44) 9 9821-0078', '', '87.820-000', 'milthon', '1045', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '844.545.486-45', 'C'),
(38, 'luana da silvia moraes', '2022-09-17', '(44) 9 9863-8016', '', '', 'rua santos dumont numero', '6547', 'centro', 'cidade gaucha', 'parana', '', 19, 'A', 15, '636.464.646-46', 'C'),
(39, 'JUNIOR', '1987-06-03', '(43)35250-306', '', '', '', '', '', '', '', '', 20, 'A', 16, '000.000.000-00', 'F'),
(40, 'maria jose / mae do jean', '2022-09-19', '(44) 9 9935-4433', '', '87.820-000', '', '030,0', 'vila', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '444.444.644-66', 'C'),
(41, 'roberta ratz', '2022-09-19', '(44) 9 9806-3570', '', '87.820-000', 'avenida piratinim', '5250', 'alvorada', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '65.985.454/4844-54', 'C'),
(42, 'aluguel', '0000-00-00', '(44) 9 9824-6309', '', '', '', '', '', '', '', '', 19, 'A', 15, '65.462.561/5415-45', 'C'),
(43, 'tokalar', '2022-09-23', '(44)36751-141', '', '87.820-000', 'aveniida comendador gentil geralde', '1036', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '78.409.554/0001-34', 'C'),
(44, 'surpermercado compre bem', '2022-09-23', '(36)75123-2', 'jovairmarques20@gmail.com', '87.820-000', 'avenida comendador gentil geralde', '2760', '', 'Cidade Gaúcha', 'Paraná', '', 19, 'A', 15, '94.546.978/7445-45', 'C'),
(45, 'jessica da silvia- pirigoso', '2022-09-27', '(68)76686-868', '', '87.820-000', 'rua marinho carezia', '2429', 'ㅤcentro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '101.224.039-83', 'C'),
(46, 'VIEIRA E AMORIM LTDA', '0000-00-00', '(43)99909-4333', 'energizase@outlook.com', '84.930-000', 'RUA JOAO DE PAULA', '2', 'CENTRO', 'Jaboti', 'PR', 'EMPRESA QUE INSTALOU A ENERGIA SOLAR', 20, 'A', 16, '31.481.410/0001-25', 'F'),
(47, 'TADEU', '1966-06-25', '(43)98443-3066', 'zetadeuif@hotmail.com', '86400-000', 'RUA JOSE PAVAN', '300', 'VILA RONDON', 'Jacarezinho', 'Paraná', '', 20, 'A', 16, '529.280.399-53', 'C'),
(48, 'CLIENTE FINAL', '2022-09-29', '(00)00000-0000', 'jovairmarques20@gmail.com', '87.820-000', '.............................', '0000000000000', '', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '568.683.5', 'C'),
(49, 'CLIENTE FINAL', '2022-09-29', '(00)00000-0000', 'jovairmarques20@gmail.com', '87.820-000', '.............................', '0000000000000', '', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '568.68', 'C'),
(50, 'JAQUELINE DELMAN', '0000-00-00', '(44)99121-0355', '', '87.205-050', 'Avenida Arthur M Thomas', '257', 'CIANORTINHO SETOR 6', 'Cianorte', 'PR', '', 19, 'A', 15, '68.686.868/6868', 'C'),
(51, 'marciano berço', '2022-09-30', '(44)99936-504', '', '87.820-000', 'vila rural quadra 7 lote 1', '01', 'vila rural', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '65.959.649/5695', 'C'),
(52, 'janiely/ josmario', '2022-10-15', '(44)99742-7261', '', '87.820-000', 'travessa presidente franses alves', '184', '', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '56.868.686/3865-68', 'C'),
(53, 'teoflio silvia', '2022-10-14', '(', '', '87.820-000', 'perto do hospital', '', '', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '854.4', 'C'),
(54, 'alfredo fernandes', '2022-10-27', '(44)99933-8980', '', '87.820-000', '', '03', '', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '65.654.410/3146-46', 'C'),
(55, 'casiane morais', '2022-10-28', '(11)99943-4777', '', '87.820-000', 'kit nete', '', '', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '86.865.386/3983-8', 'C'),
(56, 'jessica', '2022-10-29', '(44)99159-0999', '', '87.820-000', 'rua luiz antonio morais', '2140', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '954.696.666-99', 'C'),
(57, 'edinaldo pereira', '2022-10-31', '(15)99798-6735', '', '87.820-000', 'rua onofre pires', '2828', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '98.556.659/5565-5', 'C'),
(58, 'leticia aparcida cilvia', '2022-11-04', '(44)99721-8771', 'jovairmarques20@gmail.com', '87.820-000', 'rua ramiro barcelo', '2146', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '65.665.644/5141-54', 'C'),
(59, 'jose serafim', '2022-11-07', '(44)99721-8771', 'jovairmarques20@gmail.com', '87.820-000', 'rua yjui', '1387', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '56.654.846/4874-4', 'C'),
(60, 'sandra marisa alves da silva', '2022-11-09', '(44)99890-1950', 'jovairmarques20@gmail.com', '87.820-000', 'avenda olindo cardoso', '1669', 'centro', 'Cidade Gaúcha', 'PR', 'j500', 19, 'A', 15, '98.977.887/8787', 'C'),
(61, 'Junior', '1987-06-03', '(43)99645-6338', 'josetadeu33217610@gmail.com', '86.040-022', 'Rua Marize Benato Cruz Trento', '50', 'Jardim Pequena Londres', 'Londrina', 'PR', 'asdasdasda', 16, 'A', 12, '010.273.869-62', 'C'),
(62, 'gilberto pereira silvia', '2022-11-17', '(44)99721-8771', 'jovairmarques20@gmail.com', '87.820-000', 'fazenda sao jose', '', '', 'Cidade Gaúcha', 'PR', 'tela incell 300 j5oo', 19, 'A', 15, '669.66', 'C'),
(63, 'juliana', '2022-11-17', '(44)99721-8771', 'jovairmarques20@gmail.com', '87.820-000', 'Avenida Rio Grandense', '', 'ㅤcentro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '54.154.544/5458-48', 'C'),
(64, 'roner alves', '0000-00-00', '(44)99223-016', 'jovairmarques20@gmail.com', '87.820-000', 'rua travessa sao cristovo', '134', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '499.466.666-4', 'C'),
(65, 'luiz henrique', '2022-11-21', '(44)99745-5253', 'jovairmarques20@gmail.com', '87.820-000', 'hugu ribeiro do carmo', '3382', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '44.854.548/5454-5', 'C'),
(66, 'pedro matins junior', '2022-11-30', '(44)99878-8592', 'jovairmarques20@gmail.com', '87.820-000', 'fazenda', '9969', '', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '638', 'C'),
(67, 'oseias', '2022-12-01', '(44)99881-9657', 'jovairmarques20@gmail.com', '87.820-000', '', '3366', '', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '965.684.949-4', 'C'),
(68, 'maria liticia santana', '2022-12-05', '(44)99721-8771', 'jovairmarques20@gmail.com', '87.820-000', 'Avenida Rio grandesnse', '2266', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '59.559.999/4647-5', 'C'),
(69, 'wendel santos', '2022-12-08', '(44)99721-8771', 'topcellassistencia45@gmail.com', '87.820-000', 'travessa sousa naves', '64', 'centro', 'cidade gauca', 'Paraná', '', 19, 'A', 15, '44.452.154/5548-4', 'C'),
(70, 'angelica cristina magalhais', '2022-12-09', '(44)99705-7189', 'topcellassistencia45@gmail.com', '87.820-000', 'mario ribes', '3674', 'ㅤcentro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '54.848.784/4844', 'C'),
(71, 'josefa evagelista', '2022-12-09', '(44)98711-934', '', '87.820-000', 'rua ramiro barcelo', '2289', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '56.599.151/2946-6', 'C'),
(72, 'camila sampaio', '2022-12-13', '(44)99759-7296', '', '87.820-000', '', '', '', 'Cidade Gaúcha', 'PR', 'a51', 19, 'A', 15, '80.849.799/9778-49', 'C'),
(73, 'fatima', '2022-12-14', '(44)99895-2513', '', '87.820-000', 'avenida piratinim', '5352', 'centro', 'Cidade Gaúcha', 'PR', 'moto g9', 19, 'A', 15, '56.999.164/8154', 'C'),
(74, 'solange zanato da silvia', '2022-12-14', '(44)99820-8202', 'jovairmarques20@gmail.com', '87.820-000', 'rua santos drumon', '6588', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '65.959.684/5184-9', 'C'),
(75, 'WEVERSON VIEIRA SANTANA', '1986-07-17', '(43)99141-2835', '', '86.400-000', 'RUA JOSE PAVAN', '300', 'VILA RONDON', 'Jacarezinho', 'PR', '', 20, 'A', 16, '053.850.059-08', 'C'),
(76, 'neiva', '2022-12-16', '(44)99954-576', '', '87.820-000', 'sitio', '', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '96.655.995/9599-59', 'C'),
(77, 'ane beatriz', '2022-12-16', '(44)99220-581', 'jovairmarques20@gmail.com', '87.820-000', 'vaenda presidente', '85', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '99.848.741/4874-8', 'C'),
(78, 'josiane dos santos', '2022-12-20', '(44)99721-8771', 'jovairmarques20@gmail.com', '87.820-000', 'raua joao abrao', '1663', 'centro', 'Cidade Gaúcha', 'PR', 'remove conta google a12', 19, 'A', 15, '98.854.878/9497-94', 'C'),
(79, 'johnatan michel', '2022-12-20', '(44)99710-6441', 'jovairmarques20@gmail.com', '87.820-000', 'rua begonia', '2016', 'jardim vitoria', 'Cidade Gaúcha', 'PR', 'troca tela e conector', 19, 'A', 15, '54.848.484/8484-8', 'C'),
(80, 'luiz fernando santos pereira', '2022-12-23', '(44)99823-5947', '', '87.820-000', 'rua onofre pires', '2840', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '94.848.484/8454-51', 'C'),
(81, 'elza do santos', '2022-12-24', '(44)99916-7205', 'jovairmarques20@gmail.com', '87.820-000', 'rua dona nicha', '1038', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '48.485.481/8474-18', 'C'),
(82, 'jose cleia', '2022-12-26', '(44)99277-308', '', '87.820-000', 'avenida olindo cardoso do santos', '2325', '', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '495.958.584', 'C'),
(83, 'sadfasdfsdafsad', '1987-06-03', '+5543996456338', 'josetadeu33217610@gmail.com', '86040022', 'Rua Marize Benato Cruz Trento', '50', 'Jardim Pequena Londres', 'Londrina', 'PR', 'asdasdasdasdasda', 13, 'A', 9, '010.273.869-62', 'C'),
(84, 'elizete', '2022-12-29', '(44)99933-780', 'jovairmarques20@gmail.com', '87.820-000', 'rua mario ribeiro borges', '3380', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '95.595.958/4489-49', 'C'),
(85, 'leonardo', '0000-00-00', '(54)99595-9595', '', '', '', '', '', '', '', '', 19, 'A', 15, '494.844.894', 'C'),
(86, 'fabio aparecido', '2023-01-03', '(11)91156-1719', 'jovairmarques20@gmail.com', '87.820-000', 'onofre pires', '2600', 'centro', 'Cidade Gaúcha', 'Paraná', '', 19, 'A', 15, '48.448.484/4848-48', 'C'),
(87, 'cisero', '2023-01-04', '(44)99832-909', 'jovairmarques20@gmail.com', '87.820-000', '', '', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '36.559.599/9989-9', 'C'),
(88, 'ana maria', '2023-01-04', '(44)99721-8771', 'jovairmarques20@gmail.com', '87.820-000', 'rua gardenia', '97', 'jardim vitoria', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '87.844.844/8478-78', 'C'),
(89, 'raimundo lonato', '2023-01-05', '(44)99721-8771', 'jovairmarques20@gmail.com', '87.820-000', 'travessa senador souza naves', '146', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '95.295.954/7979-47', 'C'),
(90, 'alan miguel', '2023-01-06', '(44)99721-8771', 'jovairmarques20@gmail.com', '87.820-000', 'milton reinz', '', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '84.848.484/8481-51', 'C'),
(91, 'maria iusa', '2023-01-07', '(44)99721-8771', 'jovairmarques20@gmail.com', '87.820-000', 'rua mario ribeiro borges', '', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '594.944.777-', 'C'),
(92, 'aparecido medes araujo', '2023-01-21', '(44)99721-8771', 'jovairmarques20@gmail.com', '87.820-000', '', '', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '863.85', 'C'),
(93, 'elias amaro', '2023-01-23', '(44)99721-8771', 'jovairmarques20@gmail.com', '87.820-000', 'avenida peratinim', '33', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '89.898.959/9888', 'C'),
(94, 'fulvio', '2023-01-23', '(44)99892-689', 'jovairmarques20@gmail.com', '87.820-000', 'rua corte real', '2582', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '595.959.595-95', 'C'),
(95, 'alencar mendes almeida', '2023-01-27', '(44)99979-7044', 'jovairmarques20@gmail.com', '87.820-000', 'rua beija flor', '1165', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '59.565.659/5959-59', 'C'),
(96, 'DANIELA CASUZA', '2023-01-30', '(44)99767-9560', '', '87.820-000', 'RUA CORTE REAL 1886', '1886', '', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '59.898.998/9659-59', 'C'),
(97, 'LUIZ MIGUEL', '2023-01-30', '(44)99100-800', 'jovairmarques20@gmail.com', '87.820-000', 'RUA TRAVESSA SAO DOMIGUES', '07', 'centro', 'Cidade Gaúcha', 'PR', '', 19, 'A', 15, '58.559.292/6369-6', 'C'),
(98, 'Leonardo Francisco Cavalcanti', '1979-01-08', '(46)54465-5466', 'leonardo_cavalcanti@c-a-m.com', '64.205-020', 'Rua Lázaro Jacob', '50', 'João XXIII', 'Parnaíba', 'PI', '', 26, 'A', 23, '942.315.589-81', 'C'),
(99, 'eva', '0000-00-00', '(26)56415-4543', '', '', 'corte real', '', '', '', '', '', 19, 'A', 15, '65.959.495/6565-5', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `tb_empresa`
--

CREATE TABLE `tb_empresa` (
  `EmpID` int(11) NOT NULL,
  `EmpNome` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `EmpEnd` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `EmpCNPJ` varchar(18) COLLATE utf8_bin DEFAULT NULL,
  `EmpPlano` char(1) COLLATE utf8_bin DEFAULT NULL,
  `EmpStatus` char(1) COLLATE utf8_bin DEFAULT 'A',
  `EmpDtCadastro` varchar(45) COLLATE utf8_bin NOT NULL,
  `EmpDtRenovacao` datetime DEFAULT NULL,
  `EmpDtVencimento` datetime DEFAULT NULL,
  `EmpLogo` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `EmpLogoPath` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `EmpCep` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `EmpNumero` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `EmpCidade` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_empresa`
--

INSERT INTO `tb_empresa` (`EmpID`, `EmpNome`, `EmpEnd`, `EmpCNPJ`, `EmpPlano`, `EmpStatus`, `EmpDtCadastro`, `EmpDtRenovacao`, `EmpDtVencimento`, `EmpLogo`, `EmpLogoPath`, `EmpCep`, `EmpNumero`, `EmpCidade`) VALUES
(1, NULL, NULL, NULL, NULL, 'A', '2022-08-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, 'A', '2022-08-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, 'A', '2022-08-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, 'A', '2022-08-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Empresa de teste Ltda', 'Rua major pimpão, Londrina - PR', '1082891956', NULL, 'A', '2022-08-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, 'A', '2022-08-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, 'A', '2022-08-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, 'A', '2022-08-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, 'A', '2022-08-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'JRA Soluções Digital', 'Rua Marize Benato Cruz Trento', '10.828.619/0001-32', NULL, 'A', '2022-08-05', NULL, NULL, 'Assinatura_Junior.png', 'arquivos/6320bb233875c.png', '86.040-022', '50', 'Londrina'),
(11, NULL, NULL, NULL, NULL, 'A', '2022-08-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, 'A', '2022-08-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Empresa Elite', 'Rua das alamedas', '104545125451', NULL, 'A', '2022-08-17', NULL, NULL, 'Assinatura_Junior.png', '../dataview/arquivos/62fd0cecaee8f.png', '86400022', '133', 'Londrina'),
(14, 'renam utilitarios', 'jhkasdkasjd', '78787878787', NULL, 'A', '2022-08-17', NULL, NULL, 'Assinatura_Junior.png', '../dataview/arquivos/62fd3340b09a5.png', '8878978', '877', 'Londrina'),
(15, NULL, NULL, NULL, NULL, 'A', '2022-08-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'TopCell', 'Rua Marize Benato Cruz Trento', '12.545.621/3212-31', NULL, 'A', '2022-09-01', NULL, NULL, 'logoTopCell.jpg', 'arquivos/6310e9c933d89.jpg', '86.040-022', '50', 'Londrina'),
(17, 'Loja do BIE', 'Rua Marize Benato Cruz Trento', '12.313.213/1321-32', NULL, 'A', '2022-09-05', NULL, NULL, 'Captura de tela de 2022-02-23 10-46-57.png', 'arquivos/6315d37b52445.png', '86.040-022', '50', 'Londrina'),
(18, 'JOSE TADEU ROSA JUNIOR', 'Rua Marize Benato Cruz Trento', '12.131.515/3135-15', NULL, 'A', '2022-09-06', NULL, NULL, 'Assinatura_Junior.png', 'arquivos/631759ed6f7a1.png', '86.040-022', '50', 'Londrina'),
(19, 'TOPCELL ESPECIALIZADA', 'avenida comendador gentil geralde', '33.345.461/0001-55', NULL, 'A', '2022-09-09', NULL, NULL, 'WhatsApp Image 2022-05-11 at 09.17.12 (1).jpeg', 'arquivos/6320adf7c9e11.jpeg', '87.820-000', '2767', 'Cidade Gaúcha'),
(20, 'RONDONCELL', 'RUA JOSE PAVAN', '43.225.798/0001-82', NULL, 'A', '2022-09-10', NULL, NULL, 'WhatsApp Image 2022-09-17 at 12.45.18 (1).jpeg', 'arquivos/6325efb4d659d.jpeg', '86.400-000', '300', 'Jacarezinho'),
(21, NULL, NULL, NULL, NULL, 'A', '2022-09-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Empresa do Maycon', 'Rua Marize Benato Cruz Trento', '12.154.654/6546-45', NULL, 'A', '2022-10-09', NULL, NULL, NULL, NULL, '86.040-022', '50', 'Londrina'),
(23, NULL, NULL, NULL, NULL, 'A', '2022-10-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL, 'A', '2022-12-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, NULL, NULL, NULL, NULL, 'A', '2022-12-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'JR SOLUÇÕES DIGITAIS', 'Rua Marize Benato Cruz Trento', '010.273.869-62', NULL, 'A', '2023-01-04', NULL, NULL, 'JR.png', 'arquivos/63b5de8e44fcd.png', '86.040-022', '50', 'Londrina');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_equipamento`
--

INSERT INTO `tb_equipamento` (`id`, `identificacao`, `descricao`, `tipoequip_id`, `modeloequip_id`) VALUES
(1, 'Data Show', 'tteste', 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tb_estado`
--

CREATE TABLE `tb_estado` (
  `id` int(11) NOT NULL,
  `nome_estado` varchar(45) NOT NULL,
  `sigla_estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_estado`
--

INSERT INTO `tb_estado` (`id`, `nome_estado`, `sigla_estado`) VALUES
(1, 'Paraná', 'PR');

-- --------------------------------------------------------

--
-- Table structure for table `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `funcionario_id` int(11) NOT NULL,
  `setor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_garantia_os`
--

CREATE TABLE `tb_garantia_os` (
  `grtID` int(11) NOT NULL,
  `grtNome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `grtText` text COLLATE utf8_unicode_ci NOT NULL,
  `grtOsID` int(11) DEFAULT NULL,
  `grtEmpID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_garantia_os`
--

INSERT INTO `tb_garantia_os` (`grtID`, `grtNome`, `grtText`, `grtOsID`, `grtEmpID`) VALUES
(1, 'Jose', 'Ajuste', NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_Itens_venda`
--

CREATE TABLE `tb_Itens_venda` (
  `ItensID` int(11) NOT NULL,
  `ItensSubTotal` decimal(10,2) NOT NULL,
  `ItensQtd` decimal(10,2) NOT NULL,
  `ItensVendaID` int(11) NOT NULL,
  `ItensProdID` int(11) NOT NULL,
  `ItensEmpID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_Itens_venda`
--

INSERT INTO `tb_Itens_venda` (`ItensID`, `ItensSubTotal`, `ItensQtd`, `ItensVendaID`, `ItensProdID`, `ItensEmpID`) VALUES
(29, '200.00', '1.00', 25, 6, 18),
(34, '20.00', '1.00', 29, 7, 10),
(35, '20.00', '2.00', 32, 2, 10),
(36, '42.00', '1.00', 34, 19, 20),
(38, '30.00', '1.00', 35, 104, 19),
(39, '30.00', '1.00', 36, 104, 19),
(40, '30.00', '1.00', 37, 104, 19),
(41, '38.00', '1.00', 38, 55, 20),
(43, '1.60', '4.00', 40, 108, 20),
(44, '35.00', '1.00', 41, 33, 20),
(45, '1.20', '3.00', 42, 108, 20),
(46, '49.99', '1.00', 43, 99, 19),
(47, '30.00', '3.00', 44, 103, 19),
(48, '69.00', '1.00', 45, 82, 20),
(49, '30.00', '1.00', 46, 100, 19),
(50, '40.00', '1.00', 47, 97, 19),
(51, '35.00', '1.00', 47, 112, 19),
(52, '39.90', '1.00', 47, 111, 19),
(53, '30.00', '1.00', 47, 113, 19),
(54, '20.00', '1.00', 48, 90, 20),
(55, '60.00', '6.00', 48, 86, 20),
(56, '5.20', '13.00', 48, 108, 20),
(57, '70.00', '2.00', 48, 32, 20),
(58, '30.00', '3.00', 49, 86, 20),
(59, '65.00', '1.00', 50, 56, 20),
(60, '15.00', '1.00', 51, 13, 20),
(61, '20.00', '2.00', 51, 86, 20),
(62, '55.00', '1.00', 52, 64, 20),
(63, '0.80', '2.00', 52, 108, 20),
(64, '249.95', '5.00', 53, 99, 19),
(65, '49.99', '1.00', 57, 99, 19),
(66, '40.00', '1.00', 59, 127, 19),
(67, '100.00', '10.00', 60, 86, 20),
(68, '64.00', '2.00', 60, 60, 20),
(69, '38.00', '1.00', 61, 129, 19),
(70, '1.00', '1.00', 62, 131, 13),
(71, '100.00', '1.00', 66, 136, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lancamentos`
--

CREATE TABLE `tb_lancamentos` (
  `LancID` int(11) NOT NULL,
  `LancDescricao` varchar(255) DEFAULT NULL,
  `LancValor` decimal(10,2) NOT NULL,
  `LancDtVencimento` date NOT NULL,
  `LancDtPagamento` date DEFAULT NULL,
  `LancBaixado` char(1) DEFAULT 'N',
  `LancFormPgto` char(2) DEFAULT NULL,
  `Tipo` char(1) NOT NULL,
  `LancClienteID` int(11) DEFAULT NULL,
  `LancEmpID` int(11) NOT NULL,
  `LancUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lancamentos`
--

INSERT INTO `tb_lancamentos` (`LancID`, `LancDescricao`, `LancValor`, `LancDtVencimento`, `LancDtPagamento`, `LancBaixado`, `LancFormPgto`, `Tipo`, `LancClienteID`, `LancEmpID`, `LancUserID`) VALUES
(33, 'Salario Empresa', '2500.00', '2022-09-05', '2022-09-08', NULL, 'D', '1', 23, 10, 6),
(34, 'Rosangela', '1000.00', '2022-09-11', '2022-09-09', NULL, 'D', '1', 23, 10, 6),
(35, 'Papai', '500.00', '2022-09-11', '2022-09-09', NULL, 'D', '1', 23, 10, 6),
(36, 'Keila', '2200.00', '2022-09-11', '2022-09-09', NULL, 'D', '1', 23, 10, 6),
(37, 'Cartão da Nubank', '2556.59', '2022-09-13', '0000-00-00', NULL, '', '2', 24, 10, 6),
(38, 'Cartão da CredCard', '3149.44', '2022-09-11', '0000-00-00', NULL, '', '2', 25, 10, 6),
(39, 'Estacionamento Keila', '110.00', '2022-09-09', '0000-00-00', NULL, '', '2', 18, 10, 6),
(40, 'Curso PHP', '200.00', '2022-09-09', '2022-09-09', NULL, 'P', '2', 18, 10, 6),
(41, 'Receita da Venda:25', '200.00', '2022-09-09', '2022-09-09', 'N', 'D', '1', 17, 18, 14),
(42, 'Receita da OS:23', '250.00', '2022-09-09', '0000-00-00', 'N', '', '1', 26, 19, 15),
(44, 'Receita da OS:26', '260.00', '2022-09-09', '2022-09-09', 'N', '', '1', 27, 19, 15),
(50, 'Receita da Venda:29', '20.00', '2022-09-13', '2022-09-13', 'N', 'D', '1', 1, 10, 6),
(51, 'Receita da Venda:32', '20.00', '2022-09-13', '2022-09-13', 'N', 'D', '1', 4, 10, 6),
(52, 'Receita da OS:20', '14.00', '2022-09-13', '0000-00-00', 'N', '', '1', 1, 10, 6),
(53, 'Receita da Venda:34', '30.00', '2022-09-17', '2022-09-17', 'N', '', '1', 39, 20, 16),
(54, 'Receita da OS:37', '600.00', '2022-09-19', '0000-00-00', 'N', '', '1', 40, 19, 15),
(55, 'Receita da OS:38', '280.00', '2022-09-19', '2022-09-20', 'N', '', '1', 41, 19, 15),
(57, 'aluguel', '650.00', '2022-09-10', '2022-09-23', NULL, 'D', '1', 42, 19, 15),
(58, 'Receita da Venda:35', '30.00', '2022-09-23', '2022-09-23', 'N', 'D', '1', 43, 19, 15),
(59, 'Receita da Venda:36', '30.00', '2022-09-23', '2022-09-23', 'N', '', '1', 44, 19, 15),
(60, 'Receita da Venda:38', '38.00', '2022-09-26', '2022-09-26', 'N', 'D', '1', 39, 20, 16),
(64, 'aluguel', '700.00', '2022-09-10', '2022-09-27', NULL, 'D', '1', 42, 19, 15),
(67, 'Receita da Venda:40', '1.60', '2022-09-28', '2022-09-28', 'N', '', '1', 39, 20, 16),
(68, 'Receita da Venda:41', '30.00', '2022-09-28', '2022-09-28', 'N', '', '1', 39, 20, 16),
(69, 'PRESTAÇÃO DA ENERGIA SOLAR 04/05', '2020.00', '2022-10-10', '0000-00-00', NULL, '', '2', 46, 20, 16),
(70, 'PRESTAÇÃO DA ENERGIA SOLAR 05/05', '2020.00', '2022-11-10', '0000-00-00', NULL, '', '2', 46, 20, 16),
(71, 'Receita da Venda:42', '1.20', '2022-09-28', '2022-09-28', 'N', '', '1', 47, 20, 16),
(72, 'Receita da Venda:43', '49.99', '2022-09-29', '2022-09-29', 'N', 'D', '1', 48, 19, 15),
(73, 'Receita da Venda:45', '69.00', '2022-10-02', '2022-10-07', 'N', '', '1', 47, 20, 17),
(74, 'Receita da Venda:48', '155.20', '2022-10-22', '2022-10-22', 'N', '', '1', 47, 20, 16),
(75, 'Receita da Venda:49', '24.00', '2022-10-22', '2022-10-22', 'N', '', '1', 47, 20, 16),
(76, 'Receita da Venda:50', '55.00', '2022-10-25', '2022-10-25', 'N', '', '1', 47, 20, 16),
(77, 'Receita da Venda:51', '31.00', '2022-10-28', '2022-10-28', 'N', '', '1', 47, 20, 16),
(78, 'Receita da Venda:52', '50.80', '2022-11-05', '2022-11-05', 'N', '', '1', 47, 20, 16),
(79, 'Receita da Venda:53', '249.95', '2022-12-12', '2022-12-12', 'N', 'D', '1', 49, 19, 15),
(80, 'Receita da Venda:46', '30.00', '2022-12-14', '2022-12-14', 'N', 'D', '1', 48, 19, 15),
(81, 'Receita da Venda:60', '130.00', '2022-12-15', '0000-00-00', 'N', '', '1', 75, 20, 16),
(82, 'Receita da Venda:61', '38.00', '2022-12-22', '2022-12-22', 'N', 'D', '1', 49, 19, 15),
(83, 'Recebimento de produto', '90.00', '2022-12-26', '0000-00-00', NULL, 'D', '1', 83, 13, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `usuario_id` int(11) NOT NULL,
  `data_log` date NOT NULL,
  `hora` time NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_modeloequip`
--

CREATE TABLE `tb_modeloequip` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_modeloequip`
--

INSERT INTO `tb_modeloequip` (`id`, `nome`) VALUES
(19, 'Data Show'),
(26, 'asdasd'),
(27, 'alert oi'),
(28, 'scriptalertoiscript'),
(29, 'scriptalertolaaaaascript'),
(30, 'alertoi'),
(31, 'alertWHERE'),
(32, '\'ola\''),
(33, 'teste'),
(34, 'empresa  teste'),
(35, 'Empresa - teste'),
(36, 'caçagmailcom'),
(37, 'Modelo');

-- --------------------------------------------------------

--
-- Table structure for table `tb_os`
--

CREATE TABLE `tb_os` (
  `OsID` int(11) NOT NULL,
  `OsDtInicial` date NOT NULL,
  `OsDtFinal` varchar(45) DEFAULT NULL,
  `OsGarantia` varchar(100) DEFAULT NULL,
  `OsDescProdServ` text,
  `OsDefeito` text NOT NULL,
  `OsObs` text,
  `OsCliID` int(11) NOT NULL,
  `OsTecID` varchar(50) NOT NULL,
  `OsStatus` char(2) NOT NULL DEFAULT 'O',
  `OsLaudoTec` text,
  `OsValorTotal` decimal(10,2) NOT NULL,
  `OsFaturado` char(1) NOT NULL DEFAULT 'N',
  `OsEmpID` int(11) NOT NULL,
  `OsLancamentoID` int(11) DEFAULT NULL,
  `OsDesconto` decimal(10,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_os`
--

INSERT INTO `tb_os` (`OsID`, `OsDtInicial`, `OsDtFinal`, `OsGarantia`, `OsDescProdServ`, `OsDefeito`, `OsObs`, `OsCliID`, `OsTecID`, `OsStatus`, `OsLaudoTec`, `OsValorTotal`, `OsFaturado`, `OsEmpID`, `OsLancamentoID`, `OsDesconto`) VALUES
(20, '2022-09-08', '', 'asdasasdsad', 'asdasd', 'asdasdasda', '', 1, 'asdasdsadas', 'F', '', '20.00', 'S', 10, 52, '6.00'),
(22, '2022-09-08', '', 'sadsad', 'asdasdsa', 'asdasda', '', 1, 'asdas', 'F', '', '12.30', 'N', 10, 0, '0.00'),
(23, '2022-09-09', '2022-09-09', '90 DIAS', 'TROCA DE TELA \nMOTO G8 PAWER LITE', 'TELA TRICADA', '', 26, 'JOVAIR', 'F', 'TROCA DE VIDRO', '0.00', 'S', 19, 42, '0.00'),
(26, '2022-09-09', '2022-09-09', '90 dias', 'troca de tela', 'tela trincada', '', 27, 'jovair marques', 'F', '', '0.00', 'S', 19, 44, '0.00'),
(28, '2022-09-10', '2022-09-12', '90', 'aparelho desliga', 'desligando', 'tela trocada resente em outra assistencia', 29, 'jovair', 'C', '', '0.00', 'N', 19, NULL, '0.00'),
(29, '2022-09-10', '2022-09-12', '90 dia', 'nao carrega', 'nao carrega', '', 30, 'jovair', 'C', '', '90.00', 'N', 19, NULL, '0.00'),
(31, '2022-09-12', '2022-09-16', '90 dias', 'nao consegue grvar audio e nem escuta o mesmo', 'erro de gravaçao', 'iphone 7 / 250620', 34, 'jovair', 'C', '', '0.00', 'N', 19, NULL, '0.00'),
(32, '2022-09-12', '2022-09-12', '90 dias', 'TELA j400', 'TELA QUEIMADA', 'TERMO DE GARANTIA TOPCELL\nNÃO ESTÃO INCLUSOS NESTA GARANTIA ALGUNS ACESSÓRIOS E TODAS AS PARTES EXTERNAS DO\nCELULAR TAIS COMO:\nLentes, antenas, carcaças, capas, cases, teclas, teclados e botões laterais se houver, tampas, películas protetoras, cabos\nde dados, fones de ouvido, cartão de memória, pendrive, suportes e partes que se desgastam com o uso.\nA GARANTIA É CANCELADA AUTOMATICAMENTE NOS SEGUINTES CASOS:\nEm ocasião de quedas, esmagamentos, sobrecarga elétrica; exposição do aparelho a altas temperaturas, umidade ou\nlíquidos; exposição do aparelho a poeira, pó e/ou limalha de metais, ou ainda quando constatado mau uso do aparelho,\ninstalações, modificações ou atualizações no seu sistema operacional; abertura do equipamento ou tentativa de conserto\ndeste por terceiros que não sejam os técnicos da Speedcell, mesmo que para realização de outros serviços; bem como\na violação do selo/lacre de garantia colocado pela topcell.\nE ainda:\nLENTE TOUCHSCREEN QUE APRESENTEM MAU USO, TRINCADOS OU QUEBRADOS, RISCADOS, MANCHADOS,\nDESCOLADOS ou COM CABO FLEX ROMPIDO.\nVale lembrar que:\n1) A GARANTIA DE 90 (NOVENTA) dias está de acordo com o artigo 26 inciso II do código de defesa do\nconsumidor.\n2) Funcionamento, instalação e atualização de aplicativos, bem como o sistema operacional do aparelho NÃO FAZEM\nparte desta garantia.\n3) Limpeza e conservação do aparelho NÃO FAZEM parte desta garantia.\n4) A não apresentação de documento (nota fiscal ou este termo) que comprove o serviço INVÁLIDA a garantia.\n5) Qualquer mal funcionamento APÓS ATUALIZAÇÕES do sistema operacional ou aplicativos NÃO FAZEM PARTE\nDESSA GARANTIA.\n6) A GARANTIA é válida somente para o item ou serviço descrito na nota fiscal, ordem de serviço ou neste termo\nde garantia, NÃO ABRANGENDO OUTRAS PARTES e respeitando as condições aqui descritas.\nData:_/_/___ Marca:________ Modelo____ __IMEI:____________ __\nCondição de entrada do equipamento (defeito s e aspectos)________________________\nServiço realizado:____________________________________\n 90 DIAS VISTO____ PEÇA ORIGINAL? SIM NÃO\n\nConfirmo que li este termo de garantia, fui orientado sobre o seu conteúdo e que testei o\naparelho, e este se encontra em perfeito estado estético e de funcionamento no ato da retirada.\nCliente:____________\nDe acordo:', 33, 'JOVAIR', 'F', '', '350.00', 'N', 19, NULL, '0.00'),
(33, '2022-09-13', '2022-09-14', '90 DIAS', 'VERIFICA O DOC DE CARGA', 'APARELHO APRENTA ALTA TEMPERATURA E NAO  CARREGA', 'A30S', 35, 'JOVAIR', 'F', '', '150.00', 'N', 19, NULL, '0.00'),
(35, '2022-09-15', '2022-10-10', '90', 'moto g7 play 290 /reais', 'tela quebrada', '', 37, 'jovair', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(36, '2022-09-17', '2022-09-17', '-------------------------', 'banho quimico', 'aparelho teve contato com liquido', 'aparelho nao liga\n aparelho teve contato com liquido desoxidação de placa com isso o aparelho tende a ligar serviço nao cobre a tela queimada ou microfone etc.......', 38, 'jovair', 'C', '', '150.00', 'N', 19, NULL, '0.00'),
(37, '2022-09-16', '2022-09-19', '90 dia', 'tela queimada', 'tela quebrada', 'troca de tela', 40, 'jovair marques', 'F', 'tela queimada', '650.00', 'S', 19, 54, '100.00'),
(38, '2022-09-19', '2022-09-21', '90 dias', 'tela', 'aparelho nao liga', 'sem chip', 41, 'jovair', 'F', '', '280.00', 'S', 19, 55, '0.00'),
(39, '2022-09-22', '', 'asdasd', 'asdasd', 'asdasd', 'adasda', 1, 'dasdas', 'O', '', '0.00', 'N', 10, NULL, '0.00'),
(40, '2022-09-27', '2022-09-30', '90', 'troca tela', 'tela', '', 45, 'jovair', 'EA', 'troca tela', '600.00', 'N', 19, NULL, '0.00'),
(41, '2022-09-29', '2022-09-29', '90', 'TELA QUEBRADA', 'TELA', 'APARELHO TA COM AS TRAVA LATERAL DANIFICADA', 50, 'JOAIR', 'O', 'TROCA TELA', '280.00', 'N', 19, NULL, '0.00'),
(42, '2022-09-30', '2022-10-03', '90 dias', 'tela', 'tela', '', 51, 'jovair', 'O', 'troca tela', '480.00', 'N', 19, NULL, '0.00'),
(43, '2022-10-13', '2022-10-15', '90 dias', 'troca de tela 280 reais', 'tela', '', 52, 'jovair marques', 'EA', 'tela danificada', '0.00', 'N', 19, NULL, '0.00'),
(44, '2022-10-14', '2022-10-14', '30', 'conector de carga', 'nao liga', '', 53, 'jovair', 'EA', '', '0.00', 'N', 19, NULL, '0.00'),
(45, '2022-10-28', '2022-11-18', '90', 'nao carrega', 'conector', '130 reais', 55, 'jovair', 'F', '', '150.00', 'N', 19, NULL, '0.00'),
(46, '2022-10-29', '2022-10-31', '90', 'tela a11', 'tela', '290 reais', 56, 'jovair', 'EA', '', '0.00', 'N', 19, NULL, '0.00'),
(47, '2022-11-04', '2022-12-10', '90 dia', 'a01 tela quebrada 280 reais', 'tela quebrada', '', 58, 'jovair', 'O', 'tela', '0.00', 'N', 19, NULL, '0.00'),
(48, '2022-11-07', '2023-01-04', '90', 'Fazer a substituição da frontal', 'tela', 'Tela do redmi 7a', 59, 'jovair', 'EA', '', '0.00', 'N', 19, NULL, '0.00'),
(49, '2022-11-09', '2022-12-08', '90 dia', 'aparelho desligado', 'tela quebrada', '300 reais j500', 60, 'jovair', 'O', 'troca tela', '0.00', 'N', 19, NULL, '0.00'),
(50, '2022-11-16', '', 'asdsadas', 'adsdeeeee', 'defeito', 'OBS', 61, 'Junior', 'O', 'LAUDO', '65.00', 'N', 16, NULL, '0.00'),
(51, '2022-11-17', '2022-11-17', '2', 'tela incell j500', 'tela', '300', 62, 'jovair', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(52, '2022-11-17', '2022-11-19', '2 mes', 'tela quebrada', 'tela', '', 63, 'jovair', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(53, '2022-11-17', '2022-11-17', '90', 'troca tela', 'tela quebrada', 'aparelho com tela e tampa traseira quebrada', 64, 'jovair', 'EA', 'aparelho desligado sem ´possibidade de teste', '0.00', 'N', 19, NULL, '0.00'),
(54, '2022-11-21', '2022-11-29', '90', 'xialme redmi 9', 'tela tricada', '280', 65, 'jovair', 'EA', '', '0.00', 'N', 19, NULL, '0.00'),
(55, '2022-11-30', '2022-11-30', '90', '30 reais de mao de obra caso nao aprove o orcamento', 'nao liga', 'nao liga nao carrega', 66, 'jovair', 'O', 'desconhecido', '0.00', 'N', 19, NULL, '0.00'),
(56, '2022-12-01', '2022-12-07', '90 dias', 'tela 300', 'tela quebrada', 'nao liga', 67, 'jovair', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(57, '2022-12-05', '2022-12-05', '90', 'quemo conector de carga', 'nao  carrega', 'fechou curto     4499969819', 68, 'jovair', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(58, '2022-12-08', '2022-12-08', '1', 'troca conector', 'nao carrega', '100 , moto g', 69, 'jovair', 'O', 'conector de carga', '0.00', 'N', 19, NULL, '0.00'),
(59, '2022-12-09', '2022-12-09', '90', 'alto falante e microfone', 'nao sai som', '', 70, 'jovair', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(60, '2022-12-09', '2022-12-09', '90', '260 / \npg 200', 'tela', '', 71, 'jovair', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(61, '2022-12-14', '2022-12-21', '90', 'troca tela \ne conector', 'redmi 9c \ntela quebrada', '', 74, 'jovair', 'O', 'aparelho nao liga \ntela quebrada \ne conector de carga danificado', '450.00', 'N', 19, NULL, '0.00'),
(62, '2022-12-16', '2022-12-16', '90', 'j7 pro 500\npg 260', 'troca tela', 'quarta feira', 76, 'jovair', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(63, '2022-12-16', '2022-12-16', '90', 'tela', 'tela com tok fantasma', '', 77, 'jovair', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(64, '2022-12-20', '2022-12-22', '90', 'conta google', 'nao sabe a senha', 'conta google 130 reais', 78, 'jovair', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(65, '2022-12-20', '2022-12-23', '90', 'tela quebrada', 'conector e tela', '', 79, 'jovair marques', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(66, '2022-12-23', '', '90', 'troca tela', 'aparelho nao liga', 'nao liga', 80, 'jovair', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(67, '2022-12-24', '2022-12-27', '90', 'avaliaçao', 'avaliar', '', 81, 'jovair', 'O', 'fazer a valiaçao', '0.00', 'N', 19, NULL, '0.00'),
(68, '2022-12-26', '2022-12-27', '90', 'tela quebrada', 'tela', '300 pg', 82, 'jovair', 'O', 'z', '0.00', 'N', 19, NULL, '0.00'),
(69, '2022-01-01', '', 'asdasdsa', 'asdasdasdsa', 'adasdsaasdasdas', '', 83, 'asdadasd', 'O', '', '12.00', 'N', 13, NULL, '0.00'),
(70, '2022-12-29', '2022-12-29', '90', 'tela 350', 'tela', '', 85, 'jovair', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(71, '2023-01-03', '2023-01-04', '90', 'nao liga', 'nao carrega', '', 86, 'jovair', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(72, '2023-01-04', '2023-01-04', '90', 'conector de carga', 'nao  carrega', '100', 87, 'jovair', 'O', '', '150.00', 'N', 19, NULL, '0.00'),
(73, '2023-01-04', '2023-01-04', '1', 'banho quimico', 'caiu na gua', '', 88, 'jovair', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(74, '2023-01-05', '', '90', 'tela', 'tela quebrada', '', 89, 'jovair', 'O', '', '90.00', 'N', 19, NULL, '0.00'),
(75, '2023-01-06', '2023-01-06', '90', 'troca', 'tela trincada', '150', 90, 'jovair', 'O', '', '150.00', 'N', 19, NULL, '0.00'),
(76, '2023-01-07', '2023-01-07', '90', 'troca completa da tela', 'a03 com tela quebrada', 'entrega terçca feira', 77, 'jovair', 'O', 'aparelho com tela quebrada', '300.00', 'N', 19, NULL, '0.00'),
(77, '2023-01-07', '2023-01-07', '90', 'troca tela', 'moto g7 play com tela quebrada', 'entrega terça', 91, 'jovair', 'O', 'troca tela', '270.00', 'N', 19, NULL, '0.00'),
(78, '2023-01-21', '2023-01-21', '90', 'troca tela', 'tela', '', 26, 'jovair', 'O', 'tela', '0.00', 'N', 19, NULL, '0.00'),
(79, '2023-01-21', '', '90', 'tela quebrada', 'tela', '991545003', 92, 'jovair', 'F', '', '350.00', 'N', 19, NULL, '0.00'),
(80, '2023-01-23', '2023-01-23', '90', 'troca de conector', 'nao carrega', 'aparelho deligado  sem chip', 26, 'jovair', 'EA', 'conector', '0.00', 'N', 19, NULL, '0.00'),
(81, '2023-01-23', '', '90', 'troca conector', 'nao liga', '', 93, 'jovair', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(82, '2023-01-23', '2023-01-23', '90', 'nao liga', 'nao liga', 'sowftware', 94, 'jovair', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(83, '2023-01-24', '2023-02-08', '90', 'troca tela', 'tela quebrada', 'ao1 core', 71, 'jovair marques', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(84, '2023-01-27', '', '90', 'nao da imagem si vibra', 'noa da imagem', '', 95, 'jovair', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(85, '2023-01-30', '2023-01-30', '90', 'TROCA TELA', 'TELA', '400', 96, 'JOVAIR', 'O', '', '0.00', 'N', 19, NULL, '0.00'),
(86, '2023-01-30', '2023-01-05', '90', 'TELA', 'TELA', '300', 97, 'jovair', 'O', 'NAO LIG', '0.00', 'N', 19, NULL, '0.00'),
(87, '2023-02-16', '2023-03-06', '30', 'troca conector de carga', 'nao carrega', '100', 99, '6454464', 'EA', 'conector danificado', '0.00', 'N', 19, NULL, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produto`
--

CREATE TABLE `tb_produto` (
  `ProdID` int(11) NOT NULL,
  `ProdDescricao` varchar(100) NOT NULL,
  `ProdDtCriacao` date NOT NULL,
  `ProdCodBarra` varchar(100) NOT NULL,
  `ProdValorCompra` decimal(10,2) NOT NULL,
  `ProdValorVenda` decimal(10,2) NOT NULL,
  `ProdEstoqueMin` int(11) NOT NULL,
  `ProdEstoque` int(11) NOT NULL,
  `ProdImagem` varchar(100) DEFAULT NULL,
  `ProdImagemPath` varchar(100) DEFAULT NULL,
  `ProdEmpID` int(11) NOT NULL,
  `ProdUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_produto`
--

INSERT INTO `tb_produto` (`ProdID`, `ProdDescricao`, `ProdDtCriacao`, `ProdCodBarra`, `ProdValorCompra`, `ProdValorVenda`, `ProdEstoqueMin`, `ProdEstoque`, `ProdImagem`, `ProdImagemPath`, `ProdEmpID`, `ProdUserID`) VALUES
(2, 'Produto', '2021-01-01', '234567498', '10.00', '10.00', 10, 4, 'Captura de tela de 2022-03-09 16-41-10.png', 'arquivos/63075d99536ea.png', 10, 6),
(3, 'asdasdasdsadsa', '2022-01-01', '123456', '1.23', '1.23', 100, 101, 'Captura de tela de 2022-02-23 10-47-12.png', 'arquivos/63075b67f10f5.png', 10, 6),
(4, 'jasdiasdjai', '2022-01-01', '78979789', '1000.00', '2000.00', 10000, 8979, 'Captura de tela de 2022-03-22 16-53-20.png', 'arquivos/63076806827ac.png', 10, 6),
(5, 'Produto', '2022-09-01', '789456564654', '10.00', '15.00', 10, 2, 'Captura de tela de 2022-02-23 10-46-31.png', 'arquivos/6310e6df33e8a.png', 16, 12),
(6, 'Tela para Motorola G3', '2021-01-01', '4564984498', '150.00', '200.00', 2, 1, 'Captura de tela de 2022-02-23 10-46-31.png', 'arquivos/63175982d46e3.png', 18, 14),
(7, 'Fivela Ouro Preto', '2021-01-01', '749864648', '40.00', '42.00', 10, 20, 'Captura de tela de 2022-03-08 08-36-03.png', 'arquivos/6319cd3656e8c.png', 10, 6),
(8, 'SSD 960GB KINGSPEC', '2022-09-10', '6950509986159', '100.00', '515.00', 1, 1, 'SSD KINGSPEC 128GB.JPG', 'arquivos/631c909a9b12a.jpg', 20, 16),
(9, 'SSD 128GB KINGSPEC', '2022-09-10', '6950509983554', '100.00', '120.00', 1, 1, 'SSD KINGSPEC 128GB.JPG', 'arquivos/631c90b938488.jpg', 20, 16),
(10, 'SSD 120GB WEIJINTO', '2022-09-10', '5849325654674', '100.00', '120.00', 1, 1, 'SSD WEJINTO 120GB.JPG', 'arquivos/631c916b5e369.jpg', 20, 16),
(11, 'SSD 1TB KINGSPEC', '2022-09-10', '6950509983301', '100.00', '720.00', 1, 2, 'SSD KINGSPEC 128GB.JPG', 'arquivos/631c91d0aef01.jpg', 20, 16),
(12, 'PENDRIVE SANDISK 8GB', '2022-09-10', '619659067021', '10.00', '25.00', 1, 1, 'Pendrive.JPG', 'arquivos/631c925d196c1.jpg', 20, 16),
(13, 'CABO P2XP2', '2022-09-10', '2000000000026', '10.00', '15.00', 1, 3, 'CABO P2XP2.JPG', 'arquivos/631c937a4f8ae.jpg', 20, 16),
(14, 'PENDRIVE KINGSTON 64 GB', '2022-09-10', '0000000000001', '10.00', '65.00', 1, 1, 'PENDRIVE KINGSTON 64 GB.JPG', 'arquivos/631c945316981.jpg', 20, 16),
(15, 'CARTÃO DE MEMÓRIA KINGSTON 16GB', '2022-09-10', '0000000000002', '10.00', '45.00', 1, 10, 'CARTÃO DE MEMÓRIA KINGSTON 16GB.JPG', 'arquivos/631c97c50bbcd.jpg', 20, 16),
(16, 'PENDRIVE KINGSTON 1TB', '2022-09-10', '0000000000003', '10.00', '68.00', 1, 10, 'PENDRIVE KINGSTON 1TB.JPG', 'arquivos/631c9d044cbc7.jpg', 20, 16),
(17, 'PENDRIVE KINGSTON 512GB', '2022-09-10', '0000000000004', '10.00', '42.00', 1, 3, 'PENDRIVE KINGSTON 1TB.JPG', 'arquivos/631c9fd9bc31d.jpg', 20, 16),
(18, 'PENDRIVE KINGSTON 64GB', '2022-09-10', '0000000000005', '10.00', '42.00', 1, 3, 'PENDRIVE KINGSTON 1TB.JPG', 'arquivos/631ca2d6c102a.jpg', 20, 16),
(19, 'PENDRIVE HP 16GB', '2022-09-10', '0000000000006', '10.00', '42.00', 1, 11, 'PENDRIVE HP 16GB.JPG', 'arquivos/631ca3e6d65ce.jpg', 20, 16),
(21, 'TELA J400', '2022-09-12', '', '130.00', '350.00', 0, 2, '', 'arquivos/631f7e32274b0.', 19, 15),
(22, 'TELA K52  SEM ARO', '2022-09-12', '', '120.00', '350.00', 0, 3, '', 'arquivos/631f7e7f57068.', 19, 15),
(23, 'PENDRIVE HUAWEI 16GB', '2022-09-17', '0000000000008', '10.00', '42.00', 1, 6, 'PENDRIVE HUAWEI 16GB.png', 'arquivos/6325ecbbcf2cc.png', 20, 16),
(24, 'SMART BRACELET', '2022-09-17', '0000000000009', '20.00', '70.00', 1, 6, 'Smart bracelet redondo.png', 'arquivos/6325ed75e0f5a.png', 20, 16),
(25, 'FONE DE OUVIDO BLUETO KP-367', '2022-09-17', '7898594125703', '25.00', '60.00', 1, 4, 'FONE DE OUVIDO BLUETO.png', 'arquivos/6325ee6e7c8f2.png', 20, 16),
(26, 'POWER BANK 6800mAh', '2022-09-17', '549768866928', '15.00', '60.00', 1, 2, 'POWER BANK.png', 'arquivos/6325f0a5396fd.png', 20, 16),
(27, 'AMPLIADOR DE TELA PARA CELULAR E TABLET', '2022-09-17', '0000000000010', '10.00', '40.00', 1, 2, 'AMPLIADOR DE TELA CELULAR TABLET.PNG', 'arquivos/6325f0595a80f.png', 20, 16),
(28, 'CADEADO PADO ASTE LONGA  LT-30', '2022-09-17', '7891065006129', '20.00', '39.90', 1, 3, 'CADEADO HASTE LONGA 30MM.jpg', 'arquivos/6325f7faeedf2.jpg', 20, 16),
(29, 'CADEADO PADO LT-40', '2022-09-17', '7891065011635', '20.00', '37.90', 1, 3, 'CADEADO 40MM.jpg', 'arquivos/6325f857bd501.jpg', 20, 16),
(30, 'CADEADO PADO LT-30', '2022-09-17', '7891065000165', '20.00', '25.90', 1, 3, 'CADEADO 30MM.jpg', 'arquivos/6325f8b580d6f.jpg', 20, 16),
(31, 'CADEADO PADO LT-20', '2022-09-17', '7891065000141', '15.00', '25.00', 1, 3, 'CADEADO 20MM.jpg', 'arquivos/6325f91349c5b.jpg', 20, 16),
(32, 'CONTROLE PARA PORTÃO PPA ZAP 2 POP', '2022-09-17', '7898481913277', '15.00', '35.00', 1, 1, 'CONTROLE PPA.png', 'arquivos/6325f9e5cb677.png', 20, 16),
(33, 'CONTROLE PORTAO FX PRETO', '2022-09-17', '7898222600664', '15.00', '35.00', 1, 4, 'CONTROLE PORTAL FX.png', 'arquivos/6325fa5549328.png', 20, 16),
(34, 'troca tela', '2022-09-19', 'tela redmi not 10', '210.00', '650.00', 0, 1, '', 'arquivos/6328a0012ee09.', 19, 15),
(35, 'tela redmi9a', '2022-09-19', 'tela 9a', '150.00', '280.00', 0, 2, '', 'arquivos/6328b25c80374.', 19, 15),
(36, 'caixa som', '2022-09-19', '2018032001726', '40.00', '85.00', 0, 2, '', 'arquivos/6328d9e731365.', 19, 15),
(37, 'SUPORTE UNIVERSAL PARA CELULAR LE-016', '2022-09-19', '7898605605309', '15.00', '43.00', 1, 3, 'SUPORTE LE 016.PNG', 'arquivos/6328e5c3c6217.png', 20, 16),
(38, 'SUPORTE PARA CELULAR MOBILE PHONE STENTS', '2022-09-19', '0000000000012', '10.00', '33.00', 1, 1, 'MOBILE PHONE STENTS.png', 'arquivos/6328e7eed46ab.png', 20, 16),
(39, 'SUPORTE DE CELULAR PARA CARRO SAIDA DE AR', '2022-09-19', '3236548680061', '10.00', '25.00', 1, 3, 'Suporte Universal Veicular Carro Para Celular GPS Holder.PNG', 'arquivos/6328e90ad5326.png', 20, 16),
(40, 'SUPORTE DE CELULAR PARA CARRO SAIDA DE AR', '2022-09-19', '0000000000015', '10.00', '25.00', 1, 1, 'Suporte Veicular Para Celular GPS Universal Anti Queda.PNG', 'arquivos/6328e950a15b4.png', 20, 16),
(41, 'RING LIGHT', '2022-09-19', '0000000000016', '7.00', '19.00', 1, 1, 'Ring Light Selfie Para Celular Três Potências Anel De Luz.PNG', 'arquivos/6328e9e063a18.png', 20, 16),
(42, 'MINI TRIPE', '2022-09-21', '7865566615616', '5.00', '19.00', 1, 22, 'MINI TRIPE.PNG', 'arquivos/632b77eea65b8.png', 20, 16),
(43, 'CABO PARA IMPRESSORA 3M', '2022-09-21', '7898535506059', '5.00', '22.00', 1, 1, 'CABO DE IMPRESSORA 2.0 3 METROS SECCON.PNG', 'arquivos/632b786b26c94.png', 20, 16),
(44, 'ADAPTADOR MDL-0610', '2022-09-21', '0000000000020', '5.00', '18.00', 1, 1, 'ADAPTADOR MDL 0610.png', 'arquivos/632b793478766.png', 20, 16),
(45, 'ADAPTADOR USB PARA PS2', '2022-09-21', '0000000000021', '5.00', '32.00', 1, 2, 'ADAPTADOR USB PARA PS2.png', 'arquivos/632b79b5a480e.png', 20, 16),
(46, 'MINI CARREGADOR VEICULAR', '2022-09-21', '0000000000022', '2.00', '8.00', 1, 10, 'CARREGADOR VEICULAR MINI.PNG', 'arquivos/632b7a959588c.png', 20, 16),
(47, 'CARREGADOR PARA CELULAR AVULSO', '2022-09-21', '0000000000023', '5.00', '15.00', 1, 48, 'CARREGADOR AVULSO.png', 'arquivos/632b7ba233200.png', 20, 16),
(48, 'CABO AVULSO', '2022-09-21', '0000000000024', '5.00', '10.00', 1, 38, 'CABO USB V8 80 CM.PNG', 'arquivos/632b7c23c086a.png', 20, 16),
(49, 'SUPORTE FLEXIVEL COM GARRA', '2022-09-21', '0000000000025', '5.00', '29.00', 1, 13, 'SUPORTE FLEXIVEL COM GARRA.PNG', 'arquivos/632b7cd884e55.png', 20, 16),
(50, 'TRIPE PROFISSIONAL B-MAX', '2022-09-21', '7893595900342', '15.00', '98.00', 1, 3, 'TRIPE PROFISSIONAL B-MAX.png', 'arquivos/632b7d8ad3fce.png', 20, 16),
(51, 'FONE DE OUVIDO INOVA FON-10052 COLORIDO', '2022-09-21', '7893590163933', '3.00', '15.00', 1, 18, 'FONE INTRA AURICULAR INOVA FON 10052.PNG', 'arquivos/632b7e9d79d9d.png', 20, 16),
(52, 'FONE DE OUVIDO INOVA FON-8640 COLORIDO', '2022-09-21', '7893590429114', '5.00', '15.00', 1, 7, 'fone inova intra auricular FON 8640.PNG', 'arquivos/632b7f98314e0.png', 20, 16),
(53, 'FONE DE OUVIDO INOVA FON-2092D', '2022-09-21', '7897373104502', '10.00', '32.00', 1, 1, 'FONE INOVA FON 2092D.PNG', 'arquivos/632b80099eb5b.png', 20, 16),
(54, 'FONE DE OUVIDO HEADSET Ear8 PARA IPHONE', '2022-09-21', '6988850251244', '15.00', '45.00', 1, 2, 'FONE DE OUVIDO HEADSET Ear8 PARA IPHONE.png', 'arquivos/632b81308fe05.png', 20, 16),
(55, 'FONE DE OUVIDO SAMSUNG', '2022-09-21', '6999969795659', '6.00', '38.00', 1, 15, 'FONE SAMSUNG INTRA AURICULAR.PNG', 'arquivos/632b822056998.png', 20, 16),
(56, 'FONE DE OUVIDO WIRELES i11 5.0', '2022-09-21', '0000000000026', '25.00', '65.00', 1, 2, 'FONE DE OUVIDO WIRELES i11 5.0.png', 'arquivos/632b82f1c1b08.png', 20, 16),
(57, 'FONE DE OUVIDO INOVA FON-2066D', '2022-09-21', '7897373104533', '15.00', '42.00', 1, 8, 'FONE INOVA FON 2066D.PNG', 'arquivos/632b835746cad.png', 20, 16),
(58, 'CAIXA DE SOM PEQUENO FALAR AL-6883', '2022-09-21', '7898884570121', '15.00', '48.00', 1, 5, 'CAIXA DE SOM PEQUENO FALAR AL-6883.png', 'arquivos/632b845cd4da1.png', 20, 16),
(59, 'POP SOCKET - SUPORTE PARA DEDO', '2022-09-21', '0000000000027', '2.00', '10.00', 1, 6, 'Suporte De Dedo Pop Socket.PNG', 'arquivos/632b851dcd7b9.png', 20, 16),
(60, 'ANTENA USB 2.0 WIRELES', '2022-09-21', '6991908058085', '12.00', '32.00', 1, 3, 'ANTENA USB 2.0 WIRELES.png', 'arquivos/632b85db2f90f.png', 20, 16),
(61, 'CARREGADOR UNIVERSAL', '2022-09-21', '7891808187757', '5.00', '20.00', 1, 5, 'CARREGADOR UNIVERSAL.png', 'arquivos/632b86a4bb1c9.png', 20, 16),
(62, 'CARREGADOR VEICULAR LG COM CABO', '2022-09-21', '0000000000028', '10.00', '26.00', 1, 9, 'CARREGADOR VEICULAR V8 TURBO LG.PNG', 'arquivos/632b872c374c2.png', 20, 16),
(63, 'CARREGADOR VEICULAR 3 ENTRADAS USB', '2022-09-21', '0000000000029', '5.00', '32.00', 1, 5, 'CARREGADOR VEICULAR COM 3 PORTAS USB.PNG', 'arquivos/632b87c3d047b.png', 20, 16),
(64, 'CARREGADOR PARA IPHONE 12W', '2022-09-21', '7896621611052', '20.00', '55.00', 1, 6, 'CARREGADOR PARA IPHONE 12W.png', 'arquivos/632b8978d7912.png', 20, 16),
(65, 'CARREGADOR LEON TURBO 5.8', '2022-09-21', '7891234550347', '12.00', '58.00', 1, 3, 'CARREGADOR TURBO LEON.PNG', 'arquivos/632b89f67b284.png', 20, 16),
(66, 'CARREGADOR MI 3.0 TYPE C', '2022-09-21', '0000000000030', '15.00', '55.00', 1, 3, 'CARREGADOR MI.PNG', 'arquivos/632b8b7689bb0.png', 20, 16),
(67, 'CARREGADOR INOVA CAR-9012', '2022-09-21', '0000000000031', '15.00', '45.00', 1, 1, 'CARREGADOR INTELIGENTE COM 2 ENTRADAS USB 3.1A.PNG', 'arquivos/632b8c590dbed.png', 20, 16),
(68, 'CARREGADOR MOTOROLA AUTHENTIC 3.0', '2022-09-21', '7820099880788', '15.00', '65.00', 1, 8, 'CARREGADOR MOTOROLLA AUTHENTIC.PNG', 'arquivos/632b8ce591690.png', 20, 16),
(69, 'CARREGADOR MOTOROLA TURBO POWER 3.0', '2022-09-21', '7237558983322', '15.00', '65.00', 1, 8, 'CARREGADOR MOTO TURBOPOWER.PNG', 'arquivos/632b8d63e3070.png', 20, 16),
(70, 'CARREGADOR SAMSUNG FAST', '2022-09-21', '0000000000033', '15.00', '65.00', 1, 1, 'CARREGADOR SAMSUNG FAST.PNG', 'arquivos/632b8dd392185.png', 20, 16),
(71, 'CARREGADOR SAMSUNG CHARGER GALAXY', '2022-09-21', '0000000000034', '15.00', '65.00', 1, 9, 'CARREGADOR SAMSUNG CHARGER GALAXY.png', 'arquivos/632b8eb3bbfab.png', 20, 16),
(72, 'CABO DE FORÇA', '2022-09-22', '0000000000035', '5.00', '15.00', 1, 4, 'CABO DE FORÇA PARA PC.PNG', 'arquivos/632cd29a9ad31.png', 20, 16),
(73, 'SUPORTE DE CELULAR PARA MOTO E BIKES', '2022-09-22', '7800000123456', '15.00', '38.00', 1, 2, 'suporte de celular para moto.PNG', 'arquivos/632cd30e2c9a1.png', 20, 16),
(74, 'CABO PARA IPHONE 90 CM DATA CABLE', '2022-09-22', '0000000000037', '5.00', '22.00', 1, 7, 'CABOS IPHONE COLORIDO 80CM.PNG', 'arquivos/632cd42f1c458.png', 20, 16),
(75, 'CABO TIPO V8 MICRO USB 1,5M COLORIDO', '2022-09-22', '0000000000036', '5.00', '22.00', 1, 8, 'Cabo Micro USB V8 Nylon 1m Colorido.PNG', 'arquivos/632cd51883833.png', 20, 16),
(76, 'CABO TIPO V8 MICRO USB 1M COLORIDO INOVA', '2022-09-22', '0000000000038', '5.00', '18.00', 1, 3, 'Cabo Micro USB V8 Nylon 1m Colorido.PNG', 'arquivos/632cd582b7cd0.png', 20, 16),
(77, 'CABO  CAIXINHA 1,5M', '2022-09-22', '6910803084449', '5.00', '25.00', 1, 3, 'CABO USB 2.0 TIPO C 1,5 METROS.PNG', 'arquivos/632cd5db5a17f.png', 20, 16),
(78, 'CABO PARA IPHONE 3M', '2022-09-22', '0000000000040', '10.00', '55.00', 1, 1, 'CABO IPHONE BRANCO 3 METROS.PNG', 'arquivos/632cd651c1e8d.png', 20, 16),
(79, 'CABO TIPO V8 MICRO USB 3M', '2022-09-22', '0000000000041', '15.00', '48.00', 1, 7, 'CABO USB V8 BRANCO 3 METROS.PNG', 'arquivos/632cd706beb5f.png', 20, 16),
(80, 'CABO V8 MICRO USB 1,2M COLORIDO', '2022-09-22', '0000000000043', '5.00', '22.00', 1, 8, 'Cabo Micro USB V8 Nylon 1m Colorido.PNG', 'arquivos/632cd80b1dcca.png', 20, 16),
(81, 'CAIXA DE SOM ST-3', '2022-09-22', '7892021010044', '15.00', '55.00', 1, 2, 'CAIXA DE SOM S-T3.png', 'arquivos/632cd912e442a.png', 20, 16),
(82, 'CAIXA DE SOM A-37 ALTOMEX', '2022-09-22', '7869549431323', '22.00', '69.00', 1, 1, 'CAIXA DE SOM 101-B.png', 'arquivos/632cd997b4b82.png', 20, 16),
(83, 'CAIXA DE SOM MINI SPEAKER WS-887', '2022-09-22', '0000000000042', '7.00', '49.00', 1, 6, 'CAIXA DE SOM MINI SPEAKER.PNG', 'arquivos/632cda4ea82f2.png', 20, 16),
(84, 'CAIXA DE SOM JBL CHARGE 3', '2022-09-22', '0000000000044', '49.00', '125.00', 1, 1, 'CAIXA DE SOM JBL CHARGE 3.png', 'arquivos/632cdafed7ee9.png', 20, 16),
(85, 'STEREO HEADPHONES JBL XB-450', '2022-09-22', '6917678004220', '15.00', '65.00', 1, 3, 'XB 450 JBL.PNG', 'arquivos/632cdb7d0e719.png', 20, 16),
(86, 'CHAVE YALE', '2022-09-22', '0000000000050', '1.00', '10.00', 1, 979, 'CHAVES YALE.png', 'arquivos/632cdc42bfd18.png', 20, 16),
(87, 'CHAVE GORJE', '2022-09-22', '0000000000051', '5.00', '18.00', 1, 50, 'CHAVE GORJE.png', 'arquivos/632cdd1ec5218.png', 20, 16),
(88, 'CHAVE PARA VEICULO SIMPLES', '2022-09-22', '0000000000052', '12.00', '25.00', 1, 100, 'CHAVES SIMPLES PARA CARRO.png', 'arquivos/632cde61121fa.png', 20, 16),
(89, 'CHAVE TETRA GRANDE', '2022-09-22', '0000000000056', '5.00', '30.00', 1, 50, 'CHAVE TETRA GRANDE.png', 'arquivos/632ce0751f21b.png', 20, 16),
(90, 'CHAVE TETRA PEQUENA', '2022-09-22', '0000000000054', '5.00', '20.00', 1, 49, 'CHAVE TETRA PEQUENA.png', 'arquivos/632ce0e70403e.png', 20, 16),
(91, 'CHAVE PARA MOTOCICLETA', '2022-09-22', '0000000000053', '5.00', '20.00', 1, 50, 'CHAVE MOTO.png', 'arquivos/632ce16083e3d.png', 20, 16),
(92, 'ARGOLA COM CORRENTE', '2022-09-22', '0000000000060', '0.50', '1.00', 1, 39, 'ARGOLA COM CORRENTE.png', 'arquivos/632ce4a96048e.png', 20, 16),
(93, 'ADAPTADOR OTG TIPO C', '2022-09-22', '0000000000061', '1.00', '10.00', 1, 39, 'ADAPTADOR OTG TIPO C.png', 'arquivos/632ce555d6298.png', 20, 16),
(94, 'ADAPTADOR OTG V8 MICRO USB', '2022-09-22', '0000000000062', '1.00', '10.00', 1, 40, 'ADAPTADOR OTG MICRO USB.png', 'arquivos/632ce5c893571.png', 20, 16),
(95, 'ADAPTADOR MICRO SD 2.0', '2022-09-22', '0000000000063', '1.00', '10.00', 1, 8, 'ADAPTADOR MICRO SD 2.0.png', 'arquivos/632ce67fa81cf.png', 20, 16),
(96, 'cabo usb samsung', '2022-09-23', '5956222795314', '6.80', '35.00', 1, 4, 'WhatsApp Image 2022-09-23 at 09.36.27 (1).jpeg', 'arquivos/632da9fda8217.jpeg', 19, 15),
(97, 'cabo iphone foxcom', '2022-09-23', 'C4H850700RHYJ1A202', '7.12', '40.00', 1, 2, 'WhatsApp Image 2022-09-23 at 09.46.57.jpeg', 'arquivos/632daaf19836c.jpeg', 19, 15),
(98, 'cabo iphone kinghting', '2022-09-23', '3964644544454', '7.12', '40.00', 1, 4, 'WhatsApp Image 2022-09-23 at 09.36.27 (2).jpeg', 'arquivos/632dabc8aae9b.jpeg', 19, 15),
(99, 'carregador tipo c hamaston', '2022-09-23', '7899090162827', '14.90', '49.99', 1, 9, 'WhatsApp Image 2022-09-23 at 09.53.56.jpeg', 'arquivos/632dac991d2a6.jpeg', 19, 15),
(100, 'cabo usb v8', '2022-09-23', '5019123470978', '5.20', '30.00', 1, 3, 'WhatsApp Image 2022-09-23 at 09.55.22.jpeg', 'arquivos/632dadd21eb6f.jpeg', 19, 15),
(101, 'cabo v8 2 metro colorido', '2022-09-23', '5574565845452745274', '5.52', '30.00', 6214459, 4, '', 'arquivos/632dae51a451b.', 19, 15),
(102, 'fone jbl', '2022-09-23', '7858816020650', '5.52', '25.00', 1, 2, '', 'arquivos/632daebb352a7.', 19, 15),
(103, 'copia de chave', '2022-09-23', '48894578478785', '1.00', '10.00', 1, 9997, '', 'arquivos/632db86a81482.', 19, 15),
(104, 'choque em bateria', '2022-09-23', '66353', '30.00', '30.00', 0, 9997, '', 'arquivos/632e289ef2827.', 19, 15),
(105, 'teste', '2022-09-26', '123456', '11.11', '11.11', 111, 11, '', 'arquivos/6331c40522cb9.', 21, 18),
(106, 'tela m30', '2022-09-27', '56946464464646', '300.00', '600.00', 0, 1, '', 'arquivos/633351430a189.', 19, 15),
(107, 'CAIXA DE SOM KTS-1370', '2022-09-28', '7908434937158', '15.00', '58.00', 1, 1, 'CAIXA DE SOM KTS-1370.png', 'arquivos/6334af5243bf4.png', 20, 16),
(108, 'XEROX MONOCROMÁTICA', '2022-09-28', '0000000000070', '0.10', '0.40', 1, 978, '', 'arquivos/6334b61a03b93.', 20, 16),
(109, 'XEROX COLORIDA', '2022-09-28', '0000000000071', '0.10', '1.00', 1, 1000, '', 'arquivos/6334b6467cf89.', 20, 16),
(110, 'capinha motorola', '2022-10-09', '789789', '30.00', '50.00', 3, 10, '', 'arquivos/6342cb7785f0d.', 22, 19),
(111, 'capinha iphone', '2022-10-15', '6665653115124521212', '10.00', '39.90', 1, 99, '', 'arquivos/634aa3724a41b.', 19, 15),
(112, 'fonte iphone', '2022-10-15', '95654666', '10.00', '35.00', 1, 99, '', 'arquivos/634aa426bf154.', 19, 15),
(113, 'pelicula', '2022-10-15', '5466136666526', '10.00', '30.00', 10000, 999, '', 'arquivos/634aa4d6a98e7.', 19, 15),
(114, 'PORTEIRO RESIDENCIAL INTELBRAS IPR 1010', '2022-11-26', '7896637673419', '133.00', '185.00', 1, 2, 'PORTEIRO ELETRONICO INTELBRAS IPR 1010.png', 'arquivos/638242892b6a2.png', 20, 16),
(115, 'FECHADURA PARA PORTA  DE ENROLAR', '2022-11-26', '7893858560146', '34.90', '65.00', 1, 2, 'FECHADURA PORTA DE ENROLAR STAM YALE.png', 'arquivos/638243862ce6b.png', 20, 16),
(116, 'CILINDRO ALIANÇA CURTO ORIGINAL', '2022-11-26', '0000000054236', '25.90', '49.20', 1, 2, '', 'arquivos/638244980e63c.', 20, 16),
(117, 'CILINDRO ORIGINAL PADO LONGO 90MM', '2022-11-26', '7890577462577', '54.90', '95.00', 1, 1, '', 'arquivos/638244f47a4a0.', 20, 16),
(118, 'CILINDRO STAM BI-PARTIDO PINO', '2022-11-26', '7893858311311', '29.90', '56.80', 1, 2, '', 'arquivos/638245439f23c.', 20, 16),
(119, 'CILINDRO STAM BI-PARTIDO GRANDE PINO', '2022-11-26', '7893858311779', '39.90', '75.80', 1, 1, '', 'arquivos/6382458a6c525.', 20, 16),
(120, 'CILINDRO  BI-PARTIDO STAM REDONDO', '2022-11-26', '7893858312752', '36.90', '70.10', 1, 1, '', 'arquivos/638245c850e33.', 20, 16),
(121, 'CILINDRO PADO TRADICIONAL ORIGINAL', '2022-11-26', '7890577434574', '35.90', '68.20', 1, 2, '', 'arquivos/6382461036dad.', 20, 16),
(122, 'CILINDRO STAM BUZIOS 74MM', '2022-11-26', '7893858313247', '36.90', '70.10', 1, 1, '', 'arquivos/638246763a60a.', 20, 16),
(123, 'CILINDRO ALIANÇA LONGO ORIGINAL', '2022-11-26', '0000000054250', '27.90', '53.00', 1, 2, '', 'arquivos/638246c6db4b0.', 20, 16),
(124, 'cabo usb iphone', '2022-11-30', '44844845448484845', '7.50', '50.00', 0, 4, '', 'arquivos/63879ce407297.', 19, 15),
(125, 'fone', '2022-12-03', '44944848484848', '10.00', '40.00', 0, 6, 'WhatsApp Image 2022-12-03 at 09.58.52.jpeg', 'arquivos/638b4b28d2367.jpeg', 19, 15),
(126, 'fone oricular', '2022-12-03', '944844946', '10.00', '45.00', 0, 4, 'WhatsApp Image 2022-12-03 at 09.59.08.jpeg', 'arquivos/638b4b81bd030.jpeg', 19, 15),
(127, 'fone', '2022-12-03', '6+5956565623', '10.00', '40.00', 0, 4, 'WhatsApp Image 2022-12-03 at 09.59.39.jpeg', 'arquivos/638b4bed53feb.jpeg', 19, 15),
(128, 'fone', '2022-12-03', '565585448484', '10.00', '45.00', 0, 3, 'WhatsApp Image 2022-12-03 at 09.59.39.jpeg', 'arquivos/638b4c64ecdb1.jpeg', 19, 15),
(129, 'carregador v8 basike', '2022-12-12', '5499+9*99595*98*7*', '13.00', '38.00', 1, 9, '', 'arquivos/63978d69a1acf.', 19, 15),
(130, 'tela redmi 9c', '2022-12-23', '+84952626262692962', '110.00', '300.00', 1, 1999, '', 'arquivos/63a5d7c0ae42f.', 19, 15),
(131, 'asdasdasdasdas', '1987-06-03', '165465489489', '1.00', '1.00', 1, 48, '', 'arquivos/63a9f3826b45b.', 13, 9),
(132, 'tela a03s', '2023-01-07', '5694646446464669', '1.10', '300.00', 0, 999, '', 'arquivos/63b9805b8463e.', 19, 15),
(133, 'tela moto g7 play', '2023-01-07', '569464644646461', '120.00', '270.00', 0, 9999, '', 'arquivos/63b98589927aa.', 19, 15),
(134, 'tela rdmi 9c', '2023-01-13', '874+8944848848', '130.00', '300.00', 0, 10000, '', 'arquivos/63c1993a75ac6.', 19, 15),
(135, 'conector de carga redmi 9c', '2023-01-13', '*9569+889*8*98*985*98', '10.00', '150.00', 0, 9998, '', 'arquivos/63c199813f972.', 19, 15),
(136, 'abertura de porta', '2023-01-21', 'abertura', '10.00', '100.00', 1, 0, '', 'arquivos/63cc3d9f15cbe.', 19, 15),
(137, 'Produto de teste', '2023-02-12', '6455465465', '150.00', '350.00', 1, 10, 'PHOTO-2022-05-10-11-40-07.jpg', 'arquivos/63e8dc5530b9e.jpg', 26, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produto_os`
--

CREATE TABLE `tb_produto_os` (
  `ProdOsID` int(11) NOT NULL,
  `ProdOsQtd` int(11) NOT NULL,
  `ProdOs_osID` int(11) NOT NULL,
  `ProdOsProdID` int(11) NOT NULL,
  `ProdOsSubTotal` decimal(10,2) NOT NULL,
  `ProdOsEmpID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_produto_os`
--

INSERT INTO `tb_produto_os` (`ProdOsID`, `ProdOsQtd`, `ProdOs_osID`, `ProdOsProdID`, `ProdOsSubTotal`, `ProdOsEmpID`) VALUES
(28, 1, 20, 2, '10.00', 10),
(31, 1, 37, 34, '650.00', 19),
(32, 1, 38, 35, '280.00', 19),
(33, 1, 40, 106, '600.00', 19),
(34, 10, 22, 3, '12.30', 10),
(35, 1, 41, 35, '280.00', 19),
(36, 1, 50, 5, '15.00', 16),
(38, 2, 69, 131, '2.00', 13),
(39, 1, 76, 132, '300.00', 19),
(41, 1, 77, 133, '270.00', 19),
(42, 1, 61, 130, '300.00', 19),
(43, 1, 61, 135, '150.00', 19),
(44, 1, 79, 21, '350.00', 19),
(45, 1, 72, 135, '150.00', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tb_servico`
--

CREATE TABLE `tb_servico` (
  `ServID` int(11) NOT NULL,
  `ServNome` varchar(100) NOT NULL,
  `ServValor` decimal(10,2) NOT NULL,
  `ServDescricao` text,
  `ServEmpID` int(11) NOT NULL,
  `ServUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_servico`
--

INSERT INTO `tb_servico` (`ServID`, `ServNome`, `ServValor`, `ServDescricao`, `ServEmpID`, `ServUserID`) VALUES
(2, 'Trocar película', '10.00', 'Colocar nova película', 10, 6),
(3, 'Serviço Geral', '100.00', 'Serviço Em geral', 10, 6),
(4, 'Serviço de concerto em Celular', '50.00', 'Serviço a ser realizado para concerto de peça', 16, 12),
(5, 'Concerto em tela de celular', '100.00', '', 18, 14),
(6, 'Concerto em Cinto', '35.00', 'concerto', 10, 6),
(7, 'troca de conector de carga', '150.00', 'doc de carga  completo', 19, 15),
(8, 'conector doc de carga', '90.00', '', 19, 15),
(9, 'conector de carga', '200.00', 'sem risco de quebra tela', 19, 15),
(10, 'troca de tela', '260.00', 'tela a10s', 19, 15),
(11, 'TROCA DE TELA J400', '350.00', 'TELA', 19, 15),
(12, 'desoxidação de placa', '150.00', 'aparelho teve contato com liquido desoxidação de placa  com isso o aparelho tende a ligar \nserviço nao cobre  a tela queimada ou microfone etc.......', 19, 15),
(13, 'choque em bateria', '30.00', 'aparelho nao liga', 19, 15),
(14, 'tela a20', '480.00', 'original', 19, 15),
(15, 'Tela redmi 7a', '270.00', '', 19, 15),
(16, 'teste', '10.00', 'asdasdasdasd', 13, 9),
(17, 'conector de carga', '100.00', 'nao carrega', 19, 15),
(18, 'tela j7 prime', '350.00', 'tela danificada', 19, 15),
(19, 'tela a10', '350.00', 'tela danificada', 19, 15),
(20, 'tela redmi 9a /9c', '350.00', 'tela danificada', 19, 15),
(21, 'tela redmi 10A', '350.00', 'tela danificada', 19, 15),
(22, 'tela a03 core', '370.00', 'tela quebrada', 19, 15),
(23, 'tela a12', '370.00', 'tela quebrada', 19, 15),
(24, 'tela a21s', '400.00', 'tela quebrada', 19, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tb_servico_os`
--

CREATE TABLE `tb_servico_os` (
  `ServOsID` int(11) NOT NULL,
  `ServOsQtd` int(11) NOT NULL,
  `ServOs_osID` int(11) NOT NULL,
  `ServOsServID` int(11) NOT NULL,
  `ServOsSubTotal` decimal(10,2) NOT NULL,
  `ServOsEmpID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_servico_os`
--

INSERT INTO `tb_servico_os` (`ServOsID`, `ServOsQtd`, `ServOs_osID`, `ServOsServID`, `ServOsSubTotal`, `ServOsEmpID`) VALUES
(27, 1, 20, 2, '10.00', 10),
(28, 1, 29, 8, '90.00', 19),
(29, 1, 32, 11, '350.00', 19),
(30, 1, 33, 7, '150.00', 19),
(31, 1, 36, 12, '150.00', 19),
(32, 1, 42, 14, '480.00', 19),
(33, 1, 45, 7, '150.00', 19),
(34, 1, 50, 4, '50.00', 16),
(35, 1, 69, 16, '10.00', 13),
(36, 1, 75, 7, '150.00', 19),
(37, 1, 74, 8, '90.00', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tb_setor`
--

CREATE TABLE `tb_setor` (
  `id` int(11) NOT NULL,
  `nome_setor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_setor`
--

INSERT INTO `tb_setor` (`id`, `nome_setor`) VALUES
(1, 'Desenvolvimento'),
(8, 'alert(\'oi\');'),
(9, 'asdasdas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tecnico`
--

CREATE TABLE `tb_tecnico` (
  `tecnico_id` int(11) NOT NULL,
  `empresa_tecnico` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_tecnico`
--

INSERT INTO `tb_tecnico` (`tecnico_id`, `empresa_tecnico`) VALUES
(1, 'Empresa 1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipoequip`
--

CREATE TABLE `tb_tipoequip` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_tipoequip`
--

INSERT INTO `tb_tipoequip` (`id`, `nome`) VALUES
(1, 'Equipamento'),
(2, 'Configurado'),
(3, 'asdasdsad'),
(4, 'tsteste'),
(5, 'tsteste'),
(9, 'alert(\'oi\')'),
(10, 'asdada');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id` int(11) NOT NULL,
  `tipo` smallint(6) NOT NULL COMMENT '1 - Adm\n2 - funcionario\n3 - tecnico',
  `nome` varchar(50) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `UserEmpID` int(11) NOT NULL,
  `UserLogo` varchar(100) DEFAULT NULL,
  `UserLogoPath` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_usuario`
--

INSERT INTO `tb_usuario` (`id`, `tipo`, `nome`, `login`, `senha`, `status`, `telefone`, `UserEmpID`, `UserLogo`, `UserLogoPath`) VALUES
(1, 1, 'ju', '4445445', '123121321', 1, '84848884', 3, NULL, NULL),
(2, 1, 'Jose Tadeu Rosa Junior', 'teste@gmail.com', '123456', 1, '456456', 5, NULL, NULL),
(3, 1, 'empresa', 'empresa1', 'emprsa123121565', 1, '(43)996456338', 7, NULL, NULL),
(4, 1, 'renan', 'renan@gmail.com', '123456', 1, '4654848654', 8, '', NULL),
(5, 1, 'junior', 'josetadeu33217610@gmail.com', '123465', 1, '43996456338', 9, NULL, NULL),
(6, 1, 'Jose Junior', 'josetadeu33217610@gmail.com', '123456', 1, '(43) 9 9645-6338', 10, '16630891836762810851709708547327.jpg', 'arquivos/6320ba3ec18a3.jpg'),
(7, 1, 'werwerew', '13265465', '132456', 1, '8448', 11, NULL, NULL),
(8, 1, 'junior', 'josetadeu33217610@gmail.com', '123456', 1, '1121', 12, NULL, NULL),
(9, 1, 'junior', 'jose.junior@acessorias.com', '123456', 1, '43996456338', 13, 'josejunior.png', 'arquivos/63a09bc56d8ca.png'),
(10, 1, 'renan', 'renan@gmail.com', '123456', 1, '746375634534', 14, NULL, NULL),
(11, 1, 'bla bla', 'bla@gmail.com', '123456', 1, '4333464666', 15, NULL, NULL),
(12, 1, 'Jose Tadeu Rosa', 'josetadeu@gmail.com', '123456', 1, '(43) 9 9645-6338', 16, 'Assinatura_Junior.png', 'arquivos/6310e97d74000.png'),
(13, 1, 'Bie', 'bie@gmail.com', '123456', 1, '(46) 5 4564-656_', 17, 'Captura de tela de 2022-03-08 08-36-03.png', 'arquivos/6315d3681b6fc.png'),
(14, 1, 'suporte', 'suporte@gmail.com', '123456', 1, '(43) 9 9645-6338', 19, 'Assinatura_Junior.png', 'arquivos/631759d71d84e.png'),
(15, 1, 'TOPCELL ESPECIALIZADA', 'TOPCELLESPECIALIZADA@GMAIL.COM', 'TOPCELL2020', 1, '44997218771', 19, '97EBFA9F-E174-47BD-82E4-95ED9E3DC16F.jpeg', 'arquivos/63a461824f79a.jpeg'),
(16, 1, 'JOSE TADEU ROSA', 'rondoncelljac@gmail.com', 'tadeu0306', 1, '(43)9.8443-3066', 20, NULL, NULL),
(17, 1, 'suporte', 'suporte@hotmail.com', '123456', 1, '43996456338', 20, NULL, NULL),
(18, 1, 'pedro', 'pedrolapa753@gmail.com', '01032005', 1, '43996454', 21, NULL, NULL),
(19, 1, 'maycon', 'maycon@gmail.com', '123456', 1, '43996456338', 22, NULL, NULL),
(20, 1, 'Bie', 'bie@teste.com', '123456', 1, '234234234234', 23, NULL, NULL),
(21, 1, 'nicolas', 'niclasmonteiro910@gmail.com', '123456789', 1, '43988092847', 24, NULL, NULL),
(22, 1, 'Renan Siqueira de Souza', 'souzare7@outlook.com', 'ReShipuden12', 1, '43991756351', 25, NULL, NULL),
(23, 1, 'Suporte', 'jrsolucoesdigitais@gmail.com', '123456', 1, '43996456338', 26, 'JR.png', 'arquivos/63b5de9c84ecd.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vendas`
--

CREATE TABLE `tb_vendas` (
  `VendaID` int(11) NOT NULL,
  `VendaDT` date NOT NULL,
  `VendaValorTotal` decimal(10,2) DEFAULT '0.00',
  `VendaDesconto` decimal(10,2) DEFAULT '0.00',
  `VendaFaturado` char(1) DEFAULT 'N',
  `VendaCliID` int(11) NOT NULL,
  `VendaEmpID` int(11) NOT NULL,
  `VendaUserID` int(11) NOT NULL,
  `VendaLancamentoID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_vendas`
--

INSERT INTO `tb_vendas` (`VendaID`, `VendaDT`, `VendaValorTotal`, `VendaDesconto`, `VendaFaturado`, `VendaCliID`, `VendaEmpID`, `VendaUserID`, `VendaLancamentoID`) VALUES
(25, '2022-09-06', '200.00', NULL, 'S', 17, 18, 14, 41),
(29, '2022-09-08', '20.00', '0.00', NULL, 1, 10, 6, 0),
(32, '2022-09-13', '20.00', '0.00', 'S', 4, 10, 6, 51),
(34, '2022-09-17', '42.00', '36.00', 'S', 39, 20, 16, 53),
(35, '2022-09-23', '30.00', '0.00', 'S', 43, 19, 15, 58),
(36, '2022-09-23', '30.00', '20.00', 'S', 44, 19, 15, 59),
(37, '2022-09-23', '30.00', '0.00', 'N', 44, 19, 15, NULL),
(38, '2022-09-26', '38.00', '0.00', 'S', 39, 20, 16, 60),
(40, '2022-09-28', '1.60', '0.00', 'S', 39, 20, 16, 67),
(41, '2022-09-28', '35.00', '5.00', 'S', 39, 20, 16, 68),
(42, '2022-09-28', '1.20', '0.00', 'S', 47, 20, 16, 71),
(43, '2022-09-29', '49.99', '0.00', 'S', 48, 19, 15, 72),
(44, '2022-09-29', '30.00', '0.00', 'N', 48, 19, 15, NULL),
(45, '2022-10-02', '69.00', '0.00', 'S', 39, 20, 17, 73),
(46, '2022-10-13', '30.00', '0.00', 'S', 48, 19, 15, 80),
(47, '2022-10-15', '144.90', '0.00', 'N', 48, 19, 15, NULL),
(48, '2022-10-22', '155.20', '0.00', 'S', 47, 20, 16, 74),
(49, '2022-10-22', '30.00', '6.00', 'S', 47, 20, 16, 75),
(50, '2022-10-25', '65.00', '10.00', 'S', 39, 20, 16, 76),
(51, '2022-10-28', '35.00', '4.00', 'S', 47, 20, 16, 77),
(52, '2022-11-05', '55.80', '5.00', 'S', 47, 20, 16, 78),
(53, '2022-12-12', '249.95', '0.00', 'S', 49, 19, 15, 79),
(57, '2022-12-14', '49.99', '0.00', 'N', 49, 19, 15, NULL),
(59, '2022-12-15', '40.00', '0.00', 'N', 49, 19, 15, NULL),
(60, '2022-12-15', '164.00', '34.00', 'S', 75, 20, 16, 81),
(61, '2022-12-22', '38.00', '0.00', 'S', 49, 19, 15, 82),
(62, '2022-12-25', '1.00', '0.00', 'N', 83, 13, 9, NULL),
(63, '2023-01-04', '0.00', '0.00', 'N', 26, 19, 15, NULL),
(64, '2023-01-21', '0.00', '0.00', 'N', 44, 19, 15, NULL),
(65, '2023-01-21', '0.00', '0.00', 'N', 26, 19, 15, NULL),
(66, '2023-01-21', '100.00', '0.00', 'N', 44, 19, 15, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alocar`
--
ALTER TABLE `tb_alocar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_alocar_tb_setor1_idx` (`setor_id`),
  ADD KEY `fk_tb_alocar_tb_equipamento1_idx` (`equipamento_id`);

--
-- Indexes for table `tb_anexo`
--
ALTER TABLE `tb_anexo`
  ADD PRIMARY KEY (`AnxID`),
  ADD KEY `fk_tb_anexo_1_idx` (`AnxUserID`),
  ADD KEY `fk_tb_anexo_2_idx` (`AnxEmpID`);

--
-- Indexes for table `tb_chamado`
--
ALTER TABLE `tb_chamado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_chamado_tb_funcionario1_idx` (`funcionario_id`),
  ADD KEY `fk_tb_chamado_tb_tecnico1_idx` (`tecnico_atendimento`),
  ADD KEY `fk_tb_chamado_tb_tecnico2_idx` (`tecnico_encerramento`);

--
-- Indexes for table `tb_cidade`
--
ALTER TABLE `tb_cidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_cidade_tb_estado1_idx` (`estado_id`);

--
-- Indexes for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`CliID`),
  ADD KEY `fk_tb_cliente_1_idx` (`CliEmpID`);

--
-- Indexes for table `tb_empresa`
--
ALTER TABLE `tb_empresa`
  ADD PRIMARY KEY (`EmpID`);

--
-- Indexes for table `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_endereco_tb_cidade1_idx` (`cidade_id`),
  ADD KEY `fk_tb_endereco_tb_usuario1_idx` (`usuario_id`);

--
-- Indexes for table `tb_equipamento`
--
ALTER TABLE `tb_equipamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_equipamento_tb_tipoequip1_idx` (`tipoequip_id`),
  ADD KEY `fk_tb_equipamento_tb_modeloequip1_idx` (`modeloequip_id`);

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
  ADD KEY `fk_tb_funcionario_tb_setor1_idx` (`setor_id`);

--
-- Indexes for table `tb_garantia_os`
--
ALTER TABLE `tb_garantia_os`
  ADD PRIMARY KEY (`grtID`);

--
-- Indexes for table `tb_Itens_venda`
--
ALTER TABLE `tb_Itens_venda`
  ADD PRIMARY KEY (`ItensID`),
  ADD KEY `fk_tb_Itens_venda_1_idx` (`ItensVendaID`),
  ADD KEY `fk_tb_Itens_venda_2_idx` (`ItensProdID`),
  ADD KEY `fk_tb_Itens_venda_3_idx` (`ItensEmpID`);

--
-- Indexes for table `tb_lancamentos`
--
ALTER TABLE `tb_lancamentos`
  ADD PRIMARY KEY (`LancID`),
  ADD KEY `fk_tb_lancamentos_1_idx` (`LancClienteID`);

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
-- Indexes for table `tb_os`
--
ALTER TABLE `tb_os`
  ADD PRIMARY KEY (`OsID`),
  ADD KEY `fk_tb_os_1_idx` (`OsCliID`),
  ADD KEY `fk_tb_os_3_idx` (`OsEmpID`);

--
-- Indexes for table `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`ProdID`),
  ADD KEY `fk_tb_produto_1_idx` (`ProdEmpID`),
  ADD KEY `fk_tb_produto_2_idx` (`ProdUserID`);

--
-- Indexes for table `tb_produto_os`
--
ALTER TABLE `tb_produto_os`
  ADD PRIMARY KEY (`ProdOsID`),
  ADD KEY `fk_tb_produto_os_1_idx` (`ProdOs_osID`),
  ADD KEY `fk_tb_produto_os_2_idx` (`ProdOsProdID`);

--
-- Indexes for table `tb_servico`
--
ALTER TABLE `tb_servico`
  ADD PRIMARY KEY (`ServID`),
  ADD KEY `fk_tb_servico_1_idx` (`ServEmpID`),
  ADD KEY `fk_tb_servico_2_idx` (`ServUserID`);

--
-- Indexes for table `tb_servico_os`
--
ALTER TABLE `tb_servico_os`
  ADD PRIMARY KEY (`ServOsID`),
  ADD KEY `fk_tb_servico_os_1_idx` (`ServOs_osID`),
  ADD KEY `fk_tb_servico_os_2_idx` (`ServOsServID`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_usuario_Empresa1_idx` (`UserEmpID`);

--
-- Indexes for table `tb_vendas`
--
ALTER TABLE `tb_vendas`
  ADD PRIMARY KEY (`VendaID`),
  ADD KEY `fk_tb_vendas_1_idx` (`VendaCliID`),
  ADD KEY `fk_tb_vendas_2_idx` (`VendaEmpID`),
  ADD KEY `fk_tb_vendas_3_idx` (`VendaUserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_alocar`
--
ALTER TABLE `tb_alocar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_anexo`
--
ALTER TABLE `tb_anexo`
  MODIFY `AnxID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_chamado`
--
ALTER TABLE `tb_chamado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_cidade`
--
ALTER TABLE `tb_cidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `CliID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tb_empresa`
--
ALTER TABLE `tb_empresa`
  MODIFY `EmpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_endereco`
--
ALTER TABLE `tb_endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_equipamento`
--
ALTER TABLE `tb_equipamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_estado`
--
ALTER TABLE `tb_estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_garantia_os`
--
ALTER TABLE `tb_garantia_os`
  MODIFY `grtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_Itens_venda`
--
ALTER TABLE `tb_Itens_venda`
  MODIFY `ItensID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tb_lancamentos`
--
ALTER TABLE `tb_lancamentos`
  MODIFY `LancID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tb_modeloequip`
--
ALTER TABLE `tb_modeloequip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_os`
--
ALTER TABLE `tb_os`
  MODIFY `OsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `ProdID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `tb_produto_os`
--
ALTER TABLE `tb_produto_os`
  MODIFY `ProdOsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_servico`
--
ALTER TABLE `tb_servico`
  MODIFY `ServID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_servico_os`
--
ALTER TABLE `tb_servico_os`
  MODIFY `ServOsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_setor`
--
ALTER TABLE `tb_setor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_tipoequip`
--
ALTER TABLE `tb_tipoequip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_vendas`
--
ALTER TABLE `tb_vendas`
  MODIFY `VendaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_alocar`
--
ALTER TABLE `tb_alocar`
  ADD CONSTRAINT `fk_tb_alocar_tb_equipamento1` FOREIGN KEY (`equipamento_id`) REFERENCES `tb_equipamento` (`id`),
  ADD CONSTRAINT `fk_tb_alocar_tb_setor1` FOREIGN KEY (`setor_id`) REFERENCES `tb_setor` (`id`);

--
-- Constraints for table `tb_anexo`
--
ALTER TABLE `tb_anexo`
  ADD CONSTRAINT `fk_tb_anexo_1` FOREIGN KEY (`AnxUserID`) REFERENCES `tb_usuario` (`id`),
  ADD CONSTRAINT `fk_tb_anexo_2` FOREIGN KEY (`AnxEmpID`) REFERENCES `tb_empresa` (`EmpID`);

--
-- Constraints for table `tb_chamado`
--
ALTER TABLE `tb_chamado`
  ADD CONSTRAINT `fk_tb_chamado_tb_funcionario1` FOREIGN KEY (`funcionario_id`) REFERENCES `tb_funcionario` (`funcionario_id`),
  ADD CONSTRAINT `fk_tb_chamado_tb_tecnico1` FOREIGN KEY (`tecnico_atendimento`) REFERENCES `tb_tecnico` (`tecnico_id`),
  ADD CONSTRAINT `fk_tb_chamado_tb_tecnico2` FOREIGN KEY (`tecnico_encerramento`) REFERENCES `tb_tecnico` (`tecnico_id`);

--
-- Constraints for table `tb_cidade`
--
ALTER TABLE `tb_cidade`
  ADD CONSTRAINT `fk_tb_cidade_tb_estado1` FOREIGN KEY (`estado_id`) REFERENCES `tb_estado` (`id`);

--
-- Constraints for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD CONSTRAINT `fk_tb_cliente_1` FOREIGN KEY (`CliEmpID`) REFERENCES `tb_empresa` (`EmpID`);

--
-- Constraints for table `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD CONSTRAINT `fk_tb_endereco_tb_cidade1` FOREIGN KEY (`cidade_id`) REFERENCES `tb_cidade` (`id`),
  ADD CONSTRAINT `fk_tb_endereco_tb_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuario` (`id`);

--
-- Constraints for table `tb_equipamento`
--
ALTER TABLE `tb_equipamento`
  ADD CONSTRAINT `fk_tb_equipamento_tb_modeloequip1` FOREIGN KEY (`modeloequip_id`) REFERENCES `tb_modeloequip` (`id`),
  ADD CONSTRAINT `fk_tb_equipamento_tb_tipoequip1` FOREIGN KEY (`tipoequip_id`) REFERENCES `tb_tipoequip` (`id`);

--
-- Constraints for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD CONSTRAINT `fk_tb_funcionario_tb_setor1` FOREIGN KEY (`setor_id`) REFERENCES `tb_setor` (`id`),
  ADD CONSTRAINT `fk_tb_funcionario_tb_usuario1` FOREIGN KEY (`funcionario_id`) REFERENCES `tb_usuario` (`id`);

--
-- Constraints for table `tb_Itens_venda`
--
ALTER TABLE `tb_Itens_venda`
  ADD CONSTRAINT `fk_tb_Itens_venda_1` FOREIGN KEY (`ItensVendaID`) REFERENCES `tb_vendas` (`VendaID`),
  ADD CONSTRAINT `fk_tb_Itens_venda_2` FOREIGN KEY (`ItensProdID`) REFERENCES `tb_produto` (`ProdID`),
  ADD CONSTRAINT `fk_tb_Itens_venda_3` FOREIGN KEY (`ItensEmpID`) REFERENCES `tb_empresa` (`EmpID`);

--
-- Constraints for table `tb_lancamentos`
--
ALTER TABLE `tb_lancamentos`
  ADD CONSTRAINT `fk_tb_lancamentos_1` FOREIGN KEY (`LancClienteID`) REFERENCES `tb_cliente` (`CliID`);

--
-- Constraints for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD CONSTRAINT `fk_tb_log_tb_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuario` (`id`);

--
-- Constraints for table `tb_os`
--
ALTER TABLE `tb_os`
  ADD CONSTRAINT `fk_tb_os_1` FOREIGN KEY (`OsCliID`) REFERENCES `tb_cliente` (`CliID`),
  ADD CONSTRAINT `fk_tb_os_3` FOREIGN KEY (`OsEmpID`) REFERENCES `tb_empresa` (`EmpID`);

--
-- Constraints for table `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD CONSTRAINT `fk_tb_produto_1` FOREIGN KEY (`ProdEmpID`) REFERENCES `tb_empresa` (`EmpID`),
  ADD CONSTRAINT `fk_tb_produto_2` FOREIGN KEY (`ProdUserID`) REFERENCES `tb_usuario` (`id`);

--
-- Constraints for table `tb_produto_os`
--
ALTER TABLE `tb_produto_os`
  ADD CONSTRAINT `fk_tb_produto_os_1` FOREIGN KEY (`ProdOs_osID`) REFERENCES `tb_os` (`OsID`),
  ADD CONSTRAINT `fk_tb_produto_os_2` FOREIGN KEY (`ProdOsProdID`) REFERENCES `tb_produto` (`ProdID`);

--
-- Constraints for table `tb_servico`
--
ALTER TABLE `tb_servico`
  ADD CONSTRAINT `fk_tb_servico_1` FOREIGN KEY (`ServEmpID`) REFERENCES `tb_empresa` (`EmpID`),
  ADD CONSTRAINT `fk_tb_servico_2` FOREIGN KEY (`ServUserID`) REFERENCES `tb_usuario` (`id`);

--
-- Constraints for table `tb_servico_os`
--
ALTER TABLE `tb_servico_os`
  ADD CONSTRAINT `fk_tb_servico_os_1` FOREIGN KEY (`ServOs_osID`) REFERENCES `tb_os` (`OsID`),
  ADD CONSTRAINT `fk_tb_servico_os_2` FOREIGN KEY (`ServOsServID`) REFERENCES `tb_servico` (`ServID`);

--
-- Constraints for table `tb_tecnico`
--
ALTER TABLE `tb_tecnico`
  ADD CONSTRAINT `fk_tb_tecnico_tb_usuario` FOREIGN KEY (`tecnico_id`) REFERENCES `tb_usuario` (`id`);

--
-- Constraints for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_tb_usuario_Empresa1` FOREIGN KEY (`UserEmpID`) REFERENCES `tb_empresa` (`EmpID`);

--
-- Constraints for table `tb_vendas`
--
ALTER TABLE `tb_vendas`
  ADD CONSTRAINT `fk_tb_vendas_1` FOREIGN KEY (`VendaCliID`) REFERENCES `tb_cliente` (`CliID`),
  ADD CONSTRAINT `fk_tb_vendas_2` FOREIGN KEY (`VendaEmpID`) REFERENCES `tb_empresa` (`EmpID`),
  ADD CONSTRAINT `fk_tb_vendas_3` FOREIGN KEY (`VendaUserID`) REFERENCES `tb_usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
