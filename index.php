<?php

	session_start();

	require_once 'token.php';


		if (isset($_POST['product'],$_POST['quantity'])) {
			$product = $_POST['product'];
			$quantity = $_POST['quantity'];
			$csrf_token = $_POST['csrf-token'];

			if (!empty($product) && !empty($quantity) && !empty($csrf_token)) {
				if(Token::check($csrf_token)){
					echo "<div class=\"alert alert-success\" role=\"alert\">You have successfully ordered  $product
						<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
							<span aria-hidden=\"true\">&times;</span>
  						</button>
					</div>";
					
				}
				else{
					echo "<div class=\"alert alert-danger\" role=\"alert\">ERROR
						<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
							<span aria-hidden=\"true\">&times;</span>
  						</button>
					</div>";
				}
			}
		}
	?>
<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css">

    <title>Assignment 2</title>
	
</head>
<body>
	<div class="container" style="padding-top: 5%">
		<div class="card border-secondary" style="width: 18rem">
			<div class="card-body text-secondary">
				<?php		

					if (session_id() == '' || !isset($_SESSION['username'])) { //if session-id exists and login for session-id exists
			    ?>
			    <a href="./login.php">Login</a>
			    <hr>

			    <?php
			       } 
			       else {
			         echo $_SESSION['username'];
			    ?>

			    <a href="./logout.php">Logout</a>
			    <hr>
			    	
				<form action="" method="POST">
					<strong>Place an order</strong><br><br>
					
					Product   <br><input name="product"><br>
			      	Quantity  <br><input name="quantity"><br>
			      	<input type="hidden" name="csrf-token" id="csrf-token" value="" > <br>
			      	<input type="submit" value="Order" class="btn btn-secondary">
					
				</form>

				<?php 
			      }
			    ?>
			</div>
		</div>

	</div>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="./function.js"></script>

</body>
</html>