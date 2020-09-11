<?php
   include_once 'databaseconnection.php';
   if(isset($_POST['newpatient']))
   {
    $doctorid=$_POST['doctorid'];
    $patientname=$_POST['patientname'];
    $patientid=$_POST['patientid'];
    $phoneno=$_POST['phoneno'];
    $query=mysqli_query($con,"select * from newpatient where phoneno='".$phoneno."' or patientid='".$patientid."'   ");
    $count =mysqli_num_rows($query);
    if($count == 0)
    {
      $sql="INSERT INTO newpatient (doctorid,patientname,patientid,phoneno)
      VALUES ('$doctorid','$patientname','$patientid','$phoneno')";
      if (mysqli_query($con, $sql))
      {
      mysqli_close($con);
      header("Location: newpatient.php?newpatient=success");
      }
      else
      {
        echo "Error: " . $sql . "
        " . mysqli_error($con);
      }
    }
    else
    {
        header("Location: newpatient.php?newpatient=failure");
    }
   }
  
?>