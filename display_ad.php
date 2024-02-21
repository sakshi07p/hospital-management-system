<?php
include 'db_connect.php';

// Fetch all appointments from the database
$sql = "SELECT * FROM appointment";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Error: ' . mysqli_error($conn));
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (head content remains the same) ... -->
</head>
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Roboto', sans-serif;
    }
    .container {
        margin-top: 50px;
    }
    .headline {
        text-align: center;
        margin-bottom: 30px;
    }
    table {
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid #dee2e6;
    }
    th, td {
        padding: 12px;
        text-align: left;
    }
    th {
        background-color: #007bff;
        color: #fff;
    }
    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    p.no-appointments {
        text-align: center;
    }
</style>
<body>
    <!-- Display Appointments -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="headline"><h2>Appointments List</h2></div>

                <?php
                // Check if there are appointments to display
                if (mysqli_num_rows($result) > 0) {
                    echo '<table class="table">';
                    echo '<thead><tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Purpose</th>
                    <th>Department</th>
                    <th>Date</th>
                    </tr>
                    </thead>';
                    echo '<tbody>';

                    // Output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['mobile'] . '</td>';
                        echo '<td>' . $row['purpose'] . '</td>';
                        echo '<td>' . $row['dept'] . '</td>';
                        echo '<td>' . $row['date'] . '</td>';

                        echo '</tr>';
                    }
                    echo '</tbody></table>';
                } else {
                    echo '<p class="no-appointments">No appointments found.</p>';
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </div><!--/col-md-12-->
        </div><!--/row-->
    </div><!--/container-->

    <!-- Bootstrap JS and Popper.js (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>