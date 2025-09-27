        <?php
        include "connection.php";

        $sql = "SELECT * FROM doctor";
        $result = $conn->query($sql);

        if (isset($_POST['add']) && isset($_POST['name']) && isset($_POST['specialty']) && isset($_POST['mail'])) {
        $name = $_POST['name'];
        $specialty = $_POST['specialty'];
        $mail = $_POST['mail'];

        $sql = "INSERT INTO doctor (Name, Specialty, Mail)
            VALUES ('$name', '$specialty', '$mail')";
        
        if ($conn->query($sql)) {
        
        header("Location: AdDoctor.php");

        }
        }
        if (isset($_POST['update']) && isset($_POST['d_id']) && isset($_POST['name']) && isset($_POST['specialty']) && isset($_POST['mail'])) {
        $id = $_POST['d_id'];
        $name = $_POST['name'];
        $specialty = $_POST['specialty'];
        $mail = $_POST['mail'];

        $sql = "UPDATE doctor SET Name='$name', Specialty='$specialty', Mail='$mail' WHERE DoctorID='$id'";
        if ($conn->query($sql)) {
            header("Location: AdDoctor.php");
            exit();
        } 
        }

        ?>


        <!DOCTYPE html>
        <html>
        <head>
            <title>Doctors</title>
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
            margin: -10px;
            height: 70px;
            padding: 50px;
            color: white;
            background-color: #1a1101;
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
        .addandupdate {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin: 30px auto;
            flex-wrap: wrap; 
        }

        .doctor {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px #e5e5e5;
            padding: 20px;
            width: 300px;
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
        label {
            display: block;
            margin-top: 15px;
            color: #1a1101;
            font-weight: bold;
        }

        .end {
			background-color: #1a1101;
			color: white;
			margin: -10px;
			display: flex;
			gap: 150px;
			justify-content: center;
		}
        h2{
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
            <h1>-Doctors Record-</h1>
            
        </div>
        <br><br>
         <br><br>
    
        <?php
        if ($result->num_rows > 0) {
        echo "<table>
            <tr>
            <th>Doctor ID</th>
            <th>Name</th>
            <th>Specialty</th>
            <th>Mail</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>$row[DoctorID]</td>
            <td>$row[Name]</td>
            <td>$row[Specialty]</td>
            <td>$row[Mail]</td>
            </tr>";
    }

        echo "</table>";
    } 
    ?>
      <div class="addandupdate">
      
      <div class="doctor">
      <form method="post" action="AdDoctor.php">
      <h2>Update Info</h2><br>
        <select name="d_id" class="text" required>
      <?php  
      $idResult = mysqli_query($conn, "SELECT DoctorID, Name FROM doctor");
      while ($row = mysqli_fetch_assoc($idResult)) {
      $id = $row['DoctorID'];
      $name = $row['Name'];
      echo "<option value='$id'>$id - $name</option>";
      }
        ?>
      </select>
      <label>Edit Name</label><br>
      <input type="text" name="name" class="text" placeholder="Dr Axxx" required>
      <label>Edit Specialty</label><br>
      <input type="text" name="specialty" class="text" placeholder="Cardiologist" required>
      <label>Edit Email</label><br>
      <input type="email" name="mail" class="text" placeholder="drxxx@gmail.com" required>
      <button type="submit" name="update" class="button1">Update</button>
      </form>
      </div>

      <div class="doctor">
      <form method="post" action="AdDoctor.php">
      <h2>Add Doctor</h2><br>
      <label>Doctor's Name</label><br>
      <input type="text" name="name" class="text" placeholder="Dr Axxx" required>
      <label>Specialty</label><br>
      <input type="text" name="specialty" class="text" placeholder="Cardiologist" required>
      <label>Email</label><br>
      <input type="email" name="mail" class="text" placeholder="drxxx@gmail.com" required>
      <button type="submit" name="add" class="button1">Add</button>
      </form>
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

</body>
</html>