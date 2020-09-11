<?php 
  include_once 'databaseconnection.php';
  session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>HomePage</title>
        <meta name="viewport" content ="width=device-width,initial-scale=10.0">
        <link rel="stylesheet" href="home.css">
    </head>
    <body>
        <nav>
            <img src="logo.jpg" class="logo">
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
                <li><a href="#"><?php echo $_SESSION['patientname']; ?></a></li>
            </ul>
        </nav> <br><br>
        <h1 align="center" style="color:violet">Welcome <?php echo $_SESSION['patientname']; ?> !!</h1>
    </body>
</html>