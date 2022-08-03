
<?php
$success = 0;
$user = 0;

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include('./config/dbconnect.php');
  
    $names=$_POST['names'];
    $email=$_POST['email'];
    $mess_age=$_POST['mess_age'];

    $sql = "INSERT INTO contact(names, email, mess_age) VALUES ('$names', '$email', '$mess_age')";
    $result = mysqli_query($conn, $sql);
    if($result){
        $success=1;
    } else{
        die(mysqli_error($conn));
    }

        }
    

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn-tailwindcss.vercel.app/"></script> 
    <title>Document</title>
    <link rel="stylesheet" href="./main.css">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/gallery.css">
</head>

<body>

    <header>
        <div class="overlay-header">
            <nav class="nav- ">
                <div class="logo-del">
                    <h3> <a href="/">FOODIE</a> </h3>
                </div>
                <div class="openMenu"><img src="./assets/icons/humberger.png" alt=""></div>
                <ul class="mainMenu">
                    <li><a href="./">Home</a></li>
                    <li><a href="./php/gallery.php">Gallery</a></li>
                    <li><a href="#contact">Contact us</a></li>
                    <li><a href="./php/signup.php">Sign up</a></li>
                    <li><a href="./php/login.php">login </a></li>
                    <li><a href="./php/admin.php">Admin</a></li>
                    <button><a href="./php/order.php">Order now</a></button>
                    <div class="closeMenu"><img src="./assets/icons/close.png" alt=""></div>
                </ul>
            </nav>
        </div>

    </header>
 
    <!-- <?php
    
   
   
    ?> -->
   
    <section class="landing">
        <div class="landing-txt">
            <h1>Get your cuisine delivered right to <span> Your door</span></h1>
            <p>taste it. feel good! 
                .</p>
            <button>Explore food</button>
        </div>
        <div class="landing-img">
            <img src="./assets/wings.jpg" alt="">
        </div>

    </section>


    <section class="about" id="about">
        <div class="about-txt">
            <h1>About us</h1>
            <p>we are an online based platform based in Rwanda .we offer services all over the country,order with us at favourable prices and get your tastes buds dancing</p>
       
            <div class="social">
            <img src="./assets/ig.png" alt="">
            <img src="./assets/fb.png" alt="">
            <img src="./assets/twitter.png" alt="">
        </div>
        </div>
    </section>

    <section class="gallery-landing">
        <div class="foods">
            <article>
                <figure class="post-over">
                    <img src="./assets/cheeseburger.jpg" alt="">
                    <figcaption class="overlay-p">
                        <p>cheese burger </p>
                    </figcaption>
    
                </figure>
            </article>

       

            <div class="gallery-img">
                <div class="foods">
                 
                
                
                
                <article>
                <figure class="post-over">
                <img src="./assets/wings.jpg" alt="">
                <figcaption class="overlay-p">
                    <p>chicken nuggets.</p>
                    </figcaption>
                <div class="ingredients">
                    </figure>
            </article>
                </div>
                <div class="ingredients">
                    
                </div>
                <div class="ingredients">
                    <img src="../assets/ingredients.png" alt="">
                    
                </div>
                <button>Order now</button>
            </div>
            
            

            <article>
                <figure class="post-over">
                    <img src="./assets/chicken3.jpg" alt="">
                    <figcaption class="overlay-p">
                        <p>chicken wings </p>
                    </figcaption>
    
                </figure>
            </article>

            
            
        </div>
        </section>
      

            <footer class='parent-contact'>
                <div class="address">
                    <div class='contact-'>
                        <div class='contact-img'>
                        <img src="./assets/location.png" alt="" />
                        </div>
                      
                        <div class="info-address">
                            <h3>Location:</h3>
                            <p>Kigali, Rwanda</p>
                        </div>
                    </div>
                    <div class='contact-'>
                    <div class='contact-img'>
                        <img src="./assets/email.png" alt="" />
                        </div>
                      
                        <div  class="info-address">
                            <h3>Email:</h3>
                            <p>customerservice@foodies.co.rw</p>
                        </div>
                    </div>
                    <div class='contact-'>
                    <div class='contact-img'>
                        <img src="./assets/call.png" alt="" />
                        </div>
                      
                        <div  class="info-address">
                            <h3>Call:</h3>
                            <p>+250781000000</p>
                        </div>
                    </div>
                </div>

            
                <div class='contact-form' id="contact">

                    <form  action="index.php" method="POST">
                        <div class='inputs-form'>
                            <input type="text" placeholder='Full name' name="names" />
                            <input type="email" placeholder='Email' name="email"/>
                        </div>
                        <textarea placeholder='message' name="mess_age" id="" cols="30" rows="10"></textarea>
                        <button>Send Message</button>
                    </form>
                </div>
            </section>
        </footer>

</body>

</html>
    
    
 

