-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 24 Cze 2017, 17:54
-- Wersja serwera: 5.7.18-0ubuntu0.16.04.1
-- Wersja PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `noticeBoard_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `add_date` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `photo_path` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `description`, `price`, `add_date`, `user_id`, `category_id`, `photo_path`) VALUES
(15, 'LODÓWKO-ZAMRAŻARKA srebrna no frost FRANKE FCBF A+', 'Chłodziarko-zamrażarka wolnostojąca FRANKE FCBF 340 NF LED XS A+ 118.0378.508 Energooszczędna chłodziarko-zamrażarka wolnostojąca firmy FRANKE z systemem No Frost, zapobiegającym osadzaniu się szronu.', 3499.61, '2017-06-19 11:08:00', 1, 1, '9e65e5f417dc951e043bf3190cf321bc.jpeg'),
(17, 'Rowerek biegowy 2WAY NEXT Kinderkraft stal rower', 'Rowerek biegowy 2WAY NEXT marki Kinderkraft  to idealne rozwiązanie dla Maluchów! Najlepiej przygotowuje do jazdy na tradycyjnym rowerze, zamieniając naukę w niesamowitą zabawę. Uczy utrzymywania równowagi, usprawnia koordynację ruchową, pomaga doskonalić percepcję przestrzeni, czy umiejętność oceny odległości i szybkości.', 129, '2017-06-18 21:10:00', 1, 2, '7fbcc2c303af536e147a88674d0af803.jpeg'),
(18, 'Piła spalinowa łańcuchowa SCHTER pilarka 52cc 5KM', 'Piła spalinowa, łańcuchowa 52cc marki SCHTER Cechy:      moc maksymalna 5 KM     pojemność silnika 52cc     długość prowadnicy 18\" (~46 cm)     dwusuwowy silnik, chłodzony powietrzem     aluminiowy blok silnika     metalowe zapadki rozruchowe     system filtracji powietrza     antypoślizgowy uchwyt     amortyzacji silnika', 299, '2017-06-18 19:08:00', 1, 5, 'e09134db90748480a8efea9f3ca06bc4.jpeg'),
(19, 'Smartfon Huawei Mate 9 Porsche Design 6/256GB DS', 'Huawei Mate 9 Porsche Design to stylowy i nowoczesny smartfon sygnowany nazwą znanego producenta samochodów, wyposażony w wydajne podzespoły, które spełnią wymagania nawet najbardziej wymagających użytkowników.', 5999, '2017-06-15 17:00:00', 2, 1, 'd5df4edfc26561ce8c9155df8110fb8e.jpeg'),
(20, 'KOSZULKA T-SHIRT PUMA RED BULL 572747 rozm L', 'Oryginalna, koszulka firmy PUMA z serii RED BULL. Bardzo dobry materiał i jakość wykonania gwarantuje wygodę i długotrwałe użytkowanie. Koszulka posiada duży nadruk z przodu. Wszystkie metki podkreślają najwyższą jakość i oryginalność produktu.', 139, '2017-05-11 14:00:00', 2, 6, 'fa3f4ed876186c3a33ea9eee6efb157c.jpeg'),
(21, 'Ława szklana stolik stół kawowy HOMEKRAFT TRIPLE', 'Nowoczesna ława TRIPLE posiada unikatowy design. Przeźroczysty blat o długości 90 cm i grubości 6 mm oraz dwie dolne półki o grubości 5 mm wykonane z wysokiej jakości szkła hartowanego. Bardzo stabilna i trwała konstrukcja dzięki zastosowaniu szerokich stalowych nóżek.  Dwie szklane półki o rożnych wysokościach:      od ziemi do dolnej półki: 15 cm     od ziemi do środkowej półki: 22 cm  Dzięki zastosowaniu szkła hartowanego ława jest łatwa w czyszczeniu i odporna na uszkodzenia. Górny blat jest przymocowany do nóg ławy. Stabilna konstrukcja dzięki zastosowaniu szerokich stalowych nóżek. Całość wygląda delikatnie i pasuje do każdej aranżacji.', 99, '2017-06-12 06:11:00', 2, 4, '2943ef5740ec3fd93b74709b45e9fa58.jpeg'),
(22, 'Kamera sportowa Manta 360 stopni 4K sensor SONY', 'Kamerka sportowa Manta MM9360 Active 360 to prawdziwa gratka dla miłośników wyjazdów. Kamera pozwoli uwiecznić każdą chwilę podróży w doskonałej jakości, dziki aż 16 Mpx (4096x4096). Będzie ona również idealna dla osób, które uwielbiają nurkować. Kamera jest wodoszczelna, umożliwia zanurzenie aż do 40m.', 399, '2017-06-18 18:18:00', 2, 5, '27d99231f86fc0b4754f752c426d1bc6.jpeg'),
(23, 'UNIVERSAL CREATINE 500G MONO KREATYNA CREAPURE', 'Universal Creatine Powder to kreatyna najwyższej jakości oraz gwarancji czystości składu (certyfikat CreaPure). Kupując tego typu produkt warto wybierać produkty sprawdzone renomowanych producentów – takie jak ten. Nie pozwól by cokolwiek ograniczało Twoje przyrosty tkanki mięśniowej! Jest to także znakomity wybór by przełamać doskwierającą Ci stagnację.', 49.95, '2017-06-20 22:50:00', 2, 2, '211fda138903e62f6f39d4096c057733.jpeg'),
(24, 'Apple MacBook Pro 13.3 MNQG2ZE/A/R1/D1 i5 16GB 1TB', 'Jest szybszy i wydajniejszy niż kiedykolwiek. A zarazem wyraźnie smuklejszy i lżejszy. Ma najjaśniejszy i najbarwniejszy ekran ze wszystkich notebooków Mac. I debiutuje w nim Touch Bar – wbudowany w klawiaturę szklany pasek Multi-Touch, który daje Ci błyskawiczny dostęp do przydatnych narzędzi. Dokładnie wtedy, kiedy ich potrzebujesz. Nowy MacBook Pro zrodził się z przełomowych pomysłów. Teraz czeka na Twoje.', 12890, '2017-06-15 12:00:00', 1, 1, '4ec31c9e1b410ca8c2a987adc887df21.png'),
(25, 'BMW E46 M3', 'Prezentowane ogłoszenie sprzedaży dotyczy samochodu BMW M3 E46 wyprodukowanego w roku 2003. Samochód wyposażony w skrzynię sekwencyjną SMG z możliwoscią jazdy w trybie automatycznym. Samochód fabrycznie został wyprodukowany z kierownicą po prawej stronie. Konwersja pojazdu do ruchu lewostronnego była profesjonalnie wykonana przez specjalistę w tej dziedzinie w Polsce - Krzyska \"Wronę\". Samochód w bardzo dobrej kondycji mechanicznej - zgadzam się na wizytę w dowolnym serwisie na koszt \"kupującego\". Wszelkie naprawy wykonywane na bieżąco z użyciem oryginalnych częsci w serwisie ASO BMW oraz Hypertech. Osoby wyjątkowo ceniące estetykę mogłyby pokusić się o odnowę powłoki lakierniczej. W kwietniu piękne, 19\" felgi przeszły renowację w zakładzie Renowacja Felg w Warszawie. W listopadzie ubiegłego roku, kierownica została obszyta skórą i szwem zgodnym z oryginalną specyfikacją pojazdu w firmie DetailingWorkShop. Serwis ten zregenerował również tapicerkę skórzaną oraz wymienił pianki siedziska i boczków fotela pasażera.', 63000, '2017-06-12 15:41:00', 1, 3, '629aff7d5828ece37857119d1a70e21b.jpeg'),
(27, 'BMW 318d BI-XENON NAVI BUSINESS PDC BRAZOWA ASO FV', 'Do sprzedania świeżo sprowadzone z Niemiec BMW 318d, kupione od dealera BMW w Niemczech, samochód w idealnym stanie mechanicznym i wizualnym, przebieg autostradowy, bezwypadkowy,oryginalny lakier na całym aucie, wszystkie wymiany w ASO BMW, na oryginalnych częściach bmw, stan auta idealny. UWAGA!!!!  Samochod po dużej inspekcji na 210000km, NOWE AMORTYZATORY, FILTR DPF, OLEJ I FILTRY W SILNIKU!!!!!  WSZYSTKO WYMIENIONE W NIEMCZECH W ASO BMW.  ZAPRASZAM DO ZAKUPU, SAMOCHOD MAKSYMALNIE DOINWESTOWANY!!!', 42900, '2017-07-01 10:00:00', 3, 3, 'bdc3a674c9e7f6550bcb43eb67ceaa01.jpeg'),
(28, 'Szafa przesuwna BARCELONA B-23 150 lustrem SZYBKO', 'Szafa BARCELONA wykonana jest z płyty wiórowej laminowanej o grubości 16 mm. Wykonana jest ona bardzo starannie w nowoczesnym stylu, lustra na frontach sprawiają że jest ona oryginalna i niepowtarzalna.  W szafie zastosowano metalowe prowadnice oraz łożyskowy system przesuwny co gwarantuje że po kilku latach drzwi nadal będą pracowały \"jak nowe\". Dodatkowo na bokach drzwi zamontowane są metalowe listwy tzw. rączki sprawiają one że drzwi są usztywnione i nie wyginają się podczas przesuwania oraz dodatkowo ułatwiają otwieranie szafy.  Szafa jest nowa zapakowana w paczkach do samodzielnego montażu. W paczkach znajdują się niezbędne okucia oraz instrukcja umożliwiająca szybki i bezproblemowy montaż szafy.', 699, '2017-08-15 16:00:00', 3, 4, '603e2e6684edfdf142ac0c6dafdb4dcd.jpeg'),
(29, 'KĄPIELÓWKI MĘSKIE OUTHORN SPODENKI BOKSERKI S-XXL', 'Kąpielówki męskie marki Outhorn producenta renomowanej marki 4F idealnie sprawdzą się podczas wypadów nad morze, jezioro, czy też na basen. Stworzone zostały dla aktywnych mężczyzn. Dzięki dodatkowi elastanu kąpielówki są rozciągliwe i świetnie przylegają do ciała. Kąpielówki wykonane zostały z najwyższej jakości materiałów, dzięki czemu kąpiełówki są miłe w dotyku i zapewniają duży komfort podczas użytkowania.', 19.25, '2017-07-26 19:00:00', 3, 6, 'c27d313e1f5e4427317d04c6364f9895.jpeg'),
(30, 'NAJLEPSZY NAMIOT 3 OS turystyczny Taurus Peme 5kg', 'Namiot Taurus 3 Peme wyróżnia funkcjonalna konstrukcja z dużym przedsionkiem. Urządzisz się na biwaku w taki sposób, aby cieszyć się komfortem przez cały okres wypoczynku. Śpisz w wentylowanej sypialni, akcesoria kempingowe i bagaż bezpiecznie przechowujesz w przedsionku.  Namiot posiada impregnowany tropik o współczynniku wodoodporności 4000 mm dlatego zapewnia komfort wypoczynku również podczas niesprzyjającej pogody. Opady deszczu, wieczorne i poranne zamglenia nie będą stanowiły żadnego problemu. Dwa wejścia do przedsionka oraz dwa wejścia do sypialni gwarantują utrzymanie przepływu powietrza - zasłony wejścia do sypialni wyposażone są w niezależnie odpinane moskitiery.', 279, '2017-09-01 15:00:00', 3, 5, 'ea3dcf91a68e0b02c861e998999cb986.jpeg'),
(31, 'PIŁKA NOŻNA PUMA evoTouch GRAPHIC rozm. 5! do nogi', 'Przedmiotem sprzedaży jest piłka nożna Puma z kolekcji Puma Football!  Piłka jest szyta maszynowo. Idealna do gry na świeżym powietrzu, niezależnie od warunków pogodowych!  Piłka wykonana została w wyrazistej, kontrastującej kolorystyce, co sprawia, że jest bardzo ciekawa wizualnie!  Piłki są nowe i w 100% oryginalne! Zapakowane są w foliowe woreczki firmowe.  Oferowana przez nas piłka jest świetnym pomysłem na prezent!  Nie zwlekaj! Kup ją już dziś!', 39, '2017-07-15 19:00:00', 3, 2, '80eecd5f409bb4b8b72fdcdc160a56d7.jpeg'),
(47, '* FIAT 126 MALUCH * 1-SERIA * STAN FABRYCZNY *', '********** CENA : 69,000 zł (SŁOWNIE : SZEŚĆDZIESIĄT DZIEWIĘĆ TYSIĘCY ZŁOTYCH) **********  *** FIAT 126 *** 600 *** LICENCJA FIAT *** 1975 r. *** ORYGINALNY PRZEBIEG = 28.518 km ***  * 1. WŁAŚCICIEL * KUPIONY w \"POLMOZBYT-WARSZAWA\" * PEŁNA DOKUMENTACJA *  * UWAGA ! POJAZD NIE BYŁ PODDAWANY JAKIEJKOLWIEK RENOWACJI * * ABSOLUTNIE KAŻDY ELEMENT POJAZDU : 100% ORYGINAŁ * * STAN 100% FABRYCZNY !!! FABRYCZNE OPONY !!! * * FABYCZNA POWŁOKA LAKIERNICZA * * CAŁKOWITY BRAK USZKODZEŃ *', 69000, '2017-08-10 10:00:00', 1, 3, '1fbd8a575652cf235a360d5128ccd41a.jpeg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Elektronika'),
(2, 'Sport'),
(3, 'Mototryzacja'),
(4, 'Dom i zdrowie'),
(5, 'Strefa okazji'),
(6, 'Moda');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `announcement_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `comment`
--

INSERT INTO `comment` (`id`, `announcement_id`, `user_id`, `text`, `date`) VALUES
(26, 25, 1, 'Najlepsze auto Świata!', '2017-06-20 11:14:49'),
(27, 25, 2, 'Moje marzenie od dawna', '2017-06-20 11:30:38'),
(28, 25, 3, 'Chce to auto!!! Zajebiste!', '2017-06-20 12:15:49'),
(29, 23, 3, 'Jest po tym pompa, polecam!!!', '2017-06-20 12:43:38'),
(30, 27, 2, 'Fajne ale za dużo elektroniki', '2017-06-20 12:55:53'),
(31, 17, 2, 'Kupia takie bajtlowi', '2017-06-20 12:57:10'),
(32, 24, 2, 'Niy chca nic godać ale troche ześ przegioł z tą ceną', '2017-06-21 22:36:54'),
(33, 30, 2, 'test comment', '2017-06-21 22:42:43'),
(34, 27, 1, '4 dychy i jadę po niego', '2017-06-23 21:50:58'),
(35, 23, 1, 'Ja ale ćwiczyć trzeba...', '2017-06-24 16:37:05');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'Jacek', 'jacek', 'jacek82@onet.eu', 'jacek82@onet.eu', 1, NULL, '$2y$13$iBpusbLRhyBK11wRvaqJy.39oFdQbLS/33Ap/vDr2mHPj3fP59HJ2', '2017-06-24 17:43:12', NULL, NULL, 'a:0:{}'),
(2, 'Jan', 'jan', 'jawn@gmail.com', 'jawn@gmail.com', 1, NULL, '$2y$13$lCt.tmh4W5mV3PKlutkhG.LmaCyaPfaTkHFadHe.rZ8uCwjpYVQz.', '2017-06-24 17:47:33', NULL, NULL, 'a:0:{}'),
(3, 'Łukasz', 'łukasz', 'lukasz@onet.pl', 'lukasz@onet.pl', 1, NULL, '$2y$13$0gXc2Fk5mRSBuTWvG88Da.KUK5mm1ErUX6W1k/G25peBexdOdjJqG', '2017-06-22 22:47:57', NULL, NULL, 'a:0:{}'),
(4, 'user_admin', 'user_admin', 'admin@admin.com.eu', 'admin@admin.com.eu', 1, NULL, '$2y$13$lMgyaJzNBKGZlaM2fdoOrOKSUGqHZR5r5QllMut9hZ.BzAQZKxiiK', '2017-06-24 17:35:30', NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4DB9D91CA76ED395` (`user_id`),
  ADD KEY `IDX_4DB9D91C12469DE2` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526C913AEA17` (`announcement_id`),
  ADD KEY `IDX_9474526CA76ED395` (`user_id`);

--
-- Indexes for table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT dla tabeli `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT dla tabeli `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `FK_4DB9D91C12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_4DB9D91CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);

--
-- Ograniczenia dla tabeli `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C913AEA17` FOREIGN KEY (`announcement_id`) REFERENCES `announcement` (`id`),
  ADD CONSTRAINT `FK_9474526CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
