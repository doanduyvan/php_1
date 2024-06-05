<?php
    include_once 'admin_func.php';
    if(empty($_GET['id'])){
        header('location: ?admin=user');
    }
    $id_tk = $_GET['id'];
    // $data = getdata($conn,'giohang','id_taikhoan',$id_tk);
    // $id_gh = $data['id'];
    // delrow($conn,'giohang',$id_gh);
    delrow($conn,'taikhoan',$id_tk);
    header('location: ?admin=user');
?>