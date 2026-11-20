<?php
require_once __DIR__ . '/../models/Course.php';
require_once __DIR__ . '/../models/Lecturer.php';

class CourseController {
    private $model; private $lecturerModel;
    public function __construct() { $this->model = new Course(); $this->lecturerModel = new Lecturer(); }

    public function index() {
        $courses = $this->model->getAll(); $pageTitle = "Data Mata Kuliah";
        require __DIR__ . '/../views/courses/index.php';
    }
    public function create() {
        $errors = []; $lecturers = $this->lecturerModel->getAll(); $course = null;
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = $this->validate($_POST, $errors);
            if (!$errors) {
                $this->model->create($data);
                header("Location: index.php?controller=course&action=index&status=created"); exit;
            }
        }
        $formAction = "create"; $pageTitle = "Tambah Mata Kuliah";
        require __DIR__ . '/../views/courses/form.php';
    }
    public function edit() {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        $course = $id ? $this->model->find($id) : null;
        if (!$course) { header("Location: index.php?controller=course&action=index&status=notfound"); exit; }
        $errors = []; $lecturers = $this->lecturerModel->getAll();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = $this->validate($_POST, $errors);
            if (!$errors) {
                $this->model->update($id, $data);
                header("Location: index.php?controller=course&action=index&status=updated"); exit;
            }
            $course = array_merge($course, $_POST);
        }
        $formAction = "edit&id=" . $id; $pageTitle = "Edit Mata Kuliah";
        require __DIR__ . '/../views/courses/form.php';
    }
    public function delete() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
            if ($id) $this->model->delete($id);
        }
        header("Location: index.php?controller=course&action=index&status=deleted"); exit;
    }
    private function validate($input, &$errors) {
        $data = [
            "course_name" => trim($input["course_name"] ?? ""),
            "course_code" => trim($input["course_code"] ?? ""),
            "credits" => filter_var($input["credits"] ?? "", FILTER_VALIDATE_INT),
            "lecturer_id" => filter_var($input["lecturer_id"] ?? "", FILTER_VALIDATE_INT)
        ];
        if ($data["course_name"] === "") $errors[] = "Nama mata kuliah wajib diisi.";
        if ($data["course_code"] === "") $errors[] = "Kode mata kuliah wajib diisi.";
        if (!$data["credits"] || $data["credits"] < 1) $errors[] = "SKS harus berupa angka minimal 1.";
        if (!$data["lecturer_id"]) $errors[] = "Pilih dosen pengampu.";
        if (!$this->lecturerModel->find((int)$data["lecturer_id"])) $errors[] = "Dosen yang dipilih tidak ditemukan.";
        return $data;
    }
}
