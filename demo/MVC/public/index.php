<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Autoload classes
spl_autoload_register(function ($class_name) {
    $file = '../' . str_replace('\\', '/', $class_name) . '.php';
    if (file_exists($file)) { 
        require_once $file;
    }
});

use app\controller\UserController;
$controller = new UserController();

$action = isset($_GET['action']) ? $_GET['action'] : 'login';

switch ($action) {
    case 'login':
        $controller->loginUser();
        break;
    case 'logout':
        $controller->logoutUser();
        break;
    case 'list':
        $controller->listUsers();
        break;
    case 'add':
        $controller->addUser();
        break;
    case 'edit':
        $id = $_GET['id'];
        $controller->editUser($id);
        break;
    case 'delete':
        $id = $_GET['id'];
        $controller->deleteUser($id);
        break;
    default:
        $controller->listUsers();
        break;
}
?>