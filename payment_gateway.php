<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Payment | BookHarbor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

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

        .payment-box {
            background-color: rgba(255, 255, 255, 0.95);
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            padding: 30px;
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
            background: linear-gradient(to right, #007bff, #00bcd4);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        .form-control {
            border-radius: 0.375rem;
        }

        .btn-pay {
            background-color: #28a745;
            color: white;
            font-weight: 600;
        }

        .btn-pay:hover {
            background-color: #218838;
        }

        .secure-text {
            font-size: 0.9rem;
            color: #28a745;
            font-weight: 500;
        }

        .container {
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="payment-box shadow-sm">
                    <h4 class="gradient-heading mb-4"><i class="bi bi-shield-lock-fill"></i> Secure Payment</h4>

                    <p class="text-muted mb-4">Please choose your preferred payment method and complete the transaction.</p>

                    <!-- Card Payment Section -->
                    <form>
                        <div class="mb-3">
                            <label for="cardName" class="form-label">Cardholder Name</label>
                            <input type="text" class="form-control" id="cardName" placeholder="John Doe">
                        </div>
                        <div class="mb-3">
                            <label for="cardNumber" class="form-label">Card Number</label>
                            <input type="text" class="form-control" id="cardNumber" placeholder="xxxx-xxxx-xxxx-1234">
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="expiry" class="form-label">Expiry Date</label>
                                <input type="text" class="form-control" id="expiry" placeholder="MM/YY">
                            </div>
                            <div class="col-md-6">
                                <label for="cvv" class="form-label">CVV</label>
                                <input type="password" class="form-control" id="cvv" placeholder="123">
                            </div>
                        </div>

                        <!-- Other Methods -->
                        <hr class="my-4">

                        <p class="text-muted">Or pay with:</p>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Enter UPI ID (e.g. john@upi)">
                        </div>
                        <div class="mb-3">
                            <select class="form-select">
                                <option selected>Select Wallet</option>
                                <option value="paytm">Paytm</option>
                                <option value="gpay">Google Pay</option>
                                <option value="phonepe">PhonePe</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-pay w-100 mt-3">Pay ₹653</button>

                        <p class="secure-text mt-3 text-center"><i class="bi bi-lock-fill"></i> Your payment is encrypted and 100% secure</p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>