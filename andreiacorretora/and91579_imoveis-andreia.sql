-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 17/02/2024 às 09:37
-- Versão do servidor: 5.7.23-23
-- Versão do PHP: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `and91579_imoveis-andreia`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL,
  `moveis_id` int(11) NOT NULL,
  `path` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `imagens`
--

INSERT INTO `imagens` (`id`, `moveis_id`, `path`) VALUES
(7, 10, 'fotos/65c2ad4ebb73e.jpg'),
(8, 10, 'fotos/65c2ad4ebc0e1.jpg'),
(9, 10, 'fotos/65c2ad4ebcb0a.jpg'),
(10, 10, 'fotos/65c2ad4ebd4ed.jpg'),
(11, 10, 'fotos/65c2ad4ebde32.jpg'),
(12, 10, 'fotos/65c2ad4ebe6ae.jpg'),
(13, 10, 'fotos/65c2ad4ebeec8.jpg'),
(14, 11, 'fotos/65c2ad5413e44.jpg'),
(15, 11, 'fotos/65c2ad541471d.jpg'),
(16, 11, 'fotos/65c2ad5414f45.jpg'),
(17, 11, 'fotos/65c2ad5415610.jpg'),
(18, 11, 'fotos/65c2ad5415d19.jpg'),
(19, 11, 'fotos/65c2ad5416398.jpg'),
(20, 11, 'fotos/65c2ad5416dbb.jpg'),
(21, 12, 'fotos/65c2ad8a79241.jpg'),
(22, 12, 'fotos/65c2ad8a7a073.jpg'),
(23, 12, 'fotos/65c2ad8a7a8aa.jpg'),
(24, 12, 'fotos/65c2ad8a7b2a6.jpg'),
(25, 12, 'fotos/65c2ad8a7bd17.jpg'),
(26, 12, 'fotos/65c2ad8a7c7b3.jpg'),
(27, 13, 'fotos/65c2ad9a6c77c.jpg'),
(28, 13, 'fotos/65c2ad9a6d13f.jpg'),
(29, 13, 'fotos/65c2ad9a6da27.jpg'),
(30, 13, 'fotos/65c2ad9a6e414.jpg'),
(31, 13, 'fotos/65c2ad9a6ee19.jpg'),
(32, 13, 'fotos/65c2ad9a6f9c8.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `id` int(11) NOT NULL,
  `destaque` tinyint(4) NOT NULL DEFAULT '0',
  `alugar` tinyint(4) NOT NULL DEFAULT '0',
  `comprar` tinyint(4) NOT NULL DEFAULT '0',
  `terreno` tinyint(4) NOT NULL DEFAULT '0',
  `rua` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quartos` int(11) DEFAULT NULL,
  `suites` int(11) DEFAULT NULL,
  `banheiros` int(11) DEFAULT NULL,
  `garagens` int(11) DEFAULT NULL,
  `metrosQuadrado` int(11) DEFAULT NULL,
  `descricao` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `imoveis`
--

INSERT INTO `imoveis` (`id`, `destaque`, `alugar`, `comprar`, `terreno`, `rua`, `numero`, `cidade`, `bairro`, `quartos`, `suites`, `banheiros`, `garagens`, `metrosQuadrado`, `descricao`) VALUES
(10, 1, 1, 0, 0, 'Rua Piracicaba', '1760', 'Primavera do Leste', 'centro', 2, 1, 2, 3, 18000, '**Residência dos Sonhos à Venda: Casa Serenidade**\r\n\r\nBem-vindo à Casa Serenidade, um refúgio encantador que combina elegância, conforto e funcionalidade para criar o lar dos seus sonhos. Localizada em um bairro tranquilo e arborizado, esta residência oferece uma experiência única de vida, onde cada detalhe foi cuidadosamente planejado para proporcionar o máximo de conforto e comodidade.\r\n\r\nAo adentrar esta casa espetacular, você será recebido por um foyer espaçoso e luminoso, adornado por um lustre de cristal que reflete a luz natural que permeia todo o ambiente. O design de conceito aberto cria uma atmosfera convidativa, onde a sala de estar se conecta harmoniosamente com a área de jantar e a cozinha gourmet.\r\n\r\nA sala de estar é o ponto central da casa, com uma lareira de pedra natural que adiciona um toque de aconchego e sofisticação. Grandes janelas panorâmicas oferecem vistas deslumbrantes do jardim exuberante, inundando o espaço com luz natural e criando uma sensação de tranquilidade e bem-estar.\r\n\r\nA cozinha gourmet é um deleite para os amantes da culinária, equipada com aparelhos modernos de aço inoxidável, bancadas em granito e amplo espaço de armazenamento. Uma ilha central oferece espaço adicional para preparação de alimentos e serve como ponto de encontro para momentos memoráveis com família e amigos.\r\n\r\nA área de jantar adjacente é perfeita para entreter convidados ou desfrutar de refeições em família, com portas de vidro deslizantes que se abrem para um pátio coberto, ideal para churrascos ao ar livre e relaxamento ao ar livre.\r\n\r\nEsta casa possui três suítes espaçosas, cada uma com seu próprio banheiro luxuoso e closet. O quarto principal é um santuário particular, com uma lareira aconchegante, uma área de estar íntima e uma suíte spa com banheira de hidromassagem e chuveiro de chuva, proporcionando o cenário perfeito para relaxar e recarregar as energias.\r\n\r\nAlém disso, a Casa Serenidade oferece uma variedade de comodidades exclusivas, incluindo uma sala de cinema em casa, uma academia privativa e um escritório executivo, garantindo que todas as suas necessidades de estilo de vida sejam atendidas.\r\n\r\nO exterior desta propriedade impressionante é tão cativante quanto o interior, com um jardim meticulosamente paisagístico, uma piscina refrescante e uma área de estar ao ar livre, onde você pode desfrutar do clima ensolarado e das noites estreladas em total privacidade.\r\n\r\nNão perca a oportunidade de fazer desta casa magnífica o seu novo lar. Agende uma visita hoje mesmo e descubra o encanto e a beleza da Casa Serenidade.'),
(11, 1, 1, 0, 0, 'Rua Piracicaba', '1760', 'Primavera do Leste', 'centro', 2, 1, 2, 3, 18000, '**Residência dos Sonhos à Venda: Casa Serenidade**\r\n\r\nBem-vindo à Casa Serenidade, um refúgio encantador que combina elegância, conforto e funcionalidade para criar o lar dos seus sonhos. Localizada em um bairro tranquilo e arborizado, esta residência oferece uma experiência única de vida, onde cada detalhe foi cuidadosamente planejado para proporcionar o máximo de conforto e comodidade.\r\n\r\nAo adentrar esta casa espetacular, você será recebido por um foyer espaçoso e luminoso, adornado por um lustre de cristal que reflete a luz natural que permeia todo o ambiente. O design de conceito aberto cria uma atmosfera convidativa, onde a sala de estar se conecta harmoniosamente com a área de jantar e a cozinha gourmet.\r\n\r\nA sala de estar é o ponto central da casa, com uma lareira de pedra natural que adiciona um toque de aconchego e sofisticação. Grandes janelas panorâmicas oferecem vistas deslumbrantes do jardim exuberante, inundando o espaço com luz natural e criando uma sensação de tranquilidade e bem-estar.\r\n\r\nA cozinha gourmet é um deleite para os amantes da culinária, equipada com aparelhos modernos de aço inoxidável, bancadas em granito e amplo espaço de armazenamento. Uma ilha central oferece espaço adicional para preparação de alimentos e serve como ponto de encontro para momentos memoráveis com família e amigos.\r\n\r\nA área de jantar adjacente é perfeita para entreter convidados ou desfrutar de refeições em família, com portas de vidro deslizantes que se abrem para um pátio coberto, ideal para churrascos ao ar livre e relaxamento ao ar livre.\r\n\r\nEsta casa possui três suítes espaçosas, cada uma com seu próprio banheiro luxuoso e closet. O quarto principal é um santuário particular, com uma lareira aconchegante, uma área de estar íntima e uma suíte spa com banheira de hidromassagem e chuveiro de chuva, proporcionando o cenário perfeito para relaxar e recarregar as energias.\r\n\r\nAlém disso, a Casa Serenidade oferece uma variedade de comodidades exclusivas, incluindo uma sala de cinema em casa, uma academia privativa e um escritório executivo, garantindo que todas as suas necessidades de estilo de vida sejam atendidas.\r\n\r\nO exterior desta propriedade impressionante é tão cativante quanto o interior, com um jardim meticulosamente paisagístico, uma piscina refrescante e uma área de estar ao ar livre, onde você pode desfrutar do clima ensolarado e das noites estreladas em total privacidade.\r\n\r\nNão perca a oportunidade de fazer desta casa magnífica o seu novo lar. Agende uma visita hoje mesmo e descubra o encanto e a beleza da Casa Serenidade.'),
(12, 1, 0, 1, 0, 'José Francisco dos Santos', '200', 'Monte Alto', 'Residencial Barbizan', 3, 1, 2, 5, 19000, '**Residência dos Sonhos à Venda: Casa Serenidade**\r\n\r\nBem-vindo à Casa Serenidade, um refúgio encantador que combina elegância, conforto e funcionalidade para criar o lar dos seus sonhos. Localizada em um bairro tranquilo e arborizado, esta residência oferece uma experiência única de vida, onde cada detalhe foi cuidadosamente planejado para proporcionar o máximo de conforto e comodidade.\r\n\r\nAo adentrar esta casa espetacular, você será recebido por um foyer espaçoso e luminoso, adornado por um lustre de cristal que reflete a luz natural que permeia todo o ambiente. O design de conceito aberto cria uma atmosfera convidativa, onde a sala de estar se conecta harmoniosamente com a área de jantar e a cozinha gourmet.\r\n\r\nA sala de estar é o ponto central da casa, com uma lareira de pedra natural que adiciona um toque de aconchego e sofisticação. Grandes janelas panorâmicas oferecem vistas deslumbrantes do jardim exuberante, inundando o espaço com luz natural e criando uma sensação de tranquilidade e bem-estar.\r\n\r\nA cozinha gourmet é um deleite para os amantes da culinária, equipada com aparelhos modernos de aço inoxidável, bancadas em granito e amplo espaço de armazenamento. Uma ilha central oferece espaço adicional para preparação de alimentos e serve como ponto de encontro para momentos memoráveis com família e amigos.\r\n\r\nA área de jantar adjacente é perfeita para entreter convidados ou desfrutar de refeições em família, com portas de vidro deslizantes que se abrem para um pátio coberto, ideal para churrascos ao ar livre e relaxamento ao ar livre.\r\n\r\nEsta casa possui três suítes espaçosas, cada uma com seu próprio banheiro luxuoso e closet. O quarto principal é um santuário particular, com uma lareira aconchegante, uma área de estar íntima e uma suíte spa com banheira de hidromassagem e chuveiro de chuva, proporcionando o cenário perfeito para relaxar e recarregar as energias.\r\n\r\nAlém disso, a Casa Serenidade oferece uma variedade de comodidades exclusivas, incluindo uma sala de cinema em casa, uma academia privativa e um escritório executivo, garantindo que todas as suas necessidades de estilo de vida sejam atendidas.\r\n\r\nO exterior desta propriedade impressionante é tão cativante quanto o interior, com um jardim meticulosamente paisagístico, uma piscina refrescante e uma área de estar ao ar livre, onde você pode desfrutar do clima ensolarado e das noites estreladas em total privacidade.\r\n\r\nNão perca a oportunidade de fazer desta casa magnífica o seu novo lar. Agende uma visita hoje mesmo e descubra o encanto e a beleza da Casa Serenidade.'),
(13, 1, 0, 1, 0, 'José Francisco dos Santos', '200', 'Monte Alto', 'Residencial Barbizan', 3, 1, 2, 5, 19000, '**Residência dos Sonhos à Venda: Casa Serenidade**\r\n\r\nBem-vindo à Casa Serenidade, um refúgio encantador que combina elegância, conforto e funcionalidade para criar o lar dos seus sonhos. Localizada em um bairro tranquilo e arborizado, esta residência oferece uma experiência única de vida, onde cada detalhe foi cuidadosamente planejado para proporcionar o máximo de conforto e comodidade.\r\n\r\nAo adentrar esta casa espetacular, você será recebido por um foyer espaçoso e luminoso, adornado por um lustre de cristal que reflete a luz natural que permeia todo o ambiente. O design de conceito aberto cria uma atmosfera convidativa, onde a sala de estar se conecta harmoniosamente com a área de jantar e a cozinha gourmet.\r\n\r\nA sala de estar é o ponto central da casa, com uma lareira de pedra natural que adiciona um toque de aconchego e sofisticação. Grandes janelas panorâmicas oferecem vistas deslumbrantes do jardim exuberante, inundando o espaço com luz natural e criando uma sensação de tranquilidade e bem-estar.\r\n\r\nA cozinha gourmet é um deleite para os amantes da culinária, equipada com aparelhos modernos de aço inoxidável, bancadas em granito e amplo espaço de armazenamento. Uma ilha central oferece espaço adicional para preparação de alimentos e serve como ponto de encontro para momentos memoráveis com família e amigos.\r\n\r\nA área de jantar adjacente é perfeita para entreter convidados ou desfrutar de refeições em família, com portas de vidro deslizantes que se abrem para um pátio coberto, ideal para churrascos ao ar livre e relaxamento ao ar livre.\r\n\r\nEsta casa possui três suítes espaçosas, cada uma com seu próprio banheiro luxuoso e closet. O quarto principal é um santuário particular, com uma lareira aconchegante, uma área de estar íntima e uma suíte spa com banheira de hidromassagem e chuveiro de chuva, proporcionando o cenário perfeito para relaxar e recarregar as energias.\r\n\r\nAlém disso, a Casa Serenidade oferece uma variedade de comodidades exclusivas, incluindo uma sala de cinema em casa, uma academia privativa e um escritório executivo, garantindo que todas as suas necessidades de estilo de vida sejam atendidas.\r\n\r\nO exterior desta propriedade impressionante é tão cativante quanto o interior, com um jardim meticulosamente paisagístico, uma piscina refrescante e uma área de estar ao ar livre, onde você pode desfrutar do clima ensolarado e das noites estreladas em total privacidade.\r\n\r\nNão perca a oportunidade de fazer desta casa magnífica o seu novo lar. Agende uma visita hoje mesmo e descubra o encanto e a beleza da Casa Serenidade.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `senha`) VALUES
(1, 'admin', 992289878);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Imagem-Imoveis` (`moveis_id`);

--
-- Índices de tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `Imagem-Imoveis` FOREIGN KEY (`moveis_id`) REFERENCES `imoveis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
