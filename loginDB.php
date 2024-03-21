<?php 

    session_start();
    include('Server.php');

    $errors = array();

    if(isset($_POST['loginto'])) {
        $username = mysqli_real_escape_string($conn, $_POST['Username']);
        $password = mysqli_real_escape_string($conn, $_POST['Password']);
    }

    if(count($errors)==0){
       
        $query = "SELECT * FROM Customer WHERE Username = '$username' OR Email = '$username' AND Password = '$password' ";
        $result = mysqli_query($conn,$query);
        $query2 = "SELECT * FROM Farmer WHERE Username = '$username' OR Email = '$username' AND Password = '$password' ";
        $result2 = mysqli_query($conn,$query2);

        if (mysqli_num_rows($result)==1 || mysqli_num_rows($result2)==1){
            if(mysqli_num_rows($result)==1){
                $usid = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $_SESSION['UserID']=$usid["UserID"];
                $_SESSION['username'] = $usid["Username"];
                header('location: Main.php');
            }else if(mysqli_num_rows($result2)==1){
                $usid = mysqli_fetch_array($result2, MYSQLI_ASSOC);
                $_SESSION['UserID']=$usid["UserID"];
                $_SESSION['username'] = $usid["Username"];
                header('location: BackFarmer.php');
            }
        } else{
            array_push($errors, "Wrong username/password combination");
            $_SESSION['error'] = "Wrong username/password try again!!";
            header('location: Login.php');
        }
    }
?>