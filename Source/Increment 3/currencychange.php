<?php
session_start();
$uid= $_SESSION['uid'];
include('menu.php');
include("connect.php");
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
		<td><br><h2 style='color:red'>Currency Change</h2><br>
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
		
		<tr align='center'>
		<td colspan='2'>
        <input type='submit' class="btn btn-danger btn-xl sr-button btn-red" name='sub' value="Submit"><br><br>
		</td>
		</tr>
		</table>
	
	
<?php

function currencyConverter($from_Currency,$to_Currency,$amount) {

$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  
$ch = curl_init();
$from_Currency = urlencode($from_Currency);
$to_Currency = urlencode($to_Currency);
$a=urlencode($amount);
$vars="a=$a&from=$from_Currency&to=$to_Currency";
$url="https://finance.google.com/finance/converter?".$vars;
$get = file_get_contents($url, false, stream_context_create($arrContextOptions));
$get = explode("<span class=bld>",$get);
$get = explode("</span>",$get[1]);
$converted_currency = preg_replace("/[^0-9\.]/", null, $get[0]);
return $converted_currency;
}

		if(isset($_POST['sub']))
		{
			$change=$_POST['currency'];
			$sin="select * from income where uid=$uid";
			$sel=$con->query($sin);
            while($row = mysqli_fetch_assoc($sel))
			{
				$income=$row['amount'];
				$curr=$row['currency'];
				$converted_currency = currencyConverter($curr,$change,$income);
			    $upd="update income set amount='$converted_currency',currency='$change' where amount='$income'";
				if(mysqli_query($con,$upd))
	            {
					
				}
			}
			
			$ex="select * from expense where uid=$uid";
			$se=$con->query($ex);
            while($row1 = mysqli_fetch_assoc($se))
			{
				$expense=$row1['amt'];
				$curr1=$row1['currency'];
				$converted_currency = currencyConverter($curr1,$change,$expense);
			    $upd1="update expense set amt='$converted_currency',currency='$change' where amt='$expense'";
				if(mysqli_query($con,$upd1))
	            {
					
				}
			}
			
			$tex="select * from totalexpense where uid=$uid";
			$tse=$con->query($tex);
            while($row2 = mysqli_fetch_assoc($tse))
			{
				$totalexpense=$row2['expense'];
			
				$converted_currency = currencyConverter($currency,$change,$totalexpense);
			    $up="update totalexpense set expense='$converted_currency' where expense='$totalexpense'";
				if(mysqli_query($con,$up))
	            {
					
				}
			}
			
			$tinc="select * from totalincome where uid=$uid";
			$te=$con->query($tinc);
            while($row3 = mysqli_fetch_assoc($te))
			{
				$totalincome=$row3['income'];
			
				$converted_currency = currencyConverter($currency,$change,$totalincome);
			    $upi="update totalincome set income='$converted_currency' where income='$totalincome'";
				if(mysqli_query($con,$upi))
	            {
					
				}
			}
			
			$reg="select * from reg where uid=$uid";
			$s=$con->query($reg);
            while($rw = mysqli_fetch_assoc($s))
			{
				
			    $upd2="update reg set currency='$change' where uid='$uid'";
				if(mysqli_query($con,$upd2))
	            {
					
				}
			}
			
		}
    ?>
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