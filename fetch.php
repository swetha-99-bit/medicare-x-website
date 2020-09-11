<?php  
 //fetch.php  
 include_once 'databaseconnection.php'; 
 if(isset($_POST["patientid"]))  
 {  
      $query = "SELECT * FROM prescriptiondatastorage WHERE  datetimepatientid = '".$_POST["patientid"]."'";  
      $result = mysqli_query($con, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 