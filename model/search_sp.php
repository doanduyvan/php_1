<?php
    include_once 'db.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $data = json_decode(file_get_contents('php://input'),true);
        $value_search = $data['key'];

        $mang_value = explode(" ",trim($value_search));
        array_unshift($mang_value,trim($value_search));
        
        $mang_trave = array();
        $ids_sp = array();

        foreach($mang_value as $value){
            $sql = "SELECT * FROM sanpham WHERE CONCAT(' ', ten, ' ') LIKE '%$value%'";
            try{
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    if(!in_array($row['id'],$ids_sp)){
                        array_push($ids_sp,$row['id']);
                        $mang_trave[] = $row;
                    }
                }
            }catch(Exception $err){

            }
            if(count($mang_trave) == 4){
                break;
            }
        }

        echo json_encode($mang_trave);
    }

?>