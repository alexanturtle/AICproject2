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
<title>Checkout Page</title>
    <link rel="stylesheet" href="cart.css">
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
