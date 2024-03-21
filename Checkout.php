<?php 
    session_start();
    include('Server.php');
    $errors = array();
    $msg = "";

    if(isset($_POST['checkout'])) {        
        $userid = $_SESSION['UserID'];
        $checksql = "SELECT * FROM Basket WHERE UserID = '$userid'";
        $checkquery = mysqli_query($conn, $checksql);
        if(mysqli_num_rows($checkquery) > 0){
            while($list = mysqli_fetch_assoc($checkquery)){
                $temp = $list['Amount'];
                $order = $list['Orders'];

                $pid=$list['ProductID'];
                $sql1="SELECT * FROM agriculture WHERE ProductID = '$pid'";
                $query1 = mysqli_query($conn, $sql1);
                $am = mysqli_fetch_assoc($query1);
                $amn = $am['Total_amout'];
                while($temp > 0){
                    $temp = $temp-1;
                    $amn = $amn-1;
                }
                $usql1="UPDATE agriculture SET Total_amout = '$amn' WHERE ProductID = '$pid'";
                $uquery1 = mysqli_query($conn, $usql1);

                $temp = $list['Amount'];

                $sql2="SELECT * FROM adds WHERE ProductID = '$pid'";
                $query2 = mysqli_query($conn, $sql2);
                $am2 = mysqli_fetch_assoc($query2);
                $amn2 = $am2['Amount'];
                while($temp > 0){
                    $temp = $temp-1;
                    $amn2 = $amn2-1;
                }
                $usql2="UPDATE adds SET Amount = '$amn2' WHERE ProductID = '$pid'";
                $uquery2 = mysqli_query($conn, $usql2);

                $iosql="INSERT INTO Orders(OrderID, ProductID, UserID) VALUES ('$order','$pid' ,'$userid')";
                $ioquery = mysqli_query($conn, $iosql);

                $isql="INSERT INTO history(UserID, OrderID, State) VALUES ('$userid','$order','Finish')";
                $iquery = mysqli_query($conn, $isql);
                
                $dsql ="DELETE FROM basket WHERE ProductID = '$pid'";
                $dquery = mysqli_query($conn,$dsql);
            }

            $_SESSION['checkout']="Purchase successful!";
            header('location: Basket.php');
        }else{
            $_SESSION['checkout']="No item in basket!";
            header('location: Basket.php');
        }
    }
?>