<!DOCTYPE html>
<html>
<head>
    <title>PatientDashboard - ABUDA MED</title>
    <style>
		body {
			font-family: Arial;
			margin: 0;
			padding: 0;
			background-color: white;
		}

		nav {
			background: white;
			margin: -20px;
		}

		a {
			font-weight: bold;
			text-decoration: none;
			text-align: center;
			color: #1a1101;
			margin: 20px;
		}

		nav ul li {
			list-style: none;
			margin: 20px;
		}

		a:hover {
			color: rgb(229, 220, 202);
		}

		.a:hover, .h:hover, .d:hover {
			background-color: #1a1101;
			padding: 10px;
			margin: 10px;
			border-radius: 10px;
		}

		.top {
			position: relative;
			height: 300px;
			overflow: hidden;
			display: flex;
			align-items: center;
			justify-content: center;
            text-align: center;
            color: white;
		}

		.top video {
			position: absolute;
			width: 100%;
			height: 100%;
			object-fit: cover;
			z-index: -2;
		}

        .mid {
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }

        .box {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            max-width: 900px;
        }

        .Panel {
            background: white;
            border: 1px solid lightgray;
            border-radius: 10px;
            width: 250px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            color: #1a1101;
            font-weight: bold;
        }

        .Panel:hover {
            transform: scale(1.05);
            background-color: rgb(229, 220, 202);
        }

       .end {
			background-color: #1a1101;
			color: white;
			margin: -10px;
			display: flex;
			gap: 150px;
			justify-content: center;
		}

    </style>
</head>
<body>

<nav>
    <ul style="display: flex; justify-content: center;">
       <li><a href="Patient.html" class="a">Patient Panel</a></li>
    </ul>
</nav>

<div class="top">
    <video autoplay muted loop playsinline>
	<source src="bgv.mp4" type="video/mp4">
	</video>
        <div>
    <h1>-Patient Dashboard-</h1>
    <h3>"Seamless Access to Trusted Medical Services"</h3></div>
</div>
<br><br>
<div class="mid">
    <div class="box">
        <div class="Panel"><a href="appointment.php">Book Appointment</a></div>
        <div class="Panel"><a href="status.php">Appointment Status</a></div>
        <div class="Panel"><a href="patientProfile.php">Profile</a></div>
        <div class="Panel"><a href="home.html">Logout</a></div>
    </div>
</div>
<br><br>
<div class="end">
		<div><br><b>Location</b><br><h6>Gulberg 6 Lhr<br><br>Near Tim Hortons<br><br>ABUDA MED</h6></div>
	    <div><br><b>Community</b><br><h6>Doctors<br><br>Testimonials<br><br>FAQs</h6></div>
	    <div><br><b>About</b><br><h6>About Us<br><br>Areas Of Care<br><br>Volunteers</h6></div>
	    <div><br><b>Support</b><br><h6>Visitor Information<br><br>Emergency Care<br><br>Donate<br><br></h6></div>
	    <div><br><b>Trust & Legal</b><br><h6>Terms & Condition<br><br>Privacy Policy<br><br>Hospital Stay</h6></div>
	</div>
<br>
</body>
</html>
