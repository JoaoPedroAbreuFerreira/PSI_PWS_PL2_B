CREATE database if NOT EXISTS projeto_php;
USE projeto_php;

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(10) UNSIGNED NOT NULL,
  `designacaoSocial` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` int(9) NOT NULL,
  `nif` int(9) UNSIGNED NOT NULL,
  `morada` varchar(45) NOT NULL,
  `codigoPostal` varchar(45) NOT NULL,
  `localidade` varchar(45) NOT NULL,
  `capitalSocial` decimal(10,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatura`
--

CREATE TABLE `fatura` (
  `id` int(10) UNSIGNED NOT NULL,
  `Utilizador_id` int(10) UNSIGNED NOT NULL,
  `Cliente_id` int(10) UNSIGNED NOT NULL,
  `dataFatura` datetime NOT NULL DEFAULT current_timestamp(),
  `valorTotal` decimal(10,2) UNSIGNED NOT NULL,
  `ivaTotal` decimal(10,2) UNSIGNED NOT NULL,
  `estado` enum('Emitida','Em Lancamento') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `iva`
--

CREATE TABLE `iva` (
  `id` int(10) UNSIGNED NOT NULL,
  `percentagem` varchar(45) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `vigor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhafatura`
--

CREATE TABLE `linhafatura` (
  `id` int(10) UNSIGNED NOT NULL,
  `Fatura_id` int(10) UNSIGNED NOT NULL,
  `Produto_id` int(10) UNSIGNED NOT NULL,
  `quantidade` int(10) UNSIGNED NOT NULL,
  `valor` decimal(10,2) UNSIGNED NOT NULL,
  `valorIva` decimal(10,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(10) UNSIGNED NOT NULL,
  `Iva_id` int(10) UNSIGNED NOT NULL,
  `referencia` varchar(45) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `preco` decimal(10,2) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(45) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` int(10) UNSIGNED NOT NULL,
  `nif` int(10) NOT NULL,
  `morada` varchar(45) NOT NULL,
  `codigoPostal` varchar(45) NOT NULL,
  `role` enum('funcionario','cliente','administrador') NOT NULL,
  `localidade` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fatura`
--
ALTER TABLE `fatura`
  ADD PRIMARY KEY (`id`,`Utilizador_id`,`Cliente_id`),
  ADD KEY `Fatura_FKIndex1` (`Utilizador_id`),
  ADD KEY `Fatura_FKIndex2` (`Cliente_id`);

--
-- Índices para tabela `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `linhafatura`
--
ALTER TABLE `linhafatura`
  ADD PRIMARY KEY (`id`,`Fatura_id`,`Produto_id`),
  ADD KEY `LinhaFatura_FKIndex1` (`Fatura_id`),
  ADD KEY `LinhaFatura_FKIndex2` (`Produto_id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`,`Iva_id`),
  ADD UNIQUE KEY `referencia_UNIQUE` (`referencia`),
  ADD KEY `Produto_FKIndex1` (`Iva_id`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `nif_UNIQUE` (`nif`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fatura`
--
ALTER TABLE `fatura`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `iva`
--
ALTER TABLE `iva`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `linhafatura`
--
ALTER TABLE `linhafatura`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Limitadores para a tabela `fatura`
--
ALTER TABLE `fatura`
  ADD CONSTRAINT `fatura_ibfk_1` FOREIGN KEY (`Utilizador_id`) REFERENCES `utilizador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fatura_ibfk_2` FOREIGN KEY (`Cliente_id`) REFERENCES `utilizador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `linhafatura`
--
ALTER TABLE `linhafatura`
  ADD CONSTRAINT `linhafatura_ibfk_1` FOREIGN KEY (`Fatura_id`) REFERENCES `fatura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `linhafatura_ibfk_2` FOREIGN KEY (`Produto_id`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`Iva_id`) REFERENCES `iva` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;


-- DADOS TESTE 

-- ADMIN PASS = admin
INSERT INTO `utilizador` (`id`, `username`, `pass`, `email`, `telefone`, `nif`, `morada`, `codigoPostal`, `role`, `localidade`) VALUES
(1, 'admin', '8C6976E5B5410415BDE908BD4DEE15DFB167A9C873FC4BB8A81F6F2AB448A918', 'admin@gmail.com', '980123567', '213056483', 'Largo Jose lucio', '2400-823', 'administrador', 'Leiria');

-- Funcionarios PASS = funcionario
INSERT INTO `utilizador` (`id`, `username`, `pass`, `email`, `telefone`, `nif`, `morada`, `codigoPostal`, `role`, `localidade`) VALUES
(2, 'joao', '24D96A103E8552CB162117E5B94B1EAD596B9C0A94F73BC47F7D244D279CACF2', 'joao@gmail.com', '920450634', '213356342', 'Largo da Fonte', '3780-566', 'funcionario', 'Anadia');

INSERT INTO `utilizador` (`id`, `username`, `pass`, `email`, `telefone`, `nif`, `morada`, `codigoPostal`, `role`, `localidade`) VALUES
(3, 'rodrigo', '24D96A103E8552CB162117E5B94B1EAD596B9C0A94F73BC47F7D244D279CACF2', 'rodrigo@gmail.com', '945056456', '219986456', 'Rua do agueiro', '2480-057', 'funcionario', 'Leiria');

-- Clientes PASS = cliente
INSERT INTO `utilizador` (`id`, `username`, `pass`, `email`, `telefone`, `nif`, `morada`, `codigoPostal`, `role`, `localidade`) VALUES
(4, 'marco', 'A60B85D409A01D46023F90741E01B79543A3CB1BA048EAEFBE5D7A63638043BF', 'marco@gmail.com', '946023123', '21007693', 'Rua de cabo verde', '2430-399', 'cliente', 'Marinha Grande');

INSERT INTO `utilizador` (`id`, `username`, `pass`, `email`, `telefone`, `nif`, `morada`, `codigoPostal`, `role`, `localidade`) VALUES
(5, 'fernando', 'A60B85D409A01D46023F90741E01B79543A3CB1BA048EAEFBE5D7A63638043BF', 'fernando@gmail.com', '994324567', '219455434', 'Travessa Manuel Leal', '2400-711', 'cliente', 'Leiria');

INSERT INTO `utilizador` (`id`, `username`, `pass`, `email`, `telefone`, `nif`, `morada`, `codigoPostal`, `role`, `localidade`) VALUES
(6, 'eduardo', 'A60B85D409A01D46023F90741E01B79543A3CB1BA048EAEFBE5D7A63638043BF', 'eduardo@gmail.com', '912999666', '219678968', 'Avenida Columbano Bordalo Pinheiro', '1500-173', 'cliente', 'Lisboa');

-- Empresa 
INSERT INTO `empresa` (`id`, `designacaoSocial`, `email`, `telefone`, `nif`, `morada`, `codigoPostal`, `localidade`, `capitalSocial`) VALUES
(1, 'Amazon', 'amazon@gmail.com', '945873456', '211134231', 'Rua de Silva', '4250-472', 'Porto', 10000000);

-- Ivas 
INSERT INTO `iva` (`id`, `percentagem`, `descricao`, `vigor`) VALUES
(1, '23', 'Taxa Normal', 1);

INSERT INTO `iva` (`id`, `percentagem`, `descricao`, `vigor`) VALUES
(2, '13', 'Taxa Intermédia', 1);

INSERT INTO `iva` (`id`, `percentagem`, `descricao`, `vigor`) VALUES
(3, '6', 'Taxa Reduzida', 1);

INSERT INTO `iva` (`id`, `percentagem`, `descricao`, `vigor`) VALUES
(4, '50', 'Taxa Alta', 0);

-- Produtos
INSERT INTO `produto` (`id`, `Iva_id`, `referencia`, `descricao`, `preco`, `stock`) VALUES
(1, 1, '100-100000063WOF', 'Ryzen 7 5800x', 329.90, 3);

INSERT INTO `produto` (`id`, `Iva_id`, `referencia`, `descricao`, `preco`, `stock`) VALUES
(2, 2, '100-100000025BOX', 'Ryzen 7 3800x', 279.90, 2);

INSERT INTO `produto` (`id`, `Iva_id`, `referencia`, `descricao`, `preco`, `stock`) VALUES
(3, 3, '100-100000065BOX', 'Ryzen 5 5600x', 239.90, 5);

INSERT INTO `produto` (`id`, `Iva_id`, `referencia`, `descricao`, `preco`, `stock`) VALUES
(4, 3, 'BX8071512900K', 'Intel i9-12900K', 669.90, 1);

INSERT INTO `produto` (`id`, `Iva_id`, `referencia`, `descricao`, `preco`, `stock`) VALUES
(5, 2, 'BX8071512700KF', 'Intel i7-12700KF', 412.90, 10);

INSERT INTO `produto` (`id`, `Iva_id`, `referencia`, `descricao`, `preco`, `stock`) VALUES
(6, 1, 'BX8071512400F', 'Intel i5-12400F', 185.90, 4);

INSERT INTO `produto` (`id`, `Iva_id`, `referencia`, `descricao`, `preco`, `stock`) VALUES
(7, 3, 'ZT-A30800D-10PLHR', 'Zotac RTX 3080 10GB', 873.90, 2);

INSERT INTO `produto` (`id`, `Iva_id`, `referencia`, `descricao`, `preco`, `stock`) VALUES
(8, 2, '912-V397-431', 'MSI RTX 3050 8GB', 439.90, 6);

INSERT INTO `produto` (`id`, `Iva_id`, `referencia`, `descricao`, `preco`, `stock`) VALUES
(9, 1, '912-V502-039', 'MSI RX 6600 8GB', 419.90, 6);

INSERT INTO `produto` (`id`, `Iva_id`, `referencia`, `descricao`, `preco`, `stock`) VALUES
(10, 3, 'GV-R69XTGAMMING OC-16GD', 'Gigabyte RX 6900XT 16GB', 1749, 7);

INSERT INTO `produto` (`id`, `Iva_id`, `referencia`, `descricao`, `preco`, `stock`) VALUES
(11, 1, 'F4-3200C16D-16GTZR', 'G.Skill Trident Z 16GB DDR4', 84.90, 2);

INSERT INTO `produto` (`id`, `Iva_id`, `referencia`, `descricao`, `preco`, `stock`) VALUES
(12, 2, 'CMG32GX4M2E3200C16', 'Corsair Vengeance 32GB DDR4', 142.90, 4);

-- fatura
INSERT INTO `fatura` (`id`, `Utilizador_id`, `Cliente_id`, `dataFatura`, `valorTotal`, `ivaTotal`, `estado`) VALUES
(15, 3, 5, '2022-06-15 14:11:15', '4022.50', '353.90', 'Emitida'),
(16, 1, 4, '2022-06-15 14:12:10', '2153.03', '220.53', 'Emitida'),
(17, 2, 6, '2022-06-15 14:13:13', '1635.36', '224.86', 'Emitida'),
(18, 1, 4, '2022-06-15 14:14:14', '3252.77', '288.17', 'Emitida');

-- Linha fatura
INSERT INTO `linhafatura` (`id`, `Fatura_id`, `Produto_id`, `quantidade`, `valor`, `valorIva`) VALUES
(15, 15, 6, 1, '185.90', '42.76'),
(16, 15, 7, 1, '873.90', '52.43'),
(17, 15, 8, 1, '439.90', '57.19'),
(18, 15, 9, 1, '419.90', '96.58'),
(19, 15, 10, 1, '1749.00', '104.94'),
(22, 16, 1, 1, '329.90', '75.88'),
(23, 16, 2, 1, '279.90', '36.39'),
(24, 16, 3, 1, '239.90', '14.39'),
(25, 16, 4, 1, '669.90', '40.19'),
(26, 16, 5, 1, '412.90', '53.68'),
(34, 17, 1, 1, '329.90', '75.88'),
(38, 17, 5, 1, '412.90', '53.68'),
(41, 17, 8, 1, '439.90', '57.19'),
(44, 17, 11, 1, '84.90', '19.53'),
(45, 17, 12, 1, '142.90', '18.58'),
(48, 18, 3, 1, '239.90', '14.39'),
(50, 18, 5, 1, '412.90', '53.68'),
(54, 18, 9, 1, '419.90', '96.58'),
(55, 18, 10, 1, '1749.00', '104.94'),
(57, 18, 12, 1, '142.90', '18.58');