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
  $id=Session::get('customer_id');
if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['submit'])){
	
	$updateCustomer = $cs->updateCustomer($id,$_POST);
}
?>
<section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content">
                             <h1 class="page-name">Cập nhật thông tin tài khoản</h1>
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
            <form action="" method="post">
            <table class="table table-bordered table-dark">
            <?php if(isset($updateCustomer)) {
                 echo'<thead colspan="4">'.$updateCustomer.'</thead>';
               }?>
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
                    <td><input type="text" name="name" value="  <?php echo $result['Name'];?>">
                    <td><input type="text" name="address" value="  <?php echo $result['Address'];?>">
                    <td><input type="text" name="phone" value="  <?php echo $result['Phone'];?>">
                    <td><input type="text" name="email" value="  <?php echo $result['Email'];?>">
              
                </tbody>
                <td colspan="4" ><input type="submit" name="submit" value="Cập nhật"  class="btn btn-submit btn-solid-border pull-right"></input></td>
                <?php     }
                }
                ?>
            </table>
            </form>
            </div>
		
  	</div>
</div>

<?php
include 'views/inc/footer.php';
?> 
