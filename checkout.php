<?php
include 'partials/_navbar.php';
include 'partials/_dbconnect.php';


// Initialize totals
$total_discount = 0;
$total_original = 0;
$tax = 0;
$final_total = 0;

// Check if user is logged in and fetch cart data
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $userName = $_SESSION['userName'];
    $summary_query = "SELECT * FROM `cart` WHERE user_name = '$userName'";
    $summary_result = mysqli_query($conn, $summary_query);

    while ($row = mysqli_fetch_assoc($summary_result)) {
        $total_discount += $row['discount_prize'];
        $total_original += $row['original_prize'];
    }

    // Optional Tax Calculation
    $tax = round($total_discount * 0.09); // 9% tax (example)
    $final_total = $total_discount + $tax;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Checkout | BookHarbor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/_navbar_style.css">
    <link rel="stylesheet" href="css/_footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <style>
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            z-index: -1;
            background: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f') no-repeat center center fixed;
            background-size: cover;
            filter: blur(4px);
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        .checkout-box,
        .checkout-summary {
            background-color: rgba(255, 255, 255, 0.95);
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .gradient-heading {
            background: linear-gradient(to right, #28a745, #20c997);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        h4,
        h5 {
            color: #333;
        }

        input.form-control {
            border-radius: 0.375rem;
            border: 1px solid #ced4da;
        }

        button.btn-primary {
            background-color: #ff9900;
            border: none;
            font-weight: 600;
        }

        button.btn-primary:hover {
            background-color: #e68a00;
        }

        .checkout-summary ul {
            font-size: 0.95rem;
        }

        .form-check-label {
            font-weight: 500;
        }

        .form-check-input:checked {
            background-color: #ff9900;
            border-color: #ff9900;
        }

        .container {
            padding-top: 30px;
            padding-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row g-4">
            <!-- Left: Shipping and Payment Form -->
            <div class="col-lg-8">
                <div class="checkout-box p-4 shadow-sm">
                    <h4 class="mb-4 border-bottom pb-2 gradient-heading"><i class="bi bi-book"></i> Shipping Information</h4>
                    <form action="payment_gateway.php" method="GET">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" name="fullname" class="form-control" placeholder="John Doe" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control" placeholder="+91 9876543210" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="123 Street, Area, City" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="city" class="form-label">City</label>
                                <input type="text" name="city" class="form-control" placeholder="Ranchi" required>
                            </div>
                            <div class="col-md-6">
                                <label for="pincode" class="form-label">Pincode</label>
                                <input type="text" name="pincode" class="form-control" placeholder="834002" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="state" class="form-label">State</label>
                            <input type="text" name="state" class="form-control" placeholder="Jharkhand" required>
                        </div>

                        <h4 class="mt-5 mb-4 border-bottom pb-2 gradient-heading"><i class="bi bi-credit-card"></i> Payment Method</h4>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="payment_method" value="Cash on Delivery" id="cod" checked>
                            <label class="form-check-label" for="cod">Cash on Delivery</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="payment_method" value="Card" id="card">
                            <label class="form-check-label" for="card">Credit/Debit Card (Coming Soon)</label>
                        </div>

                        <!-- Hidden Total -->
                        <input type="hidden" name="total_price" value="<?php echo $final_total; ?>">

                        <button type="submit" class="btn btn-success w-100">Proceed to Payment</button>

                        <p class="text-success text-center mt-3">Your order will be delivered within 4–6 business days!</p>
                    </form>
                </div>
            </div>

            <!-- Right: Order Summary -->
            <div class="col-lg-4">
                <div class="checkout-summary p-4 shadow-sm">
                    <h5 class="border-bottom pb-2 mb-3 gradient-heading"><i class="bi bi-receipt-cutoff"></i> Order Summary</h5>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Book Total</span>
                            <strong>₹<?php echo $total_discount; ?></strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Shipping</span>
                            <strong>Free</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Taxes</span>
                            <strong>₹<?php echo $tax; ?></strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between fw-bold">
                            <span>Total</span>
                            <strong>₹<?php echo $final_total; ?></strong>
                        </li>
                    </ul>
                    <p class="text-muted small mb-0">* All prices include applicable GST. Secure and safe checkout guaranteed.</p>
                </div>
            </div>
        </div>
    </div>

    <?php include 'partials/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>