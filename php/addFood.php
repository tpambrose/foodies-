<?php


include('../config/dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // if (isset($_POST['submit'])) {
    // if (empty($_POST['name'])) {
    //     $name_error = "required";
    // }
    if (empty($_POST['price'])) {
        echo 'required';
    }
    if (empty($_POST['one'])) {
        echo 'required';
    }
    if (empty($_POST['two'])) {
        echo 'required';
    }
    if (empty($_POST['three'])) {
        echo 'required';
    }
    if (empty($_POST['descr'])) {
        echo 'required';
    }
    // if (empty($_POST['ingredientOne'])) {
    //     echo 'required';
    // }
    // if (empty($_POST['ingredientTwo'])) {
    //     echo 'required';
    // }
    // if (empty($_POST['ingredientThree'])) {
    //     echo 'required';
    // }
    // if (empty($_POST['longBio'])) {
    //     echo 'required';
    // }


    if ($_FILES["image"]["error"] == 4) {
        echo " image does not exist";
    } else {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)) {
            echo " image invalid";
        } else if ($fileSize > 1000000) {
            echo "too large";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            move_uploaded_file($tmpName, 'img/' . $newImageName);
        }
    }


    $file = $_FILES['image']['name'];
    print_r($file);
    $price = $_POST['price'];
    $one = $_POST['one'];
    $two = $_POST['two'];
    $three = $_POST['three'];
    $descr = $_POST['descr'];
    // $ingredientOne = $_POST['ingredientOne'];
    // $ingredientTwo = $_POST['ingredientTwo'];
    // $ingredientThree = $_POST['ingredientThree'];
    // $longBio = $_POST['longBio'];

    $sql = "INSERT INTO foods(heroProfile, price, one, two, three, descr)
     VALUES ('$newImageName', '$price', '$one', '$two', '$three', '$descr')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "success";
    
    } else {
        die(mysqli_error($conn));
    }
}
// }


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
        <form class="order-form"  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        
            <div class="md:w-2/3">
                                <input class=" image" id="inline-full-name" type="file" placeholder="Hero's name" name="image"></span>
                            </div>
            <div class="form-grp">
    <label for="name">price</label>
    <input type="text" name="price">
  </div>
  <div class="form-grp">
    <label for="name">ingredients </label>
    <input type="text" name="one">
  </div>
  <div class="form-grp">
    <label for="name">ingredient two</label>
    <input type="text" name="two">
  </div>
  <div class="form-grp">
    <label for="name">ingredients</label>
    <input type="text" name="three">
  </div>
  <div class="form-grp">
    <label for="name">description</label>
    <textarea name="descr" id="" cols="30" rows="10"></textarea>
    
  </div>

 

  
  <button class="pay" type="submit" name="submit">Proceed to payment</button>
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