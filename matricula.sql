-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Mar-2019 às 17:21
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matricula`
--
CREATE DATABASE IF NOT EXISTS `matricula` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `matricula`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `turma_id` int(10) UNSIGNED NOT NULL,
  `cpf` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `turma_id`, `cpf`, `data`, `email`, `telefone`, `created_at`, `updated_at`) VALUES
(1, 'Aluno 1', 1, '0000000000', '2019-03-19', 'user@hotmail.com', '9833364488', '2019-03-13 20:13:51', '2019-03-13 20:13:51');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2019_03_12_145357_create_turmas_table', 1),
(6, '2019_03_12_145525_create_alunos_table', 1),
(7, '2019_03_12_145757_create_professors_table', 1),
(8, '2019_03_13_090608_create_professor_turma_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professors`
--

CREATE TABLE `professors` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificados` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_hora` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `professors`
--

INSERT INTO `professors` (`id`, `nome`, `certificados`, `email`, `valor_hora`, `created_at`, `updated_at`) VALUES
(1, 'Professor 1', 'mmmmmmm', 'user@user.com', 900.00, '2019-03-13 19:47:31', '2019-03-13 19:47:31'),
(4, 'Professor 2', 'nnnnnnnn', 'user@hotmail.com', 700.00, '2019-03-13 20:12:14', '2019-03-13 20:12:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_turma`
--

CREATE TABLE `professor_turma` (
  `id` int(10) UNSIGNED NOT NULL,
  `professor_id` int(10) UNSIGNED NOT NULL,
  `turma_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `professor_turma`
--

INSERT INTO `professor_turma` (`id`, `professor_id`, `turma_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(8, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periodo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ch` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `nome`, `periodo`, `ch`, `created_at`, `updated_at`) VALUES
(1, 'Turma 1', '2019.1', '30', '2019-03-13 19:46:21', '2019-03-13 19:46:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alunos_cpf_unique` (`cpf`),
  ADD KEY `alunos_turma_id_foreign` (`turma_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor_turma`
--
ALTER TABLE `professor_turma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor_turma_professor_id_foreign` (`professor_id`),
  ADD KEY `professor_turma_turma_id_foreign` (`turma_id`);

--
-- Indexes for table `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `professor_turma`
--
ALTER TABLE `professor_turma`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `alunos_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `professor_turma`
--
ALTER TABLE `professor_turma`
  ADD CONSTRAINT `professor_turma_professor_id_foreign` FOREIGN KEY (`professor_id`) REFERENCES `professors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `professor_turma_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
