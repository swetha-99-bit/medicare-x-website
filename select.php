<?php  
include_once 'databaseconnection.php'; 
$key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
 function decryptthis($data, $key) {
     $encryption_key = base64_decode($key);
     list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
     return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
     }
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
        
      $query = "SELECT * FROM prescriptiondatastorage WHERE datetimepatientid= '".$_POST["employee_id"]."'";  
      $result = mysqli_query($con, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
           <tr>  
           <td width="30%"><label>Patientid</label></td>  
           <td width="70%">'.$row["patientid"].'</td>  
      </tr>  
      <tr>  
           <td width="30%"><label>HospitalName</label></td>  
           <td width="70%">'.$row["hospitalname"].'</td>  
      </tr> 
      <tr>  
           <td width="30%"><label>DoctorName</label></td>  
           <td width="70%">'.$row["doctorname"].'</td>  
      </tr> 
      <tr>  
           <td width="30%"><label>PatientName</label></td>  
           <td width="70%">'.$row["patientname"].'</td>  
      </tr>  
      <tr>  
           <td width="30%"><label>Gender</label></td>  
           <td width="70%">'.$row["gender"].'</td>  
      </tr>  
      <tr>  
           <td width="30%"><label>Age</label></td>  
           <td width="70%">'.$row["age"].'</td>  
      </tr>    
      <tr>  
           <td width="30%"><label>Symptoms</label></td>  
           <td width="70%">'.decryptthis($row["symptoms"],$key).'</td>  
      </tr> 
      <tr>  
           <td width="30%"><label>Findings</label></td>  
           <td width="70%">'.decryptthis($row["findings"],$key).'</td>  
      </tr> 
      <tr>  
           <td width="30%"><label>Diagnosis</label></td>  
           <td width="70%">'.decryptthis($row["diagnosis"],$key).'</td>  
      </tr> 
      <tr>  
           <td width="30%"><label>Medicines</label></td>  
           <td width="70%">'.decryptthis($row["medicines"],$key).'</td>  
      </tr> 
      ';    
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>
 