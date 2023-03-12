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
<div >
    <form action="" method="post">
        <div>
        <?php
            if(isset($cateEdit)){
                echo $cateEdit;
            }
            ?>
            <?php
                $getCate=$class->getbyId($cateId);
                if( $getCate){
                    while ($result = $getCate->fetch_assoc()){


            
            ?>
        </div>
    <table>
        <tr>
            <td>
                <input type="text" name="cateName" value="<?php echo $result['cateName']?>" placeholder="Thêm tên danh mục...">
            </td>
        </tr>
        <tr>
            <td>
                <textarea name="cateDesc" id="" cols="30" rows="10" placeholder="Mô tả..." ><?php echo $result['cateDescription']?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="Sửa">
            </td>
            <td>
                <a href="./catelist.php">Trở về danh sách danh mục</a>
            </td>
        </tr>
    </table>


    </form>
    <?php         }
                }?>

</div>