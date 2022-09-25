<?php
include_once "./../includes/data.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diseases - Portal</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        body{
            display:flex;
            justify-content: center;
            align-items:center;
            min-height:100vh;
        }
        form{
            display:flex;
            flex-direction:column;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <input placeholder="Username">
        <input placeholder="Password"/>
        <small>Do not have an account?<a href="./../includes/account/signup.php">Create one.</a></small>
    </form>
</body>
</html>