<?php
require_once "config.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>New Account Page</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>
  <!-- this is the page where a new customer account is created -->
    <?php
    try {
      $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        //var_dump($_POST);
        if(isset($_POST['username']) && isset($_POST['password'])){
          $get = $dbh->prepare("SELECT user_name FROM customer"); 
          $get->execute();
          $users= $get->fetchAll();
          //var_dump($users);
          $exist = False;
          // here we check if the username that the user inputed already exists
          foreach($users as $user){
            if($_POST['username'] == $user["user_name"]){
              $exist = True;
            }
          }
          //we make sure that the username doesn't already exist before creating the user
          if(!$exist){
            $sth = $dbh->prepare("INSERT INTO customer (`user_name`, `password`, `real_pass`) VALUES (:name, :password, :real_pass)"); 
            $sth->bindValue(":name", $_POST['username']);
            $sth->bindValue(":password", $hashedPassword);
            $sth->bindValue(":real_pass", $_POST['password']);
            $sth->execute();
            echo "<p>Customer added!</p><br>";
            echo "<img id = 'image' src='bob.png' alt='boba'><br>";
            echo "<a class='logoutbutton' href='customerlogin.php'>Log In</a>";
          }
          else{
            echo "<p>This username already exists ya dumbo</p><br>"; //this is if the user already exists
            echo "<img id = 'image' src='damn.gif' alt='boba'><br>";
            echo "<a class='logoutbutton' href='newcustomer.php'>Back</a>";
          }
        }
        else{
          echo "<p>Invalid username or password<p><br>"; //if something the user inputed is invalid
          echo "<img id = 'image' src='bob.png' alt='boba'><br>";
          echo "<a class='logoutbutton' href='newcustomer.php'>Back</a>";

        }
        }catch (PDOException $e) {
      echo "<p>Error: {$e->getMessage()}</p>";
  }
?>

</body>
</html>