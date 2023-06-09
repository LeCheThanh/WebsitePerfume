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

        $image=$result['productImage'];
        $price=$result['productPrice'];
        $productName=$result['productName'];


        $check_cart="SELECT * FROM cart WHERE productId = '$id' AND sid = '$sId' ";
        $resultcheck= $this->db->select($check_cart);
        
        if($resultcheck){
            $query = "UPDATE cart SET quantity = quantity + $quantity WHERE productId = '$id' AND sid = '$sId'";
            $result = $this->db->update($query);    
            $alert="Sản phẩm đã được thêm vào giỏ hàng";
            return $alert;
        }else{
            
            $query_insert="INSERT INTO cart (productId,sid,productName,price,quantity,image) 
            VALUES ('$id','$sId','$productName','$price','$quantity','$image')";
            $insert_cart = $this->db->insert($query_insert);
            if($insert_cart){
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
        $query = "UPDATE cart SET quantity ='$quantity' WHERE cartId = '$cartid' ";
        $result = $this->db->update($query);
        if($result){
            $alert="Số lượng sản phẩm đã cập nhật";
            return $alert;
        }else{
            $alert="Lỗi";
            return $alert;
        }
    }
    public function deleteProCart($cartid){
        $cartid = mysqli_real_escape_string($this->db->link,$cartid);
        $query = "DELETE FROM cart WHERE cartId = '$cartid' ";
        $result = $this->db->delete($query);
        if($result){
            header('location:cart.php');
        }else{
            $alert="Lỗi";
            return $alert;
        }
    }
    // public function checkCart(){
    //     $sId = session_id();
    //     $query="SELECT * FROM cart WHERE sid = '$sId' ";
    //     $result=$this->db->select($query);
    //     return $result;
    // }
    public function delAllCart(){
        $sId = session_id();
        $query = "DELETE  FROM cart WHERE sid = '$sId' ";
        $result=$this->db->delete($query);
        return $result;
    }
    public function deleteProCO($cartid){
        $cartid = mysqli_real_escape_string($this->db->link,$cartid);
        $query = "DELETE FROM cart WHERE cartId = '$cartid' ";
        $result = $this->db->delete($query);
        if($result){
            header('location:checkout.php');
        }else{
            $alert="Lỗi";
            return $alert;
        }
    }
    public function insertOder( $customerId){
        $sId = session_id();
        $query="SELECT * FROM cart WHERE sid = '$sId' ";
        $getProduct=$this->db->select($query);
        if($getProduct){
            while($result=$getProduct->fetch_assoc()){
                $productid=$result['productId'];
                $productname=$result['productName'];
                $quantity=$result['quantity'];
                $price=$result['price']*$quantity;
                $image=$result['image'];
                $customer_id=$customerId;
            $query_insertOrder="INSERT INTO orders (productId,productName,customerId,Quantity,Price,Image) 
            VALUES ('$productid','$productname','$customer_id','$quantity','$price','$image')";
            $insertOrder=$this->db->insert($query_insertOrder);
            // }if($insertOrder){

            // }else{

            // }

        }


     }
    }
    public function getAmountPrice($customerId){
        $query="SELECT * FROM orders WHERE customerId = '$customerId'";
        $get_price= $this->db->select($query);
        return   $get_price;
    }
    public function getcartOdered($customerId ){
        $query="SELECT * FROM orders WHERE customerId = '$customerId'";
        $get_cart_order= $this->db->select($query);
        return   $get_cart_order;

    }
    public function getInboxCart(){
        $query="SELECT * FROM orders ";
        $get_cart_order= $this->db->select($query);
        return   $get_cart_order;


    }
    public function shilfted($shiftId,$time,$price){
        $shiftId = mysqli_real_escape_string($this->db->link,$shiftId);
        $time = mysqli_real_escape_string($this->db->link,$time);
        $price = mysqli_real_escape_string($this->db->link,$price);
        $query = "UPDATE orders SET Status = '1' WHERE orderId ='$shiftId' AND dateOrder='$time' AND Price = '$price' ";
        $result = $this->db->update($query);
        if($result){
            $alert="<span class='label label-success'>Cập nhật trạng thái thành công !!</span>";
            return $alert;
        }else{
            $alert="Lỗi";
            return $alert;
        }
    }
    public function delShift($shiftId,$time,$price){
        $shiftId = mysqli_real_escape_string($this->db->link,$shiftId);
        $time = mysqli_real_escape_string($this->db->link,$time);
        $price = mysqli_real_escape_string($this->db->link,$price);
        $query = "DELETE  FROM orders WHERE orderId ='$shiftId' AND dateOrder='$time' AND Price = '$price' ";
        $result = $this->db->delete($query);
        if($result){
            $alert="<span class='label label-success'>Xóa thành công !!</span>";
            return $alert;
        }else{
            $alert="Lỗi";
            return $alert;
        }
    }
    public function shiftConfirm($id,$time,$price){
        $shiftId = mysqli_real_escape_string($this->db->link,$id);
        $time = mysqli_real_escape_string($this->db->link,$time);
        $price = mysqli_real_escape_string($this->db->link,$price);
        $query = "UPDATE orders SET Status = '2' WHERE customerId ='$shiftId' AND dateOrder='$time' AND Price = '$price' ";
        $result = $this->db->update($query);
        if($result){
            $alert="<span class='label label-success'>Cập nhật trạng thái thành công !!</span>";
            return $alert;
        }else{
            $alert="Lỗi";
            return $alert;
        }
    }
}

?>