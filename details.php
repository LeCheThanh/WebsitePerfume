<?php
include 'views/inc/header.php';
?>
<?php
 if(!isset($_GET['proId']) || $_GET['proId']==null){
    // 
    echo "<script>window.location = '404.php'</script>";
}else{
    $productId=$_GET['proId'];
} 
if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['submit'])){
	$quantity = $_POST['quantity'];
	$Addtocart = $cart->addtocart($productId,$quantity);
}
?>
<section class="single-product">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li><a href="shop.html">Shop</a></li>
				</ol>
			</div>
			<!-- <div class="col-md-6">
				<ol class="product-pagination text-right">
					<li><a href="blog-left-sidebar.html"><i class="tf-ion-ios-arrow-left"></i> Next </a></li>
					<li><a href="blog-left-sidebar.html">Preview <i class="tf-ion-ios-arrow-right"></i></a></li>
				</ol>
			</div> -->
		</div>
        <?php
                 $getproductDetail = $pro->getDetails($productId);
                                if($getproductDetail){
                                    while($result =  $getproductDetail->fetch_assoc()){
                ?>
		<div class="row mt-20">
			<div class="col-md-5">
				<div class="single-product-slider">
					<div id="carousel-custom" class="carousel slide" data-ride="carousel">
						<div class="carousel-outer">
							<!-- me art lab slider -->
							<div class="carousel-inner ">
								<div class="item active">
									<img src="admin/uploads/product/<?php echo $result['productImage']?>" alt="" data-zoom-image="images/shop/single-products/product-1.jpg">
								</div>
								<div class="item">
									<img src="images/shop/single-products/product-2.jpg" alt="" data-zoom-image="images/shop/single-products/product-2.jpg">
								</div>
							</div>
							
							<!-- sag sol -->
							<a class="left carousel-control" href="#carousel-custom" data-slide="prev">
								<i class="tf-ion-ios-arrow-left"></i>
							</a>
							<a class="right carousel-control" href="#carousel-custom" data-slide="next">
								<i class="tf-ion-ios-arrow-right"></i>
							</a>
						</div>
						
						<!-- thumb -->
						<ol class="carousel-indicators mCustomScrollbar meartlab">
							<li data-target="#carousel-custom" data-slide-to="0" class="active">
								<img src="images/shop/single-products/product-1.jpg" alt="">
							</li>
							<li data-target="#carousel-custom" data-slide-to="1" class="">
								<img src="images/shop/single-products/product-2.jpg" alt="">
							</li>
							<li data-target="#carousel-custom" data-slide-to="2" class="">
								<img src="images/shop/single-products/product-3.jpg" alt="">
							</li>
							<li data-target="#carousel-custom" data-slide-to="3" class="">
								<img src="images/shop/single-products/product-4.jpg" alt="">
							</li>
							<li data-target="#carousel-custom" data-slide-to="4" class="">
								<img src="images/shop/single-products/product-5.jpg" alt="">
							</li>
							<li data-target="#carousel-custom" data-slide-to="5" class="">
								<img src="images/shop/single-products/product-6.jpg" alt="">
							</li>
							<li data-target="#carousel-custom" data-slide-to="6">
								<img src="images/shop/single-products/product-7.jpg" alt="">
							</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="single-product-details">
					<h2><?php echo $result['productName']?></h2>
					<p class="product-price"><?php echo $result['productPrice']." ".'VNĐ'?></p>
					
					<p class="product-description mt-20">
                    <?php echo $fm->textShorten($result['productDesc'],200)?>
					</p>
					<div class="product-size">
						<span>Size:</span>
						<select class="form-control">
							<option>S</option>
							<option>M</option>
							<option>L</option>
							<option>XL</option>
						</select>
					</div>
				
					<div class="product-category">
						<span>Danh mục:</span>
						<span><a href="product-single.html"><p><?php echo $result['cateName']?></p></a></span>
					</div>
                    <div class="product-category">
						<span>Thương hiệu:</span>
						<span><a href="product-single.html"><p><?php echo $result['brandName']?></p></a></span>
					</div>
					<form action="" method="post">
					<div class="product-quantity">
						<span>Số lượng:</span>
						<div class="product-quantity-slider">
							<input type="number" name="quantity" min="1" value="1" style="width:50%;text-align:center;">
						</div>
					</div>
						<!-- <a href="cart.php" class="btn btn-main mt-20">Thêm vào giỏ hàng</a> -->
						<button type="submit" class="btn btn-main mt-20" name="submit" value="">Thêm vào giỏ hàng</button>
					</form>
				</div>
				<?php
				if(isset($Addtocart)){
					echo $Addtocart;
				}
				?>
			</div>
		</div>
        <?php }}?>
		<div class="row">
			<div class="col-xs-12">
				<div class="tabCommon mt-20">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Details</a></li>
						<li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false">Reviews (3)</a></li>
					</ul>
					<div class="tab-content patternbg">
						<div id="details" class="tab-pane fade active in">
							<h4>Product Description</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut per spici</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis delectus quidem repudiandae veniam distinctio repellendus magni pariatur molestiae asperiores animi, eos quod iusto hic doloremque iste a, nisi iure at unde molestias enim fugit, nulla voluptatibus. Deserunt voluptate tempora aut illum harum, deleniti laborum animi neque, praesentium explicabo, debitis ipsa?</p>
						</div>
						<div id="reviews" class="tab-pane fade">
							<div class="post-comments">
						    	<ul class="media-list comments-list m-bot-50 clearlist">
								    <!-- Comment Item start-->
								    <li class="media">

								        <a class="pull-left" href="#!">
								            <img class="media-object comment-avatar" src="images/blog/avater-1.jpg" alt="" width="50" height="50">
								        </a>

								        <div class="media-body">
								            <div class="comment-info">
								                <h4 class="comment-author">
								                    <a href="#!">Jonathon Andrew</a>
								                	
								                </h4>
								                <time datetime="2013-04-06T13:53">July 02, 2015, at 11:34</time>
								                <a class="comment-button" href="#!"><i class="tf-ion-chatbubbles"></i>Reply</a>
								            </div>

								            <p>
								                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut ante eleifend eleifend.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod laborum minima, reprehenderit laboriosam officiis praesentium? Impedit minus provident assumenda quae.
								            </p>
								        </div>

								    </li>
								    <!-- End Comment Item -->

								    <!-- Comment Item start-->
								    <li class="media">

								        <a class="pull-left" href="#!">
								            <img class="media-object comment-avatar" src="images/blog/avater-4.jpg" alt="" width="50" height="50">
								        </a>

								        <div class="media-body">

								            <div class="comment-info">
								                <div class="comment-author">
								                    <a href="#!">Jonathon Andrew</a>
								                </div>
								                <time datetime="2013-04-06T13:53">July 02, 2015, at 11:34</time>
								                <a class="comment-button" href="#!"><i class="tf-ion-chatbubbles"></i>Reply</a>
								            </div>

								            <p>
								                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut ante eleifend eleifend. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni natus, nostrum iste non delectus atque ab a accusantium optio, dolor!
								            </p>

								        </div>

								    </li>
								    <!-- End Comment Item -->

								    <!-- Comment Item start-->
								    <li class="media">

								        <a class="pull-left" href="#!">
								            <img class="media-object comment-avatar" src="images/blog/avater-1.jpg" alt="" width="50" height="50">
								        </a>

								        <div class="media-body">

								            <div class="comment-info">
								                <div class="comment-author">
								                    <a href="#!">Jonathon Andrew</a>
								                </div>
								                <time datetime="2013-04-06T13:53">July 02, 2015, at 11:34</time>
								                <a class="comment-button" href="#!"><i class="tf-ion-chatbubbles"></i>Reply</a>
								            </div>

								            <p>
								                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut ante eleifend eleifend.
								            </p>

								        </div>

								    </li>
							</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>
<!-- End DETAILS -->
<section class="products related-products section">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<h2>Related Products</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="product-item">
					<div class="product-thumb">
						<span class="bage">Sale</span>
						<img class="img-responsive" src="images/shop/products/product-5.jpg" alt="product-img">
						<div class="preview-meta">
							<ul>
								<li>
									<span data-toggle="modal" data-target="#product-modal">
										<i class="tf-ion-ios-search"></i>
									</span>
								</li>
								<li>
			                        <a href="#"><i class="tf-ion-ios-heart"></i></a>
								</li>
								<li>
									<a href="#!"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="product-single.html">Reef Boardsport</a></h4>
						<p class="price">$200</p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="product-item">
					<div class="product-thumb">
						<img class="img-responsive" src="images/shop/products/product-1.jpg" alt="product-img">
						<div class="preview-meta">
							<ul>
								<li>
									<span data-toggle="modal" data-target="#product-modal">
										<i class="tf-ion-ios-search-strong"></i>
									</span>
								</li>
								<li>
			                        <a href="#"><i class="tf-ion-ios-heart"></i></a>
								</li>
								<li>
									<a href="#!"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="product-single.html">Rainbow Shoes</a></h4>
						<p class="price">$200</p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="product-item">
					<div class="product-thumb">
						<img class="img-responsive" src="images/shop/products/product-2.jpg" alt="product-img">
						<div class="preview-meta">
							<ul>
								<li>
									<span data-toggle="modal" data-target="#product-modal">
										<i class="tf-ion-ios-search"></i>
									</span>
								</li>
								<li>
			                        <a href="#"><i class="tf-ion-ios-heart"></i></a>
								</li>
								<li>
									<a href="#!"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="product-single.html">Strayhorn SP</a></h4>
						<p class="price">$230</p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="product-item">
					<div class="product-thumb">
						<img class="img-responsive" src="images/shop/products/product-3.jpg" alt="product-img">
						<div class="preview-meta">
							<ul>
								<li>
									<span data-toggle="modal" data-target="#product-modal">
										<i class="tf-ion-ios-search"></i>
									</span>
								</li>
								<li>
			                        <a href="#"><i class="tf-ion-ios-heart"></i></a>
								</li>
								<li>
									<a href="#!"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="product-single.html">Bradley Mid</a></h4>
						<p class="price">$200</p>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>
<!-- MODAL -->
<div class="modal product-modal fade" id="product-modal" style="display: none;">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<i class="tf-ion-close"></i>
	</button>
  	<div class="modal-dialog " role="document">
    	<div class="modal-content">
	      	<div class="modal-body">
	        	<div class="row">
	        		<div class="col-md-8">
	        			<div class="modal-image">
		        			<img class="img-responsive" src="images/shop/products/modal-product.jpg">
	        			</div>
	        		</div>
	        		<div class="col-md-3">
	        			<div class="product-short-details">
	        				<h2 class="product-title">GM Pendant, Basalt Grey</h2>
	        				<p class="product-price">$200</p>
	        				<p class="product-short-description">
	        					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto nihil cum. Illo laborum numquam rem aut officia dicta cumque.
	        				</p>
	        				<a href="#!" class="btn btn-main">Add To Cart</a>
	        				<a href="#!" class="btn btn-transparent">View Product Details</a>
	        			</div>
	        		</div>
	        	</div>
	        </div>
    	</div>
  	</div>
</div>

<?php
include 'views/inc/footer.php';
?> 
