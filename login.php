<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $showError = false;
    include 'db_connect.php';

    $username = $_POST["username"];
    $password = $_POST["password"];

    $checkUserSql = "SELECT * FROM patient WHERE name = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $checkUserSql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $num = mysqli_stmt_num_rows($stmt);

    if ($num == 1) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: home.php");
        exit;
    } else {
        $showError = "Invalid username or password. Please try again.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html> 
<head>
<title> Unity Hospital | Login </title>

<!-- CSS Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Custom CSS -->
<style>
   body {
            background-image: url('hospital.png');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 900px;
            padding: 70px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: #ff0000;
            margin-top: 10px;
            text-align: center;
        }

        p {
            text-align: center;
            margin-top: 15px;

            color: #555;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
</style>

</head>

<body>
<div class="wrapper">
    <!-- Header -->
    <div class="header-v1">
        <!-- Topbar -->
        <div class="topbar-v1">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline top-v1-contacts">
                            <!-- Add your top bar content here -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Form -->
    <div class="container">
        <h2 style="text-align: center;">Login</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <p>Don't have an account? <a href="registration.php">Sign Up</a></p>
        </form>

        <!-- Error Message -->
        <?php
        if (isset($showError) && $showError) {
            echo '<div class="alert alert-danger" role="alert">' . $showError . '</div>';
        }
        ?>
    </div>
</div>

<!-- JavaScript Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
