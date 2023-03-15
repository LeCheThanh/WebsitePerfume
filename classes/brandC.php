<?php

use LDAP\Result;

    include '../libs/database.php';
    include '../helpers/format.php';
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
    public function insertBrand($brandName,$brandImage, $brandDesc){
        $brandName= $this->frm->validation($brandName);
        $brandImage= $this->frm->validation($brandImage);
        $brandDesc= $this->frm->validation($brandDesc);
        $brandName = mysqli_real_escape_string($this->db->link,$brandName);
        $brandImage = mysqli_real_escape_string($this->db->link, $brandImage);
        $brandDesc = mysqli_real_escape_string($this->db->link, $brandDesc);

        if(empty($brandName)){
            $arlet = "Tên thương hiệu đang trống!!";
            return $arlet;
        }else{
            $query=" INSERT INTO  `brand`(brandName,brandImage,brandDescription) VALUES ('$brandName',' $brandImage',' $brandDesc')";
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
    // public function getbyId($id){
    //     $query=" SELECT * FROM  `categories` WHERE cateId='$id'";
    //     $result = $this->db->select($query);
    //     return $result;
    // }
    // public function updateCate($cateName, $id,$cateDescription){
    //     $cateName= $this->frm->validation($cateName);
    //     $cateDescription= $this->frm->validation($cateDescription);
    //     $cateName = mysqli_real_escape_string($this->db->link,$cateName);
    //     $cateDescription = mysqli_real_escape_string($this->db->link, $cateDescription);
    //     $id = mysqli_real_escape_string($this->db->link, $id );
    //     // $updateAt = mysqli_real_escape_string($this->db->link, $updateAt);
       
    //     if(empty($cateName)){
    //         $arlet = "Tên danh mục đang trống!!";
    //         return $arlet;
    //     }else{
    //         $query=" UPDATE  `categories` SET cateName='$cateName' ,cateDescription='$cateDescription', updateAt = now() WHERE cateid='$id'"; //, updateAt = '$updateAt'
    //         $result = $this->db->update($query);
    //     }
    //     if($result!=false){
    //         $arlet = "Sửa thành công !!";
    //         return $arlet;
    //     }else{
    //         $arlet= "Lỗi";
    //         return $arlet;

    //     }
    // }
    // public function deleteCate($delCate){
    //     $query=" DELETE  FROM  `categories` WHERE cateId ='$delCate'";
    //     $result=$this->db->delete($query);
    //     if($result!=false){
    //         $arlet = "Xóa thành công !!";
    //         return $arlet;
    //     }else{
    //         $arlet= "Lỗi";
    //         return $arlet;

    //     }
    // }
}

?>