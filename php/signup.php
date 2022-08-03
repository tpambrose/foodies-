
<?php
$success = 0;
$user = 0;

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include('../config/dbconnect.php');
  
    $username=$_POST['username'];
    $email=$_POST['email'];
    $pass_word=$_POST['pass_word'];
    $salt = "salt";
    $hashed_password = sha1($pass_word.$salt);

    

    $sql= "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $num = mysqli_num_rows($result);
        if($num>0){
            $user =1;
        }
        else{
    $sql = "INSERT INTO user(username, email, pass_word) VALUES ('$username', '$email', '$hashed_password')";
    $result = mysqli_query($conn, $sql);
    if($result){
        $success=1;
        $_SESSION['status'] = "";
        header('location:login.php');
    } else{
        die(mysqli_error($conn));
    }

        }
    }
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/signup.css">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="../styles/order.css">
      <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn-tailwindcss.vercel.app/"></script> 
    <title>Document</title>
</head>
<body>

<?php
    if($user){
        echo ' <div class="bg-white mt-10 border-l-8 w-1/4 p-10 ml-10 animate-bounce mb-10 border-green-500 text-red-900 tounded p-4" role="alert">
        <p class="font-bold text-red-500 w-full">Sign up failed, a user with this email already exists</p>
        
    </div>';

    }
    ?>
     <?php
    if($success){
        echo ' <div class="bg-orange-100 border-l-8 w-1/2 p-10 ml-10  mb-10 border-green-500 text-green-500 p-4" role="alert">
        <p class="font-bold">Sign up success</p>
        <p>You have signed up successfully</p>
    </div>';

    }
    ?>
    

    <div style="display: flex; flex-direction: column; align-items: center; justify-content:center;">
        <h1 style="margin-top: 5rem;">SIGN UP</h1>
   

    <form class="order-form" action="signup.php" method="POST">
       
       <div class="form-grp">
<label for="name">full name</label>
<input type="text" name="username">
</div>
<div class="form-grp">
<label for="name">email</label>
<input type="text" name="email">
</div>
<div class="form-grp">
<label for="name">password</label>
<input type="password" name="pass_word">
</div>







<button class="pay">sign up</button>
   </form>
    </div>   
</body>
</html>

    
    
 

