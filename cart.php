<?php
include 'views/inc/header.php';
?>
<?php
 if(isset($_GET['cartId']) ){
  $delId=$_GET['cartId'];
  $delCart= $cart->deleteProCart($delId);
  }
  if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['submit'])){
    $cartId = $_POST['cartId'];
    $quantity = $_POST['quantity'];
    $updatequantityCart = $cart->updatequantityCart($quantity,$cartId);
  }
?>
<?php
if(!isset($_GET['id'])){
  echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}
?>
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Cart</h1>
					<ol class="breadcrumb">
						<li><a href="index.html">Home</a></li>
						<li class="active">cart</li>
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
                  <?php if(isset($updatequantityCart)){
                    echo $updatequantityCart;
                  }
                  ?>
                  <thead>
                    <tr>
                      <th class="">Sản phẩm</th>
                      <th class="">Giá</th>
                      <th class="">Số lượng</th>
                      <th class="">Thành tiền</th>
                      <th class=""></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $getcart = $cart->getProductCart();
                    if($getcart){
                        $totalCart=0;
                       
                        while ($result=$getcart->fetch_assoc()){
                    ?>
                    <tr class="">
                      <td class="">
                        <div class="product-info">
                          <img width="80" src="admin/uploads/product/<?php echo $result['image']?>" alt="productImage">
                          <a href="#!"><?php echo $result['productName']?></a>
                        </div>
                      </td>
                      <td class=""><?php echo $result['price']." "."VNĐ"?></td>
                      <form method="post">
                      <td class="">
                      <input name="quantity" type="number" min="1" value="<?php echo $result['quantity']?>" style="width:50%;text-align:center;">
                      <input type="hidden" name="cartId" value="<?php echo $result['cartId']?>">
                      <button type="submit" name="submit">Cập nhật</button>
                      </td>
                      </form>
                      <td class=""><?php $total= $result['price'] * $result['quantity']; echo $total." "."VNĐ"?></td>
                      <td class="">
                     
                      <button class="product-remove"><a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="?cartId=<?php echo $result['cartId']?>">Xóa</a></button>
                      </td>
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
                  echo '<p>Giỏ hàng đang trống!</p>';
                }?>
                
                <a href="checkout.html" class="btn btn-submit btn-solid-border pull-right"><b>Thanh toán</b></a>
                <a href="shop.php" class="btn btn-submit btn-solid-border pull-right"><b>Tiếp tục mua sắm</b></a>
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
