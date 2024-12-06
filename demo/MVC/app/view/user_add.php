
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/user.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    <div class="main-content">
        <div class="wrapper">
            <h1 class="center">Add User</h1>

            <form action="index.php?action=add" method="POST" >
            <table class="tbl-80">
                <tr>
                    <td>Full Name:  </td>
                    <td><input type="text" name="fullname" placeholder="Enter Full Name" required></td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td><input type="email" name="email" placeholder="Enter Email" required></td>
                </tr>

                <tr>
                    <td>Phone: </td>
                    <td><input type="text" name="phone" maxlength="10" placeholder="Enter User's phone"required></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Enter Username"required></td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Enter password"required></td>
                </tr>

                <tr>
                    <td colspan="2" class="center">
                        <input type="submit" name="submit" value="Add User" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        </div>
    </div>
    
    

</body>
</html>

