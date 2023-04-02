<?php include 'inc/header.php';?>
<?php include 'inc/slidebar.php';?>
<?php include '../classes/categoryC.php'?>
<?php
    $class = new categoryC();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $cateName = $_POST['cateName'];
        $cateDesc = $_POST['cateDesc'];
        $insertCate=$class->insertCate($cateName, $cateDesc);
            // echo '<meta http-equiv="refresh" content="1; url=cateList.php" />';
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
                            Thêm danh mục
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="post" >
                                <div>
                                <?php
                                    if(isset($insertCate)){
                                        echo $insertCate;}
                                        
                                    ?>
                                </div>
                            
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục </label>
                                    <input type="text" name="cateName" placeholder="Thêm tên danh mục...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea name="cateDesc" id="" cols="30" rows="3" placeholder="Mô tả..."></textarea>
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

