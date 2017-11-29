<!DOCTYPE html>
<?php
include("connect.php");

$var="select max(uid) as max from reg";
	   $res=$con->query($var);
       $row = mysqli_fetch_assoc($res);

	     $uid = $row['max'] + 1;
?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Smart Spending System</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">

  </head>
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="jquery.validate.min.js"></script>
  <script>
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#myForm").validate({
    
        // Specify the validation rules
        rules: {
				name: "required",
				address: "required",
				username: "required",
				password: "required",
				country: "required",
				email: {
                required: true,
                email: true
				},
				contact:{
				required:true,
				minlength:10,
				maxlength:10,
				number: true
				},		
			},
		
        
        // Specify the validation error messages
        messages: {
            name: "<label><h5>Please enter your full name!</h5></label>",
            address:"<label><h5>Please enter Address!</h5></label>",
			email:"<label><h5>Please enter valid email Address!</h5></label>",
			contact:"<label><h5>Please enter Valid Contact No!</h5></label>",
			country:"<label><h5>Please select Country!</h5></label>",
			username: "<label><h5>Please enter valid Username!</h5></label>",
			password: "<label><h5>Please enter valid Password!</h5></label>",
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>
  <body id="page-top">
<form method="POST" id='myForm'  novalidate="novalidate">
    
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="Homepage.php">Smart Spending System</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive" >
          <ul class="navbar-nav ml-auto">
            <li class="nav-item" style='color:black'>
              <a class="nav-link js-scroll-trigger" href="Homepage.php">Home</a>
            </li>
            
            <li class="nav-item" style='color:black'>
              <a class="nav-link js-scroll-trigger" href="#contact">Login</a>
            </li>
			
          </ul>
        </div>
   </div>
	  <center>
     <div id="contact" class="call-to-action " style='width:60%'>
      <div class="container bg-dark" style='border:0px solid grey;width:90%;box-shadow: 0 5px 9px 0 rgba(0, 0, 0, 0.2), 0 7px 21px 0 rgba(0, 0, 0, 0.19);'>
        
		<table border='0' align='center' width='50%'>
		<tr align='center'>
		<td><br><h2 style='color:red'>Registration</h2><br>
		</td>
		</tr>
		<tr align='left'>
		<td>
		<label>ID</label>
		</td>
		</tr>
         <tr align='center'>
		<td>		
		<input class="form-control" type='text' name='uid' value="<?php echo $uid?>" readonly><br>
		</td>
		</tr>
		<tr align='left'>
		<td>
		<label>Name</label>
		</td>
		</tr>
         <tr align='center'>
		<td>		
		<input class="form-control" type='text' name='name' id='name'><br>
		</td>
		</tr>
		<tr align='left'>
		<td>
		<label>EmailId</label>
		</td>
		</tr>
		 <tr align='center'>
		<td>		
		<input class="form-control" type='text' name='email' ><br>
		</td>
		</tr>
		<tr align='left'>
		<td>
		<label>Contact</label>
		</td>
		</tr>
		<tr align='center'>
		<td>		
		<input class="form-control" type='text' name='contact'><br>
		</td>
		</tr>
		<tr align='left'>
		<td>
		<label>Address</label>
		</td>
		</tr>
		<tr align='center'>
		<td>
		<textarea class="form-control" name='address'></textarea><br>
		</td>
		</tr>
		<tr align='left'>
		<td>
		<label>Country</label>
		</td>
		</tr>
        <tr align='center'>
		<td>
		<select name='country' id='country'  class='form-control' type='text' onchange='cntry()' required >
		<option value=''>--Select Country--</option>
				<?php
				 $sql5="select distinct country from country";


				  //$cnt=$cnt+1;
				 $res = $con->query($sql5);
				while($row = $res->fetch_assoc()) 
				{?>
					<option value="<?php echo $row['country'] ?>"/><?php echo $row['country'] ?></option>
				 
					<?php }
				?>
		</select><br>
		</td>
		</tr>
		<tr align='left'>
	    <td><br><div id="currency"></div> 
		</td>
		</tr>
		<tr align='left'>
		<td>
		<label>Username</label>
		</td>
		</tr>
         <tr align='center'>
		<td>		
		<input class="form-control" type='text' name='username' ><br>
		</td>
		</tr>
		<tr align='left'>
		<td>
		<label>Password</label>
		</td>
		</tr>
		<tr align='center'>
		<td>
		<input type='password' class="form-control" name='password' ><br>
		</td>
		</tr>
		
		<tr align='center'>
		<td colspan='2'>
        <input type='submit' class="btn btn-danger btn-xl sr-button btn-red" name='reg' value="Register"><br><br>
		</td>
		</tr>
      </div>
    </div>
	</center>
    </header>
<?php


if(isset($_POST['reg']))
{	
     $uid=$uid;
	$name=$_POST['name'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$country=$_POST['country'];
	$currency=$_POST['currency'];
	$address=$_POST['address'];
	$username=$_POST['username'];
	$pass=$_POST['password'];
	
		
       $sql="Insert into reg values('$uid','$name','$email','$contact','$address','$country','$currency',
	                                '$username','$pass')";
	  if(mysqli_query($con,$sql))
	  {
		  echo "<script>alert('Register succesfully');</script>";
		   echo "<script>location.replace('Homepage.php#login')</script>" ;
 
	  }
	  else
	  {
		  echo"<script>alert('Username Available')</script>";
	  }
	 
	}


?>
</form>
    <script>
	 function cntry()
	 {
		 var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      
	  document.getElementById("currency").innerHTML = xhttp.responseText;
    }
  };
  
  var country=document.getElementById("country").value;
  xhttp.open("GET", "code.php?country="+country, true);
  xhttp.send();
	 }
</script>