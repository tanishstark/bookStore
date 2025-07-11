<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cart – BookHarbor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/_navbar_style.css">
    <link rel="stylesheet" href="css/_footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f7fa;
        }

        .cart-item {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.06);
            margin-bottom: 20px;
        }

        .book-img {
            width: 120px;
            height: 160px;
            object-fit: cover;
            border-radius: 10px;
        }

        .discount {
            font-size: 0.75rem;
            background-color: #fbeaec;
            color: #d63384;
            padding: 4px 8px;
            border-radius: 5px;
        }

        .stock-badge {
            font-size: 0.75rem;
            color: green;
            font-weight: bold;
        }

        .quantity-select {
            width: 60px;
        }

        .total-box {
            background-color: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.07);
        }

        .btn-checkout {
            background-color: #4caf50;
            color: white;
            font-weight: 600;
            transition: 0.3s ease;
        }

        .btn-checkout:hover {
            background-color: #388e3c;
        }

        .payment-icons img {
            height: 30px;
            margin-right: 10px;
            opacity: 0.8;
        }

        .delivery-text {
            font-size: 0.85rem;
            color: #666;
        }

        .order-header {
            font-weight: 700;
        }
    </style>
</head>

<body>
    <?php if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } ?>
    <?php $showAlert1 = "This book is already in cart"; ?>
    <?php include 'partials/_navbar.php';
    if (isset($_GET['visit']) && $_GET['visit'] === $showAlert1) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Already in cart!</strong> This book is already in your cart.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <?php include 'partials/_dbconnect.php'; ?>

    <?php
    // Handle Remove Request
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_book'])) {
        $remove_book = mysqli_real_escape_string($conn, $_POST['remove_book']);
        $userName = $_SESSION['userName'];
        $delete_query = "DELETE FROM `cart` WHERE `user_name` = '$userName' AND `book_name` = '$remove_book'";
        $delete_result = mysqli_query($conn, $delete_query);

        if (!$delete_result) {
            die("Error deleting book from cart: " . mysqli_error($conn));
        }

        // Optional: Redirect to prevent form resubmission on page refresh
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    ?>
    <!-- Cart Container -->
    <div class="container py-5">

        <h2 class="mb-4">🛒 Your Shopping Cart</h2>

        <div class="row">
            <!-- 🟩 Left: Cart Items -->
            <div class="col-lg-8 col-md-12">
                <?php

                if (isset($_GET['book_id']) && (!isset($_GET['visit']) || $_GET['visit'] !== $showAlert1)) {
                    $book_id = intval($_GET['book_id']);
                    $userName = $_SESSION['userName'];
                    // Fetch book data from booklist table
                    $query = "SELECT * FROM `booklist` WHERE `book_id` = $book_id";
                    $result = mysqli_query($conn, $query);
                    if (!$result || mysqli_num_rows($result) == 0) {
                        die('Book not found.');
                    }

                    $row = mysqli_fetch_assoc($result);
                    $image = $row['image'];
                    $name = $row['book_title'];
                    $desc = $row['book_desc'];
                    $ratings = $row['ratings'];
                    $retail_price = $row['book_disc_price'];
                    $original_price = $row['original_price'];
                    $genre = $row['genre'];
                    $publisher = $row['publisher'];
                    $page = $row['page'];
                    $ISBN = $row['ISBN'];
                    $percentage = round((($original_price - $retail_price) / $original_price) * 100);

                    // Check if the book already exists in cart
                    $check_query = "SELECT * FROM `cart` WHERE `book_name` = '$name'";
                    $check_result = mysqli_query($conn, $check_query);

                    if (mysqli_num_rows($check_result) == 0) {
                        // Insert only if not already in cart
                        $insert_query = "INSERT INTO `cart` (`user_name`,`book_name`, `genre`, `book_page`, `save_persentage`, `delivery_date`, `discount_prize`, `original_prize`, `quantity`,`cart_bo_image`) 
                        VALUES ('$userName','$name', '$genre', '$page', '$percentage', '', '$retail_price', '$original_price', '1','$image')";
                        $insert_result = mysqli_query($conn, $insert_query);

                        if (!$insert_result) {
                            die('Insert Error: ' . mysqli_error($conn));
                        }
                    } else {
                        $redirect_url = "cart.php?book_id=" . $book_id . "&visit=$showAlert1";
                        header("Location: $redirect_url");
                        exit();
                    }
                }
                ?>



                <?php
                $total_discount = 0;
                $total_original = 0;
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    $userName = $_SESSION['userName'];
                    $show_cart = "SELECT * FROM `cart` WHERE user_name='$userName';";
                    $result2 = mysqli_query($conn, $show_cart);

                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $book_name = $row2['book_name'];
                        $cart_bo_image = $row2['cart_bo_image'];
                        $genre = $row2['genre'];
                        $book_page = $row2['book_page'];
                        $save_persentage = $row2['save_persentage'];
                        $discount_prize = $row2['discount_prize'];
                        $original_prize = $row2['original_prize'];


                        echo '<div class="cart-item row align-items-center">
                                <div class="col-md-2 text-center">
                                    <img src="' . $cart_bo_image . '" class="book-img" alt="Book" />
                                </div>
                                <div class="col-md-4">
                                    <h5>' . $book_name . '</h5>
                                    <p class="text-muted mb-1">' . $genre . '| ' . $book_page . '</p>
                                    <span class="stock-badge">✔ In Stock</span><br>
                                    <span class="discount mt-1 d-inline-block">Save ' . $save_persentage . '%</span>
                                    <p class="delivery-text mt-2">🚚 Delivery by <strong>July 12</strong></p>
                                </div>
                                <div class="col-md-2 text-center">
                                    <select class="form-select quantity-select">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>
                                <div class="col-md-2 text-center">
                                    <h5 class="text-success mb-1">₹' . $discount_prize . '</h5>
                                    <small class="text-muted text-decoration-line-through">₹' . $original_prize . '</small>
                                </div>
                                <div class="col-md-2 text-end">
                                    <form method="POST" action="' . $_SERVER["REQUEST_URI"] . '">
                                        <input type="hidden" name="remove_book" value="' . $book_name . '">
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Remove</button>
                                    </form>
                                </div>
                            </div>';
                        $total_discount += $discount_prize;
                        $total_original += $original_prize;
                    }
                }
                ?>
            </div>




            <!-- 🟥 Right: Order Summary -->
            <div class="col-lg-4 col-md-12">
                <div class="total-box mt-4 mt-lg-0 sticky-top" style="top: 90px; z-index: 2;">
                    <h5 class="order-header mb-4">🧾 Order Summary</h5>
                    <div class="d-flex justify-content-between">
                        <span>Discount Price</span>
                        <span>₹<?php echo $total_discount; ?></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Original Price</span>
                        <span>₹<?php echo $total_original; ?></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Shipping</span>
                        <span class="text-success">Free</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Taxes</span>
                        <span>₹0</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold fs-5 mb-3">
                        <span>Total</span>
                        <span>₹<?php echo $total_discount; ?></span>
                    </div>
                    <button class="btn btn-checkout w-100 mb-3">Proceed to Checkout</button>
                    <p class="text-muted mb-1">Accepted Payments:</p>
                    <div class="payment-icons">
                        <img src="https://img.icons8.com/color/48/visa.png" alt="Visa" />
                        <img src="https://img.icons8.com/color/48/mastercard.png" alt="MasterCard" />
                        <img src="https://img.icons8.com/color/48/paypal.png" alt="PayPal" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-4">
        <a href="javascript:history.back()" class="btn btn-dark d-inline-flex align-items-center">
            <i class="bi bi-arrow-left me-2"></i> Back
        </a>
    </div>
    <!-- Footer -->
    <?php include 'partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>