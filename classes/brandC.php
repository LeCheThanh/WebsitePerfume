<?php

include_once '../libs/database.php';
include_once '../helpers/format.php';
include_once '../admin/uploadImage/ajaxupload.php';
?>

<?php
Class brandC{
    private $db;
    private $frm;
    private $fileImage;
    public function __construct()
    {
        $this->fileImage= new Uploads();
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
        // }
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['brandImage']['name'];
        $file_size = $_FILES['brandImage']['size'];
        $file_temp = $_FILES['brandImage']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end ($div)); 
        $unique_image = substr(md5(time()), 0, 10).'.'. $file_ext;
        $uploaded_image = "uploads/brand/" .$unique_image;
        if(empty($brandName)|| empty($brandDesc || !$file_name) ){

            echo json_encode(array(
                'status'=>0,
                'message'=>'Chưa nhập đầy đủ thông tin'
            ));
            exit;
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query="INSERT INTO `brand` (brandName, brandDescription, brandImage) VALUES ('$brandName', '$brandDesc', '$unique_image')";
            $result = $this->db->insert($query);
            if ($result) {
                echo json_encode(array(
                    'status'=>1,
                    'message'=>'Thêm thành công'
                ));
                exit;
            } else {
                echo json_encode(array(
                    'status'=>0,
                    'message'=>'Lỗi khi thêm dữ liệu'
                ));
                return;
            }
            
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
    public function updateBrand($brandName, $id,$brandDesc,$brandImage){
        $brandName= $this->frm->validation($brandName);
        $brandDesc= $this->frm->validation($brandDesc);
        $brandImage= $this->frm->validation($brandImage);
        $cateName = mysqli_real_escape_string($this->db->link,$brandName);
        $brandDesc = mysqli_real_escape_string($this->db->link, $brandDesc);
        $id = mysqli_real_escape_string($this->db->link, $id );
        $brandImage = mysqli_real_escape_string($this->db->link, $brandImage );
        // $updateAt = mysqli_real_escape_string($this->db->link, $updateAt);
       
        if(empty($cateName)){
            $arlet = "Tên danh mục đang trống!!";
            return $arlet;
        }else{
            $query=" UPDATE  `brand` SET brandName='$brandName' ,brandDescription='$brandDesc', brandImage='$brandImage' WHERE brandId='$id'"; //, updateAt = '$updateAt'
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
