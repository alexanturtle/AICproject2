<?php
session_start();
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cart Page</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>
    <h1>Cart</h1>
     <?php
    try {
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
                $sth = $dbh->prepare("SELECT items.item_name FROM items INNER JOIN purchased ON items.id=purchased.item_id"); 
                $sth->execute();
                $items= $sth->fetchAll();
                echo "<table>";
                echo "<tr>";
                echo "<th>Item</th>";
                echo "<th>Price</th>";
                foreach($items as $item){
            //  echo "<p>"" ".$item['price']."</p>";
              echo "<td>."$item['item_name']."</td>";
              echo "<td>".$item['price']."</td>";
            }
            echo "</tr>";
            echo "</table>";
        }    
    catch (PDOException $e) {
      echo "<p>Error: {$e->getMessage()}</p>";
    }
?>
   <form action="checkout.php" method="post">
=          <div id = "cart">
            <br><br>
            <button type='button' id='back' class='button' onClick='navigateToItemPage()'>Back to Items</button>
            <button type='button' id='checkout' class='button' onClick='navigateToCheckout()'>Buy</button><br>
            <button type='button' id='logout' class='button' onClick='navigateToHomePage()'>Logout</button>
            <br><br>
          </div>
    </form>
    <script>
    function navigateToCheckout() {
            window.location.href = 'checkout.php';
     }
    function navigateToHomePage() {
            window.location.href = 'homepage.php';
     }
     function navigateToCartPage() {
            window.location.href = 'itemsinstore.php';
     }
    </script>
</body>
</html>