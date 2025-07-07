<?php
  session_start();
  include 'partials/_dbconnect.php';
  include 'partials/_navbar.php';

  if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['deleteId'])){
    $book_id = $_GET['deleteId'];
    try{
      $query = "DELETE FROM `booklist` WHERE `book_id` = $book_id";
      $result = mysqli_query($conn, $query);

      if($result){
        $_SESSION['adminSuccess'] = "Record Deleted";
        header("location: admin.php");
        exit();
      }
      else{
        $_SESSION['adminFail'] = "Record is not deleted.";
        header("location: admin.php");
        exit();
      }
      exit();
    }
    catch(mysqli_sql_exception $e){
      $_SESSION['adminFail'] = "Database error: " . $e->getMessage();
    }
  }

  if (isset($_SESSION['adminSuccess'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> ' . htmlspecialchars($_SESSION['adminSuccess']) . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    unset($_SESSION['adminSuccess']);
  }
  else if (isset($_SESSION['adminFail'])) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> ' . htmlspecialchars($_SESSION['adminFail']) . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      unset($_SESSION['adminFail']);
  }

  if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit_edit'])){
    $book_id = $_POST['bookId'];
    $title = $_POST['titleEdit'];
    $desc = $_POST['descEdit'];
    $image = $_POST['imageEdit'];
    $retail_price = $_POST['retail_priceEdit'];
    $org_price = $_POST['org_priceEdit'];
    $genre = $_POST['genreEdit'];
    $pages = $_POST['pagesEdit'];
    $publisher = $_POST['publisherEdit'];
    $isbn = $_POST['isbnEdit'];
    $category = $_POST['categoryEdit'];
    
    try{
      $query = "UPDATE `booklist` SET `image` = '$image', `book_desc` = '$desc', `po_category_id` = '$category', `book_title` = '$title', `ratings` = '★★★★★ (4.8/5)', `book_disc_price` = '$retail_price', `original_price` = '$org_price', `genre` = '$genre', `page` = '$pages', `publisher` = '$publisher', `ISBN` = '$isbn' WHERE `book_id` = $book_id";
      $result= mysqli_query($conn, $query);

      if($result){
        $_SESSION['adminSuccess'] = "Record Updated successfully";
        header("Location: /my_book_store/admin.php");
        exit();
      }
      else{
        $_SESSION['adminFail'] = "No Record Updated. Try Again!";
        header("Location: /my_book_store/admin.php");
        exit();
      }
    }
    catch(mysqli_sql_exception $e){
      $_SESSION['adminFail'] = "Database error: " . $e->getMessage();
    }
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_book'])){
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $image = $_POST['image'];
    $retail_price = $_POST['retail_price'];
    $org_price = $_POST['org_price'];
    $genre = $_POST['genre'];
    $pages = $_POST['pages'];
    $publisher = $_POST['publisher'];
    $isbn = $_POST['isbn'];
    $category = $_POST['category'];
    // $ratings = $_POST['ratings'];

    try{
      $query = "INSERT INTO `booklist` 
      (`book_id`, `image`, `book_desc`, `po_category_id`, `book_title`, `ratings`, `book_disc_price`, `original_price`, `timestamp`, `genre`, `page`, `publisher`, `ISBN`) 
      VALUES 
      (NULL, '$image' , '$desc', '$category', '$title', '★★★★☆ (4.6/5)', '$retail_price', '$org_price', current_timestamp(), '$genre', '$pages', '$publisher', '$isbn')";

      $result = mysqli_query($conn, $query);
      if($result){
          $_SESSION['adminSuccess'] = "Record added successfully";
          header("Location: /my_book_store/admin.php");
          exit();
      }
      else{
        $_SESSION['adminFail'] = "No Record Added. Try Again!";
        header("Location: /my_book_store/admin.php");
        exit();
      }
    }
    catch(mysqli_sql_exception $e){
      $_SESSION['adminFail'] = "Database error: " . $e->getMessage();
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/_navbar_style.css" />
  <link rel="stylesheet" href="css/_footer.css" />
  <link rel="stylesheet" href="css/_admin.css" />
</head>
<body>
  <div class="modal fade custom-modal" id="myModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="fw-semibold text-primary modal-title" id="modalLabel"><i class="bi bi-pencil me-2"> Update Book Records</i></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-lg"></i>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
              <input type="hidden" name="bookId" id="bookId">
              <div class="row g-3">
                <div class="col-md-4">
                <label for="imageEdit" class="form-label">Image</label>
                <textarea id="imageEdit" name="imageEdit" class="form-control" placeholder="Upload image" rows="4" required></textarea>
              </div>
              <div class="col-md-4">
                <label for="titleEdit" class="form-label">Book Title</label>
                <textarea id="titleEdit" name="titleEdit" class="form-control" placeholder="Enter title" rows="4" required></textarea>
              </div>
              <div class="col-md-4">
                <label for="publisherEdit" class="form-label">Publisher</label>
                <input type="text" id="publisherEdit" name="publisherEdit" class="form-control" placeholder="Enter publisher" required />
              </div>
              <div class="col-md-4">
                <label for="retail_priceEdit" class="form-label">Retail_price</label>
                <input type="number" id="retail_priceEdit" name="retail_priceEdit" class="form-control" placeholder="Enter retail_price" required />
              </div>
              <div class="col-md-4">
                <label for="org_priceEdit" class="form-label">Original Price</label>
                <input type="number" id="org_priceEdit" name="org_priceEdit" class="form-control" placeholder="Enter original price" required/>
              </div>
              <!-- <div class="col-md-4">
                <label for="ratings" class="form-label">Ratings</label>
                <input type="number" id="ratings" class="form-control" placeholder="Enter ratings" />
              </div> -->
              <div class="col-md-4">
                <label for="genreEdit" class="form-label">Genre</label>
                <input type="text" id="genreEdit" name="genreEdit" class="form-control" placeholder="Enter genre" required/>
              </div>
              <div class="col-md-4">
                <label for="pagesEdit" class="form-label">Number of Pages</label>
                <input type="number" id="pagesEdit" name="pagesEdit" class="form-control" placeholder="Enter pages" required/>
              </div>
              <div class="col-md-4">
                <label for="isbnEdit" class="form-label">ISBN</label>
                <input type="number" id="isbnEdit" name="isbnEdit" class="form-control" placeholder="Enter ISBN number" required/>
              </div>
              <div class="col-md-4">
                <label for="categoryEdit" class="form-label">Category</label>
                <input type="text" id="categoryEdit" name="categoryEdit" class="form-control" placeholder="Enter Category" required/>
              </div>
            </div>
            </div>
            <div class="col mt-4 mb-4">
              <label for="descEdit" class="form-label">Book Description</label>
              <textarea id="descEdit" name="descEdit" class="form-control" placeholder="Enter description" rows="7" required></textarea>
            </div>

            <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="submit_edit" class="btn btn-primary">Confirm</button>
        </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="container">

    <h1 class="m-4 fw-bold text-primary">👤 Admin Dashboard</h1>

    <?php
      $query1 = "SELECT * FROM `users`";
      $result1 = mysqli_query($conn, $query1);
      $users = mysqli_num_rows($result1);

      $query2 = "SELECT * FROM `booklist`";
      $result2 = mysqli_query($conn, $query2);
      $books = mysqli_num_rows($result2);

      echo "<div class='row mb-4'>
          <div class='col-md-6'>
              <div class='stat-box stat-users d-flex justify-content-between align-items-center'>
              <div>
                  <h5 class='fw-semibold'>Total Users</h5>
                  <h3>$users</h3>
              </div>
              <i class='bi bi-people-fill fs-1'></i>
              </div>
          </div>
          <div class='col-md-6'>
              <div class='stat-box stat-books d-flex justify-content-between align-items-center'>
              <div>
                  <h5 class='fw-semibold'>Total Books</h5>
                  <h3>$books</h3>
              </div>
              <i class='bi bi-book-half fs-1'></i>
              </div>
          </div>
          </div>";
    ?>

    <!-- Add Book Form -->
    <div class="form-section">
      <h4 class="mb-4 fw-semibold text-success">➕ Add New Book</h4>
      <form action="" method="POST">
        <div class="row g-3">
          <div class="col-md-4">
            <label for="image" class="form-label">Image</label>
            <input type="text" id="image" name="image" class="form-control" placeholder="Upload image" required/>
          </div>
          <div class="col-md-4">
            <label for="title" class="form-label">Book Title</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Enter title" required/>
          </div>
          <div class="col-md-4">
            <label for="retail_price" class="form-label">Retail_price</label>
            <input type="number" id="retail_price" name="retail_price" class="form-control" placeholder="Enter retail_price" required/>
          </div>
          <div class="col-md-4">
            <label for="org_price" class="form-label">Original Price</label>
            <input type="number" id="org_price" name="org_price" class="form-control" placeholder="Enter original price" required/>
          </div>
          <!-- <div class="col-md-4">
            <label for="ratings" class="form-label">Ratings</label>
            <input type="number" id="ratings" class="form-control" placeholder="Enter ratings" />
          </div> -->
          <div class="col-md-4">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" id="genre" name="genre" class="form-control" placeholder="Enter genre" required/>
          </div>
          <div class="col-md-4">
            <label for="pages" class="form-label">Number of Pages</label>
            <input type="number" id="pages" name="pages" class="form-control" placeholder="Enter pages" required/>
          </div>
          <div class="col-md-4">
            <label for="publisher" class="form-label">Publisher</label>
            <input type="text" id="publisher" name="publisher" class="form-control" placeholder="Enter publisher" required/>
          </div>
          <div class="col-md-4">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="number" id="isbn" name="isbn" class="form-control" placeholder="Enter ISBN number" required/>
          </div>
          <div class="col-md-4">
            <label for="category" class="form-label">Category</label>
            <input type="text" id="category" name="category" class="form-control" placeholder="Enter category" required/>
          </div>
        </div>
        <div class="col mt-4 mb-4">
            <label for="desc" class="form-label">Book Description</label>
            <textarea id="desc" name="desc" class="form-control" placeholder="Enter description" rows="4" required></textarea>
        </div>
        <div class="col-12 mt-3">
          <button type="submit" name="add_book" id="add_book" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Add Book
          </button>
        </div>
      </form>
    </div>

    <!-- Book Table with Search -->
    <div class="form-section mt-4">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-semibold text-primary">📖 Book Records</h4>
        <input type="text" id="searchInput" class="form-control search-input" placeholder="🔍 Search books..." />
      </div>

      <table class="table table-striped">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Title</th>
            <!-- <th>Description</th>
            <th>Image</th> -->
            <th>Retail Price</th>
            <th>Original Price</th>
            <th>Genre</th>
            <th>Pages</th>
            <th>Publisher</th>
            <th>ISBN</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="bookTable">

      <?php
        $query = "SELECT * FROM `booklist`";
        $result = mysqli_query($conn, $query);
        $slno = 1;

        while($rows = mysqli_fetch_assoc($result)){
          echo 
              "<tr>
                <td>".$slno."</td>
                <td>".$rows['book_title']."</td>
                <td>".$rows['book_disc_price']."</td>
                <td>".$rows['original_price']."</td>
                <td>".$rows['genre']."</td>
                <td>".$rows['page']."</td>
                <td>".$rows['publisher']."</td>
                <td>".$rows['ISBN']."</td>

                <td>
                  <button style='width:75px' type='button' class='edit btn btn-sm btn-warning mb-2' id=".$rows['book_id']." data-bs-toggle='modal' data-bs-target='#myModal'><i class='bi bi-pencil-square'></i>Edit</button>
                  <button type='button' class='delete btn btn-sm btn-danger' id=".$rows['book_id']."><i class='bi bi-trash'></i> Delete</button>
                </td>
                <td style= 'display: none;'>".$rows['book_desc']."</td>
                <td style= 'display: none;'>".$rows['image']."</td>
              </tr>";
          $slno++;
        }
      ?>
        </tbody>
      </table>
    </div>
  </div>
  
  <script>      
    const searchInput = document.getElementById("searchInput");
    const bookTable = document.getElementById("bookTable");

    searchInput.addEventListener("keyup", function () {
      const filter = searchInput.value.toLowerCase();
      const rows = bookTable.getElementsByTagName("tr");

      for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName("td");
        let match = false;
        for (let j = 1; j < cells.length - 1; j++) {
          if (cells[j].innerText.toLowerCase().includes(filter)) {
            match = true;
            break;
          }
        }
        rows[i].style.display = match ? "" : "none";
      }
    });

    //js for modal
    edits = document.querySelectorAll('.edit');
    deletes = document.querySelectorAll('.delete');

    edits.forEach((elem) => {
      elem.addEventListener('click', (e)=>{
        // console.log(e.target);
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[1].innerText;
        retail_price = tr.getElementsByTagName("td")[2].innerText;
        org_price = tr.getElementsByTagName("td")[3].innerText;
        genre = tr.getElementsByTagName("td")[4].innerText;
        page = tr.getElementsByTagName("td")[5].innerText;
        publisher = tr.getElementsByTagName("td")[6].innerText;
        isbn = tr.getElementsByTagName("td")[7].innerText;
        desc = tr.getElementsByTagName("td")[9].innerText;
        image = tr.getElementsByTagName("td")[10].innerText;

        bookId.value = e.target.id;
        titleEdit.value = title;
        retail_priceEdit.value = retail_price;
        org_priceEdit.value = org_price;
        genreEdit.value = genre;
        pagesEdit.value = page;
        publisherEdit.value = publisher;
        isbnEdit.value = isbn;
        imageEdit.value = image;
        descEdit.value = desc;
      })
    })

    deletes.forEach((elem) => {
      elem.addEventListener("click", (d) => {
        console.log("delete ", d.target);
        tr = d.target.parentNode.parentNode;
        bookId = d.target.id;
        title = tr.getElementsByTagName("td")[1].innerText;

        if (confirm(`Are you sure you want to delete "${title}"?`)) {
          window.location = `admin.php?deleteId=${bookId}`;   //get request
        }
      })
    })
  </script>

  <!-- bootsrap js for modal section -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

  <footer class="bg-white text-center text-muted py-4 shadow-sm mt-5" style="font-size: 0.9rem;">
    © 2025 BookHarbor. Designed for readers, built for dreamers.
  </footer>

</html>
