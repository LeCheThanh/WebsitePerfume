<?php

include_once '../libs/database.php';
include_once '../helpers/format.php';
?>

<?php
Class productC{
    private $db;
    private $frm;
    public function __construct()
    {
        $this->db= new Database();
        $this->frm= new Format();
    }
    public function insertProduct($data,$files){
        $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
        $productDesc = mysqli_real_escape_string($this->db->link,$data['productDesc']);
        // $brandDesc = mysqli_real_escape_string($this->db->link, $brandDesc);
        $category = mysqli_real_escape_string($this->db->link,$data['category']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $productPrice = mysqli_real_escape_string($this->db->link,$data['productPrice']);
        $productType = mysqli_real_escape_string($this->db->link, $data['productType']);
        $productStatus = mysqli_real_escape_string($this->db->link, $data['productStatus']);
        //Get files image
        //check image and get image -> folder uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['productImage']['name'];
        $file_size = $_FILES['productImage']['size'];
        $file_temp = $_FILES['productImage']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end ($div)); 
        $unique_image = substr(md5(time()), 0, 10).'.'. $file_ext;
        $uploaded_image = "uploads/product/".$unique_image;
        ////
        if($productName=="" ||  $productDesc=="" || $category=="" ||$brand=="" ||$productPrice=="" ||$productType=="" ||  $file_name=="" ){
            $arlet = "Không được để trống !!";
            return $arlet;
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query=" INSERT INTO  `products`(productName,productDesc,productImage,productStatus,category_id,productType,productPrice,brand_Id )
                                    VALUES ('$productName',' $productDesc','$unique_image','$productStatus','$category','$productType','$productPrice','$brand')";
            $result = $this->db->insert($query);
        }
        if($result!=false){
            $arlet = "Thêm thành công !!";
            return $arlet;
        }else{
            $arlet= "<span class='success'>Lỗi</span> ";
            return $arlet;

        }
    }
    public function showlistProduct(){
        $query=" SELECT * FROM  `products` ORDER BY productId DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getbyId($id){
        $query=" SELECT * FROM  `products` WHERE productId='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function updateProduct($data,$files,$id){
        $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
        $productDesc = mysqli_real_escape_string($this->db->link,$data['productDesc']);
        // $brandDesc = mysqli_real_escape_string($this->db->link, $brandDesc);
        $category = mysqli_real_escape_string($this->db->link,$data['category']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $productPrice = mysqli_real_escape_string($this->db->link,$data['productPrice']);
        $productType = mysqli_real_escape_string($this->db->link, $data['productType']);
        $productStatus = mysqli_real_escape_string($this->db->link, $data['productStatus']);
        //Get files image
        //check image and get image -> folder uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['productImage']['name'];
        $file_size = $_FILES['productImage']['size'];
        $file_temp = $_FILES['productImage']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end ($div)); 
        $unique_image = substr(md5(time()), 0, 10).'.'. $file_ext;
        $uploaded_image = "uploads/product/".$unique_image;
        ////
        if($productName=="" ||  $productDesc=="" || $category=="" ||$brand=="" ||$productPrice=="" ||$productType=="" ||  $file_name=="" ){
            $arlet = "Không được để trống !!";
            return $arlet;
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query=" UPDATE `products`SET productName='$productName',productDesc='$productDesc',productImage='$unique_image',productStatus='$productStatus',category_id='$category',productType='$productType',productPrice='$productPrice',brand_Id='$brand'  WHERE productId = '$id'";
            $result = $this->db->update($query);
        }
        if($result!=false){
            $arlet = "Sửa thành công !!";
            return $arlet;
        }else{
            $arlet= "<span>Lỗi</span> ";
            return $arlet;

        }
    }
//     public function deleteBrand($delBrand){
//         $query=" DELETE  FROM  `brand` WHERE brandId ='$delBrand'";
//         $result=$this->db->delete($query);
//         if($result!=false){
//             $arlet = "Xóa thành công !!";
//             return $arlet;
//         }else{
//             $arlet= "Lỗi";
//             return $arlet;

//         }
//     }
}

?>