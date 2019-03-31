<?php 
session_start();
require"functions/connexion.php";

$erreur="";
if(isset($_POST['login']))
{
	//les champs requis pour la connexion
	$mail=$_POST['email'];
	$password= md5($_POST['password']);
	$_SESSION['id']="";
	$_SESSION['firstname']="";
	$_SESSION['lastname']="";
	$_SESSION['email']="";
	$donnee; //variable qui déterminera la connexion du client soit la connexion du professionnel 
	
	$db= Database::connect();//appel à la base de donnee
	$db->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
	//table prestataire: reccuperation des informations 
	$state= $db->prepare("SELECT * FROM prestataire WHERE email= ? AND password= ?");
	$state->execute(array($mail,$password));
	$userExiste= $state->rowCount();
	
//table user: reccuperation des informations 
	$statement= $db->prepare("SELECT * FROM user WHERE email = ? AND password=?");
	$statement->execute(array($mail,$password));
	$user= $statement->rowCount();

	//table client: reccuperation des informations
	$query=$db->prepare("SELECT * FROM client WHERE email=? AND password=?");
	$query->execute(array($mail,$password));
	$userExist= $query->rowCount();

	//cas1: la variable donnee= userExist de la table client
		if($donnee=$userExist)
		 {
			if($donnee==1)
			{
			  $info=$query->fetch();
			  
			  $_SESSION['id'] =$info['client_id'];
			  $_SESSION['firstname']=$info['firstname'];
			  $_SESSION['lastname']=$info['lastname'];
			  $_SESSION['email']=$info['email'];
			  
			}
			header("Location:profile.php");	
		  }
		  else
		   {
			 $erreur="email ou mot de passe incorrect";
			}
		//cas2:la variable donnee = userExiste de la table prestataire
		if($donnee=$userExiste)
		 {
			if($donnee==1)
			{
			  $info=$state->fetch();
			  
			  $_SESSION['id'] =$info['id'];
			  $_SESSION['firstname']=$info['firstname'];
			  $_SESSION['lastname']=$info['lastname'];
			  $_SESSION['email']=$info['email'];
			  
			}
			header("Location:dashboard/dashboard.php");
		  }
		  else
		   {
			 $erreur="email ou mot de passe incorrect";
			}
		//cas3:la variable donnee = user de la table user
	     if($donnee=$user)
		{
			if($donnee==1)
			{
			  $info=$statement->fetch();			  
			  $_SESSION['id'] = $info['id'];
			  
			  }
			header("Location:janux/index.php");
		  }
		else
		{
			$erreur="email ou mot de passe incorrect";
		}
   }
?>

