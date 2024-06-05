<?php
    include 'db.php';
    include 'func.php';

    // thêm sản phẩm
    if(isset($_POST['btn-them'])){
        $tb_sanpham = 'sanpham';
        $typenum_sanpham = array('giagoc','giakm','soluong','id_danhmucsp');
        $sanpham = array();
        $sanpham['ten'] = $_POST['ten'];
        $sanpham['giagoc'] = $_POST['giagoc'];
        $sanpham['giakm'] = $_POST['giakm'];
        $sanpham['soluong'] = $_POST['soluong'];
        $sanpham['motangan'] = $_POST['motangan'];
        $sanpham['motadai'] = $_POST['motadai'];
        $sanpham['hinh'] = $_FILES['anhdaidien']['name'];
        $sanpham['id_danhmucsp'] = $_POST['danhmuc'];
        $sanpham['masp'] = $_POST['masp'];
        
        $kq = addrow($conn,$tb_sanpham,$sanpham,$typenum_sanpham);
        if($kq){
            $site = "C:/xampp/htdocs/PHP1_xampp/ASM_PHP1_xampp/uploads/";
            move_file($_FILES['anhdaidien'],$site);
            $id = mysqli_insert_id($conn);

            $tb_hinhsp = 'hinhsp';
            $typenum_hinhsp = array('id_sanpham');
            $hinhsp = array();
            $hinhsp['id_sanpham'] = $id;
            foreach($_FILES['anhmota']['name'] as $key => $value){
                $hinhsp['hinh'] = $value;
                addrow($conn,$tb_hinhsp,$hinhsp,$typenum_hinhsp);
                move_file_ALL($_FILES['anhmota'],$site);
            } 
            header('location: ../controller?admin');
        }else{
            echo "mã sản phẩm bị trùng";
            echo "<br> <a href='../controller?admin'>Click vào đây để quay lại</a>";
        }
        
       
      
    }

    // sửa sản phẩm

    if(isset($_POST['btn-sua'])){
        $site = "C:/xampp/htdocs/PHP1_xampp/ASM_PHP1_xampp/uploads/";
        $tb_sanpham = 'sanpham';
        $typenum_sanpham = array('giagoc','giakm','soluong','id_danhmucsp');
        $id = $_POST['id'];
        $sanpham = array();
        $sanpham['ten'] = $_POST['ten'];
        $sanpham['giagoc'] = $_POST['giagoc'];
        $sanpham['giakm'] = $_POST['giakm'];
        $sanpham['soluong'] = $_POST['soluong'];
        $sanpham['motangan'] = $_POST['motangan'];
        $sanpham['motadai'] = $_POST['motadai'];
        $sanpham['hinh'] = $_FILES['anhdaidien']['name'];
        $sanpham['id_danhmucsp'] = $_POST['danhmuc'];
        $sanpham['masp'] = $_POST['masp'];
        $anhmota = $_FILES['anhmota']['name'];

        if(empty($sanpham['hinh'])){
            unset($sanpham['hinh']);
        }else{
            move_file($_FILES['anhdaidien'],$site);
        }

         $kq = editrow($conn,'sanpham',$id,$sanpham,$typenum_sanpham);
        if($kq){
            if(!empty($anhmota[0])){
            $tb_hinhsp = 'hinhsp';
            $hinh_old = getdata($conn,$tb_hinhsp,'id_sanpham',$id);
            if($hinh_old){
                if(isset($hinh_old[0])){
                    foreach($hinh_old as $key => $value){
                     delrow($conn,$tb_hinhsp,$value['id']);
                    }
                }else{
                    delrow($conn,$tb_hinhsp,$hinh_old['id']);
                }
                 
            }
            
            $typenum_hinhsp = array('id_sanpham');
            $hinhsp = array();
            $hinhsp['id_sanpham'] = $id;
            foreach($_FILES['anhmota']['name'] as $key => $value){
                $hinhsp['hinh'] = $value;
                addrow($conn,$tb_hinhsp,$hinhsp,$typenum_hinhsp);
                move_file_ALL($_FILES['anhmota'],$site);
            } 
            }
            header('location: ../controller?admin');
        }else{
            echo "mã sản phẩm bị trùng";
            echo "<br> <a href='../controller?admin'>Click vào đây để quay lại</a>";
        }
        
    }

    // xóa sản phẩm

        if(isset($_POST['xoa_sp'])){
            $id = $_POST['xoa_sp'];
            $tb_hinhsp = 'hinhsp';
            $hinh_old = getdata($conn,$tb_hinhsp,'id_sanpham',$id);
            if($hinh_old){
                if(isset($hinh_old[0])){
                    foreach($hinh_old as $key => $value){
                     delrow($conn,$tb_hinhsp,$value['id']);
                    }
                }else{
                    delrow($conn,$tb_hinhsp,$hinh_old['id']);
                }
            }
            delrow($conn,'sanpham',$id);
        header('location: ../controller?admin');
        }


?>