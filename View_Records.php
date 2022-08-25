<?php
$title = "View Records";
//Include File
require_once 'Includes/Header.php';
//Data Base Connection
require_once 'Data_Base/Connection_DataBase.php';

//Get all attendees
$result = $CRUD->Get_Addtendee();
?>


<table class = "table">
    <tr>
        <th>Attendee ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Specialty</th>
        <th>Actions</th>
    </tr>


    <?php while($r = $result->fetch(PDO::FETCH_ASSOC)) {?>
        <tr>
            <td><?php echo $r["Attendee_ID"]?></td>
            <td><?php echo $r["First_Name"]?></td>
            <td><?php echo $r["Last_Name"]?></td>
            <td><?php echo $r['Expertise_Name']?></td>
            <td>
                <a href="View.php?id=<?php echo $r['Attendee_ID'] ?>" class="btn btn-primary">View</a>
                <a href="Edit.php?id=<?php echo $r['Attendee_ID'] ?>" class="btn btn-warning">Edit</a>
                <a onclick="return confirm('Are You Sure You Want To Delete This Record?');" 
                href="Delete.php?id=<?php echo $r['Attendee_ID'] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php }?>
</table>

<?php
//Require File
require_once 'Includes/Footer.php';
?>