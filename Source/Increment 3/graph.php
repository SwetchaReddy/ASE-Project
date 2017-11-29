<?php
session_start();
$uid= $_SESSION['uid'];
include('menu.php');
include("connect.php");
?><br><br><br><br></br></br>
<body style="position:relative;width:100%;min-height:auto;text-align:center;color:#fff;background-image:url(img/header.jpg);background-position:center;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover">
<center><h2>Income-Expense Curve</h2></center><br>
<form method="POST">
<div class="container bg-dark" style='border:0px solid grey;width:50%;'>
<table border='0' align='center' width='50%'>

<tr align='center'> 
<td>       
<label>Month</label><br><br>
</td>
<td>
<select class="form-control" type="text" name='month' required>
<?php if (isset($_POST['month']))
 {
	  echo "<option>".$_POST['month']."</option>";
  
 }
 else
 {
  
  
    }
 ?>
<option value=''>--Select Month--</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
</select><br><br>
</td>
</tr>
<tr align='center'>
<td>
<label>Year</label><br><br>
</td>
<td>
<input type="text" name='year' class="form-control" value="<?php if (isset($_POST['year'])) { echo $_POST['year']; }  ?>" required><br><br> 
</td>
</tr>
<tr align='center'>
<td colspan='2'>
<input type="submit" class="btn btn-danger " name='submit' value="Search">
</td>
</tr>
</div>
<?php
  
  if(isset($_POST['submit']))
  {
	  $sq="Delete from temp";
			        if(mysqli_query($con,$sq))
	                {
					   
		            }
	  
	  $month=$_POST['month'];
	  $year=$_POST['year'];
	   for ($i = 1; $i <= 31; $i++)
        {
	        $sel="SELECT * FROM income WHERE DAY(date)= $i and MONTH(date) = $month and YEAR(date)=$year";
	        $res=$con->query($sel);
            if(mysqli_num_rows($res)!= 0)
            {
				$r=mysqli_fetch_array($res);
					
				  $date=$r['date'];
	              $income=$r['amount'];
                }
			
			else
			{
				$income='0';
			}
			
			$sel1="SELECT * FROM expense where DAY(date)= $i and MONTH(date)= $month and YEAR(date)=$year";
	        $res1=$con->query($sel1);
            if(mysqli_num_rows($res1)!= 0)
            {
				$ro=mysqli_fetch_array($res1);
					
				$date1=$ro['date'];
	            $expense=$ro['amt'];
				
				}
           
			else
			{
				$expense='0';
			}
			
			$sql1="insert into temp values('$i','$month','$year','-','-','$income','$expense')";
			        if(mysqli_query($con,$sql1))
	                {
					   
		            }
			
		}
		
		echo "<script>window.location.href='samplechart.php'</script>";
	   }
   