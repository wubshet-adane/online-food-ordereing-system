<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">    <link rel="stylesheet" href="styles.css"> <!-- Custom styles if needed -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

        <!--google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sixtyfour+Convergence&display=swap" rel="stylesheet">


    <style>
        .search-bar {
            background-color:#fff;
      display: flex;
      align-items: center;
      border-radius: 30px;
      padding: 0px 15px;
      max-width:400px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
    }

    .search-bar input {
      background: transparent;
      border: none;
      outline: none;
      width: 100%;
      font-size: 16px;
      padding: 8px;
    }

    .search-bar button {
      background: transparent;
      border: none;
      font-size: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .search-bar button {
      color: #11e;
      font-size: 30px;
      padding: 0;
    }

    .search-bar button:hover {
      color: #111;
      font-size: 35px;
    }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Header Section -->
        <?php
            include 'header.php';
        ?>
        <!--recommendation section-->
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
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
        <section class="d-flex justify-content-center my-4">
            <label for="categories" class="me-2">Categories:</label>
            <select id="categories" class="form-select w-25 me-2">
                <option value="all">All</option>
                <option value="soups">Soups</option>
                <option value="salads">Salads</option>
                <option value="drinks">Drinks</option>
                <option value="appetizers">Appetizers</option>
                <option value="desserts">Desserts</option>
                <option value="fasting_food">Fasting Food</option>
            </select>
            <label for="sort" class="me-2">Sort By:</label>
            <select id="sort" class="form-select w-25">
                <option value="name_asc">Name: A to Z</option>
                <option value="name_desc">Name: Z to A</option>
                <option value="price_low_high">Price: Low to High</option>
                <option value="price_high_low">Price: High to Low</option>
            </select>
        </section>

        <!-- Menu Section -->
<div id="menu-items" class="container my-4">
    <!-- Soups Section -->
    <section class="menu-category" id="soups">
        <h2 class="text-center my-4">Soups</h2>
        <div class="row g-3">
            <!-- Soup Item 1 -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100" data-category="soups" data-price="4.00">
                    <img src="images/homeimg.jpg" class="card-img-top img-fluid" alt="Cream of Wild Mushroom">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold">Cream of Wild Mushroom</h5>
                        <p class="card-text">A bowl of our house special creamy mushroom soup.</p>
                        <p class="card-text"><strong>Price: £4.00</strong></p>
                        
                        <div class="d-flex align-items-center mb-3">
                            <!-- Label -->
                            <label for="quantity-salad1" class="me-2 mb-0">Quantity:</label>
                            
                            <!-- Quantity Selector -->
                            <div class="input-group w-40">
                                <!-- Decrement Button -->
                                <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="decrementQuantity('quantity-salad2')">−</button>
                                <!-- Input Field -->
                                <input id="quantity-salad2" type="text" class="form-control text-center" value="1" min="1" max="10" style="max-width:50px;">
                                <!-- Increment Button -->
                                <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="incrementQuantity('quantity-salad2')"><i class="bi bi-caret-right-square"></i></button>
                            </div>
                        </div>
                        
                        <div class="mt-auto d-flex justify-content-between">
                            <!-- Cart/Basket Button (Left-Aligned) -->
                            <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="add to cart">
                                <i class="bi bi-cart3 "></i>
                            </button>
                            <!-- View More Button (Right-Aligned) -->
                            <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="read more">
                                View More
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Soup Item 2 -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100" data-category="soups" data-price="4.00">
                    <img src="images/homeimg.jpg" class="card-img-top img-fluid" alt="Cream of Wild Mushroom">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold">Cream of Wild Mushroom</h5>
                        <p class="card-text">A bowl of our house special creamy mushroom soup.</p>
                        <p class="card-text"><strong>Price: £4.00</strong></p>
                        
                        <div class="d-flex align-items-center mb-3">
                            <!-- Label -->
                            <label for="quantity-salad1" class="me-2 mb-0">Quantity:</label>
                            
                            <!-- Quantity Selector -->
                            <div class="input-group w-40">
                                <!-- Decrement Button -->
                                <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="decrementQuantity('quantity-salad2')">−</button>
                                <!-- Input Field -->
                                <input id="quantity-salad2" type="text" class="form-control text-center" value="1" min="1" max="10" style="max-width:50px;">
                                <!-- Increment Button -->
                                <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="incrementQuantity('quantity-salad2')">+</button>
                            </div>
                        </div>
                        
                        <div class="mt-auto d-flex justify-content-between">
                            <!-- Cart/Basket Button (Left-Aligned) -->
                            <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="add to cart">
                                <i class="bi bi-cart3 "></i>
                            </button>
                            <!-- View More Button (Right-Aligned) -->
                            <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="read more">
                                View More
                            </button>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100" data-category="soups" data-price="4.00">
                    <img src="images/homeimg.jpg" class="card-img-top img-fluid" alt="Cream of Wild Mushroom">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold">Cream of Wild Mushroom</h5>
                        <p class="card-text">A bowl of our house special creamy mushroom soup.</p>
                        <p class="card-text"><strong>Price: £4.00</strong></p>
                        
                        <div class="d-flex align-items-center mb-3">
                            <!-- Label -->
                            <label for="quantity-salad1" class="me-2 mb-0">Quantity:</label>
                            
                            <!-- Quantity Selector -->
                            <div class="input-group w-40">
                                <!-- Decrement Button -->
                                <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="decrementQuantity('quantity-salad2')">−</button>
                                <!-- Input Field -->
                                <input id="quantity-salad2" type="text" class="form-control text-center" value="1" min="1" max="10" style="max-width:50px;">
                                <!-- Increment Button -->
                                <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="incrementQuantity('quantity-salad2')">+</button>
                            </div>
                        </div>
                        
                        <div class="mt-auto d-flex justify-content-between">
                            <!-- Cart/Basket Button (Left-Aligned) -->
                            <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="add to cart">
                                <i class="bi bi-cart3 "></i>
                            </button>
                            <!-- View More Button (Right-Aligned) -->
                            <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="read more">
                                View More
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100" data-category="soups" data-price="4.00">
                    <img src="images/homeimg.jpg" class="card-img-top img-fluid" alt="Cream of Wild Mushroom">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold">Cream of Wild Mushroom</h5>
                        <p class="card-text">A bowl of our house special creamy mushroom soup.</p>
                        <p class="card-text"><strong>Price: £4.00</strong></p>
                        
                        <div class="d-flex align-items-center mb-3">
                            <!-- Label -->
                            <label for="quantity-salad1" class="me-2 mb-0">Quantity:</label>
                            
                            <!-- Quantity Selector -->
                            <div class="input-group w-40">
                                <!-- Decrement Button -->
                                <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="decrementQuantity('quantity-salad2')">−</button>
                                <!-- Input Field -->
                                <input id="quantity-salad2" type="text" class="form-control text-center" value="1" min="1" max="10" style="max-width:50px;">
                                <!-- Increment Button -->
                                <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="incrementQuantity('quantity-salad2')">+</button>
                            </div>
                        </div>
                        
                        <div class="mt-auto d-flex justify-content-between">
                            <!-- Cart/Basket Button (Left-Aligned) -->
                            <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="add to cart">
                                <i class="bi bi-cart3 "></i>
                            </button>
                            <!-- View More Button (Right-Aligned) -->
                            <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="read more">
                                View More
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- More soup items can be added here -->
        </div>
    </section>

    <!-- Salads Section -->
    <section class="menu-category" id="salads">
        <h2 class="text-center my-4">Salads</h2>
        <div class="row g-3">
            <!-- Salad Item 1 -->
            
            
            
            <!-- Salad Item 2 -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100" data-category="salads" data-price="4.50">
                    <img src="images/salad.jpg" class="card-img-top img-fluid" alt="Fresh Salad">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold">Fresh Salad</h5>
                        <p class="card-text">Mixed greens with a tangy dressing.</p>
                        <p class="card-text"><strong>Price: £4.50</strong></p>
                        <div class="d-flex align-items-center mb-3">
                            

                            <!-- Label -->
                            <label for="quantity-salad1" class="me-2 mb-0">Quantity:</label>
                            
                            <!-- Quantity Selector -->
                            <div class="input-group w-40">
                                <!-- Decrement Button -->
                                <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="decrementQuantity('quantity-salad2')">−</button>
                                <!-- Input Field -->
                                <input id="quantity-salad2" type="text" class="form-control text-center" value="1" min="1" max="10" style="max-width:50px;">
                                <!-- Increment Button -->
                                <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="incrementQuantity('quantity-salad2')">+</button>
                            </div>
                        </div>
                        
                        <div class="mt-auto d-flex justify-content-between">
                            <!-- Cart/Basket Button (Left-Aligned) -->
                            <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="add to cart">
                                <i class="bi bi-cart3 "></i>
                            </button>
                            <!-- View More Button (Right-Aligned) -->
                            <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="read more">
                                View More
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            
            <!-- Salad Item 3 -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100" data-category="salads" data-price="4.50">
                    <img src="images/salad.jpg" class="card-img-top img-fluid" alt="Fresh Salad">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold">Fresh Salad</h5>
                        <p class="card-text">Mixed greens with a tangy dressing.</p>
                        <p class="card-text"><strong>Price: £4.50</strong></p>
                        <div class="d-flex align-items-center mb-3">
                            

                            <!-- Label -->
                            <label for="quantity-salad1" class="me-2 mb-0">Quantity:</label>
                            
                            <!-- Quantity Selector -->
                            <div class="input-group w-40">
                                <!-- Decrement Button -->
                                <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="decrementQuantity('quantity-salad2')">−</button>
                                <!-- Input Field -->
                                <input id="quantity-salad2" type="text" class="form-control text-center" value="1" min="1" max="10" style="max-width:50px;">
                                <!-- Increment Button -->
                                <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="incrementQuantity('quantity-salad2')">+</button>
                            </div>
                        </div>
                        
                        <div class="mt-auto d-flex justify-content-between">
                            <!-- Cart/Basket Button (Left-Aligned) -->
                            <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="add to cart">
                                <i class="bi bi-cart4 "></i>
                            </button>
                            <!-- View More Button (Right-Aligned) -->
                            <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="read more">
                                View More
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            
            <!-- Salad Item 4 -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100" data-category="salads" data-price="4.50">
                    <img src="images/salad.jpg" class="card-img-top img-fluid" alt="Fresh Salad">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold">Fresh Salad</h5>
                        <p class="card-text">Mixed greens with a tangy dressing.</p>
                        <p class="card-text"><strong>Price: £4.50</strong></p>
                        <div class="d-flex align-items-center mb-3">
                            

                            <!-- Label -->
                            <label for="quantity-salad1" class="me-2 mb-0">Quantity:</label>
                            
                            <!-- Quantity Selector -->
                            <div class="input-group w-40">
                                <!-- Decrement Button -->
                                <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="decrementQuantity('quantity-salad2')">−</button>
                                <!-- Input Field -->
                                <input id="quantity-salad2" type="text" class="form-control text-center" value="1" min="1" max="10" style="max-width:50px;">
                                <!-- Increment Button -->
                                <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="incrementQuantity('quantity-salad2')">+</button>
                            </div>
                        </div>
                        
                        <div class="mt-auto d-flex justify-content-between">
                            <!-- Cart/Basket Button (Left-Aligned) -->
                            <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="add to cart">
                                <i class="bi bi-cart3 "></i>
                            </button>
                            <!-- View More Button (Right-Aligned) -->
                            <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="read more">
                                View More
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- fasting food Section -->
            <section class="menu-category" id="soups">
                <h2 class="text-center my-4">fasting food</h2>
                <div class="row g-3">
                    <!-- Soup Item 1 -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100" data-category="soups" data-price="4.00">
                            <img src="images/homeimg.jpg" class="card-img-top img-fluid" alt="Cream of Wild Mushroom">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-semibold">Cream of Wild Mushroom</h5>
                                <p class="card-text">A bowl of our house special creamy mushroom soup.</p>
                                <p class="card-text"><strong>Price: £4.00</strong></p>
                                
                                <div class="d-flex align-items-center mb-3">
                                    <!-- Label -->
                                    <label for="quantity-salad1" class="me-2 mb-0">Quantity:</label>
                                    
                                    <!-- Quantity Selector -->
                                    <div class="input-group w-40">
                                        <!-- Decrement Button -->
                                        <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="decrementQuantity('quantity-salad2')">−</button>
                                        <!-- Input Field -->
                                        <input id="quantity-salad2" type="text" class="form-control text-center" value="1" min="1" max="10" style="max-width:50px;">
                                        <!-- Increment Button -->
                                        <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="incrementQuantity('quantity-salad2')"><i class="bi bi-caret-right-square"></i></button>
                                    </div>
                                </div>
                                
                                <div class="mt-auto d-flex justify-content-between">
                                    <!-- Cart/Basket Button (Left-Aligned) -->
                                    <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="add to cart">cart
                                        <i class="bi bi-cart3 "></i>
                                    </button>
                                    <!-- View More Button (Right-Aligned) -->
                                    <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="read more">
                                        View More
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Soup Item 2 -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100" data-category="soups" data-price="4.00">
                            <img src="images/homeimg.jpg" class="card-img-top img-fluid" alt="Cream of Wild Mushroom">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-semibold">Cream of Wild Mushroom</h5>
                                <p class="card-text">A bowl of our house special creamy mushroom soup.</p>
                                <p class="card-text"><strong>Price: £4.00</strong></p>
                                
                                <div class="d-flex align-items-center mb-3">
                                    <!-- Label -->
                                    <label for="quantity-salad1" class="me-2 mb-0">Quantity:</label>
                                    
                                    <!-- Quantity Selector -->
                                    <div class="input-group w-40">
                                        <!-- Decrement Button -->
                                        <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="decrementQuantity('quantity-salad2')">−</button>
                                        <!-- Input Field -->
                                        <input id="quantity-salad2" type="text" class="form-control text-center" value="1" min="1" max="10" style="max-width:50px;">
                                        <!-- Increment Button -->
                                        <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="incrementQuantity('quantity-salad2')">+</button>
                                    </div>
                                </div>
                                
                                <div class="mt-auto d-flex justify-content-between">
                                    <!-- Cart/Basket Button (Left-Aligned) -->
                                    <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="add to cart">
                                        <i class="bi bi-cart3 "></i>
                                    </button>
                                    <!-- View More Button (Right-Aligned) -->
                                    <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="read more">
                                        View More
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100" data-category="soups" data-price="4.00">
                            <img src="images/homeimg.jpg" class="card-img-top img-fluid" alt="Cream of Wild Mushroom">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-semibold">Cream of Wild Mushroom</h5>
                                <p class="card-text">A bowl of our house special creamy mushroom soup.</p>
                                <p class="card-text"><strong>Price: £4.00</strong></p>
                                
                                <div class="d-flex align-items-center mb-3">
                                    <!-- Label -->
                                    <label for="quantity-salad1" class="me-2 mb-0">Quantity:</label>
                                    
                                    <!-- Quantity Selector -->
                                    <div class="input-group w-40">
                                        <!-- Decrement Button -->
                                        <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="decrementQuantity('quantity-salad2')">−</button>
                                        <!-- Input Field -->
                                        <input id="quantity-salad2" type="text" class="form-control text-center" value="1" min="1" max="10" style="max-width:50px;">
                                        <!-- Increment Button -->
                                        <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="incrementQuantity('quantity-salad2')">+</button>
                                    </div>
                                </div>
                                
                                <div class="mt-auto d-flex justify-content-between">
                                    <!-- Cart/Basket Button (Left-Aligned) -->
                                    <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="add to cart">
                                        <i class="bi bi-cart3 "></i>
                                    </button>
                                    <!-- View More Button (Right-Aligned) -->
                                    <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="read more">
                                        View More
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100" data-category="soups" data-price="4.00">
                            <img src="images/homeimg.jpg" class="card-img-top img-fluid" alt="Cream of Wild Mushroom">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-semibold">Cream of Wild Mushroom</h5>
                                <p class="card-text">A bowl of our house special creamy mushroom soup.</p>
                                <p class="card-text"><strong>Price: £4.00</strong></p>
                                
                                <div class="d-flex align-items-center mb-3">
                                    <!-- Label -->
                                    <label for="quantity-salad1" class="me-2 mb-0">Quantity:</label>
                                    
                                    <!-- Quantity Selector -->
                                    <div class="input-group w-40">
                                        <!-- Decrement Button -->
                                        <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="decrementQuantity('quantity-salad2')">−</button>
                                        <!-- Input Field -->
                                        <input id="quantity-salad2" type="text" class="form-control text-center" value="1" min="1" max="10" style="max-width:50px;">
                                        <!-- Increment Button -->
                                        <button class="btn btn-outline-secondary" type="button" style="max-width:30px;" onclick="incrementQuantity('quantity-salad2')">+</button>
                                    </div>
                                </div>
                                
                                <div class="mt-auto d-flex justify-content-between">
                                    <!-- Cart/Basket Button (Left-Aligned) -->
                                    <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="add to cart">
                                        <i class="bi bi-cart3 "></i>
                                    </button>
                                    <!-- View More Button (Right-Aligned) -->
                                    <button class="btn btn-outline-secondary btn-sm" style="width: 40%;" title="read more">
                                        View More
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- More soup items can be added here -->
                </div>
            </section>
            <!-- More salad items can be added here -->
        </div>
    </section>
</div>

    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"></script>


    <!-- quantity increament and decreament-->
    <script src="javascript/addPrice.js"></script>

    <script src="searchingAndSorting.js">// Sorting functionality
    </script>
</body>
</html>
