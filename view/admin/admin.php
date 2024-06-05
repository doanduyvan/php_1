
<?php

    if(isset($_GET['dangxuat'])){
        session_unset();
    }
    if(!isset($_SESSION['id_taikhoan']) || $_SESSION['vaitro'] == 0){
        header('location: ?page=login');
    }
	$username = $_SESSION['username'];
    
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .section1{
            max-width: 1500px;
            margin: 0 auto;
            margin-top: 30px;
            box-shadow: 0 0 10px gray;
            display: flex;
            border-radius: 10px;
        }
        .aside{
            width: 180px;
            border-right: 1px solid gray;
        }
        .main{
            flex: 1;
            padding: 20px;
        }
        .list ul{
            list-style: none;
            margin: 0;
            display: inline;
            width: 100%;
        }
        .list a{
        text-decoration: none;
        color: black;
        }
        .list li{
            display: block;
            padding: 10px 20px;
            border-bottom: 1px solid gray;
        }
        .list li:last-child{
            border: none;
        }
        .list li:hover a{
            color: orange;
        }
        .user{
            padding: 20px 0;
            text-align: center;
        }
        .user h3{
            padding: 0;
            margin: 0;
            text-align: center;
        }
        .bang table{
            border-collapse: collapse;
            width: 100%;
        }
        .bang table th{
            padding: 10px;
        }
        .bang table td{
            padding: 10px;
        }
        .bang table td:nth-child(8),
        .bang table td:nth-child(9){
            text-align: center;
        }
        .bang table td a{
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
        .bang table td a:hover{
            color: orange;
        }
        .them{
            width: 100%;
        }
        .them .item{
            margin-top: 15px;
        }
        .them .item>*:last-child{
            display: block;
            width: 98%;
            outline: none;
            padding: 8px;
            
        }
        .btn-them{
            padding: 10px 20px;
            border-radius: 10px;
            border: 1px solid gray;
            background-color: green;
            color: white;
        }
        .btn-them:hover{
            transform: scale(1.1);
        }
        .showimg{
            width: 200px;
            margin-top: 35px;
        }
        .showimg img{
            width: 100%;
        }
        .hinhitem{
            width: 200px;
        }
        .hinhitem img{
            width: 100%;
        }
        .anhmota{
            display: flex;
            gap: 15px;
        }
        .item.avt, .item.mt{
            border: 1px solid gray;
            border-radius: 10px;
            padding: 10px;
        }
        .hinh{
            width: 200px;
        }
        .hinh img{
            width: 100%;
        }
        .bang td{
            text-align: center;
        }
        .user>a{
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: gray;
        }
        .user>a:hover{
            color: blue;
        }
    </style>
</head>
<body>
    <section class='section1'>
        <div class="aside">
            <div class="user">
                <h3><?php echo $_SESSION['username'] ; ?></h3>
                <a href="?admin&dangxuat">Đăng xuất</a>
            </div>
            <div class="list">
                <ul>
                    <li><a href="?admin">Danh sách</a></li>
                    <li><a href="?admin=them">Thêm sản phẩm</a></li>
                    <li><a href="?admin=user">Quản lý tài khoản</a></li>
                </ul>
            </div>
        </div>

        <div class="main">
            <?php
                
                    switch($_GET['admin']){
                        case 'them': 
                            include_once 'themsp.php';
                            break;
                        case 'sua': include_once 'suasp.php';
                            break;
                        case 'xoa': include_once 'xoasp.php';
                            break;
                        case 'user': include_once 'quanlyuser.php';
                            break;
                        case 'xoa_user': include_once 'xoa_user.php';
                            break;
                        default: 
                            include_once 'danhsach.php';
                    }
                
            ?>
        </div>
    </section>

    <script src='../view/admin/js/admin.js'></script>
</body>
</html>