CREATE DATABASE IF NOT EXISTS tp_mvc25 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE tp_mvc25;

CREATE TABLE IF NOT EXISTS lecturers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    nidn VARCHAR(30) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    join_date DATE NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(120) NOT NULL,
    course_code VARCHAR(20) NOT NULL UNIQUE,
    credits TINYINT UNSIGNED NOT NULL,
    lecturer_id INT NOT NULL,
    CONSTRAINT fk_courses_lecturers
        FOREIGN KEY (lecturer_id) REFERENCES lecturers(id)
        ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO lecturers (name, nidn, phone, join_date) VALUES
('Dr. Andi Pratama, M.Kom.', '0012088501', '081234567890', '2020-01-10'),
('Siti Rahmawati, M.T.', '0021098802', '081298765432', '2021-08-15')
ON DUPLICATE KEY UPDATE name=VALUES(name);

INSERT INTO courses (course_name, course_code, credits, lecturer_id) VALUES
('Desain dan Pemrograman Berorientasi Objek', 'DPBO101', 3, 1),
('Struktur Data', 'IK202', 3, 2)
ON DUPLICATE KEY UPDATE course_name=VALUES(course_name);
