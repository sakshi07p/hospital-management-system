<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration and Login Page</title>
    <style>
        body {
			background-image: url('https://hips.hearstapps.com/hmg-prod/images/types-of-doctors-1600114658.jpg?crop=1.00xw:1.00xh;0,0&resize=1200:*');
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
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .buttons-container {
            text-align: center;
        }

        .buttons-container a {
            text-decoration: none;
            margin: 10px;
        }

        .button {
            padding: 15px 25px;
            font-size: 16px;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div>
    <div class="container">

        <h1>Hospital Management </h1>
        <div class="buttons-container">
            <a href="registration.php"><button class="button">Register</button></a>
            <a href="login.php"><button class="button">Login</button></a>
        </div>
    </div>
</body>
</html>