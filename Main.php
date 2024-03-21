<?php 
     session_start();
     if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: Login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: Login.php');
    }

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
    <link rel="stylesheet" href="src/css/Main.css">
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
        <a href="Main.php" class="logo"><img class="icon" src="img\FLG.png"><span>Farmly</span>
        </a>
        <ul class ="navbar">
            <li> <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class="ri-search-2-line"></i>Search</button></li>
            <li class="basket"><a href ="Basket.php" class="basket"><i class="ri-shopping-basket-2-line"></i>Basket</a></li>
        </ul>
        <div class="main">
        <a href = "History.php" class ="user"><i class="ri-user-fill"></i><?php echo $_SESSION['username']?></a>
        <a href="Main.php?logout='1'">Log out</a>
        
</div>
    </header>
  <main>
    <div class="intro">
      
      <h1>FARMLY NEIGHBOR</h1>
      <p>because we care about you.</p>
      <a href="MainShop.php">
        <button name="goSell">ดูสินค้า</button>
      </a>
    </div>
    <div class="achievements">
      
      <div class="work">
        <i class="ri-truck-line" style= "font-size: 2em"></i>
        <p class="work-heading">สินค้าทางการเกษตรส่งตรงจากเกษตรกรไทยถึงบ้านคุณ</p>
        <p class="work-text">ตัวกลางการค้าขายสินค้าทางการเกษตร <b>"ออนไลน์"</b> เข้าถึงไว ใช้งานง่าย เป็นมิตรของเกษตรกรไทย</p>
      </div>
      <div class="work">
        <i class="ri-shield-check-line" style= "font-size: 2em"></i>
        <p class="work-heading">รวดเร็ว ทันใจ สินค้าสดใหม่มีมาตรฐาน ราคาเป็นธรรม</p>
        <p class="work-text">สดใหม่ มีการรับประกันสินค้า <b>"ปลอดภัย"</b> ราคาเป็นมาตรฐานไม่เอาเปรียบผู้ซื้อ-ขาย</p>
      </div>
      <div class="work">
        <i class="ri-share-line" style= "font-size: 2em"></i>
        <p class="work-heading">เป็นศูนย์ชุมชนให้เกษตรกรไทย ใกล้ชิดหมือนเป็นเพื่อนบ้าน</p>
        <p class="work-text">พื้นที่เล่าเรื่องราวสินค้าของเกษตรกร มีระบบ <b>"ชุมชน"</b> ทีใช้ในการติดต่อสื่อสาร</p>
      </div>
    </div>
    <div class="about-me">
      <div class="about-me-text">
        <h1>About Us</h1>
        <h3>พวกเราคือ E-commerce ที่เกี่ยวกับการเกษตรโดยมุ่งเน้นที่จะเป็นตัวกลางเชื่อมต่อเกษตกรกับผู้บริโภคผ่านแพลตฟอร์มออนไลน์ เรานำเสนอการเข้าถึงให้เกษตกรนั้นสามารถเข้าถึงตลาดที่ท่วงทันในปัจจุบันที่ทุกอย่างนั้นสามารถทำผ่านออนไลน์ได้.</h3>
      </div>
      <img src="https://www.gafspfund.org/sites/default/files/2023-01/Website%20Hero%20Space%20%2819%29_0.jpg" >
    </div>
  </main>
  <footer class="footer">
    <div class="copy">&copy; 2023 Developer</div>
    <div class="bottom-links">
      <div class="links">
        <span>More Info</span>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
      </div>
      <div class="links">
        <span>Social Links</span>
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </footer>
  <script type= "text/javascript" src ="js/shopscript.js"></script>
</body>

</html>