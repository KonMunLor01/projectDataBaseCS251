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
    include('Server.php');
    
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
    <link rel="stylesheet" href="src/css/History.css">
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
    <script type= "text/javascript" src ="js/shopscript.js"></script>

        <div class="main-block" id="main-block">
        <h1>History</h1>
        <div class="table">
        <table>
    <thead>
      <tr>
        <th>UserID</th>
        <th>Order ID</th>
        <th>Product Name</th>
        <th>State</th>
        
      </tr>
    </thead>
    <tbody id="purchase-history">
    <?php
            // Retrieve data from the database for the logged-in user only
            $userID = $_SESSION['UserID']; // Assuming UserID is stored in 'username' session variable

            $sql = "SELECT * FROM history WHERE UserID = '$userID'";
            $result = $conn->query($sql);

            // Check if any rows are returned
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["UserID"] . "</td>";
                    echo "<td>" . $row["OrderID"] . "</td>";
                    
                    // Fetch product name and state using JOIN instead of separate queries
                    $orderID = $row["OrderID"];
                    $sql2 = "SELECT orders.*, agriculture.Name FROM orders JOIN agriculture ON orders.ProductID = agriculture.ProductID WHERE orders.OrderID = $orderID";
                    $result2 = $conn->query($sql2);
                    
                    if ($result2->num_rows > 0) {
                        $order = $result2->fetch_assoc();
                        echo "<td>" . $order["Name"] . "</td>";
                        echo "<td>" . $row["State"] . "</td>";
                    } else {
                        echo "<td colspan='2'>Product not found</td>";
                    }
                    
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>

    </tbody>
  </table>
</div>
        </div>
        
        </body>
</html>