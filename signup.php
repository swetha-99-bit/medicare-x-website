<html>
    <head>
        <meta charset="utf-8">
        <title>signup</title>
        <link rel="stylesheet" href="sign.css">
        <link rel="stylesheet" href="sweetalert2.css">
        <script src="sweetalert2.js"></script>
    </head>
    <body class="b">
        <div class="container" id="container">
        <div class="form-container sign-up-container">
                <form name="form1" autocomplete="off" method="post" action="phpsignup.php">
                   <span class="text-center">sign up</span>
                    
                    
                    <div class="input-container">
                        <input type="text" name="Docname" required=""/>
                        <label>Doctor Name</label>
                    </div>
                    <div class="input-container">
                        <input type="designation" name="Designation"required=""/>
                        <label>Designation</label>
                    </div>
                    <div class="input-container">
                        <input type="HospitalName" name="HospitalName" required=""/>
                        <label>HospitalName</label>
                    </div>
                    <div class="input-container">
                        <input type="phone" name="phoneno" required=""/>
                        <label>PhoneNo</label>
                    </div>
                    <div class="input-container">
                       <input type="id" name="uniqueid" required=""/>
                       <label>Uniqueid</label>
                    </div>
                    <button type="submit" name="signup" value="submit">signup</button>
            </form>
            
        </div>
        <div class="form-container sign-in-container">
            <form action="phpsignup.php" autocomplete="off" method="post" >
                <h1>Doctor Sign In</h1><br>
                <span>or use your account</span><br><br>
                <div class="input-container">
                    <input type="text" name="doctorname" value="<?php echo isset($_POST['doctorname']) ? $_POST['doctorname']:'';?>" required=""/>
                    <label>DoctorName</label>
                </div>
                <div class="input-container">
                    <input type="phone" name="phoneno" value="<?php echo isset($_POST['phoneno']) ? $_POST['phoneno']:'';?>" required=""/>
                    <label>PhoneNumber</label>
                </div>
            <button type="submit" name="login" value="submit">Sign In</button>
            </form>
            <?php
               if(isset($_POST['login']))
               {
               session_start();
               $_SESSION['doctorname']=$_POST['doctorname'];
               $_SESSION['phoneno']=$_POST['phoneno'];
               }
            ?>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Doctor!</h1>
                    <p>Enter your details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
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
                
                if(isset($_GET['signup']))
                {
                
                    $signupcheck=$_GET['signup'];
                    if($signupcheck=="duplicate")
                    {
                    echo "<script>
                    Swal.fire(
                        'User already exists!',
                      'Try again!',
                      'error'
                        )
                    </script>";
                    }
                    else if($signupcheck=="success")
                    {
                        echo "<script>
                        Swal.fire(
                        'Successfull Signedup!',
                        'Try to login!',
                        'success'
                        )
                        </script>";
                    }
                }
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

