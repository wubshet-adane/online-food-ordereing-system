<header class="text-center py-4 text-black header" id="dynamicSection">
    <?php
        include 'topnav.php';
    ?>
    <div class="left-side-text text-overlay-container">
        <h1 class="text-white">You Can Order Now</h1>
        <p class="text-white">Delight & Joy</p>
    </div>
    <!--search-->
    <form action="other Functionalities/searching.php" method="post" name="searchingForm">
        <div class="search-bar">
            <input type="text" placeholder="Search" name="search" id="search">
            <button type="button" name="searchBtn" id="searchBtn">
            <i class="bi bi-search"></i>
            </button>
        </div>
    </form>
</header>
