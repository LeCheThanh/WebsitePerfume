<?php include 'inc/header.php';?>
<?php include 'inc/slidebar.php';?>
<?php $filepath = realpath(dirname(__FILE__));
    include_once ( $filepath.'/../classes/customerC.php');?>
<?php
    if(!isset($_GET['customerId']) || $_GET['customerId']==null){
        // 
        echo "<script>window.location = 'inbox.php'</script>";
    }else{
        $customerId=$_GET['customerId'];
    }
    $cs = new customerC();
?>

<section id="main-content">
	<section class="wrapper">
	<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Khách hàng
      </div>
      <table class="table" >
        <thead>
          <tr>
            <th >Tên</th>
            <th >Tên đăng nhập</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php
       $getCustomer=$cs->getallCustomer($customerId);
       if( $getCustomer){
               while ($result = $getCustomer->fetch_assoc()){
           ?> 
          
          <tr>
            <td><?php echo $result['Name'];?></td>
            <td><?php echo $result['Username'];?></td>
            <td><?php echo $result['Address'];?></td>
            <td><?php echo $result['Phone'];?></td>
            <td><?php echo $result['Email'];?></td>
            <td><a href="brandEdit.php?brandId=<?php echo $result['customerId']?>"><i class="fa fa-pencil-square-o"></i></a> | <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="?delbrandId=<?php echo $result['customerId']?>"><i class="fa fa-trash"></i></a></td>
          </tr>
          <?php }}?>
        </tbody>
        </table>
    </div>
  </div>
  <?php
include './inc/footer.php';
?>

