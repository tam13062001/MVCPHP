
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/user.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <div class="main-content">
        <div class="wrapper">

        <form action="index.php?action=edit&id=<?php echo $user['id']; ?>" method="POST">
            <h1 class="center">Edit User</h1>
            <br><br>
            <table class="tbl-80">
                <tr>
                    <td>Full Name:  </td>
                    <td><input type="text" name="fullname" value="<?php echo htmlspecialchars($user['fullname']); ?>" required></td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td><input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required></td>
                </tr>

                <tr>
                    <td>Phone: </td>
                    <td><input type="text" name="phone" maxlength="10" value="<?php echo htmlspecialchars($user['phone']); ?>" required></td>
                </tr>

                <tr>
                    <td colspan="2" class="center">
                        <input type="submit" name="submit" value="Update User" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        </div>
    </div>
       
</body>
</html>