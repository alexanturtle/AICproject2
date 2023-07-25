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
              <input type="text" id="username" placeholder="Enter Username" name="username" required>
  
              <br><br>
                <label for="password">Password: </label> <br>
                <input type="password" id="password" placeholder="Enter Password" name="password" required>

              <br><br>
              <a href="homepage.php">Back</a>
              <input type="submit" value="Log In">
      </form>
      <?php
       <?php
       if (isset($_SESSION['admin'])) {
         header("Location: adminstore.php");
       }
    ?>
      ?>
    </div>
  </body>
  </html>
  