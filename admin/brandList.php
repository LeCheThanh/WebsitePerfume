<?php include 'inc/header.php';?>
<?php include 'inc/slidebar.php';?>
<?php include '../classes/brandC.php'?>
<?php
    $brand = new brandC();
    // if(isset($_GET['delId']) ){
    //     $delId=$_GET['delId'];
    //     $delCate= $class->deleteCate($delId);
    //     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách thương hiệu</title>
</head>
<body>
    <table>
    <?php
            // if(isset($delCate)){
            //     echo $delCate;
            // }
            // ?>
    <tr>
        <th>Brand ID</th>
        <th>Brand Name</th>
        <th>Brand Image</th>
        <th>Brand Description</th>
    </tr>
    <?php
        $showlistBrand = $brand->showlistBrand();
        if(isset($showlistBrand)){
            while($result=$showlistBrand->fetch_assoc()){

            
        
    ?>
        <tr>
            <td><?php echo $result['brandId'];?></td>
            <td><?php echo $result['brandName'];?></td>
            <td><?php echo $result['brandImage'];?></td>
            <td><?php echo $result['brandDescription'];?></td>
            <td><a href="brandEdit.php?brandId=<?php echo $result['brandId']?>">Edit</a>|<a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="?delbrandId=<?php echo $result['brandId']?>">Delete</a></td>
        </tr>
        <?php }
    } ?>
    </table>
</body>
</html>