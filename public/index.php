<?php
$controllerName = strtolower($_GET["controller"] ?? "lecturer");
$action = strtolower($_GET["action"] ?? "index");

$routes = [
    "lecturer" => ["class" => "LecturerController", "file" => __DIR__ . "/../app/controllers/LecturerController.php"],
    "course" => ["class" => "CourseController", "file" => __DIR__ . "/../app/controllers/CourseController.php"]
];

if (!isset($routes[$controllerName])) { http_response_code(404); exit("Controller tidak ditemukan."); }
require_once $routes[$controllerName]["file"];
$controller = new $routes[$controllerName]["class"]();
$allowedActions = ["index", "create", "edit", "delete"];
if (!in_array($action, $allowedActions, true) || !method_exists($controller, $action)) {
    http_response_code(404); exit("Halaman tidak ditemukan.");
}
$controller->$action();
