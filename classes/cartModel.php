<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'../libs/database.php');
    include_once  ($filepath.'../helpers/format.php');
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
}

?>