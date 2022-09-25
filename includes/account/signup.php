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
            width: 100%;
            height:40px;
            border-bottom:1px solid black;
        }
    </style>
</head>
<body>
    <object data-type="header" data="./../component/header.php"></object>
    <main>
    <form autocomplete="off" action="./validation.php" method="post">
        <label for="username" data-required="true">Username</label>
        <input id="username" type="text" name="username" required>

        <label for="fullname" data-required="true">Fullname</label>
        <input id="fullname" type="text" name="fullname" required>

        <label for="email" data-required="true">Email</label>
        <input id="email" type="email" name="email" required>

        <label for="phone" data-required="true">Phone</label>
        <input id="phone" type="tel" name="phone" required>

        <label for="password" data-required="true">Password</label>
        <input id="password" type="password" name="password" required>

        <label for="confirm" data-required="true">Confirm Password</label>
        <input id="confirm" type="password" name="confirmPassword" required>

        <label for="dob" data-required="true">Date of Birth</label>
        <input id="dob" type="date" name="dob" required>

        <label for="height">Height(cm)</label>
        <input id="height" type="number" step="0.01" name="height">

        <label for="weight">Weight(kg)</label>
        <input id="weight" type="number" step="0.01" name="weight">
        <button name="signup">Sign up</button>
        <small>Already have an account?<a href="./login.php">Log in</a></small>
    </form>
</main>
</body>
</html>