<?php 
     session_start();
     include('Server.php');
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
        <title> Farmer </title>
        <link rel="stylesheet" href="src/css/BackFarmer.css">
        <link rel="stylesheet" href="src/css/Navbar.css">
        <link rel="stylesheet" href="css/bootstrap-grid.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
            </ul>
            <div class="main">
            <a href = "Fhistory.php" class ="user"><i class="ri-user-fill"></i><?php echo $_SESSION['username']?></a>
            <a href="Main.php?logout='1'">Log out</a>
            
    </div>
        </header>
    </header>
    <div id = "allcon">
        <div class="container">
            <div class="row" id="M-M">
                <div class="col" id="income">
                    <p>รายรับทัั้งหมด</p>
                    <div class="flex-wrapper">
                        <div class="single-chart">
                          <svg viewBox="0 0 36 36" class="circular-chart violet">
                            <path class="circle-bg"
                              d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"
                            />
                            <path class="circle"
                              stroke-dasharray="65, 100"
                              d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"
                            />
                            <text x="18" y="20.35" class="percentage">65%</text>
                          </svg>
                        </div>
                        <p id="valueIn">26,000/40,000 <br><label id="ts">Total Sales</label></p>
                      </div>
                    </div>
                <div class="col" id="Adsv">
                    <p>วงเงินการยิงโฆษณา</p>
                    <div class="flex-wrapper">
                        <div class="single-chart">
                          <svg viewBox="0 0 36 36" class="circular-chart green">
                            <path class="circle-bg"
                              d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"
                            />
                            <path class="circle"
                              stroke-dasharray="25, 100"
                              d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"
                            />
                            <text x="18" y="20.35" class="percentage">25%</text>
                          </svg>
                        </div>
                        <p id="valueIn">500/2,000 <br><label id="ts">Total Payment</label></p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" id="sell-his">
            <div class="row">
                <p id="statica">สถิติการขายสินค้าทั้งหมด</p>
                <div class="col" id="g-sellhis">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="col" id="product1">
                <?php
                $uid = $_SESSION['UserID'];
                $sql="SELECT * FROM `agriculture` WHERE `UserID` = '$uid'";
                $query= mysqli_query($conn, $sql);
                $i = 0;
                if($query == TRUE){
                    while ($data = mysqli_fetch_array($query)) {
                        $i = $i+1;
                        ?>
                            <label>
                                สินค้าที่ 
                            <?php
                                echo $i;
                                echo " ";
                                echo $data['Name'];
                            ?>    
                            </label>
                            <br>
                        <?php
                        }
                    }
                        ?>
                </div>
            </div>
            <br>
        </div>
        <div class="container" id="other-f">
            <div class="row">
                <p id="text-menu">เมนูอื่นๆ</p>
                <div>
                    <img src="img/Bgs.jpg" id="other1">
                    <img src="img/Bgs.jpg" id="other2">
                    <label id ="add-ads">ลงโฆษณาสินค้า</label>
                    <label id ="add-pd">เพิ่มสินค้าใหม่</label>
                    <a  href="AddProduct.php">
                        <button id="other-n">ดูเพิ่มเติม</button>
                    </a>
                    <a href="AddProduct.php">
                        <button id="other-a">ดูเพิ่มเติม</button>
                    </a>
                </div>
            </div>
        </div>
        <br>

    </div>
        <script src="server.js"></script>
        <script src="src/js/BackFarmer.js"></script>
        <script src="js/bootstrap.bundle.min.js"> </script>
    </body>
</html>