
<?php
$success = 0;
$user = 0;
include('../config/dbconnect.php');

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include('../config/dbconnect.php');
  
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
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/gallery.css">
    <link rel="stylesheet" href="../styles/order.css">
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
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="./gallery.php">Gallery</a></li>
                    <li><a href="#contact">Contact us</a></li>
                    <li><a href="./admin.php">Admin</a></li>
                    <button><a href="./order.php">Order now</a></button>
                    <div class="closeMenu"><img src="./assets/icons/close.png" alt=""></div>
                </ul>
            </nav>
        </div>

    </header>


 

     <!-- ================================================delete Modal =============================================================-->
     <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>delete</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <!-- =========================modal body(form)================================ -->

                    <form class="w-full max-w-sm" action="delete.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="deleteid" id="deleteid">
                        <p style="color: black;">are you sure you want to delete </p>
                        <button type="submit" style="color: red; font-weight: bolder;" class="delete" name="deletedata">
                            delete
                        </button>
                        <button type="button" style="color: green; font-weight: bolder;" class="canceldelete " data-dismiss="modal">cancel</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!--===================== end of delete modal ========================= -->

 
    <!-- <?php
    
   
   
    ?> -->
   
    <section class="landing">
        <button> <a href="./addFood.php">Add food</a></button>
    
        </section>

        <section class="gallery-section ">
        <?php
        $sql = "SELECT * FROM foods";
        $result = mysqli_query($conn, $sql);
        ?>
        <div class="gallery-wrap"><h1>CHICKEN</h1>
        
            <div class="gallery-landing">
            
                <div class="gallery-img">
                <?php
                if ($result) {
                    foreach ($result as $row) {
                ?>

               
                    <div class="price">
                        <p ><?php echo $row['price'] ?> $</p>
                    </div>
                    
                    <img src="<?php echo "img/" . $row['heroProfile'] ?>" alt="">
                    <p>chicken.</p>
                    <div class="ingredients">
                        <img src="../assets/ingredients.png" alt=""> <span><?php echo $row['one'] ?> </span>
                        
                    </div>
                    <div class="ingredients">
                        <img src="../assets/ingredients.png" alt=""> <span><?php echo $row['two'] ?> </span>
                        
                    </div>
                    <div class="ingredients">
                        <img src="../assets/ingredients.png" alt=""> <span><?php echo $row['three'] ?> </span>
                        
                    </div>

                    <div>
                        <button class="deletebtn" type="submit"> delete</button>
                    </div>
                    <?php
                    }
                } else {
                    echo "no record found";
                }
                ?>
                    <button>Order now</button>
                </div>

                

                
                
               
                
                </div>
        </div>
        

        
        
    </section>
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js" integrity="sha512-6ORWJX/LrnSjBzwefdNUyLCMTIsGoNP6NftMy2UAm1JBm6PRZCO1d7OHBStWpVFZLO+RerTvqX/Z9mBFfCJZ4A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
        <script src="../script/sweetalert.min.js"></script>
        <script src="../script/dataTables.js"></script>

        <script src="../script/updateModal.js"></script>
        <script src="../script/deleteModal.js"></script>
        
             <?php
            if (isset($_SESSION['status'])) {

            ?>
            <script>
               swal({
                title: "Success!",
                icon: "success",
                button: "close!",
            });
               
        </script>
               
            <?php
                unset($_SESSION['status']);
            }
            ?>
      


</body>

</html>
    
    
 

