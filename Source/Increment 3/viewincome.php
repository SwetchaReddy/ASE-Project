<?php
session_start();
$uid= $_SESSION['uid'];
include("menu.php");
include("connect.php");
?><br><br><br><br></br></br>
<body style="position:relative;width:100%;min-height:auto;text-align:center;color:#fff;background-image:url(img/header.jpg);background-position:center;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover">

<form method="POST">
<br><br>
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
<input type="text" name='year' class="form-control"  value="<?php if (isset($_POST['year'])) { echo $_POST['year']; }  ?>" required><br><br> 
</td>
</tr>
<tr align='center'>
<td colspan='2'>
<input type="submit" class="btn btn-danger " name='search' value="Search">
</td>
</tr>
</div>
<?php
if(isset($_POST['search']))
  {
	  $month=$_POST['month'];
	  $year=$_POST['year'];
	  
	  echo "<script>document.getElementById('income').style.display='none';</script>";
	  
	  $sel="SELECT * FROM income WHERE MONTH(date) = $month and YEAR(date)=$year";
	  $res=$con->query($sel);
 if(mysqli_num_rows($res)== 0)
  {
	  echo "<table align='center'><tr align='center'><td style='color:red'><b>No data found</b></td></tr></table>";
  }
  else
  {
echo "<div id='income1'><table align='center' width='90%' class='table'>
<h2><center><u>Selected Income Details</u></center></h2>
<tr><td align='center' class='style2'><b>TransactionID</b></td>
<td align='center' class='style2'><b>UserId</b></td>
<td align='center'><b>Currency</b></td>
<td align='center' class='style2'><b>Amount</b></td>
<td align='center' class='style2'><b>Source</b></td>
<td align='center' class='style2'><b>Date</b></td></tr>
";
while($row=$res->fetch_assoc())
{
	echo "<tr align='center'><td class='style1' width='15%'><b>".$row['tid']."</b></td>
	
	<td class='style1' width='15%'><b>".$row['uid']."</b></td>
	<td class='style1' width='15%'><b>".$row['currency']."</b></td>
	<td class='style1' width='15%'><b>".$row['amount']."</b></td>
	<td class='style1' width='15%'><b>".$row['source']."</b></td>
	<td class='style1' width='15%'><b>".$row['date']."</b></td>
	</tr>";
}
echo "</table></div></center><br><br>";
  }
  }
  
$sel="Select * from income where uid='$uid'";
$res=$con->query($sel);
 if(mysqli_num_rows($res)== 0)
  {
	  echo "<table align='center'><tr align='center'><td style='color:red'><b>No data found</b></td></tr></table>";
  }
  else
  {
echo "<div id='income'><table align='center'  style='width:50%' class='table '>
<h2 align='center' style='color:white'><center><u>Income Details</u></center></h2>
<tr><td align='center'><b>TransactionID</b></td>
<td align='center'><b>UserId</b></td>
<td align='center'><b>Currency</b></td>
<td align='center'><b>Amount</b></td>
<td align='center'><b>Source</b></td>
<td align='center'><b>Date</b></td></tr>
";
while($row=$res->fetch_assoc())
{
	echo "<tr align='center'><td class='style1' width='15%'><b>".$row['tid']."</b></td>
	
	<td class='style1' width='15%'><b>".$row['uid']."</b></td>
	<td class='style1' width='15%'><b>".$row['currency']."</b></td>
	<td class='style1' width='15%'><b>".$row['amount']."</b></td>
	<td class='style1' width='15%'><b>".$row['source']."</b></td>
	<td class='style1' width='15%'><b>".$row['date']."</b></td>
	</tr>";
}
echo "</table></div></center><br><br>";
  }
  
  
  
?>
</table>
</form>