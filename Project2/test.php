<?php
    require_once "config.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Store (Admin)</title>
    <link rel="stylesheet" href="test.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Test page</h1>
    <?php

        // $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        // $sth2 = $dbh->prepare("SELECT * FROM items");
        // $sth2->execute();
        // $items = $sth2->fetchAll();

        // echo "<table id='adminedittable'>";
        // foreach ($items as $item) {
        //   echo "<tr id='item".$item['id']."'>";
        //   echo "<td>".$item['item_name']."</td>";
        //   echo "<td>"."$".$item['price'].""."</td>";
        //   echo "<td><button type='button'><img src='edit-icon.png' alt='edit-button' class='adminbutton' onClick='edit()'/></button></td>";
        //   echo "<td><button type='button'><img src='trash-icon.png' alt='trash-button' class='adminbutton' onClick='trash()' /></button></td>";
        //   echo "</tr>";
        // }
        // echo "</table>";
        // echo "<div id='add-button'>";
        // echo "<button type='button'><img class='adminbutton' src='add-icon.png' alt='add-button' onClick='hide()' /></button>";
        // echo "</div>";
    ?>
        <input type="text" id="test" name="test" value="test">
        <input type="text" id="test2" name="test2" value="test2">
        <div id="testcover" class="see">
            .
        </div>
        <button type='button' id='cart' onClick='edit()'>Edit</button>

        <script>
    function edit(){
      $(".see").removeClass("see").addClass("hide");
    }
    </script>
</body>
</html>