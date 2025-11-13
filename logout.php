<?php
session_start();
$_SESSION = array();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #4c118f 0%, #7d3ac1 50%, #1e90ff 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 350px;
            color: #ffffff;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        h2 {
            color: #ffccff; 
            margin-bottom: 20px;
            font-size: 26px;
            font-weight: 600;
        }

        p {
            margin-bottom: 30px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 16px;
        }

        a {
            display: inline-block;
            padding: 12px 25px;
            background: linear-gradient(90deg, #ff99e6 0%, #a064ff 100%);
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 30px; 
            font-weight: 600;
            font-size: 16px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        a:hover {
            opacity: 0.9;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }
    </style>
    <meta http-equiv="refresh" content="3;url=login.php">
</head>

<body>

    <div class="container">
        <h2>You have logged out</h2>
        <p>Redirecting to the login page in a few seconds...</p>
        <a href="login.php">Go to Login now</a>
    </div>


</body>

</html>