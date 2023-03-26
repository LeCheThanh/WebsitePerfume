<?php include './controllers/productController.php'; ?>
<?php
    $productList = new ProductController();
    $productList->addproduct();
?>