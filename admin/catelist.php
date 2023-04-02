<?php include 'inc/header.php';?>
<?php include 'inc/slidebar.php';?>
<?php include '../classes/categoryC.php'?>
<?php
    $class = new categoryC();
    if(isset($_GET['delId']) ){
        $delId=$_GET['delId'];
        $delCate= $class->deleteCate($delId);
        }
?>


<section id="main-content">
	<section class="wrapper">
	<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách danh mục
      </div>
      <table class="table" >
      <?php
            if(isset($delCate)){
                echo $delCate;
            }
            ?>
        <thead>
          <tr>
            <th >Tên danh mục</th>
            <th>Mô tả</th>
            <th>Chức năng</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $showlistCate = $class->showlistCate();
        if(isset($showlistCate)){
            while($result=$showlistCate->fetch_assoc()){
          ?>
          <tr>
            <td><?php echo $result['cateName'];?></td>
            <td><?php echo $result['cateDescription'];?></td>
            <td><a href="cateEdit.php?cateId=<?php echo $result['cateId']?>"><i class="fa fa-pencil-square-o"></i></a> | <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="?delId=<?php echo $result['cateId']?>"><i class="fa fa-trash"></a></td>
          </tr>
          <?php }}?>
        </tbody>
        </table>
    </div>
  </div>




<?php
include './inc/footer.php';
?>

