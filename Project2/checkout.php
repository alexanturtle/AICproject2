<?php
session_start();
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout Page</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>
<title>Checkout Page</title>
    <link rel="stylesheet" href="cart.css">
    <?php
    try {
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $sth = $dbh->prepare("SELECT * FROM purchased"); 
        $result = $sth->execute();
        if ($result->rowCount() > 0) {
            echo "<h1>You have purchased your items!</h1>";
            echo "<img id = 'image' src='download.png' alt='boba'><br>";
            echo "<p>Come back again soon</p><br>";
            echo "<button type='button' id='logout' class='button' onClick='navigateToHomePage()'>Logout</button>";
        } else {
            echo "<h1>You have no items in cart to purchase</h1>";
            echo "<img id = 'image' src='sadbob.png' alt='boba'><br>";
            echo "<button type='button' id='items' class='button' onClick='navigateToItemsPage()'>Back to Items</button>"
            echo "<button type='button' id='logout' class='button' onClick='navigateToHomePage()'>Logout</button>";
        }
        }catch (PDOException $e) {
      echo "<p>Error: {$e->getMessage()}</p>";
  }
?>
</body>
<script>
    function navigateToHomePage() {
            window.location.href = 'homepage.php';
    }
    function navigateToItemsPage() {
            window.location.href = 'itemsinstore.php';
    }
    </script>
</html>