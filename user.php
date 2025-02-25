<?php 
include "db.php";
class User {
 private $db;
 public $special;
 public function __construct()
 {
    $this->db=new database();
 }

 public function login($username,$password){
    $sql ="SELECT *FROM account WHERE username ='$username'";
    $result=mysqli_query($this->db->connect,$sql);
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)<=0){
        return "This account is not exist !";
    }
    else{
        if(password_verify($password,$row['password'])){
            header("location : home.php");
            exit();
        }
        else{
            return "Password is not correct !";
        }
    }
}

public function signup($username,$email,$password,$confirmpass){
    if(empty($username)||empty($email)||empty($password)||empty($confirmpass))
    return "Check, All inputs must have a value";
else{
    $sql="SELECT *FROM account WHERE username='$username'";
    $result=mysqli_query($this->db->connect,$sql);
    if(mysqli_num_rows($result)>0){
        return "This name is exist,already !";
    }
    else{
        if(!password_verify($password,$confirmpass)){
            return "Check your password again,please!";
        }
        else{
            $passwordhash=password_hash($password,PASSWORD_DEFAULT);
            $sql="INSERT INTO account (username,email,password) VALUES ('$username','$email','$passwordhash')";
            $result=mysqli_query($this->db->connect,$sql);
            if($result){
                return "Your account is recorded successfully!";
            }
        }
        
    }
    
 }
}

public function update($username,$password,$confirmpass){
    $sql="SELECT *FROM account WHERE username='$username'";
    $result=mysqli_query($this->db->connect,$sql);
    if(mysqli_num_rows($result)<=0)
        return "This account is not exist";
    else{
        if(password_verify($password,$confirmpass)){
            $sql="UPDATE account SET password='$password'";
            $result=mysqli_query($this->db->connect,$sql);
            if($result)
            return "Your update process is done successfully";
        }
        else{
            return 'check your info again';
        }
    }
}
}





?>