<?php 
    include '../classes/productC.php';
    include_once '../helpers/format.php';
    include_once '../classes/brandC.php';
    include_once '../classes/categoryC.php';
?>
<?php
    Class ProductController{
    public function listproduct(){

        $product = new productC();
        $product->showlistProduct();
        $showlistProduct = $product->showlistProduct();
        $brand=new brandC();
        $brandlist=$brand->showlistBrand();
        $cate=new categoryC();
        $catelist=$cate->showlistCate();
        //Xoa product
        if(isset($_GET['delproductId']) ){
           $productId=$_GET['delproductId'];
           $delProduct= $product->deleteProduct($productId);
           if(isset($delProduct)){
            echo $delProduct;
           }
             }
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
        $brand=new brandC();
        $brandlist=$brand->showlistBrand();
        $cate=new categoryC();
        $catelist=$cate->showlistCate();
        if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['submit'])){
            $id = $productId;
            // $updateAt= time();
            $productEdit=$class->updateProduct($_POST,$_FILES,$id);
        }  
        $getProduct=$class->getbyId($productId); 
        if($getProduct){
            while ($result = $getProduct->fetch_assoc()){ 
      
        require_once './views/productEdit.php';}}
    }
}
?>