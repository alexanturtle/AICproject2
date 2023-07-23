<!DOCTYPE html>
  <html lang="en">
  <head>
      <title>Customer Login</title>
      <link rel="stylesheet" href="login.css">
  </head>
  <body>
     <div class="inputbox">
      <h1>Customer Login</h1>
      <form action="customerstore.php" method="post">
              <label for="username">Username: </label> <br>
              <input type="text" id="username" placeholder="Enter Username" name="username" required>
  
              <br><br>
                <label for="password">Password: </label> <br>
                <input type="password" id="password" placeholder="Enter Password" name="password" required>

              <br><br>
              <a href="homepage.php">Back</a>
              <input type="submit" value="Log In">
           
      </form>
     </div>
     <?php
        echo password_hash("password", PASSWORD_DEFAULT);
     ?>
  </body>
  </html>
  