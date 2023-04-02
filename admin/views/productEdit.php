
<?php include './inc/header.php';?>
<?php include './inc/slidebar.php';?>

<section id="main-content">
	<section class="wrapper">
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                        <header class="panel-heading">
                            Sửa sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="post"  enctype="multipart/form-data">
                                <div>
                                    <?php
                                    if(isset($productEdit)){
                                        echo $productEdit;
                                    } 
                                    ?>             
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sảm phẩm </label>
                                    <input type="text" name="productName" value="<?php echo $result['productName']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea name="productDesc" id="" cols="30" rows="3" ><?php echo $result['productDesc']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile"> Hình ảnh</label>
                                    <img src="uploads/product/<?php echo $result['productImage']?>" alt="product_image" width="80px">
                                    <br>
                                    <input type="file" name="productImage">
                                                
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Trạng thái</label>
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
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục</label>
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
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Thương hiệu</label>
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
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Giá</label>
                                    <input name="productPrice" id="" value="<?php echo $result['productPrice']?>"></input>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nổi bật</label>
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
                                </div>
                             
                                <input class="btn btn-info"  type="submit" name="submit" value="Sửa">
                            </form>
                        </div>
                            </div>

                        </section>
                        </div>
                        
            </div>
        </div>
    </div>

<?php
include './inc/footer.php';
?>

