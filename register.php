<?php
include 'views/inc/header.php';
?>
<link rel="stylesheet" href="assets/logincss.css">
<?php
	if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['submit'])){
		$insertCustomer=$cs->insertCustomer($_POST);
	}
	
?>
<div class="container">
        <div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12">
								<a href="#" class="active" id="login-form-link">Đăng kí</a>
							</div>

						</div>
						<hr>
					</div>
					<div class="panel-body">
                        <?php
                        if(isset($insertCustomer)){
                            echo $insertCustomer;
                        }
                        ?>
						<div class="row">
							<div class="col-lg-12">
                            <form id="register-form" action="" method="post" role="form" >
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Tài khoản" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mật khẩu">
									</div>
                    
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Xác nhận mật khẩu">
									</div>
                                    <div class="form-group">
										<input type="text" name="address" id="address" tabindex="1" class="form-control" placeholder="Địa chỉ">
									</div>
                                    <div class="form-group">
										<input type="text" name="phone" id="phone" tabindex="1" class="form-control" placeholder="Điện thoại">
									</div>
									<div class="form-group">
										<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Tên" value="">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Đăng kí">
											</div>
                
										</div>
                                    </div>
                                        <div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
                                                <a href="login.php" tabindex="5" class="back-login">Trở về trang đăng nhập?</a>
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
<?php
include 'views/inc/footer.php';
?> 
