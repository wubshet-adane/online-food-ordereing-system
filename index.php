<?php
session_start();
include "include/connection.php";

$search = '';
if (isset($_POST['search']) && !empty($_POST['search'])) {
    $search = htmlspecialchars($_POST['search']);
    $stmt = $conn->prepare("SELECT * FROM food WHERE Name LIKE ? OR Description LIKE ? OR Catagory LIKE ? OR AvailabilityStatus LIKE ?");
    $searchTerm = "%$search%";
    $stmt->bind_param("ssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM food";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Page</title>
    <!-- external CSS -->
     <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/topnav.css">
        <!--google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sixtyfour+Convergence&display=swap" rel="stylesheet">

    <style>
      
    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- Header Section -->
        <?php
            include 'header.php';
        ?>
        <!--re+commendation section-->
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button">
                        Recommendation Based on Your Order History:
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body text-center text-danger">
                        !!!!there are no recommondation!!!!!!
                    </div>
                </div>
            </div>
           
        </div>
        <!-- Filter Section -->
        <section class="filter-section">
            <label for="categories" class="me-2">Categories:</label>
            <select id="categories" class="filter-form-select">
                <option value="all">All</option>
                <option value="soups">Fasting food (የጾም ምግቦች)</option>
                <option value="soups">Fast food (ፈጣን ምግቦች)</option>
                <option value="salads">Rich Food (የፍስክ ምግቦች)</option>
                <option value="drinks">Drinks</option>
                <option value="drinks">Hot Drinks(ሻይ፣ ቡና፣ ወተት፣ ....)</option>
                <option value="appetizers">Vegitables</option>
                <option value="desserts">Desserts</option>
                <option value="others">Others</option>
            </select>
            <label for="sort" class="me-2">Sort By:</label>
            <select id="sort" class="filter-form-sort">
                <option value="name_asc">Name: A to Z</option>
                <option value="name_desc">Name: Z to A</option>
                <option value="price_low_high">Price: Low to High</option>
                <option value="price_high_low">Price: High to Low</option>
            </select>
        </section>

        <!-- Menu Section -->
        <div id="menu-items" class="menu-container">
            <!-- Soups Section -->
            <section class="menu-category" id="soups">
                <h2 class="text-center my-4">Soups</h2>
                <div class="row g-3">
                    <?php
                        $category = "Soups"; // Corrected variable name spelling
                        $stmt = $conn->prepare("SELECT * FROM food WHERE Category = ?");
                    // Check if the statement was prepared successfully
                        if ($stmt) {
                            $stmt->bind_param("s", $category);
                            $stmt->execute();

                            // Get the result
                            $result = $stmt->get_result();

                            // Check if there are rows and fetch them
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                <div class="col-sm-6">
                                    <div class="card h-100" data-category="soups" data-price="<?php echo $row['Price']; ?>">
                                        <img src="<?php echo $row['ImageURL'] ?>" class="card-img-top img-fluid" alt=" <?php echo $row['Name']?> ">
                                        <div class="card-body">
                                            <h5 class="card-title fw-semibold"> <?php echo $row['Name']?> </h5>
                                            <p class="card-text"> <?php echo $row['Description']?> </p>
                                            <p class="card-text"><strong> <?php echo $row['Price']?> birr </strong></p>
                                            <div class="d-flex align-items-center mb-3">
                                                <label for="quantity-salad1" class="me-2 mb-0">Quantity:</label>
                                                <div class="input-group w-40">
                                                    <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="decrementQuantity('<?php echo ''; ?>')">−</button>
                                                    <input id="quantity-salad2" type="text" class="form-control text-center" value="1" min="1" max="10" style="max-width:50px;">
                                                    <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="incrementQuantity('quantity-salad2')"><i class="bi bi-caret-right-square"></i></button>
                                                </div>
                                            </div>
                                            <div class="mt-auto d-flex justify-content-between">
                                                <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="add to cart">
                                                    <i class="bi bi-cart3 "></i>
                                                </button>
                                                <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="read more">
                                                    View More
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                            } else {
                                echo "<p style='color:red;'>No results found for the selected category.</p>";
                            }

                            // Close the statement
                            $stmt->close();
                        } else {
                            echo "<p style='color:red;'>Error in preparing the statement:</p> ";
                        }
                    ?>
                </div>
            </section>

            <!-- Salads Section -->
            <section class="menu-category" id="salads">
                <h2 class="text-center my-4">Salads</h2>
                <div class="row g-3">
                            
                    <?php
                        $catagory = "Salad";
                        $stmt = $conn -> prepare("SELECT * FROM food WHERE Category = ?");
                        //check if the statement was prepare successfuly
                        if($stmt){
                            $stmt -> bind_param("s", $catagory);
                            $stmt -> execute();
                            $result = $stmt -> get_result();
                            //check if there are the value in the table or not
                            if($result -> num_rows > 0){
                                while($row = $result -> fetch_assoc()){
                                ?>

                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                        <div class="card h-100" data-category="soups" data-price="<?php echo $row['Price']; ?>">
                                            <img src="<?php echo $row['ImageURL'] ?>" class="card-img-top img-fluid" alt=" <?php echo $row['Name']?> ">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title fw-semibold"> <?php echo $row['Name']?> </h5>
                                                <p class="card-text"> <?php echo $row['Description']?> </p>
                                                <p class="card-text"><strong> <?php echo $row['Price']?> birr </strong></p>
                                                <div class="d-flex align-items-center mb-3">
                                                    <label for="quantity-salad1" class="me-2 mb-0">Quantity:</label>
                                                    <div class="input-group w-40">
                                                        <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="decrementQuantity('<?php echo ''; ?>')">−</button>
                                                        <input id="quantity-salad2" type="text" class="form-control text-center" value="1" min="1" max="10" style="max-width:50px;">
                                                        <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="incrementQuantity('quantity-salad2')"><i class="bi bi-caret-right-square"></i></button>
                                                    </div>
                                                </div>
                                                <div class="mt-auto d-flex justify-content-between">
                                                    <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="add to cart">
                                                        <i class="bi bi-cart3 "></i>
                                                    </button>
                                                    <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="read more">
                                                        View More
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                <?php
                                    }
                                } else {
                                    echo "<p style='color:red;'>No results found for the selected category.</p>";
                                }

                                // Close the statement
                                $stmt->close();
                            } else {
                                echo "<p style='color:red;'>Error in preparing the statement:</p> ";
                            }
                        ?>
                    </div>
            </section>
            <!-- fasting food Section -->
            <section class="menu-category" id="Fasting-food">
            <h2 class="text-center my-4">Fasting-foods</h2>
            <div class="row g-3">       
                <?php
                    $catagory = "Fasting-food";
                    $stmt = $conn -> prepare("SELECT * FROM food WHERE Category = ?");
                    //check if the statement was prepare successfuly
                    if($stmt){
                        $stmt -> bind_param("s", $catagory);
                        $stmt -> execute();
                        $result = $stmt -> get_result();
                        //check if there are the value in the table or not
                        if($result -> num_rows > 0){
                            while($row = $result -> fetch_assoc()){
                            ?>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="card h-100" data-category="soups" data-price="<?php echo $row['Price']; ?>">
                                        <img src="<?php echo $row['ImageURL'] ?>" class="card-img-top img-fluid" alt=" <?php echo $row['Name']?> ">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title fw-semibold"> <?php echo $row['Name']?> </h5>
                                            <p class="card-text"> <?php echo $row['Description']?> </p>
                                            <p class="card-text"><strong> <?php echo $row['Price']?> birr </strong></p>
                                            <div class="d-flex align-items-center mb-3">
                                                <label for="quantity-salad1" class="me-2 mb-0">Quantity:</label>
                                                <div class="input-group w-40">
                                                    <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="decrementQuantity('<?php echo ''; ?>')">−</button>
                                                    <input id="quantity-salad2" type="text" class="form-control text-center" value="1" min="1" max="10" style="max-width:50px;">
                                                    <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="incrementQuantity('quantity-salad2')"><i class="bi bi-caret-right-square"></i></button>
                                                </div>
                                            </div>
                                            <div class="mt-auto d-flex justify-content-between">
                                                <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="add to cart">
                                                    <i class="bi bi-cart3 "></i>
                                                </button>
                                                <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="read more">
                                                    View More...
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                            <?php
                                }
                            } else {
                                echo "<p style='color:red;'>No results found for the selected category.</p>";
                            }

                            // Close the statement
                            $stmt->close();
                        } else {
                            echo "<p style='color:red;'>Error in preparing the statement:</p> ";
                        }
                    ?>
                </div>
            </section>
        </div>

    </div>
    <!-- quantity increament and decreament-->
    <script src="javascript/addPrice.js"></script>
    <!-- bg image toogler-->
    <script src="javascript/bg toogler.js"></script>
    <script src="javascript/searchingAndSorting.js"></script>
    <script>
        function toggleNav() {
            document.querySelector(".navbar").classList.toggle("show");
        }
    </script>
</body>
</html>
