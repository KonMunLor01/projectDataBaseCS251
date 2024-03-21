<?php 
     session_start();
     include('Server.php')

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
    <link rel="stylesheet" href="src/css/Register.css">
    
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.3.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Unbounded:wght@300;500&display=swap" rel="stylesheet">
</head>
    <body>
    <header>
        <a href="#" class="logo"><img class="icon" src="img\FLG.png"><span>Farmly</span>
        </a>
        
        <div class="main">
        <a href = "Login.php" class ="user"><i class="ri-user-fill"></i>Sign In</a>
        <a href = "">Register</a>
</div>
</header>
        <div class="main-block">
        <h1>Register</h1><br>
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
    <form action="RegisterDB.php" method="post">
      <div class="form-group">
        <input type="text" id="name" name="name" placeholder="ชื่อ" required>
        <input type="text" id="surname" name="surname" placeholder="นามสกุล" required>
      </div>
      <div class="form-group">
        <input type="email" id="email" name="email" placeholder="อีเมล" required>
        <input type="tel" id="tel" name="tel" pattern="[0-9]{10}" placeholder="เบอร์โทรศัพท์" required>
      </div>
      <div class="form-group">
        <input type="text" id="username" name="username" placeholder="ชื่อผู้ใช้" required>
      </div>
      <div class="form-group">
        <input type="password" id="password" name="password" placeholder="รหัส" onkeyup='check();' required>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="ยืนยันรหัส" onkeyup='check();' required>
        <span id='message'></span>

      </div>
      
      <div class="form-group">
        
        <select id="role" name="role" onchange="toggleSellerFields()" required>
          <option value="customer">Customer</option>
          <option value="seller">Seller</option>
        </select>
      </div>

      <!-- Seller Fields -->
      <div class="seller-fields">
        <div class="form-group">
          
          <input type="text" id="storename" name="storename" placeholder="ชื่อร้านค้า">
          <input type="text" id="storeaddress" name="storeaddress" placeholder="ที่อยู่">
        </div>
        <div class="form-group">
          
          <input type="text" id="tub" name="tub" placeholder="เเขวง/ตำบล">
          <input type="text" id="kate" name="kate" placeholder="เขต/อำเภอ">
        </div>
        <div class="form-group">
          
          <input type="text" id="jak" name="jak" placeholder="จังหวัด">
          <input type="tel" id="zip" name="zip" placeholder="รหัสไปรษณีย์" pattern="[0-9]{5}">
        </div>
        <!-- Add more fields for sellers as needed -->
      </div>

      <div class="form-group">
        <button type="submit" name="register">Register</button>
      </div>
    </form>
  </div>
<script type= "text/javascript" src ="js/shopscript.js"></script>
<script src="src/js/Register.js"></script>
    </body>
</html>