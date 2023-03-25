<?php 
    include '../classes/productC.php';
?>
<?php
    Class ProductController{
    public function listproduct(){

        $product = new productC();
        $product->showlistProduct();
      //   if(isset($_GET['delbrandId']) ){
      //       $delId=$_GET['delbrandId'];
      //       $delBrand= $brand->deleteBrand($delId);
      //       }
      include './views/productList.php';
    }
    }
?>