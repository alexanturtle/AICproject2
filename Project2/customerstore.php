<?php
    require_once "config.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Store</title>
</head>
<body>
    <h1>Store</h1>
    <?php
      try {
        if (isset($_POST['password']) && isset($_POST['username'])) {
            $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            $sth1 = $dbh->prepare("SELECT password FROM customer WHERE :username = user_name");
            $sth1->bindValue(':username', $_POST['username']);
            $sth1->execute();
            $hash = $sth1->fetch();
            
            password_hash($_POST['password'], PASSWORD_DEFAULT);
            $hash = $hash["password"];

            //debug
            if (password_verify($_POST['password'], $hash)) {
              echo "password correct";
            }
            else {
              echo "password incorrect";
            }
        }
        if (isset($_SESSION['customer'])) {
          $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
          $sth0 = $dbh->prepare("SELECT * FROM customer WHERE id = :customerid");
          $sth0->bindValue(':customerid', $_SESSION['customer']);
          $sth0->execute();
          $customername = $sth0->fetch();
    ?>
    <!-- <?php echo "<h1>Welcome, ".htmlspecialchars($customername['user_name'])."</h1>"; ?> -->
    <form action="">
          <div>
            <br><br>
            <a href="itemsinstore.php">Items</a>
            <br><br>
            <a href="logout.php">Logout</a>
            <br><br>
            <p>Many types of shops</p>
          </div>
    </form>
    <?php
        }
        else {
          if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password']) && (password_verify($_POST['password'], $hash))) {
            $_SESSION['customer'] = $_POST['username'];
            echo "session set & password correct";
            header("Location: customerstore.php");
          }
          else {
            header("Location: customerlogin.php");
          }
        }
      }
      catch (PDOException $e) {
        echo "<p>Error connecting to database!</p>";
      }
    ?>
</body>
</html>