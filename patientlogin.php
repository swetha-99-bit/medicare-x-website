<html>
    <head>
        <meta charset="utf-8">
        <title>patientdetaillogin</title>
        <meta name="viewport" content ="width=device-width,initial-scale=10.0">
        <link rel="stylesheet" href="patientdetail.css">
    </head>
    <body>
        <div class="container" id="container">
        <div class="form-container sign-up-container">
                <form action="phppatientlogin.php"  method="post" autocomplete="off">
                   <h1>Patient Sign In</h1><br>
                    <div class="input-container">
                        <input type="text" name="patientname" value="<?php echo isset($_POST['patientname']) ? $_POST['patientname']:'';?>" required=""/>
                        <label>PatientName</label>
                    </div>
                    <div class="input-container">
                        <input type="phone" name="phoneno" value="<?php echo isset($_POST['phoneno']) ? $_POST['phoneno']:'';?>" required=""/>
                        <label>Phoneno</label>
                    </div>
                    <button type="submit" name="login">submit</button> 
            </form>
            <?php 
              session_start(); 
              $_SESSION['patientname']=$_POST['patientname']; 
              $_SESSION['phoneno']=$_POST['phoneno'];;
            ?>
        </div>
        <div class="form-container sign-in-container">
            <img src="undraw_Login_v483%20(1).png" width="15%" height="15%">

        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend</h1><br>
                    <p>click the below button to move to patient login</p><br>
                    <button class="ghost" id="signUp">Patient Login</button>
                </div>
            </div>
        </div>
        </div>
        <script type="text/javascript">
            const signUpButton = document.getElementById('signUp');
            const signInButton = document.getElementById('signIn');
            const container = document.getElementById('container');
        
            signUpButton.addEventListener('click', () => {
                container.classList.add("right-panel-active");
            });
            signInButton.addEventListener('click', () => {
                container.classList.remove("right-panel-active");
            });
        </script>
    </body>
</html>
<?php 
if(isset($_GET['login']))
{
    $signincheck=$_GET['login'];
    if($signincheck=="failure")
    {
        echo "<script>
        Swal.fire(
        'Incorret Login details!',
        'Try again!',
        'error'
        )
        </script>";
    }
}
?>