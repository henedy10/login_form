<?php 
include "user.php";
$message="";
if(isset($_POST['signup'])){
    $user= new User();
    $message = $user->signup($_POST['username'],$_POST['email'],$_POST['password'],$_POST['confirm_password']);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>SIGN UP</title>
</head>
<body>
    <form action="signup.php" method="post">
        <div class="container">
            <div class="content">
                <div class="content-heading">
                    <h1>Sign UP</h1>
                </div>
                <div class="inputs">
                    <div class="username">
                        <input type="text" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="email">
                        <input type="email" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="password">
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="password">
                        <input type="password" id="confirm password" name="confirm_password" placeholder="Confirm Password">
                    </div>
                    <div class="submit">
                        <button type="submit" name="signup">SUBMIT</button>
                        <span style="display: block; color: red;"><?php echo $message; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>