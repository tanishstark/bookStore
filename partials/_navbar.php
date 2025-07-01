 <?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  include 'partials/_dbconnect.php';


  echo '<header>
  <h1>📚 BookHarbor</h1>
  <nav class="d-flex align-items-center" style="gap: 12px;">';
  echo '
    <a href="home_page.php">Home</a>
    <a href="categories.php">Categories</a>
   
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>';
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '
    <div class="d-flex align-items-center account-hover" style="gap: 12px; background-color: rgba(68, 117, 145, 0.2); padding: 6px 12px; border-radius: 20px; cursor: pointer; transition: background-color 0.3s ease;">
      <img src="https://img.icons8.com/ios-filled/50/user.png" alt="User Icon" style="width: 28px; height: 28px; border-radius: 50%; background-color:rgb(17, 142, 221);">
      <span class="text-dark fw-medium" style="font-size: 16px;">' . ($_SESSION['userName']) . '</span>
    </div>
    <a class="btn btn-outline-danger mx-0" href="partials/_logout.php" role="button">Logout</a>
    ';
  } else {
    echo '<a class="btn btn-primary" href="partials/_login.php" role="button">Login</a>
    <a class="btn btn-primary mx-0" href="partials/_signin.php" role="button">Signin</a>';
  }
  echo '</nav>
</header>';

  ?>


 <?php
  if (isset($_GET['signInSuccess'])) {
    $msg = $_GET['signInSuccess'];
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> ' . $msg . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  } else {
    if (isset($_GET['error'])) {
      $msg = $_GET['error'];
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Failed!</strong> ' . $msg . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
  }


  ?>