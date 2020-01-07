<?php session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Connexion</title>
		<link href="css/style.css" type="text/css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
	</head>
	<body>

		<?php 
		//Verify mistakes that the user would do when he submits the form
		include("inscription_post.php"); ?>

		<div class="container mt-5" id="form1">
			<form method="post">
				<div class="form-group">
				    <label for="nom">First Name</label>
				    <input class="form-control" id="nom" aria-describedby="FName" name="FName" placeholder="Nicki" value=<?php if (!empty($_POST['FName'])){echo $_POST['FName'];} ?> >
				   
				</div>
				<div class="form-group">
				    <label for="LName">Last Name</label>
				    <input  class="form-control" id="Lname" aria-describedby="Last Name" name="LName" placeholder="Minaj" value=<?php if (!empty($_POST['LName'])){echo $_POST['LName'];} ?>>
				</div>
				<div class="form-group">
				    <label for="SName">Screen Name</label>
				    <input  class="form-control" id="Sname" aria-describedby="Screen Name" name="SName" value=<?php if (!empty($_POST['SName'])){echo $_POST['SName'];} ?>>
				</div>	 	  
				<div class="form-group">
				    <label for="pass">Password</label>
				    <input type="password" class="form-control" id="pass" name="pass" value=<?php if (!empty($_POST['pass'])){echo $_POST['pass'];} ?>>
				     <small id="emailHelp" class="form-text text-muted font-italic">Password must have at least 1 upper-case and 1 lower-case, more than 8 characters and at least 1 punctuation mark.</small>
				</div>
				<div class="form-group">
				    <label for="email">Email</label>
				    <input type="email" class="form-control " id="email" name="mail" placeholder="name@example.com" value=<?php if (!empty($_POST['mail	'])){echo $_POST['mail'];} ?>>
				     <small id="emailHelp" class="form-text text-muted font-italic">We'll never share your email with anyone else.</small>
				</div>
				<div class="submitform">
					<button type="submit" class="btn btn-primary submitButton" name="submit">Submit</button>
				</div>
			</form>
			
		</div>

		



		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>