<?php
  /*
    * lib/delete.php 
    * used for Removing customer in The Queue 
    * Author Ruben Faraj 
    * Email: Reben_f@hotmail.co.uk 
    * Date : 14-05-2017 
   */


   session_start();
   try {
        
   // include database connection ////////////////////////////////////////////////////////////////
   include '../config/db_connector.php';//////////////////////////////////////////////////////////
   ///////////////////////////////////////////////////////////////////////////////////////////////


       // get record ID ***************************************************************************
       // isset() is a PHP function used to verify if a value is there or not *********************
       $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.'); //***************
   //**********************************************************************************************

    
       // delete query @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
       $query = "DELETE FROM queue_tb WHERE id = ?";//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
       $stmt = $con->prepare($query);//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
       $stmt->bindParam(1, $id);//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
       if($stmt->execute()){    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
           // redirect to index.php records page and @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
           // tell the user record was deleted  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
           header('Location: ../updateClients.php?action=deleted');//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
       }else{                               //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
           die('Unable to delete record.');//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
       }//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
   }//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
   // show error &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
   catch(PDOException $exception){ //&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
       die('ERROR: ' . $exception->getMessage());//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
   }//End catch &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

?>