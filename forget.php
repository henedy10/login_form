<?php 
    include "user.php";
    $message="";
    if(isset($_POST['update'])){
        $user = new User();
        $message= $user->update($_POST['username'],$_POST['new_password'],$_POST['confirm_password']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forget.css">
    <title>New Password</title>
</head>
<body>
    <form action="forget.php" method="post">

        <div class="container">
            <div class="content">
                    <div class="content-heading">
                        <h1>New Password</h1>
                    </div>
                    <div class="inputs">
                        <div class="username">
                            <input type="text" id="username" name="username" placeholder="Username">
                        </div>
                        <div class="new password">
                            <input type="password" id="new_password" name="new_password" placeholder="New Password">
                        </div>
                        <div class="confirm password">
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                        </div>
                        <div class="update">
                            <button type="submit" name="update">UPDATE</button>
                            <span style="display: block; color:red;"><?php echo $message; ?></span>
                        </div>
                    </div>
            </div>
        </div>

    </form>
</body>
</html>