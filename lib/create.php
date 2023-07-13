<?php
   /*
    * lib/create.php 
    * Used For Entering Customer Records to join the Queue
    * Author Ruben Faraj 
    * lastname: Reben_f@hotmail.co.uk 
    * Date : 02-05-2017 
   
   */
   if($_POST){
    
       // include database connection
       include '../config/db_connector.php';
    
       try{  //// try to insert the below values into the database
        
           // insert query ////////////////////////////////////////////////////////////////////////
           $query = "INSERT INTO queue_tb SET firstname=:firstname, lastname=:lastname, type=:type, 
           title=:title, service=:service, created=:created"; ////////////////////////////////////////////////////////
           ///////////////////////////////////////////////////////////////////////////////////////
           
          
           // prepare query for execution ///////////////////////////////////////////////////////
           $stmt = $con->prepare($query); ///////////////////////////////////////////////////////
           //////////////////////////////////////////////////////////////////////////////////////
   


   
           // posted values /////////////////////////////////////////////////////////////////////////////
           $firstname=htmlspecialchars(strip_tags($_POST['firstname'])); //////////////////////////////////////////
           $lastname=htmlspecialchars(strip_tags($_POST['lastname'])); ////////////////////////////////////////
           $type=htmlspecialchars(strip_tags($_POST['type'])); ////////////////////////////
           $service=htmlspecialchars(strip_tags($_POST['service'])); ////////////////////////////
           $title=htmlspecialchars(strip_tags($_POST['title'])); ////////////////////////////
           //////////////////////////////////////////////////////////////////////////////////////////////
   
   
           // bind the parameters  ///////////////////////////////////////////////////////////////
           $stmt->bindParam(':firstname', $firstname); /////////////////////////////////////////////////////
           $stmt->bindParam(':lastname', $lastname); ///////////////////////////////////////////////////
           $stmt->bindParam(':type', $type); ///////////////////////////////////////
           $stmt->bindParam(':service', $service); ///////////////////////////////////////
           $stmt->bindParam(':title', $title); ///////////////////////////////////////
           ///////////////////////////////////////////////////////////////////////////////////////
   
   
           // specify when this record was inserted to the database//////////////////////////////
           $stmt->bindParam(':created', $created); //////////////////////////////////////////////
           ///////////////////////////////////////////////////////////////////////////////////////
            
          
           // Execute the query/////////////////////////////////////////////////////////////////////////
           if($stmt->execute()){ ///////////////////////////////////////////////////////////////////////
               header('refresh:2;url= ..\index.php');////////////////////////////////////////////////////
               echo"<center><h2>Saving Your Record Please Wait..... </h2></center><br/>".  
               "<center><img src='../img/saving.gif'></center>";////////////////////////////////////////
                echo "<div class='alert alert-success'><a href='..\index.php'>Home</a></div>"; //////////
           }else{                                        ///////////////////////////////////////////////
                                                         ///////////////////////////////////////////////
               echo"<a href='../index.php'>Home</a></div>";//////////////////////////////////////////////
               echo "<div class='alert alert-danger'>Unable to save record.</div>";/////////////////////
           }//end else
            
       }//end try   //////////////////////////////////////////////////////////////////////////////////
       ///////////////////////////////////////////////////////////////////////////////////////////////
      
   
       // show error ////////////////////////////////////////////////////////////////////////////////
       catch(PDOException $exception){
           die('ERROR: ' . $exception->getMessage());
       }
   }
   
   ?>