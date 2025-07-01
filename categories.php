<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Categories | BookHarbor</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        :root {
            --primary: #1e1e1e;
            --accent: #4a6cf7;
            --light: #f9f9f9;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light);
            color: var(--primary);
            line-height: 1.6;
        }

        header {
            background-color: white;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
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

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 4rem 2rem;
        }

        h2.section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 2rem;
        }

        .category-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: transform 0.3s;
            text-align: center;
        }

        .category-card:hover {
            transform: translateY(-5px);
        }

        .category-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .category-card h3 {
            padding: 1rem;
            font-size: 1.2rem;
        }

        footer {
            background-color: white;
            text-align: center;
            padding: 2rem;
            font-size: 0.9rem;
            color: #888;
            border-top: 1px solid #eee;
            margin-top: 3rem;
        }
    </style>
</head>

<body>

    <?php include 'partials/_navbar.php'; ?>

    <section class="container">
        <h2 class="section-title">Explore Book Categories</h2>
        <!-- Place this inside <section class="container"> just above the .grid -->
        <div style="display: flex; flex-wrap: wrap; gap: 1rem; margin-bottom: 2rem; align-items: center;">
            <input type="text" placeholder="Search categories..." style="
    flex: 1;
    min-width: 200px;
    padding: 0.75rem;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 1rem;
  ">

            <select style="
    padding: 0.75rem;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 1rem;
  ">
                <option>Sort by</option>
                <option>Popular</option>
                <option>Newest</option>
                <option>A-Z</option>
            </select>
        </div>

        <div class="grid">
            <div class="category-card">
                <img src="image/friction.jpeg" alt="Fiction">
                <h3>Fiction</h3>
            </div>
            <div class="category-card">
                <img src="image/Science.jpg" alt="Science">
                <h3>Science</h3>
            </div>
            <div class="category-card">
                <img src="image/selfhelf.jpg" alt="Self Help">
                <h3>Self Help</h3>
            </div>
            <div class="category-card">
                <img src="image/biography.jpg" alt="Biographies">
                <h3>Biographies</h3>
            </div>
            <div class="category-card">
                <img src="image/child.jpg" alt="Children">
                <h3>Children's Books</h3>
            </div>
            <div class="category-card">
                <img src="image/history.jpg" alt="History">
                <h3>History</h3>
            </div>
            <div class="category-card">
                <img src="image/technology.jpg" alt="Technology">
                <h3>Technology</h3>
            </div>
            <div class="category-card">
                <img src="image/comic.jpg" alt="Comics">
                <h3>Comics & Manga</h3>
            </div>
        </div>
    </section>

    <footer>
        &copy; 2025 BookHarbor. All rights reserved.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>