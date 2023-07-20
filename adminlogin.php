<?php
    require_once "config.php";
    session_start();
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
      <title>Admin Login</title>
  </head>
  <body>
      <h1>Admin Login</h1>
      <form action="adminstore.php">
          <div >
              <h3>Sign in</h3>
          </div>
  
          <div>
              <label for="username">Your username</label>
              <input type="text" placeholder="Enter Username" name="username" required>
  
              <br><br>
                <label for="pswrd">Your password</label>
                <input type="password" id="password" placeholder="Enter Password" name="pswrd" required>

              <br><br>
              <a href="homepage.html">Back</a>
              <a href="adminstore.html">Login</a>
            </div>
  
      </form>
  </body>
  </html>
  