
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/user.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="main-content">
        <div class="wrapper">

        

        <form action="index.php?action=login" method="POST">
            <h1 class="center">Login Page</h1>

            <div class="center">
                <?php 
                if(isset($_SESSION['login-faild'])){
                    echo $_SESSION['login-faild'];
                    unset($_SESSION['login-faild']);
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
                        <input type="submit" name="submit" value="login" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        </div>
    </div>
       
</body>
</html>

