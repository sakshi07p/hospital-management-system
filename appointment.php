<?php
session_start(); // Ensure session is started

include 'db_connect.php';

$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST['number']; 
    $purpose = $_POST['subject'];
    $dept = $_POST['Department'];

    // Prepare the SQL statement using prepared statements
    $sql = "INSERT INTO `appointment` (`name`, `email`, `mobile`, `purpose`, `dept`, `date`) VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";

    // Initialize a prepared statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters with values and execute the statement
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $mobile, $purpose, $dept);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $showAlert = true; // Show success message
        
        // Error handling
        $showError = "Error: " . mysqli_error($conn);
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}
?>



<!DOCTYPE html>
<html> 
<head>
	<title> Unity Hospital | Appointment </title>


		<!-- Web Fonts -->
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin">

		<!-- CSS Global Compulsory -->
		<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/style.css">

		<!-- CSS Header and Footer -->
		<link rel="stylesheet" href="assets/css/header.css">
		<link rel="stylesheet" href="assets/css/footer.css">

		<!-- CSS Implementing Plugins -->
		<link rel="stylesheet" href="assets/plugins/line-icons-pro/styles.css">
		<link rel="stylesheet" href="assets/plugins/line-icons/line-icons.css">
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
		<link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">

		<!-- CSS Customization -->
		<link rel="stylesheet" href="assets/css/custom.css">

</head>

<body>


	<!--=== Heading ===-->
	<div class="container content">
	<div class="row " style="margin-bottom: 30px;">
	<div class="col-md-9 " style="margin-bottom: 30px;">
	<div class="headline"><h2>Appointment Form</h2></div>

				<!--=== APPOINTMENT FORM ===-->
				<form action="" method="post" class="sky-form sky-changes-3">
				<fieldset>
				<div class="row">
				<section class="col col-6">
				<label class="label">Name</label>
				<label class="input">
				<i class="icon-append fa fa-user"></i>
				<input type="text" name="name" id="name" required="">
				</label>
				</section>
				<section class="col col-6">
				<label class="label">E-mail</label>
				<label class="input">
				<i class="icon-append fa fa-envelope-o"></i>
				<input type="email" name="email" id="email" required="">
				</label>
				</section>
				</div>

				<section>
				<label class="label">Purpose Of Appointment</label>
				<label class="input">
				<i class="icon-append fa fa-tag"></i>
				<input type="text" name="subject" id='subject' required="">
				</label>
				</section>

				<section>
				<label class="label">Mobile Number</label>
				<label class="input">
				<i class="icon-append fa fa-phone"></i>
				<input type="text" name="number" id="number" required="">
				</label>
				</section> 	

				<section>
				<label class="select">
				<select name="Department" required="">
				<option value="" selected="" disabled="">Select Department</option>
				<option>Cardiology</option>
				<option>Dermatology and Cosmetology</option>
				<option>General Surgery</option>
				<option>Health Checkup Packages</option>
				<option>Neurology</option>
				</select>
				<i></i>
				</label>
				</section>
				<div class="row">
				<section class="col col-6">
				<label class="date">Select Date</label>
				<label class="input">
				<i class="icon-append fa fa-calendar"></i>
				<input type="date" required="">
				</label>
				</section>
				<div class="alert alert-success successBox">
				<button type="button" class="close" ></button>
				</div>

				</fieldset>

				<footer>
				<button type="submit" class="btn-u">Send message</button>
				</footer>


				</form>
				</div><!--/col-md-9-->

				<?php if ($showAlert): ?>
    <div class="alert alert-success" role="alert">
        Congratulations! Your appointment has been booked successfully.
    </div>
<?php endif; ?>



		<!-- Address -->
		<div class="col-md-3 map-img " style="margin-bottom: 40px;">
		<div class="headline"><h2>Contact Us</h2></div>
		<address class="" style="margin-bottom: 40px;">
		Unity Hospital <br />
		Ahmedabad, IN <br />
		Phone: 886 666 00555 <br />
		Email: unityhospital@gmail.com 
		</address>
		</div><!--/col-md-3-->
		<!-- End Address -->

		

</body>
</html>
