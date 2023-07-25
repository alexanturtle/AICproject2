<?php
    require_once "config.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Store (Admin)</title>
</head>
<body>
    <h1>Store (Admin)</h1>
    <?php
      try {
       $hashedpassword= password_hash("password", PASSWORD_DEFAULT);

        if (isset($_POST['password'])) {
            $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            $sth1 = $dbh->prepare("SELECT * FROM admin WHERE :username = user_name");
            $sth1->bindValue(':username', $_POST['username']);
            $sth1->execute();
            $hash = $sth1->fetch();
            $user = $hash['user_name'];
            $hash = $hash["password"];
        }
      //  else{
      //     header("Location: adminlogin.php");
      //   }
        if (isset($_SESSION['admin'])) {
    ?>
    <form action="">
          <div>
            <br><br>
            <a href="logout.php">Logout</a>
            <br><br>
            <p>there can be different pages for edit and statistics on this webpage, and we can use JQuery to show them</p>
          </div>

    </form>
    <?php
        }
        else {
          // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password']) && password_verify($_POST["password"], $hashedpassword)) {
          //     $_SESSION['admin'] = $_POST['admin'];
          //     header("Location: adminstore.php");
          // }
          if (password_verify($_POST["password"], $hash)) {
            $_SESSION['admin'] = $_POST['admin'];
            header("Location: adminstore.php");
        }
          else {
              header("Location: adminlogin.php");
          }
        }
      }
      catch (PDOException $e) {
        echo "<p>Error connecting to database!</p>";
      }
    ?>
</body>
</html>