<?php
include 'views/inc/header.php';
?>
<?php
  $login_check= Session::get('customer_login');
   if($login_check==false){
	header('location: login.php');}?>
<?php
 if(isset($_GET['cartId']) ){
  $delId=$_GET['cartId'];
  $delCart= $cart->deleteProCO($delId);
  }
  ?>
  <?php
 if(isset($_GET['orderid']) &&$_GET['orderid']=='order'  ){
    $customerId = Session::get('customer_id');
    $insertOrder = $cart->insertOder( $customerId);
    //neu da thanh toan thi xoa gio hang
    $delCart=$cart->delAllCart();
    header('location: success.php');
  }
  ?>
  <?php
  if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['submit'])){
   $checkmethodpayment = $_POST['payment'];
	if( $checkmethodpayment == 'cash'){
      header('location: ?orderid=order');
   }else{
      header('location: congthanhtoan.php');
   }
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
                  <?php
                $id=Session::get('customer_id');
                $getcustomer = $cs->getallCustomer($id);
                if($getcustomer){
                    while($result=$getcustomer->fetch_assoc()){
                ?>
                  <form class="checkout-form">
                     <div class="form-group">
                        <label for="full_name">Tên:</label>
                        <input type="text" class="form-control" id="full_name" value="<?php echo $result['Name'];?>">
                     </div>
                     <div class="form-group">
                        <label for="user_address">Địa chỉ:</label>
                        <input type="text" class="form-control" id="user_address" value="<?php echo $result['Address'];?>">
                     </div>
                     <div class="checkout-country-code clearfix">
                        <div class="form-group">
                           <label for="user_post_code">Số điện thoại:</label>
                           <input type="text" class="form-control" id="user_phone" name="phone" value="<?php echo $result['Phone'];?>">
                        </div>
                        <div class="form-group">
                           <label for="user_city">Email:</label>
                           <input type="text" class="form-control" id="user_email" name="email" value="<?php echo $result['Email'];?>">
                        </div>
                     </div>
                     <!-- <div class="form-group">
                        <label for="user_country">Country</label>
                        <input type="text" class="form-control" id="user_country" placeholder="">
                     </div> -->
                  </form>
                  <?php }}?>
               </div>
               <div class="block">
                  <h4 class="widget-title">Phương thức thanh toán</h4>
                  <!-- <p>Credit Cart Details (Secure payment)</p> -->
                  <div class="checkout-product-details">
                     <div class="payment">
                        <div class="card-details">
                        <div class="form-group">
                           <form action="" method="post">
                            <label for="delivery">Thanh toán khi nhận hàng</label> 
                            <input type="radio" id="delivery" name="payment" value="cash"checked>
                            <br>
                            <label for="delivery">Thanh toán QR momo</label> 
                            <input type="radio" id="momo" name="payment" value="momo">
                            <button type="submit" name="submit" class="btn btn-submit btn-solid-border pull-right">Thanh toán</button>
                            </form>
                        </div>
                       
                           <!-- <form class="checkout-form"> -->
                     
                           <!-- </form> -->
                        <!-- <form action="congthanhtoan.php" method="post">
                        <button id="redirect" name="redirect" class="btn btn-submit btn-solid-border">Thanh toán QR momo</button> -->
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
                        <a class="pull-left" href="details.php?proId=<?php echo $result['productId']?>">
                           <img class="media-object" src="admin/uploads/product/<?php echo $result['image']?>" alt="productImage">
                        </a>
                        <div class="media-body">
                           <h4 class="media-heading"><a href="details.php?proId=<?php echo $result['productId']?>"><?php echo $result['productName']?></a></h4>
                           <p class="price"><?php echo $result['quantity']?> x <?php echo $fm->format_currency($result['price'])." "."VNĐ"?></p>
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
                           <span class="price"><?php echo $fm->format_currency($totalCart)." "."VNĐ"?></span>
                        </li>
                        <li>
                           <span>Shipping:</span>
                           <span>Free</span>
                        </li>
                     </ul>
                     <div class="summary-total">
                        <span>Tổng cộng</span>
                        <span><?php echo $fm->format_currency($totalCart)." "."VNĐ"?></span>
                     </div>
                     <?php }else{
                        // header('location: cart.php');
                     }?>
                     <div class="verified-icon">
                       
                        <!-- <input name="submit" type="submit" class="btn btn-submit btn-solid-border pull-right" value="Thanh toán"></input> -->
                        <a href="cart.php" class="btn btn-submit btn-solid-border">Quay về giỏ hàng</a>
                        <!-- <a href="?orderid=order" class="btn btn-submit btn-solid-border pull-right" >Thanh toán </a> -->
                        
                      
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
