<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact | BookHarbor</title>
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
            max-width: 1100px;
            margin: auto;
            padding: 4rem 2rem;
        }

        h2.section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .contact-info {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .contact-info h3 {
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .contact-info p {
            margin-bottom: 0.7rem;
            color: #555;
        }

        form {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        form input,
        form textarea {
            width: 100%;
            padding: 0.8rem 1rem;
            margin-bottom: 1.2rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
        }

        form button {
            background-color: var(--accent);
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            font-size: 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        form button:hover {
            background-color: #3657d6;
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

        @media (max-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <?php include 'partials/_navbar.php'; ?>

    <section class="container">
        <h2 class="section-title">Get in Touch</h2>
        <div class="contact-grid">

            <div class="contact-info">
                <h3>📍 Visit Us</h3>
                <p>Near Indra Palace</p>
                <p>123 Hinoo Lane, Ranchi, Jharkhand</p>
                <p>India, 834002</p>

                <h3>📞 Call Us</h3>
                <p>+91 98765 43210</p>
                <p>+91 98765 43210</p>
                <p>+91 98765 43210</p>

                <h3>✉️ Email</h3>
                <p>tanishstark@gmail.com</p>
            </div>

            <form action="#" method="POST">
                <input type="text" name="name" placeholder="Your Name" required />
                <input type="email" name="email" placeholder="Your Email" required />
                <textarea name="message" rows="5" placeholder="Your Message..." required></textarea>
                <button type="submit">Send Message</button>
            </form>

        </div>
    </section>

    <footer>
        &copy; 2025 BookHarbor. All rights reserved.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>