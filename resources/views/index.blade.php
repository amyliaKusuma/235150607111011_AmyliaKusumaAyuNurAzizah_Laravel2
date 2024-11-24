<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to HTMX Go Blog</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }

        .navbar {
            background: white;
            padding: 1rem 5%;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-brand {
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
        }

        .nav-brand span:nth-child(1) { color: #007bff; }
        .nav-brand span:nth-child(2) { color: #dc3545; }
        .nav-brand span:nth-child(3) { color: #ffc107; }
        .nav-brand span:nth-child(4) { color: #28a745; }

        .nav-link {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #007bff;
        }

        .hero {
            height: 100vh;
            background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/api/placeholder/1920/1080');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 0 1rem;
        }

        .hero-content {
            max-width: 800px;
        }

        .hero-title {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
        }

        .hero-title span:nth-child(1) { color: #007bff; }
        .hero-title span:nth-child(2) { color: #dc3545; }
        .hero-title span:nth-child(3) { color: #ffc107; }
        .hero-title span:nth-child(4) { color: #28a745; }

        .hero-description {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .cta-button {
            display: inline-block;
            padding: 1rem 2rem;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            transition: transform 0.3s, background 0.3s;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            background: #218838;
        }

        .about-section {
            padding: 5rem 1rem;
            background: white;
        }

        .about-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .about-title {
            font-size: 2.5rem;
            margin-bottom: 2rem;
        }

        .about-title span:nth-child(1) { color: #dc3545; }
        .about-title span:nth-child(2) { color: #ffc107; }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-links">
            <a href="/" class="nav-brand">
                <span>HTMX</span>
                <span>Go</span>
                <span>Blog</span>
                <span>App</span>
            </a>
            <a href="/blogs" class="nav-link">List Blogs</a>
            @guest
                <a href="/register" class="nav-link">Daftar</a>
                <a href="/login" class="nav-link">Masuk</a>
            @else
            <a href="/tambah" class="nav-link">Create Blog</a>
            <form action="/logout" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="nav-link" style="background: none; border: none; cursor: pointer;">Keluar</button>
            </form>
        @endguest
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">
                Welcome to <span>HTMX</span> <span>Go</span> <span>Blog</span> <span>App</span>
            </h1>
            <p class="hero-description">
                Discover a world of insights, stories, and expertise. Share your thoughts and connect with fellow writers in our creative community.
            </p>
            <a href="/register" class="cta-button">Start Writing</a>
        </div>
    </section>

    <section class="about-section">
        <div class="about-content">
            <h2 class="about-title">About <span>U</span><span>s</span></h2>
            <p class="about-description">
                Welcome to HTMX Go Blog App — a space for sharing insights, stories, and expertise. Our mission is to connect readers with inspiring content across a variety of topics, from technology and lifestyle to personal growth and creativity. Our team of dedicated writers and enthusiasts is passionate about delivering quality content that informs, inspires, and engages.
            </p>
        </div>
    </section>
</body>
</html>