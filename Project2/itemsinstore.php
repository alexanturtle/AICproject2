<?php
session_start();
require_once "config.php";
?>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" href="items.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>
<body>
<div id="toppingpage" class="hide">
        <h1>Toppings</h1>
        <button type='button' id='back' class='button' onClick='exit()'>Exit</button>
    </div>
<?php
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $getitem = $dbh->prepare("SELECT * FROM items");
    $getitem->execute();
    $items = $getitem->fetchAll();
    echo"<p>Items</p><br>";
    foreach($items as $item){
        echo"<div class='item'>";
        if(isset($item['item_image'])){
            echo"<img src='" . $item['item_image'] . "' alt='no image' class='image'>";
        }
        if(isset($item['item_name'])){
            echo"<p>" . $item['item_name'] . "</p>";
        }
        echo"<button type='button' id='topping' class='button' onClick='topping()'>Order</button><br><br>";
        echo"</div>";
    }
    ?> 

    <script>
    function topping(){
        $(".hide").removeClass("hide").addClass("see");
    }
    function exit(){
        $(".see").removeClass("see").addClass("hide");
    }
    </script>
</body>
</html>
