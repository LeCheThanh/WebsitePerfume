<?php
    include_once '../libs/database.php';
    include_once '../helpers/format.php';
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