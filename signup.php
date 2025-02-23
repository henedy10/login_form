<?php 
include "db.php";
$username=$email=$password=$confirmpass=$special="";
$usernameErr=$emailErr=$passwordErr=$confirmpassErr="";
if(isset($_POST['signup'])){
    class User {
    public $username;
    public $email;
    public $password;
    public $confirmpass;
    public $usernameErr;
    public $emailErr;
    public $passwordErr;
    public $confirmpassErr;

    function __construct($username,$email,$password,$confirmpass)
    {
        if(empty($_POST['username'])){
            $this -> usernameErr="This field is required, please!";
        }
        else{
            $this->username =$_POST['username'];
            if(!preg_match("/^[a-zA-Z0-9-' ]*$/",$_POST['username'])){
                $this->usernameErr="Your name is Invalid!";
            }
        }

        if(empty($_POST['email'])){
            $this -> emailErr="This field is required, please!";
        }
        else{
            $this->email =$_POST['email'];
            if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
                $this->emailErr="Your name is Invalid!";
            }
        }
        if(empty($_POST['password'])){
            $this -> passwordErr="This field is required, please!";
        }
        else{
            $this->password =$_POST['password'];
        }
        if(empty($_POST['confirm_password'])){
            $this -> confirmpassErr="This field is required, please!";
        }
        else{
            $this->confirmpass =$_POST['confirm_password'];
            if($this->confirmpass!=$this->password){
                $this -> confirmpassErr="There is an error, check your info!";
            }
        }
    }

    }

    $user=new User($_POST['username'],$_POST['email'],$_POST['password'],$_POST['confirm_password']);
    $username=$user->username;
    $email=$user->email;
    $password=$user->password;
    $confirmpass=$user->confirmpass;
    $usernameErr=$user->usernameErr;
    $emailErr=$user->emailErr;
    $passwordErr=$user->passwordErr;
    $confirmpassErr=$user->confirmpassErr;
    if($usernameErr==""&&$emailErr==""&&$passwordErr==""&&$confirmpassErr==""){
        $sql="INSERT INTO account (username,email,password) VALUES ('$username','$email','$password')";
        if(mysqli_query($connect,$sql)){
            $special="New Record Created Successfully";
        }
    }

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
                        <span style="color: red; display: block; font-weight:bolder; margin-top:5px;"><?php echo $usernameErr; ?></span>
                    </div>
                    <div class="email">
                        <input type="email" id="email" name="email" placeholder="Email">
                        <span style="color: red; display: block; font-weight:bolder; margin-top:5px;"><?php echo $emailErr; ?></span>
                    </div>
                    <div class="password">
                        <input type="password" id="password" name="password" placeholder="Password">
                        <span style="color: red; display: block; font-weight:bolder; margin-top:5px;"><?php echo $passwordErr; ?></span>
                    </div>
                    <div class="password">
                        <input type="password" id="confirm password" name="confirm_password" placeholder="Confirm Password">
                        <span style="color: red; display: block; font-weight:bolder; margin-top:5px;"><?php echo $confirmpassErr; ?></span>
                    </div>
                    <div class="submit">
                        <button type="submit" name="signup">SUBMIT</button>
                        <span style="color: green; display: block; font-weight:bolder; margin-top:5px;"><?php echo $special; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>