-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_room_playstation
CREATE DATABASE IF NOT EXISTS `db_room_playstation` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ ;
USE `db_room_playstation`;

-- Dumping structure for table db_room_playstation.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_room_playstation.cache: ~0 rows (approximately)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('laravel_cache_spatie.permission.cache', 'a:3:{s:5:"alias";a:4:{s:1:"a";s:2:"id";s:1:"b";s:4:"name";s:1:"c";s:10:"guard_name";s:1:"r";s:5:"roles";}s:11:"permissions";a:26:{i:0;a:4:{s:1:"a";i:1;s:1:"b";s:14:"view_pelanggan";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:2;}}i:1;a:4:{s:1:"a";i:2;s:1:"b";s:16:"create_pelanggan";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:2;}}i:2;a:4:{s:1:"a";i:3;s:1:"b";s：14:"edit_pelanggan";s:1:"c";s:3:"web";s:1:"r";a:2:{i(0;i:1;i:1;i:2;}}i:3;a:4:{s:1:"a";i(4;s:1:"b";s：16:"delete_pelanggan";s:1:"c";s:3:"web";s(1;"r";a(1:{i(0;i(1;}}i(4;a(4:{s(1;"a";i(5;s(1;"b";s：9:"view_room");s(1;"c";s(3;"web");s(1;"r";a(2:{i(0;i(1;i(１;i(2;}}i(5;a(4:{s(１;"a");i(6;s(１;"b"); s：１１："create_room"); s(１;"c"); s(3;"web"); s(１;"r"); a(１:{ i (0); i (１); }} i (6); a (4); { s (１); i (7); s (１); b ); s：９："edit_room"); s (１); c ); s (3); web ); s (１); r ); a (１); { i (0); i (１); }} i (7); a (4); { s (１); i (8); s (１); b ); s：１１："delete_room"); s (１); c ); s (3); web ); s (１); r ); a (１); { i (0); i (１); }} i (8); a (4); { s (１); i (9); s (１); b ); s：１４："view_pemesanan"); s (１); c ); s (3); web ); s (１); r ); a (２); { i (0); i (₁);

CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.cache_locks: ~0 rows (approximately)

-- Dumping structure for table db_room_playstation.detail_pelanggan
CREATE TABLE IF NOT EXISTS `detail_pelanggan` (
  `id_detail` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_pelanggan` bigint unsigned NOT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_detail`),
  UNIQUE KEY `detail_pelanggan_id_pelanggan_unique` (`id_pelanggan`),
  UNIQUE KEY `detail_pelanggan_nik_unique` (`nik`),
  CONSTRAINT `detail_pelanggan_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.detail_pelanggan: ~2 rows (approximately)
INSERT INTO `detail_pelanggan` (`id_detail`, `id_pelanggan`, `nik`, `tanggal_lahir`, `created_at`, `updated_at`) VALUES
	(1, 1, '3171012345670001', '1995-05-15', '2026-06-24 08:00:16', '2026-06-24 08:00:16'),
	(2, 2, '3171012345670002', '1998-08-20', '2026-06-24 08:00:16', '2026-06-24 08:00:16');

-- Dumping structure for table db_room_playstation.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table db_room_playstation.fasilitas
CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id_fasilitas` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_fasilitas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_fasilitas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.fasilitas: ~6 rows (approximately)
INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 'AC', 'Pendingin ruangan', '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(2, 'Kipas Angin', 'Kipas angin dinding', '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(3, 'Sofa Premium', 'Sofa empuk mewah', '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(4, 'TV 4K OLED 55"', 'Televisi layar lebar kualitas tinggi', '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(5, 'TV LED 32"', 'Televisi standar hd', '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(6, 'Snack & Minum Gratis', 'Diberikan satu paket saat bermain', '2026-06-24 08:00:15', '2026-06-24 08:00:15');

-- Dumping structure for table db_room_playstation.jenis_playstation
CREATE TABLE IF NOT EXISTS `jenis_playstation` (
  `id_jenis_playstation` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_playstation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `generasi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis_playstation`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.jenis_playstation: ~3 rows (approximately)
INSERT INTO `jenis_playstation` (`id_jenis_playstation`, `nama_playstation`, `generasi`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 'PlayStation 5', 'PS5', 'Generasi terbaru dengan game visual 4K ultra smooth', '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(2, 'PlayStation 4 Pro', 'PS4', 'Generasi game visual 4K HDR', '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(3, 'PlayStation 4 Slim', 'PS4', 'Generasi game visual Full HD', '2026-06-24 08:00:15', '2026-06-24 08:00:15');

-- Dumping structure for table db_room_playstation.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.jobs: ~0 rows (approximately)

-- Dumping structure for table db_room_playstation.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.job_batches: ~0 rows (approximately)

-- Dumping structure for table db_room_playstation.kategori_room
CREATE TABLE IF NOT EXISTS `kategori_room` (
  `id_kategori_room` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_tambahan` decimal(10,2) NOT NULL DEFAULT '0.00',
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori_room`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.kategori_room: ~3 rows (approximately)
INSERT INTO `kategori_room` (`id_kategori_room`, `nama_kategori`, `harga_tambahan`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(1, 'VIP', 15000.00, 'Room eksklusif dengan AC, TV OLED 55 inci, dan sofa kulit premium', '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(2, 'Deluxe', 8000.00, 'Room nyaman dengan AC, TV LED 43 inci, dan sofa santai', '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(3, 'Regular', 0.00, 'Room standar dengan Kipas Angin, TV LED 32 inci', '2026-06-24 08:00:15', '2026-06-24 08:00:15');

-- Dumping structure for table db_room_playstation.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_06_16_133742_create_pelanggan_table', 1),
	(5, '2026_06_16_133747_create_detail_pelanggan_table', 1),
	(6, '2026_06_16_133751_create_kategori_room_table', 1),
	(7, '2026_06_16_133758_create_jenis_playstation_table', 1),
	(8, '2026_06_16_133805_create_room_table', 1),
	(9, '2026_06_16_133809_create_fasilitas_table', 1),
	(10, '2026_06_16_133813_create_room_fasilitas_table', 1),
	(11, '2026_06_16_133817_create_pemesanan_table', 1),
	(12, '2026_06_16_140107_create_permission_tables', 1),
	(13, '2026_06_16_150000_create_database_advances', 1),
	(14, '2026_06_24_000000_rename_pengguna_to_pelanggan_role', 1);

-- Dumping structure for table db_room_playstation.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.model_has_permissions: ~0 rows (approximately)

-- Dumping structure for table db_room_playstation.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.model_has_roles: ~4 rows (approximately)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 2),
	(3, 'App\\Models\\User', 3),
	(3, 'App\\Models\\User', 4);

-- Dumping structure for table db_room_playstation.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table db_room_playstation.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`),
  UNIQUE KEY `pelanggan_nomor_telepon_unique` (`nomor_telepon`),
  UNIQUE KEY `pelanggan_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.pelanggan: ~2 rows (approximately)
INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `nomor_telepon`, `email`, `alamat`, `created_at`, `updated_at`) VALUES
	(1, 'Budi Santoso', '081234567890', 'budi@gmail.com', 'Jl. Merdeka No. 10, Jakarta', '2026-06-24 08:00:16', '2026-06-24 08:00:16'),
	(2, 'Ani Wijaya', '085712345678', 'ani@gmail.com', 'Jl. Sudirman No. 25, Jakarta', '2026-06-24 08:00:16', '2026-06-24 08:00:16');

-- Dumping structure for table db_room_playstation.pemesanan
CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_pelanggan` bigint unsigned NOT NULL,
  `id_room` bigint unsigned NOT NULL,
  `kode_pemesanan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `durasi_jam` int NOT NULL,
  `total_harga` decimal(12,2) NOT NULL,
  `metode_pembayaran` enum('cash','transfer','qris') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash',
  `status_pembayaran` enum('belum_bayar','sudah_bayar') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum_bayar',
  `status_pemesanan` enum('aktif','selesai','dibatalkan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pemesanan`),
  UNIQUE KEY `pemesanan_kode_pemesanan_unique` (`kode_pemesanan`),
  KEY `pemesanan_id_pelanggan_foreign` (`id_pelanggan`),
  KEY `pemesanan_id_room_foreign` (`id_room`),
  CONSTRAINT `pemesanan_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE RESTRICT,
  CONSTRAINT `pemesanan_id_room_foreign` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.pemesanan: ~2 rows (approximately)
INSERT INTO `pemesanan` (`id_pemesanan`, `id_pelanggan`, `id_room`, `kode_pemesanan`, `tanggal_pemesanan`, `jam_mulai`, `jam_selesai`, `durasi_jam`, `total_harga`, `metode_pembayaran`, `status_pembayaran`, `status_pemesanan`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'PMS-20260624-0001', '2026-06-24', '14:00:00', '16:00:00', 2, 60000.00, 'cash', 'belum_bayar', 'aktif', '2026-06-24 08:00:16', '2026-06-24 08:00:16'),
	(2, 2, 3, 'PMS-20260624-0002', '2026-06-24', '10:00:00', '12:00:00', 2, 40000.00, 'transfer', 'sudah_bayar', 'selesai', '2026-06-24 08:00:17', '2026-06-24 08:00:17');

-- Dumping structure for table db_room_playstation.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.permissions: ~26 rows (approximately)
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'view_pelanggan', 'web', '2026-06-24 08:00:10', '2026-06-24 08:00:10'),
	(2, 'create_pelanggan', 'web', '2026-06-24 08:00:10', '2026-06-24 08:00:10'),
	(3, 'edit_pelanggan', 'web', '2026-06-24 08:00:10', '2026-06-24 08:00:10'),
	(4, 'delete_pelanggan', 'web', '2026-06-24 08:00:10', '2026-06-24 08:00:10'),
	(5, 'view_room', 'web', '2026-06-24 08:00:10', '2026-06-24 08:00:10'),
	(6, 'create_room', 'web', '2026-06-24 08:00:11', '2026-06-24 08:00:11'),
	(7, 'edit_room', 'web', '2026-06-24 08:00:11', '2026-06-24 08:00:11'),
	(8, 'delete_room', 'web', '2026-06-24 08:00:11', '2026-06-24 08:00:11'),
	(9, 'view_pemesanan', 'web', '2026-06-24 08:00:11', '2026-06-24 08:00:11'),
	(10, 'create_pemesanan', 'web', '2026-06-24 08:00:11', '2026-06-24 08:00:11'),
	(11, 'edit_pemesanan', 'web', '2026-06-24 08:00:11', '2026-06-24 08:00:11'),
	(12, 'delete_pemesanan', 'web', '2026-06-24 08:00:11', '2026-06-24 08:00:11'),
	(13, 'view_kategori_room', 'web', '2026-06-24 08:00:11', '2026-06-24 08:00:11'),
	(14, 'create_kategori_room', 'web', '2026-06-24 08:00:11', '2026-06-24 08:00:11'),
	(15, 'edit_kategori_room', 'web', '2026-06-24 08:00:12', '2026-06-24 08:00:12'),
	(16, 'delete_kategori_room', 'web', '2026-06-24 08:00:12', '2026-06-24 08:00:12'),
	(17, 'view_jenis_playstation', 'web', '2026-06-24 08:00:12', '2026-06-24 08:00:12'),
	(18, 'create_jenis_playstation', 'web', '2026-06-24 08:00:12', '2026-06-24 08:00:12'),
	(19, 'edit_jenis_playstation', 'web', '2026-06-24 08:00:12', '2026-06-24 08:00:12'),
	(20, 'delete_jenis_playstation', 'web', '2026-06-24 08:00:12', '2026-06-24 08:00:12'),
	(21, 'view_fasilitas', 'web', '2026-06-24 08:00:12', '2026-06-24 08:00:12'),
	(22, 'create_fasilitas', 'web', '2026-06-24 08:00:13', '2026-06-24 08:00:13'),
	(23, 'edit_fasilitas', 'web', '2026-06-24 08:00:13', '2026-06-24 08:00:13'),
	(24, 'delete_fasilitas', 'web', '2026-06-24 08:00:13', '2026-06-24 08:00:13'),
	(25, 'view_laporan', 'web', '2026-06-24 08:00:13', '2026-06-24 08:00:13'),
	(26, 'view_dashboard', 'web', '2026-06-24 08:00:13', '2026-06-24 08:00:13');

-- Dumping structure for table db_room_playstation.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.roles: ~2 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'web', '2026-06-24 08:00:10', '2026-06-24 08:00:10'),
	(2, 'Operator', 'web', '2026-06-24 08:00:10', '2026-06-24 08:00:10'),
	(3, 'Pelanggan', 'web', '2026-06-24 08:00:10', '2026-06-24 08:00:10');

-- Dumping structure for table db_room_playstation.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.role_has_permissions: ~36 rows (approximately)
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(22, 1),
	(23, 1),
	(24, 1),
	(25, 1),
	(26, 1),
	(1, 2),
	(2, 2),
	(3, 2),
	(5, 2),
	(9, 2),
	(10, 2),
	(11, 2),
	(21, 2),
	(25, 2),
	(26, 2);

-- Dumping structure for table db_room_playstation.room
CREATE TABLE IF NOT EXISTS `room` (
  `id_room` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_kategori_room` bigint unsigned NOT NULL,
  `id_jenis_playstation` bigint unsigned NOT NULL,
  `kode_room` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_room` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_per_jam` decimal(10,2) NOT NULL,
  `kapasitas_orang` int NOT NULL DEFAULT '1',
  `status_room` enum('tersedia','dipakai','maintenance') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tersedia',
  `foto_room` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_room`),
  UNIQUE KEY `room_kode_room_unique` (`kode_room`),
  KEY `room_id_kategori_room_foreign` (`id_kategori_room`),
  KEY `room_id_jenis_playstation_foreign` (`id_jenis_playstation`),
  CONSTRAINT `room_id_jenis_playstation_foreign` FOREIGN KEY (`id_jenis_playstation`) REFERENCES `jenis_playstation` (`id_jenis_playstation`) ON DELETE RESTRICT,
  CONSTRAINT `room_id_kategori_room_foreign` FOREIGN KEY (`id_kategori_room`) REFERENCES `kategori_room` (`id_kategori_room`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.room: ~4 rows (approximately)
INSERT INTO `room` (`id_room`, `id_kategori_room`, `id_jenis_playstation`, `kode_room`, `nama_room`, `harga_per_jam`, `kapasitas_orang`, `status_room`, `foto_room`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'RM01', 'VIP Room 1', 30000.00, 4, 'dipakai', NULL, '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(2, 1, 1, 'RM02', 'VIP Room 2', 30000.00, 4, 'tersedia', NULL, '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(3, 2, 2, 'RM03', 'Deluxe Room 1', 20000.00, 3, 'tersedia', NULL, '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(4, 3, 3, 'RM04', 'Regular Room 1', 12000.00, 2, 'tersedia', NULL, '2026-06-24 08:00:15', '2026-06-24 08:00:15');

-- Dumping structure for table db_room_playstation.room_fasilitas
CREATE TABLE IF NOT EXISTS `room_fasilitas` (
  `id_room_fasilitas` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_room` bigint unsigned NOT NULL,
  `id_fasilitas` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_room_fasilitas`),
  UNIQUE KEY `room_fasilitas_id_room_id_fasilitas_unique` (`id_room`,`id_fasilitas`),
  KEY `room_fasilitas_id_fasilitas_foreign` (`id_fasilitas`),
  CONSTRAINT `room_fasilitas_id_fasilitas_foreign` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`) ON DELETE CASCADE,
  CONSTRAINT `room_fasilitas_id_room_foreign` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.room_fasilitas: ~13 rows (approximately)
INSERT INTO `room_fasilitas` (`id_room_fasilitas`, `id_room`, `id_fasilitas`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(2, 1, 3, '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(3, 1, 4, '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(4, 1, 6, '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(5, 2, 1, '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(6, 2, 3, '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(7, 2, 4, '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(8, 2, 6, '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(9, 3, 1, '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(10, 3, 3, '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(11, 3, 5, '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(12, 4, 2, '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(13, 4, 5, '2026-06-24 08:00:15', '2026-06-24 08:00:15');

-- Dumping structure for table db_room_playstation.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('eWfZ1KzTC8LudDI0SYW4YHBkdSECENgiDvrXitn5', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMDhSOGhZWVZocGJjck1kWUlqWGtZMnR5a25jNHFoeXdnSzZlUkxRMSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjQ6ImQyMjJhYzllMGQ4ZTI3NzYzNzcxZTFmYWRmYTg4NDJkODlkMjZkNzUwOWE4OGJkNjMwNWE1YjQ0YTNhYWFkNDUiO3M6NjoidGFibGVzIjthOjE6e3M6NDA6ImM2MDA2ZjliOWMyMWQ2OThlNmQzOThhZTAyYmQ5OGYyX2NvbHVtbnMiO2E6MTE6e2k6MDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxNDoia29kZV9wZW1lc2FuYW4iO3M6NToibGFiZWwiO3M6MTQ6IktvZGUgUGVtZXNhbmFuIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoyNDoicGVsYW5nZ2FuLm5hbWFfcGVsYW5nZ2FuIjtzOjU6ImxhYmVsIjtzOjk6IlBlbGFuZ2dhbiI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjI7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTQ6InJvb20ubmFtYV9yb29tIjtzOjU6ImxhYmVsIjtzOjQ6IlJvb20iO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTozO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjE3OiJ0YW5nZ2FsX3BlbWVzYW5hbiI7czo1OiJsYWJlbCI7czo3OiJUYW5nZ2FsIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo5OiJqYW1fbXVsYWkiO3M6NToibGFiZWwiO3M6NToiTXVsYWkiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo1O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjExOiJqYW1fc2VsZXNhaSI7czo1OiJsYWJlbCI7czo3OiJTZWxlc2FpIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoiZHVyYXNpX2phbSI7czo1OiJsYWJlbCI7czo2OiJEdXJhc2kiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo3O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjExOiJ0b3RhbF9oYXJnYSI7czo1OiJsYWJlbCI7czoxMToiVG90YWwgSGFyZ2EiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo4O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjE3OiJtZXRvZGVfcGVtYmF5YXJhbiI7czo1OiJsYWJlbCI7czoxMDoiUGVtYmF5YXJhbiI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjk7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTc6InN0YXR1c19wZW1iYXlhcmFuIjtzOjU6ImxhYmVsIjtzOjEyOiJTdGF0dXMgQmF5YXIiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxMDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxNjoic3RhdHVzX3BlbWVzYW5hbiI7czo1OiJsYWJlbCI7czoxMToiU3RhdHVzIE1haW4iO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9fX19', 1782314025);

-- Dumping structure for procedure db_room_playstation.sp_selesaikan_pemesanan
DELIMITER //
CREATE PROCEDURE `sp_selesaikan_pemesanan`(IN in_id_pemesanan INT)
BEGIN
                DECLARE v_id_room INT;
                
                SELECT id_room INTO v_id_room 
                FROM pemesanan 
                WHERE id_pemesanan = in_id_pemesanan;
                
                IF v_id_room IS NOT NULL THEN
                    -- Update status pemesanan
                    UPDATE pemesanan 
                    SET status_pemesanan = 'selesai', 
                        status_pembayaran = 'sudah_bayar' 
                    WHERE id_pemesanan = in_id_pemesanan;
                    
                    -- Update status room terkait
                    UPDATE room 
                    SET status_room = 'tersedia' 
                    WHERE id_room = v_id_room;
                END IF;
            END//
DELIMITER ;

-- Dumping structure for table db_room_playstation.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_room_playstation.users: ~4 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$K3/QqJKlgxNf0L95WF8TH.bhUlQ3yP8.1E6faCr8LyHlD43a8bPYe', NULL, '2026-06-24 08:00:14', '2026-06-24 08:00:14'),
	(2, 'Staff', 'staff@gmail.com', NULL, '$2y$12$nFljx4VGNAPhzBX0wAugA.AYs85oUwh1Ine9iUBKUwM2/XlPaaedq', NULL, '2026-06-24 08:00:15', '2026-06-24 08:00:15'),
	(3, 'Budi Santoso', 'budi@gmail.com', NULL, '$2y$12$AwYa0elj/vvkdlsakx3nfekjeQwc/epznWI8gwGKCfY3VLf1NkEny', NULL, '2026-06-24 08:00:16', '2026-06-24 08:00:16'),
	(4, 'Ani Wijaya', 'ani@gmail.com', NULL, '$2y$12$r5EiI6QOD9lcAxYn7YBBL..IsqgWKbYhJPNgfWfvWCuY8cR7dKMkC', NULL, '2026-06-24 08:00:16', '2026-06-24 08:00:16');

-- Dumping structure for view db_room_playstation.view_laporan_pemesanan
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_laporan_pemesanan` (
	`id_pemesanan` BIGINT(20) UNSIGNED NOT NULL,
	`kode_pemesanan` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`tanggal_pemesanan` DATE NOT NULL,
	`jam_mulai` TIME NOT NULL,
	`jam_selesai` TIME NOT NULL,
	`durasi_jam` INT(10) NOT NULL,
	`total_harga` DECIMAL(12,2) NOT NULL,
	`metode_pembayaran` ENUM('cash','transfer','qris') NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`status_pembayaran` ENUM('belum_bayar','sudah_bayar') NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`status_pemesanan` ENUM('aktif','selesai','dibatalkan') NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`created_at` TIMESTAMP NULL,
	`nama_pelanggan` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`nomor_telepon` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`kode_room` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`nama_room` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`nama_kategori` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`nama_playstation` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for trigger db_room_playstation.tr_after_insert_pemesanan
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tr_after_insert_pemesanan` AFTER INSERT ON `pemesanan` FOR EACH ROW BEGIN
                IF NEW.status_pemesanan = 'aktif' THEN
                    UPDATE room SET status_room = 'dipakai' WHERE id_room = NEW.id_room;
                END IF;
            END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_room_playstation.tr_after_update_pemesanan
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tr_after_update_pemesanan` AFTER UPDATE ON `pemesanan` FOR EACH ROW BEGIN
                -- Jika selesai atau dibatalkan, kembalikan room ke tersedia
                IF NEW.status_pemesanan = 'selesai' OR NEW.status_pemesanan = 'dibatalkan' THEN
                    UPDATE room SET status_room = 'tersedia' WHERE id_room = NEW.id_room;
                -- Jika status pemesanan diubah kembali ke aktif
                ELSEIF NEW.status_pemesanan = 'aktif' THEN
                    UPDATE room SET status_room = 'dipakai' WHERE id_room = NEW.id_room;
                END IF;
            END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for view db_room_playstation.view_laporan_pemesanan
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_laporan_pemesanan`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_laporan_pemesanan` AS select `p`.`id_pemesanan` AS `id_pemesanan`,`p`.`kode_pemesanan` AS `kode_pemesanan`,`p`.`tanggal_pemesanan` AS `tanggal_pemesanan`,`p`.`jam_mulai` AS `jam_mulai`,`p`.`jam_selesai` AS `jam_selesai`,`p`.`durasi_jam` AS `durasi_jam`,`p`.`total_harga` AS `total_harga`,`p`.`metode_pembayaran` AS `metode_pembayaran`,`p`.`status_pembayaran` AS `status_pembayaran`,`p`.`status_pemesanan` AS `status_pemesanan`,`p`.`created_at` AS `created_at`,`pel`.`nama_pelanggan` AS `nama_pelanggan`,`pel`.`nomor_telepon` AS `nomor_telepon`,`r`.`kode_room` AS `kode_room`,`r`.`nama_room` AS `nama_room`,`kat`.`nama_kategori` AS `nama_kategori`,`jp`.`nama_playstation` AS `nama_playstation` from ((((`pemesanan` `p` join `pelanggan` `pel` on((`p`.`id_pelanggan` = `pel`.`id_pelanggan`))) join `room` `r` on((`p`.`id_room` = `r`.`id_room`))) join `kategori_room` `kat` on((`r`.`id_kategori_room` = `kat`.`id_kategori_room`))) join `jenis_playstation` `jp` on((`r`.`id_jenis_playstation` = `jp`.`id_jenis_playstation`)));

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
