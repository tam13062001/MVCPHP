<?php 
    $conn = mysqli_connect("free02.123host.vn","shrsnaop_demo","Unefxx2QR8MC7r47dTuj","shrsnaop_demo");
    $respone = array();
    if($conn){
        $sql = "SELECT * FROM tbl_users";
        $result = mysqli_query($conn,$sql);
        if($result){
            $x =0;
            while($row = mysqli_fetch_assoc($result)){
                $respone[$x]['id'] = $row['id'];
                $respone[$x]['fullname'] = $row['fullname'];
                $respone[$x]['email'] = $row['email'];
                $respone[$x]['phone'] = $row['phone'];
                $respone[$x]['username'] = $row['username'];
                $respone[$x]['password'] = $row['password'];
                $x++;
            }
            echo json_encode($respone, JSON_PRETTY_PRINT);
        }
    }
    else{
        echo "data ket noi sai ";
    }
?>
