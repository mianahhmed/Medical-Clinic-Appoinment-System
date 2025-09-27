        <?php
        include "connection.php";

        if(isset($_POST['delete_id'])){
            $id = $_POST['delete_id'];

        $conn->query("DELETE FROM payment WHERE PatientID = $id");
        $conn->query("DELETE FROM appointment WHERE PatientID = $id");
        $conn->query("DELETE FROM patient WHERE PatientID = $id");
        }
        ?>


        <!DOCTYPE html>
        <html>
        <head>
            <title>-Patients-</title>
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
            background-color: #1a1101;
            text-align: center;
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


        </style>
        <body>

        <nav>
            <ul style="display: flex; justify-content: center;">
                <li><a href="AdminDashboard.php" class="a">Admin Dashboard</a></li>
            </ul>
        </nav>

        <div class="top">
            <h1>-Patients Record-</h1>
            
        </div>
        <br><br>
    
        <?php
        echo "<table>
            <tr>
                <th>Patient ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Mail</th>
                <th>Action</th>
            </tr>";
        $result = $conn->query("SELECT * FROM patient");
        while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>$row[PatientID]</td>
                <td>$row[Name]</td>
                <td>$row[Gender]</td>
                <td>$row[Age]</td>
                <td>$row[Address]</td>
                <td>$row[Contact]</td>
                <td>$row[Mail]</td>
                <td>
                <form method = 'post'>
                <input class = 'delete' name = 'delete_id'value='{$row['PatientID']}'>
                <button type = 'submit' class = 'act_btn'>Remove</button>
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