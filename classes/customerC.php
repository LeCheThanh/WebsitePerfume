<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ( $filepath.'/../libs/database.php');
    include_once  ($filepath.'/../helpers/format.php');
?>

<?php
Class customerC{
    
    private $db;
    private $frm;


    public function __construct()
    {
        $this->db= new Database();
        $this->frm= new Format();
    }
    public function insertCustomer($data){
        $username = mysqli_real_escape_string($this->db->link,$data['username']);
        $email = mysqli_real_escape_string($this->db->link,$data['email']);
        $name = mysqli_real_escape_string($this->db->link,$data['name']);
        $password = mysqli_real_escape_string($this->db->link,$data['password']);
        $confirm_password = mysqli_real_escape_string($this->db->link,$data['confirm-password']);
        $address = mysqli_real_escape_string($this->db->link,$data['address']);
        $phone = mysqli_real_escape_string($this->db->link,$data['phone']);
        
    if($username=="" ||  $password=="" || $email=="" ||$address=="" ||$phone=="" ){
            $arlet = "Không được để trống !!";
            return $arlet;
            // echo json_encode(array(
            //     'status'=>0,
            //     'message'=>'Không được để trống!!'

            // ));
            // exit();
    }elseif($password!= $confirm_password){
        $arlet = "Mật Khẩu không khớp";
            return $arlet;
        // echo json_encode(array(
        //     'status'=>0,
        //     'message'=>'Mật Khẩu không khớp!!'

        // ));

    }else{
        $check_username = "SELECT * FROM customers WHERE Username = '$username'";
        $result = $this->db->select($check_username);
        if($result){
            $arlet = "Username đã tồn tại !!";
            return $arlet;
            // echo json_encode(array(
            //     'status'=>0,
            //     'message'=>'Username đã tồn tại !!!!'

            // ));
            
        }else{
            $query=" INSERT INTO  `customers`(Name,Address,Phone,Email,Password,Username )
                                    VALUES ('$name',' $address','$phone','$email','$password','$username')";
            $result = $this->db->insert($query);
            if($result!=false){
                $arlet = "Đăng kí thành công !!";
                return $arlet;
                // echo json_encode(array(
                //     'status'=>1,
                //     'message'=>'Đăng kí thành công !!!!'
    
                // ));
                header("location: login.php");
            }else{
                $arlet= "Lỗi ";
                return $arlet;
    
            }

        }
    }
    
}
}

?>