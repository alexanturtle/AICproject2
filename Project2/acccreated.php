<?php
require_once "config.php";
session_start();
?>
<!DOCTYPE html>
<html>
<body>
    <?php
    try {
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $sth = $dbh->prepare("INSERT INTO customers (`user_name`, `password`) VALUES (`:name`, `:password`)"); 
        $sth->bindValue(":name", $_SESSION['username']);
        $sth->bindValue(":password", $_SESSION['pswrd']);
        $sth->execute();
        $customers= $sth->fetchAll();
            if (isset($_SESSION['username'])) {
            $currentCustomerId = $_SESSION['username'];
            $sth1 = $dbh->prepare("SELECT * FROM customer WHERE id=:customerID"); 
            $sth1->bindValue(":playerID", $currentCustomerId);
            $sth1->execute();
            $customername= $sth1->fetch();
            echo "<h1>Welcome, Customer ID:". htmlspecialchars($currentCustomerId) ." ". htmlspecialchars($currentCustomerId['user_name'])."</h1><br>";
            echo "<a href='storemenu'>Go to stores</a>";
        }
          echo "<a href='logout.php'>Log Out</a>";

        }catch (PDOException $e) {
      echo "<p>Error: {$e->getMessage()}</p>";
  }

?>
</body>
</html>