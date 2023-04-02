
<?php include './inc/header.php';?>
<?php include './inc/slidebar.php';?>



<section id="main-content">
	<section class="wrapper">
	<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách sản phẩm
      </div>
      <table class="table" >
        <thead>
          <tr>
            <th >Tên sản phẩm</th>
            <th>Mô tả</th>
            <th>Hình ảnh</th>
            <th>Trạng thái</th>
            <th>Loại</th>
            <th>Nổi bật</th>
            <th>Giá</th>
            <th>Thương hiệu</th>
            <th>Chức năng</th>
          </tr>
        </thead>
        <tbody>
        <?php
       if(isset($showlistProduct)){
           while($result=$showlistProduct->fetch_assoc()){
          ?>
          
          <tr>
            <td><?php echo $result['productName'];?></td>
            <td><?php echo $fm->textShorten($result['productDesc'],20);?></td>
            <td><img src="uploads/product/<?php echo $result['productImage']?>" alt="product_image" width="80px"></td>
            <td>
                <?php if($result['productStatus']==0){
                echo'<p>hết hàng</p>';
                }else {echo'<p>còn hàng</p>';}
                ?>

            </td>
            <td><?php
            if(isset($catelist)){
                while($resultcate=$catelist->fetch_assoc()){
                    if($result['category_id']==$resultcate['cateId'])
                    echo $resultcate['cateName'];
                   } } ?>
             </td>
            <td> <?php if($result['productType']==0){
                echo'<p>Không nổi bật</p>';
                }else {echo'<p>Nổi bật</p>';}
                ?></td>
            <td><?php echo $result['productPrice'];?></td>
            <td><?php
            if(isset($brandlist)){
                while($resultbrand=$brandlist->fetch_assoc()){
                    if($result['brand_Id']==$resultbrand['brandId'])
                    echo $resultbrand['brandName'];
                   } } ?>
            </td>
            <td><a href="productEdit.php?productId=<?php echo $result['productId']?>"><i class="fa fa-pencil-square-o"></i></a> | <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="?delproductId=<?php echo $result['productId']?>"><i class="fa fa-trash"></i></a></td>
          </tr>
          <?php }}?>
        </tbody>
        </table>
    </div>
  </div>




<?php
include './inc/footer.php';
?>

