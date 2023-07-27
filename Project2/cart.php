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
  <!-- this is the cart page, where all items the user added to cart is displayed and can be bought -->
    <h1>Cart</h1>
     <?php
    try {
            if(isset($_SESSION['customer'])){
              $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
              $user = $dbh->prepare("SELECT `id` FROM customer WHERE `user_name` = :user"); 
                $user->bindValue(':user', $_SESSION['customer']);
                $user->execute();
                $id= $user->fetch();

                $sth = $dbh->prepare("SELECT items.item_name, items.price, `topping` FROM items INNER JOIN purchased ON items.id=purchased.item_id WHERE `customer_id` = :id AND `bought` = 'False'"); 
                $sth->bindValue(':id', $id['id']);
                $sth->execute();
                $items= $sth->fetchAll();
                //var_dump($items);
                echo "<table>";
                if(isset($items)){
                  echo "<th>Item</th>";
                echo "<th>Topping</th>";
                echo "<th>Price</th>";
                foreach($items as $item){
                  echo "<tr>";
            //  echo "<p>"" ".$item['price']."</p>";
              echo "<td>".$item['item_name']."</td>";
              if($item['topping'] == 1){
                echo "<td>Tapioca Pearls</td>";
              }
              elseif($item['topping'] == 2){
                echo "<td>Lychee Jelly</td>";
              }
              elseif($item['topping'] == 3){
                echo "<td>Cheese Foam</td>";
              }
              echo "<td>".$item['price']."</td>";
              echo "</tr>";
                }
            }
            echo "</table>";
          }
          else{
              header("Location: homepage.php");
          }
        }  
    catch (PDOException $e) {
      echo "<p>Error: {$e->getMessage()}</p>";
    }
?>
   <form action="checkout.php" method="post">
       <div id="cart">
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
     function navigateToItemPage() {
            window.location.href = 'itemsinstore.php';
     }
    </script>
</body>
</html>