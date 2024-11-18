<?php 
include('db.php');
$error=array("username"=>"","newpassword"=>"","confirm_newpassword"=>"");
$name=$newpassword=$confirmpassword=$special="";
if(isset($_POST['update'])){


    if(empty($_POST['username'])){
        $error['username']='Your Username is Rquired!Please';
    }
    else{
      $name=$_POST['username'];
      $_SESSION['name']=$name;
      if(!preg_match('/^[a-zA-Z\s]*$/',$name))
      $error['username']='Only letters and white space allowed';
    }


    if(empty($_POST['newpassword'])){
        $error['newpassword']='Your Password is Rquired!Please';
    }
    else{
      $newpassword=$_POST['newpassword'];
      if(!preg_match('/^[a-zA-Z0-9]*$/',$newpassword))
      $error['newpassword']='Only letters and numbers allowed';
    }


    if(empty($_POST['confirm_newpassword'])){
        $error['confirm_newpassword']='Your Password is Rquired!Please';
    }
    else{
      $confirmpassword=$_POST['confirm_newpassword'];
      if(!preg_match('/^[a-zA-Z0-9]*$/',$confirmpassword))
      $error['confirm_newpassword']='Only letters and numbers allowed';
      else if($newpassword!=$confirmpassword)
      $error['confirm_newpassword']='Your confirm password is incorrect';
    }

   if(!array_filter($error)){
    $sql="SELECT username FROM login2  WHERE username='$name'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0){
        $sql= "UPDATE login2 SET password='$newpassword' WHERE username='$name'";
        $result=mysqli_query($conn,$sql);
        if($result){
          $special="Record updated successfully";
         }
    }
    else $special="This account is not exist!";
  }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../login-page/css/newpassword.css">
    <title>Document</title>
</head>
<body>
    <div class="newpass">
        <img src="../login-page/img/special.jpg" alt="logo">
        <h1>UPDATE</h1>
    <form action="newpassword.php" method="POST">
        <div class="input-box">
        <div class="error"><?php echo $error['username'] ?></div>
            <input type="text" name="username" placeholder="username" value="<?php echo $name ?>"><br><br>
            <div class="error"><?php echo $error['newpassword'] ?></div>
            <input type="password" name="newpassword" placeholder="new password"><br><br>
            <div class="error"><?php echo $error['confirm_newpassword'] ?></div>
            <input type="password" name="confirm_newpassword" placeholder="confirm new_password"><br><br>
        </div>
        <div class="special"><?php echo $special ?></div>
        <div class="update">
            <input type="submit" name="update" value="update">
        </div>
    </form>
    </div>

</body>
</html>