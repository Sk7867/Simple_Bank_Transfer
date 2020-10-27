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
		<div><h1>Simple Banking System</h1></div>
			<div class="pages">
				<div><a href="home.html">Home </a></div>
				<div><a href="transfer.php"> Transfer Money</a></div>
				<div><a href="history.php"> Transaction History</a></div>			
			</div>
	</header>
	<main>
		<div class="container">
			<?php 
				$mysqli = new mysqli('localhost','id15114221_testdb','Yeet!2345432!','id15114221_clientdata') or die(mysql_error($mysqli));
				$result = $mysqli->query("SELECT * FROM Client_Data") or die(mysql_error($mysqli));
			 ?>
			 <div class="row justify-content-center">
			 	<table class="table">
			 		<thead>
			 			<tr>
			 				<th>Account No.</th>
			 				<th>Name</th>
			 				<th>Email Address</th>
			 				<th>Amount</th>
			 				<th>Action</th>
			 			</tr>
			 		</thead>
			<?php 
					while ($row = $result->fetch_assoc()): ?>
						<tr>
							<td><?php echo $row['Account_No.']; ?></td>
							<td><?php echo $row['Name']; ?></td>
							<td><?php echo $row['Email_Address']; ?></td>
							<td><?php echo $row['Amount']; ?></td>
							<td>
								<a href="transfer.php" class= "btn btn-info">Transfer Money</a>
							</td>
						</tr>
						<?php endwhile; ?>
			 	</table>
			 </div>
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