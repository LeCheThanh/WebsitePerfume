<?php include 'inc/header.php';?>
<?php include 'inc/slidebar.php';?>
<?php include '../classes/brandC.php'?>
<?php
    $brand = new brandC();
    if(isset($_GET['delbrandId']) ){
        $delId=$_GET['delbrandId'];
        $delBrand= $brand->deleteBrand($delId);
        }
?>



<section id="main-content">
	<section class="wrapper">
	<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách thương hiệu
      </div>
      <table class="table" >
        <thead>
          <tr>
            <th >Tên thương hiệu</th>
            <th>Hình ảnh</th>
            <th>Mô tả</th>
            <th>Chức năng</th>
          </tr>
        </thead>
        <tbody>
        <?php
       $showlistBrand = $brand->showlistBrand();
       if(isset($showlistBrand)){
           while($result=$showlistBrand->fetch_assoc()){
          ?>
          
          <tr>
            <td><?php echo $result['brandName'];?></td>
            <td><img src="uploads/brand/<?php echo $result['brandImage'];?>" width="80px" alt="ImageBrand"></td>
            <td><?php echo $result['brandDescription'];?></td>
            <td><a href="brandEdit.php?brandId=<?php echo $result['brandId']?>"><i class="fa fa-pencil-square-o"></i></a> | <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="?delbrandId=<?php echo $result['brandId']?>"><i class="fa fa-trash"></i></a></td>
          </tr>
          <?php }}?>
        </tbody>
        </table>
    </div>
  </div>




<?php
include './inc/footer.php';
?>

