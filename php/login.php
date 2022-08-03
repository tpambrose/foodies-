<?php
$login = 0;
$invalid = 0;

session_start();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('../config/dbconnect.php');

    $email = $_POST['email'];
    $pass_word = $_POST['pass_word'];
    $salt = "salt";
    $password_encrypted = sha1($pass_word.$salt);




    $sql = "SELECT * FROM user WHERE email='".$email."' and pass_word='".$password_encrypted."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            header('location:admin.php');
        
        
                $login = 1;
                session_start();
                $_SESSION['email'] = $email;
                if ($row["usertype"] == "admin") {
                    header('location:admin.php');
                } else {
                    
                    header('location:../index.php');
                }
                
            }
        } else {
            echo "test";

            $invalid = 1;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="../styles/order.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<script src="https://cdn.tailwindcss.com"></script>
<title>Document</title>
</head>

<body>


    <?php
    if ($invalid) {
        echo ' <div class="bg-white p-20 border-l-8 w-1/4 mt-10 p-10 ml-10 animate-bounce mb-10 border-red-500 rounded text-red-500 p-4" role="alert">
        <p class="font-bold text-red-500 w-full">Login failed, Invalid data try again</p>
        
    </div>';
    }
    ?>
    <?php
    if ($login) {
        echo ' <div class="bg-white border-l-8 w-1/2 p-10 ml-10  mb-10 border-green-500 text-green-500 p-4" role="alert">
        <p class="font-bold text-green-500">login success, you have logged in successfully</p>
      
    </div>';
    }
    ?>

    <div class="login">
        <?php
        if (isset($_SESSION['status'])) {
        ?>
            <div class="bg-white border-l-4 mt-10 ml-10 border-green-500 text-black font-extrabold w-1/2 p-4" role="alert">
                <p class="font-bold text-black text-green-300">success</p>
                <p class="font-bold text-black">Signed up successfully <span>Login to contnue</span></p> <?php echo $_SESSION['status']; ?>
            </div>
        <?php

            unset($_SESSION['status']);
        }
        ?>
       <div style="display: flex; flex-direction: column; align-items: center; justify-content:center;">
        <h1 style="margin-top: 5rem;">LOGIN</h1>
   

        <form class="order-form" action="login.php" method="POST">
       
     
<div class="form-grp">
<label for="name">email</label>
<input type="text" name="email">
</div>
<div class="form-grp">
<label for="name">password</label>
<input type="password" name="pass_word">
</div>







<button class="pay">Login</button>
   </form>

    </div>



</body>

</html>