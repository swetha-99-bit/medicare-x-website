<?php  
 include_once 'databaseconnection.php'; 
 session_start();
 $_SESSION['patientid']=$_GET['id'];
 $patientid=$_SESSION['patientid'];
 $query = "SELECT * FROM prescriptiondatastorage where  patientid='".$patientid."' ";  
 $result = mysqli_query($con, $query);
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>patientprescription</title>
           <link rel="stylesheet" href="home.css"> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
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
                <li><a href="logout.php" name="">Log Out</a></li>
                <li><a href="#"><?php echo $_SESSION['doctorname']; ?></a></li>
          </ul>
        </nav>
           <br /><br />  
           <div class="container" style="width:700px;">  
                <h3 align="center">prescription</h3>  
                <br />  
                <div class="table-responsive">  
                     <div align="right">  
                         <!--<button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>-->
                     </div>  
                     <br />  
                     <div id="employee_table">  
                          <table class="table table-bordered">  
                               <tr>  
                                    <th width="70%">Date</th>  
                                    <th width="60%">DoctorName</th>
                                    <th width="60%">PatientName</th>
                                    <th width="50%">Edit</th>
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
                                    <td><input type="button" name="edit" value="Edit" id="<?php echo $row["datetimepatientid"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
                                    <td><input type="button" name="view" value="view" id="<?php echo $row["datetimepatientid"]; ?>" class="btn btn-info btn-xs view_data" /></td>  
                               </tr>  
                               <?php  
                               }  
                               ?>  
                          </table>  
                     </div>  
                </div>  
           </div>  
      </body>  
 </html>  
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Employee Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">PHP Ajax Update MySQL Data Through Bootstrap Modal</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                     <label>Patientid</label>  
                          <input type="text" name="patientid" id="patientid" class="form-control" />  
                          <br />  
                          
                          <label>HospitalName</label>  
                          <input type="text" name="hospitalname" id="hospitalname" class="form-control">  
                          <br />  

                          <label>DoctorName</label>  
                          <input type="text" name="doctorname" id="doctorname" class="form-control">  
                          <br />
                          

                          <label>PatientName</label>  
                          <input type="text" name="patientname" id="patientname" class="form-control" />  
                          <br />

                          <label>Age</label>  
                          <input type="text" name="age" id="age" class="form-control" />  
                          <br />
                         
                          <label>Gender</label>
                          <select name="gender" id="gender" class="form-control">  
                               <option value="Male">Male</option>  
                               <option value="Female">Female</option>  
                          </select>  
                          <br />  

                          <label>Symptoms</label>  
                          <textarea name="symptoms" id="symptoms" class="form-control"></textarea>  
                          <br /> 

                          <label>Findings</label>  
                          <textarea name="findings" id="findings" class="form-control"></textarea>  
                          <br /> 

                          <label>Diagnosis</label>  
                          <textarea name="diagnosis" id="diagnosis" class="form-control"></textarea>  
                          <br /> 

                          <label>Medicines</label>  
                          <textarea name="medicines" id="medicines" class="form-control"></textarea>  
                          <br /> 

                          <input type="hidden" name="employee_id" id="employee_id"/>  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
                dataType:"json",  
                success:function(data){  
                     $('#patientid').val(data.patientid);  
                     $('#hospitalname').val(data.hospitalname);  
                     $('#doctorname').val(data.doctorname);  
                     $('#patientname').val(data.patientname);  
                     $('#age').val(data.age);
                     $('#gender').val(data.gender);
                     $('#symptoms').val(data.symptoms);
                     $('#findings').val(data.findings);
                     $('#diagnosis').val(data.diagnosis);
                     $('#medicines').val(data.medicines);
                     $('#employee_id').val(data.datetimepatientid);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');
                    
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#patientid').val() == "")  
           {  
                alert("patientid is required");  
           }  
           else if($('#hospitalname').val() == '')  
           {  
                alert("hospitalname is required");  
           }  
           else if($('#doctorname').val() == '')  
           {  
                alert("doctorname is required");  
           }  
           else if($('#patientname').val() == '')  
           {  
                alert("patientnameis required");  
           } 
           else if($('#designation').val() == '')  
           {  
                alert("Designation is required");  
           } 
           else if($('#age').val() == '')  
           {  
                alert("age is required");  
           } 
           else if($('#gender').val() == '')  
           {  
                alert("gender is required");  
           }  
           else if($('#symptoms').val() == '')  
           {  
                alert("symptoms is required");  
           }  
           else if($('#findings').val() == '')  
           {  
                alert("findings is required");  
           }  
           else if($('#diagnosis').val() == '')  
           {  
                alert("diagnosis is required");  
           } 
           else if($('#medicines').val() == '')  
           {  
                alert("medicines is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"update.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(), 
                     beforeSend:function(){  
                          $('#insert_form').val("Inserting");  
                     },  
                     success:function(data){  
                          //alert(data.datetimepatientid);
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data); 
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>