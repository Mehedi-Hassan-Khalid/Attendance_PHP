<?php
    $title = "Edit Record";
    //Include File
    require_once 'Includes/Header.php';
    //Data Base Connection
    require_once 'Data_Base/Connection_DataBase.php';

    $result = $CRUD->Get_Specialty();

    if(!isset($_GET['id'])){
        // Error Message
        include "Includes/Error_Message.php";
        header("Location: View_Records.php");
    }
    else{
        $id = $_GET['id'];
        $attendee = $CRUD->Get_Addtendee_Details($id);

?>


<h1 class="text-center">Edit Record</h1>


<form method="get" action="Edit_Records.php">
    <input type="hidden" name="id" value= "<?php echo $attendee['Attendee_ID'] ?>" />

  <!-- First Name -->  
  <div class="mb-3">
    <label for="First_Name" class="form-label">First Name</label>
    <input type="text" class="form-control" value= "<?php echo $attendee['First_Name'] ?>"  id="First_Name" placeholder="Enter Your First Name" name="First_Name">
  </div>

  <!-- Last Name -->  
  <div class="mb-3">
    <label for="Last_Name" class="form-label">Last Name</label>
    <input type="text" class="form-control" value= "<?php echo $attendee['Last_Name'] ?>" id="Last_Name" placeholder="Enter Your Last Name" name="Last_Name">
  </div>

  <!-- Date of Birth -->  
  <div class="mb-3">
    <label for="Date_of_Birth" class="form-label">Date of Birth</label>
    <input type="date" class="form-control" value= "<?php echo $attendee['Date_of_Birth'] ?>" id="Date_of_Birth" name="Date_of_Birth">
  </div>

  <!-- Specialty -->  
  <div class="mb-3">
    <label for="Specialty" class="form-label">Expertise</label>
        <select class="form-select" id="Specialty" aria-label="Default select example" name="Specialty">
        <?php while($r = $result->fetch(PDO::FETCH_ASSOC)) {?>
          <option value="<?php echo $r['Expertise_ID'] ?>" <?php if($r['Expertise_ID'] == $attendee['Expertise_ID']) echo 'selected' ?>>
            <?php echo $r['Expertise_Name']; ?>
          </option>
        <?php }?>
        </select>
  </div> 
  
  <!-- Contact -->  
  <div class="mb-3">
    <label for="Phone" class="form-label">Contact Number</label>
    <input type="text" class="form-control" value= "<?php echo $attendee['Contact_Number'] ?>" id="Phone" placeholder="Your Contact Number" name="Phone">
    <div id="PhoneHelp" class="form-text">We'll never share your Phone with anyone else.</div>
  </div>

  <!-- Email Address -->  
  <div class="mb-3">
    <label for="Email1" class="form-label">Email Address</label>
    <input type="email" class="form-control" value= "<?php echo $attendee['Email_Address'] ?>" id="Email1" placeholder="Your Email Address" aria-describedby="emailHelp" name="Email1">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <!-- Submit -->
  <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
</form>

<?php } ?>

<?php
//Require File
require_once 'Includes/Footer.php';
?>