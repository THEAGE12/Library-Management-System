<?php
session_start();
include("connect.php");
$bookname = $_POST["bookname"];
$date2 = $_POST["date"];
$result = $_SESSION['login'];

$result3 = mysqli_query($connect,"SELECT * FROM bookinfo WHERE status = 1 AND bookname = '$bookname'");
if(mysqli_num_rows($result3) > 0)
{
    


    foreach($result3 as $row)
    {
        $result2 =$row['id'];
$result1 = mysqli_query($connect,"SELECT * FROM rent WHERE bookid =  $result2");
$result4 = mysqli_query($connect,"UPDATE bookinfo SET status = 0 WHERE id = $result2 ");
$result6 = mysqli_query($connect,"DELETE FROM rent WHERE bookid=$result2; ");
foreach($result1 as $row1){

$date1 =$row1['date'];
$date1_ts = strtotime($date1);
    $date2_ts = strtotime($date2);
    $diff = $date2_ts - $date1_ts;
    $ans =round($diff / 86400);
if ($ans <= 60){
$report = " no fine";
$_SESSION['fine'] = $report;
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '");
    window.location="../route/return.php"</script>';
}
phpAlert( $report  );
}
else{
    $report1 = ($ans - 60) * 100;
    $report = " fine".strval($report1);
    $_SESSION['fine'] = $report;
    function phpAlert($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '");
        window.location="../route/return.php"</script>';
    }
    phpAlert( $report  );
}
}}






}
else{
    echo' <script> 
    alert("book is not available");
    window.location="../route/return.php"
     </script>';

}




?>