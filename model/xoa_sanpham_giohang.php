
<?php
    include_once 'db.php';
    include_once 'func.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $data = json_decode(file_get_contents('php://input'),true);
        $id = $data['id'];
        delrow($conn,'chitietgiohang',$id);
        echo json_encode(['true']);
        
    }

?>