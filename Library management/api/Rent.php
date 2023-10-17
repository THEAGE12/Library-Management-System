<?php
session_start();
include("connect.php");
$bookname = $_POST["bookname"];
$date = $_POST["date"];
$result = $_SESSION['login'];

$result3 = mysqli_query($connect,"SELECT * FROM bookinfo WHERE status = 0 AND bookname = '$bookname'");
if(mysqli_num_rows($result3) > 0)
{{
    


    foreach($result3 as $row)
    {
        $result2 =$row['id'];
$result1 = mysqli_query($connect,"INSERT INTO rent(nameid,bookid,date) VALUES ($result,$result2,'$date') ");
$result4 = mysqli_query($connect,"UPDATE bookinfo SET status = 1 WHERE id = $result2 ");}
if ($result1)  
{
    echo' <script> 
    alert("successful");
    window.location="../route/userdashboard.php"
     </script>';
}
else{
    echo' <script> 
    alert("book not available");
    window.location="../route/rent.html"
     </script>';
}
}
}
else{
    echo' <script> 
    alert("book is not available");
    window.location="../route/rent.html"
     </script>';

}?>