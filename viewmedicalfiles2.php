<?php 
include_once 'databaseconnection.php';  
session_start();
 $query = "SELECT * FROM fileupload where patientid='".$_SESSION['patientid']."' ";  
 $result = mysqli_query($con, $query); 
 if(isset($_POST["patient_id"]))  
 {  
      $output = '';  
      $query = "SELECT filenamepath FROM fileupload WHERE fileuploadunique= '".$_POST["patient_id"]."'";  
      $result = mysqli_query($con, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" width=500% height=500%>';  
      while($row = mysqli_fetch_array($result))  
      {  
           ?> 
           <div class="container"> <?php
           $output .= '  
           <embed style="min-height:100vh;width:100%" src="fileuploadofpatient/'.$row['filenamepath'].'#toolbar=0" type="application/pdf" class="img-responsive" >';
           ?> </div>  <?php
          
    }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
