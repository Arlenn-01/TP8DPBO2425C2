-- Membuat database aplikasi jika database belum tersedia.
CREATE DATABASE IF NOT EXISTS db_lecturers CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Memilih database agar semua perintah tabel berikut dijalankan di database yang benar.
USE db_lecturers;

-- Tabel departments menjadi sisi satu pada relasi one-to-many.
CREATE TABLE departments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

-- Tabel lecturers menyimpan data dosen dan department_id sebagai foreign key.
CREATE TABLE lecturers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  nidn VARCHAR(30) NOT NULL,
  phone VARCHAR(30) NOT NULL,
  join_date DATE NOT NULL,
  department_id INT NULL,

  -- Menghubungkan lecturer ke department dan menghapus lecturer saat department dihapus.
  CONSTRAINT fk_lecturer_department FOREIGN KEY (department_id)
    REFERENCES departments(id) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

-- Tabel courses menyimpan mata kuliah beserta lecturer pengampunya.
CREATE TABLE courses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  lecturer_id INT NOT NULL,

  -- Menghubungkan course ke lecturer dan menghapus course saat lecturer dihapus.
  CONSTRAINT fk_course_lecturer FOREIGN KEY (lecturer_id)
    REFERENCES lecturers(id) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

-- Data awal department untuk pengujian aplikasi.
INSERT INTO departments (name) VALUES
('Teknik Informatika'), ('Sistem Informasi'), ('Teknik Elektro');

-- Data awal lecturer beserta department_id yang menghubungkannya.
INSERT INTO lecturers (name, nidn, phone, join_date, department_id) VALUES
('Dian Pratama', '0012345678', '081234567890', '2021-08-16', 1),
('Siti Rahma', '0023456789', '081298765432', '2022-01-10', 2),
('Arif Wijaya', '0034567890', '081345678901', '2020-09-01', 3);

-- Data awal course beserta lecturer_id yang menjadi pengampunya.
INSERT INTO courses (name, lecturer_id) VALUES
('Pemrograman Berorientasi Objek', 1),
('Basis Data', 2),
('Rangkaian Digital', 3);
