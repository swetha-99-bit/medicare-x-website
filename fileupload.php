<?php
  include_once 'databaseconnection.php';
  session_start();
?>
<html>
<head>
<link rel="stylesheet" href="home.css">
<style> 
.center {
         margin-left: auto;
         margin-right: auto;
         }
.text {
  width: 100%;
  padding: 12px 20px;
  margin: 10px 0;
  box-sizing: border-box;
  border: 2px solid blue;
  border-radius: 4px;
}
.square_btn{
    display: inline-block;
    padding: 0.5em 1em;
    text-decoration: none;
    border-radius: 3px;
    font-weight: bold;
    color: #FFF;
    background-image: -webkit-linear-gradient(45deg, #709dff 0%, #b0c9ff 100%);
    background-image: linear-gradient(45deg, #709dff 0%, #b0c9ff 100%);
    transition: .4s;
}

.square_btn:hover{
    background-image: -webkit-linear-gradient(45deg, #709dff 50%, #b0c9ff 100%);
    background-image: linear-gradient(45deg, #709dff 50%, #b0c9ff 100%);
}
</style>
</head>
<body>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <label class="logo">MedicareX</label>
            <ul>
                <li><a href="homepagefordoctors.php">Home</a></li>
                <li><a href="prescription.php">Prescription</a></li>
                <li><a href="patientcreatebydoctor.php">New Patient</a></li>
                <li><a href="fileupload.php">File Upload</a></li>
                <li><a href="logout.php">Log Out</a></li>
                <li><a href="#"><?php echo $_SESSION['doctorname']; ?></a></li>
            </ul>
        </nav>
        <br>
<form method="post" action="fileupload.php" enctype="multipart/form-data">  
   <table class="center">
     <tr>
       <td>
       <h1 align="center">File Upload</h1>
      </td>
    </tr>
    <tr> 
      <td>
        <label for="fname">PatientId</label>
      </td>
      <td>
        <input class="text" type="text" id="fname" name="patientid"><br>
      </td>
      </tr>
      <tr>
        <td>
          <label for="lname">Patient Name</label>
        </td>
        <td>
            <input class="text" type="text" id="lname" name="patientname">
        </td>
      </tr>
      <tr>
        <td>
          <label for="lname">Date</label>
        </td>
        <td>
            <input class="text" type="date" id="lname" name="date">
        </td>
      </tr>
      <tr>
        <td>
          <label for="lname">Time</label>
        </td>
        <td>
            <input class="text" type="time" id="lname" name="time">
        </td>
      </tr>
      <tr>
      <td>
         <br><input type="file" name="files" > <br/><br/>
      </td>
      <td>
          <input type="submit" name="submit" class="square_btn" value="UPLOAD"></h3>
      </td>
      </tr>
</form>

</body>
<?php 
include_once 'databaseconnection.php';
if(isset($_POST['submit']))
{ 
     
    // File upload configuration 
    $targetDir = "filepatient/";  //folder name
    $allowTypes = array('jpg','png','jpeg','gif','html','pdf'); 
    $patientid=$_POST['patientid'];
    $patientname=$_POST['patientname'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $statusMsg = ''; 
    $datetimepatientid=$date.$time;
    $fileNames = $_FILES['files']['name']; 
    if(!empty($fileNames))
    {  
            // File upload path 
            $fileName = basename($_FILES['files']['name']); 
            $targetFilePath = $targetDir . $fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes))
            { 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"], $targetFilePath))
                { 
                // Insert image file name into database  
                $insert ="INSERT INTO fileupload (patientid,patientname,filenamepath,dates,time,fileuploadunique) VALUES $patientid,$patientname,$fileName,$date,$time,$datetimepatientid";
                $sql=mysqli_query($con,$insert);
                if($sql)
                {  
                $statusMsg = "File uploaded successfully.".$errorMsg; 
                }
                else
                { 
                    $statusMsg = "Sorry, there was an error uploading your file."; 
                } 
                } 
                else{ 
                  $errorUpload .= $_FILES['files']['name'][$key].' | '; 
              } 
          }else{ 
              $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
          } 
            } 
    }
    else
    { 
        $statusMsg = 'Please select a file to upload.'; 
    } 
     
    // Display status message 
    echo $statusMsg;   
?> 
</html>