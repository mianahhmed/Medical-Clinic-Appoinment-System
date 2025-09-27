<?php
session_start();
include "connection.php";

	if (!isset($_SESSION['patient_id'])) {
    	echo "<div style='text-align: center; margin-top: 150px; font-size: 28px; color: red;'>
        You are not logged in.
        </div>";
    	exit();
	}

  if (isset($_POST['doctor']) &&  isset($_POST['a_date'])
   && isset($_POST['a_time']) && isset($_POST['type'])
) {
    
    $doctor  = $_POST['doctor'];
    $a_date  = $_POST['a_date'];
    $a_time  = $_POST['a_time'];
    $type    = $_POST['type'];
    $admin = 11;
    $status = "Pending";
    $patient_id = $_SESSION['patient_id'];
   
    
    $sql = "INSERT INTO appointment (AdminID, Date, Time, Status, PatientID, DoctorID, Type)
            VALUES ( '$admin' ,'$a_date', '$a_time', '$status',
            '$patient_id',
            (SELECT DoctorID FROM doctor WHERE Name = '$doctor'),
            '$type')";

if ($conn->query($sql)) {
        header("Location: Payment.php");
    }
}


?>

<!DOCTYPE html>
<html>
<head>
  <title>Book your Appointment now!</title>
</head>
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
      color: white; 
			justify-content: center;
		}

		.top video {
			position: absolute;
			width: 100%;
			height: 100%;
			object-fit: cover;
			z-index: -2;
		} 
	
    .button1 {
      background: #1a1101;
      color: white;
      padding: 10px;
      width: 100%;
      border-radius: 10px;
      margin-top: 20px;
      cursor: pointer;
      font-size: 16px;
    }

	.button1:hover {
      background: white;
	  color: #1a1101;
	  border-color: white;
	}

    .app {
      background: white;
      border-radius: 10px;
      box-shadow: 0 0 10px #e5e5e5;
      padding: 15px;
      margin: 30px auto;
      width: 90%;
      max-width: 400px;
    }

   .end {
			background-color: #1a1101;
			color: white;
			margin: -10px;
			display: flex;
			gap: 150px;
			justify-content: center;
		}
    label {
      display: block;
      margin-top: 15px;
      color: #1a1101;
      font-weight: bold;
    }
    .text {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    h1 {
        padding-bottom: 10px;
    }

  </style>
<body>

<nav>
    <ul style="display: flex; justify-content: center;">
    <li><a href="PatientPanel.php" class="a">Patient Panel</a></li>
    </ul>
</nav>

<div class="top">
  <video autoplay muted loop playsinline>
			<source src="bgv.mp4" type="video/mp4">
		</video>
    <div>
  <h1>Book Appointment at ABUDA-MED</h1>
  <br></div>
</div>
<br><br>
  
    <div class="app">
    <form method="post" action="appointment.php">

    <label><b>Doctors</b></label><br>
    <select name="doctor" class="text">
    <option disabled selected>Select</option>
    <option>Dr Ahmad Farooq</option>
    <option>Dr Mushtaq Bajwa</option>
    <option>Dr Hasan Altaf</option>
    <option>Dr Sultana Dar</option>
    <option>Dr Hannan Ahmad</option>
    <option>Dr Aisha Rahman</option>
    <option>Dr Burhan Mubashir</option>
    <option>Dr Suleman Habib</option>
    </select>
    <label><b>Appoinment Date</b></label><br>
    <input type="date" name="a_date" class="text" required min="<?php echo date('Y-m-d'); ?>">
    <label><b>Appoinment Time</b></label><br>
    <input type="time" name="a_time" class="text" required min="14:00" max="22:00"><br>
    <label><b>Visit-Type</b></label><br>
    <input type="radio" name="type" value="Online" required>Online
    <input type="radio" name="type" value="In-person" required>In-person<br>    
    <button type="submit" class="button1">Submit</button><br><br>
    Click here to go back to <a href="Patient.html">Patient-Dashboard</a>
    <br><br><br>
    </form>
    </div>
    <br><br>
  <div class="end">
		<div><br><b>Location</b><br><h6>Gulberg 6 Lhr<br><br>Near Tim Hortons<br><br>ABUDA MED</h6></div>
	    <div><br><b>Community</b><br><h6>Doctors<br><br>Testimonials<br><br>FAQs</h6></div>
	    <div><br><b>About</b><br><h6>About Us<br><br>Areas Of Care<br><br>Volunteers</h6></div>
	    <div><br><b>Support</b><br><h6>Visitor Information<br><br>Emergency Care<br><br>Donate<br><br></h6></div>
	    <div><br><b>Trust & Legal</b><br><h6>Terms & Condition<br><br>Privacy Policy<br><br>Hospital Stay</h6></div>
	</div>
</body>
</html>
