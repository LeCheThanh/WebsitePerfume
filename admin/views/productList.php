
<?php include './inc/header.php';?>
<?php include './inc/slidebar.php';?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    <?php
            // if(isset($delCate)){
            //     echo $delCate;
            // }
            // ?>
    <tr>
        <th>Tên sản phẩm</th>
        <th>Mô tả</th>
        <th>Hình ảnh</th>
        <th>Trạng thái</th>
        <th>Loại</th>
        <th>Nổi bật</th>
        <th>Giá</th>
        <th>Thương hiệu</th>
    </tr>
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
            <td><a href="productEdit.php?productId=<?php echo $result['productId']?>">Edit</a>|<a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="?delproductId=<?php echo $result['productId']?>">Delete</a></td>
        </tr>
        <?php }
    } ?>
    </table>
    
</body>
</html>
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Basic table
    </div>
    <div>
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th data-breakpoints="xs">ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th data-breakpoints="xs">Job Title</th>
           
            <th data-breakpoints="xs sm md" data-title="DOB">Date of Birth</th>
          </tr>
        </thead>
        <tbody>
          <tr data-expanded="true">
            <td>1</td>
            <td>Dennise</td>
            <td>Fuhrman</td>
            <td>High School History Teacher</td>
            
            <td>July 25th 1960</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Elodia</td>
            <td>Weisz</td>
            <td>Wallpaperer Helper</td>
          
            <td>March 30th 1982</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Raeann</td>
            <td>Haner</td>
            <td>Internal Medicine Nurse Practitioner</td>
           
            <td>February 26th 1966</td>
          </tr>
          <tr>
            <td>4</td>
            <td>Junie</td>
            <td>Landa</td>
            <td>Offbearer</td>
           
            <td>March 29th 1966</td>
          </tr>
          <tr>
            <td>5</td>
            <td>Solomon</td>
            <td>Bittinger</td>
            <td>Roller Skater</td>
           
            <td>September 22nd 1964</td>
          </tr>
          <tr>
            <td>6</td>
            <td>Bar</td>
            <td>Lewis</td>
            <td>Clown</td>
           
            <td>August 4th 1991</td>
          </tr>
          <tr>
            <td>7</td>
            <td>Usha</td>
            <td>Leak</td>
            <td>Ships Electronic Warfare Officer</td>
          
            <td>November 20th 1979</td>
          </tr>
          <tr>
            <td>8</td>
            <td>Lorriane</td>
            <td>Cooke</td>
            <td>Technical Services Librarian</td>
           
            <td>April 7th 1969</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php
include './inc/footer.php';
?>

