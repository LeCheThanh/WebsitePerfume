<?php
include 'views/inc/header.php';
?>
<?php
 $login_check= Session::get('customer_login');
if($login_check==false){
    header('location: login.php');
}?>

<?php
//  if(!isset($_GET['proId']) || $_GET['proId']==null){
//     // 
//     echo "<script>window.location = '404.php'</script>";
// }else{
//     $productId=$_GET['proId'];
// } 
// if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['submit'])){
// 	$quantity = $_POST['quantity'];
// 	$Addtocart = $cart->addtocart($productId,$quantity);
// }
?>
<section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content">
                             <h1 class="page-name">Thông tin tài khoản</h1>
                                    <ol class="breadcrumb">
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            </section>
<section class="single-product">
	<div class="container">
		<div class="row">
            
            <table class="table table-bordered table-dark">
            <?php
                $id=Session::get('customer_id');
                $getcustomer = $cs->getallCustomer($id);
                if($getcustomer){
                    while($result=$getcustomer->fetch_assoc()){
                ?>
                <thead>
                    <th>Tên</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                </thead>
                <tbody>
                    <td><?php echo $result['Name'];?></td>
                    <td><?php echo $result['Address'];?></td>
                    <td><?php echo $result['Phone'];?></td>
                    <td><?php echo $result['Email'];?></td>
                </tbody>
                <table class="table table-bordered table-dark">
                <?php     }
                }
                ?>
            </table>
            </div>
		
  	</div>
</div>

<?php
include 'views/inc/footer.php';
?> 
