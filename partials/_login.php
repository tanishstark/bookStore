<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login | BookHarbor</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f8f9fa;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background: white;
            padding: 2.5rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 400px;
        }

        .login-box h2 {
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
        session_start();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM `users` WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $row = mysqli_fetch_assoc($result);
            $dbEmail = $row['email'];
            $dbUserName = $row['name'];
            if ($password == $row['password']) {
                $_SESSION['loggedin'] = true;
                $_SESSION['sno'] = $row['sno'];
                $_SESSION['userName'] = $dbUserName;
                $showAlert = "Login Successfully";
                header("location:/my_book_store/home_page.php?signInSuccess=$showAlert");
                exit();
            } else {
                $showError = "Wrong Password";
            }
        } else {
            $showError = "User not found";
        }
        header("location:/my_book_store/home_page.php?error=$showError");
        exit();
    }
    ?>



    <div class="login-container">
        <div class="login-box">
            <h2 class="text-center">📚 BookHarbor Login</h2>

            <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember">
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>
                    <a href="#" class="text-decoration-none small">Forgot password?</a>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>

            <p class="mt-3 text-center small">
                Don’t have an account? <a href="#" class="text-primary text-decoration-none">Sign up here</a>
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