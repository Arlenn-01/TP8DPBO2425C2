<?php

// Model Lecturer menangani seluruh operasi data pada tabel lecturers.
class Lecturer
{
    // Mengambil semua lecturer beserta nama department hasil JOIN.
    public static function all(): array
    {
        $sql = 'SELECT l.*, d.name AS department_name
                FROM lecturers l
                LEFT JOIN departments d ON d.id = l.department_id
                ORDER BY l.id';

        return DB::connection()->query($sql)->fetchAll();
    }

    // Mencari satu lecturer berdasarkan ID untuk ditampilkan pada form edit.
    public static function find(int $id): ?array
    {
        $statement = DB::connection()->prepare('SELECT * FROM lecturers WHERE id = ?');
        $statement->execute([$id]);

        return $statement->fetch() ?: null;
    }

    // Menambahkan lecturer baru beserta department_id yang dipilih.
    public static function create(array $data): void
    {
        $statement = DB::connection()->prepare(
            'INSERT INTO lecturers (name, nidn, phone, join_date, department_id)
             VALUES (?, ?, ?, ?, ?)'
        );
        $statement->execute([
            $data['name'],
            $data['nidn'],
            $data['phone'],
            $data['join_date'],
            $data['department_id'],
        ]);
    }

    // Memperbarui seluruh kolom lecturer berdasarkan ID.
    public static function update(int $id, array $data): void
    {
        $statement = DB::connection()->prepare(
            'UPDATE lecturers
             SET name = ?, nidn = ?, phone = ?, join_date = ?, department_id = ?
             WHERE id = ?'
        );
        $statement->execute([
            $data['name'],
            $data['nidn'],
            $data['phone'],
            $data['join_date'],
            $data['department_id'],
            $id,
        ]);
    }

    // Menghapus lecturer berdasarkan ID.
    public static function delete(int $id): void
    {
        $statement = DB::connection()->prepare('DELETE FROM lecturers WHERE id = ?');
        $statement->execute([$id]);
    }
}
