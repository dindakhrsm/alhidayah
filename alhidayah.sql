-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `categories` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1,	'Info Kegiatan',	'info-kegiatan',	NULL,	'2020-09-02 21:14:29'),
(2,	'Resume Ceramah',	'resume-ceramah',	NULL,	NULL),
(3,	'Shahibul Hikayat',	'shahibul-hikayat',	NULL,	NULL),
(4,	'Shiroh Nabi dan Sahabat',	'shiroh-nabi-dan-sahabat',	NULL,	NULL),
(5,	'Kutipan Ayat & Hadits',	'kutipan-ayat-and-hadits',	NULL,	'2020-03-05 18:11:33'),
(6,	'Uncategorized',	'uncategorized',	'2020-04-30 13:15:12',	'2020-04-30 13:25:59'),
(7,	'Kemuslimahan',	'kemuslimahan',	'2020-08-03 20:14:09',	'2020-08-03 20:14:09');

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_foreign` (`post_id`),
  CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `comments` (`id`, `author_name`, `author_email`, `author_url`, `body`, `post_id`, `created_at`, `updated_at`) VALUES
(1,	'dinda',	'dindakudo@gmail.com',	NULL,	'test comment1',	1,	'2020-03-10 07:07:50',	NULL),
(2,	'anis',	'a.setiawati@bapeten.go.id',	NULL,	'test comment 2',	1,	NULL,	NULL),
(3,	'fani',	'r.parhani@bapeten.go.id',	NULL,	'test comment 3',	1,	NULL,	NULL),
(4,	'dinda',	'dinda@test.com',	NULL,	'coba comment lagi',	2,	'2020-03-10 07:08:19',	NULL),
(5,	'ria',	'r.gartika@bapeten.go.id',	NULL,	'test comment ',	10,	'2020-03-09 07:07:50',	NULL),
(6,	'keni',	'k.dwikania@bapeten.go.id',	NULL,	'test comment lagi hehehehee',	10,	'2020-03-10 07:39:39',	NULL),
(7,	'anis',	'a.setiawati@bapeten.go.id',	NULL,	'test comment dulu yg banyak ehehe',	9,	'2020-03-09 03:07:50',	NULL),
(8,	'fani',	'r.parhani@bapeten.go.id',	NULL,	'test comment artikel 8',	8,	'2020-03-10 03:07:50',	NULL),
(9,	'anis',	'a.setiawati@bapeten.go.id',	'',	'tes comment lagi lorem ipsum',	10,	'2020-03-10 08:19:41',	NULL),
(10,	'fani',	'r.parhani@bapeten.go.id',	NULL,	'coba komen artikel lagi',	10,	'2020-03-10 08:20:22',	NULL),
(11,	'ghina',	'ghinarsk@test.com',	'',	'coba input komentar',	10,	'2020-03-10 23:48:14',	'2020-03-10 23:48:14'),
(12,	'ummu',	'uklts@test.com',	'',	'such a good article',	10,	'2020-03-10 23:59:57',	'2020-03-10 23:59:57'),
(13,	'ria',	'r.gartika@bapeten.go.id',	'',	'rundownnya ada gakya',	7,	'2020-03-11 00:09:03',	'2020-03-11 00:09:03'),
(14,	'anis setiawati',	'a.setiawati@bapeten.go.id',	'',	'nice :)',	6,	'2020-03-11 01:09:33',	'2020-03-11 01:09:33'),
(15,	'dinda',	'd.kharisma@bapeten.go.id',	'-',	'jazakallah khair',	8,	'2020-04-30 08:08:23',	'2020-04-30 08:08:23');

DROP TABLE IF EXISTS `imagecategories`;
CREATE TABLE `imagecategories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `imagecategories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `imagecategories` (`id`, `nama_kategori`, `slug`, `created_at`, `updated_at`) VALUES
(1,	'Kajian Pekanan',	'kajian-pekanan',	'2020-08-25 23:39:21',	'2020-08-31 00:52:56'),
(2,	'Kemuslimahan',	'kemuslimahan-bapeten',	'2020-08-31 00:45:11',	'2020-08-31 00:45:11'),
(3,	'Ramadhan',	'ramadhan',	'2020-08-31 04:22:52',	'2020-08-31 04:22:52'),
(4,	'Lain-lain',	'other',	'2020-08-31 04:23:20',	'2020-08-31 04:23:20');

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(10) unsigned NOT NULL,
  `judul_gambar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ket_gambar` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `imagecategory_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `images_author_id_foreign` (`author_id`),
  KEY `images_imagecategory_id_foreign` (`imagecategory_id`),
  CONSTRAINT `images_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  CONSTRAINT `images_imagecategory_id_foreign` FOREIGN KEY (`imagecategory_id`) REFERENCES `imagecategories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `images` (`id`, `author_id`, `judul_gambar`, `ket_gambar`, `image`, `created_at`, `updated_at`, `imagecategory_id`) VALUES
(2,	10,	'Kajian Move on To be Better',	'21022020',	'galeri_6.jpg',	'2020-08-31 08:22:58',	'2020-08-31 08:22:58',	2),
(3,	10,	'Kajian Move on To be Better',	'21022020',	'galeri_5.jpg',	'2020-08-31 08:43:24',	'2020-08-31 08:43:24',	2),
(4,	10,	'kajian senin',	'kajian bersama ustadz',	'galeri_2.jpeg',	'2020-08-31 19:40:02',	'2020-08-31 19:40:02',	1);

DROP TABLE IF EXISTS `jadwaljumats`;
CREATE TABLE `jadwaljumats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(10) unsigned NOT NULL,
  `tanggal` date NOT NULL,
  `imam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khotib` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jadwaljumats_author_id_foreign` (`author_id`),
  CONSTRAINT `jadwaljumats_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `jadwaljumats` (`id`, `author_id`, `tanggal`, `imam`, `khotib`, `keterangan`, `created_at`, `updated_at`) VALUES
(1,	10,	'2020-09-11',	'Ust Imam',	'Ust Khotib',	'Tema Khutbah: Berkah Jumat',	'2020-09-07 21:00:44',	'2020-09-07 21:00:44'),
(2,	10,	'2020-09-04',	'Ust Imam',	'Ust Khotib',	'Tema Khutbah: Ikhlas',	'2020-09-09 02:01:09',	'2020-09-09 02:01:09');

DROP TABLE IF EXISTS `jadwalkajians`;
CREATE TABLE `jadwalkajians` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(10) unsigned NOT NULL,
  `hari` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tempat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `narasumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tema` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jadwalkajians_author_id_foreign` (`author_id`),
  CONSTRAINT `jadwalkajians_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `jadwalkajians` (`id`, `author_id`, `hari`, `tanggal`, `jam`, `tempat`, `narasumber`, `tema`, `created_at`, `updated_at`) VALUES
(1,	10,	'senin',	'2020-09-07',	'12.30 s.d 13.30',	'online meeting via zoom',	'ust. fulan',	'bersabar menghadapi pandemi',	'2020-09-10 17:54:56',	'2020-09-10 17:54:56');

DROP TABLE IF EXISTS `kategoritransaksi`;
CREATE TABLE `kategoritransaksi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `kategoritransaksi` (`id`, `kategori`, `created_at`, `updated_at`) VALUES
(1,	'Infaq Umum',	'2020-03-13 16:37:34',	'2020-08-05 19:08:31'),
(2,	'Infaq Jumat',	'2020-03-13 16:37:58',	NULL),
(3,	'Zakat',	'2020-03-13 16:38:37',	NULL),
(4,	'Fasilitas Masjid',	'2020-03-13 16:38:50',	NULL),
(5,	'Kegiatan Masjid',	'2020-03-13 16:39:00',	NULL),
(6,	'Lain-lain',	'2020-03-13 16:39:18',	NULL);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table',	1),
('2014_10_12_100000_create_password_resets_table',	1),
('2020_02_15_085042_create_posts_table',	1),
('2020_02_17_031501_create_categories_table',	1),
('2020_02_17_031741_alter_posts_add_category_id_column',	1),
('2020_02_26_071731_alter_posts_add_published_at_column',	1),
('2020_03_05_024536_create_tags_table',	1),
('2020_03_05_044318_alter_posts_add_view_count_column',	1),
('2020_03_10_044221_create_comments_table',	2),
('2020_03_13_155409_create_kategoritransaksi_table',	3),
('2020_03_13_155450_create_transaksi_table',	3),
('2020_07_16_021554_add_username_to_users_table',	4),
('2020_08_10_030428_create_permission_tables',	4),
('2020_08_12_083237_create_profils_table',	5),
('2020_08_14_050520_create_images_table',	6),
('2020_08_14_044438_create_videos_table',	7),
('2020_08_18_072010_create_imagecategories_table',	8),
('2020_08_17_162848_alter_images_add_category_id_column',	9),
('2020_09_04_043301_create_jadwaljumats_table',	10),
('2020_09_09_132919_create_jadwalkajians_table',	11);

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2,	'App\\User',	1),
(1,	'App\\User',	2),
(3,	'App\\User',	3),
(1,	'App\\User',	5),
(1,	'App\\User',	6),
(1,	'App\\User',	7),
(4,	'App\\User',	8),
(1,	'App\\User',	10),
(2,	'App\\User',	11),
(3,	'App\\User',	12),
(4,	'App\\User',	13),
(1,	'App\\User',	14),
(2,	'App\\User',	16),
(4,	'App\\User',	18);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `published_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `view_count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_author_id_foreign` (`author_id`),
  KEY `posts_category_id_foreign` (`category_id`),
  CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `posts` (`id`, `author_id`, `title`, `slug`, `excerpt`, `body`, `image`, `created_at`, `updated_at`, `category_id`, `published_at`, `view_count`) VALUES
(1,	2,	'Sejarah Nabi Muhammad SAW',	'sejarah-nabi-muhammad-saw',	'Siapa yang tidak mengenal sosok Nabi Muhammad SAW? Pastinya semua orang khususnya umat Islam mengenal nama tersebut. Beliau adalah seorang Nabi akhir zaman dan tidak ada Nabi lagi setelahnya. Oleh karena itu sejarah Nabi Muhammad SAW sangat penting untuk diketahui.',	'# Kelahiran Nabi Muhammad SAW\r\nNabi Muhammad SAW dilahirkan di Kota Makkah. Bayi Muhammad lahir dalam keadaan yatim dari seorang janda bernama Aminah yang ditinggal mati suaminya, Abdullah, saat usia kehamilannya baru memasuki bulan ke-3.\r\n\r\nLahir pada tanggal 12 Rabi’ul Awal bertepatan dengan tanggal 20 April tahun 571 Masehi atau lebih dikenal dengan sebutan tahun Gajah.\r\n\r\nSebutan tahun Gajah muncul karena pada tahun tersebut pasukan tentara menunggangi gajah di bawah pimpinan Abrahah yang berasal dari Abessinia, sebuah kerajaan Nasrani dari Yaman, menyerbu Makkah untuk menghancurkan Ka’bah. Serangan itu gagal atas kehendak Allah SWT. yang mengirimkan pasukan burung ababil.\r\n\r\nNama Nabi Muhammad SAW diberikan oleh sang kakek, Abdul Muththalib, yang kala itu adalah salah seorang yang terpandang di Makkah.\r\n\r\n# Masa Kecil Nabi Muhammad SAW\r\nDalam kisah sejarah Nabi Muhammad SAW, bahwa Nabi Muhammad SAW lahir dari keturunan seorang pahlawan Suku Quraisy yang berasal dari Bani Ismail di pihak ayah dan ibu, dapat dikatakan merupakan golongan bangsawan.\r\n\r\n## 1. Ibu Susuan\r\nSudah menjadi adat kebiasaan pada masa itu, bahwa bayi para bangsawan akan disusukan dan dititipkan kepada wanita badiyah (sebuah dusun di padang pasir). Hal ini dilakukan agar para bayi dapat menghirup udara yang bersih dan terhindar dari penyakit yang ada di kota, serta dapat berbicara secara murni dan fasih.\r\n\r\nHingga usia 5 tahun, Nabi Muhammad SAW diasuh oleh Halimah Sa’diyah, ibu susuannya, sebelum kemudian dikembalikan kepada ibunya, Aminah.\r\n\r\n## 2. Kematian Ibu dan Kakek\r\nMemasuki usia 6 tahun, Nabi Muhammad SAW dibawa oleh ibunya ke Madinah untuk dikenalkan pada keluarga nenek dari pihak ibu dan untuk berziarah ke makam ayahnya. Setelah satu bulan tinggal di Madinah, rombongan ibu dan anak harus berhenti di tempat bernama Abwa’ dalam perjalanan kembali ke Makkah. Aminah meninggal di sana.\r\n\r\nMenjadi yatim piatu, Nabi Muhammad SAW kemudian berada dalam asuhan Abdul Muththalib. Dua tahun mendapatkan curahan kasih sayang dari sang kakek, Abdul Muththalib wafat dalam usia 80 tahun.\r\n\r\n## 3. Dalam Asuhan Sang Paman, Abu Thalib\r\nSesuai dengan wasiat dari Abdul Muththalib, hak asuh Nabi Muhammad SAW diserahkan kepada Abu Thalib. Dalam asuhan pamannya inilah, Nabi Muhammad SAW mendapatkan pelajaran hidup dengan ikut berdagang bersama sang paman dan menggembalakan kambing.\r\n\r\n# Pernikahan dengan Khodijah RA\r\nMemasuki usia dewasa, Nabi Muhammad SAW mulai mencukupi kebutuhannya sendiri dengan berdagang. Barang dagangan yang dibawanya berasal dari Khodijah, seorang janda kaya. Nabi Muhammad SAW membawa barang dagangan ke Syam dengan ditemani oleh salah seorang kepercayaan Khodijah.\r\n\r\nSekembalinya dari Syam dengan keuntungan yang sangat besar, Khadijah jatuh hati pada Nabi Muhammad SAW. Ditambah dengan laporan yang diterimanya, bahwa Nabi Muhammad SAW sama sekali tidak mengatakan satu kebohongan pun akan barang yang dijualnya. Hal yang tidak lazim dilakukan oleh seorang pedagang.\r\n\r\nMaka sejarah Nabi Muhammad SAW mencatat babak baru – Khadijah melamar Nabi Muhammad SAW yang pada saat itu berusia 25 tahun, sementara Khadijah sendiri sudah berusia 40 tahun.\r\n\r\n# Gelar Al-Amin\r\nAl-Amin artinya orang yang dapat dipercaya. Gelar ini disematkan kepada Muhammad yang terkenal memiliki sifat jujur, berbudi luhur, dan kepribadian tinggi. Tidak pernah sekali pun melakukan perbuatan tercela.\r\nSelain itu dalam sejarah Nabi Muhammad SAW dikisahkan sebagai pribadi yang cerdas dan memiliki bakat kepemimpinan yang kuat. Muhammad pernah mendamaikan perselisihan para pemimpin Quraisy yang berebut untuk meletakkan Batu Hitam (Al Hajarul Ashwad) pada saat mereka merenovasi Ka’bah.\r\n\r\nDengan kecerdasannya, Muhammad membentangkan selembar kain dan meletakkan Batu Hitam di atasnya, lalu meminta para pemimpin Quraisy untuk mengangkat tiap ujungnya.\r\n\r\n# Perjalanan Nabi Muhammad SAW setelah diangkat menjadi Rosul\r\nNabi Muhammad SAW diangkat menjadi Rosul pada saat menginjak usia 40 tahun. Pada malam 17 Ramadhan yang bertepatan dengan 6 Agustus 610 Masehi, Muhammad didatangi oleh Jibril saat berdiam diri di Gua Hira, menurunkan wahyu yang pertama, Qur’an Surat Al-‘Alaq ayat 1 – 5.\r\nSetelah peristiwa tersebut, Beliau mulai mengemban tugas sebagai Rosul yang tidak mudah dan melalui beberapa lika-liku dalam perjalanannya. Berikut ini ulasan selangkapnya perjalanan dan lika-liku Nabi Muhammad SAW dalam berdakwah :\r\n\r\n## 1. Dakwah Islam di Makkah\r\nNabi Muhammad SAW tidak serta merta langsung menerima bahwa dirinya telah terpilih sebagai pembawa perubahan, tidak hanya bagi kaumnya namun bagi dunia. Merasa bahwa tugas tersebut terlalu berat. Hingga turun wahyu yang kedua, Qur’an Surat Al-Muddatsir ayat 1 – 7, Nabi Muhammad SAW mengurung diri di dalam rumah.\r\n\r\nDengan dorongan semangat dari sang istri, yang menjadi pemeluk Islam pertama, Nabi Muhammad SAW mulai mensyiarkan ajaran baru yang dibawanya. Dimulai dengan keluarga dan sahabat dekatnya.\r\n\r\nPerlahan namun pasti, satu persatu pemeluk Islam bertambah dan bertambah. Hal ini disebabkan karena akhlak dan budi pekerti Nabi Muhammad SAW yang tidak bercela dan tidak mungkin berkata bohong.\r\n\r\n## 2. Tahun Kesedihan\r\nTiga belas tahun berdakwah menyiarkan Islam di Makkah, bukan tanpa halangan. Mulai dari kehilangan harta, diasingkan, tudingan sebagai orang gila, hingga hujatan diterima dari kaum Quraisy.\r\n\r\nYang paling parah adalah pemboikotan yang dilakukan kepada keluarganya, Bani Hasyim dan Bani Muththalib, baik yang sudah Islam maupun yang memberikan bantuan terhadap usaha Nabi Muhammad SAW.\r\n\r\nBelum kering luka yang diterima akibat pemboikotan terhadap keluarganya, sang paman yang telah mengasuh dan membesarkannya meninggal dunia dalam usia 87 tahun. Tak beselang lama, Khodijah sang istri menyusul.\r\n\r\n## 3. Isra’ dan Mi’raj\r\nDi saat penderitaan akan dakwah Islam tengah berada di puncaknya, turun perintah Allah kepada Nabi Muhammad SAW untuk melakukan perjalanan isra’ dari Makkah ke Baitul Maqdis di Palestina dan mi’raj naik hingga langit ke tujuh sampai Sidratul Muntaha. Di sinilah perintah akan sholat lima waktu disampaikan.\r\n\r\nPeristiwa ini terjadi pada 27 Rajab tahun ke-11 kenabian. Menurut para ahli sejarah Nabi Muhammad SAW, hikmah peristiwa isra’ dan mi’raj ini adalah untuk memperkuat iman dan keyakinan Nabi Muhammad SAW sebagai nabi dan rosul yang menyiarkan agama Islam. Serta bentuk ujian ketaatan bagi kaum Muslim.\r\n\r\n## 4. Berhijrah Ke Madinah\r\nMadinah, yang kala itu bernama Yastrib, adalah tempat yang berjarak 14 hari perjalanan ke sebelah utara Makkah. Di Yastrib, praktik keagamaan lebih mudah diterima dan jumlah pemeluk Islam di sana jauh lebih besar dibandingkan di Makkah.\r\n\r\nIslam tersebar ke Yastrib melalui para jamaah haji yang berkunjung ke Makkah dan meyakini kebenaran dakwah Nabi Muhammad SAW. Melihat perkembangan Islam di Yastrib, perlahan Nabi Muhammad SAW memerintahkan para sahabat untuk berhijrah ke sana.\r\n\r\n## 5. Haji Wada’ dan Wafatnya Muhammad\r\nPerkembangan dakwah Islam mencapai puncaknya setelah masa hijrah. Di bawah kepemimpinan Nabi Muhammad SAW, Madinah berkembang menjadi kota yang beradab dalam segala segi, baik ekonomi, politik, hingga keamanan militer. Para utusan kabilah-kabilah Arab datang untuk menyatakan keislaman.\r\n\r\nTahun ke-10 setelah hijrah, Muhammad bermaksud melakukan Haji dengan diikuti oleh 100.000 kaum muslimin. Pada saat berpidato di bukit ‘Arafah tanggal 9 Dzulhijah tahun 10 Hijrah, turunlah wahyu yang terakhir, Qur’an Surat Al-Maidah Ayat 3 yang berisi tentang kesempurnaan Islam.\r\n\r\nSelesailah sudah tugas Nabi Muhammad SAW di dunia. Peristiwa ini dikenal dengan nama Haji Wada’ (Haji Perpisahan). Sekitar tiga bulan setelahnya, Nabi Muhammad SAW jatuh sakit dan tiga hari kemudian wafat pada tanggal 12 Rabi’ulawal tahun 11 Hijrah dalam usia 63 tahun.\r\n\r\nNabi Muhammad SAW meninggalkan peninggalan yang sangat berharga setelah kepergiannya. Tak hanya Islam, peninggalan Nabi Muhammad SAW lainnya adalah beralihnya bangsa Arab dari kumpulan masyarakat yang bodoh dan tidak beradab menjadi bangsa yang terpandang di dunia.\r\n\r\nSejak diIslamkan oleh Nabi Muhammad SAW, tidak ada lagi penyembahan berhala di tanah Arab. Adab masyarakatnya pun berkembang, alih-alih persengketaan yang berakhir dengan pertumpahan darah, mereka akan mengembalikannya sesuai ajaran Islam dan tuntunan Rosul SAW.\r\n\r\nMental masyarakat pun berubah dengan menyadari pentingnya disiplin dan taat. Dari segi politik, kepemimpinan Nabi Muhammad SAW mewariskan sebuah negara Islam yang memiliki satu pemimpin. Tak ada lagi peperangan dan pertikaian antar suku dan/atau kabilah. Yang adalah persaudaraan sebagai sesama muslim.\r\n\r\nCapaian sejarah Nabi Muhammad SAW ini tak akan pernah bisa dicatat ulang oleh manusia lain. Tak ada manusia lain selain Nabi Muhammad SAW yang berhasil melakukan perubahan adab suatu bangsa hanya dalam kurun waktu 23 tahun saja. Maha Kuasa Allah atas segala kehendak-Nya. ',	'masjid-1.jpg',	'2020-02-19 02:00:00',	'2020-03-05 19:29:50',	4,	'2020-02-19 02:00:00',	0),
(2,	1,	'Hadits Arbain 01 tentang Niat',	'hadits-arbain-01-tentang-niat',	'Dari Amirul Mukminin, Abu Hafsh ‘Umar bin Al-Khattab radhiyallahu ‘anhu, ia berkata bahwa ia mendengar Rasulullah shallallahu ‘alaihi wa sallam bersabda,\r\n\r\nإنَّمَا الأعمَال بالنِّيَّاتِ وإِنَّما لِكُلِّ امريءٍ ما نَوَى فَمَنْ كَانَتْ هِجْرَتُهُ إلى اللهِ ورَسُولِهِ فهِجْرَتُهُ إلى اللهِ ورَسُوْلِهِ ومَنْ كَانَتْ هِجْرَتُهُ لِدُنْيَا يُصِيْبُها أو امرأةٍ يَنْكِحُهَا فهِجْرَتُهُ إلى ما هَاجَرَ إليهِ\r\n\r\n“Sesungguhnya setiap amalan tergantung pada niatnya. Setiap orang akan mendapatkan apa yang ia niatkan. Siapa yang hijrahnya karena Allah dan Rasul-Nya, maka hijrahnya untuk Allah dan Rasul-Nya. Siapa yang hijrahnya karena mencari dunia atau karena wanita yang dinikahinya, maka hijrahnya kepada yang ia tuju.” (HR. Bukhari dan Muslim) [HR. Bukhari, no. 1 dan Muslim, no. 1907]',	'Dari Amirul Mukminin, Abu Hafsh ‘Umar bin Al-Khattab radhiyallahu ‘anhu, ia berkata bahwa ia mendengar Rasulullah shallallahu ‘alaihi wa sallam bersabda,\r\n\r\nإنَّمَا الأعمَال بالنِّيَّاتِ وإِنَّما لِكُلِّ امريءٍ ما نَوَى فَمَنْ كَانَتْ هِجْرَتُهُ إلى اللهِ ورَسُولِهِ فهِجْرَتُهُ إلى اللهِ ورَسُوْلِهِ ومَنْ كَانَتْ هِجْرَتُهُ لِدُنْيَا يُصِيْبُها أو امرأةٍ يَنْكِحُهَا فهِجْرَتُهُ إلى ما هَاجَرَ إليهِ\r\n\r\n“Sesungguhnya setiap amalan tergantung pada niatnya. Setiap orang akan mendapatkan apa yang ia niatkan. Siapa yang hijrahnya karena Allah dan Rasul-Nya, maka hijrahnya untuk Allah dan Rasul-Nya. Siapa yang hijrahnya karena mencari dunia atau karena wanita yang dinikahinya, maka hijrahnya kepada yang ia tuju.” (HR. Bukhari dan Muslim) [HR. Bukhari, no. 1 dan Muslim, no. 1907]\r\n\r\n \r\nPenjelasan\r\n\r\nHadits ini menjelaskan bahwa setiap amalan benar-benar tergantung pada niat. Dan setiap orang akan mendapatkan balasan dari apa yang ia niatkan. Balasannya sangat mulia ketika seseorang berniat ikhlas karena Allah, berbeda dengan seseorang yang berniat beramal hanya karena mengejar dunia seperti karena mengejar wanita. Dalam hadits disebutkan contoh amalannya yaitu hijrah, ada yang berhijrah karena Allah dan ada yang berhijrah karena mengejar dunia.\r\n\r\nNiat secara bahasa berarti al-qashd (keinginan). Sedangkan niat secara istilah syar’i, yang dimaksud adalah berazam (bertedak) mengerjakan suatu ibadah ikhlas karena Allah, letak niat dalam batin (hati).\r\n\r\nKalimat “Sesungguhnya setiap amalan tergantung pada niatnya”, ini dilihat dari sudut pandang al-manwi, yaitu amalan. Sedangkan kalimat “Setiap orang akan mendapatkan apa yang ia niatkan”, ini dilihat dari sudut pandang al-manwi lahu, yaitu kepada siapakah amalan tersebut ditujukan, ikhlas lillah ataukah ditujukan kepada selainnya.\r\n\r\n \r\nFaedah Hadits\r\n\r\n1- Dalam Jami’ Al-‘Ulum wa Al-Hikam (1:61) Hadits ini dikatakan oleh Imam Ahmad sebagai salah satu hadits pokok dalam agama kita (disebut ushul al-islam). Imam Ibnu Daqiq Al-‘Ied dalam syarhnya (hlm. 27) menyatakan bahwa Imam Syafi’i mengatakan kalau hadits ini bisa masuk dalam 70 bab fikih. Ulama lainnya menyatakan bahwa hadits ini sebagai tsulutsul Islam (sepertiganya Islam).\r\n\r\n2- Tidak mungkin suatu amalan itu ada kecuali sudah didahului niat. Adapun jika ada amalan yang tanpa niat, maka tidak disebut amalan seperti amalan dari orang yang tertidur dan gila. Sedangkan orang yang berakal tidaklah demikian, setiap beramal pasti sudah memiliki niat. Para ulama mengatakan, “Seandainya Allah membebani suatu amalan tanpa niat, maka itu sama halnya membebani sesuatu yang tidak dimampui.”\r\n\r\n3- “Setiap orang akan mendapatkan apa yang ia niatkan”, maksud hadits ini adalah setiap orang akan memperoleh pahala yang ia niatkan.\r\n\r\nCoba perhatikan dua hadits berikut ini.\r\n\r\nDari Abu Yazid Ma’an bin Yazid bin Al Akhnas radhiyallahu ‘anhum, -ia, ayah dan kakeknya termasuk sahabat Nabi shallallahu ‘alaihi wa sallam-, di mana Ma’an berkata bahwa ayahnya yaitu Yazid pernah mengeluarkan beberapa dinar untuk niatan sedekah. Ayahnya meletakkan uang tersebut di sisi seseorang yang ada di masjid (maksudnya: ayahnya mewakilkan sedekah tadi para orang yang ada di masjid, -pen). Lantas Ma’an pun mengambil uang tadi, lalu ia menemui ayahnya dengan membawa uang dinar tersebut. Kemudian ayah Ma’an (Yazid) berkata, “Sedekah itu sebenarnya bukan kutujukan padamu.” Ma’an pun mengadukan masalah tersebut kepada Rasulullah shallallahu ‘alaihi wa sallam. Lalu beliau shallallahu ‘alaihi wa sallam bersabda,\r\n\r\nلَكَ مَا نَوَيْتَ يَا يَزِيدُ ، وَلَكَ مَا أَخَذْتَ يَا مَعْنُ\r\n\r\n“Engkau dapati apa yang engkau niatkan wahai Yazid. Sedangkan, wahai Ma’an, engkau boleh mengambil apa yang engkau dapati.” (HR. Bukhari, no. 1422).\r\n\r\nHadits di atas menunjukkan bahwa Setiap orang akan diganjar sesuai yang ia niatkan walaupun realita yang terjadi ternyata menyelisihi yang ia maksudkan. Termasuk dalam sedekah, meskipun yang menerima sedekah adalah bukan orang yang berhak.\r\n\r\nHadits kedua, ‘Aisyah radhiyallahu ‘anha berkata bahwa Rasulullah shallallahu ‘alaihi wa sallam bersabda,\r\n\r\n« يَغْزُو جَيْشٌ الْكَعْبَةَ ، فَإِذَا كَانُوا بِبَيْدَاءَ مِنَ الأَرْضِ يُخْسَفُ بِأَوَّلِهِمْ وَآخِرِهِمْ » . قَالَتْ قُلْتُ يَا رَسُولَ اللَّهِ كَيْفَ يُخْسَفُ بِأَوَّلِهِمْ وَآخِرِهِمْ ، وَفِيهِمْ أَسْوَاقُهُمْ وَمَنْ لَيْسَ مِنْهُمْ . قَالَ « يُخْسَفُ بِأَوَّلِهِمْ وَآخِرِهِمْ ، ثُمَّ يُبْعَثُونَ عَلَى نِيَّاتِهِمْ »\r\n\r\n“Akan ada satu kelompok pasukan yang hendak menyerang Ka’bah, kemudian setelah mereka berada di suatu tanah lapang, mereka semuanya dibenamkan ke dalam perut bumi dari orang yang pertama hingga orang yang terakhir.” ‘Aisyah berkata, saya pun bertanya, “Wahai Rasulullah, bagaimanakah semuanya dibenamkan dari yang pertama sampai yang terakhir, sedangkan di tengah-tengah mereka terdapat para pedagang serta orang-orang yang bukan termasuk golongan mereka (yakni tidak berniat ikut menyerang Ka’bah)?” Rasulullah shallallahu ‘alaihi wa sallam menjawab, “Mereka semuanya akan dibenamkan dari yang pertama sampai yang terakhir, kemudian nantinya mereka akan dibangkitkan sesuai dengan niat mereka.” (HR. Bukhari, no. 2118 dan Muslim, no. 2884, dengan lafal dari Bukhari).\r\n\r\n4- Niat itu berarti bermaksud dan berkehendak. Letak niat adalah di dalam hati. Ibnu Taimiyah rahimahullah mengatakan,\r\n\r\nوَالنِّيَّةُ مَحَلُّهَا الْقَلْبُ بِاتِّفَاقِ الْعُلَمَاءِ ؛ فَإِنْ نَوَى بِقَلْبِهِ وَلَمْ يَتَكَلَّمْ بِلِسَانِهِ أَجْزَأَتْهُ النِّيَّةُ بِاتِّفَاقِهِمْ\r\n\r\n“Niat itu letaknya di hati berdasarkan kesepakatan ulama. Jika seseorang berniat di hatinya tanpa ia lafazhkan dengan lisannya, maka niatnya sudah dianggap sah berdasarkan kesepakatan para ulama.” (Majmu’ah Al-Fatawa, 18:262)\r\n\r\nSyaikhul Islam Ibnu Taimiyah rahimahullah menjelaskan, “Siapa saja yang menginginkan melakukan sesuatu, maka secara pasti ia telah berniat. Semisal di hadapannya disodorkan makanan, lalu ia punya keinginan untuk menyantapnya, maka ketika itu pasti ia telah berniat. Demikian ketika ia ingin berkendaraan atau melakukan perbuatan lainnya. Bahkan jika seseorang dibebani suatu amalan lantas dikatakan tidak berniat, maka sungguh ini adalah pembebanan yang mustahil dilakukan. Karena setiap orang yang hendak melakukan suatu amalan yang disyariatkan atau tidak disyariatkan pasti ilmunya telah mendahuluinya dalam hatinya, inilah yang namanya niat.” (Majmu’ah Al-Fatawa, 18:262)\r\n\r\n5- Niat ada dua macam: (1) niat pada siapakah ditujukan amalan tersebut (al-ma’mul lahu), (2) niat amalan.\r\n\r\nNiat jenis pertama adalah niat yang ditujukan untuk mengharap wajah Allah dan kehidupan akhirat. Inilah yang dimaksud dengan niat yang ikhlas.\r\n\r\nSedangkan niat amalan itu ada dua fungsi:\r\n\r\nFungsi pertama adalah untuk membedakan manakah adat (kebiasaan), manakah ibadah. Misalnya adalah puasa. Puasa berarti meninggalkan makan, minum dan pembatal lainnya. Namun terkadang seseorang meninggalkan makan dan minum karena kebiasaan, tanpa ada niat mendekatkan diri pada Allah. Terkadang pula maksudnya adalah ibadah. Oleh karena itu, kedua hal ini perlu dibedakan dengan niat.\r\n\r\nFungsi kedua adalah untuk membedakan satu ibadah dan ibadah lainnya. Ada ibadah yang hukumnya fardhu ‘ain, ada yang fardhu kifayah, ada yang termasuk rawatib, ada yang niatnya witir, ada yang niatnya sekedar shalat sunnah saja (shalat sunnah mutlak). Semuanya ini dibedakan dengan niat.\r\n\r\n6- Hijrah itu berarti meninggalkan. Secara istilah, hijrah adalah berpindah dari negeri kafir ke negeri Islam. Hijrah itu hukumnya wajib bagi muslim ketika ia tidak mampu menampakkan lagi syiar agamanya di negeri kafir. Hijrah juga bisa berarti berpindah dari maksiat kepada ketaatan.\r\n\r\n7- Dalam beramal butuh niat ikhlas. Karena dalam hadits disebutkan amalan hijrah yang ikhlas dan amalan hijrah yang tujuannya untuk mengejar dunia. Hijrah pertama terpuji, hijrah kedua tercela.\r\n\r\nIbnu Mas’ud menceritakan bahwa ada seseorang yang ingin melamar seorang wanita. Wanita itu bernama Ummu Qais. Wanita itu enggan untuk menikah dengan pria tersebut, sampai laki-laki itu berhijrah dan akhirnya menikahi Ummu Qais. Maka orang-orang pun menyebutnya Muhajir Ummu Qais. Lantas Ibnu Mas’ud mengatakan, “Siapa yang berhijrah karena sesuatu, fahuwa lahu (maka ia akan mendapatkannya, pen.).” (Jami’ Al-‘Ulum wa Al-Hikam, 1:74-75. Perawinya tsiqah sebagaimana disebutkan dalam Tharh At-Tatsrib, 2:25. Namun Ibnu Rajab tidak menyetujui kalau cerita Ummu Qais jadi landasan asal cerita dari hadits innamal a’malu bin niyyat yang dibahas). Namun tentu hijrah bukan karena lillah, cari ridha-Nya, maka tidak dibalas oleh Allah.\r\n\r\nAmalan lainnya sama dengan hijrah, benar dan rusaknya amal tersebut tergantung pada niat. Demikian kata Ibnu Rajab dalam Jami’ Al-‘Ulum wa Al-Hikam, 1:75.\r\n\r\nAnas bin Malik radhiyallahu ‘anhu berkata,\r\n\r\nمَنْ طَلَبَ الْعِلْمَ لِيُجَارِىَ بِهِ الْعُلَمَاءَ أَوْ لِيُمَارِىَ بِهِ السُّفَهَاءَ أَوْ يَصْرِفَ بِهِ وُجُوهَ النَّاسِ إِلَيْهِ أَدْخَلَهُ اللَّهُ النَّارَ\r\n\r\n“Barangsiapa menuntut ilmu hanya ingin digelari ulama, untuk berdebat dengan orang bodoh, supaya dipandang manusia, Allah akan memasukkannya dalam neraka.” (HR. Tirmidzi, no. 2654 dan Ibnu Majah, no. 253. Syaikh Al-Albani mengatakan bahwa hadits ini hasan.)\r\n\r\nDari Abu Sa’id Al-Khudri radhiyallahu ‘anhu, di mana ia berkata,\r\n\r\nخَرَجَ عَلَيْنَا رَسُولُ اللَّهِ -صلى الله عليه وسلم- وَنَحْنُ نَتَذَاكَرُ الْمَسِيحَ الدَّجَّالَ فَقَالَ « أَلاَ أُخْبِرُكُمْ بِمَا هُوَ أَخْوَفُ عَلَيْكُمْ عِنْدِى مِنَ الْمَسِيحِ الدَّجَّالِ ». قَالَ قُلْنَا بَلَى. فَقَالَ « الشِّرْكُ الْخَفِىُّ أَنْ يَقُومَ الرَّجُلُ يُصَلِّى فَيُزَيِّنُ صَلاَتَهُ لِمَا يَرَى مِنْ نَظَرِ رَجُلٍ »\r\n\r\n“Rasulullah shallallahu ‘alaihi wa sallam pernah keluar menemui kami dan kami sedang mengingatkan akan (bahaya) Al-Masih Ad Dajjal. Lantas beliau bersabda, “Maukah kukabarkan pada kalian apa yang lebih samar bagi kalian menurutku dibanding dari fitnah Al-Masih Ad-Dajjal?” “Iya”, para sahabat berujar demikian kata Abu Sa’id l- Khudri. Beliau pun bersabda, “Syirik khafi (syirik yang samar) di mana seseorang shalat lalu ia perbagus shalatnya agar dilihat orang lain.” (HR. Ibnu Majah, no. 4204. Al-Hafiz Abu Thahir mengatakan bahwa hadits ini hasan.)\r\n\r\n \r\nBagaimana jika amalan tercampur riya’?\r\n\r\n    Jika riya’ ada dalam semua ibadah, riya’ seperti ini hanya ditemukan pada orang munafik dan orang kafir.\r\n    Jika ibadah dari awalnya tidak ikhlas, maka ibadahnya tidak sah dan tidak diterima.\r\n    Niat awal dalam ibadahnya ikhlas, namun di pertengahan ia tujukan ibadahnya pada makhluk, maka pada saat ini ibadahnya juga batal.\r\n    Niat awal dalam ibadahnya ikhlas, namun di pertengahan ia tambahkan dari amalan awalnya tadi kepada selain Allah –misalnya dengan ia perpanjang bacaan qur’annya dari biasanya karena ada temannya-, maka tambahannya ini yang dinilai batal. Namun niat awalnya tetap ada dan tidak batal. Inilah amalan yang tercampur riya.\r\n    Jika niat awalnya sudah ikhas, namun setelah ia lakukan ibadah muncul pujian dari orang lain tanpa ia cari-cari, maka ini adalah berita gembira berupa kebaikan yang disegerakan bagi orang beriman (tilka ‘aajil busyra lil mu’min, HR. Muslim, no. 2642 dari Abu Dzar radhiyallahu ‘anhu) (Lihat Syarh Al-Arba’in An-Nawawiyah karya Syaikh Shalih Alu Syaikh hlm. 25-27.)\r\n\r\n8- Manusia diganjar bertingkat-tingkat sesuai dengan tingkatan niatnya. Ada yang sama-sama shalat, namun ganjarannya jauh berbeda. Ada yang sama-sama sedekah, namun pahalanya jauh berbeda karena dilihat dari niatnya. Makanya Nabi shallallahu ‘alaihi wa sallam menyatakan tentang para sahabat yang hidup bersamanya,\r\n\r\nلاَ تَسُبُّوا أَصْحَابِى ، فَلَوْ أَنَّ أَحَدَكُمْ أَنْفَقَ مِثْلَ أُحُدٍ ذَهَبًا مَا بَلَغَ مُدَّ أَحَدِهِمْ وَلاَ نَصِيفَهُ\r\n\r\n“Janganlah kalian mencela sahabatku. Seandainya salah seorang di antara kalian menginfakkan emas semisal gunung Uhud, maka itu tidak bisa menandingi satu mud infak sahabat, bahkan tidak pula separuhnya.” (HR. Bukhari, no. 3673 dan Muslim, no. 2540)\r\n\r\nSebagian ulama menyatakan, “Niat itu bertingkat-tingkat. Bertingkat-tingkatnya ganjaran dilihat dari niatnya, bukan dilihat dari puasa atau shalatnya.” (Jami’ Al-‘Ulum wa Al-Hikam, 1:72)\r\n\r\n9- Orang yang berniat melakukan amalan shalih namun terhalang melakukannya bisa dibagi menjadi dua:\r\n\r\na- Amalan yang dilakukan sudah menjadi kebiasaan atau rutinitas (rajin untuk dijaga). Lalu amalan ini ditinggalkan karena ada uzur, maka orang seperti ini dicatat mendapat pahala amalan tersebut secara sempurna. Sebagaimana Nabi shallallahu ‘alaihi wa sallam bersabda,\r\n\r\nإِذَا مَرِضَ الْعَبْدُ أَوْ سَافَرَ ، كُتِبَ لَهُ مِثْلُ مَا كَانَ يَعْمَلُ مُقِيمًا صَحِيحًا\r\n\r\n“Jika salah seorang sakit atau bersafar, maka ia dicatat mendapat pahala seperti ketika ia dalam keadaan mukim (tidak bersafar) atau ketika sehat.” (HR. Bukhari,no. 2996).\r\n\r\nJuga kesimpulan dari hadits berikut.\r\n\r\nDari Jabir, ia berkata, dalam suatu peperangan (perang tabuk) kami pernah bersama Nabi shallallahu ‘alaihi wa sallam, lalu beliau bersabda, “Sesungguhnya di Madinah ada beberapa orang yang tidak ikut melakukan perjalanan perang, juga tidak menyeberangi suatu lembah, namun mereka bersama kalian (dalam pahala). Padahal mereka tidak ikut berperang karena kedapatan uzur sakit.” (HR. Muslim, no. 1911).\r\n\r\nDalam lafazh lain disebutkan,\r\n\r\nإِلاَّ شَرِكُوكُمْ فِى الأَجْرِ\r\n\r\n“Melainkan mereka yang terhalang sakit akan dicatat ikut serta bersama kalian dalam pahala.”\r\n\r\nJuga ada hadits,\r\n\r\nعَنْ أَنَسٍ – رضى الله عنه – أَنَّ النَّبِىَّ – صلى الله عليه وسلم – كَانَ فِى غَزَاةٍ فَقَالَ « إِنَّ أَقْوَامًا بِالْمَدِينَةِ خَلْفَنَا ، مَا سَلَكْنَا شِعْبًا وَلاَ وَادِيًا إِلاَّ وَهُمْ مَعَنَا فِيهِ ، حَبَسَهُمُ الْعُذْرُ »\r\n\r\nDari Anas radhiyallahu ‘anhu, bahwa Nabi shallallahu ‘alaihi wa sallam dalam suatu peperangan berkata, “Sesungguhnya ada beberapa orang di Madinah yang ditinggalkan tidak ikut peperangan. Namun mereka bersama kita ketika melewati suatu lereng dan lembah. Padahal mereka terhalang uzur sakit ketika itu.” (HR. Bukhari, no. 2839).\r\n\r\nContoh dalam hal ini adalah orang yang sudah punya kebiasaan shalat jama’ah di masjid akan tetapi ia memiliki uzur atau halangan seperti karena tertidur atau sakit, maka ia dicatat mendapatkan pahala shalat berjama’ah secara sempurna dan tidak berkurang.\r\n\r\nb- Jika amalan tersebut bukan menjadi kebiasaan, maka jika sudah berniat mengamalkannya namun terhalang, akan diperoleh pahala niatnya (saja). Dalilnya adalah seperti hadits yang kita bahas kali ini. Begitu pula hadits  mengenai seseorang yang  diberikan harta lantas ia gunakan dalam hal kebaikan, di mana ada seorang miskin yang berkeinginan yang sama jika ia diberi harta. Orang miskin ini berkata bahwa jika ia diberi harta seperti si fulan, maka ia akan beramal baik semisal dia. Maka Nabi shallallahu ‘alaihi wa sallam bersabda,\r\n\r\nفَهُوَ بِنِيَّتِهِ فَأَجْرُهُمَا سَوَاءٌ\r\n\r\n“Ia sesuai niatannya dan akan sama dalam pahala niatnya.” (HR. Tirmidzi no. 2325. Syaikh Al Albani mengatakan bahwa hadits ini shahih).  (Lihat pembahasan Syaikh Muhammad bin Sholih Al-‘Utsaimin dalam Syarh Riyadh Ash-Shalihin, 1:36-37).\r\n\r\n \r\nTidak Cukup Niat Ikhlas, Namun Juga Harus Ittiba’\r\n\r\nFudhail bin ‘Iyadh rahimahullah mengatakan,\r\n\r\nإن العمل إذا كان خالصا ولم يكن صوابا لم يقبل وإذا كان صوابا ولم يكن خالصا لم يقبل حتى يكون خالصا وصوابا فالخالص أن يكون لله والصواب أن يكون على السنة\r\n\r\nYang namanya amalan jika niatannya ikhlas namun tidak benar, maka tidak diterima. Sama halnya jika amalan tersebut benar namun tidak ikhlas, juga tidak diterima. Amalan tersebut barulah diterima jika ikhlas dan benar. Yang namanya ikhlas, berarti niatannya untuk menggapai ridha Allah saja. Sedangkan disebut benar jika sesuai dengan petunjuk Rasul shallallahu ‘alaihi wa sallam. (Jami’ Al-‘Ulum wa Al-Hikam, 1:72)\r\n\r\n \r\nKaedah Menggabungkan Niat Ibadah\r\n\r\nDalam kitab Qawa’id Muhimmah wa Fawaid Jammah, Syaikh As-Sa’di rahimahullah mengatakan dalam kaedah ketujuh:\r\n\r\nJika ada dua ibadah yang (1) jenisnya sama, (2) cara pengerjaannya sama, maka sudah mencukupi bila hanya mengerjakan salah satunya.\r\n\r\nKasus ini ada dua macam:\r\n\r\nPertama:\r\n\r\nCukup mengerjakan salah satu dari dua macam ibadah tadi dan menurut pendapat yang masyhur dalam madzhab Hambali disyaratkan meniatkan keduanya bersama-sama.\r\n\r\nContoh:\r\n\r\n– Siapa yang memiliki hadats besar dan kecil sekaligus, dalam madzhab Hambali cukup bersuci hadats besar saja untuk mensucikan kedua hadats tersebut.\r\n\r\n– Jama’ah haji yang mengambil manasik qiran yang berniat haji dan umrah sekaligus, cukup baginya mengerjakan satu thawaf dan satu sa’i. Demikian menurut pendapat yang masyhur dalam madzhab Hambali.\r\n\r\nKedua:\r\n\r\nCukup dengan mengerjakan satu ibadah, maka ibadah yang lain gugur (tanpa diniatkan).\r\n\r\nContoh:\r\n\r\n– Jika seseorang masuk masjid saat iqamah sudah dikumandangkan, maka gugur baginya tahiyyatul masjid jika ia mengerjakan shalat jama’ah.\r\n\r\n– Jika orang yang berumrah masuk Makkah, maka ia langsung melaksanakan thawaf umrah dan gugur baginya thawaf qudum.\r\n\r\n– Jika seseorang mendapati imam sedang ruku’, lalu ia bertakbir untuk takbiratul ihram dan ia gugur takbir ruku’ menurut pendapat yang masyhur dalam madzhab Hambali.\r\n\r\n– Jika Idul Adha bertepatan dengan hari Jum’at, maka cukup menghadiri salah satunya.\r\n\r\nAda penjelasan yang bagus dari Syaikh Prof. Dr. ‘Abdussalam Asy-Syuwai’ir (Dosen di Ma’had ‘Ali lil Qadha’ Riyadh KSA) hafizahullah, ketika menjelaskan kaedah Syaikh As-Sa’di di atas, beliau simpulkan kaedah sebagai berikut:\r\n\r\nJika ada dua ibadah, keduanya sama dalam (1) jenis dan (2) tata cara pelaksanaan, maka asalnya keduanya bisa cukup dengan satu niat KECUALI pada dua keadaan:\r\n\r\n1- Ibadah yang bisa diqadha’ (memiliki qadha’). Contoh: Shalat Zhuhur dan shalat Ashar sama-sama shalat wajib dan jumlah raka’atnya empat, tidak bisa dengan satu shalat saja lalu mencukupi yang lain. Sedangkan, aqiqah dan qurban bisa cukup dengan satu niat karena keduanya tidak ada kewajiban qadha’, menurut jumhur ulama keduanya adalah sunnah.\r\n\r\n2- Ia mengikuti ibadah yang lainnya. Contoh: Puasa Syawal dan puasa sunnah yang lain yang sama-sama sunnah. Keduanya tidak bisa cukup dengan satu niat untuk kedua ibadah karena puasa Syawal adalah ikutan dari puasa Ramadhan (ikutan dari ibadah yang lain). Karena dalam hadits disebutkan, “Barangsiapa berpuasa Ramadhan kemudian ia ikutkan dengan puasa enam hari di bulan Syawal ….” Adapun shalat rawatib dan shalat sunnah tahiyatul masjid, keduanya bisa cukup dengan satu niat karena shalat tahiyatul masjid tidak ada kaitan dengan shalat yang lain.\r\n\r\nSyaikh ‘Abdussalam Asy-Syuwai’ir juga menyampaikan bahwa ulama Hanafiyah membawa kaidah:\r\n\r\nJika suatu ibadah yang dimaksudkan adalah zatnya, maka ia tidak bisa masuk dalam ibadah lainnya, ia mesti dikerjakan untuk maksud itu. Namun jika suatu ibadah yang dimaksudkan adalah yang penting ibadah itu dilaksanakan, bukan secara zat yang dimaksud, maka ia bisa dimaksudkan dalam ibadah lainnya.\r\n\r\nContoh:\r\n\r\nShalat rawatib dan tahiyyatul masjid. Shalat tahiyyatul masjid bisa dimasukkan di dalam shalat rawatib. Cukup dengan niatan shalat rawatib, maka shalat tahiyyatul masjid sudah termasuk. Karena perintah untuk shalat tahiyyatul masjid yang penting ibadah itu dilaksanakan, yaitu ketika masuk masjid sebelum duduk, lakukanlah shalat sunnah dua raka’at. Jika kita masuk masjid dengan niatan langsung shalat rawatib, berarti telah melaksanakan maksud tersebut.\r\n\r\n \r\nReferensi:\r\n\r\n    Al-Qawa’id Al-Fiqhiyyah. Cetakan Tahun 1420 H. Syaikh ‘Abdurrahman bin Nashir As-Sa’di. Penerbit Dar Al-Haramain.\r\n    At-Ta’liqat ‘ala ‘Umdah Al-Ahkam. Cetakan pertama, Tahun 1431 H. Syaikh ‘Abdurrahman bin Nashir As-Sa’di. Penerbit Dar ‘Alam Al-Fawaid.\r\n    Jami’ Al-‘Ulum wa Al-Hikam. Cetakan kesepuluh, Tahun 1432 H. Ibnu Rajab Al-Hambali. Penerbit Muassasah Ar-Risalah.\r\n    Majmu’ah Al-Fatawa. Cetakan keempat, Tahun 1432 H. Syaikhul Islam Ahmad bin Taimiyah Al-Harrani. Penerbit Dar Al-Wafa’.\r\n    Syarh Al-Arba’in An-Nawawiyah fi Al-Ahadits Ash-Shahihah An-Nabawiyyah. Cetakan kedua, Tahun 1423 H. Al-Imam Ibnu Daqiq Al-‘Ied. Penerbit Dar Ibnu Hazm.\r\n    Syarh Al-Arba’in An-Nawawiyah. Cetakan ketiga, Tahun 1425 H. Syaikh Muhammad bin Shalih Al-‘Utsaimin. Penerbit Dar Ats-Tsuraya.\r\n    Syarh Al-Arba’in An-Nawawiyah. Cetakan kedua, Tahun 1433 H. Syaikh Shalih bin ‘Abdul ‘Aziz bin Muhammad bin Ibrahim Alu Syaikh. Penerbit Dar Al-‘Ashimah.\r\nReferensi:\r\nhttps://rumaysho.com/16311-hadits-arbain-01-setiap-amalan-tergantung-pada-niat.html\r\n',	'hikayat1.jpg',	'2020-02-20 02:00:00',	'2020-03-05 19:08:10',	5,	'2020-02-20 02:00:00',	0),
(3,	2,	'Semangat Sedekah Umar bin Khattab',	'semangat-sedekah-umar-bin-khattab',	'Sahabat, Allah dan Rasulullah sangat menganjurkan umat Islam untuk melakukan amal sedekah, karena manfaat itu tidak hanya dirasakan oleh penerima tapi juga diri kita sendiri. Tapi terkadang untuk sedekah masih terasa berat, berikut ini kisah keteladanan dalam bersedekah yang menggugah hati.',	'Sahabat, Allah dan Rasulullah sangat menganjurkan umat Islam untuk melakukan amal sedekah, karena manfaat itu tidak hanya dirasakan oleh penerima tapi juga diri kita sendiri. Tapi terkadang untuk sedekah masih terasa berat, berikut ini kisah keteladanan dalam bersedekah yang menggugah hati.\r\n\r\nUmar bin Khattab menjelaskan, “Suatu hari Rasulullah Shalallahu alaihi wasallam memerintahkan kami untuk berinfak dan aku tunaikan perintahnya. Aku berkata, ‘Hari ini aku mendahului Abu Bakar Ash- Shiddiq.’ kemudian aku datang kepada Rasulullah Shalallahu alaihi wasallam dengan membawa setengah hartaku sebagai sedekah. Rasulullah Shalallahu alaihi wasallam bersabda ‘Apa yang kamu sisakan untuk keluargamu?’ Aku menjawab ‘Setengahnya.’ Kemudian Abu Bakr datang membawa seluruh hartanya sebagai sedekah. Rasulullah bertanya kepadanya ‘Apa yang kamu sisakan untuk keluargamu?’ ia menjawab ‘Aku sisakan Allah Subhanahu wa ta’ala dan RasulNya.’ Kemudian aku berkata ‘Aku tidak mampu melampauimu selamanya” (HR. At-Tirmidzi)\r\n\r\nDalam kisah lain, diceritakan oleh A’masy dari sahabat Umar bin Khattab radhiallahu anhu. Beliau berkata “Suatu saat aku di samping Umar bin Khattab, beliau membawa 20.000 dirham dan tidak beranjak dari majelisnya hingga membagikannya. Jika ada harta beliau yang ia senangi maka disedekahkan. Dan beliau banyak bersedekah pula. Saat ditanyakan hal itu kepadanya beliau menjawab ‘Aku menyukainya, dan Allah berfirman dalam surah Al Imran ayat 92\r\n\r\n “Kamu sekali-kali tidak sampai kepada kebajikan (yang sempurna), sebelum kamu menafkahkan sehahagian harta yang kamu cintai. Dan apa saja yang kamu nafkahkan maka sesungguhnya Allah mengetahuinya.”\r\n\r\nMasyaAllah itu hanya sebagian sedekah Umar bin Khattab masih banyak sedekah Umar bin Khattab yang bisa kita teladani. Begitu dahsyatnya cinta Umar kepada Allah sampai-sampai ia rela menyedekahkan harta yang ia cintai.\r\n\r\nSumber buku : Fikih Zakat Kontemporer',	'dirham.jpg',	'2020-02-21 02:00:00',	'2020-03-05 19:13:19',	4,	'2020-02-21 02:00:00',	0),
(4,	1,	'Resume Ceramah Tentang Alquran oleh Ust Adi Hidayat',	'resume-ceramah-tentang-alquran-oleh-ust-adi-hidayat',	'Ustadz Adi mengemukakan peranan krusial Al-Quran dalam kehidupan seorang muslim. “Al-Quran adalah pedoman kehidupan bagi setiap muslim. Jika Al-Quran sudah hadir dalam jiwanya, maka akan menjadi pedoman bagi dirinya, cek surah Al-Baqarah: 185,” jelasnya.',	'Ustadz Adi mengemukakan peranan krusial Al-Quran dalam kehidupan seorang muslim. “Al-Quran adalah pedoman kehidupan bagi setiap muslim. Jika Al-Quran sudah hadir dalam jiwanya, maka akan menjadi pedoman bagi dirinya, cek surah Al-Baqarah: 185,” jelasnya.\r\n\r\nDia melanjutkan, tujuan Allah menurunkan Al-Quran pertama kali bukan sebatas bacaan atau kajian, tapi petunjuk kehidupan yang menjangkau seluruh umat manusia tanpa kecuali. “Artinya, kalau Anda mau mengambil petunjuk Quran, jangankan yang beriman, yang tak beriman pun dapat mengambil manfaat dari itu. Apalagi yang beriman,” katanya.\r\n\r\nKarenanya, lanjut Ustadz Adi, para sahabat menerapkan ayat-ayat Al-Quran dalam keseharian mereka. Ia mencontohkan kesuksesan Abdurrahman bin Auf, Utsman bin Affan, Umar bin Khattab, dan lainnya yang ketika akan memulai aktivitas sehari-hari, selalu diawali dengan ayat Al Quran. Ia pun mengutip salah satu penelitian Barat, bahwa orang yang sering berinteraksi dengan Al-Quran terutama para penghafal, kecerdasannya meningkat minimal 3 kali lipat.',	'adi-696x398-1.jpeg',	'2020-02-22 02:00:00',	'2020-03-05 18:58:45',	2,	'2020-02-22 02:00:00',	0),
(5,	1,	'Keteladanan Imam Hasan Al Bashri Dalam Berdakwah ',	'keteladanan-imam-hasan-al-bashri-dalam-berdakwah',	'Hasan Al Bashri adalah seorang pemimpin di kalangan Tabi’in. Ia sangat cerdas, ilmunya pun luas, rendah hati, zuhud dan wara’, dan tutur katanya sangat santun nan indah.',	'Hasan Al Bashri adalah seorang pemimpin di kalangan Tabi’in. Ia sangat cerdas, ilmunya pun luas, rendah hati, zuhud dan wara’, dan tutur katanya sangat santun nan indah.\r\n\r\nIa dilahirkan dua tahun menjelang wafarnya khalifah Umar bin Khattab radhuallahu ‘anhu. Ayahnya bernama Yasar, merupakan budak Zaid bin Tsabit yang dimerdekakan, dan ibunya bernama khairah budak yang dimerdekakan oleh Ummul Mukminin Ummu Salamah radhiallahu ‘anhu.\r\n\r\nSatu hari ada seorang mendatangi Imam Hasan Al Bashri dan berkata “ Wahai Imam, tolonglah engkau berkhutbah mengenai anjutan membebaskan budak”\r\n\r\nIa berkata “insyaAllah akan aku lakukan.”\r\n\r\nKetika hari Jumat tibaia naik mimbar tapi ia tidak berkhutbah tentan anjuran memerdekakan budak, justru tentang hal lain.\r\n\r\nKemudian pada Jumat berikutnya ia pun masih berkhutbah tentang hal lain dan tidak membahas tentang memerdekakan budak sama sekali. Hingga pada Jumat ke empat ia pun masih belum berkhutbah tentang hal lain yang jauh dari pembahasan tentang memerdekakan budak.\r\n\r\nHingga pada Jumat kelima belau berkhutbah mengenai anjuran memerdekakan budak.\r\n\r\nKemudian orang tersebut menemui Imam Hasan Al Bashri dan bertanya “Wahai Imam, kenapa engkau baru membahas tentang pembebasan budak sekarang?”\r\n\r\nImam Hasan menjawab “Aku tidak akan berlhutbah mengenai pembebasan budak sebelum aku memiliki uang untuk membeli budak, kemudian aku bebaskan. Sekarang aku baru memiliki uang untuk membeli budak dan membebaskannya. Maka, baru saat ini aku berani menasihati umat muslim tentang anjuran pembebasan budak, kaena aku tidak ingin termasuk kelompok irang yang mengatakan sesuatu yang tidak dikerjakan sehingga mengundang murka Allah.”\r\n\r\nMasyaAllah begitulah keteladanan Imam Hasan Al Bashri dalam berdakwah, ia tak hanya bericara tapi juga dengan tindakan. Sungguh mulianya cara Imam Hasan Al Bashri dalam menasihati dan memberi contoh.\r\n\r\nSumber : Merekalah Teladan Kita',	'image_1557046124_5ccea36c75ac0.jpg',	'2020-02-23 02:00:00',	'2020-03-05 18:54:30',	3,	'2020-03-05 15:26:34',	0),
(6,	2,	'Ontologi Tuntunan Agama',	'ontologi-tuntunan-agama',	'Tuntunan Agama turun ibarat buah yang tumbuh subur dari pohon yang rindang: memberikan kebaikan, kebijaksanaan, dan manfaat besar bagi kehidupan. Perihal ini tersirat sebagaimana Firman Allah SWT, Tuhan Pemilik Pengetahuan,\r\n\r\n* “Tidakkah kamu perhatikan bagaimana Allah telah membuat perumpamaan kalimat yang baik seperti pohon yang baik, akarnya teguh dan cabangnya (menjulang) ke langit. Pohon itu memberikan buahnya pada setiap musim dengan seizin Tuhannya. Allah membuat perumpamaan-perumpamaan itu untuk manusia supaya mereka selalu ingat.” (Qs. 14:24-25)*',	'Tuntunan Agama turun ibarat buah yang tumbuh subur dari pohon yang rindang: memberikan kebaikan, kebijaksanaan, dan manfaat besar bagi kehidupan. Perihal ini tersirat sebagaimana Firman Allah SWT, Tuhan Pemilik Pengetahuan,\r\n\r\n*“Tidakkah kamu perhatikan bagaimana Allah telah membuat perumpamaan kalimat yang baik seperti pohon yang baik, akarnya teguh dan cabangnya (menjulang) ke langit. Pohon itu memberikan buahnya pada setiap musim dengan seizin Tuhannya. Allah membuat perumpamaan-perumpamaan itu untuk manusia supaya mereka selalu ingat.” (Qs. 14:24-25)*\r\n\r\nMaka tidak ada sedikitpun kebaikan seorang Muslim yang tidak diganjar dengan kebaikan pula, karena manfaatnya kepada mahluk lainnya. Atau minimal, Allah SWT memberikan ampunan bagi pengamal kebaikan tersebut di akhirat nanti, seperti halnya kebaikan Umar bin Khattab saat melewati gang di kota Madinah kala itu.\r\n\r\nUmar merasakan iba atas burung pipit yang menjadi mainan di tangan seorang anak kecil. Hati Sahabat Nabi itu tergerak untuk segera membebaskan penderitaan burung pipit tersebut..\r\n\r\nBertransaksilah Umar dengan sang bocah. Begitu terbayar dengan adil, burung pipit itu pun dilepas Umar dan terbang bebas di angkasa.\r\n\r\nWaktu pun berlalu hingga saatnya Umar wafat. Pada saat yang sama, banyak penduduk Madinah yang bermimpi bertemu dengan Sang Alfurqan, dan bertanya, “Apa yang telah Allah perlakukan terhadap diri mu?”\r\n\r\n“Alhamdulillah, Allah SWT telah mengampuni segala dosa-dosaku,” jawab Umar dalam mimpi mereka.\r\n\r\n“Dengan sebab apa?” tanya mereka lagi, “Karena kedermawananmu kah? Karena keadilanmu, atau sikap zuhud-mu?”\r\n\r\nUmar berkata, “Tatkala aku wafat, dan kalian telah menguburkanku, saat itu datang kepadaku dua malaikat dengan wajah menakutkan.\r\n\r\nKetika kedua malaikat tersebut hendak bertanya kepadaku, tiba-tiba terdengar suara tanpa suara yang berseru: ‘biarkanlah hamba-Ku ini! Jangan kalian menanyainya dan menakut-nakutinya. Sungguh, Aku telah merahmatinya dan mengampuni segala dosa-dosanya lantara sewaktu di dunia ia berlaku kasih sayang kepada seekor burung pipit. Karena itulah, maka sekarang Aku pun berlaku kasih sayang kepadanya’.”\r\n\r\nSejatinya, tuntunan agama adalah bentuk kasih sayang Allah SWT kepada seluruh mahluk-Nya di muka bumi ini. Sekiranya kasih Umar kepada burung pipit diganjar dengan Rahmat dan Ampunan Allah SWT, maka tak terbayang sebesar apa ganjaran Allah SWT atas kepedulian kita kepada sesama.\r\n\r\nKisah dikutip dari buku Ahmad Zahrudin, S.Pd.I, berjudul “Merekalah Teladan Kita”',	'sparrow-on-a-stump.jpg',	'2020-02-24 02:00:00',	'2020-03-05 18:51:34',	3,	'2020-02-28 02:00:00',	0),
(7,	3,	'Kajian Muslimah Move on To Be Better',	'kajian-muslimah-move-on-to-be-betterr',	'Kajian Muslimah Move on To Be Better menghadirkan Ramita Nasution (artis) dan Rita Fadilah (psikolog) sebagai narasumber.',	'**Kajian Muslimah Move on To Be Better menghadirkan Ramita Nasution (artis) dan Rita Fadilah (psikolog) sebagai narasumber.**\r\nWaktu : 11.30 s.d 13.15 WIB\r\nTempat : Auditorium Lt 8 Ged. B Bapeten\r\nFree Snack untuk 40 orang pertama dan tersedia doorprize bagi peserta yang bertanya atau menjawab pertanyaan narasumber.',	'kamus_bapeten.jpeg',	'2020-02-25 02:00:00',	'2020-08-03 20:15:24',	7,	'2020-03-05 15:26:34',	0),
(8,	2,	'Resume Ceramah Khutbah Jumat',	'resume-ceramah-khutbah-jumat',	'Allah SWT menciptakan kematian dan kehidupan untuk menguji manusia yang paling baik prestasinya (al Mulk 2). Jadi hidup adalah perlombaan dan kompetisi. Karena itu Allah SWT memerintahkan kita utk berlomba-lomba dalam kebaikan (istibaaqul khairaat).',	'Allah SWT menciptakan kematian dan kehidupan untuk menguji manusia yang paling baik prestasinya (al Mulk 2). Jadi hidup adalah perlombaan dan kompetisi. Karena itu Allah SWT memerintahkan kita utk berlomba-lomba dalam kebaikan (istibaaqul khairaat).\r\n\r\nIstibaaq berasal dari kata istabaaqa – yastabiiqu – istibaaqan. Fiil amarnya adalah istabiq, maka perintah Allah kepada manusia berbentuk fa istabiquu.\r\nYang seakar kata adalah saabaqa – yusaabiqu – musaabaqatan, yang berarti perlombaan. Orangnya disebut saabiq, sehingga dikenal kata as-saabiquunal awwaluun.\r\n\r\nJadi hidup harus diisi dgn kebaikan, prestasi, karya, kerja, agar menjadi orang yang terbaik.\r\n\r\nDalam hadits, ada tiga perkataan Nabi yang menggunakan kata khairukum (sebaik-baik kalian).\r\nPertama, khairukum man ta’allamal quraana wa’allamahu (sebaik-baik kalian adalah orang yang mempelajari Al Quran dan mengajarkannya). Jika digeneralisasi, menjadi orang terbaik pada aspek ibadah (hablun minaLlah).\r\nKedua, khiyarukum khiyarukum li nisaaihim (sebaik-baik kalian adalah orang yang terbaik pada istri kalian). Artinya menjadi yang terbaik pada aspek keluarga.\r\nKetiga, khairukum anfa’uhum linnaasi (sebaik-baik kalian adalah yang paling bermanfaat bagi orang lain). Artinya menjadi yang terbaik pada aspek sosial kemasyarakatan. Aspek keluarga dan masyarakat merupakan bagian dari hablun minannaas.\r\n\r\nKarena itu hendaknya kita berusaha menjadi yang terbaik pada aspek ibadah, keluarga dan masyarakat.\r\n\r\nJangan sampai ada orang yang ibadahnya kuat, tetapi tidak memperhatikan keluarga dan tetangga. Jangan sampai ada orang yang baik kepada masyarakat tetapi tidak mau sholat, dan sebagainya…\r\n\r\nDalam beribadah serta berkontribusi positif bagi manusia, hendaknya kita menjadi orang yang profesional, mengerjakan sesuatu sampai sempurna dan selesai. Nabi bersabda, InnaLlaaha ta’ala yuhibbu idza ‘amila ahadukum ‘amalan an yutqinahu. Sesungguhnya Allah SWT menyukai jika salah seorang kalian beramal apa saja, maka ia melakukannya dengan itqon (profesional)\r\n\r\nItqon berasal dari kata atqona – yutqinu – itqoonan. Kata atqona dlm kamus Munawwir berarti menyelesaikan sampai sempurna. huruf ta qof dan nun juga menunjuk pada kata tekun, yang selaras dgn kata profesional.\r\n\r\nHikmah yang bisa diambil, mengapa Jepang adalah negara maju dibandingkan Indonesia, itu karena mental orang Jepang yang bekerja keras, membuat produk (otomotif, elektronik dan sebagainya) yang sebaik mungkin, bekerja sama dan lain-lain.\r\n\r\nUngkapan mengatakan Man Jadda Wajada (barangsiapa yang bersungguh-sungguh pasti dapat). Jadi Allah akan memberikan hasil kepada siapa saja yang mengikuti sunnatuLlah, yaitu profesional dalam berkarya, entah dia muslim atau bukan.',	'ust.jpeg',	'2020-02-26 02:00:00',	'2020-03-05 18:38:15',	2,	'2020-03-02 02:00:00',	0),
(9,	2,	'Bedah Buku Islam Islam dan Sains',	'bedah-buku-islam-islam-dan-sains',	'Acara Bedah Buku Berjudul Islam dan Sains bersama Ustadz Ahmad Sarwat, Lc.',	'Acara Bedah Buku Berjudul Islam dan Sains bersama Ustadz Ahmad Sarwat, Lc.\r\nWaktu : 12.00 s.d 13.15 WIB\r\nTempat : Masjid Al-Hidayah Badan Pengawas Tenaga Nuklir\r\n\r\nMembedah Buku Islam dan Sains yang terdiri dari:\r\n**Bab 1 : Islam dan Sains**\r\n*A. Eropa di Masa Yang Kelam*\r\n1. Ratu Isabella : Hanya Sekali Mandi Seumur Hidup\r\n2. Raja Louis XII : Hanya Dua Kali Mandi Seumur Hidup\r\n3. Raja Perancis, Henri IV\r\n4. Tidur Bersama Ternak\r\nB. Sains Ditindas di Barat\r\n1. Nicolaus Copernicus\r\n2. Galileo Galilei\r\n3. Giordano Bruno\r\n*C. Sains di Negeri Islam Dimuliakan*\r\n1. Di Masa Kenabian\r\n2. Di Masa Shahabat\r\n3. Penerjemahan Dari Luar Negeri Islam\r\n*D. Kebangkitan Eropa dari Sains Muslim*\r\n*E. Mengapa Karya Sains Umat Islam Sedikit?*\r\n1. Sains Selalu Berkembang\r\n2. Sains di Masa Lalu\r\n\r\n**Bab 2 : Al-Quran dan Sains**\r\n*A. Perhatian Al-Quran Kepada Sains*\r\n1. Perintah Memperhatikan Berbagai Objek Penelitian\r\n2. Al-Quran Memuji Imuwan\r\nB. Perbandingan Jumlah Ayat Sains dan Ayat Hukum\r\n1. Jumlah Ayat Sains\r\n2. Jumlah Ayat Hukum\r\nC. Sains Antara Kesesuaian Ayat dan Kontradiksi\r\n1. Yang Dianggap Sejalan Dengan Sains\r\n2. Ayat Yang Nampak Bertentangan Dengan Sains\r\nD. Bagaimana Kita Menjawabnya?\r\n1. Menolak Kebenaran Sains\r\n2. Menerima Kebenaran Sains\r\n\r\n**Bab 3 : Tafsir Ilmi**\r\n*A. Pengertian Tafsir Ilmi*\r\n1. Bahasa\r\n2. Istilah\r\nB. Sejarah Tafsir Ilmi\r\n1. Tafsir Ilmi di Masa Klasik\r\n2. Tafsir Ilmi di Masa Sekarang\r\n3. Para Pelopor di Masa Modern\r\nC. Pendapat Yang Mendukung\r\n1. Al-Ghazali\r\n2. As-Suyuti\r\n3. Abu Al-Fadhl Al-Mursi\r\n4. Abu Bakar Ibnul Arabi\r\n5. Fakhruddin Ar-Razi\r\n6. Ibnu Rusyd\r\n7. Dr. Muhammad Abduh\r\n8. Thanthawi Jauhari\r\n9. Maurice Bucaille\r\nD. Pendapat Yang Menolak\r\n1. Asy-Syathibi\r\n2. Syeikh Mahmud Syaltut\r\n3. Amin Al-Khuli\r\n4. Syeikh Muhammad Musthafa Al-Maraghi\r\n5. Sayid Qutub\r\n6. Husein Adz-Dzahabi\r\nE. Jalan Tengah\r\n1. Al-Quran Mengandung Sains\r\n2. Tema Besar\r\n3. Isyarat Sains\r\n4. Masih Butuh Pengembangan\r\n\r\n**Bab 4. Nabi SAW dan Sains**\r\nA. Sains di Masa Kenabian\r\n1. Pengobatan\r\n2. Alat Perang\r\nB. Nabi Ikut Terlibat Dengan Teknologi\r\n1. Nabi SAW Mendapat Wahyu\r\n2. Nabi SAW Adalah Teladan dan Panutan\r\nC. Nabi SAW Tidak Mengurus Teknologi\r\n1. Hadits Kalian Lebih Tahu\r\n2. Strategi Perang Badar\r\n3. Teknik Bertahan Dalam Kota\r\n4. Menggunakan Jasa Ahli Navigasi\r\n5. Qiyafah\r\n6. Teknologi Terus Berkembang\r\n7. Pengobatan\r\n\r\n**Bab 5 : Sejarah Teknologi**\r\nA. Teknologi Masa Pra-Sejarah\r\n1.    Zaman Batu\r\n2.    Zaman Perunggu\r\n3. Zaman Besi\r\nB. Teknologi Zaman Kuno\r\n1. Mesir Kuno\r\n2. Tiongkok\r\n3. Lembah Sungai Indus\r\n4. Mesopotamia\r\n5. Yunani Kuno\r\n6. Romawi Kuno\r\n7. Inca dan Maya\r\nC. Teknologi Abad Pertengahan\r\n1. Peradaban Islam\r\n2. Peradaban Eropa\r\n3. Renaisans\r\n4. Penjelajahan\r\nD.    Teknologi Pada Revolusi Industri\r\n1. Mesin Uap\r\n2. Batubara\r\n3. Mesin Tenun\r\n4. Sepeda\r\n5. Mobil Generasi Awal\r\n6. Telegraf dan Telepon\r\n7. Berbagai Macam Penemuan Lainnya\r\nE.    Teknologi Pada Abad 20\r\n1. Mekanika Kuantum\r\n2. Penemuan Transistor\r\n3. Bom Atom dan Tenaga Nuklir\r\n4. Teknologi Antariksa\r\n5. DNA\r\n6. Kedokteran Modern\r\n7. Komputer\r\n8. Internet\r\n9. Telepon Genggam\r\n10. Digitaliasi\r\nF.    Teknologi Pada Abad 21\r\n1. Transistor\r\n2. Antariksa\r\n3. Fisika\r\n4. Medis\r\n5. Teknologi Informasi\r\n\r\n**Bab 6 : Konsep Ilmu Dalam Islam**\r\nA. Sumber Ilmu : Allah SWT\r\n1. Yang Paling Tahu Adalah Yang Mencipta\r\n2. Ilmu Allah Meliputi Segala Sesuatu\r\nB. Allah Memberi Ilmu Kepada Makhluq-Nya\r\n1. Memberi Ilmu Kepada Yang Dikehendaki\r\n2. Ilmu Kepada Adam\r\nC. Ilmu Lewat Jalur Formal\r\n1. Jalur Formal : Al-Quran dan As-Sunnah\r\n2. Lewat Perantaraan Seorang Nabi\r\n3. Nilai Kebenaran Yang Hakiki\r\n4. Penampakan : Ilmu-ilmu Keislaman\r\n5. Kegunaan\r\nD. Ilmu Lewat Jalur Non-Formal\r\n1. Jalur Non Formal\r\n2. Tidak Harus Kepada Nabi\r\n3. Kebenaran Yang Berkembang\r\n4. Limpahan Ilmu di Zaman Modern\r\n5. Kegunaan',	'bedah-buku-min.jpg',	'2020-02-27 02:00:00',	'2020-03-05 18:32:56',	1,	'2020-03-05 15:26:34',	0),
(10,	1,	'Santunan dan Buka Puasa Bersama Yatim/Piatu Ramaikan Kegiatan Syiar Ramadhan 1440 H di BAPETEN',	'santunan-dan-buka-puasa-bersama-yatim-piatu-ramaikan-kegiatan-syiar-ramadhan-1440-h-di-bapeten',	'Guna mengisi bulan suci Ramadhan 1440 H dengan kegiatan dakwah dan sosial, pada hari Selasa 28/05/2019, telah diselenggarakan Santunan dan Buka Bersama dengan sejumlah anak Yatim/Piatu di masjid Al Hidayah BAPETEN.',	'Guna mengisi bulan suci Ramadhan 1440 H dengan kegiatan dakwah dan sosial, pada hari Selasa 28/05/2019, telah diselenggarakan Santunan dan Buka Bersama dengan sejumlah anak Yatim/Piatu di masjid Al Hidayah BAPETEN.\r\n\r\nAcara yang digelar di masjid Al Hidayah BAPETEN ini, dihadiri oleh Sekretaris Utama BAPETEN Hendriyanto Hadi Tjahyono atau akrab disapa Dudit, dan diisi dengan Kultum jelang berbuka oleh Ust. Fahmi Zaki Mubarok.\r\n\r\nDalam Sambutannya Dudit menyampaikan bahwa ia mewakili BAPETEN merasa senang sekali atas kehadiran anak-anak Yatim/Piatu di BAPETEN untuk ikut kegiatan Santuan dan Buka Bersama ini. Lalu disampaikan juga bahwa kegiatan ini bisa terlaksana atas sumbangsih dari segenap pegawai BAPETEN. “Semoga para donatur dan kita semua mendapat ridha dari Allah SWT”, tutur Dudit mengakhiri sambutannya. Kegiatan lainnya meliputi ceramah Tarhib Ramadhan, Tausyiah ba’da Zhuhur, Pemberian Sembako untuk 107 pegawai PPNPN (driver, security dan Office boy), serta pemberian makanan sahur untuk security BAPETEN.\r\nMelalui rangkaian kegiatan ini, semoga menambah syiar Islam di lingkungan BAPETEN dan semoga infaq dan sodaqoh yang diberikan oleh para donatur dibalas oleh Allah SWT dengan ganjaran pahala yang besar dan berlipat ganda, terlebih ini dilakukan di bulan Ramadhan. (bhkkp/bams).\r\n',	'Post_Image_1.jpeg',	'2020-02-28 02:00:00',	'2020-03-05 18:25:22',	1,	'2020-03-03 02:00:00',	0),
(11,	1,	'Kajian Ramadhan 2020 Pekan I',	'kajian-ramadhan-2020-pekan-i',	'Kajian Ramadhan Online 2020 (1441 H) Pekan I',	'# Ikutilah...\r\nKajian Ramadhan Online 2020 (1441 H) Pekan I dengan jadwal sebagai berikut:\r\n(via Zoom)\r\n\r\n**Waktu : 12.00 s.d 13.15 (Ba\'da Dzuhur)**\r\n\r\n1.)**Selasa, 28 April 2020** \r\n* Pemateri : Ust. K.H Zein Rofiq \r\n* Tema : \"*Menimbang Bobot Ibadah*\"\r\n\r\n 2.) **Rabu, 29 April 2020**\r\n* Pemateri: Ust. Agung Waspodo\r\n* Tema: \"*Mempersiapkan Ramadhan dan Menyikapi Wabah Covid*-19\"\r\n\r\n3.) **Kamis, 30 April 2020**\r\n* Pemateri : Dr. Daud Rosyid \r\n* Tema : \"*Ramadhan Membangun Mental Spiritual*\"\r\n\r\n**Link Zoom :** [https://s.id/al-hidayah](https://s.id/al-hidayah)\r\n**CP :** 08174926440 (Bambang Setiabudi)',	'ramadhan.jpg',	'2020-05-02 22:39:17',	'2020-05-03 00:47:24',	1,	'2020-04-26 02:00:00',	0),
(12,	1,	'Kajian Ramadhan Online 19 Mei 2020',	'kajian-ramadhan-online-19-meii-2020',	'\"Pembentukan Akal Ilmiah dalam Al-Quran\"',	'\"Pembentukan Akal Ilmiah dalam Al-Quran\"',	'kajian_PakJazi_v3.jpg',	'2020-06-20 19:20:16',	'2020-08-02 05:00:00',	1,	'2020-05-17 17:00:00',	0),
(13,	1,	'Protokol Sholat Jumat',	'protokol-sholat-jumat',	'Protokol Sholat Jumat dan Sholat Berjamaah di Masjid Al-Hidayah BAPETEN selama masa pandemi',	'Protokol Sholat Jumat dan Sholat Berjamaah di Masjid Al-Hidayah BAPETEN selama masa pandemi',	'protokol_rev2-min.jpg',	'2020-06-20 21:17:50',	'2020-06-20 21:21:30',	6,	'2020-06-17 17:00:00',	0),
(14,	1,	'Melakukan Uji coba Info Kegiatan',	'melakukan-uji-coba-info-kegiatan',	'	Cek',	'1. Cek\r\n2. 2\r\n3. ',	'auau.jpg',	'2020-08-05 00:51:35',	'2020-08-05 21:02:19',	1,	'2020-08-03 16:59:00',	0),
(15,	1,	'Melakukan Uji coba Resume Ceramah',	'melakukan-uji-coba-resume-ceramah',	'ABCDE',	'ABCDE',	'gZ3ZjI7.jpg',	'2020-08-05 00:52:48',	'2020-08-05 21:01:06',	2,	'2020-08-04 16:59:00',	0),
(16,	1,	'Melakukan Uji coba Shahibul Hikayat',	'melakukan-uji-coba-shahibul-hikayat',	'	Hikayat',	'Hikayat1',	'114407-free-mac-wallpapers-1920x1080-pc.jpg',	'2020-08-05 00:54:03',	'2020-08-05 21:01:42',	3,	'2020-08-04 16:57:00',	0),
(18,	1,	'Keutamaan Berqurban',	'keutamaan-berqurban',	'Qurban merupakan sunah muakadah bagi seorang muslim',	'Pembelajaran dari Nabi Irahim emgnajarkna kita untuk berquban',	'perbaikan.jfif',	'2020-08-07 00:22:42',	'2020-09-02 20:13:04',	2,	'2020-08-06 02:25:00',	0);

DROP TABLE IF EXISTS `post_tag`;
CREATE TABLE `post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
(1,	5),
(2,	2),
(2,	6),
(3,	5),
(4,	3),
(4,	4),
(4,	5),
(5,	3),
(6,	3),
(6,	6),
(7,	3),
(7,	4),
(8,	2),
(8,	4),
(8,	5),
(8,	6),
(9,	4),
(9,	6);

DROP TABLE IF EXISTS `profils`;
CREATE TABLE `profils` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profils_author_id_foreign` (`author_id`),
  CONSTRAINT `profils_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `profils` (`id`, `author_id`, `title`, `body`, `image`, `created_at`, `updated_at`) VALUES
(1,	11,	'Profil Masjid Al-Hidayah',	'Assalamu’alaikum warrohmatullahi wabarokatuh.\r\nBadan Pengawas Tenaga Nuklir (Bapeten) sebagai lembaga negara yang diberi amanat untuk melaksanakan pengawasan pemanfaatan tenaga nuklir di Indonesia mempunyai peran yang sangat penting untuk menjamin keselamatan dan keamanan pemanfaatan tenaga nuklir bagi pengguna, masyarakat dan lingkungan.\r\nSebagai regulator yang mengawasi pemanfatan tenaga nuklir, selain didukung  dengan berbagai prosedur yang mengatur pengguna agar mematuhi peraturan keselamatan yang berlaku sesuai standar internasional, juga didukung dengan sumber daya manusia (SDM) yang berkualitas, tidak hanya dalam segi kompetensi dan profesionalitas tetapi juga dari segi integritas dan moral.\r\nUntuk mewujudkan SDM dengan integritas yang tinggi bukanlah pekerjaan yang mudah. Di samping faktor kemauan dari masing-masing individu, diperlukan pula faktor pendukung lainnya, termasuk akhlak dan mental. Agar pembinaan akhlak dan mental dapat berjalan efektif dan berkesinambungan, maka diperlukan sarana yang memadai untuk mendukungnya. Dalam kaitan inilah keberadaan sebuah masjid pada lingkungan perkantoran dapat mendukung pembentukan dan pembinaan akhlak dan mental bagi pegawai, khususnya yang beragama Islam.\r\nSeiring dengan perkembangan jaman, peran dakwah masjid pun kini dilakukan dengan berbagai metode, selain dakwah tatap muka yang selama ini sudah dilakukan di dalam masjid, pemanfaatan teknologi informasi melalui website dan media sosial juga telah banyak digunakan oleh masjid-masjid termasuk masjid di perkantoran. Dan kini Bapeten mencoba meramaikan dakwah melalui website. Mencoba melahirkan kembali, reborn website masjid Al Hidayah Bapeten yang sebenarnya dulu pernah ada, namun baru dikelola secara personal oleh Almarhum Bapak Sugeng Priatno.\r\nWebsite masjid Al Hidayah Bapeten ini, dapat dijadikan wahana dakwah yang bisa diakses dan menjadi referensi bagi pegawai Bapeten maupun khalayak umum. Oleh karenanya kami persilakan bagi pegawai Bapeten yang ingin berkontribusi, urun rembuk dalam dakwah melalui tulisan, kami dengan senang hati menerima tulisannya.\r\nSemoga konten dalam website ini bisa diterima, dikunyah-kunyak dengan gurih oleh pegawai Bapeten dan dapat menjadi pintu hidayah, sesuai nama Masjid Bapeten ini, agar keimanan kita menjadi lebih baik dan lebih baik lagi.\r\nWassalamu’alaikum warohmatullahi wabarokatuh.\r\n\r\nJakarta,  17 Agustus 2020\r\n\r\nPengurus Masjid Al Hidayah Bapeten',	'Struktur_DKM_ver2_exp.png',	NULL,	'2020-08-15 03:13:18');

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1,	'superadmin',	'web',	'2020-08-10 00:26:37',	'2020-08-10 00:26:37'),
(2,	'admin',	'web',	'2020-08-10 00:26:37',	'2020-08-10 00:26:37'),
(3,	'pelak1',	'web',	'2020-08-10 00:26:37',	'2020-08-10 00:26:37'),
(4,	'pelak2',	'web',	'2020-08-10 00:26:38',	'2020-08-10 00:26:38');

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1,	'Khutbah Jumat',	'khutbahjumat',	'2020-03-06 01:13:47',	'2020-03-06 01:13:47'),
(2,	'Kajian Rutin',	'kajianrutin',	'2020-03-06 01:13:47',	'2020-03-06 01:13:47'),
(3,	'Shiroh Nabi',	'sirohnabi',	'2020-03-06 01:13:47',	'2020-03-06 01:13:47'),
(4,	'Shiroh Sahabat',	'sirohsahabat',	'2020-03-06 01:13:47',	'2020-03-06 01:13:47'),
(5,	'Kemuslimahan',	'kemuslimahan',	'2020-03-06 01:13:47',	'2020-03-06 01:13:47'),
(6,	'Bedah Buku',	'bedahbuku',	'2020-03-06 01:13:47',	'2020-03-06 01:13:47');

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `jenis` enum('Pemasukan','Pengeluaran') COLLATE utf8_unicode_ci NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `transaksi` (`id`, `tanggal`, `jenis`, `kategori_id`, `nominal`, `keterangan`, `created_at`, `updated_at`) VALUES
(1,	'2020-01-01',	'Pemasukan',	1,	1000000,	'Infaq a.n Hamba Allah',	'2020-03-15 15:53:14',	NULL),
(2,	'2020-01-10',	'Pemasukan',	2,	100000,	'Infaq a.n Hamba Allah',	'2020-05-03 08:54:58',	'2020-05-03 08:54:58'),
(3,	'2020-01-15',	'Pemasukan',	2,	50000,	'Infaq a.n Hamba Allah',	'2020-05-03 10:37:49',	NULL),
(4,	'2020-01-20',	'Pengeluaran',	5,	150000,	'Snack Kajian tanggal 20',	'2020-05-03 11:07:10',	'2020-05-03 11:07:10'),
(5,	'2020-01-25',	'Pemasukan',	2,	200000,	'Infaq a.n Hamba Allah',	'2020-05-03 11:11:58',	'2020-05-03 11:11:58'),
(7,	'2000-12-22',	'Pemasukan',	3,	20000,	'cek',	NULL,	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `user_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'b.setiabudi',	'Bambang Setiabudi',	'b.setiabudi@bapeten.go.id',	'$2y$10$5Nz5eJefrj3Oi5ynAKaP/.uCOImVRnw7A3ZZjyMb2kOqFCo2vSsJW',	'PD3okbF2sD341HmC1aICvF1JQ1dFHIqfyIl4hwATJGfmmSKGwve79tog4yUO',	NULL,	'2020-07-20 00:41:16'),
(2,	'd.kharisma',	'Dinda Kharisma',	'd.kharisma@bapeten.go.id',	'$2y$10$aSYH0al3qA1SLiUldL/KOeuUC/6RxPTdNiQVAk4SSd9xmg3bOOyt6',	'0qj7krOp2VjwlOobEEnGUwWQyWRm7uil9weIs6qIlCYffGt07hbA6Pj4I6MA',	NULL,	'2020-08-05 19:07:16'),
(3,	'adnid',	'Amsirahk Adnid',	'amsirahk@test.com',	'$2y$10$.V3U1gwZJJdMCwwrQw56P.4pAH/cH5huv9M/grs/kKkJe/eI3EsCq',	NULL,	NULL,	NULL),
(5,	'arif',	'Arif Nurmansyah',	'a.nurmansyah@bapeten.go.id',	'$2y$10$VP4vATqOGdzFYPqUb8WaN.6iobyYLIG3ueikiR6wk392updYEeA7W',	'aJV0uCfj0gRRxv7GzE9GPOH86zX4AdnqNwlHqHz4ZrGmX1EQzXZjSGzO65KJ',	'2020-07-13 21:41:10',	'2020-07-13 22:34:45'),
(6,	'karen',	'Karen D. Kusuma',	'bapeten@karen.go.id',	'$2y$10$XloCN2FzFh1hUJJg9PPPveqbKzXfTBthjlVHuazk8Zq/9QXLWIN6.',	'rfWTNjDCfGOW4OLsE9syQ8DlyoDpTFACRUz3VXtlB7KVk3z5N6sqLh9ZMalc',	'2020-07-19 18:51:28',	'2020-08-11 19:35:45'),
(7,	'a.nurmansyah',	'Arif Nurmansyah',	'arif@bapetebn.go.id',	'$2y$10$wXZ2K4QiXL0cNZOMhSg5s.ZgEv42YSWYKvCGSUYFdCZ6Lo76.tyQu',	NULL,	'2020-08-05 01:10:27',	'2020-08-05 01:10:27'),
(8,	'coba2',	'Coba2',	'coba2@gmail.com',	'$2y$10$4/XqgZBkjYACweT4G3a11.qfZSeP8h/WBZ8xH2CJUXbgRpmcipHny',	NULL,	'2020-08-05 01:12:30',	'2020-08-05 01:12:30'),
(10,	'superadmin',	'Super Admin',	'superadmin@bapeten.go.id',	'$2y$10$Z6pxxlPSYPA5srVVMWPmye6jyG1PENR14kJhfMinFBbYUnZIyQsmC',	'FLcJxYGlqnGVNhCNnXs16zZTfVUZNuM68KQe9eOAJk0rUWcKmWUfSSswfjwu',	'2020-08-10 00:28:24',	'2020-08-10 00:28:24'),
(11,	'admin',	'Admin',	'admin@bapeten.go.id',	'$2y$10$HJtCtEBUsc1tBnHmRp2MSu2tCtqAY50DkjquLyLDyLrdl.gDeLtqi',	NULL,	'2020-08-10 00:28:25',	'2020-08-10 00:28:25'),
(12,	'pelak1',	'Pelaksana 1',	'pelak1@bapeten.go.id',	'$2y$10$bfVZX8MOVoyrQM/tl.dL4uNXLpyCwaCqm6lBsC3I0gDqNJgv4WTEC',	NULL,	'2020-08-10 00:28:25',	'2020-08-10 00:28:25'),
(13,	'pelak2',	'Pelaksana 2',	'pelak2@bapeten.go.id',	'$2y$10$gfy4eNRpdJi1zXd0sMH4/efxqa/y.jeHnbwecGbnR5yPMbb5WHRaq',	NULL,	'2020-08-10 00:28:26',	'2020-08-10 00:28:26'),
(14,	'superadmin2',	'Contoh Superadmin 2',	'karen@keren.com',	'$2y$10$MFbJGFf/m3HLwjKPP4sGdeCZqrqHGDQT0GvEhLNoaP4TKgX31MhIG',	NULL,	'2020-08-11 01:37:00',	'2020-08-11 01:37:00'),
(16,	'admincoba',	'admin coba',	'admin@coba.com',	'$2y$10$nNiDo2EElmeNNBAp/F2UPeQ908qUpIy2XAqO8Fo6ujWGEu6nq5Zpi',	NULL,	'2020-08-12 21:10:53',	'2020-08-12 21:10:53'),
(18,	'bendahara',	'bendahara',	'bendahara@coba.com',	'$2y$10$3ozG6Y68JasueKrsUMm.W.Z4idDgGN153m8TFa9QhccRZ.Vx5fxOi',	NULL,	'2020-08-12 21:12:37',	'2020-08-12 21:12:37');

DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(10) unsigned NOT NULL,
  `judul_video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ket_video` text COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `videos_table__author_id_foreign` (`author_id`),
  CONSTRAINT `videos_table__author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `videos` (`id`, `author_id`, `judul_video`, `ket_video`, `video`, `created_at`, `updated_at`) VALUES
(1,	10,	'Pembentukan Akal Ilmiah dalam Al-Quran',	'kajian online ramadhan 19 Mei 2020',	'https://www.youtube.com/embed/o_zUYX979OE',	'2020-09-16 03:52:12',	'2020-09-16 03:52:12'),
(2,	10,	'Keluarga Berkah di Tengah Wabah',	'kajian online ramadhan 14 Mei 2020',	'https://www.youtube.com/embed/NWeFPT59wc0',	'2020-09-16 22:10:53',	'2020-09-16 22:10:53'),
(3,	10,	'Jaminan Mendapatkan Lailatul Qadr',	'kajian online ramadhan 12 Mei 2020',	'https://www.youtube.com/embed/3fefLl5FSkk',	'2020-09-17 10:24:50',	'2020-09-17 10:24:50');

-- 2020-09-20 13:46:40
