<?php
session_start();
include("connect.php");
$name = $_POST["name"];
$password = $_POST["password"];

$result = mysqli_query($connect,"SELECT * FROM userdata WHERE password = '$password' AND name = '$name'");
if(mysqli_num_rows($result)>0)
{
    foreach($result as $row)
    {
        if($row['status'] == 1)
        {
    $_SESSION['login'] = $row['name_id']; 
    echo' <script> 
    alert("logged in as admin");  
    window.location="../route/dashboard.php"
    </script>';
        }
        else{
            $_SESSION['login'] = $row['name_id']; 
    echo' <script> 
    alert("logged in as user");  
    window.location="../route/userdashboard.php"
    </script>';
        }
}
}
else{
    echo' <script> 
    alert("wrong credentials");
    window.location="../"
     </script>';
}