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
    $po_category_name = $_GET['category'];
    ?>
    <div class="container py-5">
        <h2 class="text-center mb-4">📚<?php echo $po_category_name; ?> Popular Books Collection</h2>
        <div class="row g-4">


            <?php
            $po_category_idh = $_GET['po_id'];
            ?>

            <?php
            $sql = "SELECT * FROM `booklist` WHERE po_category_id='$po_category_idh';";
            $result = mysqli_query($conn, $sql);
            $booklist_change_img = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $book_id = $row['book_id'];
                $po_category_id = $row['po_category_id'];
                $book_title = $row['book_title'];
                $ratings = $row['ratings'];
                $book_disc_price = $row['book_disc_price'];
                $original_price = $row['original_price'];


                echo '<div class="col-sm-6 col-md-4 col-lg-3">
                <div class="book-card p-2">
                    <a class="text-decoration-none text-dark" href="book_details.php"><img src="image/booklist/' . $po_category_name . '_' . $booklist_change_img . '.jpeg" class="book-img" alt="' . $book_title . '">
                        <div class="p-2">
                            <h6>' . $book_title . '</h6>
                            <div class="rating">' . $ratings . '</div>
                            <div class="price">₹' . $book_disc_price . ' <span class="old-price">₹' . $original_price . '</span></div>
                            <span class="badge bg-success badge-custom">Hot Deal</span>
                        </div>
                    </a>
                </div>
            </div>';
                $booklist_change_img++;
            }
            ?>








            <!-- Book Card 1 -->
            <!-- <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="book-card p-2">
                    <a href="#"><img src="https://rukminim2.flixcart.com/image/416/416/kxaq7ww0/book/y/4/l/class-10-mathematics-standard-science-social-science-english-combo-original-imag9sazszefsfdt.jpeg" class="book-img" alt="PW Book">
                        <div class="p-2">
                            <h6>PW CBSE Concept Bank Class 10</h6>
                            <div class="rating">⭐⭐⭐⭐☆ (212)</div>
                            <div class="price">₹1,785 <span class="old-price">₹2,490</span></div>
                            <span class="badge bg-success badge-custom">Hot Deal</span>
                        </div>
                    </a>
                </div>
            </div> -->


            <!-- <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="book-card p-2">
                    <img src="https://rukminim2.flixcart.com/image/416/416/l3lx8cw0/book/a/j/v/quantitative-aptitude-original-imageq9jgnbnyzd5.jpeg" class="book-img" alt="Aptitude Book">
                    <div class="p-2">
                        <h6>Quantitative Aptitude - R.S. Aggarwal</h6>
                        <div class="price">₹710 <span class="old-price">₹800</span></div>
                        <span class="badge bg-primary badge-custom">11% Off</span>
                    </div>
                </div>
            </div> -->

            <!-- Book Card 3 -->
            <!-- <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="book-card p-2">
                    <img src="https://rukminim2.flixcart.com/image/416/416/kj7gwi80/book/t/m/d/shiv-puran-saar-original-imafy8uyzqfqyvyx.jpeg" class="book-img" alt="Shiv Puran">
                    <div class="p-2">
                        <h6>Shiv Puran Saar | Hindi</h6>
                        <div class="price">₹165 <span class="old-price">₹220</span></div>
                        <span class="badge bg-danger badge-custom">Only Few Left</span>
                    </div>
                </div>
            </div> -->

            <!-- Book Card 4 -->
            <!-- <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="book-card p-2">
                    <img src="https://rukminim2.flixcart.com/image/416/416/xif0q/book/b/a/e/army-agniveer-gd-book-2025-original-imagxv7y9cdxmnqc.jpeg" class="book-img" alt="Army Book">
                    <div class="p-2">
                        <h6>Army Agniveer Current GK 2025</h6>
                        <div class="price">₹245 <span class="old-price">₹300</span></div>
                        <span class="badge bg-warning text-dark badge-custom">Latest Edition</span>
                    </div>
                </div>
            </div> -->

            <!-- Book Card 5 -->
            <!-- <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="book-card p-2">
                    <img src="https://rukminim2.flixcart.com/image/416/416/k8t3jbk0/book/8/3/3/a-modern-approach-to-verbal-non-verbal-reasoning-original-imafq3kgrbhytyxg.jpeg" class="book-img" alt="Reasoning Book">
                    <div class="p-2">
                        <h6>Modern Verbal & Non-Verbal Reasoning</h6>
                        <div class="price">₹430 <span class="old-price">₹560</span></div>
                        <span class="badge bg-info text-dark badge-custom">Popular</span>
                    </div>
                </div>
            </div> -->

            <!-- Book Card 6 -->
            <!-- <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="book-card p-2">
                    <img src="https://rukminim2.flixcart.com/image/416/416/kufuikw0/book/6/y/6/science-for-class-8-original-imag7gnvxecx4g8s.jpeg" class="book-img" alt="Class 8 Science">
                    <div class="p-2">
                        <h6>Science Class 8 - Lakhmir Singh</h6>
                        <div class="price">₹370 <span class="old-price">₹499</span></div>
                        <span class="badge bg-success badge-custom">Best Seller</span>
                    </div>
                </div>
            </div> -->

            <!-- Book Card 7 -->
            <!-- <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="book-card p-2">
                    <img src="https://rukminim2.flixcart.com/image/416/416/xif0q/book/j/o/s/samanya-gyan-original-imagkghgchmkah6f.jpeg" class="book-img" alt="Samanya Gyan">
                    <div class="p-2">
                        <h6>Samanya Gyan | Hindi</h6>
                        <div class="price">₹150 <span class="old-price">₹199</span></div>
                        <span class="badge bg-dark badge-custom">Hindi Edition</span>
                    </div>
                </div>
            </div> -->

            <!-- Book Card 8 -->
            <!-- <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="book-card p-2">
                    <img src="https://rukminim2.flixcart.com/image/416/416/xif0q/book/f/l/l/bpsc-tre-4-0-2025-original-imagxsz7n9yzvqtq.jpeg" class="book-img" alt="BPSC Book">
                    <div class="p-2">
                        <h6>BPSC TRE 4.0 | 2025 Exam</h6>
                        <div class="price">₹499 <span class="old-price">₹699</span></div>
                        <span class="badge bg-secondary badge-custom">New Release</span>
                    </div>
                </div>
            </div> -->


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