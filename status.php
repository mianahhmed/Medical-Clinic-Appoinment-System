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
        if(isset($_POST['cancel_app'])){
            $app = $_POST['cancel_app'];

         $conn->query("UPDATE appointment SET status = 'Cancelled' WHERE AppointmentID = $app");
        }
        if (isset($_POST['complete_app'])) {
        $app = $_POST['complete_app'];
        $conn->query("UPDATE appointment SET status = 'Completed' WHERE AppointmentID = $app");
        }

        ?>


        <!DOCTYPE html>
        <html>
        <head>
            <title>Appointment Status</title>
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
			justify-content: center;
		}

		.top video {
			position: absolute;
			width: 100%;
			height: 100%;
			object-fit: cover;
			z-index: -2;
		}

        h1{
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
        
    .act_btn2 {
            
            background-color: #34d058;
            color: white;
            border: none;
            padding: 10px 12px;
            border-radius: 6px;
        }

    .act_btn2:hover {
            background-color: green	;
        }

    .cancel {
            width: 0px;
            border: none;
            text-align: center;
        }
    .noapp {
            padding: 20px;
            text-align: center;
            color: #1a1101;
            font-size: 18px;
            font-style: italic;
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
        <div class="top">
            <video autoplay muted loop playsinline>
                <source src="bgv.mp4" type="video/mp4">
            </video>
            <h1>-Appointment Status-</h1>
            
        </div>
        <br><br>
    
        <?php

        $result = $conn->query("SELECT a.AppointmentID, a.Date, a.Time, a.Status,a.PatientID, a.Type, d.Name AS DoctorName
                  FROM appointment a, doctor d WHERE a.DoctorID = d.DoctorID AND a.PatientID = $patient_id");
        if ($result->num_rows > 0){
        echo "<table>
            <tr>
                <th>Appointment ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>Patient ID</th>
                <th>Doctor Name</th>
                <th>Type</th>
                <th>Status</th>
                <th>Action</th>
            </tr>";
        
        while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>$row[AppointmentID]</td>
                <td>$row[Date]</td>
                <td>$row[Time]</td>
                <td>$row[PatientID]</td>
                <td>$row[DoctorName]</td>
                <td>$row[Type]</td>
                <td>$row[Status]</td>
                <td>";
            
        if ($row['Status'] == 'Pending'){
        echo "<form method='post'style='display:inline-block;'>
        <input type='hidden' name='cancel_app' value='$row[AppointmentID]'>
        <button type='submit' class='act_btn'>Cancel</button>
        </form>

        <form method='post' style='display:inline-block;'>
        <input type='hidden' name='complete_app'  value='$row[AppointmentID]'>
        <button type='submit' class='act_btn2'>Complete</button>
        </form>";
        } else {
        echo "-"; 
        }

        echo "</td></tr>";
        } 

        echo "</table>";

        }else {
        echo "<br><br><div class='noapp'><h3> No appointment yet — let’s fix that with one click!</h3><br>
         <a href='appointment.php'>Book Appointment</a><br></div>";
        }

    ?>   
    
    <br><br><br><br><br><br><br><br><br><br>
 <div class="end">
		<div><br><b>Location</b><br><h6>Gulberg 6 Lhr<br><br>Near Tim Hortons<br><br>ABUDA MED</h6></div>
	    <div><br><b>Community</b><br><h6>Doctors<br><br>Testimonials<br><br>FAQs</h6></div>
	    <div><br><b>About</b><br><h6>About Us<br><br>Areas Of Care<br><br>Volunteers</h6></div>
	    <div><br><b>Support</b><br><h6>Visitor Information<br><br>Emergency Care<br><br>Donate<br><br></h6></div>
	    <div><br><b>Trust & Legal</b><br><h6>Terms & Condition<br><br>Privacy Policy<br><br>Hospital Stay</h6></div>
	</div>

</body>
</html>