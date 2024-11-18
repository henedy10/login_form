<?php 
session_start();
include('db.php');
$name=$password=$repassword="";
$error=array("username"=>"","password"=>"","repassword"=>"","special"=>"");
if(isset($_POST['submit'])){
    if(empty($_POST['username'])){
        $error['username']='Your Username is Rquired!Please';
    }
    else{
      $name=$_POST['username'];
      $_SESSION['name']=$name;
      if(!preg_match('/^[a-zA-Z0\s]*$/',$name))
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
    if(empty($_POST['repassword'])){
        $error['repassword']='Your rePassword is Rquired!Please';
    }
    else{
      $repassword=$_POST['repassword'];
      if($password!=$repassword)
      $error['repassword']='Your confirm password is incorrect';
    }
    if(!array_filter($error)){
        $sql= "SELECT *FROM login2 WHERE username='$name' OR password='$password'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
          if($row['username']==$name&&$row['password']==$password)
              $error['special']='this account is exist,already!';
          else if($row['username']==$name){
              $error['username']='this name is exist,already!';
         }
          else if($row['password']==$password){
              $error['password']='this password is exist,already!';
          }

        }
        else{
            $sql= "INSERT INTO login2 (username,password) VALUES('$name','$password')";
            $result=mysqli_query($conn,$sql);
              header('Location:home.php');
        }
       }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../login-page/css/register.css">
    <title>Register</title>
</head>
<body>
    <div class="Register">
    <img src="../login-page/img/special.jpg" alt="logo">
    <h1>Register</h1>
    <form action="register.php" method="POST">
    <div class="input-box">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" placeholder="Username" value="<?php echo htmlspecialchars($name)?>" ><br>
      <div class="error"><?php echo $error['username'] ?></div> 
    </div>
    <div class="input-box">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" placeholder="Password" ><br>
      <div class="error"><?php echo $error['password'] ?></div>
    </div>
    <div class="input-box">
      <label for="repassword">Confirm Password</label>
      <input type="password" name="repassword" id="repassword" placeholder="Confirm Password" > <br>
      <div class="error"><?php echo $error['repassword'] ?></div> 
    </div>
    <div class="error"><?php echo $error['special'] ?></div> <br>
    <div class="register">
  <input type="submit" name="submit" value="Send" >
    </div>
    </form>
    </div>

</body>
</html>