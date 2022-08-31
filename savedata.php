<?php
include 'config.php';

extract($_POST);

if(isset($_POST['nameSend']) && isset($_POST['ageSend']) && isset($_POST['placeSend'])){

    $sql = "INSERT INTO testform (name,age,place)VALUES('$nameSend','$ageSend','$placeSend')";
    $exe = mysqli_query($conn,$sql);
}
// $name=$_POST['name'];
// $age=$_POST['age'];
// $place=$_POST['place'];

// $sql = "INSERT INTO testform (name,age,place)VALUES('$name','$age','$place')";
// $exe = mysqli_query($conn,$sql);
// if($exe){
//     echo "Data Saved Successfully";
// }else{
//     echo "Data Not Saved Successfully";
// }
?>
