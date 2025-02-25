<?php 
include "user.php";
$message="";
if(isset($_POST['signin'])){
    $user= new User();
    $message= $user ->login($_POST['username'],$_POST['password']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>SIGN IN</title>
</head>
<body>
<form action="index.php" method="post">
    <div class="container">
        <div class="content">
                <div class="content-heading">
                    <h1>Sign In</h1>
                </div>

                    <div class="username">
                        <input type="text" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="password">
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="forget">
                        <a href="forget.php"><h4>Forgot <span>Password?</h4></span></a>
                    </div>
                    <div class="sign-in">
                        <button type="submit" name="signin">SIGN IN</button>
                        <span style="color: red; display:block;"><?php echo $message; ?></span>
                    </div>



            <div class="footer">
                <p>Don't have an account?</p>
                <a href="signup.php">SIGN UP NOW</a>
            </div>
        </div>
    </div>
</form>

</body>
</html>