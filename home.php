<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = false;
    $showError = false;
    include 'db_connect.php';
    $name = $_POST["name"];
    $password = $_POST["password"];

    // Use prepared statements to prevent SQL injection
    $checkUserSql = "SELECT * FROM patient WHERE name = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $checkUserSql);
    mysqli_stmt_bind_param($stmt, "ss", $name, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $num = mysqli_stmt_num_rows($stmt);

    if ($num == 1) {
        $login = true;
        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $name;
        header("location: index.php");
        exit;
    } else {
        $showError = "Incorrect password. Please try again.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html> 
<head>
<title> Unity Hospital | Home </title>

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

		<!-- CSS Customization -->
		<link rel="stylesheet" href="assets/css/custom.css">

</head>

<body>
	<div class="wrapper">
	<!--=== Header v1 ===-->
	<div class="header-v1">
	<!-- Topbar -->
	<div class="topbar-v1">
	<div class="container">
	<div class="row">
	<div class="col-md-6">
		
</div>
</div>

	<!-- Navbar -->
	<div class="navbar mega-menu" role="navigation">
				<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="res-container">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>

				<div class="navbar-brand">
				<a href="index.html">
				<img src="assets/img/logo/unity_white.jpg" alt="Logo"/>
				</a>
				</div>
				</div><!--/end responsive container-->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-responsive-collapse">
				<div class="res-container">
				<ul class="nav navbar-nav">

				<!-- Collect the nav links, forms, and other content for toggling -->


				<!-- Home  -->
				<li class="mega-menu-fullwidth">
				<a href="index.php" >
				HOME
				</a>

				</li>
				<!-- End Home-->

				<!-- About Us -->
				<li class="mega-menu-fullwidth">
				<a href="about.html" >
				ABOUT US
				</a>	
				</li>
				<!-- End About us -->

				<!-- Doctors -->
				<li class="mega-menu-fullwidth">
				<a href="ad_login.php" >
				ADMIN LOGIN
				</a>

				</li>

				<!-- Contact Us -->
				<li class="mega-menu-fullwidth">
				<a href="contact.html" >
				CONTACT US
				</a>	
				</li>
				<!-- End Contact us -->

				<!-- Registration -->
				<li class="mega-menu-fullwidth">
				<a href="registration.php" >
				REGISTRATION
				</a>	
				</li>
				<!-- End registration -->

				<!-- login -->
				<li class="mega-menu-fullwidth">
				<a href="login.php" >
				LOGIN
				</a>	
				</li>
				<!-- End login -->

				<!-- Appointment -->
				<li class="mega-menu-fullwidth">
				<a href="appointment.php">
				BOOK APPOINTMENT
				</a>

				</li>
				<!-- End Appointment -->

				</ul>

				</div>
				</div>
				</div>
				</div>
				</div>
				<!-- End Navbar -->


		<!--=== Welcome to Unity===-->
		<div class="container content-md welcomeSection">
		<div class="row section1">
		<div class="col-md-6" style="margin-bottom: 40px;" style="border:2px solid black background: green;">
			<h2 class="title-v2">WELCOME TO <span style="color: #72c02c;"> UNITY </span></h2>
			<p style="text-align: justify; font-size: 14px;">A state-of-the art modern facility in the heart of the Gujarat state, it is spread over 10 acres and has a built-up area of over 440000 square feet. Currently the hospital has 300+ beds with a capacity to expand to 400 beds.</p>
			<p style="text-align: justify; font-size: 14px;">Unity Hospital, Ahmedabad is a tertiary care flagship unit of the Unity Hospitals Group.The Hospital focuses on centres of excellence like Cardiac Sciences, Neuro Sciences, Orthopaedics including Knee Replacement, Hip Replacement and Spine Surgery, Cancer, Emergency Medicine and Solid Organ Transplants besides the complete range of more than 35 allied medical disciplines under the same roof.</p> 
			<p style="text-align: justify; font-size: 14px;"> Unity Hospital, Ahmedabad provides holistic healthcare that includes prevention, treatment, rehabilitation and health education for patients, their families and clients by touching their lives.</p> <br>
			<a href="about.html" class="btn-u btn-brd btn-brd-hover">Read More</a>
		</div>
		<div class="col-md-6 overflow-h">
			<img style="border-radius: 50px; margin-left: 30px;" src="assets/img/bg/1.jpg" alt="">
		</div>
		</div>
		</div>
		<!--=== End About Us ===-->



		<!-- Specialities -->
		<div class="container" style="margin-top: 50px;">
		<div class="headline-center" style="margin-bottom: 60px;">
			<h2>Our Specialities</h2>
			<div class="line"></div>
			<p>Unity is a multi/super speciality hospital with state-of-the-art facilities & treatments at an affordable cost, encompassing wide spectrum of accurate diagnostics and elegant therapeutics created on the philosophical edifice of patient and ethical centricity ensuring humanistic dispensation. </p>
		</div><!--end Spciallities-->

		<div class="row" style="margin-bottom: 40px;">
			<div class="col-md-4">
				<div class="content-boxes-v5" style="margin-bottom: 30px;">
					<i class="icon-medical-005" style="border-radius: 50%;"></i>
					<div class="overflow-h">
						<h3 class="no-top-space">24/7 Ambulance support</h3>
						<p>24 Hours Ambulance Service, Emergency Ambulance Service Providers in India.</p>
					</div>
				</div>
				<div class="content-boxes-v5" style="margin-bottom: 30px;">
					<i style="border-radius: 50%;" class="icon-medical-054"></i>
					<div class="overflow-h">
						<h3 class="no-top-space">LASIK Vision Correction Treatment </h3>
						<p>We have LASIK Vision treatment which is the latest in the world.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="content-boxes-v5" style="margin-bottom: 30px;">
					<i style="border-radius: 50%;" class="icon-medical-042"></i>
					<div class="overflow-h">
						<h3 class="no-top-space">Dedicated Stroke Centre</h3>
						<p>We specially have dedicated stroke centre which is very handy in critical situations.</p>
					</div>
				</div>
				<div class="content-boxes-v5" style="margin-bottom: 30px;">
					<i style="border-radius: 50%;" class="icon-medical-019"></i>
					<div class="overflow-h">
						<h3 class="no-top-space">17 State-of-the-art Operation Theatres</h3>
						<p>These Operation Theatres are full of latest technologies and equipments.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="content-boxes-v5" style="margin-bottom: 30px;">
					<i style="border-radius: 50%;" class="icon-medical-069"></i>
					<div class="overflow-h">
						<h3 class="no-top-space">Joint Replacement Centre</h3>
						<p>We have have dedicated Joint Replacement Centre.</p>
					</div>
				</div>
				<div class="content-boxes-v5" style="margin-bottom: 30px;">
					<i style="border-radius: 50%;" class="icon-medical-061"></i>
					<div class="overflow-h">
						<h3 class="no-top-space">2 Endoscopy Suites</h3>
						<p>2 Endoscopy Suites are with latest equipments and very faster as compared to others.</p>
					</div>
				</div>
			</div>
		</div><!--/end row-->
		</div>

		<!-- Address -->
		<div class="col-md-3 map-img" style="margin-bottom: 40px;">
		<div class="headline"><h2>Contact Us</h2></div>
		<address class="md-margin-bottom-40">
		Unity Hospital <br />
		Ahmedabad, IN <br />
		Phone: 886 666 00555 <br />
		Email: unityhospital@gmail.com 
		</address>
		</div><!--/col-md-3-->
		<!-- End Address -->

		<!--=== End Footer ===-->
</div><!--/wrapper-->

</body>
</html>

