<?php include '../classes/brandC.php'?>

<?php
    $brand = new brandC();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $brandName = $_POST['brandName'];
        $brandDesc = $_POST['brandDesc'];
        $insertBrand=$brand->insertBrand($brandName ,$brandDesc,$_FILES['brandImage']);
    }
?>