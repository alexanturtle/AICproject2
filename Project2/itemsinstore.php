<?php
session_start();
require_once "config.php";
?>
<html>
<head>
    <title>Store</title>
    <link rel="stylesheet" href="items.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>
<body>
<?php
    try {
    if (isset($_POST['password'])&& isset($_POST['username'])) {
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $sth1 = $dbh->prepare("SELECT password FROM customer WHERE :username = user_name");
        $sth1->bindValue(':username', $_POST['username']);
        $sth1->execute();
        $hash = $sth1->fetch();
        if(isset($hash["password"])){
            $passwordhash = $hash["password"];
        }
        else{
            header("Location: customerlogin.php");
        }
        $password = $_POST['password'];
    }
    else{
        header("Location: customerlogin.php");
    }
    if (isset($_SESSION['customer'])) {
?>
<div id="toppingpage" class="hide">
        <h1 id="itemname">Item Name</h1>
        <div id="toppingbody">
        <h2>Toppings</h2>
    <table id="toppingtable">
        <tr>
        <td><input type="checkbox" id="topping1" name="boba" value="tapioca pearls">
        <label for="topping1"> Tapioca Pearls</label><br></td>
</tr>
<tr>
        <td><input type="checkbox" id="topping2" name="jelly" value="Lychee jelly">
        <label for="topping2">Lychee Jelly</label><br></td>
</tr>
<tr>
        <td><input type="checkbox" id="topping3" name="foam" value="Cheese foam">
        <label for="topping3"> Cheese Foam</label><br></td>
</tr>
    </table>
        <button type='button' id='back' class='button' onClick='exit()'>Exit</button>
        <button type='button' id='cart' class='button' onClick='addToCart()'>Add to cart</button>
        </div>
    </div>
<?php
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $getitem = $dbh->prepare("SELECT * FROM items");
    $getitem->execute();
    $items = $getitem->fetchAll();
    echo "<div id='header'>";
    echo "<h1>Store</h1>";
    echo "<button type='button'><img class='adminbutton' src='cart-icon.png' alt='cart-button' id='cart-button' onClick='navigateToCart()' /></button>";
    echo "</div>";
    echo "<div class='itemset'>";
    foreach($items as $item){
        echo"<div class='item'>";
        if(isset($item['item_image'])){
            echo"<img src='" . $item['item_image'] . "' alt='no image' class='image'>";
        }
        if(isset($item['item_name']) && isset($item['price'])){
            echo '<p class="itemname">' . $item['item_name'] . " - $" . $item['price'] . "</p>";
        }
        $itemname = $item['item_name'];
        echo"<button type='button' id='{$item['id']}. {$item['item_name']}.{$item['category']}' class='button' onClick='topping(this.id)'>Order</button><br><br>";
        echo"</div>";
        // echo "<div id='toppingpage' class='hide'>";
        // echo "<h1>Toppings</h1>";
        // echo "<input type='checkbox' id='topping1' name='boba' value='tapioca pearls'><br>";
        // echo "<input type='checkbox' id='topping2' name='jelly' value='Lychee jelly'><br>";
        // echo "<input type='checkbox' id='topping3' name='foam' value='Cheese foam'><br>";
        // echo "<button type='button' id='back' class='button' onClick='exit()'>Exit</button>";
        // echo "<button type='button' id='cart' class='button' onClick='navigateToCart()'>Exit</button>";
        // echo "</div>";
    }
    echo "</div>";
    echo "<button type='button' id='logout' class='button' onClick='navigateToHomePage()'>Logout</button>";
    ?> 
    <!-- <button type='button' id='cart' class='button' onClick='navigateToCart()'>Go to Cart</button> -->
    <script>
    function topping(name){
        //alert("name=" + name+ " category="+ category);
        itemname = name;
        namesplit = name.split(".");
        itemid= namesplit[0];
        category= namesplit[2];
        if(category == "boba" || category == "smoothie"){
            document.getElementById("itemname").innerHTML = namesplit['1'];
            $(".hide").removeClass("hide").addClass("see");
        }
        else{
            addToCart();
        }
    }
    function exit(){
        $(".see").removeClass("see").addClass("hide");
    }
    function customAlert(message) {
            alert(message);
        }
    function addToCart() {
        customAlert("Added");
        window.location.href = 'addtocart.php?id=' + itemid;
    }
    function navigateToCart(){
        window.location.href = 'cart.php';
    }
    function navigateToHomePage(){
        window.location.href = 'homepage.php';
    }
    </script>
<?php
        }
        else {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password']) && isset($_POST['username']) && password_verify($password, $passwordhash)) {
            $_SESSION['customer'] = $_POST['username'];
            header("Location: itemsinstore.php");
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
