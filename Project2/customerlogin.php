<!DOCTYPE html>
  <html lang="en">
  <head>
      <title>Customer Login</title>
      <link rel="stylesheet" href="login.css">
  </head>
  <body>
     <?php
        if (isset($_SESSION['customer'])) {
          header("Location: itemsinstore.php");
        }
     ?>
     <div class="inputbox">
      <h1>Customer Login</h1>
      <form  id="myForm" action="itemsinstore.php" method="post">
              <label for="username">Username: </label> <br>
              <input type="text" id="username" placeholder="Enter Username" name="username" required>
  
              <br><br>
                <label for="password">Password: </label> <br>
                <input type="password" id="password" placeholder="Enter Password" name="password" required>

              <br><br>
              <a href="homepage.php">Back</a>
              <input type="submit" value="Log In ">
           
      </form>
     </div>
     <!-- <script>
    document.getElementById("myForm").addEventListener("submit", function(event) {
      event.preventDefault(); 
      window.location.href = "itemsinstore.php";
    });
  </script> -->
  </body>
  </html>
  