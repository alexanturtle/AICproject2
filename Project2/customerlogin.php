<?php
    require_once "config.php";
    session_start();
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
      <title>Customer Login</title>
  </head>
  <body>
      <h1>Customer Login</h1>
      <form action="customerstore.php" method="post">
          <div >
              <h3>Sign in</h3>
          </div>
        
          <div>
              <label for="username">Username: </label>
              <input type="text" placeholder="Enter Username" name="username" required>
  
              <br><br>
                <label for="pswrd">Password: </label>
                <input type="password" id="password" placeholder="Enter Password" name="pswrd" required>

              <br><br>
              <a href="homepage.html">Back</a>
              <a href= "customerstore.html">Login</a>
            </div>
      </form>
  </body>
  </html>
  