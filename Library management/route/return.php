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
            <header>Enter details</header>
            <form action="../api/Return.php" method="post" enctype="multipart/form-data">
                <div class="wrapper">
                <div class="input_field">
                    <input type="text" placeholder="bookname" name="bookname" class="input">
                </div>
                
                <div class="input_field">
                    <input type="date" placeholder="bookname" name="date" class="date">
                </div>
                
                
               
            </div>
            <div class="login_button"><button>Return</button></div>
            </form>
           

          
    </div>
    </section>
    
</body>
</html>