<?php
include 'config.php';
if(isset($_POST['deleteSend'])){

    $delId=$_POST['deleteSend'];

    $sql="DELETE FROM testform WHERE id='$delId'";
    $exe=mysqli_query($conn,$sql);
}
?>