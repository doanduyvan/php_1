<?php


function getdata($conn,$table,$where = '',$vitri = false) {
    $sql = "SELECT * FROM $table";
    if($vitri){
       $sql .= " WHERE $where = $vitri"; 
    }
    try{
        $rerult = $conn->query($sql);
        if($vitri){
            return $rerult -> fetch_assoc();
        }
        $data = array();
        if($rerult->num_rows >0 ){
            while($row = $rerult->fetch_assoc()){
            $data[] = $row;
            }
        }
        return $data;
    }catch(Exception $err){
        return false;
    }

}


function delrow($conn,$table,$vitri){
    
    $sql = "DELETE FROM $table WHERE id = $vitri";
    if($conn->query($sql)){
        return true;
    } return false;
}

?>