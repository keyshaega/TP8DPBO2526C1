<?php
require_once __DIR__ . '/../../config/database.php';

class Course {
    private $db;
    public function __construct() { $this->db = Database::connect(); }

    public function getAll() {
        $sql = "SELECT courses.*, lecturers.name AS lecturer_name
                FROM courses JOIN lecturers ON courses.lecturer_id = lecturers.id
                ORDER BY courses.id DESC";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM courses WHERE id=?");
        $stmt->bind_param("i", $id); $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO courses (course_name, course_code, credits, lecturer_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $data["course_name"], $data["course_code"], $data["credits"], $data["lecturer_id"]);
        return $stmt->execute();
    }
    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE courses SET course_name=?, course_code=?, credits=?, lecturer_id=? WHERE id=?");
        $stmt->bind_param("ssiii", $data["course_name"], $data["course_code"], $data["credits"], $data["lecturer_id"], $id);
        return $stmt->execute();
    }
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM courses WHERE id=?");
        $stmt->bind_param("i", $id); return $stmt->execute();
    }
}
