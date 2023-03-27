<?php
include 'views/inc/header.php';
?>
<?php
  if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['submit'])){
    $cartId = $_POST['cartId'];
    $quantity = $_POST['quantity'];
    $updatequantityCart = $cart->updatequantityCart($quantity,$cartId);
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
              <form method="post">
                <table class="table">
                  <?php if(isset($updatequantityCart)){
                    echo $updatequantityCart;
                  }
                  ?>
                  <thead>
                    <tr>
                      <th class="">Item Name</th>
                      <th class="">Item Price</th>
                      <th class="">Quantity</th>
                      <th class="">Total Price</th>
                      <th class="">Actions</th>
                    </tr>
                  </thead>
                  <?php
                    $getcart = $cart->getProductCart();
                    if($getcart){
                        $totalCart=0;
                        while ($result=$getcart->fetch_assoc()){
                    ?>
                  <tbody>
                    
                    <tr class="">
                      <td class="">
                        <div class="product-info">
                          <img width="80" src="admin/uploads/product/<?php echo $result['image']?>" alt="productImage">
                          <a href="#!"><?php echo $result['productName']?></a>
                        </div>
                      </td>
                      <td class=""><?php echo $result['price']." "."VNĐ"?></td>
                      <input type="hidden" name="cartId"value="<?php echo $result['cartId']?>">
                      <td class=""><input name="quantity" type="number" min="1" value="<?php echo $result['quantity']?>" style="width:50%;text-align:center;"></td>
                      <td class=""><?php $total= $result['price'] * $result['quantity']; echo $total." "."VNĐ"?></td>
                      <td class="">
                      <button type="submit" name="submit">Cập nhật</button>
                      <button class="product-remove" href="#!">Xóa</button>
                      </td>
                    </tr>
    
                  </tbody>
                  <?php
                     $totalCart += $total;
                          }
                        }?>
                    
                </table>
                <hr style="border:.2px solid #ccc">
                <table>
                    <th>Total: </th>
                    <td class="pull-right"><?php echo $totalCart; ?></td>
                </table>
                <a href="checkout.html" class="btn btn-main pull-right">Checkout</a>
              </form>
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
