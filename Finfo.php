<?php 

    session_start();
    include('Server.php');
    $errors = array();

    if(isset($_SESSION['ProductID'])) {
            $pid = $_SESSION['ProductID'];
            $sql = "SELECT * FROM agriculture WHERE ProductID = '$pid' ";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($query);
            $_SESSION['FarmerID'] = $result['UserID'];
            header('location: FarmerInfo.php');
        }
        else{
           
            header('location: BuyProduct.php');
        }
?>