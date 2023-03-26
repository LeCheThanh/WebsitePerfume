<?php

use LDAP\Result;
    $filepath = realpath(dirname(__FILE__));
    include_once ( $filepath.'/../libs/database.php');
    include_once  ($filepath.'/../helpers/format.php');
?>

<?php
Class categoryC{
    private $db;
    private $frm;
    public function __construct()
    {
        $this->db= new Database();
        $this->frm= new Format();
    }
    public function insertCate($cateName,$cateDescription){
        $cateName= $this->frm->validation($cateName);
        $cateDescription= $this->frm->validation($cateDescription);
        $cateName = mysqli_real_escape_string($this->db->link,$cateName);
        $cateDescription = mysqli_real_escape_string($this->db->link, $cateDescription);

        if(empty($cateName)){
            $arlet = "Tên danh mục đang trống!!";
            return $arlet;
        }else{
            $query=" INSERT INTO  `categories`(cateName,cateDescription) VALUES ('$cateName',' $cateDescription')";
            $result = $this->db->insert($query);
        }
        if($result!=false){
            $arlet = "<script>alert(Thêm thành công!!);</script>";
            return $arlet;
        }else{
            $arlet= "<span class='success'>Lỗi</span> ";
            return $arlet;

        }
    }
    public function showlistCate(){
        $query=" SELECT * FROM  `categories` ORDER BY cateId DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getbyId($id){
        $query=" SELECT * FROM  `categories` WHERE cateId='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function updateCate($cateName, $id,$cateDescription){
        $cateName= $this->frm->validation($cateName);
        $cateDescription= $this->frm->validation($cateDescription);
        $cateName = mysqli_real_escape_string($this->db->link,$cateName);
        $cateDescription = mysqli_real_escape_string($this->db->link, $cateDescription);
        $id = mysqli_real_escape_string($this->db->link, $id );
        // $updateAt = mysqli_real_escape_string($this->db->link, $updateAt);
       
        if(empty($cateName)){
            $arlet = "Tên danh mục đang trống!!";
            return $arlet;
        }else{
            $query=" UPDATE  `categories` SET cateName='$cateName' ,cateDescription='$cateDescription', updateAt = now() WHERE cateid='$id'"; //, updateAt = '$updateAt'
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
    public function deleteCate($delCate){
        $query=" DELETE  FROM  `categories` WHERE cateId ='$delCate'";
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