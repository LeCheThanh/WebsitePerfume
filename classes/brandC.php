<?php
$filepath = realpath(dirname(__FILE__));
include_once ( $filepath.'/../libs/database.php');
include_once  ($filepath.'/../helpers/format.php');
include_once '../admin/uploadImage/ajaxupload.php';
?>

<?php
Class brandC{
    private $db;
    private $frm;
    public function __construct()
    {
        $this->db= new Database(); 
        $this->frm= new Format();
    }
    public function insertBrand($brandName, $brandDesc,$file){        
        $brandName = $this->frm->validation($brandName);
        $brandDesc= $this->frm->validation($brandDesc);
        $brandName = mysqli_real_escape_string($this->db->link,$brandName);
        $brandDesc = mysqli_real_escape_string($this->db->link, $brandDesc);
        // $image = $this->fileImage->uploadimage($brandImage);
        // if ($image === false) {
        //     echo json_encode(array(
        //         'status' => 0,
        //         'message' => 'Lỗi khi upload ảnh'
        //     ));
        //     exit;
        // // }
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['brandImage']['name'];
        $file_size = $_FILES['brandImage']['size'];
        $file_temp = $_FILES['brandImage']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end ($div)); 
        $unique_image = substr(md5(time()), 0, 10).'.'. $file_ext;
        $uploaded_image = "uploads/brand/" .$unique_image;
        if(empty($brandName)|| empty($brandDesc )){

            $arlet = "Không được để trống !!";
            return $arlet;
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query=" INSERT INTO  `brand`(brandName,brandImage,brandDescription)
                                    VALUES ('$brandName','$unique_image',' $brandDesc')";
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
    
    
    public function showlistBrand(){
        $query=" SELECT * FROM  `brand` ORDER BY brandId DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getbyId($id){
        $query=" SELECT * FROM  `brand` WHERE brandId='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function updateBrand($brandName, $id,$brandDesc,$file){
        $brandName= $this->frm->validation($brandName);
        $brandDesc= $this->frm->validation($brandDesc);
        $cateName = mysqli_real_escape_string($this->db->link,$brandName);
        $brandDesc = mysqli_real_escape_string($this->db->link, $brandDesc);
        $id = mysqli_real_escape_string($this->db->link, $id );

        // $updateAt = mysqli_real_escape_string($this->db->link, $updateAt);

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['productImage']['name'];
        $file_size = $_FILES['productImage']['size'];
        $file_temp = $_FILES['productImage']['tmp_name'];

        $div = explode('.', $file_name);//explode tach chuoi file_name thanh` mang phan cach boi dau . 
        $file_ext = strtolower(end ($div)); //strtolower de doi thanh chu thuong, end de tra ve phan tu sau dau cham
        $unique_image = substr(md5(time()), 0, 10).'.'. $file_ext;
        $uploaded_image = "uploads/brand/".$unique_image;
       
        if(empty($cateName)){
            $arlet = "Tên danh mục đang trống!!";
            return $arlet;
        }else{
            // neu co chon anh
            if(!empty($file_name)){

                move_uploaded_file($file_temp,$uploaded_image);
                $query=" UPDATE  `brand` SET brandName='$brandName' ,brandDescription='$brandDesc', brandImage='$unique_image' WHERE brandId='$id'"; //, updateAt = '$updateAt'
            }else{
                $query=" UPDATE  `brand` SET brandName='$brandName' ,brandDescription='$brandDesc' WHERE brandId='$id'"; //, updateAt = '$updateAt'
            }
            $result = $this->db->update($query);
        }
        if($result!=false){
            $arlet = "Sửa thành công !!";
            return $arlet;
        }else{
            $arlet= "Lỗi";
            return $arlet;

        }
    }
    public function deleteBrand($delBrand){
        $query=" DELETE  FROM  `brand` WHERE brandId ='$delBrand'";
        $result=$this->db->delete($query);
        if($result!=false){
            $arlet = "Xóa thành công !!";
            return $arlet;
        }else{
            $arlet= "Lỗi";
            return $arlet;

        }
    }
}

?>
