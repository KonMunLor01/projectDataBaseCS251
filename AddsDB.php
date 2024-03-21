<?php 

    session_start();
    include('Server.php');
    $errors = array();
    $msg = "";

    if(isset($_POST['AddProduct'])) {
        $productname = mysqli_real_escape_string($conn, $_POST['Productname']);
        $productdetail = mysqli_real_escape_string($conn, $_POST['Productdetail']);
        $productamount = mysqli_real_escape_string($conn, $_POST['Productamount']);
        $productprice = mysqli_real_escape_string($conn, $_POST['Productprice']);
        $producttype = mysqli_real_escape_string($conn, $_POST['typeAgri']);
        
        $filename = $_FILES["Productpicture"]["name"];
        $tempname = $_FILES["Productpicture"]["tmp_name"];
        $_SESSION['test'] = $filename;
        $folder = "./image/" . $filename;
        $userid = $_SESSION['UserID'];

        $query = "SELECT * FROM `Agriculture` WHERE `Name` = '$productname' and `UserID` = '$userid'";
        $result = mysqli_query($conn,$query);
        $check=mysqli_fetch_array($result);
        if($check){
            $pid = $check['ProductID'];
            $query_am = "UPDATE `agriculture` SET `Total_amout`='$productamount',`Detail`='$productdetail' WHERE `UserID` = $userid and `Name` = '$productname'";
            mysqli_query($conn,$query_am);
            $query_aam = "UPDATE `adds` SET `Price`= $productprice ,`Amount`=$productamount WHERE `ProductID` = $pid";
            mysqli_query($conn,$query_aam);
            $query_uppic = "UPDATE `agripicture` SET `filename` = '$filename' WHERE `ProductID` = '$pid'";
            mysqli_query($conn,$query_uppic);
            if (move_uploaded_file($tempname, $folder)) {
                $_SESSION['photo']="Update product complete!";
            } else {
                echo "<h3>  Failed to upload image!</h3>";
            }

            $isql="INSERT INTO fhistory(`ProductID`,`Price`,`Amount`,`UserID`) VALUES ('$pid','$productprice','$productamount','$userid')";
            $iquery = mysqli_query($conn, $isql);

            header('location: AddProduct.php');
        }
        else{
            $query1 = "INSERT INTO `agriculture` (`Total_amout`, `Name`, `Detail`, `UserID`) VALUES ('$productamount','$productname','$productdetail',$userid) ";
            mysqli_query($conn,$query1);
            $query_pid = "SELECT `ProductID` FROM `agriculture` WHERE `UserID` = $userid and `Name` = '$productname'";
            $resultpid = mysqli_query($conn,$query_pid);
            $checkpid=mysqli_fetch_array($resultpid);
            $pid = $checkpid['ProductID'];
            $query2 = "INSERT INTO `adds` (`ProductID`,`Price`,`Amount`) VALUES ('$pid','$productprice','$productamount')";
            mysqli_query($conn,$query2);
            $query_test= "INSERT INTO `market_place` VALUES ('$pid', 3, '$producttype')";
            mysqli_query($conn,$query_test);
            $query_pic = "INSERT INTO `agripicture` (`ProductID`, `filename`) VALUES ('$pid','$filename')";
            mysqli_query($conn,$query_pic);

            $isql="INSERT INTO fhistory(`ProductID`,`Price`,`Amount`,`UserID`) VALUES ('$pid','$productprice','$productamount','$userid')";
            $iquery = mysqli_query($conn, $isql);

            if (move_uploaded_file($tempname, $folder)) {
                $_SESSION['photo']="Add product complete!";
            } else {
                echo "<h3>  Failed to upload image!</h3>";
            }
            header('location: AddProduct.php');
        }
    }
?>