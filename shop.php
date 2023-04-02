<?php
include 'views/inc/header.php';
?>

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Sản phẩm</h1>
					<ol class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li class="active">shop</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="products section">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<!-- <div class="widget">
					<h4 class="widget-title">Short By</h4>
					<form method="post" action="#">
                        <select class="form-control">
                            <option>Man</option>
                            <option>Women</option>
                            <option>Accessories</option>
                            <option>Shoes</option>
                        </select>
                    </form>
	            </div> -->
				<div class="widget product-category">
					<h4 class="widget-title">Danh mục</h4>
					<div class="panel-group commonAccordion" id="accordion" role="tablist" aria-multiselectable="true">
						<?php
						$getcate = $cate->showlistCate();
						if ($getcate) {
							while ($result = $getcate->fetch_assoc()) {


						?>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingOne">
										<h4 class="panel-title">
											<a href="productByCate.php?cateId=<?php echo $result['cateId'] ?>">
												<?php echo $result['cateName']; ?>
											</a>
										</h4>
									</div>
								</div>
						<?php
							}
						}
						?>

					</div>

				</div>
			</div>
			<div class="col-md-9">
				<div class="row">
					<?php
					$getproduct = $pro->showlistProduct();
					if ($getproduct) {
						while ($result = $getproduct->fetch_assoc()) { ?>

							<div class="col-md-4">
								<div class="product-item">
									<div class="product-thumb">
										<span class="bage">New</span>
										<img class="img-responsive" src="admin/uploads/product/<?php echo $result['productImage'] ?>" style="maxwidth:250px;" alt="product-img" />
										<div class="preview-meta">
											<ul>
												<li>
													<span data-toggle="modal" data-target="#product-modal-<?php echo $result['productId']; ?>">
														<i class="fas fa-search"></i>
													</span>
												</li>
												<li>
													<a href="#!"><i class="fas fa-heart"></i></a>
												</li>
											</ul>
										</div>
									</div>
									<div class="product-content">
										<h4><a href="details.php?proId=<?php echo $result['productId'] ?>"><?php echo $result['productName'] ?></a></h4>
										<p class="price"><?php echo $result['productPrice'] . " " . 'VNĐ' ?></p>
									</div>
									<!-- modal -->
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
															<img class="img-responsive" src="admin/uploads/product/<?php echo $result['productImage'] ?>" alt="product-img" alt="product-img" />
														</div>
													</div>
													<div class="col-md-4 col-sm-6 col-xs-12">
														<div class="product-short-details">
															<h2 class="product-title"><?php echo $result['productName'] ?></h2>
															<p class="product-price"><?php echo $result['productPrice'] . " " . 'VNĐ' ?></p>
															<p class="product-short-description">
																<?php echo $result['productDesc'] ?>
															</p>
															<!-- <form method="post">
												<button type="submit" name="submit "class="btn btn-main">Thêm vào giỏ hàng</button>
												</form> -->
															<a href="details.php?proId=<?php echo $result['productId'] ?>" class="btn btn-transparent">Chi tiết sản phẩm</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div><!-- /.modal -->

							</div>
					<?php }
					} ?>
					<!-- Modal -->
					<!-- /.modal -->
					<!-- Phan trang  ham ceil chia lam tron` -->
				</div>
				<div>
					<?php $getAllProduct = $pro->showlistProduct();
					$productCount = mysqli_num_rows($getAllProduct);
					$productButton = ceil($productCount / 4);
					echo '<p>Trang : </p>';
					$i=0;
					for ($i = 1; $i < $productButton; $i++) {
						echo '<a style="margin: 0 5px;" href="shop.php?trang=' . $i . '">' . $i . '</a>';
					
					}
					?>

				</div>
			</div>

		</div>
	</div>
</section>


<?php
include 'views/inc/footer.php';
?>