<?php include 'inc/header.php';?>
<?php include 'inc/slidebar.php';?>
<?php include '../classes/brandC.php'?>
<?php
    $brand = new brandC();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $brandName = $_POST['brandName'];
        $brandImage = $_POST['brandImage'];
        $brandDesc = $_POST['brandDesc'];
        $insertBrand=$brand->insertBrand($brandName, $brandImage,$brandDesc);
    }
?>
<div >
    <form action="brandAdd.php" method="post">
        <div>
            <?php
            if(isset($insertBrand)){
                echo $insertBrand;
         }
            ?>
        </div>
    <table>
        <tr>
            <td>
                <input type="text" name="brandName" placeholder="Thêm tên thương hiệu...">
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="brandImage" placeholder="Thêm ảnh...">
            </td>
        </tr>
        <tr>
            <td>
                <textarea name="brandDesc" id="" cols="30" rows="10" placeholder="Mô tả..."></textarea>
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