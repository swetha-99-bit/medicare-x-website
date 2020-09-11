<?php
session_start();
include_once 'databaseconnection.php';
$output = '';
$doctorid=$_SESSION['uniqueid'];
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($con, $_POST["query"]);
 $query = "
  SELECT Distinct patientid,patientname,doctorid FROM prescriptiondatastorage LEFT JOIN  doctorsignup ON   prescriptiondatastorage.doctorid = doctorsignup.uniqueid  
  Where doctorid LIKE '%".$search."%'
  OR patientid LIKE '%".$search."%' 
  OR patientname LIKE '%".$search."%'
  and prescriptiondatastorage.doctorid= '".$doctorid."' 
  order by patientid,patientname,doctorid
  ";
}
else
{
 $query = "
  SELECT Distinct patientid,patientname,doctorid FROM prescriptiondatastorage  LEFT JOIN  doctorsignup 
  ON  prescriptiondatastorage.doctorid = doctorsignup.uniqueid
   where prescriptiondatastorage.doctorid= '".$doctorid."'
   order by patientid,patientname,doctorid";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) >0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>DoctorId</th>
     <th>PatientId</th>
     <th>MedicalFiles</th>
     <th>PatientName</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["doctorid"].'</td>
    <td><a href="visibleprescription.php?id='.$row["patientid"].'"> '.$row["patientid"].' </a></td>
    <td><a href="viewmedicalfiles.php?patientid='.$row["patientid"].'">'.$row["patientname"].'</a></td>
    <td>'.$row["patientname"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>