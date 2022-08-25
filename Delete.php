<?php
    //Data Base Connection
    require_once 'Data_Base/Connection_DataBase.php';

    if($_GET['id']){
        include 'Includes/Error_Message.php';
        header("Location: View_Records.php");
    }
    else{
        // Get id values
        $id = $_GET['id'];

        // Call delete function
        $result = $CRUD->Delete_Attendee($id);

        //Redirect to list
        if($result){
            header("Location: View_Records.php");
        }
        else{
            
            include 'Includes/Error_Message.php';
        }
    }
?>