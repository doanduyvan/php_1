<?php
    if(!isset($_SESSION['id_giohang'])){
        header('location: ?');
    }
	include_once 'func_user.php';
	$id_gh = $_SESSION['id_giohang'];
	$id_tk = $_SESSION['id_taikhoan'];
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
 		<link type="text/css" rel="stylesheet" href="../view/css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="../view/css/slick-theme.css"/>
 		<link type="text/css" rel="stylesheet" href="../view/css/nouislider.min.css"/>
 		<link rel="stylesheet" href="../view/css/font-awesome.min.css">
 		<link type="text/css" rel="stylesheet" href="../view/css/style.css"/>
		<style>
			.custom11{
				display: flex;
				gap: 5px;
			}
			#themdc{
				border: none;
    			border-radius: 5px;
                padding: 7px 28px;
                font-size: 17px;
                font-weight: bold;
                color: white;
                background-color: #D10024;
			}
			#themdc:hover{
				background-color: #D10024;
			}
			.xoadc{
				margin-left: 5%;
			}
		</style>
    </head>
	<body>

    	
    <?php
        include_once 'header.php';
    ?>



		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">ĐỊA CHỈ NHẬN HÀNG</h3>
							</div>
							

							<?php
								$diachi = getarrayData($conn,'thongtintaikhoan','id_taikhoan',$id_tk);
								if($diachi){
									foreach($diachi as $key => $value){
										$iddong = "iddongnn" . $key;
										?>
							<div class="form-group custom11">
								<div><input id="<?php echo $iddong; ?>" type="radio" name="diachinhanhang"></div>
								<label for="<?php echo $iddong; ?>">
								<?php
									echo $value['ten'] . " - " . $value['dienthoai'];
									echo "<br>";
									echo $value['diachi'];
								?>
								</label>
								<div class="xoadc"><a href="../model/themthongtinuser.php?xoa&id=<?php echo $value['id']; ?>"> Xóa địa chỉ này?</a></div>
							</div>
										<?php
									}
								}else{
								?>
								<div class="form-group custom11">
									Vui lòng thêm địa chỉ nhận hàng!
								</div>
								<?php
								}
							?>

							

							
							
						</div>
						<!-- /Billing Details -->

						<!-- Shiping Details -->
						<div class="shiping-details">
							<!-- <div class="section-title">
								<h3 class="title">ĐỊA CHỈ GIAO HÀNG</h3>
							</div> -->
							<div class="input-checkbox">
								<input type="checkbox" id="shiping-address">
								<label for="shiping-address">
									<span></span>
									Thêm địa chỉ mới ?
								</label>
								<div class="caption">
									<form action="../model/themthongtinuser.php" method="post">
									<div class="form-group">
										<input class="input" type="text" name="first-name" placeholder="Họ tên">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="address" placeholder="Địa chỉ">
									</div>
									<div class="form-group">
										<input class="input" type="number" name="tel" placeholder="Số điện thoại">
									</div>
									<input type="hidden" name="id" value="<?php echo $id_tk; ?>" >
									<div class="form-group">
										<!-- <input class="input" type="submit" name="tel" placeholder="Số điện thoại"> -->
										<button name="btn-themdc" id="themdc">Lưu</button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<!-- /Shiping Details -->

						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" placeholder="Ghi chú"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Đơn hàng của bạn</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>Sản phẩm</strong></div>
								<div><strong>Tổng</strong></div>
							</div>

							<div class="order-products">
								<!-- sản phẩm oder -->
								<?php
									$tongtienfull = 0;
									$sql = "SELECT sp.id, sp.ten,sp.giakm,sp.hinh,ct.soluong,ct.id_giohang, ct.id as id_item FROM chitietgiohang ct LEFT JOIN sanpham sp ON ct.id_sanpham = sp.id
									WHERE ct.id_giohang = $id_gh";
									try{
									$result = $conn->query($sql);
									while($row = $result->fetch_assoc()){
										$tien1don = $row['soluong'] * $row['giakm'];
										$tongtienfull += $tien1don;
										?>
									<div class="order-col">
									<div><?php echo $row['soluong']."x ". $row['ten']; ?></div>
									<div><?php echo $tien1don. " VND"; ?></div>
									</div>
										<?php
									}
									}catch(Exception $err){

										// không có sản phẩm chọn

									}
									

									
								?>
								
								

							</div>
							<div class="order-col">
								<div>Phí vận chuyển</div>
								<div><strong>Miễn phí</strong></div>
							</div>
							<div class="order-col">
								<div style='width:30%;'><strong>Tổng</strong></div>
								<div style='width:70%;' ><strong class="order-total"> <?php echo $tongtienfull; ?> VNĐ</strong></div>
							</div>
						</div>
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1">
								<label for="payment-1">
									<span></span>
									Chuyển khoản trực tiếp
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-2">
								<label for="payment-2">
									<span></span>
									Thanh toán séc
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-3">
								<label for="payment-3">
									<span></span>
									Hệ thống Paypal
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								Tôi đã đọc và chấp nhận <a href="#">Điều khoản & Điều kiện</a>
							</label>
						</div>
						<a href="#" class="primary-btn order-submit">Đặt hàng</a>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

	
    <?php
        include_once 'footer.php';
    ?>
	

		<!-- jQuery Plugins -->
        <script src="../view/js/jquery.min.js"></script>
		<script src="../view/js/bootstrap.min.js"></script>
		<script src="../view/js/slick.min.js"></script>
		<script src="../view/js/nouislider.min.js"></script>
		<script src="../view/js/jquery.zoom.min.js"></script>
		<script src="../view/js/main.js"></script>

	</body>
</html>
