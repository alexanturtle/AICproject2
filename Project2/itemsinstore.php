<?php
session_start();
require_once "config.php";
?>
<html>
<head>
    <title>Items</title>
    <link rel="stylesheet" href="items.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>
<body>
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
    echo"<h1>Store</h1><br>";
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
        $item_category = $item['category'];
        echo"<button type='button' id='{$item['id']}. {$item['item_name']}' class='button' onClick='topping(this.id, this.category)'>Order</button><br><br>";
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
    ?> 
    <button type='button' id='cart' class='button' onClick='navigateToCart()'>Go to Cart</button>
    <script>
    function topping(name, category){
        //alert("name=" + name+ " category="+ category);
        //$(".hide").removeClass("hide").addClass("see");
        document.getElementById("itemname").innerHTML = name;
        document.getElementById("item_category").innerHTML = category;
        itemname = name;
        item_category = category;
        if(item_category.equals("boba")){
            $(".hide").removeClass("hide").addClass("see");
            namesplit = name.split(".");
            itemid= namesplit[0];
        }else{
            addToCart();
        }
    
    }
    function exit(){
        $(".see").removeClass("see").addClass("hide");
    }

    function addToCart() {
        // alert(itemname);
        window.location.href = 'addtocart.php?id=' + itemid;
    }

    function navigateToCart(){
        window.location.href = 'cart.php';
    }
    </script>
</body>
</html>
