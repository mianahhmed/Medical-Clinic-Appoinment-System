<?php
 

include "connection.php"; 


if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['gender']) && isset($_POST['email']) &&
    isset($_POST['number']) && isset($_POST['address']) && isset($_POST['password'])){

    $name     = $_POST['name'];
    $age      = $_POST['age'];
    $gender   = $_POST['gender'];
    $email    = $_POST['email'];
    $number   = $_POST['number'];
    $address  = $_POST['address'];
    $password = $_POST['password'];
    $admin = 11;

    $sql = "INSERT INTO patient ( AdminId , Name, Age, Gender, Mail, Contact, Address, Password)
             VALUES ( '$admin', '$name', '$age', '$gender', '$email', '$number', '$address', '$password')";   
  
  if ($conn->query($sql)){
     header("Location: Login.php"); 
   }
  }

?>


<!DOCTYPE html>
<html>
<head>
  <title>Signin - ABUDA Med</title>
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
			height: 250px;
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

    .Signin {
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
        color: white;
    }

   
  </style>
<body>

<nav>
      <ul style="display: flex; justify-content: center;">
      <li><a href="home.html" class="h">Home</a></li>
      <li><a href="Login.php" class="d">Log In</a></li>
      </ul>
</nav>

<div class="top">
    <video autoplay muted loop playsinline>
			<source src="bgv.mp4" type="video/mp4">
		</video>
  <h1>Sign-In To ABUDA-MED</h1>
  <br>
</div>
<br><br>
  
    <div class="Signin">
    <form method="post" action="Signup.php">
    <label><b>Full name *</b></label><br>
    <input type="text" name="name" class="text" placeholder="xxxxx xxxxx" required><br>
    <label><b>Age *</b></label><br>
    <input type="text" name="age"  class="text"required><br>
    <label><b>Gender *</b></label><br>
    <input type="radio" name="gender" value="Male" required>Male
    <input type="radio" name="gender" value="Female" required>Female<br>
    <label><b>Email *</b></label><br>
    <input type="text" name="email"  class="text" placeholder="xxxxx@gmail.com" required><br>
    <label><b>Contact Number *</b></label><br>
    <input type="text" name="number" class="text" placeholder="+92 xxx xxxxxx" required><br>
    <label><b>Address *</b></label><br>
    <input type="text" name="address" class="text" required><br>
    <label><b>Password *</b></label><br>
    <input type="password" name="password" class="text" placeholder="xxxxxxx" required><br>
    
    <button type="submit" class="button1">Submit</button><br><br>
   
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
