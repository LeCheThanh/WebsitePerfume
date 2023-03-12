<?php include 'inc/header.php';?>
<?php include 'inc/slidebar.php';?>
<?php include '../classes/categoryC.php'?>
<?php
    $class = new categoryC();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách danh mục</title>
</head>
<body>
    <table>
    <tr>
        <th>cateId</th>
        <th>cateName</th>
        <th>cateDescription</th>
        <th>Create At</th>
        <th>Update At</th>
        <th>Action</th>
    </tr>
    <?php
        $showlistCate = $class->showlistCate();
        if(isset($showlistCate)){
            $i=0;
            while($result=$showlistCate->fetch_assoc()){
                $i++;

            
        
    ?>
        <tr>
            <td><?php echo $result['cateId'];?></td>
            <td><?php echo $result['cateName'];?></td>
            <td><?php echo $result['cateDescription'];?></td>
            <td><?php echo $result['createAt'];?></td>
            <td><?php echo $result['updateAt'];?></td>
            <td><a href="cateEdit.php?cateId=<?php echo $result['cateId']?>">Edit</a>|<a href="?cateId=<?php echo $result['cateId']?>">Delete</a></td>
        </tr>
        <?php }
    } ?>
    </table>
</body>
</html>