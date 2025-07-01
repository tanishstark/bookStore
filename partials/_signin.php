<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sign Up | BookHarbor</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f8f9fa;
        }

        .signup-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .signup-box {
            background: white;
            padding: 2.5rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 450px;
        }

        .signup-box h2 {
            font-family: 'Playfair Display', serif;
            margin-bottom: 1.5rem;
        }

        footer {
            text-align: center;
            padding: 1rem;
            font-size: 0.85rem;
            color: #999;
        }
    </style>
</head>

<body>

    <?php


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include '_dbconnect.php';
        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];

        $userExist = "SELECT * FROM `users` WHERE email='$email'";
        $result = mysqli_query($conn, $userExist);

        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $showError = "Email already Exist";
        } else {
            if ($password == $confirm) {
                $sql = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $showAlert = "Your account is created.";
                    header("location: /my_book_store/home_page.php?signInSuccess=$showAlert");
                    exit();
                }
            } else {
                $showError = "Password not match";
            }
        }
        header("location: /my_book_store/home_page.php?error=$showError");
        exit();
    }
    ?>



    <div class="signup-container">
        <div class="signup-box">
            <h2 class="text-center">📘 Create an Account</h2>

            <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="POST">
                <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Your name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                </div>

                <div class="mb-3">
                    <label for="confirm" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm" name="confirm" placeholder="••••••••" required>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="terms" required>
                    <label class="form-check-label" for="terms">I agree to the <a href="#" class="text-decoration-none">terms & conditions</a></label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Create Account</button>
            </form>

            <p class="mt-3 text-center small">
                Already have an account? <a href="login.html" class="text-primary text-decoration-none">Login here</a>
            </p>
        </div>
    </div>

    <footer>
        &copy; 2025 BookHarbor. All rights reserved.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>