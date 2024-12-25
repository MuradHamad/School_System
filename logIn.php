<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .login-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        .login-container form {
            display: flex;
            flex-direction: column;
        }

        .login-container form input {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .login-container form button {
            padding: 10px;
            font-size: 16px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-container form button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
            text-align: center;
        }

        .success {
            color: green;
            font-size: 14px;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h1>Login</h1>
    <?php

    $error = "";


    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Load users from JSON file
        $jsonData = file_get_contents('users.json');
        $users = json_decode($jsonData, true);

        // Check if username exists and password matches
        if (isset($users[$username]) && $users[$username] === $password) {
            echo "<p class='success'>Login successful! Welcome, $username.</p>";
        } else {
            $error = "Invalid username or password.";
        }
    }
    ?>


    <?php if (!empty($error)) : ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>


    <form action="" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
