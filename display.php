<?php
require_once 'db.php';

if(isset($_POST['displaysend'])){

    $table='<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile</th>
        <th scope="col" colspan="2">Operations</th>
      </tr>
    </thead>  <tbody>';
    $sql = "SELECT * FROM userdata";
    $result=mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $table.='
                <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['FirstName'].'</td>
                    <td>'.$row['LastName'].'</td>
                    <td>'.$row['Email'].'</td>
                    <td>'.$row['Mobile'].'</td>
                    <td><button type="button" onclick="getDetails('.$row['id'].')" class="btn btn-primary">Update</button></td>
                    <td><button type="button" onclick="deleteUser('.$row['id'].')" class="btn btn-danger">Delete</button></td>
                </tr>';
    }
    $table.='</tbody></table>';
    echo $table;

}

?>