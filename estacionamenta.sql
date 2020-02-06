-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Dez-2019 às 07:50
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estacionamenta`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `ADM_INT_ID` int(6) NOT NULL,
  `ADM_STR_NOM` varchar(60) NOT NULL,
  `ADM_STR_LOGIN` varchar(30) NOT NULL,
  `ADM_STR_SEN` varchar(50) NOT NULL,
  `ADM_INT_TEL` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`ADM_INT_ID`, `ADM_STR_NOM`, `ADM_STR_LOGIN`, `ADM_STR_SEN`, `ADM_INT_TEL`) VALUES
(1, 'Admin', 'Admin', '202cb962ac59075b964b07152d234b70', '24367998');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ent_saida`
--

CREATE TABLE `ent_saida` (
  `ES_INT_ID` int(6) NOT NULL,
  `ENT_TIME_HR` time NOT NULL,
  `SAI_TIME_HR` time DEFAULT NULL,
  `ENT_DATE_DAT` date NOT NULL,
  `SAI_DATE_DAT` date DEFAULT NULL,
  `USU_INT_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ent_saida`
--

INSERT INTO `ent_saida` (`ES_INT_ID`, `ENT_TIME_HR`, `SAI_TIME_HR`, `ENT_DATE_DAT`, `SAI_DATE_DAT`, `USU_INT_ID`) VALUES
(1, '11:08:02', '19:47:34', '2019-11-27', '2019-11-29', 1),
(2, '06:23:12', '11:54:59', '2019-09-02', '2019-09-12', 3),
(3, '01:02:20', '05:36:43', '2019-12-01', '2019-12-02', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguranca`
--

CREATE TABLE `seguranca` (
  `SEG_INT_ID` int(6) NOT NULL,
  `SEG_STR_NOM` varchar(60) NOT NULL,
  `SEG_STR_LOGIN` varchar(30) NOT NULL,
  `SEG_STR_SEN` varchar(50) NOT NULL,
  `SEG_INT_TEL` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `seguranca`
--

INSERT INTO `seguranca` (`SEG_INT_ID`, `SEG_STR_NOM`, `SEG_STR_LOGIN`, `SEG_STR_SEN`, `SEG_INT_TEL`) VALUES
(1, 'Douglas', 'doug', '202cb962ac59075b964b07152d234b70', '1161760574'),
(2, 'Daniel', 'dani', '202cb962ac59075b964b07152d234b70', '26961789023'),
(3, 'Polliana', 'Polly', '202cb962ac59075b964b07152d234b70', '11988900772');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `USU_INT_ID` int(6) NOT NULL,
  `USU_STR_NOM` varchar(60) NOT NULL,
  `USU_INT_TEL` varchar(15) NOT NULL,
  `USU_STR_TIP` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`USU_INT_ID`, `USU_STR_NOM`, `USU_INT_TEL`, `USU_STR_TIP`) VALUES
(1, 'Abner', '1124367998', 'Civil'),
(2, 'Laura', '11988203360', 'Professor'),
(3, 'Silvio', '11959296604', 'Entregador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `VEI_STR_PLA` varchar(7) NOT NULL,
  `VEI_STR_MOD` varchar(30) NOT NULL,
  `VEI_STR_COR` varchar(30) NOT NULL,
  `VEI_STR_FAB` varchar(30) NOT NULL,
  `USU_INT_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`VEI_STR_PLA`, `VEI_STR_MOD`, `VEI_STR_COR`, `VEI_STR_FAB`, `USU_INT_ID`) VALUES
('AXD1546', 'Corolla', 'Prata', 'Toyota', 3),
('GIO2938', 'Celta', 'Preto', 'Chevrolet', 1),
('POI7648', 'Palio', 'Branco', 'Fiat', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ADM_INT_ID`);

--
-- Indexes for table `ent_saida`
--
ALTER TABLE `ent_saida`
  ADD PRIMARY KEY (`ES_INT_ID`),
  ADD KEY `USU_INT_ID` (`USU_INT_ID`);

--
-- Indexes for table `seguranca`
--
ALTER TABLE `seguranca`
  ADD PRIMARY KEY (`SEG_INT_ID`),
  ADD UNIQUE KEY `SEG_STR_LOGIN` (`SEG_STR_LOGIN`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`USU_INT_ID`);

--
-- Indexes for table `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`VEI_STR_PLA`),
  ADD KEY `USU_INT_ID` (`USU_INT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `ADM_INT_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ent_saida`
--
ALTER TABLE `ent_saida`
  MODIFY `ES_INT_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seguranca`
--
ALTER TABLE `seguranca`
  MODIFY `SEG_INT_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `USU_INT_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `USU_INT_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
