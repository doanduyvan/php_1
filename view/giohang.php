
<?php
    if(!isset($_SESSION['id_giohang'])){
        header('location: ?');
    }

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Electro - HTML Ecommerce Template</title>
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
 		<link type="text/css" rel="stylesheet" href="../view/css/bootstrap.min.css"/>
 		<link rel="stylesheet" href="../view/css/font-awesome.min.css">
 		<link type="text/css" rel="stylesheet" href="../view/css/style.css"/>
 		<link type="text/css" rel="stylesheet" href="../view/css/tempcss/style.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <style>
            .cong,.tru{
                cursor: pointer;
            }
            .quantity{
                user-select: none;
            }
        </style>
    </head>
<body>

    <?php
        include_once 'header.php';
    ?>

     <!-- Shoping Cart Section Begin -->
     <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="display_allcart">
                                <!-- sar pham -->

                                <!-- <tr>
                                    <td class="shoping__cart__item">
                                        <img src="img/cart/cart-1.jpg" alt="">
                                        <h5>Vegetable’s Package</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        $55.00
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <span onclick='customsl(1);thaydoisl()' class='cong' >+</span>
                                                <input type="text" value="1"  readonly  id='soluong' class='soluong_giohang'>
                                                <span onclick='customsl(-1);thaydoisl()' class='tru'>-</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        $110.00
                                    </td>
                                    <td class="shoping__cart__item__close">
                                    <i class="fa-solid fa-xmark"></i>
                                    </td>
                                </tr> -->
                             
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="?" style="background-color: #7fad39; color: white" class="primary-btn cart-btn">Tiếp tục mua hàng</a>

                    </div>
                </div>
              
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Tổng hàng</h5>
                        <ul>
                            <li>Tổng cộng <span id="tongtin_ingiohang">0 VNĐ</span></li>
                            <!-- <li>Total <span>$454.98</span></li> -->
                        </ul>
                        <a href="?page=thanhtoan" class="primary-btn">Tiến hành thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <?php
        include_once 'footer.php';
    ?>


       
        <script src="../view/js/jquery.min.js"></script>
		<script src="../view/js/bootstrap.min.js"></script>
		<script src="../view/js/slick.min.js"></script>
		<script src="../view/js/nouislider.min.js"></script>
		<script src="../view/js/jquery.zoom.min.js"></script>
		<script src="../view/js/main.js"></script>
		<script src="../view/js/custom.js"></script>
       
</body>
</html>