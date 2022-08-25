<?php
    //Data Base Connection
    require_once 'Data_Base/Connection_DataBase.php';
    //Get values from get operator
    if(isset($_GET['submit'])){
        //extract values from the $_POST array
        $id = $_GET['id'];
        $First_Name = $_GET['First_Name'];
        $Last_Name = $_GET['Last_Name'];
        $Date_of_Birth = $_GET['Date_of_Birth'];
        $Contact_Number = $_GET['Phone'];
        $Email_Address = $_GET['Email1'];
        $Expertise = $_GET['Specialty'];
        
        
        //call CRUD Function
        $result = $CRUD->Edit_Addtendee($id, $First_Name, $Last_Name, $Date_of_Birth, $Contact_Number, $Email_Address, $Expertise);

        //Redirect to index.php
        if($result){
            header("Location: View_Records.php");
        }
        else{
            include 'Includes/Error_Message.php';
        }
    }
    else{
        include 'Includes/Error_Message.php';
    }


?>