<?php
include 'views/inc/header.php';
?>
<?php
 if(isset($_GET['cartId']) ){
  $delId=$_GET['cartId'];
  $delCart= $cart->deleteProCO($delId);
  }
  ?>
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Thanh toán</h1>
					<ol class="breadcrumb">
						<li><a href="cart.php">Giỏ hàng</a></li>
						<li class="active">Thanh toán</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="page-wrapper">
   <div class="checkout shopping">
      <div class="container">
         <div class="row">
            <div class="col-md-8">
               <div class="block billing-details">
                  <h4 class="widget-title">Thông tin nhận hàng</h4>
                  <form class="checkout-form">
                     <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control" id="full_name" placeholder="">
                     </div>
                     <div class="form-group">
                        <label for="user_address">Address</label>
                        <input type="text" class="form-control" id="user_address" placeholder="">
                     </div>
                     <div class="checkout-country-code clearfix">
                        <div class="form-group">
                           <label for="user_post_code">Zip Code</label>
                           <input type="text" class="form-control" id="user_post_code" name="zipcode" value="">
                        </div>
                        <div class="form-group">
                           <label for="user_city">City</label>
                           <input type="text" class="form-control" id="user_city" name="city" value="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="user_country">Country</label>
                        <input type="text" class="form-control" id="user_country" placeholder="">
                     </div>
                  </form>
               </div>
               <div class="block">
                  <h4 class="widget-title">Phương thức thanh toán</h4>
                  <p>Credit Cart Details (Secure payment)</p>
                  <div class="checkout-product-details">
                     <div class="payment">
                        <div class="card-details">
                           <form class="checkout-form">
                              <div class="form-group">
                                 <label for="card-number">Card Number <span class="required">*</span></label>
                                 <input id="card-number" class="form-control" type="tel" placeholder="•••• •••• •••• ••••">
                              </div>
                              <div class="form-group half-width padding-right">
                                 <label for="card-expiry">Expiry (MM/YY) <span class="required">*</span></label>
                                 <input id="card-expiry" class="form-control" type="tel" placeholder="MM / YY">
                              </div>
                              <div class="form-group half-width padding-left">
                                 <label for="card-cvc">Card Code <span class="required">*</span></label>
                                 <input id="card-cvc" class="form-control" type="tel" maxlength="4" placeholder="CVC">
                              </div>
                              <a href="cart.php" class="btn btn-submit btn-solid-border">Quay về giỏ hàng</a>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="product-checkout-details">
                  <div class="block">
                     <h4 class="widget-title">Đơn hàng</h4>
                     <?php
                    $getcart = $cart->getProductCart();
                    if($getcart){
                        $totalCart=0;
                       
                        while ($result=$getcart->fetch_assoc()){
                    ?>
                     <div class="media product-card">
                        <a class="pull-left" href="product-single.html">
                           <img class="media-object" src="admin/uploads/product/<?php echo $result['image']?>" alt="productImage">
                        </a>
                        <div class="media-body">
                           <h4 class="media-heading"><a href="details.php?proId=<?php echo $result['productId']?>"><?php echo $result['productName']?></a></h4>
                           <p class="price"><?php echo $result['quantity']?> x <?php echo $result['price']." "."VNĐ"?></p>
                           <?php $total= $result['price'] * $result['quantity'];?>
                           <span class="remove"><a href="?cartId=<?php echo $result['cartId']?>">xóa</a></span>
                        </div>
                     </div>
                     <?php
                     $totalCart += $total; }}?>
                     <div class="discount-code">
                        <p>Have a discount ? <a data-toggle="modal" data-target="#coupon-modal" href="#!">enter it here</a></p>
                     </div>
                     <ul class="summary-prices">
                     <?php if($getcart){?>
                        <li>
                           <span>Thành tiền:</span>
                           <span class="price"><?php echo $totalCart." "."VNĐ"?></span>
                        </li>
                        <li>
                           <span>Shipping:</span>
                           <span>Free</span>
                        </li>
                     </ul>
                     <div class="summary-total">
                        <span>Tổng cộng</span>
                        <span><?php echo $totalCart." "."VNĐ"?></span>
                     </div>
                     <?php }else{
                        header('location: cart.php');
                     }?>
                     <div class="verified-icon">
                        <a href="cart.php" class="btn btn-submit btn-solid-border pull-right">Thanh toán</a>
                     </div>
                    
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
