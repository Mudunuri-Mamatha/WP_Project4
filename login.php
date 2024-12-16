<!DOCTYPE html>
<html lang="en">
<head>
<meta name="Description" content="Password">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"  href="style.css">
<title>Login</title>
</head>

<body class='login'>
<div class="content1">
            <header>SignIn as Seller</header>
            <form action = "seller_login_submit.php" method="POST">
               <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="text" class="pass-key" name = "seller_user_id_login"  id="seller_user_id_login" required placeholder="UserId">
               </div>
               <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="password" class="pass-key" name = "seller_password_login" id="seller_password_login" required placeholder="Password">
               </div>
               <div class="field">
                  <input type="submit" name="submit" id = "submit" value = "Submit">
               </div>
            </form>
            <div class="signup">
               Don't have an account?
               <a href="register.php">Sign up</a>
            </div>
         </div>
     <div class="content2">
            <header>SignIn as Buyer</header>
            <form action = "buyer_login_submit.php" method="POST">
               <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="text" class="pass-key" name = "buyer_user_id_login"  id="buyer_user_id_login" required placeholder="UserId">
               </div>
               <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="password" class="pass-key" name = "buyer_password_login" id="buyer_password_login" required placeholder="Password">
               </div>
               <div class="field">
                  <input type="submit" name="submit" id = "submit" value = "Submit">
               </div>
            </form>
            <div class="signup">
               Don't have an account?
               <a href="register.php">Sign Up</a>
            </div>
         </div>
</body>
</html>	