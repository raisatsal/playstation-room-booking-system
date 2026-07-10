-- =====================================================================
-- SKRIP BUAT USER DATABASE UNTUK MULTI DATABASE USER
-- Jalankan skrip ini menggunakan akun 'root' di HeidiSQL atau MySQL CLI
-- =====================================================================

-- Hapus user jika sudah ada sebelumnya (untuk menghindari error)
DROP USER IF EXISTS 'db_admin_playstation'@'localhost';
DROP USER IF EXISTS 'db_operator_playstation'@'localhost';

-- 1. Buat User Admin (Hak Akses Penuh / Full Privileges)
CREATE USER 'db_admin_playstation'@'localhost' IDENTIFIED BY 'admin123';
GRANT ALL PRIVILEGES ON db_room_playstation.* TO 'db_admin_playstation'@'localhost';

-- 2. Buat User Operator (Hak Akses Terbatas: Hanya Select, Insert, Update, dan Execute Stored Procedure)
CREATE USER 'db_operator_playstation'@'localhost' IDENTIFIED BY 'operator123';
GRANT SELECT, INSERT, UPDATE, EXECUTE ON db_room_playstation.* TO 'db_operator_playstation'@'localhost';

-- Terapkan perubahan hak akses
FLUSH PRIVILEGES;

-- Tampilkan status user yang telah dibuat untuk memastikan berhasil
SELECT user, host FROM mysql.user WHERE user LIKE 'db_%';
