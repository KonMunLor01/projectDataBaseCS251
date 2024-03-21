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
        <title>Farmer Infomation</title>
        <link rel="stylesheet" href="src/css/FarmerInfo.css">
        <link rel="stylesheet" href="css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.3.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;500&family=Poppins:wght@500&family=Unbounded:wght@300;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="src/css/Navbar
.css">    
</head>
    <body>
    <header>
        <a href="Main.php" class="logo"><img class="icon" src="img\FLG.png"><span>Farmly</span>
        </a>
        <ul class ="navbar">
            <li> <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class="ri-search-2-line"></i>Search</button></li>
            <li><a href ="Basket.php" id="basket"><i class="ri-shopping-basket-2-line"></i>Basket</a></li>
        </ul>
        <div class="main">
        <a href = "History.php" class ="user"><i class="ri-user-fill"></i><?php echo $_SESSION['username']?></a>
        <a href="Main.php?logout='1'">Log out</a>
</div>
    </header>
        <div class="container-fluid" id="main-finfo">
            <div class="row gx-5">
                <div class="col" id="addAgri">
                    <?php
                    $pid = $_SESSION['ProductID'];
                    $usql="SELECT * FROM agriculture WHERE ProductID='$pid'";
                    $uquery = mysqli_query($conn, $usql);
                    $uresult = mysqli_fetch_assoc($uquery);
                    $fid = $uresult['UserID'];
                    $sql = "SELECT * FROM farm WHERE UserID = '$fid'";
                    $query = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($query) > 0){
                    $result = mysqli_fetch_assoc($query);
                    ?>
                    
                    <p id="name-farm">
                        ชื่อฟาร์ม :
                        <?php
                        echo $result['Fname'];
                        ?>
                    </p>
                    <p id="address-farm">
                        ที่อยู่ :
                        <?php
                        echo $result['Faddress'];
                        ?>
                    </p><br>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <p id="rating-farmer">4.2 rating</p>
                    <p id="exp-farmer">ประสบการณ์ : ขายนานกว่า 20 ปี</p>
                    <p id="standard-farm">มาตรฐาน :</p><br>
                    <div class="container" id="st-f">
                        <div class="row">
                            <p>-มาตรฐาน GAP ( Good Agriculture Prac-tices)จากกรมวิชาการเกษตร</p>
                        </div>
                        <div class="row">
                            <p>-มาตรฐาน Q (Organic Thailand) เกษตรอินทรีย์</p>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="col" id="addPhoto"> 
                    <a id="add-photo" width>
                        <img src="img/AddPhoto.png" id="adp-icon">
                        <p id = "name-farmer">
                        <?php
                        $sql2 = "SELECT * FROM farmer WHERE UserID = '$fid'";
                        $query2 = mysqli_query($conn, $sql2);
                        if(mysqli_num_rows($query2) > 0){
                            $result2 = mysqli_fetch_assoc($query2);
                            echo $result2['Firstname'];
                            echo " ";
                            echo " ";
                            echo $result2['Lastname'];
                        }
                        ?>    
                        <br> อายุ : 50 ปี</p>
                    </a>
                 </div>
            </div>
            <div class="row " id="r-c">
                <ul>
                    <div class="col active" id="r">
                        <button class="r-c_Button">Review</button>
                    </div>
                    <div class="col" id="c">
                        <button class="r-c_Button">Community</button>
                    </div>
                    <div class="slide"> </div>
                </ul>
            </div>
            <div class="row " id="comcom_zone">
                <ul>
                    <div class="com active" id="comment">
                        <p id="num-review">รีวิว 400 รายการ</p>
                        <div class="container" id="cc">
                            <img src="img/Bgs.jpg" id="cm1">
                            <label id="name-r">นักรีวิว A</label>
                            <label id="date-r">1 วันที่แล้ว</label>
                            <br>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <div class="container" id="ct-cm">
                                <p id="ct-rv">ตัวแม่ ปังมาก</p>
                            </div>
                            <br>
                        </div>
                        <div class="container" id ="cc">
                            <img src="img/Bg.jpg" id="cm1">
                            <label id="name-r">นักรีวิว B</label>
                            <label id="date-r">3 วันที่แล้ว</label>
                            <br>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <div class="container" id="ct-cm">
                                <p id="ct-rv">ลองแล้วคือจบ</p>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="com" id="community">
                        <p id="num-review">โพสต์ 4 รายการ</p>
                        <div class="container" id ="cc">
                            <img src="img/Bgs.jpg" id="cm1">
                            <label id="name-r">เจ้าของสวนเองนะ</label>
                            <label id="date-r">1 วันที่แล้ว</label>
                            <br>
                            <div class="container" id="ct-cm">
                                <p id="ct-rv" style="padding: 5%">เช้านี้อากาศดีมาก</p>
                                <img src="img/Bgs.jpg" width="80%" height="50%" style="padding: 0 0 4% 2%; border-radius: 5%;">
                            </div>
                            <br>
                        </div>
                    </div>
                </ul>
            </div>  
        </div>
        <script src="server.js"></script>
        <script src="js/bootstrap.bundle.min.js"> </script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script type="text/javascript">
           let count = 0;
            $(document).ready(function(){
                let count = 0;
                $('.r-c_Button').on('click', function() {
                    if(count == 1 && !$(this).parent().hasClass('active')){
                        count--;
                    }else if(count == 0 && !$(this).parent().hasClass('active')){
                        count++;
                    }
                    $('.col').removeClass('active');
                    $(this).parent().addClass('active');
                    $('.com').removeClass('active');
                    if(count == 0){
                        $('#comment').addClass('active'); 
                    }else{
                        $('#community').addClass('active');
                    }
                })
            })
        </script>
    </body>
</html>