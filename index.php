<?php
include 'config.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Ajx</title>
  </head>
  <body>
  <div class="container">
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#completeModal">
  Add Data
</button>
<div id="displayDataTable"></div>

<!-- Insert Modal -->
<div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-custom">
        <form method="post" action="">
            <h1>Register</h1>
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter your name" id="name">
            <label>Age</label>
            <input type="text" class="form-control" placeholder="Enter your age" id="age">
            <label>Place</label>
            <input type="text" class="form-control" placeholder="Enter your place" id="place">
        </form>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="savedata()">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-custom">
        <form method="" action="">
            <h1></h1>
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter your name" id="updateName">
            <label>Age</label>
            <input type="text" class="form-control" placeholder="Enter your age" id="updateAge">
            <label>Place</label>
            <input type="text" class="form-control" placeholder="Enter your place" id="updatePlace">
            
        </form>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="Updatedetails()">Update</button>
        <input type="hidden" id="hiddendata">
      </div>
    </div>
  </div>
</div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" ></script>
<script>
 
$(document).ready(function(){
  display();
});

 //display data
  function display(){
    var displayData="true";
    $.ajax({
      type:"post",
      url:"display.php",
      data:{
        displaySend:displayData
      },
      success:function(data,status){
        $("#displayDataTable").html(data);
      }
    });
  }
  
  //insert data
  function savedata(){
    var nameAdd = $("#name").val();
    var ageAdd = $("#age").val();
    var placeAdd = $("#place").val();

    // alert(JSON.stringify(DataJSON));
    $.ajax({
      url:"savedata.php",
      type:"post",
      data:{
        nameSend:nameAdd,
        ageSend:ageAdd,
        placeSend:placeAdd
    },
    
      success:function(data,status){
        display();
      $('#completeModal').modal('hide');
      }
    });
  }
//delete user

function Deleteuser(deleteid){
$.ajax({
  url:"delete.php",
  type:"post",
  data:{
    deleteSend:deleteid
  },
  success:function(data,status){
    display();
  }
});
}

//get user details
function Getdata(updateid){
  $('#hiddendata').val(updateid);
  $.post("update.php",{updateId:updateid},function(data,status){
    var userid=$.parseJSON(data);
    // console.log(userid);
    $('#updateName').val(userid.name);
    $('#updateAge').val(userid.age);
    $('#updatePlace').val(userid.place);
  });
  $('#updateModal').modal('show');
}

//update details
function Updatedetails(){
  var updateName=$('#updateName').val();
  var updateAge=$('#updateAge').val();
  var updatePlace=$('#updatePlace').val();
  var hiddendata=$('#hiddendata').val();
  $.post(
    "update.php",
    {
      updatename:updateName,
      updateage:updateAge,
      updateplace:updatePlace,
      hiddendata:hiddendata
  },
  function(data,status){
      $('#updateModal').modal('hide');
      display();
  });
}
</script>
    
   
 
  </body>
</html>