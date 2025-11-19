<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - GoodsMover</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('https://images.unsplash.com/photo-1607011222719-9f9fc981b1ee') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }

        .overlay {
            background-color: rgba(0,0,0,0.7);
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .dashboard-container {
            background: rgba(255,255,255,0.1);
            padding: 40px;
            border-radius: 15px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 0 15px rgba(0,0,0,0.5);
            text-align: center;
        }

        .dashboard-container h2 {
            margin-bottom: 25px;
        }

        .dashboard-button {
            display: block;
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            background-color: #f7931e;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .dashboard-button:hover {
            background-color: #ffa640;
        }
    </style>
</head>
<body>
<div class="overlay">
    <div class="dashboard-container">
        <h2>customer Dashboard</h2>

        <a href="{{ route('customer.seeavailable') }}" class="dashboard-button">See Available</a>
        <a href="{{ route('see.bookedtrip') }}" class="dashboard-button">Trip History</a>
        
        
        <form action="{{ route('user.logout') }}" method="GET">
        <button type="submit" style="background-color:red; color:white; padding:10px; border:none; border-radius:5px;">Logout</button>
       </form>

    </div>

</div>
</body>
</html>
