<!DOCTYPE html>
  <html lang="en">
  <head>
      <title>New Account</title>
      <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <div class="inputbox">
      <h1>Create an Account</h1>
      <form action="acccreated.php" method="get">
              <label for="username">Username: </label> <br>
              <input type="text" placeholder="Enter Username" name="username" required>
  
              <br><br>
                <label for="pswrd">Password: </label> <br>
                <input type="password" id="password" placeholder="Enter Password" name="pswrd" required>

              <br><br>
              <a href="homepage.php">Back</a>
              <input type="submit" value="Create">
            
      </form>
    </div>
  </body>
  </html>