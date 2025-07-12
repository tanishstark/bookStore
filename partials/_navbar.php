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
    <a class="btn btn-success d-flex align-items-center" href="cart.php" role="button" style="gap: 6px; padding: 6px 16px;">
  <span class="material-symbols-outlined" style="font-size: 26px; vertical-align: middle;">add_shopping_cart</span>
  <span style="font-size: 1rem; font-weight: 500;">Cart</span>
</a>';
  
      if($_SESSION['userName'] == 'Admin'){
        echo '<a class="btn btn-outline-dark mx-0" href="admin.php">Admin Dashboard</a>';
      }   
      echo '
        <div class="d-flex align-items-center account-hover" style="gap: 12px; background-color: rgba(68, 145, 86, 0.2); padding: 6px 12px; border-radius: 20px; cursor: pointer; transition: background-color 0.3s ease;">
          <img src="https://img.icons8.com/ios-filled/50/user.png" alt="User Icon" style="width: 28px; height: 28px; border-radius: 50%; background-color:rgb(17, 221, 65);">
          <span class="text-dark fw-medium" style="font-size: 16px;">' . ($_SESSION['userName']) . '</span>
        </div> <a class="btn btn-outline-danger mx-0" href="partials/_logout.php" role="button">Logout</a>
        ';
  } 
  else {
    $showAlert1 = "Login first to see cart";
    echo '<a class="btn btn-success d-flex align-items-center" href="partials/_login.php?visit=' . $showAlert1 . '" role="button" style="gap: 6px; padding: 6px 16px;">
  <span class="material-symbols-outlined" style="font-size: 26px; vertical-align: middle;">add_shopping_cart</span>
  <span style="font-size: 1rem; font-weight: 500;">Cart</span>
</a>
    <a class="btn btn-success d-flex align-items-center" href="partials/_login.php" role="button" style="gap: 6px; padding: 6px 16px;">
  <span class="material-symbols-outlined" style="font-size: 22px; vertical-align: middle;">account_circle</span>
  <span style="font-size: 1rem; font-weight: 500;">Login</span>
</a>
<a class="btn btn-success d-flex align-items-center mx-0" href="partials/_signin.php" role="button" style="gap: 6px; padding: 6px 16px;">
  <span class="material-symbols-outlined" style="font-size: 22px; vertical-align: middle;">switch_account</span>
  <span style="font-size: 1rem; font-weight: 500;">Signin</span>
</a>';
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