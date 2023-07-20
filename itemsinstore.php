<?php
session_start();
require_once "config.php";
?>
<html>
<head>
    <title>Parkamon Game</title>
</head>
<body>
<?php
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $getitem = $dbh->prepare("SELECT * FROM items");
    $getitem->execute();
    $items = $getitem->fetchAll();
    //var_dump($items);
    echo"<p>Items</p><br>";
    foreach($items as $item){
        //var_dump($item);
        echo"<div class='item'>";
        if(isset($item['item_image'])){
            echo"<img src='" . $item['item_image'] . "' alt='no image'>";
        }
        if(isset($item['item_name'])){
            echo"<p>" . $item['item_name'] . "</p><br>";
        }
        //echo"heyy";
        echo"</div>";
    }
    ?> 
</body>
</html>