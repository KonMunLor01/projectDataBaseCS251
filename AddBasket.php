<?php 
    session_start();
    include('Server.php');
    $errors = array();
    $msg = "";

    if(isset($_POST['AddBasket'])) {        
        $userid = $_SESSION['UserID'];
        $productid = $_SESSION['ProductID'];
        $amount = mysqli_real_escape_string($conn, $_POST['amounts']);
        $checksql = "SELECT * FROM Basket WHERE UserID = '$userid' and ProductID = '$productid'";
        $checkquery = mysqli_query($conn, $checksql);
        if(mysqli_num_rows($checkquery) == 0){
            $query = "INSERT INTO `Basket`(ProductID, UserID, Amount) VALUES ('$productid','$userid','$amount')";
            $result = mysqli_query($conn, $query);
            $_SESSION['Basket']="Add item to basket success!";
            header('location: BuyProduct.php');
        }else{
            $query = "UPDATE `Basket` SET `Amount` = '$amount' WHERE UserID = '$userid' and ProductID = '$productid'";
            $result = mysqli_query($conn, $query);
            $_SESSION['Basket']="Update item to basket success!";
            header('location: BuyProduct.php');
        }
    }
?>