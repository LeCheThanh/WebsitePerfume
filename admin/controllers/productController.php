<?php 
    include '../classes/productC.php';
    include_once '../helpers/format.php';
?>
<?php
    Class ProductController{
    public function listproduct(){

        $product = new productC();
        $product->showlistProduct();
        $showlistProduct = $product->showlistProduct();
      //   if(isset($_GET['delbrandId']) ){
      //       $delId=$_GET['delbrandId'];
      //       $delBrand= $brand->deleteBrand($delId);
      //       }
      $fm= new Format();
      include_once './views/productList.php';
    }
    public function editproduct(){
        if(!isset($_GET['productId']) || $_GET['productId']==null){
            // 
            echo "<script>window.location = 'productEdit.php'</script>";
        }else{
            $productId=$_GET['productId'];
        }
        $class = new productC();
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $id = $productId;
            // $updateAt= time();
            $productEdit=$class->updateProduct($_POST,$_FILES,$id);
        }  
        $getProduct=$class->getbyId($productId); 
        require_once './views/productEdit.php';
      
      
    }
}
?>