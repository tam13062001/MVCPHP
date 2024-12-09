<?php
    namespace app\controller;
    use app\model\User;
// require_once '../app/model/User.php';

class UserController {
    
    /**
     *
     */
    private $userModel;
    
    public function __construct() {
        $this->userModel = new User();
    }
    // login
    public function loginUser(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $user = $this->userModel->checkLogin($username,$password);
            if($user){

                $_SESSION['user'] = $username;          
                echo json_encode(["status" => "success", "message" => "Login success."]);
                
            }else{
                $_SESSION['wrong-login'] = "Tên đăng nhập hoặc mật khẩu không đúng."; 
                echo json_encode(["status" => "error", "message" => "Tên đăng nhập hoặc mật khẩu không đúng."]);
            }
                                   
        }else {
            require '../app/view/user_login.php';
        }
    }
    //logout
    public function logoutUser(){
        session_start();
        session_destroy();
        header("Location: /demo/MVC/public/index.php");
        exit();
        
    }

    // Show danh sách user
    public function listUsers() {
        $users = $this->userModel->getAllUsers();
        require '../app/view/user_list.php';
    }

    // Thêm user
    public function addUser () {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // nhận dữ liệu từ form
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $username = $_POST['username'];
            $password = $_POST['password'];// ma hoa passowrd
            
            
            // tạo 1 user mới theo dữ liệu mới được nhận
            $addUser = $this->userModel->addUser ($fullname, $email,$phone,$username,$password);
            header("Location: /demo/MVC/public/index.php?action=list");
        } else {
            require '../app/view/user_add.php';
        }
    }

    // edit thông tin user
    public function editUser ($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $this->userModel->updateUser ($id, $fullname, $email,$phone);
            header("Location: /demo/MVC/public/index.php?action=list");
        } else {
            $user = $this->userModel->getUserById($id);
            require '../app/view/user_edit.php';
        }
    }

    // xóa 1 user
    public function deleteUser ($id) {
        $this->userModel->deleteUser ($id);
        header("Location: /demo/MVC/public/index.php?action=list");
    }
}
?>