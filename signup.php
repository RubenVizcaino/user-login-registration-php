<?php
require_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password_hash);

    if ($stmt->execute()) {
        header("Location: login.php?registered=1");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        
        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif; 
        }

        body {
            
            background: linear-gradient(135deg, #4c118f 0%, #7d3ac1 50%, #1e90ff 100%);
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3); 
            width: 350px;
            text-align: center;
            
            color: #ffffff;
            
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        h2 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        
        label {
            display: none; 
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px 12px 45px; 
            
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.4);
            
            border-radius: 30px; 
            color: #ffffff;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            background: rgba(255, 255, 255, 0.3);
            border: 1px solid #ffffff;
        }

        .icon {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.8);
            font-size: 18px;
            
            pointer-events: none; 
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
        }
        
        
        a {
            display: block; 
            margin-top: 20px;
            color: #ff99e6; 
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            
            background: linear-gradient(90deg, #ff99e6 0%, #a064ff 100%);
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        input[type="submit"]:hover {
            opacity: 0.9;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <div class="container">
        <h2>Sign Up</h2>
        <form method="POST" action="">
            
            <div class="input-group">
                <i class="icon fas fa-user"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            
            <div class="input-group">
                <i class="icon fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-group">
                <i class="icon fas fa-key"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="input-group">
                <i class="icon fas fa-lock"></i>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            </div>

            <input type="submit" value="Sign Up">
        </form>

        <a href="login.php">Go to Login</a>
    </div>

</body>

</html>