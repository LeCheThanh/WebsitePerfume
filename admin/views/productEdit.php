
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

        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <?php
                if(isset($productEdit)){
                    echo $productEdit;
                 } 
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
                    <textarea name="productDesc" id="" cols="30" rows="10" ><?php echo $result['productDesc']?></textarea>
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
                <select name="productStatus" id="select" >
                        <?php if($result['productStatus'] == 1){
                        ?>
                        <option selected value="1">Còn hàng</option>
                        <option value="0">Hết hàng</option>
                        <?php }else { ?>
                            <option  value="1">Còn hàng</option>
                            <option selected value="0">Hết hàng</option>
                            <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Danh mục
                </td>
                <td>
                    <Select name="category" id="select">
                        <option>--Chọn danh mục sản phẩm--</option>
                        <?php 
                            if($catelist){
                                while($resultcate = $catelist->fetch_assoc()) { ?>
                                    <option
                                    <?php 
                                    if($resultcate['cateId']==$result['category_id'])
                                    {echo 'selected'; }
                                    ?>
                                     value="<?php echo $resultcate['cateId']?>"><?php echo $resultcate['cateName']?></option>
                                    <?php 
                                            }
                                    }
                                    
                                        ?>
                                </Select>   
                </td>
            </tr>
            <tr>
            <td>
                Thương hiệu
            </td>
            <td>
                <Select name="brand" id="select">
                    <option >--Chọn thương hiệu sản phẩm--</option>
                    <?php 
                        if($brandlist){
                            while($resultbrand = $brandlist->fetch_assoc()) { ?>
                                <option 
                                <?php
                                    if($resultbrand['brandId']==$result['brand_Id'])
                                    {echo 'selected'; }
                                ?>
                                value="<?php echo $resultbrand['brandId']?>"><?php echo $resultbrand['brandName']?></option>
                                <?php 
                                        }
                                   }
                                   
                                     ?>
                               </Select>   
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
                    <select name="productType" id="select" >
                        <?php if($result['productType'] == 1){
                        ?>
                        <option selected value="1">Nổi bật</option>
                        <option value="0">Không nổi bật</option>
                        <?php }else { ?>
                            <option  value="1">Nổi bật</option>
                            <option selected value="0">Không nổi bật</option>
                            <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Sửa">
                </td>
            </tr>
    </table>

        </form>
        <?php ?>
    </div>
</body>