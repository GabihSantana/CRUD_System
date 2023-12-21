-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/12/2023 às 16:34
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbvetforpet`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabagendamento`
--

CREATE TABLE `tabagendamento` (
  `codAgendamento` int(11) NOT NULL,
  `numPet` int(11) DEFAULT NULL,
  `tutorCPF` varchar(15) DEFAULT NULL,
  `dataAgendamento` date NOT NULL,
  `horarioAgendamento` time NOT NULL,
  `codigoProcedimento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tabagendamento`
--

INSERT INTO `tabagendamento` (`codAgendamento`, `numPet`, `tutorCPF`, `dataAgendamento`, `horarioAgendamento`, `codigoProcedimento`) VALUES
(1, 8, '369.769.452-90', '2023-12-13', '17:30:00', 3),
(5, 3, '369.769.452-90', '2023-12-16', '12:42:00', 1),
(8, 6, '659.738.216-49', '2024-01-15', '10:25:00', 2),
(9, 11, '697.468.520-60', '2024-01-18', '15:20:00', 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabfuncionarios`
--

CREATE TABLE `tabfuncionarios` (
  `funcID` int(11) NOT NULL,
  `funcCPF` varchar(15) NOT NULL,
  `funcNome` varchar(50) NOT NULL,
  `funcEmail` varchar(60) NOT NULL,
  `funcSenha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tabfuncionarios`
--

INSERT INTO `tabfuncionarios` (`funcID`, `funcCPF`, `funcNome`, `funcEmail`, `funcSenha`) VALUES
(2, '649.758.361-50', 'João Silva', 'joao.silva@vetforpet.com', '$2y$10$7WjCjuX2PhNxw74yuMHYhuGWNzGS.Sv4Mp/va0yv4of/CmvOX9JuS'),
(3, '651.981.898-51', 'Mariana Barbosa', 'maribarbosa@vetforpet.com', '$2y$10$O3fY5Tq9PVKCVIMC9J34ruXhGaSVGKOZ94y.03iXjBY6AJjQ0xjiS');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabpets`
--

CREATE TABLE `tabpets` (
  `petId` int(11) NOT NULL,
  `petNome` varchar(30) NOT NULL,
  `petRaca` varchar(40) NOT NULL,
  `petSexo` char(1) DEFAULT NULL,
  `petDataNasc` date NOT NULL,
  `tutorId` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tabpets`
--

INSERT INTO `tabpets` (`petId`, `petNome`, `petRaca`, `petSexo`, `petDataNasc`, `tutorId`) VALUES
(3, 'Charlotte', 'Bulldog Francês', 'F', '2021-08-07', '369.769.452-90'),
(5, 'Bellamy', 'Shih Tzu', 'M', '2022-06-05', '369.769.452-90'),
(6, 'Scooby', 'Pastor Alemão', 'M', '2023-11-02', '659.738.216-49'),
(7, 'Caramelo', 'Vira-lata', 'M', '2022-05-21', '398.765.189-90'),
(8, 'Belinha', 'Poodle', 'F', '2018-06-09', '398.765.189-90'),
(9, 'Thor', 'Golden Retrivier ', 'M', '2023-09-01', '125.465.765-34'),
(10, 'Bob', 'Vira lata', 'M', '2019-05-19', '697.468.520-60'),
(11, 'Belinha', 'Vira lata', 'F', '2014-05-06', '697.468.520-60');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabprocedimento`
--

CREATE TABLE `tabprocedimento` (
  `codigoProcedimento` int(11) NOT NULL,
  `nomeProc` varchar(40) DEFAULT NULL,
  `valorProc` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tabprocedimento`
--

INSERT INTO `tabprocedimento` (`codigoProcedimento`, `nomeProc`, `valorProc`) VALUES
(1, 'Consulta Geral', 50.00),
(2, 'Cirurgia de Rotina', 150.00),
(3, 'Exame de Sangue', 80.00),
(4, 'Vacinação Anual', 30.00),
(5, 'Radiografia Simples', 120.00),
(6, 'Limpeza de Dentes', 60.00),
(7, 'Eletrocardiograma', 90.00),
(8, 'Ultrassonografia', 100.00),
(9, 'Castração', 200.00),
(10, 'Teste de Leishmaniose', 45.00),
(11, 'Endoscopia', 130.00),
(12, 'Odontologia Equina', 80.00),
(13, 'Ecocardiograma', 110.00),
(14, 'Pet Massage', 40.00),
(15, 'Profilaxia Dental', 55.00),
(16, 'Ressonância Magnética', 250.00),
(17, 'Acupuntura Veterinária', 70.00),
(18, 'Fisioterapia Canina', 75.00),
(19, 'Consulta de Emergência', 80.00),
(20, 'Consulta de Animais Exóticos', 60.00),
(21, 'Banho e Tosa', 80.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabtutor`
--

CREATE TABLE `tabtutor` (
  `tutorCPF` varchar(15) NOT NULL,
  `tutorNome` varchar(60) NOT NULL,
  `tutorSexo` char(1) DEFAULT NULL,
  `tutorDataNasc` date NOT NULL,
  `tutorFone` varchar(15) NOT NULL,
  `tutorEndereco` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tabtutor`
--

INSERT INTO `tabtutor` (`tutorCPF`, `tutorNome`, `tutorSexo`, `tutorDataNasc`, `tutorFone`, `tutorEndereco`) VALUES
('125.465.765-34', 'Silvana Peres', 'F', '2000-05-03', '(11) 95423-4354', 'Vila Mariana, 1245'),
('369.769.452-90', 'Antonieta Marie', 'F', '1998-05-14', '(11) 97468-2340', 'Av. Paulista, 123'),
('398.765.189-90', 'Angelica Machado', 'F', '1981-08-12', '(11) 98475-4306', 'Rua Machado, 123'),
('659.738.216-49', 'Marcio Braga', 'M', '1998-08-19', '(11) 97684-3210', 'Rua da Alegria, 719'),
('697.468.520-60', 'Marco Pereira ', 'M', '1995-09-06', '(11) 98684-9530', 'Rua Marechal Deodoro, 1987');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabveterinario`
--

CREATE TABLE `tabveterinario` (
  `vetCNPJ` varchar(20) NOT NULL,
  `vetNome` varchar(30) NOT NULL,
  `vetCEP` varchar(10) NOT NULL,
  `vetEndereco` varchar(60) NOT NULL,
  `vetCidade` varchar(30) DEFAULT NULL,
  `vetUF` varchar(2) DEFAULT NULL,
  `vetTelefone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tabveterinario`
--

INSERT INTO `tabveterinario` (`vetCNPJ`, `vetNome`, `vetCEP`, `vetEndereco`, `vetCidade`, `vetUF`, `vetTelefone`) VALUES
('27.613.857/0001-22', 'Vet4Pet', '12345-678', 'Rua São Joaquim, 340', 'São Paulo', 'SP', '(11) 2436-9104');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tabagendamento`
--
ALTER TABLE `tabagendamento`
  ADD PRIMARY KEY (`codAgendamento`),
  ADD KEY `numPet` (`numPet`),
  ADD KEY `tutorCPF` (`tutorCPF`);

--
-- Índices de tabela `tabfuncionarios`
--
ALTER TABLE `tabfuncionarios`
  ADD PRIMARY KEY (`funcID`),
  ADD UNIQUE KEY `funcEmail` (`funcEmail`);

--
-- Índices de tabela `tabpets`
--
ALTER TABLE `tabpets`
  ADD PRIMARY KEY (`petId`),
  ADD KEY `tutorId` (`tutorId`);

--
-- Índices de tabela `tabprocedimento`
--
ALTER TABLE `tabprocedimento`
  ADD PRIMARY KEY (`codigoProcedimento`);

--
-- Índices de tabela `tabtutor`
--
ALTER TABLE `tabtutor`
  ADD PRIMARY KEY (`tutorCPF`),
  ADD UNIQUE KEY `tutorCPF` (`tutorCPF`);

--
-- Índices de tabela `tabveterinario`
--
ALTER TABLE `tabveterinario`
  ADD PRIMARY KEY (`vetCNPJ`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tabagendamento`
--
ALTER TABLE `tabagendamento`
  MODIFY `codAgendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tabfuncionarios`
--
ALTER TABLE `tabfuncionarios`
  MODIFY `funcID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tabpets`
--
ALTER TABLE `tabpets`
  MODIFY `petId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tabagendamento`
--
ALTER TABLE `tabagendamento`
  ADD CONSTRAINT `tabagendamento_ibfk_1` FOREIGN KEY (`numPet`) REFERENCES `tabpets` (`petId`),
  ADD CONSTRAINT `tabagendamento_ibfk_2` FOREIGN KEY (`tutorCPF`) REFERENCES `tabtutor` (`tutorCPF`);

--
-- Restrições para tabelas `tabpets`
--
ALTER TABLE `tabpets`
  ADD CONSTRAINT `tabpets_ibfk_1` FOREIGN KEY (`tutorId`) REFERENCES `tabtutor` (`tutorCPF`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
