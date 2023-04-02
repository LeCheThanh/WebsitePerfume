<?php
include 'views/inc/header.php';
include 'views/inc/slider.php';
?>


<!-- <section class="section brand bg-gray">
	<div class="container">
		<div class="row">
			<div class="title">
				<h2>Thương hiệu</h2>
			</div>
		</div>
		<div class="row">
		<div class="col-md-3 brand">
			<a href=""><img src="admin/uploads/brand/nuoc-hoa-dior.png" alt="brandImage" width="120px" style="border:1px solid;border-radius:10%;"></a>
		</div>
		<div class="col-md-3 brand">
			<a href=""><img src="admin/uploads/brand/nuoc-hoa-dior.png" alt="brandImage" width="120px" style="border:1px solid;border-radius:10%;"></a>
		</div><div class="col-md-3 brand">
			<a href=""><img src="admin/uploads/brand/nuoc-hoa-dior.png" alt="brandImage" width="120px" style="border:1px solid;border-radius:10%;"></a>
		</div><div class="col-md-3 brand">
			<a href=""><img src="admin/uploads/brand/nuoc-hoa-dior.png" alt="brandImage" width="120px" style="border:1px solid;border-radius:10%;"></a>
		</div><div class="col-md-3 brand">
			<a href=""><img src="admin/uploads/brand/nuoc-hoa-dior.png" alt="brandImage" width="120px" style="border:1px solid;border-radius:10%;"></a>
		</div>
		</div>
		
		
	</div>
</section> -->
<section class="product-category index section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title text-center">
					<h2>Nước hoa theo giới tính</h2>
				</div>
			</div>
			
			<div class="col-md-6">
			<?php $getcate = $cate->showlistCateFront();
				if($getcate){
					while($result=$getcate->fetch_assoc()){

			?>
				<div class="category-box">
					<a href="productByCate.php?cateId=<?php echo $result['cateId'];?>">
						<img src="admin/uploads/category/<?php echo $result['Image'];?>" alt="" />
						<div class="content">
							<h3><?php echo $result['cateName'];?></h3>
							<p><?php echo $result['cateDescription'];?></p>
						</div>
					</a>	
				</div>
				<?php 	}
				}?>
				<!-- <div class="category-box">
					<a href="#!">
						<img src="admin/uploads/category/pexels-valeria-boltneva-9957555.jpg" alt="" />
						<div class="content">
							<h3>Nước hoa nữ</h3>
							<p>Nước hoa nữ, tinh tế, sang trọng</p>
						</div>
					</a>	
				</div>-->
			</div>
			<?php $cateuni= $cate->showlistCateUni();
			if($cateuni) { 
				$result2=$cateuni->fetch_assoc();
				?>
			
			<div class="col-md-6">
				<div class="category-box category-box-2">
					<a href="productByCate.php?cateId=<?php echo $result2['cateId'];?>">
						<img src="admin/uploads/category/pexels-ron-lach-8624586.jpg" alt="" />
						<div class="content">
						<h3><?php echo $result2['cateName'];?></h3>
							<p><?php echo $result2['cateDescription'];?></p>
						</div>
					</a>	
				</div>
			</div> 
		<?php	} ?>
		</div>
	</div>
</section>

<section class="products section bg-gray">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<h2>Sản phẩm nổi bật</h2>
			</div>
		</div>
		<?php
			$getproduct = $pro->getproductFeature();
			if($getproduct){
				while($result = $getproduct->fetch_assoc()){
					
					?>
		
	
			<div class="row">
				<div class="col-md-4">
					<div class="product-item">
						<div class="product-thumb">
							<span class="bage">Hot</span>
							<img class="img-responsive" src="admin/uploads/product/<?php echo $result['productImage']?>" alt="product-img" />
							<div class="preview-meta">
								<ul>
									<li>
										<span  data-toggle="modal" data-target="#product-modal-<?php echo $result['productId']; ?>">
											<i class="fas fa-search"></i>
										</span>
									</li>
									<li>
										<a href="?wlist=<?php echo $result['productId']?>" ><i class="fas fa-heart"></i></a>
									</li>
									<li>
										<a href="#!"><i class="fas fa-cart-shopping"></i></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="product-content">
							<h4><a href="details.php?proId=<?php echo $result['productId']?>"><?php echo $result['productName']?></a></h4>
							<p class="price"><?php echo $result['productPrice']." ".'VNĐ'?></p>
						</div>
					</div>
				</div>
				<div class="modal product-modal fade" id="product-modal-<?php echo $result['productId']; ?>">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i class="fas fa-close"></i>
						</button>
						<div class="modal-dialog " role="document">
							<div class="modal-content">
								<div class="modal-body">
									<div class="row">
										<div class="col-md-8 col-sm-6 col-xs-12">
											<div class="modal-image">
												<img class="img-responsive" src="admin/uploads/product/<?php echo $result['productImage']?>" alt="product-img" alt="product-img" />
											</div>
										</div>
										<div class="col-md-4 col-sm-6 col-xs-12">
											<div class="product-short-details">
												<h2 class="product-title"><?php echo $result['productName']?></h2>
												<p class="product-price"><?php echo $result['productPrice']." ".'VNĐ'?></p>
												<p class="product-short-description">
												<?php echo $result['productDesc']?>
												</p>
												<!-- <a href="cart.html" class="btn btn-main">Thêm vào giỏ hàng</a> -->
												<?php   
											if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['submit'])){
												$productId=  $result['productId'];
												$quantity = 1;
												$Addtocart = $cart->addtocart($productId,$quantity);
											}
												?>
												<form method="post" action="">
												<button type="submit" name="submit "class="btn btn-main">Thêm vào giỏ hàng</button>
												</form>

												<a href="details.php?proId=<?php echo $result['productId']?>" class="btn btn-transparent">Chi tiết sản phẩm</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- /.modal -->

				<?php	}} ?>
			</div>
			

			<!-- New product  -->
			<div class="row">
			<div class="title text-center">
				<h2>Sản phẩm mới</h2>
			</div>
		</div>
		<?php
			$getproduct = $pro->getproductNew();
			if($getproduct){
				while($result = $getproduct->fetch_assoc()){?>
			<div class="row">
				<div class="col-md-4">
					<div class="product-item">
						<div class="product-thumb">
							<span class="bage">New</span>
							<img class="img-responsive" src="admin/uploads/product/<?php echo $result['productImage']?>" style="maxwidth:250px;" alt="product-img" />
							<div class="preview-meta">
								<ul>
									<li>
										<span  data-toggle="modal" data-target="#product-modal-<?php echo $result['productId']; ?>">
											<i class="fas fa-search"></i>
										</span>
									</li>
									<li>
										<a href="#!" ><i class="fas fa-heart"></i></a>
									</li>
									<li>
										<a href="#!"><i class="fas fa-cart-shopping"></i></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="product-content">
							<h4><a href="details.php?proId=<?php echo $result['productId']?>"><?php echo $result['productName']?></a></h4>
							<p class="price"><?php echo $result['productPrice']." ".'VNĐ'?></p>
						</div>
						<a href="details.php?proId=<?php echo $result['productId']?>" class="btn btn-transparent">Chi tiết sản phẩm</a>
					</div>
			
				</div>
				<!-- Modal -->
						<div class="modal product-modal fade" id="product-modal-<?php echo $result['productId']; ?>">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i class="tf-ion-close"></i>
						</button>
						<div class="modal-dialog " role="document">
							<div class="modal-content">
								<div class="modal-body">
									<div class="row">
										<div class="col-md-8 col-sm-6 col-xs-12">
											<div class="modal-image">
												<img class="img-responsive" src="admin/uploads/product/<?php echo $result['productImage']?>" alt="product-img" alt="product-img" />
											</div>
										</div>
										<div class="col-md-4 col-sm-6 col-xs-12">
											<div class="product-short-details">
												<h2 class="product-title"><?php echo $result['productName']?></h2>
												<p class="product-price"><?php echo $result['productPrice']." ".'VNĐ'?></p>
												<p class="product-short-description">
												<?php echo $result['productDesc']?>
												</p>
												<form method="post">
												<button type="submit" name="submit "class="btn btn-main">Thêm vào giỏ hàng</button>
												</form>
												<a href="details.php?proId=<?php echo $result['productId']?>" class="btn btn-transparent">Chi tiết sản phẩm</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- /.modal -->

				<?php	}} ?>
			</div>
		</div>
	</div>
</section>
<!-- END PRODUCT -->
<!-- Policy -->
<section class="section instagram-feed">
	<div class="container">
		<div class="row">
			<div class="title">
				<h2>Tại sao chọn chúng tôi</h2>
			</div>
		</div>
	
	</div>
</section>
		
<?php
include 'views/inc/footer.php';
?> 





<!-- 
THEME: Aviato | E-commerce template
VERSION: 1.0.0
AUTHOR: Themefisher

HOMEPAGE: https://themefisher.com/products/aviato-e-commerce-template/
DEMO: https://demo.themefisher.com/aviato/
GITHUB: https://github.com/themefisher/Aviato-E-Commerce-Template/

WEBSITE: https://themefisher.com
TWITTER: https://twitter.com/themefisher
FACEBOOK: https://www.facebook.com/themefisher
-->



<!--
Start Call To Action
==================================== -->
  </body>
  </html>
  