<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
if(isset($_POST['done'])){
    $mysqli = new mysqli('localhost','id15114221_testdb','Yeet!2345432!','id15114221_clientdata') or die(mysql_error($mysqli));

    // mysqli_autocommit($mysqli,FALSE);
    
    $transfer_from = $_POST['transfer_from'];
    $transfer_to = $_POST['transfer_to'];
    $transfer_amount = $_POST['transfer_amount'];
    date_default_timezone_set('Asia/Kolkata');
    $date = date("d-m-Y H:i");
    $check_balance = "SELECT Amount FROM Client_Data WHERE Name='$transfer_from'";
    $query_check = mysqli_query($mysqli,$check_balance);
    $res=mysqli_fetch_array($query_check);
    $res1=$res['Amount'];
   
    if($res1 > $transfer_amount){
    $q = "INSERT INTO transaction_hist (`transfer_from`, `transfer_to`, `date`, `transfer_amount`) VALUES ('".$transfer_from."','".$transfer_to."',STR_TO_DATE('".$date."','%d-%m-%Y %H:%i'),".$transfer_amount."); ";

    $update_from = "UPDATE Client_Data SET Amount = Amount - '".$transfer_amount."' WHERE Name = '".$transfer_from."'; ";
	$update_to = "UPDATE Client_Data SET Amount = Amount + '".$transfer_amount."' WHERE Name = '".$transfer_to."'; ";
	
	$query = mysqli_query($mysqli,$q) or die(mysqli_error($mysqli));
    $query_from = mysqli_query($mysqli,$update_from) or die(mysqli_error($mysqli));
	$query_to = mysqli_query($mysqli,$update_to) or die(mysqli_error($mysqli));



    if($query){
    	header("location:history.php");
        echo '<script type="text/JavaScript"> alert("Money Transfered Successfully.."); </script>';
		echo '<meta http-equiv="refresh" content="0">';
    } else{
        echo '<script type="text/JavaScript"> alert("Transfered Failed.."); </script>';
        echo '<meta http-equiv="refresh" content="0">';
    }
	}
 else{
    echo '<script type="text/JavaScript"> alert("Insufficient Balance.."); </script>';
    echo '<meta http-equiv="refresh" content="0">';
	}
}
?>

<!DOCTYPE html>
<html lang = "en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="BBS.css">
<title>Basic Banking System</title>
</head>
<body>
	<header>
		<div class="heading">
			<h1>Transfer Money</h1>
			<div class="pages">
				<div><a href="home.html">Home </a></div>
				<div><a href="cust_info.php"> Customer Details</a></div>
				<div><a href="history.php"> Transaction History</a></div>			
			</div>
		</div>
	</header>
	<main>
		<div class="container">
			<form class="form-horizontal" method="POST" >
				<div class="form-group">
					<label class="control-label col"> From </label>
					<div class="col">
			            <select class="select" name="transfer_from" required>
				            <option disabled selected>-- Select Customer --</option>
				            <?php
								include 'conn.php';  
				                $names = mysqli_query($conn, "SELECT Name From Client_Data");   

				                while($data = mysqli_fetch_array($names))
				                {
				                    echo "<option value='". $data['Name'] ."'>" .$data['Name'] ."</option>";  
				                }	
				            ?>  
			            </select>
		            </div>		    
	        	</div>
	        	<div class="form-group">
	        		<label class="control-label col"> To </label>
	        		<div class="col">
			            <select class="select" name="transfer_to" required>
				            <option disabled selected>-- Select Customer --</option>
				            <?php
				                include 'conn.php';  
				                $records = mysqli_query($conn, "SELECT Name From Client_Data");  

				                while($data = mysqli_fetch_array($records))
				                {
				                    echo "<option value='". $data['Name'] ."'>" .$data['Name'] ."</option>";
				                }	
				            ?> 
			            </select>
		            </div>		 
	        	</div>
	        	<div class="form-group">
		            <label class="control-label col"> Amount </label>
		            <div class="col">
		            	<input class="input1" type="text" name="transfer_amount" placeholder="Amount" required>
		        	</div>
		        </div>
	            <br> <br> <br>
	            <input class="btn btn-success" type="submit" name="done" value="Transfer">
	            <input class="btn btn-danger" type="reset" name="reset" value="Reset">
    		</form> 
		</div>
	</main>
	<footer>
		<div class="footer">
			<div><h4>By Siddhesh Kamble</h4></div>
			<div><p>Contact: siddhesh.kamble9797@gmail.com</p></div>
			<div><a href="https://www.linkedin.com/in/siddhesh-kamble-53b6ba1b5/" class="fa fa-linkedin"></a></div>
		</div>
	</footer>
</body>
</html>