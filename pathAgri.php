<?php 

    session_start();
    include('Server.php');
    $errors = array();

    if(isset($_POST['goAgri'])) {
            $productid= mysqli_real_escape_string($conn,$_POST['Pid']);
            $_SESSION['ProductID'] = $productid;
            header('location: BuyProduct.php');
        }
?>