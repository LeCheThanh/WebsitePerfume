
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
    
    <div >

        <form action="../controllers/productController.php" method="post" enctype="multipart/form-data">
            <div>
                <?php
                if(isset($insertProduct)){
                    echo $insertProduct;
                 }
                if($getProduct){
                    while ($result = $getProduct->fetch_assoc()){ 
              
                   ?>
             
                
            </div>
        <table>
            <tr>
            <td>
                    Tên sảm phẩm
                </td>
                <td>
                    <input type="text" name="productName" value="<?php echo $result['productName']?>">
                </td>
            </tr>
            <tr>
            <td>
                   Mô tả
                </td>
                <td>
                    <textarea name="productDesc" id="" cols="30" rows="10" value="<?php echo $result['productDesc']?>"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Hình ảnh
                </td>
                <td>
                    <img src="uploads/product/<?php echo $result['productImage']?>" alt="product_image" width="80px">
                    <br>
                    <input type="file" name="productImage">
                </td>
            </tr>
            <tr>
                <td> Trạng thái</td>
                <td>
                <input type="int" name="productStatus">
                </td>
            </tr>
            <tr>
                <td>
                    Danh mục
                </td>
                <td>
                    <Select name="category" id="select">
                        <option>--Chọn danh mục sản phẩm--</option>
                      
                </td>
            </tr>
            <tr>
                <td>
                    Thương hiệu
                </td>
                <td>
          
                </td>
            </tr>
            <tr>
                <td>Giá </td>
                <td>
                    <input name="productPrice" id="" value="<?php echo $result['productPrice']?>"></input>
                </td>
            </tr>
            <tr>
                <td>ProductType</td>
                <td>
                    <select name="productType" id="selected">
                        <option value="1">Nổi bật</option>
                        <option value="0">Không nổi bật</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Thêm">
                </td>
            </tr>
        </table>
    
    
        </form>
        <?php }}?>
    </div>
</body>