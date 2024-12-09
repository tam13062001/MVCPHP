<?php

namespace app\model;

use config\config;
use PDO;
use PDOException;

// require_once '../config/config.php';

class User {

    private $pdo;

    public function __construct() {
        $database = new config();
        $this->pdo = $database->getConnection() ;
    }
    // dang ki user 
    
    // kiem tra username, password de login
    public function checkLogin($username, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM tbl_users 
                                    WHERE username = :username AND password =:password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        
        // kiem tra xem co ton tai user co username va password da nhap hay khong
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return true; // Đăng nhập thành công           
        }
        return false; // Đăng nhập thất bại
    }
    /**
     *  Lấy hết dữ liệu trong tbl_users;
     */
    public function getAllUsers() {
        // chuẩn bị câu lệnh sql
        $stmt = $this->pdo->prepare("SELECT * FROM tbl_users");
        // thực thi cậu lệnh
        $stmt->execute();
        // lấy tất cả hàng trong bảng và trả về dưới dạng mảng
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Lấy dữ liệu theo ID
    public function getUserById($id) {

        $stmt = $this->pdo->prepare("SELECT * FROM tbl_users WHERE id = :id");
        // liên kết biến $id vào giá trị id trong câu lệnh sql
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // kiểm tra username đã có tồn tại trong bảng hay chưa
    public function isUsernameExists($username) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM tbl_users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetchColumn() > 0; // Trả về true nếu có ít nhất 1 bản ghi
    }

    // kiểm tra email đã có tồn tại trong bảng hay chưa
    public function isEmailExists($email) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM tbl_users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0; // Trả về true nếu có ít nhất 1 bản ghi
    }

    // Thêm 1 user 
    public function addUser ($fullname, $email,$phone,$username,$password) {
        if($this->isUsernameExists($username)){

            return false;// da ton tai username
        }

        if($this->isEmailExists($email)){
            return false;// da ton tai username
        }

        $stmt = $this->pdo->prepare("INSERT INTO tbl_users (fullname, email, phone, username, password) 
                                    VALUES (:fullname, :email, :phone, :username, :password)");
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':password',$password);
        return $stmt->execute();
    }

    // edit thông tin user
    public function updateUser ($id, $fullname, $email, $phone) {
        $stmt = $this->pdo->prepare("UPDATE tbl_users 
                                    SET fullname = :fullname, email = :email,phone = :phone 
                                    WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        return $stmt->execute();
    }

    // xóa user theo id
    public function deleteUser ($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tbl_users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>