<?php
    require_once "config.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Store (Admin)</title>
    <link rel="stylesheet" href="items.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Store (Admin)</h1>
    <?php
      try {
        if (isset($_POST['password'])&& isset($_POST['username'])) {
            $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            $sth1 = $dbh->prepare("SELECT password FROM admin WHERE :username = user_name");
            $sth1->bindValue(':username', $_POST['username']);
            $sth1->execute();
            $hash = $sth1->fetch();
            //$userpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            if(isset($hash["password"])){
                $passwordhash = $hash["password"];
            }
            else{
                header("Location: adminlogin.php");
            }
            $password = $_POST['password'];
        }
       else{
          header("Location: adminlogin.php");
        }
        if (isset($_SESSION['admin'])) {
    ?>

    <?php
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $sth2 = $dbh->prepare("SELECT * FROM items");
        $sth2->execute();
        $items = $sth2->fetchAll();

        echo "<table id='adminedittable'>";
        foreach ($items as $item) {
          echo "<tr id='item".$item['id']."'>";
          echo "<td>".$item['item_name']."</td>";
          echo "<td>"."$".$item['price'].""."</td>";
          echo "<td><button type='button'><img src='edit-icon.png' alt='edit-button' class='adminbutton' onClick='edit()'/></button></td>";
          echo "<td><button type='button'><img src='trash-icon.png' alt='trash-button' class='adminbutton' onClick='trash()' /></button></td>";
          echo "</tr>";
        }
        echo "</table>";
        echo "<div id='add-button'>";
        echo "<button type='button'><img class='adminbutton' src='add-icon.png' alt='add-button' onClick='hide()' /></button>";
        echo "</div>";
    ?>

    <!-- <div id="toppingpage" class="hide">
        <h1 id="itemname">Item Name</h1>
        <h2>Toppings</h2>
        <input type="checkbox" id="topping1" name="boba" value="tapioca pearls">
        <label for="topping1"> Tapioca Pearls</label><br>
        <input type="checkbox" id="topping2" name="jelly" value="Lychee jelly">
        <label for="topping2">Lychee Jelly</label><br>
        <input type="checkbox" id="topping3" name="foam" value="Cheese foam">
        <label for="topping3"> Cheese Foam</label><br>
        <button type='button' id='back' class='button' onClick='exit()'>Exit</button>
        <button type='button' id='cart' class='button' onClick='addToCart()'>Add to cart</button>
    </div>
    <?php
      // $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
      // $getitem = $dbh->prepare("SELECT * FROM items");
      // $getitem->execute();
      // $items = $getitem->fetchAll();
      // echo "<div class='itemset'>";
      // foreach($items as $item){
      //     echo"<div class='item'>";
      //     if(isset($item['item_image'])){
      //         echo"<img src='" . $item['item_image'] . "' alt='no image' class='image'>";
      //     }
      //     if(isset($item['item_name'])){
      //         echo '<p class="itemname">' . $item['item_name'] . "</p>";
      //     }
      //     $itemname = $item['item_name'];
      //     echo"<button type='button' id='{$item['item_name']}' class='button' onClick='topping(this.id)'>Order</button><br><br>";
      //     echo"</div>";
      // }
      // echo "</div>";
      ?> 
      <button type='button' id='cart' class='button' onClick='navigateToCart()'>Go to Cart</button>
      <script>
      function topping(name){
          $(".hide").removeClass("hide").addClass("see");
          document.getElementById("itemname").innerHTML = name;
      }
      function exit(){
          $(".see").removeClass("see").addClass("hide");
      }
      let cart = [];
      function addToCart() {
      const productName = $itemname;

      const product = {
          name: productName,
      };
      cart.push(product);
      alert("Product added to cart!");
      }
      function navigateToCart(){
          window.location.href = 'cart.php';
      }
      </script> -->

      <?php
          }
          else {
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password']) && isset($_POST['username']) && password_verify($password, $passwordhash)) {
                $_SESSION['admin'] = $_POST['username'];
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