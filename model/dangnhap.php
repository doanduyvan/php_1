<?php
    session_start();
    include 'db.php';
	if(isset($_POST['btn-dn'])){
		$name = $_POST['email-dn'];
		$pass = $_POST['pass-dn'];
		$sql = "SELECT * FROM taikhoan WHERE email = '$name' AND matkhau = '$pass'";
		$result = $conn->query($sql);
		// echo $sql;
        // print_r($result);
        if($result->num_rows == 0){
            header('location: ../controller?page=login');
            $_SESSION['tbl'] = 'Sai tài khoản hoặc mật khẩu';
        }else{
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $_SESSION['vaitro'] = $row['vaitro'];
            $_SESSION['username'] = $row['tentaikhoan'];
            $_SESSION['id_taikhoan'] = $id;
            $sql = "SELECT * FROM giohang WHERE id_taikhoan = $id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $_SESSION['id_giohang'] = $row['id'];
            if($_SESSION['vaitro']==1){
                header('location: ../controller?admin');
            }else{
				header('location: ../controller');
            }
        }
	}


?>