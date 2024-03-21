<?php 
    session_start();
    include('Server.php'); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="src/css/Login.css">
	<script defer src="src/js/Login.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@500&display=swap" rel="stylesheet">
	<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body>
    <section>
	<div class="login-page animate__fadeInLeft">
		<div class="form">
			<form action="loginDB.php" class="login-form" id="login_form" method="post">
				<img src="img\FLG.png">
				<h2>Farmly</h2>
				<h1>เข้าสู่ระบบ</h1>
				 <!-- notification message-->
				 <?php if (isset($_SESSION['error'])) : ?>
                    <div class="error">
                        <h3>
                            <?php 
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </h3>
                    </div>
       			 <?php endif ?>
				<div class="inputbox">
					<ion-icon name="mail-outline"></ion-icon>
					<input type="text" id="username_login" name="Username" required>
					<label for="">Username or Email</label>
				</div>
				<div class="inputbox">
					<ion-icon name="lock-closed-outline"></ion-icon>
					<input type="password" id="password_login" name="Password" required>
					<label for ="">Password</lable>
				</div>
				<button type="submit" name="loginto">เข้าสู่ระบบ</button>
				<div class="Register">
					<a href="Register.php">สมัครใหม่</a>
				</div>
			</form>
		</div>
	</div>
</section>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>