<?php
    include_once 'db.php';
    include_once 'func.php';
    if(isset($_POST['btn-themdc'])){
        
        $typenum = array('id_taikhoan');
        $data = array();
        $data['ten'] = $_POST['first-name'];
        $data['dienthoai'] = $_POST['tel'];
        $data['diachi'] = $_POST['address'];
        $data['id_taikhoan'] = $_POST['id'];
     
        addrow($conn,'thongtintaikhoan',$data,$typenum);
        header('location: ../controller?page=thanhtoan');
        
    }

    if(isset($_GET['xoa']) && !empty($_GET['id'])){
        $id = $_GET['id'];
        delrow($conn,'thongtintaikhoan',$id);
        header('location: ../controller?page=thanhtoan');
    }
?>