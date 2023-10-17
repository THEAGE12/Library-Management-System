<?php
session_start();
include("../api/connect.php");


if(!isset($_POST['searchbookname']))
{

echo' <script> 
alert("field empty");
window.location="../route/modify.html"
 </script>';
}
else{
    $bookname = $_POST["searchbookname"];
    $result = mysqli_query($connect,"SELECT * FROM bookinfo WHERE  bookname = '$bookname'");



if(mysqli_num_rows($result)==0)
{
    
        echo' <script> 
        alert("no data found");
        window.location="../route/modify.html"
         </script>';
    

}
else{
    foreach ($result as $row)
    {
    $_SESSION["value"] = $row['id'];}
    echo' <script> 
    alert("book found");
    window.location="../route/modify.html"
     </script>';

}
}

?>