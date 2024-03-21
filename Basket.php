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
        <link rel="stylesheet" href="src/css/Basket.css">
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
    <form action="Checkout.php" id="buyPro"  method="post">
        <button class="summit" name="checkout" >ชำระสินค้า</button>
    </form>
    <div class="total-block" id="total-block">
         <h1>Payment</h1><br>
         <?php if (isset($_SESSION['checkout'])) : ?>
                            <div class="checkoutAlert">
                                <h3>
                                    <?php 
                                        echo $_SESSION['checkout'];
                                        unset($_SESSION['checkout']);
                                    ?>
                                </h3>
                            </div>
                <?php endif ?>
         <div class="total-main" id="total-main">
            <p>Total:<?php if (isset($_SESSION['sum'])) : ?>
            <?php
                echo $_SESSION['sum'];
                unset($_SESSION['sum']);
            ?>
            <?php endif ?></p>
            <p>Discount:</p>
            <p>Tax:</p>
            
         </div>
    </div>             
        <div class="item-block" id="item-block">
        <h1>Basket</h1>
        <div class="table">
        <table>
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Total Price</th>
      </tr>
    </thead>
    <tbody>
            <?php
            // Fetch data from the database
            $userID = $_SESSION['UserID'];
        $sql = "SELECT b.*, a.Name, ad.Price
        FROM basket b
        JOIN agriculture a ON b.ProductID = a.ProductID
        JOIN adds ad ON b.ProductID = ad.ProductID
        WHERE b.UserID = $userID";
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // Output data for each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Price'] . "</td>";
                    echo "<td>" . $row['Amount'] . "</td>";
                    echo "<td>" . $row['Price'] * $row['Amount'] . "</td>";
                    echo "</tr>";
                    $total[]=$row['Price']*$row['Amount'];
                    $_SESSION['sum']=array_sum($total);
                }
                
                    
                
            } else {
                echo "<tr><td colspan='3'>No products found</td></tr>";
            }
            $conn->close();
            ?>
            
        </tbody>
</table>   

        </div>   
                
        
        
        <script src="server.js"></script>
        <script src="js/bootstrap.bundle.min.js"> </script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    </body>
</html>