 <?php
    session_start();

    if(isset($_SESSION['user_name'])){
        setcookie('cookie', $_SESSION['user_name'], time() + 10000,"/");
    }else{
        header('Location: index.php');
    }
    ?>


 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="css/style.css">
     <title>Home</title>
 </head>

 <body>
    <div class="wrapper">
    <span>Hello, <?= $_SESSION['user_name'] ?></span>
     <a class="exit" href="inc/logout.php">Выход</a>

    </div>

 </body>

 </html>