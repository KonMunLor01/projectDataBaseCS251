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
        <link rel="stylesheet" href="src/css/MainShop.css">
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
    <div id ="maincontent">
    <h2> New release! </h2>
        <?php
        $i = 0; 
        ?>
        <?php
        $sqlagri = "SELECT * FROM Agriculture";
        $query = mysqli_query($conn, $sqlagri);
        while($resultagri = mysqli_fetch_assoc($query)){
            if($i==0||$i-5==0){
                $i=0;
                ?>
            <div class="row">
            <?php
            }
                $pid = $resultagri['ProductID'];
                $sqlaimg = "SELECT * FROM Agripicture WHERE ProductID = '$pid'";
                $query2 = mysqli_query($conn, $sqlaimg);
                $result2 = mysqli_fetch_assoc($query2);
                $sqlprice = "SELECT * FROM Adds WHERE ProductID = '$pid'";
                $query3 = mysqli_query($conn, $sqlprice);
                $result3 = mysqli_fetch_assoc($query3);
            ?>
                <div class="col" id ="col">
                        <form action="pathAgri.php" method="post">
                            <input value="<?php echo $pid?>"type="hidden" name="Pid">
                            <button id="gotoAgri" name="goAgri">
                            <div class="row" id="imgA">
                                <img src="./image/<?php echo $result2['filename']; ?>" class="imgShow">
                            </div>
                            <div class="row">
                                <p><?php echo $resultagri['Name'] ?><br>
                                ฿ <?php echo $result3['Price'] ?></p>
                            </div>
                            </button>
                        </form>
                </div>
            <?php
            if($i-5==0){
                ?>
                </div>
            <?php
            }   
            $i = $i+1;
        }
        ?>
    </div>
    <script type= "text/javascript" src ="js/shopscript.js"></script>
</body>
    