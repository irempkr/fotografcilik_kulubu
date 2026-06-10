
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `event_date` date DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `events` (`id`, `user_id`, `title`, `event_date`, `location`, `description`) VALUES
(4, 1, 'Gölyazı fotoğraf etkinliği', '2026-08-12', 'Gölyazı', 'Sabah 8.00\'da BTÜ metro istasyonunda buluşulacaktır.'),
(5, 1, 'Cumalıkızık fotoğraf çekimi etkinliği	', '2026-06-08', 'Cumalıkızık ', 'Etkinliğimiz ücretsizdir. Kulübümüze kayıtlı tüm üyeleri bekleriz.'),
(6, 2, 'Ulucami tarihi fotoğraf gezisi', '0026-07-12', 'Şehreküstü metro istasyonu', 'Etkinliğimize tüm öğrenciler katılabilir.'),
(7, 1, 'Yeşil Camii tarihi fotoğraf çekimi etkinliği', '2026-11-23', 'Yeşil Cami', 'Tüm üyelerimiz davetlidir.');





CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'ayse guven', 'ayseguven@gmail.com', '$2y$10$aGvqKI78sKoRJ2lX/3Kqqez/k3HPPqLKpJ./v6N09s0ngsqqT4WNS'),
(2, 'Ahmet Dal', 'ahmetdal34@gmail.com', '$2y$10$FpzjllBcr0mfO1LuoM88SuBlMCJNkFT91j.tlVcZ7OmOzZHR1Ym4u'),
(3, 'mehmet çicek', 'mehmetcicek12@gmail.com', '$2y$10$HK.APnfh45GfS9CvH7ejF.cEr6xAo.n5Q.u213apq0tLzjKbMee8O');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
