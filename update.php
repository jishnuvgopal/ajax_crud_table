<?php
include 'config.php';
if(isset($_POST['updateId'])){
    $user_id=$_POST['updateId'];

    $sql="SELECT * FROM testform WHERE id='$user_id'";
    $exec=mysqli_query($conn,$sql);
    $response=array();
    while($row=mysqli_fetch_assoc($exec)){
        $response=$row;
    }
    
    echo json_encode($response);
}
else{
    $response['status']=200;
    $response['message']="Invalid or data not found";
}

if(isset($_POST['hiddendata'])){
    $user_id=$_POST['hiddendata'];
    $name=$_POST['updatename'];
    $age=$_POST['updateage'];
    $place=$_POST['updateplace'];

    $query="UPDATE testform SET name='$name',age='$age',place='$place' WHERE id='$user_id'";
    $exec=mysqli_query($conn,$query);

    // echo json_encode()

}
?>