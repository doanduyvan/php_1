<?php
include_once 'db.php';
include_once 'func.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = json_decode(file_get_contents('php://input'),true);
    $id_gh = $data['id_gh'];
    $id_sp = $data['id_sp'];
    $sl = $data['sl'];
    $xacnhan = $data['del'];
    $sanpham = getdataALL($conn,'chitietgiohang','id_sanpham',$id_sp,'id_giohang',$id_gh);
    
    if($sanpham){
        // sửa số lượng

        if($xacnhan==0){
            // cộng thêm sản phẩm vào
        $sl_old = $sanpham['soluong'];
        $sl_new = (int)$sl_old + (int)$sl;
        $id_ct = $sanpham['id'];
        $typenum = array('soluong');
        $up_new = array('soluong'=>$sl_new);
        editrow($conn,'chitietgiohang',$id_ct,$up_new,$typenum); 
        }else{
            // thay đổi số lượng trực tiếp
        $id_ct = $sanpham['id'];
        $typenum = array('soluong');
        $up_new = array('soluong'=>$sl);
        editrow($conn,'chitietgiohang',$id_ct,$up_new,$typenum);
        }

        
    }else{

        $typenum = array('soluong','id_giohang','id_sanpham');
        $input = array();
        $input['soluong'] = $sl;
        $input['id_giohang'] = $id_gh;
        $input['id_sanpham'] = $id_sp;
        addrow($conn,'chitietgiohang',$input,$typenum);
    }

    echo json_encode(['true']);
}

?>