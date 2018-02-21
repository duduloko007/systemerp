-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Fev-2018 às 18:38
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_erp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bills_to_pay`
--

CREATE TABLE `bills_to_pay` (
  `id_company` int(11) NOT NULL,
  `document` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date_document` datetime NOT NULL,
  `date_maturity` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `obs` text NOT NULL,
  `price` float NOT NULL,
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bills_to_pay`
--

INSERT INTO `bills_to_pay` (`id_company`, `document`, `description`, `date_document`, `date_maturity`, `status`, `obs`, `price`, `id`) VALUES
(1, '01', 'r', '2018-01-01 00:00:00', '2018-01-26 00:00:00', 1, 'teste', 1.01, 1),
(1, 'teste', 'teste', '2018-01-02 00:00:00', '2018-02-01 00:00:00', 1, 'teste', 10, 2),
(1, 'rrere', 'teste3 3353', '2018-01-01 00:00:00', '2018-01-26 00:00:00', 1, 'teste', 100, 3),
(1, '1201', 'Teste Para dia 19/01/2018', '2018-01-18 00:00:00', '2018-01-26 00:00:00', 1, '120', 120, 5),
(1, 'tet', 'tte', '2018-01-01 00:00:00', '2018-01-26 00:00:00', 1, '', 22, 6),
(1, 'teste1', 'teste1', '2018-01-02 00:00:00', '2018-01-26 00:00:00', 1, 'teste', 1500, 7),
(1, 'tetste', 'teste', '2018-01-02 00:00:00', '2018-01-27 00:00:00', 1, '4', 23, 8),
(1, 're', 'rere', '2018-01-19 00:00:00', '2018-02-07 00:00:00', 1, 'te', 131, 9),
(1, 'tetete', 'tete', '2018-01-30 00:00:00', '2018-01-31 00:00:00', 1, 'et', 42, 10),
(1, '424', '242', '2018-01-24 00:00:00', '2018-01-30 00:00:00', 1, '3', 44, 11),
(1, '4343', '4343', '2018-01-26 00:00:00', '2018-01-25 00:00:00', 1, '4242', 424, 12),
(1, '3', '5', '2018-01-02 00:00:00', '2018-01-31 00:00:00', 1, '', 3, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bills_to_receive`
--

CREATE TABLE `bills_to_receive` (
  `id` int(11) NOT NULL,
  `id_sale` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `date_sale` datetime NOT NULL,
  `date_maturity` datetime NOT NULL,
  `id_client` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bills_to_receive`
--

INSERT INTO `bills_to_receive` (`id`, `id_sale`, `id_company`, `total_price`, `date_sale`, `date_maturity`, `id_client`, `status`) VALUES
(1, 71, 1, 2, '2018-01-23 13:14:11', '2018-01-23 13:14:11', 1, 0),
(2, 72, 1, 2, '2018-01-23 13:14:26', '2018-01-23 13:14:26', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `caixa`
--

CREATE TABLE `caixa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `troco_inicial` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `address_neighb` varchar(100) DEFAULT NULL,
  `address_zipcode` varchar(100) DEFAULT NULL,
  `address_number` varchar(10) DEFAULT NULL,
  `address2` varchar(100) NOT NULL,
  `address_city` varchar(100) NOT NULL,
  `address_state` varchar(100) NOT NULL,
  `address_country` varchar(100) NOT NULL,
  `stars` int(11) NOT NULL,
  `internal_obs` text NOT NULL,
  `id_company` int(11) NOT NULL,
  `cpf_cnpj` varchar(20) DEFAULT NULL,
  `inscri_estadual` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `address`, `address_neighb`, `address_zipcode`, `address_number`, `address2`, `address_city`, `address_state`, `address_country`, `stars`, `internal_obs`, `id_company`, `cpf_cnpj`, `inscri_estadual`) VALUES
(1, 'Eduardo', 'eduardo@eduardo.com', '(83) 98424-1389', 'Rua Anita Malfatti', 'Campo Grande', '23088-390', '9000', 'Ap. 201', 'Rio de Janeiro', 'RJ', 'Brasil', 3, 'Cliente editado2', 1, '123', '13'),
(2, 'teste1', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 3, '', 1, '', ''),
(3, 'teste2', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 3, '', 1, '', ''),
(4, 'teste3', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 3, '', 1, '', ''),
(5, 'tese 4', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 3, '', 1, '', ''),
(6, 'teste 5', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 3, '', 1, '', ''),
(7, 'teste 6', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 3, '', 1, '', ''),
(8, 'tste 7', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 3, '', 1, '', ''),
(9, 'teste 8', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 3, '', 1, '', ''),
(10, 'tste 9', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 3, '', 1, '', ''),
(11, 'teste 10', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 3, '', 1, '', ''),
(12, 'teste 10', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 3, '', 1, '', ''),
(13, 'teste 11', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 3, '', 1, '', ''),
(14, 'Cliente de teste', 'teste@teste.com', '38776000', 'Rua Anita Garibaldi', 'Copacabana', '22041-080', '809', 'Casa', 'Rio de Janeiro', 'RJ', 'Brasil', 3, 'Esse cliente Ã© novo', 1, '', ''),
(15, '1', '4@4.com', '(55) 55555-5555', '8', '11', '7', '9', '10', '12', '13', '14', 3, '15', 1, '2', '3'),
(16, 'Eduardo ME', 'eduardome@gmail.com', '(12) 32255-5555', '1', '12', '38998989', '12', '12', '21', '12', '12', 3, '12', 1, '35611515', '15151');

-- --------------------------------------------------------

--
-- Estrutura da tabela `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `companies`
--

INSERT INTO `companies` (`id`, `name`) VALUES
(1, 'Casa do Construtor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inventory`
--

CREATE TABLE `inventory` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `quant` int(11) NOT NULL,
  `min_quant` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `cod_bars` varchar(50) NOT NULL,
  `status_sales` varchar(20) NOT NULL,
  `price_cust` float NOT NULL,
  `price_percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `price`, `quant`, `min_quant`, `id_company`, `cod_bars`, `status_sales`, `price_cust`, `price_percentage`) VALUES
(1, 'FeijÃ£o', 75, 53, 6, 1, '78910110011', 'normal', 50, 50),
(2, 'Arroz', 11.5, 0, 5, 1, '78910110012', 'normal', 10, 15),
(3, 'Caixa de Som 2000w', 150, 12, 5, 1, '78910110013', 'normal', 150, 0),
(4, 'teste', 2, 8, 10, 1, '78910110014', 'normal', 0, 0),
(5, 'e', 1, 1, 1, 1, '78910110015', '', 0, 0),
(6, 'caderno', 12, 10, 5, 1, '7898108', '', 0, 0),
(7, 'caderno doido', 13, 10, 5, 1, '7899199', '', 0, 0),
(8, 'caderno doidÃ£o', 14, 12, 6, 1, '1000777', '', 0, 0),
(9, 'caderno mais doido ainda', 15, 12, 6, 1, '20003000', '', 0, 0),
(10, 'caderno muito doido', 20, 6, 3, 1, '40005000', '', 0, 0),
(11, 'teste', 100, 10, 5, 1, '7888', '', 0, 0),
(12, 'Kit Churrasco 1x6', 70, 0, 10, 1, '7881818', 'normal', 50, 40),
(13, 'Produto de teste', 70, 0, 10, 1, '78990', 'normal', 50, 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `invetory_history`
--

CREATE TABLE `invetory_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `action` varchar(3) NOT NULL,
  `date_action` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `params` varchar(200) NOT NULL,
  `id_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `name`, `params`, `id_company`) VALUES
(1, 'Admin', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24', 1),
(2, 'Desenvolvedor', '1,2,3,4,5,6,7,8,9,10,11', 1),
(3, 'caixa', '3,4,5,6,7,8,9,10,17,18,19', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission_params`
--

CREATE TABLE `permission_params` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permission_params`
--

INSERT INTO `permission_params` (`id`, `name`, `id_company`) VALUES
(1, 'permissions_view', 1),
(2, 'users_view', 1),
(3, 'clients_view', 1),
(4, 'clients_edit', 1),
(5, 'inventory_add', 1),
(6, 'inventory_view', 1),
(7, 'inventory_edit', 1),
(8, 'sales_view', 1),
(9, 'sales_edit', 1),
(10, 'report_view', 1),
(11, 'purchases_view', 1),
(12, 'pay_view', 1),
(13, 'pay_add', 1),
(14, 'pay_edit', 1),
(15, 'receive_view', 1),
(16, 'receive_edit', 1),
(17, 'supplier_view', 1),
(18, 'supplier_add', 1),
(19, 'supplier_edit', 1),
(20, 'purchases_view', 1),
(21, 'purchases_edit', 1),
(22, 'purchases_add', 1),
(23, 'sales_add', 1),
(24, 'clients_add', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchases`
--

CREATE TABLE `purchases` (
  `id_client` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `date_sale` datetime NOT NULL,
  `total_price` float NOT NULL,
  `status` int(11) NOT NULL,
  `form_pay` int(11) NOT NULL,
  `discount` float NOT NULL,
  `obs` text NOT NULL,
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `purchases`
--

INSERT INTO `purchases` (`id_client`, `id_user`, `id_company`, `date_sale`, `total_price`, `status`, `form_pay`, `discount`, `obs`, `id`) VALUES
(1, 1, 1, '2018-02-20 00:00:00', 100, 0, 0, 0, '1', 1),
(1, 1, 1, '2018-02-20 00:00:00', 100, 0, 0, 0, '0', 2),
(1, 1, 1, '2018-02-20 00:00:00', 100, 0, 0, 0, '', 3),
(1, 1, 1, '2018-02-20 00:00:00', 100, 0, 0, 0, '', 4),
(1, 1, 1, '2018-02-20 00:00:00', 100, 0, 0, 0, '222', 5),
(1, 1, 1, '2018-02-20 00:00:00', 100, 0, 0, 0, '', 6),
(1, 1, 1, '2018-02-20 00:00:00', 100, 0, 0, 0, '', 7),
(1, 1, 1, '2018-02-20 00:00:00', 0, 0, 0, 0, '', 8),
(1, 1, 1, '2018-02-20 00:00:00', 150, 0, 0, 0, '', 9),
(1, 1, 1, '2018-02-20 00:00:00', 150, 0, 0, 0, '', 10),
(1, 1, 1, '2018-02-20 00:00:00', 300, 0, 0, 0, '', 11),
(1, 1, 1, '0000-00-00 00:00:00', 50, 0, 0, 0, '', 12),
(1, 1, 1, '0000-00-00 00:00:00', 100, 0, 0, 0, '', 13),
(1, 1, 1, '2018-02-21 00:00:00', 500, 0, 0, 0, '', 14),
(1, 1, 1, '0000-00-00 00:00:00', 50, 0, 0, 0, '', 15),
(1, 1, 1, '0000-00-00 00:00:00', 750, 0, 0, 0, '', 16),
(1, 1, 1, '0000-00-00 00:00:00', 450, 0, 0, 0, '', 17),
(1, 1, 1, '2018-02-19 00:00:00', 200, 0, 0, 0, '', 18),
(1, 1, 1, '2018-02-21 00:00:00', 100, 0, 0, 0, '', 19),
(1, 1, 1, '2018-01-23 00:00:00', 750, 0, 0, 0, '', 20),
(1, 1, 1, '2018-02-21 00:00:00', 50, 0, 0, 0, '', 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchases_products`
--

CREATE TABLE `purchases_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sale` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quant` int(11) NOT NULL,
  `sale_price` float NOT NULL,
  `id_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `purchases_products`
--

INSERT INTO `purchases_products` (`id`, `id_sale`, `id_product`, `quant`, `sale_price`, `id_company`) VALUES
(0, 0, 1, 1, 50, 1),
(0, 0, 1, 1, 50, 1),
(0, 0, 1, 1, 50, 1),
(0, 0, 1, 2, 50, 1),
(0, 9, 3, 1, 150, 1),
(0, 10, 3, 1, 150, 1),
(0, 11, 3, 2, 150, 1),
(0, 12, 1, 1, 50, 1),
(0, 13, 1, 2, 50, 1),
(0, 14, 1, 10, 50, 1),
(0, 15, 1, 1, 50, 1),
(0, 15, 4, 1, 0, 1),
(0, 16, 1, 15, 50, 1),
(0, 17, 3, 3, 150, 1),
(0, 18, 1, 4, 50, 1),
(0, 19, 1, 2, 50, 1),
(0, 20, 3, 5, 150, 1),
(0, 21, 1, 1, 50, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `record`
--

CREATE TABLE `record` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_record` datetime NOT NULL,
  `record_maturity` datetime NOT NULL,
  `id_company` int(11) NOT NULL,
  `record_status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `date_sale` datetime NOT NULL,
  `total_price` float NOT NULL,
  `status` int(11) NOT NULL,
  `form_pay` int(11) NOT NULL,
  `discount` float NOT NULL,
  `obs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sales`
--

INSERT INTO `sales` (`id`, `id_client`, `id_user`, `id_company`, `date_sale`, `total_price`, `status`, `form_pay`, `discount`, `obs`) VALUES
(1, 1, 1, 1, '2018-02-14 14:39:48', 3, 0, 1, 1, ''),
(2, 1, 1, 1, '2018-02-14 14:41:48', 10, 1, 1, 0, ''),
(3, 1, 1, 1, '2018-02-15 14:24:53', 1512, 0, 2, 0, 'teste'),
(4, 1, 1, 1, '2018-02-15 16:00:42', 9, 0, 1, 1, 'teste'),
(5, 1, 1, 1, '2018-02-15 16:30:48', 9, 0, 1, 1, ''),
(6, 1, 1, 1, '2018-02-15 16:32:05', 1500, 0, 1, 0, ''),
(7, 1, 1, 1, '2018-02-15 16:39:11', 1499, 0, 5, 1, ''),
(8, 1, 1, 1, '2018-02-15 16:44:36', 1500, 0, 1, 0, ''),
(9, 1, 1, 1, '2018-02-19 14:57:33', 1500, 0, 1, 0, ''),
(10, 1, 1, 1, '2018-02-19 14:58:56', 10, 0, 1, 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sales_products`
--

CREATE TABLE `sales_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sale` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quant` int(11) NOT NULL,
  `sale_price` float NOT NULL,
  `id_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sales_products`
--

INSERT INTO `sales_products` (`id`, `id_sale`, `id_product`, `quant`, `sale_price`, `id_company`) VALUES
(1, 1, 1, 2, 2, 1),
(2, 2, 2, 1, 10, 1),
(3, 3, 2, 1, 10, 1),
(4, 3, 3, 1, 1500, 1),
(5, 3, 4, 1, 2, 1),
(6, 4, 2, 1, 10, 1),
(7, 5, 2, 1, 10, 1),
(8, 6, 3, 1, 1500, 1),
(9, 7, 3, 1, 1500, 1),
(10, 8, 3, 1, 1500, 1),
(11, 9, 3, 1, 1500, 1),
(12, 10, 2, 1, 10, 1),
(13, 0, 1, 5, 75, 1),
(14, 0, 3, 5, 1500, 1),
(15, 0, 1, 1, 75, 1),
(16, 0, 1, 1, 50, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `supplier`
--

CREATE TABLE `supplier` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `address_neighb` varchar(100) DEFAULT NULL,
  `address_zipcode` varchar(100) DEFAULT NULL,
  `address_number` varchar(10) DEFAULT NULL,
  `address2` varchar(100) NOT NULL,
  `address_city` varchar(100) NOT NULL,
  `address_state` varchar(100) NOT NULL,
  `address_country` varchar(100) NOT NULL,
  `stars` int(11) NOT NULL,
  `internal_obs` text NOT NULL,
  `id_company` int(11) NOT NULL,
  `cpf_cnpj` varchar(20) NOT NULL,
  `inscri_estadual` varchar(30) NOT NULL,
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `supplier`
--

INSERT INTO `supplier` (`name`, `email`, `phone`, `address`, `address_neighb`, `address_zipcode`, `address_number`, `address2`, `address_city`, `address_state`, `address_country`, `stars`, `internal_obs`, `id_company`, `cpf_cnpj`, `inscri_estadual`, `id`) VALUES
('dilson', 'lanadilson@yahoo.com.br', '(34) 23423-4324', 'wefewf', 'vwv', '234324', '34234', 'fewf', 'wefw', 'fewfew', 'ewfwe', 3, '', 1, '', '', 1),
('teste', 'eduardo_2012_@hotmail.com', '(35) 99888-8888', 'teste', '12', '3897878878', '12', '12', '12', '12', '12', 3, '12', 1, '123', '123', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `id_group`, `id_company`, `user`, `status`) VALUES
(1, 'eduardo_2012_@hotmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, '', 0),
(2, 'dilson@dilson.com', '202cb962ac59075b964b07152d234b70', 1, 1, '', 0),
(3, 'caixa@caixa.com.br', '202cb962ac59075b964b07152d234b70', 3, 1, '', 0),
(4, 'eduardo_2012_@hotmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 'duduloko007', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills_to_pay`
--
ALTER TABLE `bills_to_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills_to_receive`
--
ALTER TABLE `bills_to_receive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caixa`
--
ALTER TABLE `caixa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invetory_history`
--
ALTER TABLE `invetory_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_params`
--
ALTER TABLE `permission_params`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_products`
--
ALTER TABLE `sales_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills_to_pay`
--
ALTER TABLE `bills_to_pay`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bills_to_receive`
--
ALTER TABLE `bills_to_receive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `caixa`
--
ALTER TABLE `caixa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `invetory_history`
--
ALTER TABLE `invetory_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permission_params`
--
ALTER TABLE `permission_params`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales_products`
--
ALTER TABLE `sales_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
