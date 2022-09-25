<?php
ob_start();
include_once "./../data.php";

function hashing($e){
    $opts03 = [ "cost" => 15 ];
    return password_hash($e, PASSWORD_BCRYPT, $opts03);
}
//                        signup form
if(isset($_POST['signup'])){
    $username = mysqli_real_escape_string($connection, $_POST["username"]);
    $fullname = mysqli_real_escape_string($connection, $_POST["fullname"]);
    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $pwd = mysqli_real_escape_string($connection, $_POST["password"]);
    $cpwd = mysqli_real_escape_string($connection, $_POST["confirmPassword"]);
    $dob = mysqli_real_escape_string($connection, $_POST["dob"]);
    $phone = mysqli_real_escape_string($connection, $_POST["phone"]);
    $height = mysqli_real_escape_string($connection, $_POST["height"]);
    $weight = mysqli_real_escape_string($connection, $_POST["weight"]);

    $hashed = hashing($pwd);

    if(strlen($username) < 4){
        header("Location: ./signup.php?err=shortname");
    }else{
        if($pwd < 8){
            header("Location: ./signup.php?err=shortpwd");
        }
        else{
            if($pwd != $cpwd){
            header("Location: ./signup.php?err=pwdnotmatch");
            }else{
            $userExist = mysqli_query($connection, "SELECT * FROM accounts WHERE username = '$username'");
            if(mysqli_num_rows($userExist) > 0){
                header("Location: ./signup.php?err=userexist");
            }else{
            mysqli_query($connection, "insert into accounts (username, fullname, pwd, privilege, dob, height, weight, email, phone) VALUES ('$username', '$fullname', '$hashed', 'regular', '$dob', '$height', '$weight', '$email', '$phone')");
            session_start();
            $_SESSION["username"] = $username;
            header("Location: ./../../main/index.php");
            }
            }
        }
    }
}
//                        Login form
if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($connection, $_POST["username"]);
    $pwd = mysqli_real_escape_string($connection, $_POST["password"]);
    
    $searching = mysqli_query($connection, "SELECT * FROM accounts WHERE username = '$username' Or phone = '$username' OR email = '$username' AND pwd = '$pwd'");

    $correctPwd = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * from accounts where email = '$username' OR username = '$username' OR phone = '$username' "))["pwd"];
    if(mysqli_num_rows($searching) > 0){
        session_start();
        if(password_verify($pwd, $correctPwd)){
            while($row = mysqli_fetch_assoc($searching)){
                $_SESSION['fullname'] = $row['fullname'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
            }
            header('Location: ./../../main/index.php');
        }else{
            header("Location: ./login.php?err");
        }
    }else{
        header("Location: ./login.php?err");
    }
}
//                        Logout
if(isset($_POST['logout'])){
    session_start();
    session_unset();
    session_destroy();
    header("Location: ./../../main/index.php");
}
ob_flush();