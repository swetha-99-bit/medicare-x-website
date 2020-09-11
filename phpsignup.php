<?php
  // database connection
  include_once 'databaseconnection.php';
  session_start();
  // check if user click the signup button
  if(isset($_POST['signup']))
  {
  // get data from the signup form
  $docorname=$_POST['Docname'];
  $designation=$_POST['Designation'];
  $hospitalname=$_POST['HospitalName'];
  $phoneno=$_POST['phoneno'];
  $uniqueid=$_POST['uniqueid']; 
  //check duplicate data(phonenumber)
  $resultset_1 = mysqli_query($con,"select * from doctorsignup where phoneno='".$phoneno."'  and  uniqueid='".$uniqueid."' ") or die(mysql_error());
  $count = mysqli_num_rows($resultset_1);
    
     // if there is no duplicate data
     if($count == 0)
      {
          // insert data to database
          $sql = "INSERT INTO doctorsignup (DoctorName,Designation,HospitalName,phoneno,uniqueid)
	        VALUES ('$docorname','$designation',' $hospitalname','$phoneno','$uniqueid')";
          if (mysqli_query($con, $sql))
          {
          //echo "New record created successfully !";
          mysqli_close($con);
          header("Location: signup.php?signup=success");
          }
          /*else 
          { 
		        echo "Error: " . $sql . "
            " . mysqli_error($con);
	        }*/
      }
      // if it contain duplicate data
      else
      {
        header("Location: signup.php?signup=duplicate&docname=$docorname&designation=$designation&hospital=$hospitalname&phoneno=$phoneno");

      }
    }
    else if(isset($_POST['login']))
    {
 
     // check the database contain login username and phoneno
     $_SESSION['doctorname']=$_POST['doctorname'];
     $_SESSION['phoneno']=$_POST['phoneno'];
     $result=mysqli_query($con,"select * from doctorsignup where DoctorName='".$_SESSION['doctorname']."' and phoneno='".$_SESSION['phoneno']."'");
     $row=mysqli_fetch_array($result);
     if($row['DoctorName']==$_SESSION['doctorname'] && $row['phoneno']==$_SESSION['phoneno'])
     {
        $_SESSION['uniqueid']=$row['uniqueid'];
        $_SESSION['HospitalName']=$row['HospitalName'];
     }
     else
     {
       session_destroy();
       header("Location:signup.php?login=failure");
     }
    }
    if(isset($_POST['send']))
   {
    // Authorisation details.
    
$username = "bhuv17cs013@rmkcet.ac.in";
$hash = "c4a17d94e1a90072e4d5a2a8bc52d97d528e4d1aae9f6fbf6b785b8a83fc2530";

// Config variables. Consult http://api.textlocal.in/docs for more info.
$test = "0";
$name = $_SESSION['doctorname'];
// Data for text message. This is the text message data.
$sender = "TXTLCL"; // This is who the message appears to be from.
$numbers = $_SESSION['phoneno']; // A single number or a comma-seperated list of numbers
    $otp=mt_rand(100000,999999);
    setcookie("otp",$otp);
$message = "Hey ".$name."Your otp is ".$otp;
// 612 chars or less
// A single number or a comma-seperated list of numbers
$message = urlencode($message);
$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
$ch = curl_init('http://api.textlocal.in/send/?');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); // This is the result from the API
echo "Otp sent successfully";
  curl_close($ch);
  } 
  if(isset($_POST['ver']))
  {
    $verotp=$_POST['otp'];
    if($verotp==$_COOKIE['otp'])
    {
      header("Location:homepagefordoctors.php");
     //echo "Logged in successfully";
     }
    else
    {
      header("Location:homepagefordoctors.php");
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
            <form id="frm-mobile-verification" method="POST" action="phpsignup.php" >
	              <div class="form-row">
		              <label>OTP is sent to Your Mobile Number</label>		
                </div>
                <div class="form-row">
                    <input type="text" class="form-inputs" name="doctorname" value="<?php echo $_SESSION['doctorname'];?>" readonly><br><br>
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

