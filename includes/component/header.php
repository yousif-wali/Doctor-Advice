<?php
if(!isset($_SESSION["username"])){
    session_start();
}
?>
<style>
    *{
        padding:0;
        margin:0;
    }
header{
    display:flex;
    flex-direction:row;
    width:100%;
    height:40px;
    justify-content: space-between;
    align-items: center;
}
header li{
    display:inline-block;
}

</style>
<header>
    <section>Logo</section>
    <section>
        <nav>
            <ul>
                <li><a href="./../../main/index.php" target="_top">Home</a></li>
                <li>Contact us</li>
                <li>About us</li>
            </ul>
        </nav>
    </section>
    <?php
    if(isset($_SESSION['username'])){
        echo '<form action="./../account/validation.php" method="post" target="_top"><button name="logout">Log out</button></form>';
    }else{
        echo '<form action="./../account/login.php" method="post" target="_top"><button>Log in</button></form>';
    }
    ?>
</header>