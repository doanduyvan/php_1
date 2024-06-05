<?php


function getdataALL($conn,$table,$where1,$vitri1,$where2,$vitri2) {
    $sql = "SELECT * FROM $table WHERE $where1 = $vitri1 AND $where2 = $vitri2";
    try{
        $rerult = $conn->query($sql);
        return $rerult -> fetch_assoc();
    }catch(Exception $err){
        return false;
    }
}

function getdata($conn,$table,$where = '',$vitri = false) {
    
    $sql = "SELECT * FROM $table";
    if($vitri){
       $sql .= " WHERE $where = $vitri"; 
    }
    try{
        $rerult = $conn->query($sql);
        if($vitri && $rerult->num_rows == 1){
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

function addrow($conn,$table,$data,$typedata=array()){
    
    $keys = implode(',',array_keys($data));
    $values = implode(',',array_values(array_map(function($key,$value) use ($typedata){
        return in_array($key,$typedata) ? ($value === '' ? 0 : $value)  :  "'".$value."'";
    },array_keys($data),$data)));
    $sql = "INSERT INTO $table($keys) VALUES ($values)";
    try{
        if($conn->query($sql)){
            return true;
        }
    return false;
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

function editrow($conn,$table,$vitri,$data,$typedata=array()){
    
    $array_values = array_map(function($key,$value) use ($typedata) {
        $value_tmp = in_array($key,$typedata) ? $value : "'".$value."'" ;
        return $key .'='. $value_tmp ;
    },array_keys($data),$data);
    $values = implode(',',$array_values);
    $sql = "UPDATE $table SET $values WHERE id = $vitri";
    try{
        $conn->query($sql);
         return true;
    }catch(Exception $err){
        return false;
    }
    
    

}

function move_file($file,$site){
    $name_file = basename($file['name']);
    $upload = $site . $name_file;
    if(file_exists($upload)){
        return true;
    }
    move_uploaded_file($file['tmp_name'],$upload);
    return true;
}

function move_file_ALL($file,$site){
      $name_files = $file['name'];
        foreach($name_files as $key => $value){
            $sitefull = $site . $value;
            if(!file_exists($sitefull)){
                move_uploaded_file($file['tmp_name'][$key],$sitefull);
            }
        }
  }
?>