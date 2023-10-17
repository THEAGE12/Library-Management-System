<?php
session_start();
include("../api/connect.php");
 $result = $_SESSION["value"];
 

if(isset($_POST['bookname']) || isset($_POST['author']) || isset($_POST['description']) || isset($_FILE['photo']))
{
    $bookname = $_POST["bookname"];
    $author = $_POST["author"];
    $description = $_POST["description"];
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    





if(!empty($bookname) )
{
$result1 = mysqli_query($connect,"UPDATE bookinfo SET bookname = '$bookname' WHERE id = '$result' ");
}
if(!empty($author))
{
$result1 = mysqli_query($connect,"UPDATE bookinfo SET author = '$author' WHERE id = $result ");
}
if(!empty($description))
{
$result1 = mysqli_query($connect,"UPDATE bookinfo SET description = '$description' WHERE id = $result ");
}
if(!empty($photo))
{
$result1 = mysqli_query($connect,"UPDATE bookinfo SET photo = '$photo' WHERE id = $result ");
move_uploaded_file($tmp_name,"../uploads/$photo");
}
if($result1)
{
    echo' <script> 
    alert("Book  successfully modified");
    window.location="../route/dashboard.php"
     </script>';
}
else
{
    {
        echo' <script> 
        alert("failed to modify");
        window.location="../route/registerbook.html"
         </script>';
    }
}
}?>