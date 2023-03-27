<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ( $filepath.'/../libs/database.php');
    include_once  ($filepath.'/../helpers/format.php');
?>

<?php
Class cartModel{
    
    private $db;
    private $frm;


    public function __construct()
    {
        $this->db= new Database();
        $this->frm= new Format();
    }
    
    public function addtocart( $id,$quantity){
        $quantity = $this->frm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link,$quantity);
        $id = mysqli_real_escape_string($this->db->link,$id);
        $sId=session_id();

        $query="SELECT * FROM products WHERE productId = '$id' ";
        $result = $this->db->select($query)->fetch_assoc();
        $check_cart="SELECT * FROM cart WHERE productId = '$id' AND sid = '$sId' ";
        if($check_cart){
            $query = "UPDATE cart SET quantity = quantity + $quantity WHERE productId = '$id' AND sid = '$sId'";
            $result = $this->db->update($query);    
            $alert="Sản phẩm đã được thêm vào giỏ hàng";
            return $alert;
        }else{

            $image=$result['productImage'];
            $price=$result['productPrice'];
            $productName=$result['productName'];
            $query_insert="INSERT INTO cart (productId,sid,productName,price,quantity,image) 
            VALUES ('$id','$sId','$productName','$price','$quantity','$image')";
            $insert_cart = $this->db->insert($query_insert);
            if($result){
                header('location:cart.php');
            }else{
                header('location:404.php');
            }
        }
    }
    public function getProductCart(){
        $sId = session_id();
        $query="SELECT * FROM cart WHERE sid = '$sId' ";
        $result=$this->db->select($query);
        return $result;
    }
    public function updatequantityCart($quantity, $cartid){
        $quantity = mysqli_real_escape_string($this->db->link,$quantity);
        $cartid = mysqli_real_escape_string($this->db->link,$cartid);
        $query = "UPDATE cart SET quantity = $quantity WHERE cartId = '$cartid'";
        $result = $this->db->update($query);
        if($result){
            $alert="Số lượng sản phẩm đã cập nhật";
            return $alert;
        }else{
            $alert="Lỗi";
            return $alert;
        }
    }
}

?>