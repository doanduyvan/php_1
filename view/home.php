
<?php
	include_once '../view/func_user.php';
	$datafull = getarrayData($conn,'sanpham');
	

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Trang chủ</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="../view/css/bootstrap.min.css"/>
		<link type="text/css" rel="stylesheet" href="../view/css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="../view/css/slick-theme.css"/>
		<link type="text/css" rel="stylesheet" href="../view/css/nouislider.min.css"/>
		<link rel="stylesheet" href="../view/css/font-awesome.min.css">
		<link type="text/css" rel="stylesheet" href="../view/css/style.css"/>
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
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop01.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Máy tính<br></h3>
								<a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop03.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Phụ kiện<br></h3>
								<a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop02.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Máy ảnh<br></h3>
								<a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Sản phẩm mới</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Laptop</a></li>
									<li><a data-toggle="tab" href="#tab2">Điện thoại</a></li>
									<li><a data-toggle="tab" href="#tab3">Máy ảnh</a></li>
									<li><a data-toggle="tab" href="#tab4">Phụ kiện</a></li>

								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">

										<?php  foreach($datafull as $key => $value){ 
											$ten = catchuoi($value['ten'],4);	
										?>
											
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="../uploads/<?php echo $value['hinh']; ?>" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">Mới</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name tencustom"><a title="<?php echo $value['ten']; ?>" href="index.php?page=sanpham&id=<?php echo $value['id']; ?>"><?php echo $ten; ?></a></h3>
												<h4 class="product-price"><?php echo number_format($value['giakm']); ?>đ <del class="product-old-price"><?php echo number_format($value['giagoc']); ?>đ</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"
												<?php 
											if(isset($_SESSION['vaitro'])){
												$id_gh = $_SESSION['id_giohang'];
												$id_sp = $value['id'];
												echo "onclick='addcart($id_gh,$id_sp)'";
											}else{
												echo "title='Vui lòng đăng nhập'";
											}
												?>
												><i class="fa fa-shopping-cart"></i> Thêm giỏ hàng</button>
											</div>
										</div>
										<!-- /product -->

										<?php } ?>
										
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->



								
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>

		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Ngày</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Giờ</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Phút</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Giây</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">ƯU ĐÃI HOT TUẦN NÀY</h2>
							<p>BỘ SƯU TẬP MỚI GIẢM GIÁ LÊN ĐẾN 50%</p>
							<a class="primary-btn cta-btn" href="#">Mua ngay</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Sản phẩm bán chạy</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">Máy tính</a></li>
									<li><a data-toggle="tab" href="#tab2">Điện thoại</a></li>
									<li><a data-toggle="tab" href="#tab2">Máy ảnh</a></li>
									<li><a data-toggle="tab" href="#tab2">Phụ kiện</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">

									<?php foreach($datafull as $key => $value){ 
										$ten = catchuoi($value['ten'],4);
									?>
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="../uploads/<?php echo $value['hinh']; ?>" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name"><a title="<?php echo $value['ten']; ?>" href="#"><?php echo $ten; ?></a></h3>
												<h4 class="product-price"><?php echo number_format($value['giakm']); ?>đ <del class="product-old-price"><?php echo number_format($value['giagoc']); ?>đ</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										<!-- /product -->
									<?php } ?>
									
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Sản phẩm bán chạy</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-3">
							<div>
                                <!-- hàng 1-3 -->

								<!-- product widget -->
								<?php  foreach($datafull as $key => $value){ if($key==3){break;}; $ten = catchuoi($value['ten'],5); ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="../uploads/<?php echo $value['hinh']; ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="?page=sanpham&id=<?php echo $value['id'] ?>"><?php echo $ten; ?></a></h3>
										<h4 class="product-price"><?php echo $value['giakm'] ?>đ <del class="product-old-price"><?php echo $value['giagoc'] ?>đ</del></h4>
									</div>
								</div>
								<?php } ?>
								<!-- /product widget -->

							
							</div>

							<div>
                                <!-- hàng 1-3 -->

								<!-- product widget -->
								<?php  foreach($datafull as $key => $value){ if($key==3){break;}; $ten = catchuoi($value['ten'],5); ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="../uploads/<?php echo $value['hinh']; ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="?page=sanpham&id=<?php echo $value['id'] ?>"><?php echo $ten; ?></a></h3>
										<h4 class="product-price"><?php echo $value['giakm'] ?>đ <del class="product-old-price"><?php echo $value['giagoc'] ?>đ</del></h4>
									</div>
								</div>
								<?php } ?>
								<!-- /product widget -->
								
							</div>
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Được đánh giá nhiều nhất</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-4">
							<div>
                                <!-- hàng 2-3 -->

								<!-- product widget -->
								<?php  foreach($datafull as $key => $value){ if($key==3){break;}; $ten = catchuoi($value['ten'],5); ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="../uploads/<?php echo $value['hinh']; ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="?page=sanpham&id=<?php echo $value['id'] ?>"><?php echo $ten; ?></a></h3>
										<h4 class="product-price"><?php echo $value['giakm'] ?>đ <del class="product-old-price"><?php echo $value['giagoc'] ?>đ</del></h4>
									</div>
								</div>
								<?php } ?>
								<!-- /product widget -->

							
							</div>

							<div>
                                <!-- hàng 2-3 -->

								<!-- product widget -->
								<?php  foreach($datafull as $key => $value){ if($key==3){break;}; $ten = catchuoi($value['ten'],5); ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="../uploads/<?php echo $value['hinh']; ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="?page=sanpham&id=<?php echo $value['id'] ?>"><?php echo $ten; ?></a></h3>
										<h4 class="product-price"><?php echo $value['giakm'] ?>đ <del class="product-old-price"><?php echo $value['giagoc'] ?>đ</del></h4>
									</div>
								</div>
								<?php } ?>
								<!-- /product widget -->

							
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Giảm giá nhiều nhất</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							<div>
                                <!-- hàng 3-3 -->

								<!-- product widget -->
								<?php  foreach($datafull as $key => $value){ if($key==3){break;}; $ten = catchuoi($value['ten'],5); ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="../uploads/<?php echo $value['hinh']; ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="?page=sanpham&id=<?php echo $value['id'] ?>"><?php echo $ten; ?></a></h3>
										<h4 class="product-price"><?php echo $value['giakm'] ?>đ <del class="product-old-price"><?php echo $value['giagoc'] ?>đ</del></h4>
									</div>
								</div>
								<?php } ?>
								<!-- /product widget -->

								
							</div>

							<div>
                                <!-- hàng 3-3 -->

								<!-- product widget -->
								<?php  foreach($datafull as $key => $value){ if($key==3){break;}; $ten = catchuoi($value['ten'],5); ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="../uploads/<?php echo $value['hinh']; ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="?page=sanpham&id=<?php echo $value['id'] ?>"><?php echo $ten; ?></a></h3>
										<h4 class="product-price"><?php echo $value['giakm'] ?>đ <del class="product-old-price"><?php echo $value['giagoc'] ?>đ</del></h4>
									</div>
								</div>
								<?php } ?>
								<!-- /product widget -->

							
							</div>
						</div>
					</div>

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
