<?php

include_once '../libs/database.php';
include_once '../helpers/format.php';
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
    public function insertBrand($brandName, $files, $brandDesc){        
        $brandName = $this->frm->validation($brandName);
        // $brandImage= $this->frm->validation($brandImage);
        $brandDesc= $this->frm->validation($brandDesc);
        $brandName = mysqli_real_escape_string($this->db->link,$brandName);
        // $brandImage = mysqli_real_escape_string($this->db->link, $brandImage);
        $brandDesc = mysqli_real_escape_string($this->db->link, $brandDesc);

        // $extension = explode(".",$_FILES['brandImage']['name']);
        // $file_extension = end($extension);
        // $allow_type= array('jpeg', 'jpg', 'png', 'gif', 'webp'); // valid extensions
        // if(in_array($file_extension,$allow_type)){
        //     $new_name=rand()."." .$file_extension;
        //     $path = 'uploads/brand/'.$new_name; // upload directory
        //     if(move_uploaded_file($_FILES['brandImage']['tmp_name'],$path)){
        //         echo '<div> <img src="'.$path.'" witdh:200> </div>';
        //     }
        // }else{
        //     echo '<scrip>alert("chua co file anh");</scrip>';
        // }
        
        if(empty($brandName)|| empty($brandDesc) || empty($_FILES['brandImage']['name']) ){
            // $arlet = "Chưa nhập đủ thông tin!!";
            // return $arlet;
            echo '<script>alert("Chưa nhập đủ thông tin!!!")</script>';
            // // echo json_encode(array(
            // //     'status'=>0,
            // //     'message'=>'Chưa nhập đầy đủ thông tin'
            // // ));
            // exit;
        }else{
            // $img = $_FILES['image']['name'];
            // $tmp = $_FILES['image']['tmp_name'];
            // $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            // $final_image = rand(1000,1000000).$img;
            // $path = $path.strtolower($final_image); 
            // if(move_uploaded_file($tmp,$path)) 
            // {
            // echo "<img src='$path' />";
            $extension = explode(".",$_FILES['brandImage']['name']);
            $file_extension = end($extension);
            $allow_type= array('jpeg', 'jpg', 'png', 'gif', 'webp'); // valid extensions
            if(in_array($file_extension,$allow_type)){
                $new_name=rand()."." .$file_extension;
                $path = 'uploads/brand/'.$new_name; // upload directory
                if(move_uploaded_file($_FILES['brandImage']['tmp_name'],$path)){
                    echo '<div> <img src="'.$path.'" witdh=200px> </div>';
                }
            }else{
                echo '<script>alert("chỉ nhận file ảnh JPG, PNG , WEBP")</script>';
            }
            $query=" INSERT INTO  `brand`(brandName,brandImage,brandDescription) VALUES ('$brandName',' $path',' $brandDesc')";
            $result = $this->db->insert($query);
            
        }
        if($result!=false){
            // $arlet = "Thêm thành công !!";
            echo '<script>alert("Thêm thành công")</script>';
            // echo json_encode(array(
            //     'status'=>1,
            //     'message'=>'Thêm thành công'
            // ));
            // exit;
        }else{
            // $arlet= "<span class='success'>Lỗi</span> ";
            echo '<script>alert("Lỗi")</script>';
            // echo json_encode(array(
            //     'status'=>0,
            //     'message'=>'Lỗi'
            // ));
            // exit;

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
