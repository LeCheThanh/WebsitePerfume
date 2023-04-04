<?php
include 'views/inc/header.php';
?>
<?php
  if(!isset($_GET['cateId']) || $_GET['cateId']==null){
    // 
    echo "<script>window.location = '404.php'</script>";
}else{
    $cateId=$_GET['cateId'];
}
?>

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
                    <?php $getcateName = $cate->getCateName($cateId);
                    if($getcateName){
                        $cateName=$getcateName->fetch_assoc();
                    ?>
					<h1 class="page-name"><?php echo  $cateName['cateName'];?></h1>
                    <?php }?>
					<ol class="breadcrumb">
						<li><a href="index.php">Trang chủ</a></li>
						<li class="active">Sản phẩm</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="products section">
	<div class="container">
		<div class="row">
			<?php $getbycate = $cate->getproductByCate($cateId);
            if($getbycate){
                while($result =$getbycate->fetch_assoc()){
            ?>
			<div class="col-md-4">
				<div class="product-item">
					<div class="product-thumb">
						<span class="bage"></span>
						<img class="img-responsive" src="admin/uploads/product/<?php echo $result['productImage']?>" alt="product-img">
						<div class="preview-meta">
							<ul>
								<li>
									<span data-toggle="modal"  data-target="#product-modal-<?php echo $result['productId'];?>">
										<i class="tf-ion-ios-search-strong"></i>
									</span>
								</li>
								<li>
			                        <a href="#!"><i class="tf-ion-ios-heart"></i></a>
								</li>
								<!-- <li>
									<a href="#!"><i class="tf-ion-android-cart"></i></a>
								</li> -->
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="details.php?proId=<?php echo $result['productId']?>"><?php echo $result['productName'];?></a></h4>
						<p class="price"><?php echo $fm->format_currency($result['productPrice']);?></p>
					</div>
				</div>
			</div>
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
												<p class="product-price"><?php echo $fm->format_currency($result['productPrice'])." ".'VNĐ'?></p>
												<p class="product-short-description">
												<?php echo $result['productDesc']?>
												</p>
												<!-- <a href="cart.html" class="btn btn-main">Thêm vào giỏ hàng</a> -->
												<form method="post">
												<button name="submit "class="btn btn-main">Thêm vào giỏ hàng</button>
												</form>

												<a href="details.php?proId=<?php echo $result['productId']?>" class="btn btn-transparent">Chi tiết sản phẩm</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- /.modal -->
            <?php           }
            }else{
                    echo 'Không có sản phẩm nào thuộc danh mục này';
            }?>
		</div>
		<!-- Modal -->
		<!-- <div class="modal product-modal fade" id="product-modal">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<i class="tf-ion-close"></i>
			</button>
		  	<div class="modal-dialog " role="document">
		    	<div class="modal-content">
			      	<div class="modal-body">
			        	<div class="row">
			        		<div class="col-md-8 col-sm-6 col-xs-12">
			        			<div class="modal-image">
				        			<img class="img-responsive" src="images/shop/products/modal-product.jpg" alt="product-img">
			        			</div>
			        		</div>
			        		<div class="col-md-4 col-sm-6 col-xs-12">
			        			<div class="product-short-details">
			        				<h2 class="product-title">GM Pendant, Basalt Grey</h2>
			        				<p class="product-price">$200</p>
			        				<p class="product-short-description">
			        					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto nihil cum. Illo laborum numquam rem aut officia dicta cumque.
			        				</p>
			        				<a href="cart.html" class="btn btn-main">Add To Cart</a>
			        				<a href="product-single.html" class="btn btn-transparent">View Product Details</a>
			        			</div>
			        		</div>
			        	</div>
			        </div>
		    	</div>
		  	</div>
		</div>/.modal -->

		</div>
	</div>
</section>
<?php
include 'views/inc/footer.php';
?> 
