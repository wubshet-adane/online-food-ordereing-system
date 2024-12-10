<?php
session_start();
include('../include/connection.php');

// Redirect if not logged in
if (!isset($_SESSION['user_loggedin']) || !isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

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

    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="../css/cart.css">
</head>
<body>
    <!-- Navbar with Cart Badge -->
    <nav>
        <div class="nav-logo">FoodStore</div>
        <div class="cart-icon">
            <a href="cart.php">
                <i class="fa fa-shopping-cart"></i>
                <span id="cart-count" class="badge">
                    <?php 
                    $userID = $_SESSION['user_id'];
                    $query = "SELECT SUM(Quantity) AS totalItems FROM Cart WHERE UserID = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param('i', $userID);
                    $stmt->execute();
                    $stmt->bind_result($totalItems);
                    $stmt->fetch();
                    echo $totalItems ? $totalItems : 0;
                    ?>
                </span>
            </a>
        </div>
    </nav>

    <!-- Cart Table -->
    <div class="cart-container">
        <h1>Your Cart</h1>
        <table>
            <thead>
                <tr>
                    <th>Food Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $userID = $_SESSION['user_id'];
                $query = "SELECT Cart.*, Food.Name FROM Cart JOIN Food ON Cart.FoodID = Food.FoodID WHERE UserID = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('i', $userID);
                $stmt->execute();
                $result = $stmt->get_result();

                $totalPrice = 0;
                while ($row = $result->fetch_assoc()) {
                    $itemTotal = $row['Quantity'] * $row['Price'];
                    $totalPrice += $itemTotal;
                    echo "
                    <tr>
                        <td>{$row['Name']}</td>
                        <td>{$row['Quantity']}</td>
                        <td>\${$row['Price']}</td>
                        <td>\${$itemTotal}</td>
                        <td>
                            <form action='update_cart.php' method='POST'>
                                <input type='hidden' name='cart_id' value='{$row['CartID']}'>
                                <input type='number' name='quantity' value='{$row['Quantity']}' min='1'>
                                <button type='submit' class='btn-update'>Update</button>
                            </form>
                            <form action='remove_cart.php' method='POST'>
                                <input type='hidden' name='cart_id' value='{$row['CartID']}'>
                                <button type='submit' class='btn-remove'>Remove</button>
                            </form>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <h2>Total: $<?php echo number_format($totalPrice, 2); ?></h2>
        <a href="checkout.php" class="btn-checkout">Proceed to Checkout</a>
    </div>
</body>
</html>
