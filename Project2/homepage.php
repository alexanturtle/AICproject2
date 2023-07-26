<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <link rel="stylesheet" href="homepage.css">
    </head>
    <body>
        <h1>Boba Store</h1>
        <div id="links">
            <div id="customerlogin">
                <a class="login" href="customerlogin.php">Customer Login</a>
            </div>
            <div id="createacc">
                <a href="newcustomer.php">New? Sign up here!</a>
            </div>
            <div id="adminlogin">
                <a class="login" href="adminlogin.php">Admin Login</a>
            </div>
        </div>
        <?php
        if (isset($_SESSION['customer'])) {
          header("Location: customerstore.php");
        }
        if (isset($_SESSION['admin'])) {
            header("Location: admin.php");
          }
     ?>
    </body>
</html>