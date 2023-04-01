<?php
include 'views/inc/header.php';
?> 
<?php
$login_check= Session::get('customer_login');
if($login_check==false){
	header('location: login.php');
}
?>
<body>
<div class="container">
		<div class="row">
			<div class="col-md-12" style="text-align: center; margin-bottom:20px">
                <h2>Order page</h2>
            </div>
        </div>
</body>
<?php
include 'views/inc/footer.php';
?> 
