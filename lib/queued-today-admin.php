<?php

include ('db_connector.php');
/*
 * lib/queued-today.php 
 * used for display Customer in the Queue , Called From index.php 
 * Author Ruben Faraj 
 * Email: Reben_f@hotmail.co.uk 
 * Date : 14-05-2017  
 */

/*%%%%%%%%%%%%%%%% Remove Customer in the Qeueu or Record Deleting %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
$action = isset($_GET['action']) ? $_GET['action'] : "";
$window = isset($_SESSION['window']) ? $_SESSION['window'] : die('ERROR: Record Window not found.'); 
if ($action == 'deleted') {

?>

  <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
  <!-- Show Confirmation Message and count until 3 seconds after a customer removed in the queue -->
  <div class="col-md-10">
    <!-- Count down until 3 seconds  -->
    <div id='message' class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Customer Removed In The Queue !! </strong>
      <!-- Count up Until 3 seconds -->
      <center>
        <h3 id="timer"> </h3>
      </center>
    </div><!-- /.alert-success  -->
  </div><!-- /.col-md-10 -->
  <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->


<?php

} //end if 



/*%%%%%%%%%%%% Select all customer details are in the queue %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
$query = "SELECT * FROM queue_tb WHERE status = 2 AND window = :window ORDER BY id ASC";
$stmt  = $con->prepare($query);
$stmt->bindParam("window", $window, PDO::PARAM_STR);
$stmt->execute();
// this is how to get number of rows returned
$num = $stmt->rowCount();
/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

//check if more than 0 record found !
if ($num > 0) {

  //creating a table to show customer in the queue 
  echo "<table id='example' class='table table-striped ' cellspacing='0' width='100%''>";
  echo "<thead>";
  echo "<tr style='background: #42ff41;'>";
  echo "<th>Id</th>";
  echo "<th>ФИО</th>";
  echo "<th>Образовательная программа</th>";
  echo "<th>Отменить</th>";
  echo "<th>Принято</th>";
  echo "</tr>";
  echo "</thead>"; //End Table Header 


  // fetch() is faster than fetchAll() for retrieving data's
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    // extract row
    extract($row);

    // format current timestamp to hours and mintues only i.e 12:00 PM 
    $date = new DateTime($created);

    // creating new table body , row per a record
    echo "<tbody>";
    echo "<tr>";
    echo "<td><b>{$id}</b></td>"; // display customer Id
    echo "<td><b>{$firstname} {$lastname}</b></td>"; //display customer,firstname,lastname
    echo "<td><b>{$service}</b></td>"; //display type of service 
    echo "<td><a href='#' onclick='cancel_user({$id});' class='btn btn-danger'>X</a></td>"; // Delete Record Link
    echo "<td><a href='#' onclick='done_user({$id});' class='btn btn-success'>✓</a></td>"; // Take to current admin
    echo "</tr>";
    echo "</tbody>";
  } // End while()

  echo "</table>"; // end table


} // end if()
/*%%%%%%%%%%%%%%%%%%%End Displaying Customer Details in the Queue%%%%%%%%%%%%%%%%%%%%%*/


/* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& */
// else if no records found or no customers in the queue display this message
else {

?>

  <!-- display message No Customer Waiting In The Queue   -->
  <div class="col-md-10">
    <div class="alert alert-warning alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4> No Customer Waiting In The Queue!!!</h4>
      <ul>
        <li>Please Use The Form Provided To Add Customer To The Queue!</li>
        <li>Need Help ? Contact Techincal Team at Reben_f@hotmail.co.uk </li>
      </ul>
    </div><!--  alert-warning -->
  </div><!--/.col-md-8   -->

<?php

} // end else


?>
<!--  &&&&&&&&&&&&&&&&&&&End Display Message &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->





<!--%%%%%%%%%%%d elete_user function used for deleting customer in the queue %%%%%%%%%%%%%%%%%%%%%%% -->
<script type='text/javascript'>
  function cancel_user(id) {
      window.location = "lib/cancelUser.php?id=" + id;
  }
  function done_user(id) {
    var answer = confirm('Вы подтверждаете?');
    if (answer) {
      // if user clicked ok, 
      // pass the id to delete.php and execute the delete query & remove the customer in the queue
      window.location = "lib/doneUser.php?id=" + id;
    }
  }
</script>
<!-- %%%%%%%%%%%%%%%%%%%%%%% End delete_user%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->


<!-- %%%%%%%%%%%%%%%%%%%%%%% Show message for 3 seconds%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
  //When the page has loaded.
  $(document).ready(function() {
    $('#message').fadeIn('fast', function() {
      $('#message').delay(3000).fadeOut();
    });
  });
</script>

<!-- %%%%%%%%%%%%%%%%%%%%%%% timer Count UP Until 3 seconds %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
<script type="text/javascript">
  var timerVar = setInterval(countTimer, 1000);
  var totalSeconds = 0;

  function countTimer() {
    ++totalSeconds;
    var hour = Math.floor(totalSeconds / 3600);
    var minute = Math.floor((totalSeconds - hour * 3600) / 60);
    var seconds = totalSeconds - (hour * 3600 + minute * 60);
    document.getElementById("timer").innerHTML = seconds;
  }
</script>
<!-- %%%%%%%%%%%%%%%%%%%%%%% End timer Count UP Until 3 seconds %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->