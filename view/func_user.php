<?php

function getarrayData($conn,$table,$where = '',$vitri = false) {
    
    $sql = "SELECT * FROM $table";
    if($vitri){
       $sql .= " WHERE $where = $vitri"; 
    }
    try{
        $data = array();
        $rerult = $conn->query($sql);
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


function catchuoi($chuoi, $soTu) {
    $dauCham = ' ...';
    // $mangTu = str_word_count($chuoi, 1); 
    $mangTu = explode(' ',$chuoi);
    $soTuTrongChuoi = count($mangTu);

    if ($soTuTrongChuoi <= $soTu) {
        return $chuoi; 
    } else {
        $mangTuCat = array_slice($mangTu, 0, $soTu); 
        $chuoiCat = implode(' ', $mangTuCat); 
        return $chuoiCat . $dauCham; 
    }
}
?>