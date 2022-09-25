<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <style>
        main{
            display:flex;
            justify-content: center;
            align-items: center;
            min-height:calc(100vh - 40px);
            width:100%;
        }
        form{
            display:flex;
            flex-direction:column;
        }
        label{
            position:relative;
            margin-top:10px;
        }
        label[data-required="true"]::after{
            content:"*";
            position:absolute;
            margin-left:3px;
            color:red;
            width:10px;
            height:10px;
        }
        button{
            margin-top:10px;
        }
        object[data-type="header"]{
            position:sticky;
            top:0;
            height:40px;
            border-bottom:1px solid black;
            width:100%;
        }
    </style>
</head>
<body>
    <object data-type="header" data="./../component/header.php"></object>
    <main>
    <form autocomplete="off" action="./validation.php" method="post">
        <label for="username" data-required="true">Username/Email/Phone</label>
        <input id="username" type="text" name="username" required>

        <label for="password" data-required="true">Password</label>
        <input id="password" type="password" name="password" required>

        <button name="login">Log in</button>
        <small>Do not have an account?<a href="./signup.php">Create one.</a></small>
    </form>
</main>
</body>
</html>