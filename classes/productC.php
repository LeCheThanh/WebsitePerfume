<?php
     $filepath = realpath(dirname(__FILE__));
    include_once ( $filepath.'/../libs/database.php');
    include_once  ($filepath.'/../helpers/format.php');
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

        $div = explode('.', $file_name);//explode tach chuoi file_name thanh` mang phan cach boi dau . 
        $file_ext = strtolower(end ($div)); //strtolower de doi thanh chu thuong, end de tra ve phan tu sau dau cham
        $unique_image = substr(md5(time()), 0, 10).'.'. $file_ext;
        $uploaded_image = "uploads/product/".$unique_image;
        ////
        if($productName=="" ||  $productDesc=="" || $category=="" ||$brand=="" ||$productPrice=="" ||$productType=="" ){
            $arlet = "Không được để trống !!";
            return $arlet;
        }else{
            //neu admin chon anh
            if(!empty($file_name)){
                if($file_size > 2* 1024 *1024) // 2 * 1024 * 1024 = 2 * 2^10 * 2^10 = 2 * 2^20 = 2097152 byte(2Mb)/
                {
                    $arlet = "ảnh không được quá 2MB";
                    return $arlet;
                }
                elseif(in_array($file_ext, $permited)===false){
                    $arlet = "chỉ cho phép ảnh có định dạng " . implode(', ', $permited);
                    return $arlet;   
                }  
                move_uploaded_file($file_temp,$uploaded_image);
                $query=" UPDATE `products`
                SET productName='$productName',
                productDesc='$productDesc',
                productImage='$unique_image',
                productStatus='$productStatus',
                category_id='$category',
                productType='$productType'
                ,productPrice='$productPrice',
                brand_Id='$brand'  WHERE productId = '$id'";
                
            //neu khong chon anh
            }else{
                $query=" UPDATE `products`
                SET productName='$productName',
                productDesc='$productDesc',
                productStatus='$productStatus',
                category_id='$category',
                productType='$productType'
                ,productPrice='$productPrice',
                brand_Id='$brand'  WHERE productId = '$id'";
            }
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
    public function deleteProduct($id){
        $query=" DELETE  FROM  `products` WHERE productId ='$id'";
        $result=$this->db->delete($query);
        if($result!=false){
            $arlet = "Xóa thành công !!";
            return $arlet;
        }else{
            $arlet= "Lỗi";
            return $arlet;

        }
    }
    // END BACKEND
    public function getproductFeature(){
        $query=" SELECT * FROM  `products` WHERE productType=1";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproductNew(){
        $query=" SELECT * FROM  `products` order by productId desc LIMIT 6";
        $result = $this->db->select($query);
        return $result;
    }
    public function getDetails($id){
        $query=" SELECT products.*, categories.cateName, brand.brandName
        FROM products INNER JOIN categories ON products.category_id = categories.cateId
        INNER JOIN brand ON products.brand_Id = brand.brandId
        WHERE productId ='$id'";
        $result = $this->db->select($query);
        return $result;

    }
}

?>