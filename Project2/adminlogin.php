<!DOCTYPE html>
  <html lang="en">
  <head>
      <title>Admin Login</title>
      <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <div class="inputbox">
      <h1>Admin Login</h1>
      <form action="adminstore.php" method="post">
              <label for="username">Username: </label> <br>
              <input type="text" placeholder="Enter Username" name="username" required>
  
              <br><br>
                <label for="pswrd">Password: </label> <br>
                <input type="password" id="password" placeholder="Enter Password" name="pswrd" required>

              <br><br>
              <a href="homepage.php">Back</a>
              <input type="submit" value="Log In">
      </form>
    </div>
  </body>
  </html>
  