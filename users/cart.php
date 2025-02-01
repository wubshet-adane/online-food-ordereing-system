<?php
session_start();
include('../include/connection.php');
// Redirect if not logged in
if (!isset($_SESSION['user_loggedin']) || !isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
/*
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userID = $_SESSION['user_id'];
    $foodID = $_POST['food_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Check if the item is already in the cart
    $query = "SELECT * FROM Cart WHERE UserID = ? AND FoodID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ii', $userID, $foodID);
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Update quantity if item exists
        $updateQuery = "UPDATE Cart SET Quantity = Quantity + ? WHERE UserID = ? AND FoodID = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param('iii', $quantity, $userID, $foodID);
        $updateStmt->execute();
    } else {
        // Insert new item
        $insertQuery = "INSERT INTO Cart (UserID, FoodID, Quantity, Price) VALUES (?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param('iiid', $userID, $foodID, $quantity, $price);
        $insertStmt->execute();
    }

    // Free the result set and close the statement after usage
    $stmt->free_result(); // Free result set to prevent "out of sync" error
    $stmt->close();       // Close the prepared statement
    
    header("Location: cart.php");
    exit();
}
    */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="../css/cart.css">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
    </style>
</head>
<body>
    <!-- Navbar with Cart Badge -->
    <nav>
        <div class="nav-logo"><a href="../index.php">DMU Food Ordering System</a></div>
        <h1 class="animated-title"><a href=""><?php echo $_SESSION['firstName'] . ' ' . $_SESSION['lastName'];?></a></h1>
        <div class="cart-icon">
            <a href="cart.php">
                <i class="bi bi-cart-check-fill" style="position:relative; font-size:24px;">
                    <span>
                        <?php
                        $userID = $_SESSION['user_id'];
                        $query = "SELECT SUM(Quantity) AS totalItems FROM Cart WHERE UserID = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param('i', $userID);
                        $stmt->execute();
                        $stmt->bind_result($totalItems);
                        $stmt->fetch();
                        $stmt->free_result(); // Free result set after use
                        $stmt->close(); // Close the statement
                        echo $totalItems ? $totalItems : 0;
                        ?>
                    </span>
                </i>
            </a>
        </div>
    </nav>
    <?php 
        if($totalItems > 0){
            echo '<h4>You Have Some Food Items At Your Cart, Please Check Carefuly And Order The Item............</h4>';
        }
    ?>
    <!-- Cart Items -->
    <div class="cart-container">
        <?php
        $userID = $_SESSION['user_id'];
        $query = "SELECT Cart.*, Food.Name, Food.imageURL FROM Cart JOIN Food ON Cart.FoodID = Food.FoodID WHERE UserID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $totalPrice = 0;
        while ($row = $result->fetch_assoc()) {
            $itemTotal = $row['Quantity'] * $row['Price'];
            $totalPrice += $itemTotal;
            echo "
            <div class='cart-item'>
                <div class='image'>
                    <img src='../{$row['imageURL']}' alt='Food Image'>
                </div>
                <div class='details'>
                    <h4><b>Food Name </b></h4>
                    <p> {$row['Name']}</p>
                    <h4><b>Price (ዋጋ) </b></h4>
                    <p class='price'>ETB {$row['Price']}</p>
                    <h4><b>Total Price (ጠቅላላ ዋጋ) </b></h4>
                    <p class='total'>ETB {$itemTotal}</p>
                    <form action='update_cart.php' method='POST'>
                        <input type='hidden' name='cart_id' value='{$row['CartID']}'>
                        <input type='number' name='quantity' value='{$row['Quantity']}' min='1'>
                        <button type='submit' class='btn btn-success'>Update</button>
                    </form>
                </div>
                <div class='actions'>
                    <form action='remove_cart.php' method='POST'>
                        <input type='hidden' name='cart_id' value='{$row['CartID']}'>
                        <button type='submit' class='remove'>Remove</button>
                    </form>
                </div>
            </div>";
        }
        ?>
        <?php
            if($totalItems > 0){
        ?>
                <div class="total-price">
                    <span>Total:</span>
                    <span class="totalprice"><?php echo number_format($totalPrice, 2); ?> <i>birr</i></span>
                </div>
                <button class="btn-checkout" id="btn-checkout">Proceed to Order</button>
                <div id="overlay"></div>
                <div class="orderMethod" id="orderMethod">
                    <p>Order Methods</p>
                    <small>Order or proceed with your payment using one of the following methods:</small>
                    <pre>Select one way as you wish to pay:</pre>
                    <div class="payment-button">
                        <div class="paymentBTN" id="paymentAPI">
                            <a href="#" class="btn-checkout" title="Pay with Tele-BIRR, mPesa, Chapa, AboPay, santimPay, etc.">Payment API</a>
                        </div>
                        <div class="paymentBTN" id="countDown">
                            <a href="#" class="btn-checkout" title="pay from your stored money at our cafe">Countdown</a>
                        </div>
                    </div>
                </div>    
        <?php
            }else{
        ?>
                <div>
                    <p>your cart is empty!</p>
                    <p> Do You Wanna Add Our Amazing Food ? <a href="../index.php">here</a> </p>
                    <p> How to add products to our cart ? <a href="..help.php">Help</a> </p>
                </div>
        <?php
            }
        ?>
    </div>
            <script>
                // JavaScript to toggle the order modal
                document.getElementById('btn-checkout').addEventListener('click', function (e) {
                    e.preventDefault();
                    document.getElementById('orderMethod').style.display = 'block';
                    document.getElementById('overlay').style.display = 'block';
                });
                // JavaScript to close the modal when clicking outside
                document.getElementById('overlay').addEventListener('click', function () {
                    document.getElementById('orderMethod').style.display = 'none';
                    this.style.display = 'none';
                });
            </script>
</body>
</html>
