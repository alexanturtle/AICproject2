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
<!-- this it the checkout page, which shows up after you buy items to confirm your purchase -->
    <?php
        try{
            $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            if(isset($_SESSION['customer'])){
                $user = $dbh->prepare("SELECT `id` FROM customer WHERE `user_name` = :user"); 
                $user->bindValue(':user', $_SESSION['customer']);
                $user->execute();
                $id= $user->fetch();

                $buy = $dbh->prepare("UPDATE `purchased` SET `bought` = 'True' WHERE `customer_id` = :id");
                $buy->bindValue(':id', $id['id']);
                $buy->execute();
            }
            else{
                header("Location: homepage.php");
            }
        }
        catch (PDOException $e) {
            echo "<p>Error: {$e->getMessage()}</p>";
          }
    ?>
    <h1>You have purchased your items</h1>
    <img id = "image" src="download.png" alt="boba"><br>
    <p>Come back again soon</p><br>
    <button type='button' id='logout' class='button' onClick='navigateToHomePage()'>Logout</button>
</body>
<script>
    function navigateToHomePage() {
            window.location.href = 'homepage.php';
    }
    </script>
</html>
<!-- //<body> -->
<!-- <title>Checkout Page</title>
    <link rel="stylesheet" href="cart.css">
//     try {
//         $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
//         $sth = $dbh->prepare("SELECT * FROM purchased"); 
//         $result = $sth->execute();
//         if ($result->rowCount() > 0) {
//             echo "<h1>You have purchased your items!</h1>";
//             echo "<img id = 'image' src='download.png' alt='boba'><br>";
//             echo "<p>Come back again soon</p><br>";
//             echo "<button type='button' id='logout' class='button' onClick='navigateToHomePage()'>Logout</button>";
//         } else {
//             echo "<h1>You have no items in cart to purchase</h1>";
//             echo "<img id = 'image' src='sadbob.png' alt='boba'><br>";
//             echo "<button type='button' id='items' class='button' onClick='navigateToItemsPage()'>Back to Items</button>";
//             echo "<button type='button' id='logout' class='button' onClick='navigateToHomePage()'>Logout</button>";
//         }
//         }catch (PDOException $e) {
//       echo "<p>Error: {$e->getMessage()}</p>";
//   }
// ?> -->
<!-- <h1>You have purchased your items!</h1>
<img id = "image" src="download.png" alt="boba"><br>
<p>Come back again soon</p><br>
<button type='button' id='logout' class='button' onClick='navigateToHomePage()'>Logout</button>
</body>
<script>
    function navigateToHomePage() {
            window.location.href = 'homepage.php';
    }
    function navigateToItemsPage() {
            window.location.href = 'itemsinstore.php';
    </script>  -->
</html>