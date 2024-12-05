
<?php
session_start();
include('../include/connection.php');

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
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
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
            <!-- Dynamic rows from back-end -->
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
                            <button type='submit'>Update</button>
                        </form>
                        <form action='remove_cart.php' method='POST'>
                            <input type='hidden' name='cart_id' value='{$row['CartID']}'>
                            <button type='submit'>Remove</button>
                        </form>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
    <h2>Total: $<?php echo $totalPrice; ?></h2>
    <a href="checkout.php">Proceed to Checkout</a>
</body>
</html>
