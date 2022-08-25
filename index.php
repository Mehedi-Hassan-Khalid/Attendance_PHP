<?php
$title = "Index";
//Include File
require_once 'Includes/Header.php';
//Data Base Connection
require_once 'Data_Base/Connection_DataBase.php';

$result = $CRUD->Get_Specialty();

?>
<h1 class="text-center">Registration For IT Conference</h1>



<form method="get" action="Success.php">

  <!-- First Name -->  
  <div class="mb-3">
    <label for="First_Name" class="form-label">First Name</label>
    <input required type="text" class="form-control" id="First_Name" placeholder="Enter Your First Name" name="First_Name">
  </div>

  <!-- Last Name -->  
  <div class="mb-3">
    <label for="Last_Name" class="form-label">Last Name</label>
    <input required type="text" class="form-control" id="Last_Name" placeholder="Enter Your Last Name" name="Last_Name">
  </div>

  <!-- Date of Birth -->  
  <div class="mb-3">
    <label for="Date_of_Birth" class="form-label">Date of Birth</label>
    <input required type="date" class="form-control" id="Date_of_Birth" name="Date_of_Birth">
  </div>

  <!-- Specialty -->  
  <div class="mb-3">
    <label for="Specialty" class="form-label">Expertise</label>
        <select class="form-select" id="Specialty" aria-label="Default select example" name="Specialty">
        <?php while($r = $result->fetch(PDO::FETCH_ASSOC)) {?>
          <option value="<?php echo $r['Expertise_ID'] ?>"><?php echo $r['Expertise_Name']; ?></option>
        <?php }?>
        </select>
  </div> 
  
  <!-- Contact -->  
  <div class="mb-3">
    <label for="Phone" class="form-label">Contact Number</label>
    <input required type="text" class="form-control" id="Phone" placeholder="Your Contact Number" name="Phone">
    <div id="PhoneHelp" class="form-text">We'll never share your Phone with anyone else.</div>
  </div>

  <!-- Email Address -->  
  <div class="mb-3">
    <label for="Email1" class="form-label">Email Address</label>
    <input type="email" class="form-control" id="Email1" placeholder="Your Email Address" aria-describedby="emailHelp" name="Email1">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <!-- Submit -->
  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>

</form>



<?php
//Require File
require_once 'Includes/Footer.php';
?>