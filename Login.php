<?php
session_start();
include "connection.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM patient WHERE Mail = '$username' AND Password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $r = $result->fetch_assoc();
        $_SESSION['patient_id'] = $r['PatientID'];
        header("Location: PatientPanel.php"); 
      } else {
            $error = "Invalid username or password.";
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
  <title>Login - ABUDA Med</title>
</head>
  <style>
		body {
			font-family: Arial;
			margin: 0;
			padding: 0;
			background-color: white;
		}

		nav {
			background: whitelogi;
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
      color: white; 
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
      padding: 5px;
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

    .login {
      padding-top: 10px;
      padding-bottom: 10px;  
      background: white;
      border-radius: 10px;
      box-shadow:0 0 10px #e5e5e5;
      justify-self: center;
      padding-left: 10px;
      padding-right: 10px;
      text-align: left;
      width: 250px;
      height: 300px;
    }

     p{
      margin: 10px 0 5px;
      color: #1a1101;
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
        padding-top: 23px;
    }

   
  </style>
<body>

<nav>
      <ul style="display: flex; justify-content: center;">
      <li><a href="home.html" class="h">Home</a></li>
      <li><a href="Adminlogin.php" class="d">Admin Login</a></li>
      <li><a href="Signup.php" class="a">Sign Up</a></li>
      </ul>
</nav>

<div class="top">
  <video autoplay muted loop playsinline>
			<source src="bgv.mp4" type="video/mp4">
		</video>
  <h1>Log-In To ABUDA-MED</h1>
  <br>
</div>
<br><br>
  
    <div class="login">
    <form method="post" action="Login.php">
    <label><b>Username *</b></label><br>
    <input type="text" name="username" class="text" placeholder="xxxxx@gmail.com" required><br>
    <label><b>Password *</b></label><br>
    <input type="password" name="password" class="text" placeholder="xxxxxx" required>
     <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <button type="submit" class="button1" >Log In</button> 
    </form>
    </div>>
  <div class="end">
		<div><br><b>Location</b><br><h6>Gulberg 6 Lhr<br><br>Near Tim Hortons<br><br>ABUDA MED</h6></div>
	    <div><br><b>Community</b><br><h6>Doctors<br><br>Testimonials<br><br>FAQs</h6></div>
	    <div><br><b>About</b><br><h6>About Us<br><br>Areas Of Care<br><br>Volunteers</h6></div>
	    <div><br><b>Support</b><br><h6>Visitor Information<br><br>Emergency Care<br><br>Donate<br><br></h6></div>
	    <div><br><b>Trust & Legal</b><br><h6>Terms & Condition<br><br>Privacy Policy<br><br>Hospital Stay</h6></div>
	</div>

</body>
</html>
