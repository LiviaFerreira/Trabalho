-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 13-Jun-2018 às 14:39
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
  `Cod_partido` int(11) NOT NULL,
  `Cod_cargo` int(11) NOT NULL,
  PRIMARY KEY (`Id_candidato`),
  KEY `Cod_partido` (`Cod_partido`),
  KEY `Cod_cargo` (`Cod_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `votacao`
--

CREATE TABLE IF NOT EXISTS `votacao` (
  `Id_votacao` int(11) NOT NULL AUTO_INCREMENT,
  `Cod_eleitor` int(11) NOT NULL,
  `Cod_candidato` int(11) NOT NULL,
  PRIMARY KEY (`Id_votacao`),
  KEY `Cod_eleitor` (`Cod_eleitor`),
  KEY `Cod_candidato` (`Cod_candidato`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `candidato`
--
ALTER TABLE `candidato`
  ADD CONSTRAINT `candidato_ibfk_1` FOREIGN KEY (`Cod_partido`) REFERENCES `partido` (`Id_partido`),
  ADD CONSTRAINT `candidato_ibfk_2` FOREIGN KEY (`Cod_cargo`) REFERENCES `cargo` (`Id_cargo`);

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
  ADD CONSTRAINT `votacao_ibfk_2` FOREIGN KEY (`Cod_candidato`) REFERENCES `candidato` (`Id_candidato`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
