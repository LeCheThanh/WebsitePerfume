<?php include 'inc/header.php';?>
<?php include 'inc/slidebar.php';?>
<?php include '../classes/categoryC.php'?>
<?php include '../classes/brandC.php'?>
<?php include '../classes/productC.php'?>
<?php
    $product = new productC();
    if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['submit'])){
      
        $insertProduct=$product->insertProduct($_POST, $_FILES);
    }
?>
<div >
    <form action="productAdd.php" method="post" enctype="multipart/form-data">
        <div>
            <?php
            if(isset($insertProduct)){
                echo $insertProduct;
             }
            ?>
        </div>
    <table>
        <tr>
        <td>
                Tên sảm phẩm
            </td>
            <td>
                <input type="text" name="productName" placeholder="Thêm tên sản phẩm...">
            </td>
        </tr>
        <tr>
        <td>
               Mô tả
            </td>
            <td>
                <textarea name="productDesc" id="" cols="30" rows="10" placeholder="Mô tả sản phẩm..."></textarea>
            </td>
        </tr>
        <tr>
            <td>
                Hình ảnh
            </td>
            <td>
                <input type="file" name="productImage">
            </td>
        </tr>
        <tr>
            <td> Trạng thái</td>
            <td>
            <select name="productStatus" id="selected">
                    <option value="1">Còn hàng</option>
                    <option value="0">Hết hàng</option>
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
                        $cate=new categoryC();
                        $catelist=$cate->showlistCate();
                        if($catelist){
                            while($result = $catelist->fetch_assoc()) { ?>
                                <option value="<?php echo $result['cateId']?>"><?php echo $result['cateName']?></option>
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
                        $brand=new brandC();
                        $brandlist=$brand->showlistBrand();
                        if($brandlist){
                            while($result = $brandlist->fetch_assoc()) { ?>
                                <option value="<?php echo $result['brandId']?>"><?php echo $result['brandName']?></option>
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
                <input name="productPrice" id=""  placeholder="Nhập giá sản phẩm.."></input>
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

</div>