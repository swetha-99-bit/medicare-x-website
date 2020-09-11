<html>
<head>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css"> 
<script src="sweetalert2.js"></script> 
</head> 
<body> 
   <form action="logout.php"> 
   <input type="button" value="logout" id="logout" onclick="logout()"></input>
  </form>
</body>
<script>
logout(){
    Swal.fire(
        'User already exists!',
        'Try again!',
         'error'
        ) 
}
</script>

</html>
