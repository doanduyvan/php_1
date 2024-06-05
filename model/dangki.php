<?php
    include_once 'db.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $today = date('Y-m-d H:i:s');
   if($_SERVER['REQUEST_METHOD']=='POST'){
       $data = json_decode(file_get_contents('php://input'),true);  
        $name =   $data['name']; 
        $email = $data['email']; 
        $pass =   $data['pass']; 
       $sql = "INSERT INTO taikhoan(tentaikhoan,email,matkhau,vaitro,ngaytao)VALUES('$name','$email','$pass',0,'$today')";
      
       try{
            if($conn->query($sql)){
                $id = mysqli_insert_id($conn);
                 $sql = "INSERT INTO giohang(soluong,id_taikhoan)VALUES(0,$id)";
                 $conn->query($sql);
                echo json_encode(['thongbao'=>'Đăng kí tài khoản thành công']);
                // exit();
            }else{
                echo json_encode(['thongbao'=>'Lỗi truy vấn, vui lòng thử lại sau']);
                // exit();
            }
       }catch(Exception $err){
            $res = array();
            $res['thongbao'] = 'Email đã tồn tại';
            $res['err'] = $err->getMessage();
            echo json_encode($res);

       }
       
       
    }
       

   
?>