-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: dec. 08, 2022 la 03:31 PM
-- Versiune server: 10.4.25-MariaDB
-- Versiune PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `proiect`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(3, 'Pizza'),
(4, 'Burgeri'),
(5, 'Sosuri');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comanda`
--

CREATE TABLE `comanda` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `comanda`
--

INSERT INTO `comanda` (`id`, `member_id`, `data`, `status`, `total`) VALUES
(34, 3, '2022-12-04 10:10:50', 'In procesare', 35),
(35, 3, '2022-12-04 12:18:59', 'In procesare', 35),
(36, 3, '2022-12-04 17:06:59', 'In procesare', 35),
(37, 3, '2022-12-05 13:16:33', 'In procesare', 35),
(38, 3, '2022-12-05 16:05:16', 'In procesare', 35),
(39, 3, '2022-12-05 16:08:38', 'In procesare', 35);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `prod_comanda`
--

CREATE TABLE `prod_comanda` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `prod_comanda`
--

INSERT INTO `prod_comanda` (`id`, `order_id`, `product_id`, `product_quantity`, `member_id`) VALUES
(16, 34, 7, 1, 3),
(17, 35, 6, 1, 3),
(18, 36, 9, 1, 3),
(19, 37, 6, 1, 3),
(20, 38, 6, 1, 3),
(21, 39, 12, 1, 3);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `product_id`, `quantity`, `member_id`) VALUES
(8, 5, 1, 5),
(43, 6, 1, 5);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL,
  `descriere` varchar(50) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `code`, `image`, `price`, `descriere`, `cat_id`) VALUES
(5, 'pizza1', 'p1', 'Imagini/pizza1.jpg', 35, 'desc', 3),
(6, 'pizza2', 'p2', 'Imagini/pizza2.jpg', 35, 'desc', 3),
(7, 'pizza3', 'p3', 'Imagini/pizza3.jpg', 35, 'desc', 3),
(8, 'pizza4', 'p4', 'Imagini/pizza4.jpg', 35, 'desc', 3),
(9, 'pizza5', 'p5', 'Imagini/pizza5.jpg', 35, 'desc', 3),
(10, 'burger1', 'b1', 'Imagini/burger1.jpg', 35, 'desc', 4),
(11, 'burger2', 'b2', 'Imagini/burger2.jpg', 35, 'desc', 4),
(12, 'burger3', 'b3', 'Imagini/burger3.jpg', 35, 'desc', 4),
(13, 'sos1', 's1', 'Imagini/sos1.jpg', 5, 'desc', 5),
(14, 'sos2', 's2', 'Imagini/sos2.jpg', 5, 'desc', 5);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(2, 'Alex', '$2y$10$gdCNtMBD5rsQhUEkjmcj9uUEMC2vTDH/jILISgQaj6TCoKy8FS7uu', 'moldoveanu.alex23@gmail.com'),
(3, 'Alex1', '$2y$10$QywsyWi99CiAB4nuf3gIkO529YD6.AcAHIjIBu3zjAbdzu7BALtCi', 'moldoveanu.alex23@gmail.com'),
(4, 'admin', '$2y$10$ICuasOZgbDhyXRClpsgaB.1RubEEQA/1R.jJWbuRKlRiVq.10b08K', 'moldoveanu.alex23@gmail.com'),
(5, 'Alex3', '$2y$10$VG6Wnvy52Ay/bxPikLrhtesE72BXZRasEiqMX6Ar0PRJCdMEYh1zm', 'moldoveanu.alex23@gmail.com');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `prod_comanda`
--
ALTER TABLE `prod_comanda`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `comanda`
--
ALTER TABLE `comanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pentru tabele `prod_comanda`
--
ALTER TABLE `prod_comanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pentru tabele `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pentru tabele `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
