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
        $brandImage =  $_POST['brandImage'];
        $id = $brandId;
        // $updateAt= time();
        $brandEdit=$brand->updateBrand($brandName, $id,$brandDesc,$brandImage);
    }
?>
<div >
    <form action="" method="post">
        <div>
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
        </div>
    <table>
        <tr>
            <td>
                <input type="text" name="brandName" value="<?php echo $result['brandName']?>" placeholder="Thêm tên danh mục...">
            </td>
        </tr>
        <tr>
            <td>
                <textarea name="brandDesc" id="" cols="30" rows="10" placeholder="Mô tả..." ><?php echo $result['brandDescription']?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="brandImage" value="<?php echo $result['brandImage']?>">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="Sửa">
            </td>
            <td>
                <a href="./brandList.php">Trở về danh sách danh mục</a>
            </td>
        </tr>
    </table>


    </form>
    <?php         }
                }?>

</div>