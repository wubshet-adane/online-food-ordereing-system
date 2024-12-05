<nav class="navbar navbar-expand-lg navbar-light topnav">
    <!-- Toggler/collapsing button for mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links container (collapsed on mobile) -->
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto"> <!-- This centers the links on larger screens -->
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-cart-plus"></i></a>
            </li>
        </ul>
    </div>
    <button onclick="dropdownscript()" class="dropDownButton">
      <a class="d-flex align-items-center" href="#" id="userMenuToggle">
          <?php
          if (isset($_SESSION['user_loggedin'])) {
            if($_SESSION['image']>=1){
            ?>
                <img src="<?php echo $_SESSION['image'];?>" title="<?php echo $_SESSION['firstName'].' ' . $_SESSION['lastName']; ?>" alt='User Image' style="width: 50px; height: 50px; border-radius:50%;">
            <?php
            } else {
                echo '<i class="bi bi-person-circle"></i>';
            }


          } else {
              echo '<span class="dropdownLink text-decoration-none nav-link" href="logout.php" style="text-align:center;"><i class="bi bi-box-arrow-left"></i> Login</span>';
          }
          ?>
      </a>
    </button>
    <!-- Dropdown menu for logged-in users -->
    <div class="" id="userDropdown">
        <?php if (isset($_SESSION['user_loggedin'])): ?>
            <div class="" aria-labelledby="userMenuToggle">
                <img src="<?php echo $_SESSION['image'];?>" class="dropdown-item" style="width: 50px; height: 50px; border-radius:50%;" />
                <h3 class="text-white"><?php echo $_SESSION['firstName']. ' ' . $_SESSION['lastName']; ?></h3>
                <hr>
                <a class="dropdownLink" href="#"><i class="bi bi-person-fill"></i> Profile</a>
                <a class="dropdownLink" href="#"><i class="bi bi-basket2-fill"></i> Ordered Food</a>
                <a class="dropdownLink" href="#"><i class="bi bi-cash-coin"></i> CashOut</a>
                <a class="dropdownLink" href="#"><i class="bi bi-cart-plus-fill"></i> Cart</a>
                <a class="dropdownLink" href="#"><i class="bi bi-question-circle"></i> Help</a>
                <a class="dropdownLink" href="logout.php" style="text-align:center;"><i class="bi bi-box-arrow-right"></i> Logout</a>
            </div>
        <?php else: ?>
            <div class="" aria-labelledby="userMenuToggle">  
                <a class="dropdownLink" href="#"><i class="bi bi-person-fill"></i> Profile</a>
                <a class="dropdownLink" href="#"><i class="bi bi-basket2-fill"></i> Ordered Food</a>
                <a class="dropdownLink" href="#"><i class="bi bi-cash-coin"></i> CashOut</a>
                <a class="dropdownLink" href="#"><i class="bi bi-cart-plus-fill"></i> Cart</a>
                <a class="dropdownLink" href="#"><i class="bi bi-question-circle"></i> Help</a>
                <a class="dropdownLink" href="users/login.php" style="text-align:center;"><i class="bi bi-box-arrow-left"></i> Login</a>
            </div>
        <?php endif; ?>
    </div>
</nav>
