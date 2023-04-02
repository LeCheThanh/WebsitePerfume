<?php include 'inc/header.php';?>
<?php include 'inc/slidebar.php';?>
<?php include '../classes/categoryC.php'?>
<?php
    if(!isset($_GET['cateId']) || $_GET['cateId']==null){
        // 
        echo "<script>window.location = 'catelist.php'</script>";
    }else{
        $cateId=$_GET['cateId'];
    }
    $class = new categoryC();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $cateName = $_POST['cateName'];
        $cateDesc = $_POST['cateDesc'];
        $id = $cateId;
        // $updateAt= time();
        $cateEdit=$class->updateCate($cateName, $id,$cateDesc);
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
                                <form role="form" method="post" >
                                    <?php    if(isset($cateEdit)){
                                     echo $cateEdit;
                                         }
                                          ?>
                      <?php
                        $getCate=$class->getbyId($cateId);
                        if( $getCate){
                                while ($result = $getCate->fetch_assoc()){
                            ?> 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục </label>
                                    <input type="text" name="cateName" value="<?php echo $result['cateName']?>" placeholder="Thêm tên danh mục...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea name="cateDesc" id="" cols="30" rows="3" placeholder="Mô tả..." ><?php echo $result['cateDescription']?></textarea>
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