<nav class="topnav" id="topnav">
    <!-- Toggler/collapsing button for mobile -->
    <button class="navbar-toggler" type="button" onclick="toggleNavbar()">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar links container (collapsed on mobile) -->
    <div class="navbar-collapse" id="navbarNav">
        <ul class="navbar-nav"> <!-- This centers the links on larger screens -->
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="services.php">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contactus</a>
            </li>
            <li class="nav-item" >
                <a class="nav-link" href="users/cart.php">
                    <i class="bi bi-cart-plus" style="position:relative; font-size:24px;">
                        <?php if(isset($_SESSION['user_loggedin'])){
                                echo  ' <span style="   position: absolute;
                                        top: -5px;
                                        right: -5px;
                                        background-color: #EEFF00FF;
                                        color: #111111;
                                        font-size: 12px;
                                        font-weight: bold;
                                        width: 20px;
                                        height: 20px;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        border-radius: 50%;
                                        border: 1px solid #652121FF;">
                                    ';

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
                                echo '</span>';
                            }
                        ?>
                    </i>
                    Cart
                </a>
            </li>
        </ul>
    </div>
    <button onclick="dropdownscript()" class="dropDownButton">
      <p class="user-image" href="#" id="userMenuToggle">
          <?php
          //if useer loggedin
          if (isset($_SESSION['user_loggedin'])) {
            //if user have profile image
            if(isset($_SESSION['image'])){
            ?>
                <img src="<?php echo $_SESSION['image'];?>" title="<?php echo $_SESSION['firstName'].' ' . $_SESSION['lastName']; ?>" alt='User Img' style="width: 50px; height: 50px; border-radius:50%;">
            <?php
            }
            //if user have not profile imaage
            else {
                if($_SESSION['sex'] == 'Male'){
                    ?>
                        <img src="images/male.jpg" title="<?php echo $_SESSION['firstName'].' ' . $_SESSION['lastName']; ?>" alt='User Img1' style="width: 50px; height: 50px; border-radius:50%;">
                    <?php
                }
                else{
                    ?>
                        <img src="images/female.jpg" title="<?php echo $_SESSION['firstName'].' ' . $_SESSION['lastName']; ?>" alt='User Img2' style="width: 50px; height: 50px; border-radius:50%;">
                    <?php
                }
            }

          }
          //if user not loggedin
          else {
              echo '<span class="dropdownLink text-decoration-none nav-link" style="text-align:center; font-family:Impact, Haettenschweiler, sans-serif; font-size:smaller;">Login &nbsp;</span>';
          }
          ?>
      </p>
    </button>
    <?php if (!isset($_SESSION['user_loggedin'])) { ?>
    <p>
        <a href="users/register.php"> <span class="dropdownLink text-decoration-none nav-link" style="text-align:center; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; font-size:smaller;"> signUp</span></a>
    </p>
    <?php } ?>
    <!-- Dropdown menu for logged-in users -->
    <div class="" id="userDropdown">
        <?php if (isset($_SESSION['user_loggedin'])): ?>
            <div class="" aria-labelledby="userMenuToggle">
                <?php
                    if($_SESSION['image']>=1){
                        ?>
                            <img src="<?php echo $_SESSION['image'];?>" title="<?php echo $_SESSION['firstName'].' ' . $_SESSION['lastName']; ?>" alt='profile' style="width: 100px; height: 100px; border-radius:50%;">
                        <?php
                        }
                        //if user ha not profile imaage
                        else {
                            if($_SESSION['sex'] == 'Male'){
                                ?>
                                    <a href="users/editUserProfile.php"><img src="images/male.jpg" title="<?php echo $_SESSION['firstName'].' ' . $_SESSION['lastName']; ?>" alt='User Img1' style="width: 100px; height: 100px; border-radius:50%;"></a>
                                <?php
                            }
                            else{
                                ?>
                                    <a href="users/editUserProfile.php"><img src="images/female.jpg" title="<?php echo $_SESSION['firstName'].' ' . $_SESSION['lastName']; ?>" alt='User Img2' style="width: 100px; height: 100px; border-radius:50%;"></a>
                              <?php
                            }
                        }
                ?>
                <h3 class="text-white"><?php echo $_SESSION['firstName']. ' ' . $_SESSION['lastName']; ?></h3>
                <hr>
                <a class="dropdownLink" href="users/profile.php"><i class="bi bi-person-fill"></i> Profile</a>
                <a class="dropdownLink" href="users/order.php"><i class="bi bi-basket2-fill"></i> Ordered Food</a>
                <a class="dropdownLink" href="users/checkout.php"><i class="bi bi-cash-coin"></i> CashOut</a>
                <a class="dropdownLink" href="users/cart.php"><i class="bi bi-cart-plus-fill"></i> Cart</a>
                <a class="dropdownLink" href="terms and conditions.php"><i class="bi bi-cart-plus-fill"></i> terms and conditions...</a>
                <a class="dropdownLink" href="help.php"><i class="bi bi-question-circle"></i> Help</a>
                <a class="dropdownLink" href="users/logout.php" style="text-align:center;"><i class="bi bi-box-arrow-right"></i> Logout</a>
            </div>
        <?php else: ?>
            <div class="" aria-labelledby="userMenuToggle">
                <a class="dropdownLink" href="users/login.php"><i class="bi bi-person-fill"></i> Profile</a>
                <a class="dropdownLink" href="terms and conditions.php"><i class="bi bi-cart-plus-fill"></i> terms and conditions...</a>
                <a class="dropdownLink" href="help.php"><i class="bi bi-question-circle"></i> Help</a>
                <a class="dropdownLink" href="users/login.php" style="text-align:center;"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </div>
        <?php endif; ?>

    </div>
</nav>
