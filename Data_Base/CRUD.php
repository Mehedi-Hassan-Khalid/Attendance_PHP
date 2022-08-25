<?php 
    class CRUD{
        //private database object
        private $Data_Base;

        //constructor to initialize private variable to the database connection
        function __construct($Connection_DataBase){
            $this->Data_Base = $Connection_DataBase;  
        }
        // function to insert a new record into the attendee database
        public function Insert_Attendee($First_Name, $Last_Name, $Date_of_Birth, $Contact_Number, $Email_Address, $Expertise){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO attendee (First_Name, Last_Name, Date_of_Birth, Contact_Number, Email_Address, Expertise_ID) VALUES (:First_Name, :Last_Name, :Date_of_Birth, :Contact_Number, :Email_Address, :Expertise)";
                //prepare the sql statement for execution
                $sql_statement = $this->Data_Base->prepare($sql);

                 // bind all placeholders to the actual values
                 $sql_statement->bindparam(':First_Name',$First_Name);
                 $sql_statement->bindparam(':Last_Name',$Last_Name);
                 $sql_statement->bindparam(':Date_of_Birth',$Date_of_Birth);
                 $sql_statement->bindparam(':Contact_Number',$Contact_Number);
                 $sql_statement->bindparam(':Email_Address',$Email_Address);
                 $sql_statement->bindparam(':Expertise',$Expertise);

                // execute statement
                $sql_statement->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function Edit_Addtendee($id, $First_Name, $Last_Name, $Date_of_Birth, $Contact_Number, $Email_Address, $Expertise){
            try{
                $sql = "UPDATE `attendee` SET `First_Name`=:First_Name,`Last_Name`=:Last_Name,
                `Date_of_Birth`=:Date_of_Birth,`Contact_Number`=:Phone,`Email_Address`=:Email1,
                `Expertise_ID`=:Specialty WHERE :id";

                //prepare the sql statement for execution
                $sql_statement = $this->Data_Base->prepare($sql);

                // bind all placeholders to the actual values
                $sql_statement->bindparam(':id',$id);
                $sql_statement->bindparam(':First_Name',$First_Name);
                $sql_statement->bindparam(':Last_Name',$Last_Name);
                $sql_statement->bindparam(':Date_of_Birth',$Date_of_Birth);
                $sql_statement->bindparam(':Phone',$Contact_Number);
                $sql_statement->bindparam(':Email1',$Email_Address);
                $sql_statement->bindparam(':Specialty',$Expertise);

                // execute statement
                $sql_statement->execute();
                return true;

            }catch (PDOException $e) {
                echo $e->getMessage();
                return false; 
            }
            
        }

        
        public function Get_Addtendee(){
            try{
                $sql = "SELECT * FROM `attendee` inner join expertise on attendee.Expertise_ID=expertise.Expertise_ID;";
                $result = $this->Data_Base->query($sql);
                return $result;
                
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false; 
            }
        }
        
         public function Get_Addtendee_Details($id){
            $sql = "SELECT * FROM `attendee` inner join expertise on attendee.Expertise_ID=expertise.Expertise_ID where Attendee_ID=:id;";
            $sql_statement = $this->Data_Base->prepare($sql);
            $sql_statement->bindparam(':id', $id);
            $sql_statement->execute();
            $result = $sql_statement->fetch();
            return $result;
         }

         public function Delete_Attendee($id){
            $sql = "DELETE FROM attendee WHERE `Attendee_ID` = :id";
            try{
                $sql_statement = $this->Data_Base->prepare($sql);
                $sql_statement->bindparam(':id', $id);
                $sql_statement->execute();
                return true;

            }catch(PDOException $e) {
                echo $e->getMessage();
                return false;

            }
         }
         
         public function Get_Specialty(){
            $sql = "SELECT * FROM `expertise`;";
            $result = $this->Data_Base->query($sql);
            return $result;
        }

       
    }

?>