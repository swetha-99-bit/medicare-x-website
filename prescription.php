<?php 
  include_once 'databaseconnection.php';
  session_start(); 
  
?>
<html>
  <head>
  <title>Prescription</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="home.css">
   <style>
    .bs-example{
        margin: 30px;
        color:black;
        padding-left: 200px;
        padding-right:50px;
        width:1000px;
        height:1200px;    
    }
    body
    {
      font-family: montserrat;
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
        <div class="bs-example">
         <form method="post" action="pdf.php">
         <h3 align="center">PRESCRIPTION</h3> <br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Doctorid</span>
            </div>
            <input type="text" name="doctorid" value="<?php echo $_SESSION['uniqueid'];?>" class="form-control"  readonly>
            <div class="input-group-prepend">
              <span class="input-group-text">Patientid</span>
            </div>
            <input type="text" name="patientid"  class="form-control"  required="">
        </div>
        <br>
        <div class="input-group">
          <div class="input-group-prepend">
              <span class="input-group-text">HospitalName</span>
          </div>
          <input type="text" name="hospitalname" value="<?php echo $_SESSION['HospitalName'];?>" class="form-control"  readonly>
          <div class="input-group-prepend">
            <span class="input-group-text">DoctorName</span>
          </div>
          <input type="text" name="doctorname" value="<?php echo $_SESSION['doctorname'];?>" class="form-control"  readonly>
      </div> 
      <br>
      <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">PatientName</span>
        </div>
        <input type="text" name="patientname" class="form-control"  required="">
      </div>
      <br>
      <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Age</span>
        </div>
        <input type="number" name="age" class="form-control" required="">
        <div class="input-group-prepend">
            <span class="input-group-text">Gender</span>
        </div>
        <select name="gender" class="form-control" id="sel1">
          <option>Male</option>
          <option>Female</option>
          <option>Other</option>
        </select> 
      </div> 
      <br>
      <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Date</span>
        </div>
        <input type="date" name="date"  class="form-control"  required="">
        <div class="input-group-prepend">
          <span class="input-group-text">Time</span>
        </div>
        <input type="time" name="time" class="form-control"  required="">
    </div> 
    <br>
    <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text">Mobile</span>
      </div>
      <input type="text" name="mobile" class="form-control"  required="">
    </div>
    <br>
    <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text">Symptoms</span>
      </div>
      <input type="text" name="symptoms" class="form-control"  required=""> 
    </div>
    <br>
    <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text">Diagnosis</span>
      </div>
      <input type="text" name="findings" class="form-control"  required=""> 
    </div>
    <br>
    <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text">Findings</span>
      </div>
      <textarea type="text" name="diagnosis" class="form-control"  size="60" maxlength="1000" cols=40 rows=10></textarea>
    </div>
    <br>
    <div class="input-group">
      <div class="input-group-prepend">
          <span class="input-group-text">Medicines</span>
      </div>
      <textarea type="text" name="medicines" class="form-control"  size="60" maxlength="1000" cols=50 rows=10 required=""></textarea>
    </div>
    <br>
    <button type="submit" name="storedatabase" class="btn btn-primary btn-md" align="center">Submit</button> 
      </form>
      </div>
  </body>
</html>