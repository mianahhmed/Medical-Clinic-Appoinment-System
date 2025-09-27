        <?php
        include "connection.php";

        $sql = "SELECT * FROM payment";
        $result = $conn->query($sql);
        ?>


        <!DOCTYPE html>
        <html>
        <head>
        <title>Payments</title>
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
            text-align: center;
            background-color: #1a1101;
            color: white;
            margin: -10px;
            height: 70px;
            padding: 50px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: auto;
        }
         th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #1a1101;
            color: white;
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
                <li><a href="AdminDashboard.php" class="a">Admin Dashboard</a></li>
            </ul>
        </nav>

        <div class="top">
            <h1>-Payment Record-</h1>
            
        </div>
        <br><br>
    
        <?php
        if ($result->num_rows > 0) {
        echo "<table>
            <tr>
                <th>Payment ID</th>
                <th>Admin ID</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Status</th>
                <th>Appointment ID</th>
                <th>Patient ID</th>
                
            </tr>";

        while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>$row[PaymentID]</td>
                <td>$row[AdminID]</td>
                <td>$row[Amount]</td>
                <td>$row[Date]</td>
                <td>$row[Status]</td>
                <td>$row[AppointmentID]</td>
                <td>$row[PatientID]</td>
              </tr>";
    }

        echo "</table>";
} 
    ?>
   
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