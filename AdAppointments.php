        <?php
        include "connection.php";

        if(isset($_POST['delete_app'])){
            $app = $_POST['delete_app'];
        
        $conn->query("DELETE FROM payment WHERE AppointmentID = $app");
        if($conn->query("DELETE FROM appointment WHERE AppointmentID = '$app'")) {
        header("Location: AdAppointments.php");
        }
        }
        ?>


        <!DOCTYPE html>
        <html>
        <head>
            <title>Appointments</title>
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
            background-color : #1a1101;
            margin: -10px;
            height: 70px;
            padding: 50px;
            color: white;
        }

        table {
            width: 80%;
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

        .act_btn {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 12px;
            border-radius: 6px;
        }

        .act_btn:hover {
            background-color: darkred;
        }

        .delete {
            width: 0px;
            border: none;
            text-align: center;
        }
        h1{
            color: white;
        }
        
        </style>
        <body>

        <nav>
            <ul style="display: flex; justify-content: center;">
                <li><a href="AdminDashboard.php" class="a">Admin Dashboard</a></li>
            </ul>
        </nav>

        <div class="top">

            <h1>-Appointment Record-</h1>
            
        </div>
        <br><br>
    
        <?php
    
        echo "<table>
            <tr>
                <th>Appointment ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Patient ID</th>
                <th>Doctor ID</th>
                <th>Type</th>
                <th>Action</th>
            </tr>";
        $result = $conn->query("SELECT * FROM appointment");
        while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>$row[AppointmentID]</td>
                <td>$row[Date]</td>
                <td>$row[Time]</td>
                <td>$row[Status]</td>
                <td>$row[PatientID]</td>
                <td>$row[DoctorID]</td>
                <td>$row[Type]</td>
                <td>
                <form method = 'post'>
                <input class = 'delete' name = 'delete_app' value='{$row['AppointmentID']}'>
                <button type = 'submit' class = 'act_btn'>Delete</button>
                </form>
                </td>
              </tr>";
    }

        echo "</table>";
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