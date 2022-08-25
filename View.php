<?php
$title = "View";
//Include File
require_once 'Includes/Header.php';
//Data Base Connection
require_once 'Data_Base/Connection_DataBase.php';

//Get attendees by id
if(!isset($_GET["id"])){
    include 'Includes/Error_Message.php';
}
else{
    $id = $_GET['id'];
    $result = $CRUD->Get_Addtendee_Details($id);

?>


<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h3 class="card-title">
        <?php echo $result["First_Name"]. " ". $result["Last_Name"]; ?>
    </h3>
    <h5 class="card-subtitle mb-2 text-muted">
        <?php echo $result["Expertise_Name"]; ?>
    </h5>
    <p class="card-text">
        Date of Birth: <?php echo $result["Date_of_Birth"]; ?>
    </p>
    <p class="card-text">
        Contact Number: <?php echo $result["Contact_Number"]; ?>
    </p>
    <p class="card-text">
        Email Address: <?php echo $result["Email_Address"]; ?>
    </p>
  </div>
</div>
</br>
        <a href="View_Records.php" class="btn btn-info">Back to List</a>
        <a href="Edit.php?id=<?php echo $result['Attendee_ID'] ?>" class="btn btn-warning">Edit</a>
        <a onclick="return confirm('Are You Sure You Want To Delete This Record?');" 
        href="Delete.php?id=<?php echo $result['Attendee_ID'] ?>" class="btn btn-danger">Delete</a>

    <?php } ?>

<?php
//Require File
require_once 'Includes/Footer.php';
?>