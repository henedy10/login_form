<?php 
include "db.php";
$username=$password=$usernameErr=$passwordErr=$special="";
if(isset($_POST['signin'])){
class User {
    public $name;
    public $pass;
    public $nameErr;
    public $passErr;
    public function __construct($name,$pass)
    {
        if(empty($_POST['username'])){
            $this -> nameErr="This field is required, please!";
        }
        else{
            $this->name =$_POST['username'];
            if(!preg_match("/^[a-zA-Z0-9-' ]*$/",$_POST['username'])){
                $this->nameErr="Your name is Invalid!";
            }
        }
        if(empty($_POST['password'])){
            $this -> passErr="This field is required, please!";
        }
        else{
            $this->pass =$_POST['password'];
        }
    }
}
$user = new User($_POST['username'],$_POST['password']);
$username= $user->name;
$password = $user->pass;
$usernameErr= $user->nameErr;
$passwordErr= $user->passErr;
if($usernameErr==""&&$passwordErr==""){
    $sql="SELECT *FROM account WHERE username='$username'";
    $result=mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)<=0){
        $special="This account is not exist";
    }
    else{
        header("location:home.php");
    }
}

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
                        <input type="text" id="username" name="username" placeholder="Username" value="<?php echo $username;?>">
                        <span style="color: red; display: block; font-weight:bolder; margin-top:5px;"><?php echo $usernameErr; ?></span>
                    </div>
                    <div class="password">
                        <input type="password" id="password" name="password" placeholder="Password" value="<?php echo $password;?>">
                        <span style="color: red; display: block; font-weight:bolder; margin-top:5px;"><?php echo $passwordErr; ?></span>
                    </div>
                    <div class="forget">
                        <a href="forget.php"><h4>Forgot <span>Password?</h4></span></a>
                    </div>
                    <div class="sign-in">
                        <button type="submit" name="signin">SIGN IN</button>
                        <span style="color: red; display: block; font-weight:bolder; margin-top:5px;"><?php echo $special; ?></span>
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