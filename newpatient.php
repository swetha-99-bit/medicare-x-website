<?php 
   include_once 'databaseconnection.php';
   session_start();
?>
<html>
    <head>
    <link href='newpatient.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="sweetalert2.css">
    <script src="sweetalert2.js"></script>
    </head>
    <body>
    <div class="wrap">
        <form method="post" action="phpnewpatient.php">
            <h2>New Patient Details Enter</h2>
            <div>
                <label>Doctorid</label>
                <input name="doctorid" type="text" value="<?php echo $_SESSION['uniqueid']?>" class="cool" readonly/>
            </div>
            <div>
                <label>First Name</label>
                <input name="patientname" type="text" class="cool"/>
            </div>
            <div>
                <label>PatientId</label>
                <input name="patientid" type="text" class="cool"/>
            </div>
            <div>
                <label>PhoneNo</label>
                <input name="phoneno" type="text" class="cool"/>
            </div>
            <button type="submit" name="newpatient" value="submit">Create</button>
        </form>
    </div>
    </body>
</html>
<?php
    if(isset($_GET['newpatient']))
    {
       
        $signupcheck=$_GET['newpatient'];
        if($signupcheck=="failure")
        {
            echo "<script>
                    Swal.fire(
                        'Phone number or patientid already exists!',
                      'Try again!',
                      'error'
                        )
                    </script>";
        }
        else if($signupcheck=="success")
        { 
            echo "<script>
                Swal.fire(
                'Successfull newpatient account created!',
                'Try to login!',
                'success'
                )
            </script>";
        }
    }
?>