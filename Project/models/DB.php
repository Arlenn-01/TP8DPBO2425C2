<?php

// Class DB menyediakan satu objek koneksi PDO yang dapat dipakai seluruh model.
class DB
{
    // Menyimpan koneksi statis agar tidak membuat koneksi berulang kali.
    private static ?PDO $pdo = null;

    // Mengembalikan koneksi database; koneksi baru dibuat hanya sekali.
    public static function connection(): PDO
    {
        // Membuat koneksi jika objek koneksi belum tersedia.
        if (self::$pdo === null) {
            // Membaca kredensial dan nama database dari file konfigurasi.
            $config = require __DIR__ . '/../config/config.php';

            // Menyusun DSN MySQL beserta nama database dan karakter UTF-8.
            $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset=utf8mb4";

            // Membuat PDO dan mengatur error serta format hasil fetch.
            self::$pdo = new PDO($dsn, $config['user'], $config['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        }

        // Mengembalikan objek koneksi yang sudah tersedia.
        return self::$pdo;
    }
}
