-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Cze 2023, 15:49
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `registration_oop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `registration_date`) VALUES
(3, 'John', '$2y$10$ynH9.beOA2314jSfp49NhOH0SqUiZIzuvz8AgQR/j/RIvE88mlHOe', 'john@wp.pl', '2023-05-04 20:03:50'),
(4, 'Marcus', '$2y$10$qjqU.UVS94TonoOa.35ieewTn65HTcXm4.XdLUskQvp19F78tE9jW', 'marcus@gmail.com', '2023-05-05 11:56:50'),
(5, 'Jacob', '$2y$10$z//edJOeGBH4.siEOv2uGeR7cpGqmIgZdT.D7f6ej9wakuOFWyzPa', 'jacob@wp.pl', '2023-05-05 12:52:19'),
(6, 'Alistar', '$2y$10$CTIroY9iAQ/pLJEvbZyVT.FPNO5rtvgjNQ0bfJD7S7IsfjarOyqMi', 'alistar@gmail.com', '2023-05-17 18:15:50'),
(7, 'Christopher', '$2y$10$dlNZYMinVad4homK0CjJIOjQrDSBAAhNIFOXrDOvCkav7WpLh2WFq', 'christopher@o2.com', '2023-05-18 13:37:33'),
(8, 'June', '$2y$10$JvZb3mKJFOJqu3vLWkzIVutapabXTXt3IwtfX1MlXsMT9qWgAPhTq', 'june@gmail.com', '2023-05-22 16:24:17'),
(11, 'Martin', '$2y$10$27xdKftTt4sLmF.UskAjnuJeLRs4yCOW0pk4ZW44/k4ZgBsdU8JJ.', 'martin@gmail.com', '2023-05-23 18:04:29'),
(12, 'Leon', '$2y$10$D3NbhIS4BEsuyX8iYTFIyug.49TZzPVUH8qVWNhNG7M6Vs1BetEyy', 'leon@gmail.com', '2023-05-23 18:07:13'),
(13, 'April', '$2y$10$w2zRWQhMEPAtpsYzK35vFOGLWX3yMbtuzS04c8ZuH2qQ0j2NilmrC', 'april@gmail.com', '2023-05-25 15:57:19');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
