<?php
    $title = "Success";
    //Include File
    require_once 'Includes/Header.php';
    require_once 'Data_Base/Connection_DataBase.php';

    if(isset($_GET['submit'])){
        //extract values from the $_POST array
        $First_Name = $_GET['First_Name'];
        $Last_Name = $_GET['Last_Name'];
        $Date_of_Birth = $_GET['Date_of_Birth'];
        $Contact_Number = $_GET['Phone'];
        $Email_Address = $_GET['Email1'];
        $Expertise = $_GET['Specialty'];

        //Call function to insert and track if success or not
        $Isset_Success = $CRUD->Insert_Attendee($First_Name, $Last_Name, $Date_of_Birth, $Contact_Number, $Email_Address, $Expertise);

        if($Isset_Success){

            include 'Includes/Success_Messsge.php';
        }
        else{
            
            include 'Includes/Error_Message.php';
        }
    }

?>


<!-- This prints out values that were passed to the action pge using method="Get" !-->
<!-- Get action !-->
<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
  <h3 class="card-title">
        <?php echo $_GET["First_Name"]. " ". $_GET["Last_Name"]; ?>
    </h3>
    <h5 class="card-subtitle mb-2 text-muted">
        <?php echo $_GET["Specialty"]; ?>
    </h5>
    <p class="card-text">
        Date of Birth: <?php echo $_GET["Date_of_Birth"]; ?>
    </p>
    <p class="card-text">
        Contact Number: <?php echo $_GET["Phone"]; ?>
    </p>
    <p class="card-text">
        Email Address: <?php echo $_GET["Email1"]; ?>
    </p>
  </div>
</div>  
  



<?php
//Require File
require_once 'Includes/Footer.php';
?>