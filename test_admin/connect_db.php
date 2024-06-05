<?php
$host = "localhost";
$user = "root";
$password = "duyvan2001";
$database = "asm_php1";
$con = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()){
    echo "Connection Fail: ".mysqli_connect_errno();exit;
}