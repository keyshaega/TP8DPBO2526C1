<?php
class Database {
    private static $connection = null;

    public static function connect() {
        if (self::$connection === null) {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            try {
                self::$connection = new mysqli("localhost", "root", "", "tp_mvc25");
                self::$connection->set_charset("utf8mb4");
            } catch (mysqli_sql_exception $e) {
                die("Koneksi database gagal. Pastikan database tp_mvc25 sudah di-import: " . htmlspecialchars($e->getMessage()));
            }
        }
        return self::$connection;
    }
}
