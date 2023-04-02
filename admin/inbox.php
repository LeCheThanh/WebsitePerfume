<?php include 'inc/header.php';?>
<?php include 'inc/slidebar.php';?>
<?php $filepath = realpath(dirname(__FILE__));
    include_once ( $filepath.'/../classes/cartModel.php');?>
<?php
    if(isset($_GET['shiftId'])){
      $ct=new cartModel();
      $shiftId = $_GET['shiftId'];
      $time = $_GET['time'];
      $price = $_GET['price'];
      $shift=$ct->shilfted($shiftId,$time,$price);
  
  }

  if(isset($_GET['delId'])){
    $ct=new cartModel();
    $shiftId = $_GET['delId'];
    $time = $_GET['time'];
    $price = $_GET['price'];
    $delShift=$ct->delShift($shiftId,$time,$price);

}

?>
<section id="main-content">
	<section class="wrapper">
	<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông báo
      </div>
      <table class="table" >
        <?php
        if(isset($shift)){
          echo  $shift;
        }
        ?>
          <?php
        if(isset($shift)){
          echo  $shift;
        }
        ?>
        
        <thead>
          <tr>
            <th>STT</th>
            <th>Thời gian đặt hàng</th>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Id người dùng</th>
            <th>Địa chỉ</th>
            <th>Chức năng</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $ct = new cartModel();
        $get_inbox_cart = $ct->getInboxCart();
        if($get_inbox_cart){
          $i=0;
          while($result=$get_inbox_cart->fetch_assoc()){
            $i++;
          ?>
          
          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo date('H:i d/m/Y',strtotime($result['dateOrder']));?></td>
            <!-- <td><img src="uploads/brand/" width="80px" alt="ImageBrand"></td> -->
            <td><?php echo $result['productName'];?></td>
            <td><?php echo $result['Quantity'];?></td>
            <td><?php echo $result['Price'];?></td>
            <td><?php echo $result['customerId'];?></td>
            <td><a href="customer.php?customerId=<?php echo $result['customerId']?>">Xem thông tin</a></td>
            <td><?php
                if($result['Status']==0){
                ?>
                <a href="?shiftId=<?php echo $result['orderId']?>&price=<?php echo $result['Price'] ?>&time=<?php echo $result['dateOrder'] ?>"><span class="label label-warning">Đang xử lý</span></a>
                <?php }elseif($result['Status']=='1'){ ?>
                  <a href=""><span class="label label-primary">Đã xử lý</span></a>
                  <?php }else{?>
                    <a href="?delId=<?php echo $result['orderId']?>&price=<?php echo $result['Price'] ?>&time=<?php echo $result['dateOrder'] ?>"><span class="label label-danger">Xóa</span></a>
                 <?php }?>
            </td>
          </tr>
          <?php  }  }?>
        </tbody>
        </table>
    </div>
  </div>
  <?php
include './inc/footer.php';
?>

