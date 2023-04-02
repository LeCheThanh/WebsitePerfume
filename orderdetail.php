<?php
include 'views/inc/header.php';
?>
<?php
//  if(isset($_GET['cartId']) ){
//   $delId=$_GET['cartId'];
//   $delCart= $cart->deleteProCO($delId);
//   }
//   ?>
   <?php
   $login_check= Session::get('customer_login');
   if($login_check==false){
	header('location: login.php');
 }
  ?>
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Chi tiết đơn hàng</h1>
					<ol class="breadcrumb">
						<li><a href="index.php">Trang chủ</a></li>
						<li class="active">Chi tiết đơn hàng</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="page-wrapper">
  <div class="cart shopping">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="block">
            <div class="product-list">
             
                <table class="table">
                  <thead>
                    <tr>
                      <th class="">Sản phẩm</th>
                      <th class="">Giá</th>
                      <th class="">Số lượng</th>
                      <th class="">Thành tiền</th>
                      <th class="">Trạng thái</th>
                      <th class="">Ngày đặt</th>
                      <th class="">Chức năng</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $id=Session::get('customer_id');
                    $getcart = $cart->getcartOdered($id);
                    if($getcart){
                        $totalCart=0;
                       
                        while ($result=$getcart->fetch_assoc()){
                    ?>
                    <tr class="">
                      <td class="">
                        <div class="product-info">
                          <img width="80" src="admin/uploads/product/<?php echo $result['Image']?>" alt="productImage">
                          <a href="details.php?proId=<?php echo $result['productId']?>"><?php echo $result['productName']?></a>
                        </div>
                      </td>
                      <td class=""><?php echo $result['Price']." "."VNĐ"?></td>
                      <td name="quantity"> <?php echo $result['Quantity']?></td>
                      <td class=""><?php $total= $result['Price'] * $result['Quantity']; echo $total." "."VNĐ"?></td>
                      <td class="" name="Status"><?php
                      if($result['Status']==0){
                        echo '<span class="label label-warning">Đang xử lý</span>';
                      }else{
                        echo '<span class="label label-primary">Đã xử lý</span>';
                      }
                      ?>

                      </td>
                      <td class="">
                      <?php 
                      
                      echo date('H:i d/m/Y',strtotime($result['dateOrder']));
                      ?>
                      </td>
                 
                    <?php
                     if($result['Status']==0){?>
                     <td><?php echo 'N/A';?></td>
                    <?php }else{?> 
                     <td><a class="label label-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="?cartId=<?php echo $result['cartId']?>">Xóa</a></td>
                    <?php }?>
                    </tr>
    
                    <?php
                       $totalCart += $total;
                            }
                          }?>
                      
                  </tbody>
                </table>
                <hr style="border:.2px solid #ccc">
                <?php if($getcart){?>
                  <tr>
                    <th> <b>Tổng tiền:</b>  </th>
                    <td><?php echo  $totalCart.' '.'VNĐ';  Session::set("total",$totalCart);?></td>
                  </tr>
                    <?php 
                    }else{
                  // echo '<p>Giỏ hàng đang trống!</p>';
                }?>
<!--                 
                <a href="checkout.php" class="btn btn-submit btn-solid-border pull-right"><b>Thanh toán</b></a>
                <a href="shop.php" class="btn btn-submit btn-solid-border pull-right"><b>Tiếp tục mua sắm</b></a> -->
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
