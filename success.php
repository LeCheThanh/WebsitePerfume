<?php
include 'views/inc/header.php';
?> 
<?php
  $login_check= Session::get('customer_login');
   if($login_check==false){
	header('location: 404.php');}?>
<section class="page-wrapper success-msg">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
        <i class="fa-solid fa-circle-check fa-bounce" style=""></i>
          <h2 class="text-center">Cảm ơn bạn đã thanh toán!</h2>
          <?php 
            $customerId = Session::get('customer_id');
            $get_amount = $cart->getAmountPrice($customerId);
            if($get_amount){
                $amountPrice=0;
                while($result= $get_amount->fetch_assoc()){
                    $price=$result['Price'];
                    $amountPrice += $price;
                }
            }
           ?>
           <p>Tổng đơn hàng của bạn là: <?php echo $amountPrice." ".'VNĐ';?></p>
          <p>Đơn hàng sẽ được giao với thời gian sớm nhất có thể</p>
          <a href="orderdetail.php" class="btn btn-main mt-20">Xem chi tiết đơn hàng</a>
          <a href="index.php" class="btn btn-main mt-20">Tiếp tục mua sắm</a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include 'views/inc/footer.php';
?> 
