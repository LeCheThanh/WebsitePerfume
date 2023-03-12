<?php
include '../libs/session.php';
Session::checkSession();
?>
<h2>HELLO <?php echo Session::get('adminName')?></h2>
<div>
    <?php
        if(isset($_GET['action']) && $_GET['action']=='log-out'){
            Session::destroy();
        }
    ?>
    <a href="?action=log-out">Log out</a>
</div>