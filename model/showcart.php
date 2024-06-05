<?php
    include_once 'db.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $data = json_decode(file_get_contents('php://input'),true);
    $id_gh = $data['id'];
    $sql = "SELECT sp.id, sp.ten,sp.giakm,sp.hinh,ct.soluong,ct.id_giohang, ct.id as id_item FROM chitietgiohang ct LEFT JOIN sanpham sp ON ct.id_sanpham = sp.id
            WHERE ct.id_giohang = $id_gh";
    $result = $conn->query($sql);
    $sanpham = array();
    while($row = $result->fetch_assoc()){
        $sanpham[] = $row;
    }
    echo json_encode($sanpham);
    }
?>