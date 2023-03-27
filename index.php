<?php
include 'views/inc/header.php';
include 'views/inc/slider.php';
?>

<section class="product-category section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title text-center">
					<h2>Product Category</h2>
				</div>
			</div>
			<div class="col-md-6">
				<div class="category-box">
					<a href="#!">
						<img src="images/shop/category/category-1.jpg" alt="" />
						<div class="content">
							<h3>Clothes Sales</h3>
							<p>Shop New Season Clothing</p>
						</div>
					</a>	
				</div>
				<div class="category-box">
					<a href="#!">
						<img src="images/shop/category/category-2.jpg" alt="" />
						<div class="content">
							<h3>Smart Casuals</h3>
							<p>Get Wide Range Selection</p>
						</div>
					</a>	
				</div>
			</div>
			<div class="col-md-6">
				<div class="category-box category-box-2">
					<a href="#!">
						<img src="images/shop/category/category-3.jpg" alt="" />
						<div class="content">
							<h3>Jewellery</h3>
							<p>Special Design Comes First</p>
						</div>
					</a>	
				</div>
			</div>
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
				while($result = $getproduct->fetch_assoc()){?>
			<div class="row">
				<div class="col-md-4">
					<div class="product-item">
						<div class="product-thumb">
							<span class="bage">Hot</span>
							<img class="img-responsive" src="admin/uploads/product/<?php echo $result['productImage']?>" alt="product-img" />
							<div class="preview-meta">
								<ul>
									<li>
										<span  data-toggle="modal" data-target="#product-modal" data-product-id="<?php echo $result['productId']?>">
											<i class="tf-ion-ios-search-strong"></i>
										</span>
									</li>
									<li>
										<a href="#!" ><i class="tf-ion-ios-heart"></i></a>
									</li>
									<li>
										<a href="#!"><i class="tf-ion-android-cart"></i></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="product-content">
							<h4><a href="product-single.html"><?php echo $result['productName']?></a></h4>
							<p class="price"><?php echo $result['productPrice']." ".'VNĐ'?></p>
						</div>
					</div>
				</div>
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
										<span  data-toggle="modal" data-target="#product-modal">
											<i class="tf-ion-ios-search-strong"></i>
										</span>
									</li>
									<li>
										<a href="#!" ><i class="tf-ion-ios-heart"></i></a>
									</li>
									<li>
										<a href="#!"><i class="tf-ion-android-cart"></i></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="product-content">
							<h4><a href="product-single.html"><?php echo $result['productName']?></a></h4>
							<p class="price"><?php echo $result['productPrice']." ".'VNĐ'?></p>
						</div>
						<a href="details.php?proId=<?php echo $result['productId']?>" class="btn btn-transparent">Chi tiết sản phẩm</a>
					</div>
				</div>
				<?php	}} ?>
			</div>
		
		<!-- Modal -->
		<div class="modal product-modal fade" id="product-modal">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<i class="tf-ion-close"></i>
			</button>
			<?php
			$proId = $_GET['proId'];
			$getproduct = $pro->getbyId($proId );
			if($getproduct){
				while($result = $getproduct->fetch_assoc()){?>
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
			        				<a href="cart.html" class="btn btn-main">Thêm vào giỏ hàng</a>
			        				<a href="details.php?proId=<?php echo $result['productId']?>" class="btn btn-transparent">Chi tiết sản phẩm</a>
			        			</div>
			        		</div>
			        	</div>
			        </div>
		    	</div>
		  	</div>
			<?php }}?>
		</div><!-- /.modal -->

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
  