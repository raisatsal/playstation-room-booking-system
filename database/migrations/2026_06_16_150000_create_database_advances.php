<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Buat View Laporan Pemesanan
        DB::statement("
            CREATE OR REPLACE VIEW view_laporan_pemesanan AS
            SELECT 
                p.id_pemesanan,
                p.kode_pemesanan,
                p.tanggal_pemesanan,
                p.jam_mulai,
                p.jam_selesai,
                p.durasi_jam,
                p.total_harga,
                p.metode_pembayaran,
                p.status_pembayaran,
                p.status_pemesanan,
                p.created_at,
                pel.nama_pelanggan,
                pel.nomor_telepon,
                r.kode_room,
                r.nama_room,
                kat.nama_kategori,
                jp.nama_playstation
            FROM pemesanan p
            JOIN pelanggan pel ON p.id_pelanggan = pel.id_pelanggan
            JOIN room r ON p.id_room = r.id_room
            JOIN kategori_room kat ON r.id_kategori_room = kat.id_kategori_room
            JOIN jenis_playstation jp ON r.id_jenis_playstation = jp.id_jenis_playstation
        ");

        // 2. Buat Stored Procedure untuk Selesaikan Pemesanan
        DB::unprepared("
            DROP PROCEDURE IF EXISTS sp_selesaikan_pemesanan;
            CREATE PROCEDURE sp_selesaikan_pemesanan(IN in_id_pemesanan INT)
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
            END
        ");

        // 3. Buat Trigger Setelah Insert Pemesanan (Room otomatis dipakai jika pemesanan aktif)
        DB::unprepared("
            DROP TRIGGER IF EXISTS tr_after_insert_pemesanan;
            CREATE TRIGGER tr_after_insert_pemesanan
            AFTER INSERT ON pemesanan
            FOR EACH ROW
            BEGIN
                IF NEW.status_pemesanan = 'aktif' THEN
                    UPDATE room SET status_room = 'dipakai' WHERE id_room = NEW.id_room;
                END IF;
            END
        ");

        // 4. Buat Trigger Setelah Update Pemesanan (Sinkronisasi status room berdasarkan status pemesanan)
        DB::unprepared("
            DROP TRIGGER IF EXISTS tr_after_update_pemesanan;
            CREATE TRIGGER tr_after_update_pemesanan
            AFTER UPDATE ON pemesanan
            FOR EACH ROW
            BEGIN
                -- Jika selesai atau dibatalkan, kembalikan room ke tersedia
                IF NEW.status_pemesanan = 'selesai' OR NEW.status_pemesanan = 'dibatalkan' THEN
                    UPDATE room SET status_room = 'tersedia' WHERE id_room = NEW.id_room;
                -- Jika status pemesanan diubah kembali ke aktif
                ELSEIF NEW.status_pemesanan = 'aktif' THEN
                    UPDATE room SET status_room = 'dipakai' WHERE id_room = NEW.id_room;
                END IF;
            END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_laporan_pemesanan");
        DB::unprepared("DROP PROCEDURE IF EXISTS sp_selesaikan_pemesanan");
        DB::unprepared("DROP TRIGGER IF EXISTS tr_after_insert_pemesanan");
        DB::unprepared("DROP TRIGGER IF EXISTS tr_after_update_pemesanan");
    }
};
