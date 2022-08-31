<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<?php
include 'config.php';

if(isset($_POST['displaySend'])){
$display="SELECT * FROM testform";
$exec=mysqli_query($conn,$display);
?>
<div class="container p-5">
<table class="table table-bordered">
    <thead class="thead-dark">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Age</td>
        <th>Place</th>
        <th>Operations</th>

    </tr>
    </thead>
    
    <?php
    $number=1;
    while($row=mysqli_fetch_array($exec)){
        $id=$row['id'];
        // printf($id);exit;
    ?>
    <tr>
        <td><?php echo $number ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['age'] ?></td>
        <td><?php echo $row['place'] ?></td>
        <td><button class="btn btn-primary" onclick="Getdata('<?php echo $id ;?>')">Update</button>
       <button class="btn btn-danger" onclick="Deleteuser('<?php echo $id ;?>')">Delete</button></td>

    </tr>
    <?php
    $number++;
    }
    ?>
</table>
<?php
}
?>
</div>