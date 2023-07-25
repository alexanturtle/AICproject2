<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cart Page</title>
</head>
<body>
    <h1>Cart</h1>
    <form action="checkout.php" method="post">
=          <div id = "cart">
            <br><br>
           
            <button type='button' id='checkout' class='button' onClick='navigateToCheckout()'>Buy</button><br>
            <button type='button' id='logout' class='button' onClick='navigateToItemPage()'>Back to Items</button> <button type='button' id='checkout' class='button' onClick='navigateToCheckout()'>Buy</button><br>
            <button type='button' id='logout' class='button' onClick='navigateToHomePage()'>Logout</button>
            <br><br>
          </div>
    </form>
    <script>
    function navigateToCheckout() {
            window.location.href = 'checkout.php';
     }
    function navigateToHomePage() {
            window.location.href = 'homepage.php';
     }
     function navigateToItemPage() {
            window.location.href = 'itemsinstore.php';
     }
    </script>
</body>
</html>