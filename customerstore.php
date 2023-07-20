<?php
    require_once "config.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer Page</title>
</head>
<body>
    <h1>Store Customer</h1>
    <?php
      try {
        password_hash("password", PASSWORD_DEFAULT);

        if (isset($_POST['password'])) {
            $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            $sth1 = $dbh->prepare("SELECT password FROM admin WHERE :username = user_name");
            $sth1->bindValue(':username', $_POST['username']);
            $sth1->execute();
            $hash = $sth1->fetch();
            $hash = $hash["password"];
        }
        if (isset($_SESSION['admin'])) {
    ?>
    <form action="">
          <div>
            <br><br>
            <a href="itemsinstore.php">Items</a>
            <br><br>
            <a href="homepage.html">Logout</a>
            <br><br>
            <p>Many types of shops</p>
          </div>
    </form>
    <?php
        }
        else {
          if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password']) && password_verify($_POST['password'], $hash)) {
              $_SESSION['admin'] = $_POST['admin'];
              header("Location: adminstore.php");
          }
          else {
              header("Location: login.php");
          }
        }
      }
      catch (PDOException $e) {
        echo "<p>Error connecting to database!</p>";
      }
    ?>
</body>
</html>