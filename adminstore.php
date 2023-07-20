<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Page</title>
</head>
<body>
    <h1>Store Admin</h1>
    <?php
      try {
        password_hash("meme", PASSWORD_DEFAULT);

        if (isset($_POST['password'])) {
            // $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            // $sth1 = $dbh->prepare("SELECT password_hash FROM player WHERE :currentplayer = id");
            // $sth1->bindValue(':currentplayer', $_POST['player']);
            // $sth1->execute();
            // $hash = $sth1->fetch();
            // $hash = $hash["password_hash"];
        }
        if (isset($_SESSION['admin'])) {
          // $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
          // $sth0 = $dbh->prepare("SELECT * FROM player WHERE id = :playerid");
          // $sth0->bindValue(':playerid', $_SESSION['player']);
          // $sth0->execute();
          // $playername = $sth0->fetch();
    ?>
    <form action="">
          <div>
            <br><br>
            <a href="homepage.html">Logout</a>
            <br><br>
            <p>there can be different pages for edit and statistics on this webpage, and we can use JQuery to show them</p>
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