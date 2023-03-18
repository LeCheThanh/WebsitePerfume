<?php
    include '../libs/session.php';
    Session::checkLogin();
    include '../libs/database.php';
    include '../helpers/format.php';
?>

<?php
Class adminLogin{
    private $db;
    private $frm;
    public function __construct()
    {
        $this->db= new Database();
        $this->frm= new Format();
    }
    //function 
    public function login_admin($adminUser, $adminPass){
        $adminUser= $this->frm->validation($adminUser);
        $adminPass= $this->frm->validation($adminPass);
        
        $adminUser = mysqli_real_escape_string($this->db->link,$adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link,$adminPass);

        if(empty($adminUser)||empty($adminPass)){
            // $arlet = "username va password khong duoc de trong";
            // return $arlet;
            echo json_encode(array(
                'status'=>0,
                'message'=>'user và pass không được để trống'

            ));
            exit;
        }else{
            $query="SELECT * FROM `admin` WHERE `adminUser`='$adminUser' AND `adminPass` ='$adminPass'";
            $result = $this->db->select($query);
        }
        if($result!=false){
            $value = $result->fetch_assoc();
            Session::set('adminLogin',true);
            Session::set('adminId',$value['adminId']);
            Session::set('adminUser',$value['adminUser']);
            Session::set('adminName',$value['adminName']);
            echo json_encode(array(
                'status'=>1,
                'message'=>'đăng nhập thành công'
            ));
            exit;
        }else{
            // $arlet = "password sai hoac username khong ton tai";
            // return $arlet;
            echo json_encode(array(
                'status'=>0,
                'message'=>'user và pass không tồn tại'
            ));
            exit;
        }

    }
    public function check_admin(){
        
    }
    public function destroy_admin(){
        
    }
}

?>