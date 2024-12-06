<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title> Home Page</title>
        <link rel="stylesheet" href="../css/user.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
<body>
    <div class="main-">
        <div class="wrapper">
            <h1>User List</h1>
            <br />
            <a href="index.php?action=add"class="btn btn-primary">Add User</a>
            <a href="index.php?action=login" class="right btn btn-danger">Logout</a>
            <br /><br /><br />
                <table class="tbl-full">
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        $sn = 1;
                        foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['fullname']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo htmlspecialchars($user['phone']); ?></td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td>
                            <a href="index.php?action=edit&id=<?php echo $user['id'];  ?>" class="btn btn-secondary">Update User</a>                           
                            <button class="delete-btn" data-toggle="modal" data-target="#confirmDeleteModal" data-id="<?php echo $id; ?>">Delete User</button>
                        </td> 
                    </tr>
                    <?php endforeach; ?>
                                              
                </table>
        </div>
    </div>

    <!-- Modal Xác Nhận Xóa -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Xác Nhận Xóa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa user này không?
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                <a href="index.php?action=delete&id=<?php echo $user['id']; ?>" class="btn btn-danger">Delete User</a>                
            </div>
        </div>
    </div>
</div>
    
</body>
</html>