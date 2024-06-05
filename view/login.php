
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../view/css/login.css">
    <style>
        .back{
            /* background-color: blue; */
            display: block;
            width: 50%;
            margin-top: 30px;
        }
        .back span{
            font-size: 18px;
           
        }
        .back span:hover{
            text-decoration: underline;
        }
        .back i{
            font-size: 18px; 
            line-height: 18px;
        }
		.thongtin p{
			color: red;
		}
		.thongbao-dangnhap p{
			color: red;
		}
		.thongtindk p{
			color: red;
		}
		#quenmk{
			cursor: pointer;
		}
		#quenmk:hover{
			color: red;
		}
		.loadding{
			position: fixed;
   	 		top: 0;
    		right: 0;
    		left: 0;
    		bottom: 0;
    		/* background-color: blue; */
    		z-index: 1000;
			display: grid;
			place-items: center;
			backdrop-filter: blur(1px);
			display: none;
		}
		.ld-box{
			width: 400px;
			/* height: 200px; */
			/* background-color: green; */
			text-align: center;
			
			>p{
				text-align: center;
				font-size: 20px;
				font-weight: bold;
				color: black;
			}
			>svg {
 width: 4.25em;
 transform-origin: center;
 animation: rotate4 2s linear infinite;
}

>svg>circle {
 fill: none;
 stroke: black;
 stroke-width: 7;
 stroke-dasharray: 1, 200;
 stroke-dashoffset: 0;
 stroke-linecap: round;
 animation: dash4 1.5s ease-in-out infinite;
}

		}


		@keyframes rotate4 {
 			100% {
  			transform: rotate(360deg);
 			}
		}

		@keyframes dash4 {
 			0% {
  			stroke-dasharray: 1, 200;
  			stroke-dashoffset: 0;
 			}
 			50% {
  			stroke-dasharray: 90, 200;
  			stroke-dashoffset: -35px;
 			}

 			100% {
  			stroke-dashoffset: -125px;
 			}
		}
    </style>
</head>
<body>
    <h2>Chào mừng bạn đến với ClickBuy - Chọn là mua</h2>

<div class="container" id="container">

	<div class="form-container sign-up-container">
		<form action="" id='form-dangki'>
			<h1>Tạo tài khoản</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>hoặc sử dụng email của bạn để đăng ký</span>
			<input type="text" placeholder="Tên" />
			<input type="email" placeholder="Email" />
			<input type="password" class="mk" placeholder="Mật khẩu" />
			<input type="password" class="cfmk" placeholder="Nhập lại mật khẩu" />
			<button class='btn-dangki'>Đăng Ký</button>
			<div class="thongtindk">
			<p></p>
		</div>
		</form>
		
	</div>

	<div class="form-container sign-in-container">
		<form action="../model/dangnhap.php" method='post'>
			<h1>Đăng nhập</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>hoặc sử dụng tài khoản của bạn</span>
			<input id="emaildn" name='email-dn' type="email" placeholder="Email" />
			<input name='pass-dn' type="password" placeholder="Mật khẩu" />
			<p id="quenmk" onclick="quenkm()">Quên mật khẩu ?</p>
			<button name='btn-dn'>Đăng nhập</button>
			<div class="thongbao-dangnhap">
				<p>
					<?php
					 if(isset($_SESSION['tbl'])){
						echo $_SESSION['tbl'];
						unset($_SESSION['tbl']);
					 }
					 ?>
				</p>
			</div>
		</form>

	</div>

		<div class="loadding">
				<div class="ld-box">
					<p>Vui lòng đợi trong giây lát...</p>
					<svg viewBox="25 25 50 50">
  <circle r="20" cy="50" cx="50"></circle>
</svg>
				</div>
		</div>


	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Chào mừng trở lại!</h1>
				<p>Để duy trì kết nối với chúng tôi vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
				<button class="ghost" id="signIn">Đăng nhập</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Chào bạn!</h1>
				<p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
				<button class="ghost" id="signUp">Đăng ký</button>
			</div>
		</div>
	</div>
</div>

<div class="back">
<i class="fa-sharp fa-solid fa-arrow-left"></i>
<a href="?"> <span>Quay lại</span></a>
</div>

<script src="../view/js/login.js"></script>
<script src="../view/js/user.js"></script>
</body>
</html>