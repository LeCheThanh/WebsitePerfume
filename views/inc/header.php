<?php
include 'libs/session.php';
Session::init();
?>
<?php
include_once 'libs/database.php';
include_once 'helpers/format.php';

spl_autoload_register(function($className) {
    include_once "classes/".$className.".php";
});
    $db = new Database();
    $fm = new Format();
    $cart = new cartModel();
    $user = new userModel();
    $cate = new categoryC();
    $pro = new productC();

?>
<h1>header</h1>