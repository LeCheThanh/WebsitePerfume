<?php include 'inc/header.php';?>
<?php include 'inc/slidebar.php';?>
<?php include '../classes/brandC.php'?>
<?php
    if(!isset($_GET['brandId']) || $_GET['brandId']==null){
        // 
        echo "<script>window.location = 'brandList.php'</script>";
    }else{
        $brandId=$_GET['brandId'];
    }
    $brand = new brandC();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $brandName = $_POST['brandName'];
        $brandDesc = $_POST['brandDesc'];
        $id = $brandId;
        // $updateAt= time();
        $brandEdit=$brand->updateBrand($brandName, $id,$brandDesc,$_FILES);
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
                            Sửa danh mục
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="post" enctype="multipart/form-data" >
                                <?php
                                if(isset($brandEdit)){
                                    echo $brandEdit;
                                }
                                          ?>
                     <?php
                $getBrand=$brand->getbyId($brandId);
                if( $getBrand){
                    while ($result = $getBrand->fetch_assoc()){
            ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu </label>
                                    <input type="text" name="brandName" value="<?php echo $result['brandName']?>" placeholder="Thêm tên danh mục...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea name="brandDesc" id="" cols="30" rows="3" placeholder="Mô tả..." ><?php echo $result['brandDescription']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh </label>
                                    <img src="uploads/brand/<?php echo $result['brandImage'];?>" width="80px" alt="ImageBrand">
                                    <input type="file" name="productImage">
                                </div>
                              
                                <input class="btn btn-info"  type="submit" name="submit" value="Sửa">
                            </form>
                            <?php         }
                                    }
                                                ?>
                        </div>
                            </div>

                        </section>
                        </div>     
            </div>
        </div>
    </div>