<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start(); // Ensure session is started

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $showAlert = false;
    $showError = false;
    include 'db_connect.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $check_user_exists = "SELECT * FROM patient WHERE name='$username'";
    $result = mysqli_query($conn, $check_user_exists);
    if (mysqli_num_rows($result) > 0) 
    {
        $exists = true;
        $showError = "Username already exists. Please choose a different username.";
    } 
    else 
    {
        if ($password == $cpassword && !$exists) 
        {
            $sql = "INSERT INTO `patient` (`name`, `password`, `date`) VALUES ('$username', '$password', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) 
            {
                $_SESSION['account_created'] = true;
                header("Location: index.php");
                exit;
            } 
            else 
            {
                $showError = "Passwords do not match.";
            }
        }
        else {
            $showError = "Passwords do not match.";
        }
    }
}
?>

<!DOCTYPE html>
<html> 
<head>
<title> Unity Hospital | Registration </title>

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

    <!-- Registration Form -->
    <div class="container">
        <h2 style="text-align: center;">Sign Up</h2>
        <form action="registration.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" required>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
            <p>Already have an account? <a href="index.php">Login</a></p>
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
<script src="https://code.jquery.com/jquery
