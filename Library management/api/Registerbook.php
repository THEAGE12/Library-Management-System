<?php
include("connect.php");
$bookname = $_POST["bookname"];
$author = $_POST["author"];
$description = $_POST["description"];
$photo = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$result = mysqli_query($connect,"SELECT * FROM bookinfo WHERE  name = '$name'");
if (empty($bookname) || empty($author)  || empty($description) || empty($photo) )
{
    echo' <script> 
    alert("Fields are empty");
    window.location="../route/registerbook.html"
     </script>';
}
elseif(mysqli_num_rows($result)>0)
{
    
    

    echo' <script> 
    alert("book already exists ");  
    window.location="../"
    </script>';
    

}

else{

move_uploaded_file($tmp_name,"../uploads/$photo");
$result1 = mysqli_query($connect,"INSERT INTO bookinfo(bookname,author,description,status,photo) VALUES ('$bookname','$author','$description',0, '$photo') ");
if($result1)
{
    echo' <script> 
    alert("Book registration successful");
    window.location="../route/dashboard.php"
     </script>';
}
else
{
    {
        echo' <script> 
        alert("Book registration failed");
        window.location="../route/registerbook.html"
         </script>';
    }
}

}