<?php 
session_start();
include('db.php');
$error=array("username"=>"","password"=>"","special"=>"");
$name=$password="";
if(isset($_COOKIE['name'])&&isset($_COOKIE['username'])){
  $name=$_COOKIE['name'];
  $password=$_COOKIE['username'];
}
if(isset($_POST['login'])){
  if(isset($_REQUEST['rememberme'])){
   setcookie('name',$_REQUEST['username'],time()+3600);
   setcookie('password',$_REQUEST['password'],time()+3600);
  }
  if(empty($_POST['username'])){
      $error['username']='Your Username is Rquired!Please';
  }
  else{
    $name=$_POST['username'];
    $_SESSION['name']=$name;
    if(!preg_match('/^[a-zA-Z\s]*$/',$name))
    $error['username']='Only letters and white space allowed';
  }
  if(empty($_POST['password'])){
      $error['password']='Your Password is Rquired!Please';
  }
  else{
    $password=$_POST['password'];
    if(!preg_match('/^[a-zA-Z0-9]*$/',$password))
    $error['password']='Only letters and numbers allowed';
  }
 if(!array_filter($error)){
  $sql= "SELECT *FROM login2 WHERE password='$password' OR username='$name' ";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
   if(mysqli_num_rows($result)>0){
      if($row['username']==$name&&$row['password']==$password)
        header('Location:home.php');
      else{
          if($row['username']!=$name)
          $error['username']="error!check your username";
          else if($row['password']!=$password)
          $error['password'] ="error!check your password";
        }
     
    }
    else $error['special']="This account is not exist!";
    
}

}

?>
<!DOCTYPE html>
  <html lang="en">
      <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login-form</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../login-page/css/login.css">
      </head>
      <body>
        <div class="login">
          <img src="../login-page/img/special.jpg" alt="logo">
          <h1>Login</h1>
          <form action="login.php" method="POST">
            <div class="input-box">
              <div class="error"><?php echo $error['username'] ?></div>
            <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($name)?>" placeholder="Username">
            <i class="fa-solid fa-user"></i>
            </div>
            <div class="input-box">
              <div class="error"><?php echo $error['password'] ?></div>
                <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($password) ?>" placeholder="Password">
                <i class="fa-solid fa-lock"></i>
              </div>
            <div class="remember-forget">
            <p><input type="checkbox" name="rememberme"> <span>Remember me</span><a href="newpassword.php">forget password?</a></p>
            </div> <br>
            <div class="error"><?php echo $error['special'] ?></div>
            <div class="register">
              <input type="submit" name="login" value="Login">
              <p>Don’t have an account ? <a href="register.php">Register Here</a></p>
            </div>
          </form>
        </div>
    </body>
  </html>