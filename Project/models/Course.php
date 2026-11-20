<?php

// Model Course menangani seluruh operasi data pada tabel courses.
class Course
{
    // Mengambil course beserta nama lecturer dari relasi one-to-many.
    public static function all(): array
    {
        $sql = 'SELECT c.*, l.name AS lecturer_name
                FROM courses c
                JOIN lecturers l ON l.id = c.lecturer_id
                ORDER BY c.id';

        return DB::connection()->query($sql)->fetchAll();
    }

    // Mencari satu course berdasarkan ID untuk form edit.
    public static function find(int $id): ?array
    {
        $statement = DB::connection()->prepare('SELECT * FROM courses WHERE id = ?');
        $statement->execute([$id]);

        return $statement->fetch() ?: null;
    }

    // Menyimpan course baru beserta lecturer pengampunya.
    public static function create(array $data): void
    {
        $statement = DB::connection()->prepare(
            'INSERT INTO courses (name, lecturer_id) VALUES (?, ?)'
        );
        $statement->execute([$data['name'], $data['lecturer_id']]);
    }

    // Memperbarui nama dan lecturer pengampu course berdasarkan ID.
    public static function update(int $id, array $data): void
    {
        $statement = DB::connection()->prepare(
            'UPDATE courses SET name = ?, lecturer_id = ? WHERE id = ?'
        );
        $statement->execute([$data['name'], $data['lecturer_id'], $id]);
    }

    // Menghapus course berdasarkan ID.
    public static function delete(int $id): void
    {
        $statement = DB::connection()->prepare('DELETE FROM courses WHERE id = ?');
        $statement->execute([$id]);
    }
}
