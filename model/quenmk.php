<?php


    
    include_once 'db.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $data = json_decode(file_get_contents('php://input'),true);
        $email = $data['email'];
        $sql = "SELECT * FROM taikhoan WHERE email = '$email'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $mk = $row['matkhau'];
            if(sendemail($email,$mk)){
                echo json_encode(['one' => 'Vui lòng check mail để xem mật khẩu']);
            }else{
                $kq = array('Mật khẩu của bạn là ' => $mk);
                echo json_encode($kq);
            }
        }else{
            echo json_encode(['one'=>'không tìm thấy tài khoản']);
        }
    }

    function sendemail($mailnhan,$mk){
        $tieude = "Nhận mật khẩu!";
        $noidung = "Mật khẩu của bạn là '" .$mk. "' vui lòng đừng quên nữa nhé! Thân ái cảm ơn!";
        $mailgui = "From: duyvanlee2001@gmail.com";
        if(mail($mailnhan,$tieude,$noidung,$mailgui)){
            return true;
        } return false;
    }

?>