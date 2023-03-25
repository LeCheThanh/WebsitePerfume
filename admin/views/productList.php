
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
            <td><?php echo $result['category_id'];?></td>
            <td> <?php if($result['productType']==0){
                echo'<p>Không nổi bật</p>';
                }else {echo'<p>Nổi bật</p>';}
                ?></td>
            <td><?php echo $result['productPrice'];?></td>
            <td><?php echo $result['brand_Id'];?></td>
            <td><a href="productEdit.php?productId=<?php echo $result['productId']?>">Edit</a>|<a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="?delproductId=<?php echo $result['productId']?>">Delete</a></td>
        </tr>
        <?php }
    } ?>
    </table>
    
</body>
</html>