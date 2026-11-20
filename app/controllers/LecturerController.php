<?php
require_once __DIR__ . '/../models/Lecturer.php';

class LecturerController {
    private $model;
    public function __construct() { $this->model = new Lecturer(); }

    public function index() {
        $lecturers = $this->model->getAll();
        $pageTitle = "Data Dosen";
        require __DIR__ . '/../views/lecturers/index.php';
    }
    public function create() {
        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = $this->validate($_POST, $errors);
            if (!$errors) {
                $this->model->create($data);
                header("Location: index.php?controller=lecturer&action=index&status=created"); exit;
            }
        }
        $lecturer = null; $formAction = "create";
        $pageTitle = "Tambah Dosen";
        require __DIR__ . '/../views/lecturers/form.php';
    }
    public function edit() {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        $lecturer = $id ? $this->model->find($id) : null;
        if (!$lecturer) { header("Location: index.php?controller=lecturer&action=index&status=notfound"); exit; }
        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = $this->validate($_POST, $errors);
            if (!$errors) {
                $this->model->update($id, $data);
                header("Location: index.php?controller=lecturer&action=index&status=updated"); exit;
            }
            $lecturer = array_merge($lecturer, $_POST);
        }
        $formAction = "edit&id=" . $id; $pageTitle = "Edit Dosen";
        require __DIR__ . '/../views/lecturers/form.php';
    }
    public function delete() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
            if ($id) $this->model->delete($id);
        }
        header("Location: index.php?controller=lecturer&action=index&status=deleted"); exit;
    }
    private function validate($input, &$errors) {
        $data = [
            "name" => trim($input["name"] ?? ""),
            "nidn" => trim($input["nidn"] ?? ""),
            "phone" => trim($input["phone"] ?? ""),
            "join_date" => trim($input["join_date"] ?? "")
        ];
        foreach ($data as $key => $value) if ($value === "") $errors[] = ucfirst(str_replace("_", " ", $key)) . " wajib diisi.";
        return $data;
    }
}
