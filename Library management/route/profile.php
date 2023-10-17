
<?php
session_start();
include("../api/connect.php");
$result = $_SESSION['login'];
$result1 = mysqli_query($connect,"SELECT * FROM userdata WHERE id = '$result' ");
foreach($result1 as $row)
{
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <section class="container_forms">
        <div class="form_login">
            <header>Profile</header>
            <form action="../api/Profile.php" method="post">
                <div class="input_field">
                    <input type="text" placeholder="Username" name="name" class="input" value="<?php echo $row['name'] ?>" >
                </div>
                
                    <div class="input_field">
                        <input type="number" placeholder="Phone no." name="phone" class="input" value="<?php echo $row['phone'] ?>" >
                    </div>
                   <?php } ?>
                   <div class="login_button"><button>Update</button></div>
                
                
               

            </form>

          
    </div>
    </section>

</body>
</html>