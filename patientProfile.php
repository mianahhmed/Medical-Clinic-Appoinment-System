<?php 
session_start();
    include "connection.php";
	if (!isset($_SESSION['patient_id'])) {
	echo "<div style='text-align: center; margin-top: 150px; font-size: 28px; color: red;'>
    You are not logged in.
    </div>";
    exit();
	}

	$patient_id = $_SESSION['patient_id'];

    if(isset($_POST['update'])){
        $age = $_POST['age'];
        $mail = $_POST['mail'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
		$new_password = $_POST['new_password'];

        $sql = "UPDATE patient SET  Mail = '$mail', Contact = '$contact',  Address = '$address' WHERE PatientID = '$patient_id' ";

	    if (!empty($new_password)) {
        $conn->query("UPDATE patient SET Password = '$new_password' WHERE PatientID = '$patient_id'");
    }
        $conn->query($sql);
        echo "Data Updated!";
    }
    $result = $conn->query("SELECT * FROM patient WHERE PatientID = '$patient_id' ");
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Profile</title>
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
		}

		.top video {
			position: absolute;
			width: 100%;
			height: 100%;
			object-fit: cover;
			z-index: -2;
		}
		.Profile {
			background: white;
			border-radius: 10px;
			box-shadow: 0 0 10px #e5e5e5;
			padding: 15px;
			margin: 30px auto;
			width: 90%;
			max-width: 400px;
		}
		label {
			display: block;
			margin-top: 15px;
			color: #1a1101;
			font-weight: bold;
		}
		.text {
			width: 50%;
			padding: 8px;
			margin-top: 5px;
			border-radius: 5px;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}
		.button1 {
			background: #1a1101;
			color: white;
			padding: 10px;
			width: 50%;
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

       .end {
			background-color: #1a1101;
			color: white;
			margin: -10px;
			display: flex;
			gap: 150px;
			justify-content: center;
		}

        h1{
            color: white;
        }
    </style>
</head>
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
    <h1>-Patient Profile-</h1>
</div></div>
<br><br>
<div class="Profile">

<form method="post">
    <h2>-Update Your Information-</h2>

    <label>Age </label><br>
    <input type="number" name="age" value="<?php echo $row['Age'] ?>" class="text"><br><br>

    <label>Mail</label><br>
    <input type="email" name="mail" value="<?php echo $row['Mail'] ?>" class="text"><br><br>

    <label>Contact</label><br>
    <input type="text" name="contact" value="<?php echo $row['Contact'] ?>" class="text"><br><br>

    <label>Address</label><br>
    <input type="text" name="address" value="<?php echo $row['Address'] ?>"class="text"><br><br>

	<label>New Password</label><br>
	<input type="password" name="new_password" class="text"><br><br>

    <button type="submit" name="update" class="button1">Update</button>
</form>
	</div>
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
