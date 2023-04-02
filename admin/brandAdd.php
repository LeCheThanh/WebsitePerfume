<?php include 'inc/header.php';?>
<?php include 'inc/slidebar.php';?>
<?php include '../classes/brandC.php'?>

<?php
    $brand = new brandC();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $brandName = $_POST['brandName'];
        $brandDesc = $_POST['brandDesc'];
        $brandImage=$_FILES['brandImage'];
        $insertBrand=$brand->insertBrand($brandName ,$brandDesc, $brandImage);
    }
?>




<section id="main-content">
	<section class="wrapper">
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm thương hiệu
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="post"  enctype="multipart/form-data">
                                <div>
                                <?php
                                    if(isset($insertBrand)){
                                        echo $insertBrand;}
                                        
                                    ?>
                                </div>
                            
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu </label>
                                    <input type="text" name="brandName" placeholder="Thêm tên thương hiệu...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hình ảnh</label>
                                    <input  id="uploadImage" type="file" name="brandImage" placeholder="Thêm ảnh...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả</label>
                                    <textarea name="brandDesc" id="" cols="30" rows="3" placeholder="Mô tả..."></textarea>
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

