<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BookHarbor | Explore Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/_navbar_style.css" />
    <link rel="stylesheet" href="css/_footer.css" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9f9f9;
        }

        .book-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.3s;
        }

        .book-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .book-img {
            height: 240px;
            object-fit: cover;
            width: 100%;
        }

        .badge-custom {
            font-size: 0.75rem;
            border-radius: 20px;
            padding: 0.3rem 0.6rem;
        }

        .old-price {
            color: #888;
            text-decoration: line-through;
        }

        .price {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .rating {
            font-size: 0.9rem;
            color: #ffc107;
        }

        h6 {
            font-weight: 600;
            font-size: 1rem;
        }
    </style>
</head>

<body>
    <?php include 'partials/_navbar.php'; ?>
    <?php
    $genre = $_GET['category'];
    ?>
    <div class="container py-5">
        <h2 class="text-center mb-4">📚<?php echo $genre; ?> Popular Books Collection</h2>
        <div class="row g-4">

            <?php
            $sql = "SELECT * FROM `booklist` WHERE genre='$genre';";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $book_id = $row['book_id'];
                $genre = $row['genre'];
                $image = $row['image'];
                $book_title = $row['book_title'];
                $ratings = $row['ratings'];
                $book_disc_price = $row['book_disc_price'];
                $original_price = $row['original_price'];


                echo '<div class="col-sm-6 col-md-4 col-lg-3">
                <div class="book-card p-2">
                    <a class="text-decoration-none text-dark" href="book_details.php?book_id=' . $book_id . ' "><img src="' . $image . '" class="book-img" alt="' . $book_title . '">
                        <div class="p-2">
                            <h6>' . $book_title . '</h6>
                            <div class="rating">' . $ratings . '</div>
                            <div class="price">₹' . $book_disc_price . ' <span class="old-price">₹' . $original_price . '</span></div>
                            <span class="badge bg-success badge-custom">Hot Deal</span>
                        </div>
                    </a>
                </div>
            </div>';
            }
            ?>
            <div class="p-4">
                <a href="javascript:history.back()" class="btn btn-dark d-inline-flex align-items-center">
                    <i class="bi bi-arrow-left me-2"></i> Back
                </a>
            </div>
        </div>
    </div>
    <?php include 'partials/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>