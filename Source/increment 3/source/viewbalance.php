<?php
session_start();
$uid= $_SESSION['uid'];
include('menu.php');
include("connect.php");
?><br><br></br></br><br>
<body style="position:relative;width:100%;min-height:auto;text-align:center;color:#fff;background-image:url(img/header.jpg);background-position:center;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover">

<form method="POST">
<h2><center>Saving Details</center></h2><br>
<div class="container bg-dark" style='border:0px solid grey;width:50%;'>
<table border='0' align='center' width='50%'>

<tr align='center'> 
<td>       
<label>Month</label><br>
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
</select><br>
</td>
</tr>
<tr align='center'>
<td>
<label>Year</label><br>
</td>
<td>
<input type="text" name='year' class="form-control" value="<?php if (isset($_POST['year'])) { echo $_POST['year']; }  ?>" required><br> 
</td>
</tr>
<tr align='center'>
<td colspan='2'>
<input type="submit" class="btn btn-danger " name='search' value="Search"><br><br>
</td>
</tr>
</div>

<?php
 if(isset($_POST['search']))
  {
	  $month=$_POST['month'];
	  $year=$_POST['year'];
	  $sel="SELECT * FROM totalincome WHERE month = $month and year=$year";
	  $res=$con->query($sel);
	  if(mysqli_num_rows($res)== 0)
		  {
			  		  
		  }
		  else
		  {
			  $row=$res->fetch_assoc();
			  $income=$row['income'];
		  }
		  
		  $sel1="SELECT * FROM totalexpense WHERE month = $month and year=$year";
	  $res1=$con->query($sel1);
	  if(mysqli_num_rows($res1)== 0)
		  {
			  		  
		  }
		  else
		  {
			  $row1=$res1->fetch_assoc();
			  $expense=$row1['expense'];
		  }
		  
		  $balance=$income-$expense;
		  
	echo"
<div class='container bg-dark' style='border:0px solid grey;width:50%;'>
<table border='0' align='center' width='50%'>

<tr align='center'> 
<td>       
<label>Total Income</label><br>
</td>
<td>
<input class='form-control' type='text' name='income' value='$income' readonly><br>
</td>
</tr>

<tr align='center'>
<td>
<label>Total Expense</label><br>
</td>
<td>
<input type='text' name='expense' class='form-control' value='$expense' readonly><br> 
</td>
</tr>

<tr align='center'>
<td>
<label>Savings</label><br>
</td>
<td>
<input type='text' name='balance' class='form-control' value='$balance' readonly><br> 
</td>
</tr>

</table>
</div>";
  }
?>