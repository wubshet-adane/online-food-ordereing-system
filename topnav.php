<!-- Navbar -->
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
        <a class="nav-link" href="#">products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-cart-plus"></i></a>
      </li>
    </ul>
  </div>
  <a class="d-flex align-items-center" href="#">
      <?php
        if($_SESSION['user_loggedin']==true){
          ?>

          <span class="text-light text-decoration-none"><?php echo $_SESSION['firstName'].$_SESSION['lastName'];?><?php //echo $_SESSION['lastName']?></span>
          <img src="<?php echo $_SESSION['image'];?>" alt='Logo' style="width: 50px; height: 50px; border-radius:50%;">
        
        <?php
        }else{
        ?>
          <span class="text-light text-decoration-none"><?php echo $_SESSION['firstName'].$_SESSION['lastName'];?><?php //echo $_SESSION['lastName']?></span>
          <img src="../<?php echo $_SESSION['image'];?>" alt='Logo' style="width: 50px; height: 50px; border-radius:50%;">
        <?php
        }
      ?>
  </a> <!-- You can replace "Brand" with your logo or site name -->

</nav>
