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
            <header>Signup as Seller</header>
            <form action = "seller_register_submit.php" method="POST">
               <div class="field">
                  <span class="fa fa-user"></span>
                  <input type="text" name = "seller_name" id="seller_name" required placeholder="Name">
               </div>
               <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="text" class="pass-key" name = "seller_user_id"  id="seller_user_id" required placeholder="UserId">
               </div>
               <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="email" class="pass-key" name = "seller_email" id="seller_email" required placeholder="Email">
               </div>
               <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="password" class="pass-key" name = "seller_password" id="seller_password" required placeholder="Password">
               </div>
               <div class="fields">
                    <input type="checkbox" style="margin-left:6%;" required> <h8 style="color: #2691d9">I agree to the T&C</h8>
                </div>
               <div class="field">
                  <input type="submit" name="submit" id = "submit" value = "Submit">
               </div>
            </form>
            <div class="signup">
               Already have an account?
               <a href="login.php">Sign In</a>
            </div>
         </div>
     <div class="content2">
            <header>Signup as Buyer</header>
            <form action = "buyer_register_submit.php" method="POST">
               <div class="field">
                  <span class="fa fa-user"></span>
                  <input type="text" name = "buyer_name" id="buyer_name" required placeholder="Name">
               </div>
               <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="text" class="pass-key" name = "buyer_user_id"  id="buyer_user_id" required placeholder="UserId">
               </div>
               <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="email" class="pass-key" name = "buyer_email" id="buyer_email" required placeholder="Email">
               </div>
               <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="password" class="pass-key" name = "buyer_password" id="buyer_password" required placeholder="Password">
               </div>
               <div class="fields">
                    <input type="checkbox" style="margin-left:6%;" required> <h8 style="color: #2691d9">I agree to the T&C</h8>
                </div>
               <div class="field">
                  <input type="submit" name="submit" id = "submit" value = "Submit">
               </div>
            </form>
            <div class="signup">
               Already have an account?
               <a href="login.php">Sign In</a>
            </div>
         </div>
</body>
</html>	