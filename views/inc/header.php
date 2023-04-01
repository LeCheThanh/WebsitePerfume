<?php
ob_start();
include 'libs/session.php';
Session::init();
?>
<?php
include_once 'libs/database.php';
include_once 'helpers/format.php';

spl_autoload_register(function($className) {
    include_once "classes/".$className.".php";
});
    $db = new Database();
    $fm = new Format();
    $cart = new cartModel();
    $user = new userModel();
    $cate = new categoryC();
    $pro = new productC();
	$cs= new customerC();

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>LEMON | PERFUME</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
   -->
  <!-- Favicon -->
  <!-- <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" /> -->

  <!-- Themefisher Icon font -->
  <!-- <link rel="stylesheet" href="assets/themefisher-font/style.css"> -->
<!-- FONT AWESOME CDN -->

<link rel="stylesheet" href="../../assets/font/fontawesome-free-6.4.0/css/all.min.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="../../assets/bootstrap/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="../../assets/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="../../assets/slick/slick.css">
  <link rel="stylesheet" href="../../assets/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="../../assets/style.css">

</head>

<body id="body">

<!-- Start Top Header Bar -->
<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4">
				<div class="contact-number">
					<i class="tf-ion-ios-telephone"></i>
					<span>+84 784846464</span>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Site Logo -->
				<div class="logo text-center">
					<a href="index.php">
						<!-- replace logo here -->
						<svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
							xmlns:xlink="http://www.w3.org/1999/xlink">
							<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
								font-family="AustinBold, Austin" font-weight="bold">
								<g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
									<text id="AVIATO">
										<tspan x="108.94" y="325">LEMON</tspan>
									</text>
								</g>
							</g>
						</svg>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Cart -->
				<ul class="top-menu text-right list-inline">
					<li class="dropdown cart-nav dropdown-slide">
						<a href="" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
						<i class="fa-cart-shopping"></i><a href="cart.php">Cart</a></a>
						<div class="dropdown-menu cart-dropdown">
							<!-- Cart Item -->
							<?php $getcart= $cart->getProductCart();
								if($getcart){
									while($result = $getcart->fetch_assoc()){

							
							?>
							<div class="media">
								<a class="pull-left" href="#!">
									<img class="media-object" src="admin/uploads/product/<?php echo $result['image']?>" alt="image" />
								</a>
								<div class="media-body">
									<h4 class="media-heading"><a href="#!"><?php echo $result['productName']?></a></h4>
									<div class="cart-price">
										<span><?php echo $result['quantity']?>x</span>
										<span><?php echo $result['price']." "."VNĐ"?></span>
									</div>
									<h5><strong><?php $total= $result['price'] * $result['quantity']; echo $total." "."VNĐ"?></strong></h5>
								</div>
								<a href="#!" class="remove"><i class="tf-ion-close"></i></a>
							</div>
							<?php
								}
							}?><!-- / Cart Item -->
							<!-- / Cart Item -->
							<?php if($getcart){
								$total= Session::get("total");

								?>
								
							<div class="cart-summary">
								<span>Tổng cộng</span>
								<span class="total-price"><?php echo $total." "."VNĐ";?></span>
							</div>
							<ul class="text-center cart-buttons">
								<li><a href="cart.php" class="btn btn-small btn-solid-border">Xem giỏ hàng</a></li>
								<li><a href="checkout.php" class="btn btn-small btn-solid-border">Thanh toán</a></li>
							</ul>
						</div>
							<?php }else{
								echo'Giỏ hàng trống!';
							}?>

					</li><!-- / Cart -->

					<!-- Search -->
					<li class="dropdown search dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-ios-search-strong"></i> Search</a>
						<ul class="dropdown-menu search-dropdown">
							<li>
								<form action="post"><input type="search" class="form-control" placeholder="Search..."></form>
							</li>
						</ul>
					</li><!-- / Search -->

					<!-- Languages -->
					<li class="dropdown search dropdown-slide">
						<?php
						if(isset($_GET['customerId'])){
							$delCart=$cart->delAllCart();
							Session::destroy();
						}
						?>
						<a href="login.php">USER</a>
						<div class="dropdown-menu">
							<?php $login_check= Session::get('customer_login');
							if($login_check==false){?>
							<div class="row">
								<!-- Basic -->
								<div class="col-lg-12 col-md-12 mb-sm-6">
									<ul>
									<li><a href="login.php">Đăng nhập</a></li>
									</ul>
								</div>
								<?php }else{?>			
									<div class="col-lg-12 col-md-12 mb-sm-6">
									<ul>
									<li><a href="profile.php">Thông tin tài khoản</a></li>
									<hr>
									<li><a href="?customerId=<?php echo Session::get('customer_id')?>">Đăng xuất</a></li>
									</ul>
								</div>
								<?php }?>
							</div>
					</li><!-- / Languages -->

				</ul><!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>
</section><!-- End Top Header Bar -->


<!-- Main Menu Section -->
<section class="menu">
	<nav class="navbar navigation">
		<div class="container">
			<div class="navbar-header">
				<h2 class="menu-title">Main Menu</h2>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div><!-- / .navbar-header -->

			<!-- Navbar Links -->
			<div id="navbar" class="navbar-collapse collapse text-center">
				<ul class="nav navbar-nav">

					<!-- Home -->
					<li class="dropdown ">
						<a href="index.php">Trang chủ</a>
					</li><!-- / Home -->


					<!-- Elements -->
					<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Sản phẩm <span
								class="tf-ion-ios-arrow-down"></span></a>
						<div class="dropdown-menu">
							<div class="row">
						
								<!-- Basic -->
								<div class="col-lg-12 col-md-12 mb-sm-6">
									<ul>
									<li><a href="shop.html">Tất cả</a></li>
									<?php $getlistCate = $cate->showlistCate();
									if($getlistCate){
										while($result =$getlistCate->fetch_assoc()){
									?>
										<!-- <li class="dropdown-header">Pages</li>
										<li role="separator" class="divider"></li> -->
										<hr>
										<li><a href="productByCate.php?cateId=<?php echo $result['cateId'];?>"><?php echo $result['cateName']?></a></li>
										<?php }}?>

									</ul>
								</div>

								<!-- Layout
								<div class="col-lg-6 col-md-6 mb-sm-3">
									<ul>
										<li class="dropdown-header">Layout</li>
										<li role="separator" class="divider"></li>
										<li><a href="product-single.html">Product Details</a></li>
										<li><a href="shop-sidebar.html">Shop With Sidebar</a></li>

									</ul>
								</div>

							</div> -->
							<!-- / .row -->
						</div><!-- / .dropdown-menu -->
					</li><!-- / Elements -->


					<!-- Pages -->
					<li class="dropdown full-width dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Pages <span
								class="tf-ion-ios-arrow-down"></span></a>
						<div class="dropdown-menu">
							<div class="row">

								<!-- Introduction -->
								<div class="col-sm-3 col-xs-12">
									<ul>
										<li class="dropdown-header">Introduction</li>
										<li role="separator" class="divider"></li>
										<li><a href="contact.html">Contact Us</a></li>
										<li><a href="about.html">About Us</a></li>
										<li><a href="404.html">404 Page</a></li>
										<li><a href="coming-soon.html">Coming Soon</a></li>
										<li><a href="faq.html">FAQ</a></li>
									</ul>
								</div>

								<!-- Contact -->
								<div class="col-sm-3 col-xs-12">
									<ul>
										<li class="dropdown-header">Dashboard</li>
										<li role="separator" class="divider"></li>
										<li><a href="dashboard.html">User Interface</a></li>
										<li><a href="order.html">Orders</a></li>
										<li><a href="address.html">Address</a></li>
										<li><a href="profile-details.html">Profile Details</a></li>
									</ul>
								</div>

								<!-- Utility -->
								<div class="col-sm-3 col-xs-12">
									<ul>
										<li class="dropdown-header">Utility</li>
										<li role="separator" class="divider"></li>
										<li><a href="login.html">Login Page</a></li>
										<li><a href="signin.html">Signin Page</a></li>
										<li><a href="forget-password.html">Forget Password</a></li>
									</ul>
								</div>

								<!-- Mega Menu -->
								<div class="col-sm-3 col-xs-12">
									<a href="shop.html">
										<img class="img-responsive" src="images/shop/header-img.jpg" alt="menu image" />
									</a>
								</div>
							</div><!-- / .row -->
						</div><!-- / .dropdown-menu -->
					</li><!-- / Pages -->



					<!-- Blog -->
					<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Blog <span
								class="tf-ion-ios-arrow-down"></span></a>
						<ul class="dropdown-menu">
							<li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
							<li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
							<li><a href="blog-full-width.html">Blog Full Width</a></li>
							<li><a href="blog-grid.html">Blog 2 Columns</a></li>
							<li><a href="blog-single.html">Blog Single</a></li>
						</ul>
					</li><!-- / Blog -->

					<!-- Shop -->
					<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Elements <span
								class="tf-ion-ios-arrow-down"></span></a>
						<ul class="dropdown-menu">
							<li><a href="typography.html">Typography</a></li>
							<li><a href="buttons.html">Buttons</a></li>
							<li><a href="alerts.html">Alerts</a></li>
						</ul>
					</li><!-- / Blog -->
				</ul><!-- / .nav .navbar-nav -->

			</div>
			<!--/.navbar-collapse -->
		</div><!-- / .container -->
	</nav>
</section>