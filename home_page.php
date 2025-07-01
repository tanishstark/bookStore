<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BookHarbor | Home</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    :root {
      --primary: #1e1e1e;
      --secondary: #f9f9f9;
      --accent: #4a6cf7;
      --text: #333;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--secondary);
      color: var(--text);
    }

    header {
      background-color: #fff;
      padding: 1.5rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    header h1 {
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      color: var(--primary);
    }

    nav a {
      margin-left: 2rem;
      text-decoration: none;
      color: var(--primary);
      font-weight: 500;
      transition: color 0.3s ease;
    }

    nav a:hover {
      color: var(--accent);
    }

    .account-hover:hover {
      background-color: rgba(232, 191, 191, 0.42) !important;
    }

    .hero {
      background: url('image/banner1.jpeg') no-repeat center/cover;
      height: 75vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: white;
      padding: 2rem;
      position: relative;
    }

    .hero::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .hero-content {
      position: relative;
      z-index: 1;
    }

    .hero h2 {
      font-family: 'Playfair Display', serif;
      font-size: 3rem;
      margin-bottom: 1rem;
    }

    .hero p {
      font-size: 1.2rem;
      max-width: 600px;
      margin: auto;
    }

    section {
      padding: 4rem 2rem;
      max-width: 1200px;
      margin: auto;
    }

    .section-title {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 2rem;
      text-align: center;
      font-family: 'Playfair Display', serif;
      color: var(--primary);
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
    }

    .card {
      background: #fff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
      transition: transform 0.3s;
    }

    .card:hover {
      transform: translateY(-6px);
    }

    .card img {
      width: 100%;
      height: 260px;
      object-fit: cover;
    }

    .card-content {
      padding: 1rem;
    }

    .card-content h3 {
      font-size: 1.2rem;
      margin-bottom: 0.5rem;
    }

    .card-content p {
      font-size: 0.95rem;
      color: #666;
    }

    footer {
      background-color: #fff;
      text-align: center;
      padding: 2rem;
      font-size: 0.9rem;
      color: #888;
      border-top: 1px solid #eee;
    }

    @media (max-width: 768px) {
      .hero h2 {
        font-size: 2rem;
      }

      .hero p {
        font-size: 1rem;
      }

      nav a {
        margin-left: 1rem;
      }
    }
  </style>
</head>

<body>
  <?php include 'partials/_dbconnect.php'; ?>
  <?php include 'partials/_navbar.php'; ?>

  <section class="hero">
    <div class="hero-content">
      <h2>Uncover the Joy of Reading</h2>
      <p>Thousands of books, one cozy harbor. Explore your next favorite title today.</p>
    </div>
  </section>

  <section>
    <h2 class="section-title">Popular Categories</h2>
    <div class="grid">

      <?php
      $sql = "SELECT * FROM `popular`";
      $result = mysqli_query($conn, $sql);
      $po_change_img = 1;
      while ($row = mysqli_fetch_assoc($result)) {
        $po_name = $row['book_name'];
        $po_desc = $row['book_desc'];
        $po_id = $row['popular_id'];
        echo '<div class="card">
        <a href="book_list.php?po_id=' . $po_id . '&category=' . $po_name . '"><img src="image/p' . $po_change_img . '.jpeg" alt="Fiction"></a>
        <div class="card-content">
          <h3><a class="text-decoration-none text-dark" href="book_list.php?po_id=' . $po_id . '&category=' . $po_name . '">' . $po_name . '</a></h3>
          <p><a class="text-decoration-none text-dark" href="book_list.php?po_id=' . $po_id . '&category=' . $po_name . '">' . $po_desc . '</a></p>
        </div>
      </div>';
        $po_change_img++;
      }
      ?>
  </section>

  <section>
    <h2 class="section-title">Featured Books</h2>
    <div class="grid">


      <?php
      $sql = "SELECT * FROM `feature_book`";
      $result = mysqli_query($conn, $sql);
      $fe_change_img = 1;
      while ($row = mysqli_fetch_assoc($result)) {
        $fe_name = $row['feature_name'];
        $fe_desc = $row['feature_desc'];
        $fe_id = $row['feature_id'];
        echo '<div class="card">
        <img src="image/f' . $fe_change_img . '.jpeg" alt="Educated">
        <div class="card-content">
          <h3>' . $fe_name . '</h3>
          <p>' . $fe_desc . '</p>
        </div>
      </div>';
        $fe_change_img++;
      }
      ?>

    </div>
  </section>

  <footer>
    &copy; 2025 BookHarbor. All rights reserved.
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>