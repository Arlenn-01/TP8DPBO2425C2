<?php

// Model Department menangani seluruh operasi data pada tabel departments.
class Department
{
    // Mengambil semua department dan mengurutkannya berdasarkan ID.
    public static function all(): array
    {
        return DB::connection()
            ->query('SELECT * FROM departments ORDER BY id')
            ->fetchAll();
    }

    // Mencari satu department berdasarkan ID untuk form edit.
    public static function find(int $id): ?array
    {
        $statement = DB::connection()->prepare('SELECT * FROM departments WHERE id = ?');
        $statement->execute([$id]);

        return $statement->fetch() ?: null;
    }

    // Menyimpan department baru dengan prepared statement.
    public static function create(string $name): void
    {
        $statement = DB::connection()->prepare('INSERT INTO departments (name) VALUES (?)');
        $statement->execute([$name]);
    }

    // Mengubah nama department berdasarkan ID.
    public static function update(int $id, string $name): void
    {
        $statement = DB::connection()->prepare('UPDATE departments SET name = ? WHERE id = ?');
        $statement->execute([$name, $id]);
    }

    // Menghapus department berdasarkan ID.
    public static function delete(int $id): void
    {
        $statement = DB::connection()->prepare('DELETE FROM departments WHERE id = ?');
        $statement->execute([$id]);
    }
}
