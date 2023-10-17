<?php
include("../api/connect.php");
session_start();
if(!isset($_SESSION['login']))
{
    echo' <script> 
    alert("unauthorised acess");
    window.location="../"
     </script>';
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    
<section class="container">
<header class="nav_bar">
<form action=""method="post">
    <div class="search">
        
    <input type="text" class="search1" name="search"></form>
    <button class="search">Search</button></div></form>
    <ul class="nav_link">
        <li class="link">
            <a href="profile.php" class="profile">profile</a>
        </li>
        <li class="link">
            <a href="modify.html" class="menu">Modify details</a>
        </li>
        <li class="link">
            <a href="registerbook.html" class="Register a book">Register a book</a>
        </li>
        <li class="link">
            <a href="return.php" class="Return a book">Return a book</a>
        </li>
       
    </ul>
    <div class="logout">
    <button type='button' onclick='window.location.href="../"'> Logout</button>
</div>
</header>
<div class="content">
    <?php 
    if(!empty($_POST['search']))
    {
        $bookname = $_POST["search"];
        $result = mysqli_query($connect,"SELECT * FROM bookinfo WHERE  bookname = '$bookname'");
        if(mysqli_num_rows($result) == 0 )
        {

        
        $result = mysqli_query($connect,"SELECT * FROM bookinfo WHERE  author = '$bookname'");}
        
    
    
        if(mysqli_num_rows($result) == 0)
        {
            {
                echo' <script> 
                alert("no data found");
                window.location="../route/dashboard.php"
                 </script>';
            }
        }
    
        
        if(mysqli_num_rows($result)>0)
        {
        foreach ($result as $row)
        {?>
    
    <div class="card" >
    <div class="image_div">
        <img src="../uploads/<?php echo $row['photo'] ?>" class="image" alt="image">
    </div>
    <div class="details">
    <h1><?php echo $row['bookname'] ?></h1>
    <h3><?php echo $row['author'] ?></h3>
    <h4>Description</h4>
    <h5><?php echo $row['description'] ?></h5>
    
    <h4>Status: <?php if($row['status'] == 0) {echo 'available'; } ?></h4>
    <button class="modify">Modify</button>
</div>
</div>
<?php }}} 

    ?>
<div class="footer">
    <ul class="nav_link">
        <li class="link"><a href="">about us</a></li>
    </ul>
    
            
</div>
</div>
</section>
<?php
        if(isset($_POST['logout'])) {
            session_abort();
            echo' <script> 
            alert("successfully logged out");
            window.location="../"
             </script>'; 
        } ?>
</body>
</html>