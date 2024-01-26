<?php
require_once 'db.php';

if(isset($_POST['deleteSend'])){
    $id=$_POST['deleteSend'];

    $sql="DELETE FROM userdata WHERE id='$id'";
    $result=mysqli_query($conn, $sql);
}


?>