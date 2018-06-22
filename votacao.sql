-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 22-Jun-2018 às 14:30
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `votacao`
--
CREATE DATABASE IF NOT EXISTS `votacao` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `votacao`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidato`
--

CREATE TABLE IF NOT EXISTS `candidato` (
  `Id_candidato` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_candidato` varchar(100) NOT NULL,
  `Data_nasc` date NOT NULL,
  `Cod_estado` int(11) NOT NULL,
  `Cod_partido` int(11) NOT NULL,
  `Cod_cargo` int(11) NOT NULL,
  PRIMARY KEY (`Id_candidato`),
  KEY `Cod_partido` (`Cod_partido`),
  KEY `Cod_cargo` (`Cod_cargo`),
  KEY `Cod_estado` (`Cod_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `candidato`
--

INSERT INTO `candidato` (`Id_candidato`, `Nome_candidato`, `Data_nasc`, `Cod_estado`, `Cod_partido`, `Cod_cargo`) VALUES
(1, 'Lula', '1970-07-15', 1, 5, 1),
(2, 'Alkimim', '2018-06-13', 1, 6, 2),
(3, 'Geoavne', '2018-06-13', 1, 6, 5),
(4, 'juao', '2018-06-20', 1, 7, 4),
(5, 'julia', '2018-06-20', 1, 5, 3),
(6, 'Ciro', '2018-12-31', 1, 7, 1),
(7, 'Doria1', '2018-12-31', 1, 7, 2),
(8, 'Marina', '2018-12-31', 1, 6, 1),
(10, 'JuliÃ£o', '2018-06-22', 16, 5, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `Id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_cargo` varchar(100) NOT NULL,
  `Funcao` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_cargo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`Id_cargo`, `Nome_cargo`, `Funcao`) VALUES
(1, 'Presidente', 'O presidente exerce a função de chefe do poder Executivo e também de chefe de Estado.'),
(2, 'Governador do Estado', 'A função do governador é a direção da administração estadual e a representação do Estado em suas rel'),
(3, 'Senador', 'O senador pode propor novas leis, normas e alterações na Constituição.'),
(4, 'Deputado Federal', 'Cabe a ele propor, discutir e aprovar leis, que podem alterar até mesmo a Constituição.'),
(5, 'Deputado Estadual', 'O deputado estadual é o representante do povo nas Assembleias Legislativas, eleito para um mandato d');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eleitor`
--

CREATE TABLE IF NOT EXISTS `eleitor` (
  `Id_eleitor` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_eleitor` varchar(100) NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `Data_nasc` date NOT NULL,
  `Cod_estado` int(11) NOT NULL,
  PRIMARY KEY (`Id_eleitor`,`CPF`),
  KEY `Cod_estado` (`Cod_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `eleitor`
--

INSERT INTO `eleitor` (`Id_eleitor`, `Nome_eleitor`, `CPF`, `Data_nasc`, `Cod_estado`) VALUES
(1, 'LÃ­via Ferreira dos Santos', '21737427877', '2001-08-01', 25),
(3, 'JÃºlia Perez', '21737427855', '2018-06-08', 16),
(4, 'Luana', '22222222222', '2018-06-15', 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `Id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_estado` varchar(100) NOT NULL,
  `UF` varchar(2) NOT NULL,
  PRIMARY KEY (`Id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`Id_estado`, `Nome_estado`, `UF`) VALUES
(1, 'Acre', 'AC'),
(2, 'Alagoas', 'AL'),
(3, 'Amapá', 'AP'),
(4, 'Amazonas', 'AM'),
(5, 'Bahia', 'BA'),
(6, 'Ceará', 'CE'),
(7, 'Distrito Federal', 'DF'),
(8, 'Espírito Santo', 'ES'),
(9, 'Goiás ', 'GO'),
(10, 'Maranhão', 'MA'),
(11, 'Mato Grosso', 'MT'),
(12, 'Mato Grosso do Sul', 'MS'),
(13, 'Minas Gerais ', 'MG'),
(14, 'Pará', 'PA'),
(15, 'Paraíba', 'PB'),
(16, 'Paraná', 'PR'),
(17, 'Pernambuco', 'PE'),
(18, 'Piauí', 'PI'),
(19, 'Rio de Janeiro', 'RJ'),
(20, 'Rio Grande do Norte', 'RN'),
(21, 'Rio Grande do Sul', 'RS'),
(22, 'Rondônia', 'RO'),
(23, 'Roraima', 'RR'),
(24, 'Santa Catarina', 'SC'),
(25, 'São Paulo', 'SP'),
(26, 'Sergipe', 'SE'),
(27, 'Tocantins', 'TO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `partido`
--

CREATE TABLE IF NOT EXISTS `partido` (
  `Id_partido` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_partido` varchar(100) NOT NULL,
  `Sigla` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_partido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `partido`
--

INSERT INTO `partido` (`Id_partido`, `Nome_partido`, `Sigla`) VALUES
(5, 'Partido do Trabalhador ', 'PT'),
(6, 'Partido da Causa Trabalhadora', 'PCO'),
(7, 'Partido Social Democrata', 'PSD');

-- --------------------------------------------------------

--
-- Estrutura da tabela `votacao`
--

CREATE TABLE IF NOT EXISTS `votacao` (
  `Id_votacao` int(11) NOT NULL AUTO_INCREMENT,
  `Cod_eleitor` int(11) NOT NULL,
  `Voto_presidente` int(10) NOT NULL,
  `Voto_governador` int(10) NOT NULL,
  `Voto_federal` int(10) NOT NULL,
  `Voto_estadual` int(10) NOT NULL,
  `Voto_senador` int(10) NOT NULL,
  PRIMARY KEY (`Id_votacao`),
  KEY `Cod_eleitor` (`Cod_eleitor`),
  KEY `Voto_presidente` (`Voto_presidente`),
  KEY `Voto_governador` (`Voto_governador`),
  KEY `Voto_federal` (`Voto_federal`),
  KEY `Voto_estadual` (`Voto_estadual`),
  KEY `Voto_senador` (`Voto_senador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `votacao`
--

INSERT INTO `votacao` (`Id_votacao`, `Cod_eleitor`, `Voto_presidente`, `Voto_governador`, `Voto_federal`, `Voto_estadual`, `Voto_senador`) VALUES
(2, 1, 1, 2, 4, 3, 5),
(3, 1, 1, 2, 4, 3, 5),
(4, 1, 1, 2, 4, 3, 5),
(5, 1, 1, 2, 4, 3, 5),
(6, 1, 1, 2, 4, 3, 5),
(7, 1, 1, 2, 4, 3, 5),
(8, 1, 8, 7, 4, 3, 5),
(9, 1, 8, 7, 4, 3, 5),
(10, 4, 1, 2, 4, 3, 5),
(11, 4, 1, 2, 4, 3, 5);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `candidato`
--
ALTER TABLE `candidato`
  ADD CONSTRAINT `candidato_ibfk_1` FOREIGN KEY (`Cod_partido`) REFERENCES `partido` (`Id_partido`),
  ADD CONSTRAINT `candidato_ibfk_2` FOREIGN KEY (`Cod_cargo`) REFERENCES `cargo` (`Id_cargo`),
  ADD CONSTRAINT `candidato_ibfk_3` FOREIGN KEY (`Cod_estado`) REFERENCES `estado` (`Id_estado`);

--
-- Limitadores para a tabela `eleitor`
--
ALTER TABLE `eleitor`
  ADD CONSTRAINT `eleitor_ibfk_1` FOREIGN KEY (`Cod_estado`) REFERENCES `estado` (`Id_estado`);

--
-- Limitadores para a tabela `votacao`
--
ALTER TABLE `votacao`
  ADD CONSTRAINT `votacao_ibfk_1` FOREIGN KEY (`Cod_eleitor`) REFERENCES `eleitor` (`Id_eleitor`),
  ADD CONSTRAINT `votacao_ibfk_2` FOREIGN KEY (`Voto_presidente`) REFERENCES `candidato` (`Id_candidato`),
  ADD CONSTRAINT `votacao_ibfk_3` FOREIGN KEY (`Voto_governador`) REFERENCES `candidato` (`Id_candidato`),
  ADD CONSTRAINT `votacao_ibfk_4` FOREIGN KEY (`Voto_federal`) REFERENCES `candidato` (`Id_candidato`),
  ADD CONSTRAINT `votacao_ibfk_5` FOREIGN KEY (`Voto_estadual`) REFERENCES `candidato` (`Id_candidato`),
  ADD CONSTRAINT `votacao_ibfk_6` FOREIGN KEY (`Voto_senador`) REFERENCES `candidato` (`Id_candidato`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
