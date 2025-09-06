-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Sep 2025 pada 18.26
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `url`, `cover`, `date`) VALUES
(2, 'Artikel Pertama', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda inventore deserunt iusto odio est aperiam quaerat. Veritatis veniam dolore quisquam cumque quis. Tenetur consequatur aut delectus dolorem atque consectetur ratione!', 'First-Artikel', 'wallpaperflare_com_wallpaper.jpg', '2025-09-06 15:44:22'),
(13, 'Dunia Digital yang Penuh Tantangan', 'Game saat ini sudah berkembang menjadi industri besar yang tidak hanya sekadar hiburan. Banyak jenis game hadir, mulai dari game mobile, konsol, hingga PC dengan grafik realistis dan cerita mendalam. Beberapa game bahkan bisa melatih keterampilan strategi, kerja sama tim, dan kreativitas.\r\n\r\nSelain itu, game juga membuka peluang karier baru melalui e-sports. Banyak pemain profesional yang berhasil meraih prestasi internasional dan menjadikan game sebagai profesi. Dengan komunitas yang terus berkembang, game kini bukan hanya permainan, tetapi juga bagian penting dari gaya hidup digital.', 'Dunia-Digital-yang-Penuh-Tantangan', 'games.jpg', '2025-09-06 15:43:53'),
(25, 'Persahabatan yang Menghibur', 'Serial animasi We Bare Bears menceritakan kehidupan tiga beruang lucu — Grizzly, Panda, dan Ice Bear — yang berusaha menyesuaikan diri dengan kehidupan manusia. Meski sering menghadapi situasi kocak dan tidak biasa, mereka selalu saling mendukung satu sama lain. Keunikan karakter setiap beruang membuat cerita semakin menarik dan dekat dengan kehidupan sehari-hari.\r\n\r\nSelain hiburan, We Bare Bears juga mengajarkan nilai-nilai persahabatan, kerja sama, dan menerima perbedaan. Anak-anak hingga orang dewasa dapat mengambil pelajaran positif dari setiap episodenya, menjadikan serial ini lebih dari sekadar tontonan lucu, tetapi juga penuh makna.', 'We-bare-bear', 'e809ff380655b17e3dd1305039df32b3.jpg', '2025-09-06 15:42:48'),
(32, 'Menyegarkan Pikiran dengan Alam', 'Liburan adalah momen penting untuk menyegarkan kembali tubuh dan pikiran. Setelah berbulan-bulan bekerja atau belajar, meluangkan waktu untuk berlibur ke pantai, gunung, atau desa wisata bisa menjadi cara terbaik untuk menghilangkan stres. Alam yang indah mampu memberikan ketenangan sekaligus inspirasi baru.\r\n\r\nSelain melepas penat, liburan juga mempererat hubungan dengan keluarga dan teman. Berbagi cerita, menikmati suasana baru, serta mencoba kuliner khas daerah tertentu menjadikan liburan lebih berkesan. Itulah mengapa liburan sering dianggap sebagai investasi berharga untuk kesehatan mental dan kebahagiaan.', 'Menyegarkan-Pikiran-dengan-Alam', 'liburan.jpg', '2025-09-06 15:41:02'),
(33, 'Inspirasi dari Kisah Perjuangan', 'Anime bukan hanya sekadar hiburan, tetapi juga sarana untuk menyampaikan nilai-nilai kehidupan. Banyak anime populer seperti Naruto atau Attack on Titan yang mengajarkan arti persahabatan, kerja keras, serta keberanian menghadapi tantangan. Cerita yang mendalam sering kali membuat penonton termotivasi dalam kehidupan nyata.\r\n\r\nSelain itu, anime juga memiliki daya tarik budaya yang kuat. Melalui anime, dunia dapat mengenal lebih dekat budaya Jepang, mulai dari bahasa, makanan, hingga tradisi. Tidak heran jika anime berhasil menciptakan komunitas global yang sangat besar dan penuh antusiasme.', 'Inspirasi-dari-Kisah-Perjuangan', 'anime2.jpg', '2025-09-06 15:39:44'),
(34, 'Menikmati Keindahan Pulau Karimunjawa', 'Karimunjawa, yang terletak di utara Jawa Tengah, menawarkan panorama laut yang memukau dengan air jernih dan terumbu karang yang indah. Pulau ini cocok untuk snorkeling, diving, atau sekadar bersantai di pantai berpasir putih. Selain keindahan alam, wisatawan juga bisa menikmati kuliner khas laut segar yang disajikan langsung oleh masyarakat lokal. Liburan ke Karimunjawa bukan hanya melepas penat, tapi juga memberikan pengalaman menyatu dengan alam yang sulit dilupakan.', 'Menikmati-Keindahan-Pulau-Karimunjawa', 'karimun.jpg', '2025-09-06 15:31:47'),
(35, 'Tantangan Demokrasi di Era Digital', 'Perkembangan media sosial telah mengubah wajah politik global. Informasi dapat tersebar dengan cepat, tetapi sering kali diikuti oleh hoaks dan disinformasi. Di Indonesia, partisipasi masyarakat semakin tinggi berkat akses digital, namun hal ini juga menimbulkan polarisasi tajam antar kelompok. Untuk menjaga kualitas demokrasi, diperlukan literasi digital yang kuat, regulasi transparan, dan kesadaran masyarakat dalam memilah informasi yang benar.', 'Tantangan-Demokrasi-di-Era-Digital', 'politik.jpg', '2025-09-06 15:30:32'),
(36, 'Perkembangan-Kecerdasan-Buatan', 'Kecerdasan buatan (Artificial Intelligence/AI) semakin pesat berkembang dalam beberapa tahun terakhir. Dari chatbot, asisten virtual, hingga analisis data besar, AI telah membantu manusia dalam menyelesaikan banyak pekerjaan dengan lebih cepat dan efisien. Bahkan, di dunia kesehatan, AI digunakan untuk mendiagnosis penyakit dengan tingkat akurasi yang tinggi.\r\n\r\nNamun, perkembangan ini juga menimbulkan tantangan baru. Banyak orang khawatir tentang hilangnya lapangan pekerjaan akibat otomatisasi. Oleh karena itu, penting bagi masyarakat untuk terus meningkatkan keterampilan digital agar bisa beradaptasi dengan perubahan zaman yang semakin berbasis teknologi.', 'Perkembangan-Kecerdasan-Buatan', 'ai.jpg', '2025-09-06 15:33:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `content` (`url`) USING HASH;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
