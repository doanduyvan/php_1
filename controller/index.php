

<?php
    session_start();
    ob_start();
    include_once '../model/db.php';

    if(isset($_GET['page'])){
        switch($_GET['page']){
            case 'shop': require_once '../view/shop.php';
                break;
            case 'sanpham': require_once '../view/sanpham.php';
                break;
            case 'giohang': require_once '../view/giohang.php';
                break;
            case 'thanhtoan': require_once '../view/thanhtoan.php';
                break;
            case 'login': require_once '../view/login.php';
                break;
            case 'lienhe': require_once '../view/lienhe.php';
                break;
            case 'gioithieu': require_once '../view/gioithieu.php';
                break;
            case 'thoat':
                session_unset();
            default:
            require_once '../view/home.php';
        }
    }elseif(isset($_GET['admin'])){
        switch($_GET['admin']){

            default: require_once '../view/admin/admin.php';
        }
    }else{
        require_once '../view/home.php';
    }

?>


