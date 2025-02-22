<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="signup.css">
    <title>SIGN UP</title>
</head>
<body>
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
                    <input type="password" id="confirm password" name="confirm password" placeholder="Confirm Password">
                </div>
                <div class="submit">
                    <button>SUBMIT</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>