<?php
session_start();

$showError = false; // Initialize the variable

// Check if the admin is already logged in

// Include database connection file
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = $_POST["admin_username"];
    $admin_password = $_POST["admin_password"];

    // Replace 'admin_table' and 'ad_pass' with your actual table name and password column name
    $sql = "SELECT * FROM admin_table WHERE ad_name='$admin_username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Check if a row is returned
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            // Verify the password
            if ($admin_password == $row['ad_pass']) {
                // Admin is authenticated, set session variable
                $_SESSION['admin_logged_in'] = true;
                header("Location: display_ad.php");
                error_log("Redirecting to display.php after deletion"); // Add this line
                exit();
            } else {
                $showError = true;
            }
        } else {
            $showError = true;
        }
    } else {
        die('Error: ' . mysqli_error($conn));
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 100px;
        }
        .headline {
            text-align: center;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px #000000;
        }
    </style>
</head>
<body>

    <!-- Admin Login Form -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="headline"><h2>Admin Login</h2></div>

                <!-- Display error message if username or password is incorrect -->
                <?php if ($showError): ?>
                    <div class="alert alert-danger" role="alert">
                        Incorrect username or password. Please try again.
                    </div>
                <?php endif; ?>

                <form action="" method="post">
                    <div class="form-group">
                        <label for="admin_username">Username:</label>
                        <input type="text" class="form-control" id="admin_username" name="admin_username" required>
                    </div>
                    <div class="form-group">
                        <label for="admin_password">Password:</label>
                        <input type="password" class="form-control" id="admin_password" name="admin_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div><!--/col-md-4-->
        </div><!--/row-->
    </div><!--/container-->

    <!-- Bootstrap JS and Popper.js (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
