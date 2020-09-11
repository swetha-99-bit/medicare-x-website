<?php
include_once 'databaseconnection.php';
session_start();
if(isset($_POST['login']))
{
 
     // check the database contain login username and phoneno
     $_SESSION['patientname']=$_POST['patientname'];
     $_SESSION['phoneno']=$_POST['phoneno'];
     $result=mysqli_query($con,"select * from newpatient where patientname='".$_SESSION['patientname']."' and phoneno='".$_SESSION['phoneno']."'");
     $row=mysqli_fetch_array($result);
     if($row['patientname']==$_SESSION['patientname'] && $row['phoneno']==$_SESSION['phoneno'])
     {
        $_SESSION['patientid']=$row['patientid'];
     }
     else
     {
       //session_destroy();
       //header("Location:patientlogin.php?login=fail");
     }
}
    if(isset($_POST['send']))
   {
    $username = "bhuv17cs013@rmkcet.ac.in";
    $hash = "c4a17d94e1a90072e4d5a2a8bc52d97d528e4d1aae9f6fbf6b785b8a83fc2530";
   
  $test = "0";
  $name = $_POST['patientname'];
  echo $name;
  // Data for text message. This is the text message data.
  $sender = "TXTLCL"; // This is who the message appears to be from.
  $numbers =$_POST['phoneno'];// A single number or a comma-seperated list of numbers
  $otp=mt_rand(100000,999999);
  
  setcookie("otp",$otp);
  $message = "Hey ".$name."Your otp is ".$otp;
  // 612 chars or less
  // A single number or a comma-seperated list of numbers
  $message = urlencode($message);
  $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$name."&numbers=".$numbers."&test=".$test;
  $ch = curl_init('http://api.textlocal.in/send/?');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch); // This is the result from the API
  echo "Otp sent successfully";
  header("Location:homepageforpatients.php");
  curl_close($ch);
  } 
  if(isset($_POST['ver']))
  {
    //$verotp=$_SESSION['otp'];
    if($_SESSION['otp']==$_COOKIE['otp'])
    {
     echo "Logged in successfully";
     }
    else
    {
      echo "<script>
      Swal.fire(
      'Incorret otp!',
      'Try again!',
      'error'
      )
      </script>";
    }
  }
?>
<html>
  <head>
      <link rel="stylesheet" href="otp.css">
  </head>
  <body>
      <div class="error"></div>
        <div class="success"></div>
            <form id="frm-mobile-verification" method="POST" action="phppatientlogin.php" >
	              <div class="form-row">
		              <label>OTP is sent to Your Mobile Number</label>		
                </div>
                <div class="form-row">
                    <input type="text" class="form-inputs" name="patientname" value="<?php echo $_SESSION['patientname'];?>" readonly><br><br>
                    <input type="text" class="form-inputs" name="phoneno" value="<?php echo $_SESSION['phoneno'];?>" readonly><br><br>
		                <input type="number"  id="mobileOtp" class="form-inputs" name="otp" value="Enter otp">	<br>	
	              </div>
                <div class="row">
                  <table align="center">
                    <tr>
                      <td>
                       <input id="verify" type="submit" class="btnVerify" name="send" value="Send">	
                      </td>
                      <td>
                        <input type="submit" class="btnVerify" name="ver" value="Verify">
                      </td>
                    </tr>
                  </table>	
	               </div>
            </form>
  </body>  
</html>
