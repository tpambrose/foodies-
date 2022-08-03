<?php

include('../config/dbconnect.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="../styles/gallery.css">
   
    
</head>
<body>
    <header>
        <div class="overlay-header">
            <nav class="nav- ">
                <div class="logo-del">
                    <h3><a href="../index.html">FOODIE</a></h3>
                </div>
                <div class="openMenu"><img src="./assets/icons/humberger.png" alt=""></div>
                <ul class="mainMenu">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="./gallery.php">Gallery</a></li>
                    <li><a href="#contact">Contact us</a></li>
                    <li><a href="./admin.php">Admin</a></li>
                    <button><a href="./order.php">Order now</a></button>
                    <div class="closeMenu"><img src="./assets/icons/close.png" alt=""></div>
                </ul>
            </nav>
        </div>

        <div class="explore-food">
            <img src="../assets/chicken.jpg" alt="">
            
        </div>
        <div class="overlay-explore">
            <h1>Explore delicious meals</h1>
            
            <button>Order now</button>
        </div>

    </header>

    

    <section class="gallery-section ">
        <?php
        $sql = "SELECT * FROM foods";
        $result = mysqli_query($conn, $sql);
        ?>
        <div class="gallery-wrap"><h1>CHICKEN</h1>
        
            <div class="gallery-landingg">
            <?php
                if ($result) {
                    foreach ($result as $row) {
                ?>
                <div class="gallery-img">
               
                    <div class="price">
                        <p ><?php echo $row['price'] ?> $</p>
                    </div>
                    
                    <img src="<?php echo "img/" . $row['heroProfile'] ?>" alt="">
                    <p>chicken nugget .</p>
                    <div class="ingredients">
                        <img src="../assets/ingredients.png" alt=""> <span><?php echo $row['one'] ?> </span>
                        
                    </div>
                    <div class="ingredients">
                        <img src="../assets/ingredients.png" alt=""> <span><?php echo $row['two'] ?> </span>
                        
                    </div>
                    <div class="ingredients">
                        <img src="../assets/ingredients.png" alt=""> <span><?php echo $row['three'] ?> </span>
                        
                    </div>
                    <button>Order now</button>
                    </div>
        
                    <?php
                    }
                } else {
                    echo "no record found";
                }
                ?>
                    
                

                

                
                
               
                
                </div>
        </div>
        

        
        
    </section>

    

    <footer class='parent-contact'>
        <div class="address">
            <div class='contact-'>
                <div class='contact-img'>
                <img src="../assets/location.png" alt="" />
                </div>
              
                <div class="info-address">
                    <h3>Location:</h3>
                    <p>Kigali, Rwanda</p>
                </div>
            </div>
            <div class='contact-'>
            <div class='contact-img'>
                <img src="../assets/email.png" alt="" />
                </div>
              
                <div  class="info-address">
                    <h3>Email:</h3>
                    <p>customerservices@foodies.co.rw</p>
                </div>
            </div>
            <div class='contact-'>
            <div class='contact-img'>
                <img src="../assets/call.png" alt="" />
                </div>
              
                <div  class="info-address">
                    <h3>Call:</h3>
                    <p>+250781000000</p>
                </div>
            </div>
        </div>
    
        <div class='contact-form' id="contact">
            <form action="">
                <div class='inputs-form'>
                    <input type="text" placeholder='Full name' />
                    <input type="email" placeholder='Email'/>
                </div>
                <textarea placeholder='message' name="" id="" cols="30" rows="10"></textarea>
                <button>Send Message</button>
            </form>
        </div>
    </section>
</footer>
</body>
</html>