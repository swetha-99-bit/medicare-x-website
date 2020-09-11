<?php  
 include_once 'databaseconnection.php';
 session_start();
 //$_SESSION['patientid']=$_GET['id'];  
 
 $patientid=$_SESSION['patientid']; 
 $query = "SELECT * FROM prescriptiondatastorage where  patientid='".$patientid."' ";  
 $result = mysqli_query($con, $query);  
 ?>  
<html>
    <head>
    <title>Prescription</title>
    <link rel="stylesheet" href="home.css">
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
            <li><a href="homepageforpatients.php">HOME</a></li>
                <li><a href="patientvisibleprescription.php">VIEW PRESCRIPTION</a></li>
                <li><a href="patientviewmedicalfiles.php">VIEW MEDICALFILES</a></li>
                <li><a href="logout.php">Log Out</a></li>
          </ul>
        </nav>
    <br /><br />  
           <div class="container" style="width:700px;">  
                <h3 align="center">Prescription</h3>  
                <br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="70%">Date</th>  
                               <th width="60%">DoctorName</th>
                               <th width="60%">PatientName</th>
                               <th width="50%">View</th>  
                          </tr>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["dates"]; ?></td>
                               <td><?php echo $row["doctorname"]; ?></td>
                               <td><?php echo $row["patientname"]; ?></td>  
                               <td><input type="button" name="view" value="view" id="<?php echo $row["datetimepatientid"]; ?>" class="btn btn-info btn-xs view_data" /></td>  
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
                     <h4 class="modal-title">Patient Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
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
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{employee_id:employee_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>