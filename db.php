<?php 
$connect =mysqli_connect("localhost","ahmed","","login");
if (!$connect){
    echo "Connection field".mysqli_connect_error();
}
?>