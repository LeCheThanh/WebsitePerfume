<?php
    include '../classes/adminlogin.php';
?>
<?php
    $class = new adminLogin();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $adminUser = $_POST['adminUser'];
        $adminPass = md5($_POST['adminPass']);

        $login_check=$class->login_admin($adminUser, $adminPass);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../admin/assets/sytle.css">
    <title>Document</title>
</head>
<body class="text-center">
<main class="form-signin w-100 m-auto">
  <form id="login-form">  <!--action="login.php" method="post"-->
    <h1 class="h3 mb-3 fw-normal">LOGIN</h1>
    <span>
        <?php
        if(isset($login_check)){
            echo $login_check;
        }
        ?>

    </span>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="User" name="adminUser">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password"name="adminPass">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">© CheThanh</p>
  </form>
</main>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $( "#login-form" ).submit(function( event ) {
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: './login.php',
        data: $( this ).serializeArray(),
        success: function(response){
          response = JSON.parse(response);
          console.log("console :",console);
          if(response.status==0){
            // toastr.error('Have fun storming the castle!', 'Miracle Max Says')
            swal("Thông báo", response.message, "error");
            //alert(response.message);
          }else{
            swal("Thông báo", response.message, "success");
            // alert(response.message);
            // location:reload();
            setTimeout(function(){location.href ='index.php';}, 1000);
          }
          
        }
      });
  }); 
</script>
</body>
</html>
