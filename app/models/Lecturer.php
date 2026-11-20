<?php
require_once __DIR__ . '/../../config/database.php';

class Lecturer {
    private $db;
    public function __construct() { $this->db = Database::connect(); }

    public function getAll() {
        $result = $this->db->query("SELECT * FROM lecturers ORDER BY id DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM lecturers WHERE id = ?");
        $stmt->bind_param("i", $id); $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO lecturers (name, nidn, phone, join_date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $data["name"], $data["nidn"], $data["phone"], $data["join_date"]);
        return $stmt->execute();
    }
    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE lecturers SET name=?, nidn=?, phone=?, join_date=? WHERE id=?");
        $stmt->bind_param("ssssi", $data["name"], $data["nidn"], $data["phone"], $data["join_date"], $id);
        return $stmt->execute();
    }
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM lecturers WHERE id=?");
        $stmt->bind_param("i", $id); return $stmt->execute();
    }
}
