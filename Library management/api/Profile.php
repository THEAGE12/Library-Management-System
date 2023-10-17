<?php 
include("../api/connect.php");
session_start();
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $result = $_SESSION['login'];
    $result1 = mysqli_query($connect,"SELECT * FROM userdata WHERE  name = '$name'");
if (empty($name) || empty($phone)   )
{
    echo' <script> 
    alert("Fields are empty");
    window.location="../route/profile.php"
     </script>';
}
elseif(mysqli_num_rows($result1)>0)
{
    
    

    echo' <script> 
    alert("username not available");  
    window.location="../route/profile.php"
    </script>';
    

}
else{
    $result = mysqli_query($connect,"UPDATE  userdata SET name = '$name', phone ='$phone' WHERE id = '$result' ");
    echo' <script> 
    alert("User details successfully updated");
    window.location="../route/profile.php"
     </script>';
}?>