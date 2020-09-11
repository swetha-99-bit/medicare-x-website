<?php
  include_once 'databaseconnection.php';
  session_start(); 
  $key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
  function encryptthis($data, $key) {
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
    }
     
  if(isset($_POST['storedatabase']))
  {
  $doctorid=$_POST['doctorid'];
  $patientid=$_POST['patientid'];
  $hospitalname=$_POST['hospitalname'];
  $doctorname=$_POST['doctorname'];
  $patientname=$_POST['patientname'];
  $age=$_POST['age'];
  $gender=$_POST['gender'];
  $Date=$_POST['date'];
  $time=$_POST['time'];
  $mobile=$_POST['mobile'];
  $symptoms=encryptthis($_POST['symptoms'],$key); 
  $findings=encryptthis($_POST['findings'],$key); 
  $Diagonsis=encryptthis($_POST['diagnosis'],$key); 
  $Medicines=encryptthis($_POST['medicines'],$key); 
  $datetimepatientid=strval($patientid).strval($Date).strval($time);
  $sql = "INSERT INTO prescriptiondatastorage(doctorid,patientid,hospitalname,doctorname,patientname,age,
  gender,dates,currenttime,mobileno,symptoms,findings,diagnosis,medicines,datetimepatientid)
  VALUES ('$doctorid','$patientid','$hospitalname','$doctorname','$patientname',
  '$age','$gender','$Date','$time','$mobile','$symptoms','$findings','$Diagonsis','$Medicines','$datetimepatientid')";
  if (mysqli_query($con, $sql))
  {
  //echo "New record created successfully !";
  }
  }
  if(isset($_POST['sendsms']))
  {
  // Authorisation details.
  $username = "bhuv17cs013@rmkcet.ac.in";
  $hash = "c4a17d94e1a90072e4d5a2a8bc52d97d528e4d1aae9f6fbf6b785b8a83fc2530";
  
  // Config variables. Consult http://api.textlocal.in/docs for more info.
  $test = "0";
  $hospital_name = $_POST['hospitalname'];
   $doctor_name = $_POST['doctorname'];
   $patient_name = $_POST['patientname'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $date = $_POST['date'];
   $time = $_POST['time'];
   $mobile = $_POST['mobile'];
   $symptoms = $_POST['symptoms'];
   $findings = $_POST['findings'];
   $diagnosis = $_POST['diagnosis'];
   $medicines = $_POST['medicines'];
  // Data for text message. This is the text message data.
  $sender = "TXTLCL"; // This is who the message appears to be from.
  $numbers = $_POST['mobile']; // A single number or a comma-seperated list of numbers
  $message = "Your details are:\n Hospital name: ".$hospital_name."\n Doctor name: ".$doctor_name."\n Patient name: ".$patient_name."\n Age : ".$age."\n Gender: ".$gender."\n Date: ".$date."\n Time : ".$time."\n Mobile: ".$mobile."\n Symptoms: ".$symptoms."\n Findings: ". $findings."\n Diagnosis: ".$diagnosis."\n Medicines: ".$medicines;
  // 612 chars or less
  // A single number or a comma-seperated list of numbers
  $message = urlencode($message);
  $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
  $ch = curl_init('http://api.textlocal.in/send/?');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch); // This is the result from the API
  //echo "Message sent successfully";
  curl_close($ch);
  }

  
?>
<html>
  <head>
     <style>
        table.round3 
        {
          margin-left: 3.5em;
          border: 2px solid red;
          border-radius: 12px;
        }
     </style>
  </head>
  <body>
      <form><br><br><br><br><br><br><br><br>
      <table class="round3">
          <tr>
          <td><h4><?php echo "PatiendId:".$_POST['patientid']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</h4></td>
          <td><h4><?php echo "Name:".$_POST['patientid'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></td>
          <td><h4><?php echo "Age/Gender:".$_POST['age']."/".$_POST['gender'];?><br></h4></td>
          </tr>
          <tr>
          <td><h4><?php echo "Date:".$_POST['date'];?></h4></td>
          <td><h4><?php echo "Mobile:".$_POST['mobile'];?></h4></td>
          <td><h4><?php echo "DoctorId:".$_POST['doctorid'];?></h4></td>
          </tr>
          </table><br><br>
          <h4 style="display:inline; margin-left: 3.5em;">Symptoms:</h4><?php echo $_POST['symptoms'];?><br><br><br>
          <h4 style="display:inline;margin-left: 3.5em;">Findings:</h4><?php echo $_POST['findings'];?><br><br><br>
          <h4 style="display:inline;margin-left: 3.5em;">Diagnosis:</h4><?php echo $_POST['diagnosis'];?><br><br><br>
          <h4 style="display:inline;margin-left: 3.5em;">Medicines</h4>
          <?php 
          $str=$_POST['medicines'];
          $arr=explode(" ",$str);
          foreach($arr as $v)
          {
          ?>
            <p style="display:inline;margin-left: 3.5em">
             <?php 
             echo $v;
             echo "<br>";
             ?>
             </p>
             <?php
          }
          ?>
          <h4 style="margin-left: 3.5em"><a onclick="window.print()"><?php echo "Dr.".$_SESSION['doctorname'];?></a></h4>
      </form>
  </body>
</html>
