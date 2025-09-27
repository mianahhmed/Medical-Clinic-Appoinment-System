        <?php 
        session_start();
        include "connection.php";
       	if (!isset($_SESSION['patient_id'])) {
    	echo "<div style='text-align: center; margin-top: 150px; font-size: 28px; color: red;'>
        You are not logged in.
        </div>";
    	exit();
	    }
        if (isset($_POST['card_name'], $_POST['card_number'], $_POST['expiry'], $_POST['cvv'])){
        $date = date("Y-m-d");
        $status = 'Paid';
        $amount = 2000;
        $adminid = 11;

        $patient_id = $_SESSION['patient_id'];

        $appointment_result = $conn->query("SELECT AppointmentID FROM appointment WHERE PatientID = '$patient_id' AND Status = 'Pending'");
        if ($appointment_row = $appointment_result->fetch_assoc()) {
            $appointment_id = $appointment_row['AppointmentID'];

        $sql = "INSERT INTO payment (AdminID, Amount, Date, Status, AppointmentID, PatientID)
                VALUES ('$adminid', '$amount', '$date', '$status', '$appointment_id', '$patient_id')";

        if ($conn->query($sql)) {
            header("Location: PatientPanel.php");
            exit;
        }
        }
        }
?>


        <!DOCTYPE html>
        <html>
        <head>
            <title>Payment</title>
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
            padding-top: 23px;
			list-style: none;
			
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
			height: 250px;
			overflow: hidden;
			display: flex;
			align-items: center;
			justify-content: center;
            color: white;
		    }

		    .top video {
			position: absolute;
			width: 100%;
			height: 100%;
			object-fit: cover;
			z-index: -2;
		    }
            .cardicons {
            display: block;
            width: 60%;
            max-width: 150px;
            margin: 10px auto;
            }
            .fd {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            background-color: #ffffffff;
            }

            .label {
            display: block;
            margin-top: 10px;
            color: #013440;
            font-weight: bold;
            }
           .plabel {
            text-align : center;
            display: block;
            margin-top: 10px;
            color: #013440;
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
            .clabel {
            display: inline-block;
            width: 48%;
            margin-bottom: 5px;
            font-weight: bold;
            color: #013440;
            }
            .cvv {
            display: inline-block;
            width: 70%;
            margin-right: 2%;
            box-sizing: border-box;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
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
            color: #013440;
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
    </style>
    <body>
        <nav>
        <ul style="display: flex; justify-content: center;">
        <li><a href="PatientPanel.php" class="a">Patient Panel</a></li>
        </ul>
        </nav>
<br>
    <div class="top">
    <video autoplay muted loop playsinline>
	<source src="bgv.mp4" type="video/mp4">
	</video>
    <h1>Proceed Payment</h1>
    </div>
<br>
    
    <div class="fd">
    <label class = plabel>Pay With</label>
    <img src = "cardicons.png" class = "cardicons"><br>
    <form method="post" action="Payment.php">    
    
    <label class = label >Cardholder Name</label>
    <input type="text"  name="card_name" class = 'text' required>

    <label class = label >Card Number</label>
    <input type="text"  name="card_number" class = 'text' maxlength="16" inputmode="numeric" required><br><br>

    <label class = clabel >Expiry Date <br>
    <input type="month"  name="expiry" class = 'cvv' required>
    </label>
    <label class = clabel >CVV <br>
    <input type="password"  name="cvv" class = 'cvv' maxlength="3" inputmode="numeric" required>
    </label>
    <button type="submit" class="button1">Pay Now - Rs. 2000</button>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <br>
    </form>
    </div>
    <br>

<div class="end">
  <div><br><b>Location</b><br><h6 style="color: #a3c3c0;">Gulberg 6 Lhr<br><br>Near Tim Hortons<br><br>ABUDA MED</h6></div>
  <div><br><b>Community</b><br><h6 style="color: #a3c3c0;">Doctors<br><br>Testimonials<br><br>FAQs</h6></div>
  <div><br><b>About</b><br><h6 style="color: #a3c3c0;">About Us<br><br>Areas Of Care<br><br>Volunteers</h6></div>
  <div><br><b>Support</b><br><h6 style="color: #a3c3c0;">Visitor Information<br><br>Emergency Care<br><br>Donate<br><br></h6></div>
  <div><br><b>Trust & Legal</b><br><h6 style="color: #a3c3c0;">Terms & Condition<br><br>Privacy Policy<br><br>Hospital Stay</h6></div>
</div>
</body>
</html>