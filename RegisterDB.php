<?php 

    session_start();
    include('Server.php');
    $errors = array();

    if(isset($_POST['register'])) {
        $role = mysqli_real_escape_string($conn, $_POST['role']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $surname = mysqli_real_escape_string($conn, $_POST['surname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cfpass = mysqli_real_escape_string($conn, $_POST['confirm_password']);
        if ($password != $cfpass){
            array_push($errors, "The two passwords do not match");
        }

        if ($role == 'customer') {
            $query = "SELECT * FROM `customer` WHERE `Username` = '$username' OR `Email` = '$email'";    
            $result = mysqli_query($conn, $query);
            if ($result == TRUE) {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['Username'] == $username) {
                       array_push($errors, 'Username already exists');
                    }
                    if ($row['Email'] == $email) {
                        array_push($errors, 'Email already exists');
                    }
                }
            }
            $query1 = "SELECT * FROM `farmer` WHERE `Username` = '$username'";    
            $result1 = mysqli_query($conn, $query1);
            if ($result1 == TRUE) {
                if (mysqli_num_rows($result1) > 0) {
                    $row1 = mysqli_fetch_assoc($result1);
                    if ($row1['Username'] == $username) {
                       array_push($errors, 'Username already exists');
                    }
                }
            }  
            
        }
        else{
            $storename = mysqli_real_escape_string($conn, $_POST['storename']);
            $storeaddress = mysqli_real_escape_string($conn, $_POST['storeaddress']);
            $tub = mysqli_real_escape_string($conn, $_POST['tub']);
            $kate = mysqli_real_escape_string($conn, $_POST['kate']);
            $jak = mysqli_real_escape_string($conn, $_POST['jak']);
            $zip = mysqli_real_escape_string($conn, $_POST['zip']);
           if($storename == ""  || $storeaddress == "" || $tub == "" || $kate == "" || $jak == "" || $zip == ""){
                array_push($errors,'Missing farm infomation');
            }
            $query = "SELECT * FROM `farmer` WHERE `Username` = '$username' OR `Email` = '$email'";    
            $result = mysqli_query($conn, $query);
            if ($result !== false) {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['Username'] == $username) {
                       array_push($errors, 'Username already exists');
                    }
                    if ($row['Email'] == $email) {
                        array_push($errors, 'Email already exists');
                    }
                }
            }
            $query1 = "SELECT * FROM `customer` WHERE `Username` = '$username'";    
            $result1 = mysqli_query($conn, $query1);
            if ($result1 !== false) {
                if (mysqli_num_rows($result1) > 0) {
                    $row1 = mysqli_fetch_assoc($result1);
                    if ($row1['Username'] == $username) {
                       array_push($errors, 'Username already exists');
                    }
                }
            }
        }
        if(count($errors)==0){
            if($role == 'customer'){
                $sql = "INSERT INTO Customer(Tier, Username, Password, Firstname, Lastname, Tel, Email) VALUES ('5', '$username', '$password', '$name', '$surname', '$tel', '$email')";
                $insertc = mysqli_query($conn, $sql);
                header('location: Login.php');
            }
            else{
                $storename = mysqli_real_escape_string($conn, $_POST['storename']);
                $storeaddress = mysqli_real_escape_string($conn, $_POST['storeaddress']);
                $tub = mysqli_real_escape_string($conn, $_POST['tub']);
                $kate = mysqli_real_escape_string($conn, $_POST['kate']);
                $jak = mysqli_real_escape_string($conn, $_POST['jak']);
                $zip = mysqli_real_escape_string($conn, $_POST['zip']);
                $sql = "INSERT INTO Farmer(Username, Password, Firstname, Lastname, Tel, District, Zipcode, Email) VALUES ('$username', '$password', '$name', '$surname', '$tel', '$kate', '$zip', '$email')";
                $insertc = mysqli_query($conn, $sql);
                $sqluid = "SELECT * FROM `Farmer` WHERE `Username` = '$username'";
                $uid = mysqli_query($conn, $sqluid);
                $fuid = mysqli_fetch_array($uid);
                $UserID = $fuid['UserID'];
                $fadd = $storeaddress.$tub.$kate.$jak.$zip;
                $sqlfarm = "INSERT INTO Farm(UserID, Faddress, Fname) VALUES ('$UserID','$fadd','$storename')";
                $insertf = mysqli_query($conn, $sqlfarm);
                header('location: Login.php');
            }
        }else{
            array_push($errors, "Incorrect data please try again");
            $_SESSION['error'] = "Incomplete data/Incorrect data please try again!";
            header("location: Register.php");
        }
    }
?>