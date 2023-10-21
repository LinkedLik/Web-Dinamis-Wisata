-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2022 pada 05.54
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `adminID` char(4) NOT NULL,
  `adminNAMA` varchar(30) NOT NULL,
  `adminEMAIL` varchar(60) NOT NULL,
  `adminPASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`adminID`, `adminNAMA`, `adminEMAIL`, `adminPASSWORD`) VALUES
('A001', 'Liko', 'liko.825210137@stu.untar.ac.id', '57d486a14d435013964f8a5a6206b13b'),
('A002', 'Admin', 'Admin@tester.com', '2567a5ec9705eb7ac2c984033e06189d');

-- --------------------------------------------------------

--
-- Struktur dari tabel `area`
--

CREATE TABLE `area` (
  `areaID` char(4) NOT NULL,
  `areanama` char(35) NOT NULL,
  `areawilayah` char(35) NOT NULL,
  `areaketerangan` varchar(255) NOT NULL,
  `kabupatenKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `area`
--

INSERT INTO `area` (`areaID`, `areanama`, `areawilayah`, `areaketerangan`, `kabupatenKODE`) VALUES
('AR01', 'Pegunungan', 'Wilayah Pegunungan', 'Berada pada kaki gunung', 'TG01'),
('AR02', 'Pantura', 'Pantai Utara Jawa', 'Jalan yang menghubungkan Anyer - Panarukan', 'MG01'),
('AR03', 'PANTAI SELATAN', 'PANTAI SELATAN JAWA', 'Jalur Pantai Selatan', 'SL01'),
('AR04', 'KOTA', 'WILAYAH PERKOTAAN', 'KOTA MADYA', 'PB01'),
('AR05', 'PERBUKTIAN', 'KAKI GUNUNG', 'TERLETAK DI KAKI GUNUNG', 'PB01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `beritaID` char(4) NOT NULL,
  `beritajudul` varchar(60) NOT NULL,
  `beritainti` varchar(1000) NOT NULL,
  `penulis` char(50) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tanggalterbit` date NOT NULL,
  `destinasiID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`beritaID`, `beritajudul`, `beritainti`, `penulis`, `penerbit`, `tanggalterbit`, `destinasiID`) VALUES
('BT01', 'Candi Borobodur  ', 'Membahas tentang  Candi borobudur', 'IMB', 'CNN INDONESIA', '2022-11-09', 'BK01'),
('BT02', 'Test', 'Hanya Test', 'Webdev', 'tidak diketahui', '2022-12-12', 'KW05'),
('BT03', 'Ayam Goreng Banjarsari - Pekalongan, Jawa Tengah', '  Ayam Goreng Banjarsari menjajakan hidangan ayam goreng di Kota Pekalongan. Tempat ini menyediakan ayam goreng dengan daging yang empuk, bumbu, bahan dan resep pilihan. Tempat ini dapat menjadi pilihan makan bersama teman dan keluarga. Hidangan ditawarkan dengan harga terjangkau dengan rasa terbaik.  Segera kunjungi Ayam Goreng Banjarsari terdekat ini. Anda juga bisa menghubungi kontak nomor telepon jika tersedia.', 'Redaksi', 'IDAlamat', '2022-12-01', 'WS01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiID` char(5) NOT NULL,
  `destinasinama` varchar(35) NOT NULL,
  `destinasialamat` varchar(255) NOT NULL,
  `kategoriID` char(4) NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `destinasi`
--

INSERT INTO `destinasi` (`destinasiID`, `destinasinama`, `destinasialamat`, `kategoriID`, `areaID`) VALUES
('BK01', 'Candi Borobudur', 'Magelang', 'WK02', 'AR04'),
('F001', 'KOLAM', 'DEPAN JALAN', '', ''),
('JK01', 'Becek', 'Kena Ujan', 'WK01', 'AR05'),
('KM01', 'KOLAM', 'DEPAN JALAN', 'WK01', 'AR02'),
('KW05', 'Pantai GunungKidul', 'Jl. GunungKidul', 'WK04', 'AR04'),
('WP05', 'Pantai GunungKidul', 'GunungKidul', '', ''),
('WS01', 'Dago Pakar', 'JL. Geger Kalong Hilir Bandung', '', 'AR01'),
('WS02', 'Lembang Asri', 'Jl. Lembang Utara', '', 'AR01'),
('WS04', 'Pantai Krakal', 'Jl. Pantai Selatan Jawa', 'WK04', 'AR04'),
('WS05', 'Curug', 'Di Alam', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotoID` char(5) NOT NULL,
  `fotonama` char(60) NOT NULL,
  `destinasiID` char(4) NOT NULL,
  `fotofile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotoID`, `fotonama`, `destinasiID`, `fotofile`) VALUES
('F001', 'FOTO WISATA 1', 'WS04', ''),
('F002', 'FOTO WISATA 2', 'BK01', 'img101.jpg'),
('F003', 'DIENG', 'WS01', '614eba86bfd35.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `hotelID` char(4) NOT NULL,
  `hotelnama` varchar(60) NOT NULL,
  `hotelalamat` varchar(255) NOT NULL,
  `hotelketerangan` varchar(300) NOT NULL,
  `hotelfoto` text NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`hotelID`, `hotelnama`, `hotelalamat`, `hotelketerangan`, `hotelfoto`, `areaID`) VALUES
('HL01', 'HOTEL SENDANG SARI', 'Alamat: Jl. Jendral Sudirman No.29, Kasepuhan, Kec. Batang, Kabupaten Batang, Jawa Tengah 51216', 'Hotel santai yang terletak di Jalan Nasional Rute 1 yang rindang ini berjarak 3 km dari stasiun kereta Batang, 5 km dari Pantai Sigandu, dan 8 km dari Museum Batik Pekalongan.   Kamar simpel dilengkapi TV layar datar, kulkas mini, dan ketel. Kamar di kelas yang lebih tinggi memiliki area duduk.  ', 'sendang sari hotel.jpg', 'AR02'),
('HL02', 'SANS EKKON HOTEL', 'Cokro Square, Jl. HOS Cokroaminoto, Tegalrejo, Kec. Tegalrejo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55244', 'Sans Hotel Ekkon Yogyakarta terletak di daerah Tegalrejo, Ngabean, 1,1 km dari Stasiun Tugu Yogyakarta, 2,5 km dari Museum Sonobudoyo, dan 1,8 km dari Malioboro Mall. Hotel bintang 3 ini memiliki kamar-kamar dengan AC, kamar mandi pribadi, dan Wi-Fi gratis. 3,3 km dari Istana Kepresidenan Yogyakarta', 'unnamed.jpg', 'AR03'),
('HL03', 'Hot Water Boom Guciku', 'Jalan Lingkar Barat Desa, Kalengan, Guci, Kecamatan Bumijawa, Kabupaten Tegal, Jawa Tengah 52466', 'Penginapan di Guciku sendiri terdiri dari bermacam-macam tipe. Yaitu, Hotel Deluxe, Superior, Family Room, Villa, dan Villa Joglo.', 'sendang sari hotel.jpg', 'AR03'),
('HL04', 'HOTEL BENER', 'Jalan Bener No. 9, Yogyakarta, Provinsi Yogyakarta, Indonesia', 'Terletak di lokasi utama Yogyakarta, Hotel Bener Jogja menempatkan segala sesuatu kota yang ditawarkan di luar depan pintu Anda. Pelancong bisnis dan wisatawan dapat menikmati fasilitas dan layanan hotel. Wi-fi di tempat umum, tempat parkir mobil, layanan kamar, area merokok dapat ditemukan di hotel', 'hotelbener.jpg', 'AR03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `kabupatenKODE` char(4) NOT NULL,
  `kabupatenNAMA` char(60) NOT NULL,
  `kabupatenALAMAT` varchar(255) NOT NULL,
  `kabupatenKET` text NOT NULL,
  `kabupatenFOTOICON` varchar(255) NOT NULL,
  `kabupatenFOTOICONKET` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`kabupatenKODE`, `kabupatenNAMA`, `kabupatenALAMAT`, `kabupatenKET`, `kabupatenFOTOICON`, `kabupatenFOTOICONKET`) VALUES
('BT01', 'BATANG', 'JATENG', 'Pantai Utara Jawa', 'Tempat-Wisata-Batang.jpg', 'Alun2 Batang'),
('KB01', 'Guci', 'Tegal, Provinsi Jawa Tengah', 'Terkenal Akan Pemandian Air Panas', 'guciku.jpg', 'Waterboom hot guciku'),
('MD01', 'NGAWI', 'JAWA TIMUR', 'TERLETAK DI PERBATASAN JAWA TENGAH - JAWA TIMUR', 'Tugu_Gading_Kartonyono.jpg', 'Tugu Gading'),
('MG01', 'MAGETAN', 'PERBATASAN JAWA TENGAH - JAWA TIMUR', 'TERKENAL AKAN TELAGA SARANGAN', 'berita_6968633f9c0fdce341.41579476.jpg', 'TELAGA SARANGAN'),
('PB01', 'PROBOLINGGO', 'JAWA TIMUR', 'TERLETAK DIANTARA PASURUAN DAN LUMAJANG', 'pendapatan-taman-nasional-bromo-tengger-semeru-capai-rp-27-miliar_m_-640x421.jpg', 'Bromo'),
('PM01', 'PEMALANG', 'JAWA TENGAH', 'Terletak diantara Kota Brebes dan Kota Pekalongan', 'alun-alun-pemalang.jpg', 'Alun Alun Pemalang'),
('SL01', 'SLEMAN', 'YOGYAKARTA', 'Kabupaten yang terletak di Yogyakarta', 'fromandroid-467da6e9f7de0c09a527888033c6d798_600x400.jpg', 'Candi Prambanan'),
('TG01', 'WONOSOBO', 'DIENG WONOSOBO', 'Terkenal Akan Pemandian Air Panas', '614eba86bfd35.jpg', 'KAWAH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategoriID` char(4) NOT NULL,
  `kategorinama` char(30) NOT NULL,
  `kategoriketerangan` varchar(255) NOT NULL,
  `kategorireferensi` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategoriID`, `kategorinama`, `kategoriketerangan`, `kategorireferensi`) VALUES
('KW04', 'Religi', 'Wisata rohani', 'Buku'),
('WK01', 'Alam', 'Wisata dengan pemandangan pantai dan gunung', 'buku'),
('WK02', 'Budaya', 'Wisata sejarah, peninggalan masa lalu', 'Buku'),
('WK04', 'Pantai', 'Deket Laut', 'Pengguna');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `provinsiID` char(5) NOT NULL,
  `provinsiNAMA` varchar(30) NOT NULL,
  `provinsiTANGGALBERDIRI` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`provinsiID`, `provinsiNAMA`, `provinsiTANGGALBERDIRI`) VALUES
('PV01', 'DKI JAKARTA', '1527-06-22'),
('PV02', 'JAWA BARAT', '1945-08-19'),
('PV03', 'JAWA TENGAH', '1950-08-15'),
('PV04', 'JAWA TIMUR', '1945-10-12'),
('PV05', 'DIY', '1755-03-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `restoran`
--

CREATE TABLE `restoran` (
  `restoranID` char(5) NOT NULL,
  `restoranNAMA` varchar(30) NOT NULL,
  `restoranKETERANGAN` varchar(256) NOT NULL,
  `kabupatenKODE` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `restoran`
--

INSERT INTO `restoran` (`restoranID`, `restoranNAMA`, `restoranKETERANGAN`, `kabupatenKODE`) VALUES
('RS01', 'SEGO DALEM', 'RUMAH MAKAN DI JALAN PANTURA', 'MG01'),
('RS02', 'SARI LAOS', 'RUMAH MAKAN SUNDA', 'BT01'),
('RS03', 'Ayam Goreng Banjarsari Pekalon', 'Ayam Goreng Banjarsari menjajakan hidangan ayam goreng di Kota Pekalongan. Tempat ini menyediakan ayam goreng dengan daging yang empuk, bumbu, bahan dan resep pilihan. Tempat ini dapat menjadi pilihan makan bersama teman dan keluarga. ', 'BT01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rutedestinasi`
--

CREATE TABLE `rutedestinasi` (
  `ruteID` char(5) NOT NULL,
  `asal` varchar(30) NOT NULL,
  `tanggalberangkat` date NOT NULL,
  `tujuan` varchar(30) NOT NULL,
  `tanggaltiba` date NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rutedestinasi`
--

INSERT INTO `rutedestinasi` (`ruteID`, `asal`, `tanggalberangkat`, `tujuan`, `tanggaltiba`, `areaID`) VALUES
('CB01', 'Cilegon', '2022-11-16', 'Denpasar', '2022-11-18', 'AR04'),
('JY01', 'Jakarta', '2022-11-14', 'Gunungkidul', '2022-11-15', 'AR03'),
('SY01', 'Banyuwangi', '2022-12-02', 'Surabaya', '2022-12-02', 'AR02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempatwisata`
--

CREATE TABLE `tempatwisata` (
  `wisataID` char(5) NOT NULL,
  `wisataNAMA` varchar(30) NOT NULL,
  `wisataFOTO` text NOT NULL,
  `wisataFOTOKETERANGAN` varchar(255) NOT NULL,
  `kabupatenKODE` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tempatwisata`
--

INSERT INTO `tempatwisata` (`wisataID`, `wisataNAMA`, `wisataFOTO`, `wisataFOTOKETERANGAN`, `kabupatenKODE`) VALUES
('JR01', 'Telaga Sarangan', 'telaga-sarangan-magetan-jatim.jpg', 'Wisata Speed Board Telaga Sarangan', 'MG01'),
('JR02', 'CANDI ARJUNA', '614ea1f2206ed.jpg', 'CANDI PENINGGALAN HINDU BUDDHA DI DIENG WONOSOBO', 'TG01'),
('JR03', 'PANTAI KREMATORIUM', 'Pantai-Krematorium-.jpg', 'PANTAI YANG TERLETAK DI KOTA PEKALONGAN, BERDEKATAN DENGAN TEMPAT KREMASI JENAZAH GOTONG ROYONG, SEHINGGA DIBERINAMA DENGAN NAMA PANTAI KREMATORIUM', 'BT01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indeks untuk tabel `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`areaID`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`beritaID`);

--
-- Indeks untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiID`);

--
-- Indeks untuk tabel `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotoID`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelID`);

--
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`kabupatenKODE`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`provinsiID`);

--
-- Indeks untuk tabel `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`restoranID`);

--
-- Indeks untuk tabel `rutedestinasi`
--
ALTER TABLE `rutedestinasi`
  ADD PRIMARY KEY (`ruteID`);

--
-- Indeks untuk tabel `tempatwisata`
--
ALTER TABLE `tempatwisata`
  ADD PRIMARY KEY (`wisataID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
