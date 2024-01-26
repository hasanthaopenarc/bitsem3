<?php
require_once 'db.php';

extract($_POST);

//echo $fnameSend;

if(isset($_POST['fnameSend']) && isset($_POST['lnameSend']) && isset($_POST['emailSend'])){

    $sql ="INSERT INTO userdata(FirstName,LastName,Email,Mobile) 
            VALUES('$fnameSend','$lnameSend','$emailSend','$mobileSend')";

    $result=mysqli_query($conn, $sql);
}

?>