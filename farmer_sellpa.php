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
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Add product</title>
        <link rel="stylesheet" href="src/css/AddProduct.css">
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
                <a href="BackFarmer.php" class="logo"><img class="icon" src="img\FLG.png"><span>Farmly</span>
                </a>
                <ul class ="navbar">
                    <li> <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class="ri-search-2-line"></i>Search</button></li>
                    <li><a href ="Basket.php" class="basket"><i class="ri-shopping-basket-2-line"></i>Basket</a></li>
                </ul>
                <ul class ="navbar">
                    <!--<button class="btn btn-outline-success" type="submit"><i class="ri-search-2-line"></i>Farmer_Sell</button></li>-->
                    <li><a href ="BackFarmer.php" class="backframer"><i class="Menu"></i>Farmer_Sell</a></li>
                </ul>
                <div class="main">
                <a href = "#" class ="user"><i class="ri-user-fill"></i><?php echo $_SESSION['username']?></a>
                <a href="Main.php?logout='1'">Log out</a>
        </div>
            </header>
        <form action="AddsDB.php" id="AddDB" method="post">
            <div class="container" id="mainContent">
            <h1> เพิ่มสินค้าใหม่ </h1>
                <div class="row gx-5 " id="rowContent">
                    <div class="col" id="addPhoto"> 
                            <img src="img/AddPhoto.png" id="adp-icon">
                            <input type="file" id="imphoto" name="Productpicture" require>
                    </div>
                    <div class="col" id="addAgri">
                        <label id="name-product">ชื่อสินค้า :</label>
                        <input type="text" id="p-name" name="Productname" required><br>
                        <label id="detail-product">รายละเอียดสินค้า :</label><br>
                        <textarea id="p-detail" name="Productdetail" required></textarea><br>
                        <label id="amount-product">จำนวนสินค้า :</label>
                        <input type="text" id="p-amount" name="Productamount"  required><label id="piece">ชิ้น</label><br>
                        <label id="price-product">ราคาสินค้า :</label>
                        <input type="text" id="p-price" name="Productprice" required><label id="baht">บาท</label><br>
                        <label id="type-product">ประเภทสินค้า :</label>
                        <select name="typeAgri" id="p-type">
                            <option value="vegetable">ผัก</option>
                            <option value="fruit">ผลไม้</option>
                            <option value="good">สินค้าแปรรูป</option>
                        </select>
                    </div>
                </div>
            </div>
            <button class="summit" name="AddProduct">เพิ่มสินค้า</button>
        </form>
        <script src="js/bootstrap.bundle.min.js"> </script>
    </body>
</html>