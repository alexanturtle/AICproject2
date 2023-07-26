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
    <h1 class="title">Store (Admin)</h1>
    <?php
      try {
        if (isset($_POST['password'])&& isset($_POST['username'])) {
            $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            $sth1 = $dbh->prepare("SELECT password FROM admin WHERE :username = user_name");
            $sth1->bindValue(':username', $_POST['username']);
            $sth1->execute();
            $hash = $sth1->fetch();
            if(isset($hash["password"])){
                $passwordhash = $hash["password"];
            }
            else if(!isset($_SESSION['admin'])){
                header("Location: adminlogin.php");
            }
            $password = $_POST['password'];
        }
       else if(!isset($_SESSION['admin'])){
          header("Location: adminlogin.php");
        }
        if (isset($_SESSION['admin'])) {
    ?>

    <?php
        if (password_verify($password, $passwordhash)) {
            //echo "password correct";
        }
        else {
            //echo "password incorrect";
            header("Location: adminlogin.php");
        }

        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $sth2 = $dbh->prepare("SELECT * FROM items");
        $sth2->execute();
        $items = $sth2->fetchAll();
        echo  "<form method='post'>";
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
        echo "<button type='button'><img class='adminbutton' src='add-icon.png' alt='add-button' onClick='add()' /></button>";
        echo "</div>";
        echo "</form>";
    ?>

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
<a href="logout.php">Logout</a>
<script>
    function add(){
        document.getElementById("adminedittable").innerHTML += "<input type='text' id='test' name='test' value='test'><input type='text' id='test2' name='test2' value='test2'><br>";
    }
    </script>
</body>
</html>