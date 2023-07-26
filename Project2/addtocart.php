
<?php
require_once "config.php";
session_start();
?>
<!DOCTYPE html>
<html>
<body>
    <?php
    try {
        // if (isset($_POST['password'])&& isset($_POST['username'])) {
        //     $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        //     $sth1 = $dbh->prepare("SELECT password FROM customer WHERE :username = user_name");
        //     $sth1->bindValue(':username', $_POST['username']);
        //     $sth1->execute();
        //     $hash = $sth1->fetch();
        //     if(isset($hash["password"])){
        //         $passwordhash = $hash["password"];
        //     }
        //     else{
        //         header("Location: customerlogin.php");
        //     }
        //     $password = $_POST['password'];
        // }
        // else{
        //     header("Location: customerlogin.php");
        // }
        if (isset($_SESSION['customer'])) {


            $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            if(isset($_GET['id']) && isset($_SESSION['customer'])){
                $itemid = $_GET['id'];
                $get = $dbh->prepare("SELECT id FROM customer WHERE user_name = :name"); 
                $get->bindValue(":name", $_SESSION['customer']);
                $get->execute();
                $user= $get->fetchAll();
                $userid = $user[0]['id'];
                //echo $userid;
                $sth = $dbh->prepare("INSERT INTO purchased (`customer_id`, `item_id`, `bought`) VALUES (:customer, :item, 'False')"); 
                $sth->bindValue(":customer", $userid);
                $sth->bindValue(":item", $itemid);
                $sth->execute();
            echo "<br>Added to cart!<br>";
            echo "<a href='itemsinstore.php'>Back</a>";
            header("Location: itemsinstore.php");
            }
            else{
                header("Location: itemsinstore.php");
            }

            
        }
        // else {
        // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password']) && isset($_POST['username']) && password_verify($password, $passwordhash)) {
        //     $_SESSION['customer'] = $_POST['username'];
        //     header("Location: addtocart.php");
        // }
        else {
            header("Location: customerlogin.php");
        }
        // }
    }
    catch (PDOException $e) {
      echo "<p>Error: {$e->getMessage()}</p>";
    //   header("Location: itemsinstore.php");
    }
?>
</body>
</html>