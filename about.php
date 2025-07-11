<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About | BookHarbor</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        :root {
            --primary: #1e1e1e;
            --accent: #4a6cf7;
            --light: #f9f9f9;
            --gray: #555;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
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

        section {
            max-width: 1100px;
            margin: auto;
            padding: 4rem 2rem;
        }

        h2.section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            margin-bottom: 2rem;
            text-align: center;
            color: var(--primary);
        }

        p {
            font-size: 1.05rem;
            color: var(--gray);
            margin-bottom: 1.5rem;
        }

        .mission-box {
            background: white;
            padding: 1.5rem;
            border-left: 5px solid var(--accent);
            border-radius: 8px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
            margin-top: 2rem;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .team-member {
            background: white;
            padding: 1rem;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
        }

        .team-member img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 0.7rem;
        }

        .timeline {
            border-left: 3px solid var(--accent);
            padding-left: 1.5rem;
        }

        .timeline-item {
            margin-bottom: 2rem;
        }

        .timeline-item h4 {
            margin-bottom: 0.3rem;
        }

        .testimonials {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .testimonial {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            font-style: italic;
        }

        .faq {
            margin-top: 2rem;
        }

        .faq-item {
            margin-bottom: 1rem;
        }

        .faq input {
            display: none;
        }

        .faq label {
            display: block;
            background: white;
            padding: 1rem;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: background 0.3s;
        }

        .faq label:hover {
            background: #f0f0f0;
        }

        .faq-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
            background: white;
            padding: 0 1rem;
            margin-top: 0.3rem;
            border-left: 3px solid var(--accent);
        }

        .faq input:checked~.faq-content {
            max-height: 300px;
            padding: 1rem;
        }

        footer {
            background-color: white;
            text-align: center;
            padding: 2rem;
            font-size: 0.9rem;
            color: #888;
            border-top: 1px solid #eee;
        }
    </style>
</head>

<body>

    <?php include 'partials/_navbar.php'; ?>

    <section>
        <h2 class="section-title">About BookHarbor</h2>
        <p>BookHarbor is a premium digital bookstore dedicated to readers across the world. Established in 2025, we offer carefully curated collections to bring knowledge, joy, and inspiration to your bookshelf.</p>
        <div class="mission-box">
            <h3>Our Mission</h3>
            <p>To build a global reading culture by connecting readers with stories that change lives — all through a seamless, modern platform.</p>
        </div>
    </section>

    <section>
        <h2 class="section-title">Meet the Team</h2>
        <div class="team-grid">
            <div class="team-member">
                <img src="image/tanish3.jpg" alt="Team Member">
                <h4>Tanish Kumar</h4>
                <p>Backend Developer</p>
            </div>
            <div class="team-member">
                <img src="image/img1.jpg" alt="Team Member">
                <h4>Sanjeevni Dey</h4>
                <p>Backend Developer</p>
            </div>
            <div class="team-member">
                <img src="image/img2.jpg" alt="Team Member">
                <h4>Saurabh Kumar Kushwaha</h4>
                <p>Frontend Developer</p>
            </div>
            <div class="team-member">
                <img src="image/img3.jpg" alt="Team Member">
                <h4>Mohit Rana</h4>
                <p>UI/UX Designer</p>
            </div>
            <div class="team-member">
                <img src="image/img4.jpg" alt="Team Member">
                <h4>Uday Shankar Mehta</h4>
                <p>UI/UX Designer</p>
            </div>

        </div>
    </section>

    <section>
        <h2 class="section-title">What Our Customers Say</h2>
        <div class="testimonials">
            <div class="testimonial">“BookHarbor helped me rediscover my love for reading. The website is clean and easy to use!” – Priya K.</div>
            <div class="testimonial">“Excellent book choices and fast delivery. I highly recommend BookHarbor to all readers!” – Ankit S.</div>
        </div>
    </section>

    <section>
        <h2 class="section-title">Our Journey</h2>
        <div class="timeline">
            <div class="timeline-item">
                <h4>2025</h4>
                <p>Founded in Ranchi with a vision to modernize online book buying.</p>
            </div>
            <div class="timeline-item">
                <h4>2026</h4>
                <p>Launched mobile app and hit 50,000+ active users.</p>
            </div>
            <div class="timeline-item">
                <h4>2027</h4>
                <p>Expanded globally with multi-language support.</p>
            </div>
        </div>
    </section>

    <section>
        <h2 class="section-title">FAQs</h2>
        <div class="faq">
            <div class="faq-item">
                <input type="checkbox" id="faq1">
                <label for="faq1">What is BookHarbor?</label>
                <div class="faq-content">
                    <p>BookHarbor is an online bookstore offering a curated range of books across all genres with fast delivery and great service.</p>
                </div>
            </div>
            <div class="faq-item">
                <input type="checkbox" id="faq2">
                <label for="faq2">Do you ship internationally?</label>
                <div class="faq-content">
                    <p>Yes! We ship to over 30 countries worldwide with reliable delivery partners.</p>
                </div>
            </div>
            <div class="faq-item">
                <input type="checkbox" id="faq3">
                <label for="faq3">Can I return a book?</label>
                <div class="faq-content">
                    <p>Yes, returns are accepted within 7 days of delivery if the book is unused and in original condition.</p>
                </div>
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