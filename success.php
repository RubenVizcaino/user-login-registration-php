<?php
session_start();
require_once 'db_config.php';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}



$result = $conn->query("SELECT username, email, created_at FROM users");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        
        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            
            background: linear-gradient(135deg, #4c118f 0%, #7d3ac1 50%, #1e90ff 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .container {
            max-width: 850px;
            margin: 50px auto;
            
            background: rgba(255, 255, 255, 0.15);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
            color: #ffffff; 
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 32px;
            font-weight: 700;
            color: #ffccff; 
        }
        
        h3 {
            margin-top: 30px;
            margin-bottom: 15px;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 600;
            border-bottom: 2px solid rgba(255, 255, 255, 0.3);
            padding-bottom: 5px;
        }

        p {
            text-align: center;
            margin-bottom: 30px;
        }

        
        a {
            display: inline-block;
            color: #ff99e6; 
            text-decoration: none;
            font-weight: 600;
            padding: 5px 10px;
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        a:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.2);
            text-decoration: none;
        }

        
        table {
            width: 100%;
            border-collapse: separate; 
            border-spacing: 0;
            margin-top: 20px;
            overflow: hidden; 
            border-radius: 10px;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border: none;
        }

        th {
            background: linear-gradient(90deg, #ff99e6 0%, #a064ff 100%);
            color: white;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            background-color: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        tr:last-child td {
            border-bottom: none; 
        }

        tr:nth-child(even) td {
            background-color: rgba(255, 255, 255, 0.05);
        }

        tr:hover td {
            background-color: rgba(255, 255, 255, 0.2);
            transition: background-color 0.3s ease;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h2>
        <p><a href="logout.php">Logout</a></p>

        <h3>Registered Users:</h3>
        <table>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Created At</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row["username"]); ?></td>
                    <td><?php echo htmlspecialchars($row["email"]); ?></td>
                    <td><?php echo htmlspecialchars($row["created_at"]); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>

</html>