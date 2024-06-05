
		<head>
			<style>
				.header-search{
					position: relative;
				}
				.showtimkiem{
					position: absolute;
					width: 95%;
					/* height: 100px; */
					background-color: white;
					z-index: 99;
					border-radius: 10px;
					margin-top: 10px;
					overflow: hidden;
					box-shadow: 0 0 5px gray;
				}
				.item_search{
					display: flex;
					border-bottom: 1px solid gray;
				}
				.item_search:last-child{
					border: none;
				}
				.item_search_img{
					width: 100px;
				}
				.item_search_img:hover{
					transform: scale(1.1);
				}
				.item_search_thongtin{
					flex: 1;
					/* background-color: blue; */
					padding: 10px;
					
				}
				.item_search_img img{
					width: 100%;
				}
				.item_search_thongtin a{
					color: black;
					font-size: 17px;
					font-weight: bold;
					display: block;
				}
				.item_search_thongtin a:hover{
					color: blue;
				}
				.item_search_thongtin span{
					display: inline-block;
					color: red;
					font-weight: bold;
					font-size: 18px;
					margin-top: 10px;
					cursor: pointer;
				}
				.item_search_thongtin span del{
					color: gray;
					font-size: 16px;
					margin-left: 15%;
				}
				.khongtimthay{
					padding: 15px;
				}
				.headercustom{
					position: fixed;
    				top: 0;
    				left: 0;
    				right: 0;
    				z-index: 50;
				}
				.custom{
					margin-top: 140px !important;
				}
				#onoff{
					position: fixed;
					top: 0;
					bottom: 0;
					left: 0;
					right: 0;
					z-index: 1;
					opacity: 0;
					display: none;
				}
				.showtimkiem{
					display: none;
				}

				#check_search:checked ~ .showtimkiem{
					display: block;
				}
				#check_search:checked ~ #onoff{
					display: block;
				}
			</style>
		</head>
        <!-- HEADER -->
		<header class="headercustom">
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +113</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i>FPT@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Đà Nẵng</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> VNĐ</a></li>
						
						<?php
							if(isset($_SESSION['vaitro']) && $_SESSION['vaitro']==0):
						?>
						<li><a href=""><i class="fa fa-user-o"></i> <?php echo $_SESSION['username']; ?></a></li>
						<li><a href="index.php?page=thoat">Thoát</a></li>
						<?php else: ?>
						<li><a href="index.php?page=login"><i class="fa fa-user-o"></i> Tài khoản</a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="index.php" class="logo">
									<img src="../uploads/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form id="form_timkiem">
									<select class="input-select">
										<option value="0">Danh mục</option>
										<option value="1">Điện thoại</option>
										<option value="1">Máy tính</option>
									</select>
									<input id="input_search" class="input" placeholder="Nhập sản phẩm cần tìm">
									<button class="search-btn">Tìm kiếm</button>
								</form>

								
								<input type="checkbox" id='check_search' hidden>
								<label id="onoff" for="check_search"></label>
								<div class="showtimkiem">
									fjfjf
									<!-- <div class="item_search">
										<div class="item_search_img">
											<img src="../uploads/2.jpg" alt="">
										</div>
										<div class="item_search_thongtin">
											<a href="">Our Topic Dictionaries are lists of topic  has a CEFR level.</a>
											<span>10990000đ</span> <span><del>1289000đ</del></span>
										</div>
									</div> -->

								</div>
							</div>
						</div>
						
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Yêu thích</span>
										<!-- <div class="qty">2</div> -->
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Giỏ hàng</span>

										<div class="qty" id='soluonghang'>0</div>

									</a>
									<div class="cart-dropdown">
										<div class="cart-list" id="box_sanpham">
											<p>Vui lòng Đăng nhập</p>
                                            <!-- sản phẩm -->

											<!-- <div class="product-widget">
												<div class="product-img">
													<img src="./img/product01.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
												</div>
											</div> -->


										</div>
										<div class="cart-summary">
											<small id="box_chon">0 Sản phẩm được chọn</small>
											<h5 id="box_tt">Tổng tiền: 0 VNĐ</h5>
										</div>
										<div class="cart-btns">
											<a href="index.php?page=giohang" <?php if(!isset($_SESSION['id_giohang'])){echo "onclick='return false' title='Vui lòng đăng nhập'";} ?> >Xem giỏ hàng</a>
											<a href="index.php?page=thanhtoan" <?php if(!isset($_SESSION['id_giohang'])){echo "onclick='return false' title='Vui lòng đăng nhập'";} ?>>Thanh toán  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
        	<!-- NAVIGATION -->
		<nav id="navigation" class="custom">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="index.php">Trang chủ</a></li>
						<li><a href="index.php?page=shop">Tất cả sản phẩm</a></li>
						<li><a href="#">Máy tính</a></li>
						<li><a href="#">Điện thoại</a></li>
						<li><a href="#">Máy ảnh</a></li>
						<li><a href="index.php?page=lienhe">Liên hệ</a></li>
						<li><a href="index.php?page=gioithieu">Giới thiệu</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		
		<script> 
		const id_gh = <?php echo isset($_SESSION['id_giohang']) ? $_SESSION['id_giohang'] : 'false' ;?>;
		window.onload = function() {
			if(id_gh){
				getcart(id_gh);
			}
		};
		</script>
