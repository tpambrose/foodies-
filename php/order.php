
<?php
$success = 0;
$user = 0;

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include('../config/dbconnect.php');
  
    $names=$_POST['names'];
    $email=$_POST['email'];
    $quantity=$_POST['quantity'];
    $food_type =$_POST['food_type'];
    


    $sql = "INSERT INTO orders(names, email, quantity, food_type) VALUES ('$names', '$email', '$quantity', '$food_type')";
    $result = mysqli_query($conn, $sql);
    if($result){
        $success=1;
        // header('location:index.php');
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
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="../styles/order.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="overlay-header">
            <nav class="nav- ">
                <div class="logo-del">
                 <h3> <a href="/">FOODIE</a></h3>
                
                </div>
                <div class="openMenu"><img src="./assets/icons/humberger.png" alt=""></div>
                <ul class="mainMenu">
                    <li><a href="../index.html">Home</a></li>
                    <li><a href="../index.html">About us</a></li>
                    <li><a href="../pages/gallery.html">Gallery</a></li>
                    <li><a href="#contact">Contact us</a></li>
                    <button><a href="../pages/order.html">Order now</a></button>
                    <div class="closeMenu"><img src="./assets/icons/close.png" alt=""></div>
                </ul>
            </nav>
        </div>

    </header>

    <section class="ordering">
        <div class="img-ordering"> <img src="../assets/order.jpg" alt="">

        </div>
        <form class="order-form" action="order.php" method="POST">
       
            <div class="form-grp">
    <label for="name">Quantity</label>
    <input type="text" name="food_type">
  </div>
  <div class="form-grp">
    <label for="name">Quantity</label>
    <input type="text" name="quantity">
  </div>
  <div class="form-grp">
    <label for="name">Name</label>
    <input type="text" name="names">
  </div>
  
  
  
  <div class="form-grp">
    <label for="name">Email</label>
    <input type="text" name="email">

  </div>
 

  
  <button class="pay">Proceed to payment</button>
        </form>
       
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
                  <p>d.twizeyima@alustudent.com</p>
              </div>
          </div>
          <div class='contact-'>
          <div class='contact-img'>
              <img src="../assets/call.png" alt="" />
              </div>
            
              <div  class="info-address">
                  <h3>Call:</h3>
                  <p>+250781093895</p>
              </div>
          </div>
      </div>
  
      <div id="contact" class='contact-form'>
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