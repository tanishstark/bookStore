<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>The Alchemist – BookHarbor</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="css/_navbar_style.css" />
  <link rel="stylesheet" href="css/_footer.css" />

  <style>
  body {
    font-family: 'Inter', sans-serif;
    background-color: #f8f9fa;
  }

  .review-form, .reviews-section {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
  }

  .review-form textarea {
    resize: vertical;
    min-height: 120px;
  }

  .form-heading {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 20px;
  }

  @media (max-width: 767.98px) {
    .review-form, .reviews-section {
      margin-bottom: 30px;
    }
  }
</style>
</head>

<?php
    include 'partials/_dbconnect.php'; 
    include 'partials/_navbar.php'; 
  ?>

<!-- Book Details Section -->
<div class="container py-5">
  <div class="row g-4 align-items-start">
   
      <?php
        
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
          $book_id = $_GET['book_id'];
          $name = "";
          $ratings = "";
          $book_disc_price = "";
          $original_price = "";
          $genre = "";
          $publisher = "";
          $page = "";
          $ISBN = "";

          $query = "SELECT * FROM `booklist` WHERE `book_id`=$book_id";
          $result = mysqli_query($conn, $query);

          while ($row = mysqli_fetch_assoc($result)) {
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
            $percentage = round(($retail_price / $original_price) * 100);
          }
          
          echo "
           <!-- Book Image -->
          <div class='col-md-4 text-center'>
            <img src='$image' alt='Book Cover'
              class='img-fluid shadow-sm rounded' style='max-height: 420px;'>
          </div>

           <!-- Book Info -->
          <div class='col-md-8'>
          <h1 class='fw-bold mb-2' style='font-size: 2rem;'>".$name."</h1>
          <p class='text-muted mb-3' style='font-size: 1.05rem;'>".$desc."</p>

          <div class='mb-3'>
          <span class='badge bg-warning' style='font-size: 0.9rem;'>".$ratings."</span>
          </div>
          
          <div class='row mb-3'>
          <div class='col-6 col-lg-4'><strong>Genre:</strong> ".$genre."</div>
          <div class='col-6 col-lg-4'><strong>Pages:</strong> ".$page."</div>
          <div class='col-6 col-lg-4'><strong>Language:</strong> English</div>
          <div class='col-6 col-lg-4'><strong>Publisher:</strong> ".$publisher."</div>
          <div class='col-6 col-lg-4'><strong>ISBN:</strong> ".$ISBN."</div>
          </div>

          <div class='mb-4'>
          <h3 class='text-success fw-bold d-inline'>".$retail_price."</h3>
          <span class='text-muted ms-2' style='text-decoration: line-through;'>".$original_price."</span>
          <span class='text-danger ms-2 fw-semibold'> You Save ".$percentage."%</span>
          </div>";
        }

        ?>

      <div class="d-flex flex-column flex-sm-row gap-3 mb-4">
        <button class="btn btn-success btn-lg w-100 w-sm-auto">Add to Cart</button>
        <button class="btn btn-outline-primary btn-lg w-100 w-sm-auto">Buy Now</button>
      </div>

      <!-- Shipping Information -->
      <div class="bg-white p-3 rounded shadow-sm mb-4">
        <h5 class="fw-bold mb-2">Shipping & Delivery</h5>
        <ul class="mb-0" style="font-size: 0.95rem;">
          <li>🚚 Free Delivery within 3–5 business days</li>
          <li>📦 Packed securely with tracking available</li>
          <li>🔄 Easy 7-day return policy</li>
          <li>🏠 COD Available in major cities</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Review Form -->
  <div class="review-form">
    <div class="form-heading">
      <i class="bi bi-pencil-square me-2"></i>Write a Product Review
    </div>
    <form action="" method="post">
      <input type="hidden" name="book_id" value="<?php echo $book_id ?>">
      <div class="mb-3">
        <textarea name="review" class="form-control" placeholder="Share your thoughts about the product..."></textarea>
      </div>
      <button type="submit" name="submit_review" class="btn btn-primary">
        <i class="bi bi-send me-1"></i>Submit
      </button>
    </form>
  </div>

    <?php 
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $book_id = $_POST['book_id'];
        $review = $_POST['review'];
        $username = $_SESSION['userName'];

        if(!empty($_POST['review'])){
          $query = "INSERT INTO `review` (`book_id`, `username`, `rating`, `review_msg`) 
          VALUES ('$book_id', '$username', '4.5', '$review')";
          $result = mysqli_query($conn, $query);
        }
        header("location: book_details.php?book_id=".$book_id);
      }
    ?>

    <!-- Reviews Section -->
     <div class="bg-white p-4 rounded shadow-sm mt-5">
    <h4 class="fw-bold mb-3">⭐ Customer Reviews</h4>

    <?php
      $review_query = "SELECT * FROM `review` WHERE `book_id`=$book_id";
      $result = mysqli_query($conn, $review_query);
     
      if(mysqli_num_rows($result) > 0){
        while($rows = mysqli_fetch_assoc($result)){
          $username = $rows['username'];
          $review = $rows['review_msg'];

          echo "<div class='border-bottom pb-3 mb-3'>
                <div class='d-flex align-items-center mb-1'>
                  <span class='badge bg-success me-2'>★★★★★</span>
                  <strong>".$username."</strong>
                </div>
                <p class='mb-0' style='font-size: 0.95rem;'>".$review."</p>
              </div>";
        }
      }
    ?>

  </div>
</div>

  <!-- Footer -->
  <footer class="bg-white text-center text-muted py-4 shadow-sm mt-5" style="font-size: 0.9rem;">
    © 2025 BookHarbor. Designed for readers, built for dreamers.
  </footer>

  </body>

</html>