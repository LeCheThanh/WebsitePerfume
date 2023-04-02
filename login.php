<?php
include 'views/inc/header.php';

?>
<?php
$login_check= Session::get('customer_login');
if($login_check){
	header('location: index.php');
}
?>
<?php
	// $permissions = ['email']; //optional

	// if (isset($accessToken))
	// {
	// 	if (!isset($_SESSION['facebook_access_token'])) 
	// 	{
	// 		//get short-lived access token
	// 		$_SESSION['facebook_access_token'] = (string) $accessToken;
			
	// 		//OAuth 2.0 client handler
	// 		$oAuth2Client = $fb->getOAuth2Client();
			
	// 		//Exchanges a short-lived access token for a long-lived one
	// 		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
	// 		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
			
	// 		//setting default access token to be used in script
	// 		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	// 	} 
	// 	else 
	// 	{
	// 		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	// 	}
		
		
	// 	//redirect the user to the index page if it has $_GET['code']
	// 	if (isset($_GET['code'])) 
	// 	{
	// 		header('Location: ./');
	// 	}
		
		
	// 	try {
	// 		$fb_response = $fb->get('/me?fields=name,first_name,last_name,email');
	// 		$fb_response_picture = $fb->get('/me/picture?redirect=false&height=200');
			
	// 		$fb_user = $fb_response->getGraphUser();
	// 		$picture = $fb_response_picture->getGraphUser();
			
	// 		$_SESSION['fb_user_id'] = $fb_user->getProperty('id');
	// 		$_SESSION['fb_user_name'] = $fb_user->getProperty('name');
	// 		$_SESSION['fb_user_email'] = $fb_user->getProperty('email');
	// 		$_SESSION['fb_user_pic'] = $picture['url'];
			
			
	// 	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	// 		echo 'Facebook API Error: ' . $e->getMessage();
	// 		session_destroy();
	// 		// redirecting user back to app login page
	// 		header("Location: ./");
	// 		exit;
	// 	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	// 		echo 'Facebook SDK Error: ' . $e->getMessage();
	// 		exit;
	// 	}
	// } 
	// else 
	// {	
	// 	// replace your website URL same as added in the developers.Facebook.com/apps e.g. if you used http instead of https and you used
	// 	$fb_login_url = $fb_helper->getLoginUrl('http://localhost/facebook1/', $permissions);
	// }
	?>
<link rel="stylesheet" href="assets/logincss.css">
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<?php
	if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['login-submit'])){
	  
		$loginCustomer=$cs->loginCustomer($_POST);
	}
	
?>

<div class="container">
        <div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12">
								<a href="#" class="active" id="login-form-link">Đăng nhập</a>
							</div>

						</div>
						<hr>
					</div>
					<div class="panel-body">
					<?php
                        if(isset($loginCustomer)){
                            echo $loginCustomer;
                        }
                        ?>
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Tên đăng nhập" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mật khẩu">
									</div>
									<!-- <div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div> -->
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login" tabindex="4" class="form-control btn btn-login" value="Đăng nhập">
											</div>
										</div>
									</div>
									<?php
								
									?>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													Chưa có tài khoản?
													<a href="register.php" tabindex="5" class="forgot-password">Đăng kí</a>
												</div>
											</div>
										</div>
									
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- <script>
         //Login Swap form login/ register
         $(function() {

$('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100);
     $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
});
$('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
     $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
});

});

    </script> -->

<?php
include 'views/inc/footer.php';
?> 
