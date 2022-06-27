-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jun-2022 às 21:57
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `coffee-sun`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `value` decimal(5,2) NOT NULL,
  `amount` int(255) NOT NULL,
  `event` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `color` varchar(7) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `product`
--

INSERT INTO `product` (`id`, `name`, `discription`, `value`, `amount`, `event`, `type`, `color`, `image`) VALUES
(1, 'Café Excelsior Tradicional', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '12.00', 30, 'nenhum', 'moido', '#1c2759', 'https://loja.cafexcelsior.com.br/storage/products/cafe-excelsior-extraforte-500g-xCfkJtehvuz2WDR9jwPx.png'),
(5, 'Prensa Francessa Preta', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '30.50', 20, 'nenhum', 'acessorio', '#37363b', 'https://res.cloudinary.com/riqra/image/upload/w_906,h_906,c_limit,q_auto,f_auto/v1630101787/sellers/villa-alta/1607631425421.png'),
(6, 'Capsulas Expresso Café Brasil', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '9.00', 65, 'nenhum', 'capsula', '#341616', 'https://admintresc.vteximg.com.br/arquivos/ids/528071/Cartucho---Capsula-Espresso-Cafe-Brasileiro.png?v=637496945248830000'),
(7, 'Capsulas Tres', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '12.00', 15, 'nenhum', 'capsula', '#ba7245', 'https://admintresc.vteximg.com.br/arquivos/ids/538749/00746_MERCAFE___Imagem_Cafe_com_Leite_2.png?v=637744216982630000'),
(10, 'Café Excelsior Tradicional', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '12.00', 50, 'nenhum', 'moido', '#ffd6d6', 'https://loja.cafexcelsior.com.br/storage/products/cafe-excelsior-tradicional-500g-fgbqSBMCEh4AziYF15Ia.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sessions`
--

INSERT INTO `sessions` (`id`, `id_user`, `token`, `description`, `create_at`) VALUES
(1, 4, 'c96ffa6fc1d579f98d877240027b794c', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-25 12:27:44'),
(2, 2, '187b8c51e5631269968c7b1dc6362657', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-25 12:29:26'),
(3, 2, '136d39272b8eb78c2379b3e1c3c40aae', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-25 12:37:25'),
(4, 2, 'c320da3369e77be69713fc253245ad7a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-25 12:41:28'),
(5, 3, '3c2b1cee0caf33cfc078309908a26b54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-25 12:41:52'),
(6, 2, '251023d5cbc400ffd02e0dc4de1550f5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-25 12:42:16'),
(7, 2, '6d85111706c710caf7be93caa0cadadf', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-25 16:50:27'),
(8, 2, '366f872a51701549fbb59a2dfcec2c1a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-26 15:09:54'),
(9, 6, 'f81e3c6030b9d9d8b7ee96cbeb01b95d', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-26 15:32:58'),
(10, 2, 'ad77dd9fe812771c45ef4135b05fbeab', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-26 19:54:23'),
(11, 6, '08cada42d1732b6eb6ece1c30ebf141a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-26 19:54:44'),
(13, 2, 'db32845a813409013e62d11762dde417', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-27 07:09:59'),
(28, 2, '6d66a573c2107b30b708aa154d288a63', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-27 16:38:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `roles` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `roles`) VALUES
(1, 'Antonio', 'Antonio@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'client'),
(2, 'Felipe', 'felipe@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin'),
(3, 'Valter', 'Valter@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'client'),
(4, 'Lipe', 'Lipe@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'client'),
(5, 'Lipão', 'Lipao@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'client'),
(6, 'Luis', 'Luis@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'client'),
(7, 'nicolas', 'nicolas@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'client');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
