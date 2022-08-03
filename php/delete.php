<?php

session_start();

include('../config/dbconnect.php');
if(isset($_POST['deletedata'])){
   


    $id=$_POST['deleteid'];
    

    $sql = "DELETE FROM foods WHERE id='$id'";

     $result = mysqli_query($conn, $sql);
     if($result){
        $_SESSION['status'] = "Hero updated successfully";
        $_SESSION['status_code'] = "success";
        // header('location:admin.php');
     }
     else{
         die(mysqli_error($conn));
     }

}


?>





