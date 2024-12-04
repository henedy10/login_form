<?php 
session_start();
$name=$_SESSION['name'];
include('db.php');
if(isset($_POST['logout'])){
  $sql="DELETE FROM login2 WHERE username='$name' ";
  $result=mysqli_query($conn,$sql);
  if($result){
    header("Location:login.php");
  }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../login-page/css/home.css">
    <title>Document</title>
</head>
<body>
    <div class="hello">
        <?php 
            
            echo "HELLOooo ".$name; 
        ?>
        <form action="home.php" method="POST">
            <div class="logout">
                <input type="submit" name="logout" value="Logout" onclick="alert('Are you sure!?')">
            </div>
        </form>
    </div>
</body>
</html>