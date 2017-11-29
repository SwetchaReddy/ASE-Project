<?php
session_start();
$uid= $_SESSION['uid'];
include('menu.php');
include("connect.php");

$var="select max(tid) as max from expense";
	   $res=$con->query($var);
       $row = mysqli_fetch_assoc($res);

	     $tid = $row['max'] + 1;
		 
$sel="select * from reg where uid=$uid";
$sel1=$con->query($sel);
$row1 = mysqli_fetch_assoc($sel1);
$currency=$row1['currency'];		 
?>
<body style="position:relative;width:100%;min-height:auto;text-align:center;color:#fff;background-image:url(img/header.jpg);background-position:center;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover">
<form method="POST">
<center>
     <div id="contact" class="call-to-action " style='width:60%;'>
	 <br><br><br><br><br><br>
      <div class="container bg-dark" style='border:0px solid grey;width:90%;'>
        
		<table border='0' align='center' width='50%'>
		<tr align='center'>
		<td><br><h2 style='color:red'>Add Expense</h2><br>
		</td>
		</tr>
		
		<tr align='left'>
		<td>
		<label>Transaction Id</label>
		</td>
		</tr>
         <tr align='center'>
		<td>		
		<input class="form-control" type='text' name='tid' id='tid' value="<?php echo $tid ?>" readonly><br>
		</td>
		</tr>
		<!--<tr align='left'>
		<td>
		<label>UserId</label>
		</td>
		</tr>
		 <tr align='center'>
		<td>		
		<input class="form-control" type='text' name='uid' value="<?php echo $uid ?>" readonly><br>
		</td>
		</tr>-->
		<tr align='left'>
		<td>
		<label>Amount</label>
		</td>
		</tr>
		<tr align='center'>
		<td>		
		<input class="form-control" type='text' name='amt' pattern="[0-9]*$" title="Plz Enter Valid Amount" required><br>
		</td>
		</tr>

		<tr align='left'>
		<td>
		<label>Source</label>
		</td>
		</tr>
         <tr align='center'>
		<td>		
		<input class="form-control" type='text' name='source' required><br>
		</td>
		</tr>
		
		<tr align='center'>
		<td colspan='2'>
        <input type='submit' class="btn btn-danger btn-xl sr-button btn-red" name='sub' value="Submit"><br><br>
		</td>
		</tr>
      </div>
    </div>
	</center>
	
	<?php


if(isset($_POST['sub']))
{	
     $uid=$uid;
	 $tid=$tid;
	$amt=$_POST['amt'];
	$source=$_POST['source'];
    $date=date('Y-m-d');
	$month = date('m', strtotime($date));
	$year = date('Y', strtotime($date));
		
       $sql="Insert into expense values('$tid','$uid','$amt','$source','$date','$currency')";
	  if(mysqli_query($con,$sql))
	  {
		    $sel="SELECT * FROM totalexpense WHERE month = $month and year=$year";
	        $res=$con->query($sel);
            if(mysqli_num_rows($res)== 0)
           {
			   $sql1="Insert into totalexpense values('$uid',null,'$month','$year','$amt')";
			       if(mysqli_query($con,$sql1))
	                {
					   
		            }
		   }
		   else
		   {
			   $row=$res->fetch_assoc();
			   $expense=$row['expense'];
			   $expense=$amt+$expense;
			   $sql2="update totalexpense set expense='$expense' where month = $month and year=$year";
			       if(mysqli_query($con,$sql2))
	                {
					   
		            }
		   }
		  echo "<script>alert('Expense Added succesfully');</script>";
		  echo "<script>window.location.href='addexpense.php'</script>" ;
 
	  }
	  else
	  {
		  echo"<script>alert('Please Try Again')</script>";
	  }
	 
	}


?>
</form>