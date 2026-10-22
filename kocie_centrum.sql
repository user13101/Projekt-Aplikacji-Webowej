-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 21, 2026 at 12:42 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kocie_centrum`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adoption_requests`
--

CREATE TABLE `adoption_requests` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `city` varchar(120) DEFAULT NULL,
  `cat_name` varchar(120) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(180) NOT NULL,
  `category` varchar(100) NOT NULL,
  `excerpt` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `category`, `excerpt`, `content`, `created_at`) VALUES
(1, 'Jak przygotować mieszkanie dla kota?', 'Dom', 'Najważniejsze strefy bezpieczeństwa, odpoczynku i zabawy dla nowego pupila.', 'Przygotuj drapak, kryjówki, miski i kuwetę ustawione w spokojnych miejscach. Zadbaj o zabezpieczenie okien i roślin, a także o spokojną adaptację zwierzaka.', '2026-05-01'),
(2, 'Najlepsze zabawy z kotem w domu', 'Zabawa', 'Pomysły na aktywności rozwijające instynkt łowiecki i więź z opiekunem.', 'Świetnie sprawdzają się wędki, maty węchowe, tunele oraz zabawki interaktywne. Krótkie, regularne sesje są lepsze niż pojedyncza długa zabawa.', '2026-04-24'),
(3, 'Czy karma mokra powinna dominować?', 'Żywienie', 'Krótki przewodnik po kociej diecie i nawodnieniu.', 'W wielu przypadkach karma mokra wspiera nawodnienie i jest dobrym elementem codziennej diety. Warto jednak dobierać żywienie indywidualnie do potrzeb kota.', '2026-04-10'),
(4, 'Jak oswoić kota z transporterem?', 'Pielęgnacja', 'Sposoby na ograniczenie stresu przed wizytą u weterynarza.', 'Transporter powinien być stałym elementem domu, nie tylko zwiastunem wyjazdu. Dobrze działają smaczki, miękkie koce i stopniowe budowanie pozytywnych skojarzeń.', '2026-03-19');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cats`
--

CREATE TABLE `cats` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `breed` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `temperament` varchar(150) NOT NULL,
  `status` varchar(100) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `featured` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `name`, `breed`, `age`, `temperament`, `status`, `short_description`, `description`, `image`, `featured`) VALUES
(1, 'Luna', 'Brytyjski krótkowłosy', 2, 'Spokojna i czuła', 'Dostępny', 'Uwielbia drzemki, miękkie koce i spokojne wieczory.', 'Luna to delikatna kotka, która świetnie odnajdzie się w spokojnym domu. Lubi głaskanie, obserwowanie okna i krótkie sesje zabawy z piórkiem.', 'assets/img/brytyjski.jpg', 1),
(2, 'Milo', 'Maine Coon', 3, 'Towarzyski i odważny', 'W trakcie adopcji', 'Duży przytulas, który lubi kontakt z ludźmi.', 'Milo jest otwarty, inteligentny i bardzo kontaktowy. Potrzebuje przestrzeni, drapaka i opiekuna gotowego na codzienne zabawy.', 'assets/img/maine-coon.jpg', 1),
(3, 'Nori', 'Europejski krótkowłosy', 1, 'Żywiołowa i ciekawska', 'Dostępny', 'Młoda kotka pełna energii i pomysłów.', 'Nori jest idealna do domu, w którym dużo się dzieje. Szybko nawiązuje relacje i chętnie poznaje nowe miejsca.', 'assets/img/kot-europejski-krotkowlosy.jpg', 1),
(4, 'Tofik', 'Ragdoll', 4, 'Łagodny i cierpliwy', 'Zarezerwowany', 'Miłośnik spokojnych ludzi i długich drzemek.', 'Tofik kocha przewidywalny rytm dnia, spokojne otoczenie i wygodne posłania. Jest bardzo delikatny i przyjazny.', 'assets/img/ragdoll.jpg', 0),
(5, 'Pola', 'Syjamski', 2, 'Gadatliwa i aktywna', 'Dostępny', 'Lubi obecność człowieka i dużo interakcji.', 'Pola potrzebuje zaangażowanego opiekuna, który zapewni jej stymulację i obecność. Świetnie odnajdzie się w aktywnym domu.', 'assets/img/syjamski.jpg', 0),
(6, 'Bazyli', 'Norweski leśny', 5, 'Dostojny i niezależny', 'Dostępny', 'Spokojny obserwator z miękkim sercem.', 'Bazyli lubi przestrzeń i wysoko położone miejsca. Z czasem otwiera się na człowieka i staje się wiernym towarzyszem.', 'assets/img/norweski-lesny.jpg', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(150) NOT NULL,
  `topic` varchar(180) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(160) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `featured` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `description`, `price`, `image`, `featured`) VALUES
(1, 'Legowisko Chmurka', 'Legowiska', 'Miękkie legowisko premium z wysokim rantem i przytulnym wnętrzem.', 149.99, 'assets/img/legowisko.jpg', 1),
(2, 'Drapak Skyline', 'Drapaki', 'Nowoczesny drapak z platformą obserwacyjną i sizalowym słupkiem.', 299.00, 'assets/img/drapak.jpg', 1),
(3, 'Wędka Meteor', 'Zabawki', 'Lekka wędka z piórkami i elastycznym uchwytem.', 39.90, 'assets/img/wedka.jpg', 0),
(4, 'Miseczki Duo', 'Akcesoria', 'Ceramiczny zestaw misek na wodę i karmę.', 59.50, 'assets/img/miseczki.jpg', 0),
(5, 'Tunel Mruczek', 'Zabawki', 'Składany tunel do gonitw i chowania się.', 79.00, 'assets/img/tunel.jpg', 0),
(6, 'Koc Velvet Paws', 'Tekstylia', 'Elegancki koc do legowiska i transportera.', 69.99, 'assets/img/koc.jpg', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `author` varchar(120) NOT NULL,
  `role` varchar(120) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `author`, `role`, `content`) VALUES
(1, 'Karolina D.', 'Nowy opiekun kota', 'Proces adopcji był bardzo prosty, a kontakt świetny od początku do końca. Nasz kot od pierwszego dnia czuł się jak u siebie.'),
(2, 'Michał K.', 'Wolontariusz', 'Dostaliśmy dużo wsparcia i wskazówek przed adopcją. Dzięki temu pierwsze dni z kotem były spokojne i bez stresu.'),
(3, 'Natalia P.', 'Miłośniczka kotów', 'Nie spodziewaliśmy się, że adopcja tak zmieni nasz dom. Kotek jest cudowny, a cała procedura przebiegła profesjonalnie i z sercem.'),
(4, 'Olek R.', 'Nowy opiekun kota', 'Widać, że dobro zwierząt jest tutaj najważniejsze. Czuliśmy, że ktoś naprawdę dba o to, gdzie trafiają koty.');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `adoption_requests`
--
ALTER TABLE `adoption_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption_requests`
--
ALTER TABLE `adoption_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
