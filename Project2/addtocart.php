
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
            if(isset($_GET['id']) && isset($_SESSION['customer'])){
                $itemid = $_GET['id'];
                $get = $dbh->prepare("SELECT id FROM customer WHERE user_name = :name"); 
                $get->bindValue(":name", $_SESSION['customer']);
                $get->execute();
                $user= $get->fetchAll();
                $userid = $user[0]['id'];
                //echo $userid;
                $sth = $dbh->prepare("INSERT INTO purchased (`customer_id`, `item_id`, `bought`) VALUES (:customer, :item, 'False')"); 
                $sth->bindValue(":customer", $userid);
                $sth->bindValue(":item", $itemid);
                $sth->execute();
            echo "<br>Added to cart!<br>";
            echo "<a href='itemsinstore.php'>Back</a>";
            header("Location: itemsinstore.php");
            }
            else{
                header("Location: itemsinstore.php");
            }

        }
    
    catch (PDOException $e) {
      echo "<p>Error: {$e->getMessage()}</p>";
      header("Location: itemsinstore.php");
    }
?>
</body>
</html>