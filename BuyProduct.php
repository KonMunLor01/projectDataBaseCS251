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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
    <link rel="stylesheet" href="src/css/BuyProduct.css">
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
            <li><a href ="Basket.php" class="basket"><i class="ri-shopping-basket-2-line"></i>Basket</a></li>
            
        </ul>
        <div class="main">
        <a href = "History.php" class ="user"><i class="ri-user-fill"></i><?php echo $_SESSION['username']?></a>
        <a href="Main.php?logout='1'">Log out</a>
</div>
    </header>
        <div class="container-fluid" id="allcontent">
            <div class="row gx-5">
                <?php if (isset($_SESSION['Basket'])) : ?>
                            <div class="basketAlert">
                                <h3>
                                    <?php 
                                        echo $_SESSION['Basket'];
                                        unset($_SESSION['Basket']);
                                    ?>
                                </h3>
                            </div>
                <?php endif ?>
                <div class="col" id="addPhoto"> 
                    <?php
                        $pid = $_SESSION['ProductID'];
                        $sql="SELECT * FROM agripicture WHERE ProductID = '$pid'";
                        $query = mysqli_query($conn, $sql);
                        $result = mysqli_fetch_assoc($query);
                        ?> 
                            <img src="./image/<?php echo $result['filename']; ?>" class ="preview1" id="img">
                    
                 </div>
                
                <div class="col" id="addAgri">
                    <div class="col" id="detail">
                        <?php
                        $sql1 = "SELECT * FROM agriculture WHERE ProductID = '$pid'";
                        $query1 = mysqli_query($conn, $sql1);
                        if(mysqli_num_rows($query1) > 0){
                        $sql3 = "SELECT * FROM adds WHERE ProductID = '$pid'";
                        $query3 = mysqli_query($conn, $sql3);
                        $result3 = mysqli_fetch_assoc($query3);

                        $result1 = mysqli_fetch_assoc($query1);
                        ?>
                    <label id="name-product">
                    <?php
                        echo $result1['Name'];
                    ?>
                    </label><br>
                    <label id="detail-product">รายละเอียดสินค้า</label><br>
                    <?php
                        echo $result3['Price'];
                    ?> ฿ (ต่อกิโลกรัม)<br>
                        <?php
                        echo $result1['Detail'];
                        ?><br>
                        สั่งซื้อขั้นต่ำกี่โล/กี่ฝัก :<br>
                        ค่าจัดส่ง :จ.สงขลา 30฿ กทม 60฿<br>
                        <label id="score">คะแนนสินค้า 4.5 /5</label><br><br><br>
                        <?php
                        }
                        ?>
                        </div>
            <form action="AddBasket.php" method="post">
                <label id="Amount"> จำนวนสินค้า</label>
                <?php 
                    $sql2="SELECT * FROM agriculture WHERE ProductID ='$pid'";
                    $query2= mysqli_query($conn, $sql2);
                    $result2 = mysqli_fetch_assoc($query2);
                ?>
                <input type="number" id="Amount" name="amounts" min = 1 max = <?php echo $result2['Total_amout']?> required>
                <label id="Amount">ชิ้น</label>
                <button class="submit" id="Button-BuyProduct" name="AddBasket">เพิ่มลงตะกร้า</button>
            </form>
            <div class="col" id="pro">
                <form action="Finfo.php" id="getAgri" method="post">
                    <button id="adp-pro"><img src="img/6522516.png"  width = "100%" height = "100%"> </button>
                </form>
              </div>
                    </div>
                
                
                
            </div>
           
        
        
        <script type= "text/javascript" src ="js/shopscript.js"></script>
    </body>
</html>