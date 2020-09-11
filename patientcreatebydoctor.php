<?php 
  include_once 'databaseconnection.php';
  session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>patientcreatebydoctor</title>
        <meta name="viewport" content ="width=device-width,initial-scale=10.0">
        <link rel="stylesheet" href="patientcreate.css">
    </head>
    <body>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <label class="logo">MedicareX</label>
            <ul>
                <li><a  href="homepagefordoctors.php">HOME</a></li>
                <li><a href="prescription.php">PRESCRIPTION</a></li>
                <li><a href="patientcreatebydoctor.php">NEW PATIENT</a></li>
                <li><a href="fileupload.php">FILE UPLOAD</a></li>
                <li><a href="logout.php">LOG OUT</a></li>
                <li><a href="#"><?php echo $_SESSION['doctorname']; ?></a></li>
            </ul>
        </nav>
        <form>
            <table align="center" class="loginBox">
            <tr>
            <td>
            <pre>

            <img style="margin:0px 210px" src="undraw_medicine_b1ol%20(3).png" width="30%" height="35%">

            </pre>

            </td>
            <td>
                <img style="margin:0px 120px" src="undraw_doctor_kw5l.png" width="35%" height="35%">
            </td>
            </tr>
            <tr>
                <td>
                     <div class="button_cont"  align="justify"><a class="example_a" href="viewpatientdetails.php" style="margin:1px 240px" >Patient Details</a></div>
                    
                </td>
                <td>
                    <div class="button_cont" ><a class="example_a" style="margin:0px 130px" href="newpatient.php">New Patient</a></div>
                </td>
            </tr>
            </table>
            </form>
    </body>
</html>
