<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GoodsMover - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts and basic CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-image: url('https://images.unsplash.com/photo-1576765607924-e5e6a05c9d03'); /* Truck background */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
            position: relative;
        }

        /* Dark overlay */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.6);
            z-index: 1;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background-color: rgba(0,0,0,0.7);
            z-index: 2;
            position: relative;
        }

        .navbar h1 {
            font-size: 26px;
            color: #fff;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            gap: 30px;
            margin: 0;
        }

        .navbar ul li a {
            color: #ccc;
            text-decoration: none;
            font-size: 16px;
        }

        .navbar ul li a:hover {
            color: #fff;
        }

        .content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding-top: 150px;
        }

        .content h2 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 20px;
            margin-bottom: 40px;
        }

        .content .btn {
            background-color: #f7931e;
            color: #fff;
            padding: 14px 30px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            border-radius: 6px;
            text-decoration: none;
            margin: 10px;
        }

        .btn:hover {
            background-color: #ffa640;
        }

        footer {
            position: relative;
            z-index: 2;
            background-color: rgba(0, 0, 0, 0.6);
            color: #ccc;
            padding: 40px 60px;
            margin-top: 60px;
        }

        footer h3 {
            color: white;
        }

        footer ul {
            list-style: none;
            padding: 0;
        }

        footer ul li a {
            color: #ccc;
            text-decoration: none;
        }

        footer ul li a:hover {
            text-decoration: underline;
        }

        footer .footer-columns {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        footer .footer-column {
            flex: 1;
            min-width: 200px;
            margin-bottom: 20px;
        }

        footer hr {
            margin-top: 30px;
            border-color: #444;
        }

        footer p.copyright {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

    </style>
</head>
<body>
    <div class="overlay"></div>

    <!-- Navbar -->
    <nav class="navbar">
        <h1>GoodsMover</h1>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/login">LOGIN</a></li>
            <li><a href="/register">Register </a></li>
           
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <h2>Find Trucks & Dumpers for Goods Transport</h2>
        <p>Quickly search and book heavy vehicles to move goods from one place to another.</p>
        <a href="/search" class="btn">See Available Vehicles</a>
       
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-columns">
            <!-- About -->
            <div class="footer-column">
                <h3>About GoodsMover</h3>
                <p>GoodsMover is a digital platform to help users find reliable trucks and dumpers to transport goods from one place to another easily and quickly.</p>
            </div>

            <!-- Quick Links -->
            <div class="footer-column">
                <!-- <h3>Quick Links</h3> -->
                <!-- <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/lo">LOGIN</a></li>
                
                </ul> -->
            </div>

            <!-- Contact Info -->
            <div class="footer-column">
                <h3>Contact Us</h3>
                <p>Email: support@goodsmover.com</p>
                <p>Phone: +92 300 1234567</p>
                <p>
                    <a href="#" style="color:#ccc; margin-right: 10px;">Facebook</a>
                    <a href="#" style="color:#ccc; margin-right: 10px;">Twitter</a>
                    <a href="#" style="color:#ccc;">LinkedIn</a>
                </p>
            </div>
        </div>
        <hr>
        <p class="copyright">&copy; {{ date('Y') }} GoodsMover. All rights reserved.</p>
    </footer>

</body>
</html>
