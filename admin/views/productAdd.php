
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
                            Thêm sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="post"  enctype="multipart/form-data">
                                <div>
                                    <?php
                                    if(isset($insertProduct)){
                                        echo $insertProduct;
                                    }
                                    ?>
                                </div>
                            
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sảm phẩm </label>
                                    <input type="text" name="productName" placeholder="Thêm tên sản phẩm...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea name="productDesc" id="" cols="30" rows="3" placeholder="Mô tả sản phẩm..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile"> Hình ảnh</label>
                                    <input type="file" name="productImage">
                                
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Trạng thái</label>
                                    <select name="productStatus" id="selected">
                                        <option value="1">Còn hàng</option>
                                        <option value="0">Hết hàng</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục</label>
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
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Thương hiệu</label>
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
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Giá</label>
                                    <input name="productPrice" id=""  placeholder="Nhập giá sản phẩm.."></input>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nổi bật</label>
                                    <select name="productType" id="selected">
                                    <option value="1">Nổi bật</option>
                                    <option value="0">Không nổi bật</option>
                                </select>
                                </div>
                             
                                <input class="btn btn-info" type="submit" name="submit" value="Thêm">
                            </form>
                            </div>

                        </div>
                        
                    </section>
            </div>
        </div>
    </div>

    <?php
include './inc/footer.php';
?>

