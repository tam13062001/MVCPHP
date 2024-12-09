<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/user.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="main-content">
        <div class="wrapper">
        <form action="index.php?action=login" method="POST" id="loginForm">
            <h1 class="center">Login Page</h1>

            <div class="center">
                <?php 
                if(isset($_SESSION['wrong-login'])){
                    echo $_SESSION['wrong-login'];
                    unset($_SESSION['wrong-login']);
                }
            ?>
            </div>
            
            <br><br>
            <table class="tbl-80">
                <tr>
                    <td>Username  </td>
                    <td><input type="text" name="username" placeholder="Enter your username" required></td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Enter your password" required></td>
                </tr>


                <tr>
                    <td colspan="2" class="center">
                        <button type="button"class="btn-secondary" id="submitButton">Login</button>
                        <!-- <input type="submit" name="submit" value="login" class="btn-secondary"> -->
                    </td>
                </tr>
            </table>
        </form>
        <p class="center">Don't have an account? <a href="register.php">Register here</a></p>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#submitButton').click(function(event) {
                event.preventDefault(); 

                $.ajax({
                    url: 'index.php?action=login', // Địa chỉ endpoint xử lý đăng nhập
                    type: 'POST',
                    data: $('#loginForm').serialize(), // Lấy dữ liệu từ form
                    success: function(response) {
                        var data = JSON.parse(response); // Phân tích cú pháp phản hồi JSON
                        if (data.status == "success") {
                            $('#message').text(data.message); // Hiển thị thông điệp thành công
                            window.location.href = 'index.php?action=list'; // Chuyển hướng đến trang danh sách người dùng
                        } else {
                            $('#message').text(data.message); // Hiển thị thông điệp lỗi
                        }
                    },
                    error: function() {
                        $('#message').text('Có lỗi xảy ra. Vui lòng thử lại.');
                    }
                });
            });
        });
    </script>
</body>
</html>

