
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
        <th>Loại</th>
        <th>Nổi bật</th>
        <th>Giá</th>
        <th>Thương hiệu</th>
    </tr>
    <?php
        $showlistProduct = $product->showlistProduct();
        if(isset($showlistProduct)){
            while($result=$showlistProduct->fetch_assoc()){

            
        
    ?>
        <tr>
            <td><?php echo $result['productName'];?></td>
            <td><?php echo $result['productDesc'];?></td>
            <td><?php echo $result['productImage'];?></td>
            <td><?php echo $result['category_id'];?></td>
            <td><?php echo $result['productType'];?></td>
            <td><?php echo $result['productPrice'];?></td>
            <td><?php echo $result['brand_Id'];?></td>
            
        </tr>
        <?php }
    } ?>
    </table>
    
</body>
</html>