<?php  
 include_once 'databaseconnection.php';
 session_start();
 $_SESSION['patientid']=$_GET['patientid'];
 $patientid=$_SESSION['patientid'];
 $query = "SELECT * FROM fileupload where patientid='".$patientid."' ";  
 $result = mysqli_query($con, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <link rel="stylesheet" href="home.css">
           <title>medicalfiles</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <style>
               body{
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
           <br /><br /> 
           <div class="container" style="width:700px;">  
                <br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="70%">ID</th>  
                               <th width="30%">View Files</th>  
                          </tr>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["patientid"]; ?></td>  
                               <td><input type="button" name="view" value="view" id="<?php echo $row["fileuploadunique"]; ?>" class="btn btn-info btn-xs view_data" /></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Patient X-ray</h4>  
                </div>  
                <div class="modal-body" id="patient_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var patient_id = $(this).attr("id");  
           $.ajax({ 
                url:"viewmedicalfiles2.php",   
                method:"post",  
                data:{patient_id:patient_id},  
                success:function(data){  
                     $('#patient_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>

