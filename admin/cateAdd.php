<?php include 'inc/header.php';?>
<?php include 'inc/slidebar.php';?>
<?php include '../classes/categoryC.php'?>
<?php
    $class = new categoryC();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $cateName = $_POST['cateName'];
        $cateDesc = $_POST['cateDesc'];
        $insertCate=$class->insertCate($cateName, $cateDesc);
    }
?>
<div >
    <form action="cateAdd.php" method="post">
        <div>
            <?php
            if(isset($insertCate)){
                echo $insertCate;
            }
            ?>
        </div>
    <table>
        <tr>
            <td>
                <input type="text" name="cateName" placeholder="Thêm tên danh mục...">
            </td>
        </tr>
        <tr>
            <td>
                <textarea name="cateDesc" id="" cols="30" rows="10" placeholder="Mô tả..."></textarea>
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