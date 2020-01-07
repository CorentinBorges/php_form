<?php
$error= false;
$bdd= new PDO('mysql:host=localhost;dbname=form;charset=utf8','root','');
$regex=true;
?>


<?php
if (isset($_POST["submit"]))
{?>
	<div class='alert alert-danger container alert-dismissible fade show' role='alert'> 
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		<span aria-hidden='true'>&times;</span>
 	</button>
 <?php


//Test errors first name
	try
	{
		if(empty($_POST['FName']))
		{
			throw new Exception("You didn't enter a <strong> First Name </strong> </br>");
		}
		else
		{
			if (preg_match('#[^A-Za-zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ -]#', $_POST['FName']) OR preg_match('#\s$|^\s#', $_POST['FName']))
			{
				$regex=false;
				throw new Exception("The <strong> First name </strong> can not have numbers or special characters</br>");
			}
			if (strlen( $_POST['FName'])>38)
			{
				throw new Exception("The <strong>First name</strong> can not have more than 38 characters</br>");
			}
		}			
	}
	catch (Exception $e)
	{
		echo $e->getMessage();
	}


//Test errors last name
	try
	{
		if(empty($_POST['LName']))
		{
			throw new Exception("You didn't enter a <strong> Last Name </strong></br>");
		}
		else
		{
			if (preg_match('#[^A-Za-zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ -]#', $_POST['LName']) OR preg_match('#\s$|^\s#', $_POST['LName']))
			{
				$regex=false;
				throw new Exception("The <strong>Last name</strong> can not have numbers or special characters</br>");
			}
			if (strlen( $_POST['LName'])>38)
			{
				$regex=false;
				throw new Exception("The <strong>Last name</strong> can not have more than 38 characters</br>");
			}
		}
	}
	catch (Exception $e)
	{
		echo $e->getMessage();
	}


//Test errors screen name
	try
	{
		if(empty($_POST['SName']))
		{
			throw new Exception("You didn't enter a <strong> Screen name </strong> </br>");
		}
		else
		{
			if (strlen( $_POST['SName'])>38)
			{
				$regex=false;
				throw new Exception("The <strong>Screen name</strong> can not have more than 38 characters</br>");
			}
			if ( preg_match('#\s$|^\s#', $_POST['SName']))
			{
				$regex=false;
				throw new Exception("The <strong>Screen name</strong> can not finish or begin with a blank</br>");
			}
		}

	}
	catch (Exception $e)
	{
		echo $e->getMessage();
	}

//Test errors password
	/*
	if you wanna change security:
		strlen( $_POST['pass'])<10: true if password have more than 10 characters
		ctype_alnum($_POST['pass']): true if password have just alphanumerics characters
		ctype_punct($_POST['pass']): true if password have just punctuations marks
		ctype_lower($_POST['pass']): true if password have just lower case
		ctype_upper($_POST['pass']): true if password have just upper case
	*/
	try
	{
		if(empty($_POST['pass']))
		{
			throw new Exception("You didn't enter a  <strong> Password </strong> </br>");
		}
		else
		{
			if (strlen( $_POST['pass'])<10 OR ctype_alnum($_POST['pass']) OR ctype_punct($_POST['pass']) OR ctype_lower($_POST['pass']) OR ctype_upper($_POST['pass']))
			{
				$regex=false;
				throw new Exception("The <strong>Password</strong> must have:
					<ul> 
						<li>10 characters minimum</li>
						<li>1 special character at least</li>
						<li>not to be only with ponctuations marks</li>
						<li>upper AND lower cases</li>
					</ul>
						");
				print($_POST["pass"]);
			}

		}
	}
	catch (Exception $e)
	{
		echo $e->getMessage();
	}

		try
	{
		if(empty($_POST['mail']))
		{
			throw new Exception("You didn't enter an  <strong>Email</strong> </br>");
		}

	}
	catch (Exception $e)
	{
		echo $e->getMessage();
	}
	?>
	</div>

	<?php 
	//If they are no errors
	if (!empty($_POST['FName']) AND !empty($_POST['LName']) AND !empty($_POST['SName']) AND !empty($_POST['pass']) AND !empty($_POST['mail'] AND $regex))
	{
		//Add the data to the bdd
		$req= $bdd->prepare("INSERT INTO members(first_name,last_name,screen_name,mail,password) VALUES(?,?,?,?,?)");
		$req->execute(array($_POST['FName'],$_POST['LName'],$_POST['SName'],$_POST['mail'],$_POST['pass']));
		header("Location: registered.php");
		exit;
	}
	?>

	<?php
}
 ?>
