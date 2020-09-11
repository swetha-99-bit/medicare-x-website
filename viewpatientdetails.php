<?php 
  include_once 'databaseconnection.php';
  session_start();
?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>viewpatientdetails</title>
            <link rel="stylesheet" href="home.css"> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
           <style>
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
  <div class="container">
   <br />
   <h2 align="center">Patient Prescription</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Patient Details" class="form-control" />
    </div>
   </div>
   <br/>
   <div id="result"></div>
  </div>
  </div>
 </body>
</html>


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"viewpatientdetails2.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>