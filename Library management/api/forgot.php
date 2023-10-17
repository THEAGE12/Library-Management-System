<?php
include("connect.php");
$name = $_POST["name"];
$phone = $_POST["phone"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$result1 = mysqli_query($connect,"SELECT * FROM userdata WHERE  name = '$name' AND phone = '$phone'");
if (empty($name) || empty($phone) || empty($password) || empty($cpassword)  )
{
    echo' <script> 
    alert("Fields are empty");
    window.location="../route/registration.html"
     </script>';
}

else{
if($password == $cpassword)
{
    if (mysqli_num_rows($result1)>0)
    {
    $result2 = mysqli_query($connect,"UPDATE userdata SET password = '$password' WHERE name = '$name'");
    

    echo' <script> 
    alert("password reset successful");  
    window.location="../"
    </script>';
    }
    else
    {
        echo' <script> 
    alert("user dont exist");
    window.location="../route/forgot.html"
     </script>';
    }
}
else{
    echo' <script> 
    alert("password and confirm password mismatched");
    window.location="../route/forgot.html"
     </script>';

}

}