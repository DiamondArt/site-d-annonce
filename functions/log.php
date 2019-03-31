<?php
session_start();
require"functions/connexion.php";

$erreur="";
if(isset($_POST['login']))
{
	//les champs requis pour la connexion
	$mail=$_POST['email'];
	$password= md5($_POST['password']);

	//table client: reccuperation des informations
	$db= Database::connect();//appel à la base de donnee
	$query=$db->prepare("SELECT * FROM client WHERE email=? AND password=?");
	$query->execute(array($mail,$password));
	$userExist= $query->rowCount();
		if($userExist==1)
		{
	       $info= $query-> fetch();
			  
			  $_SESSION['id'] =$info['client_id'];
			  $_SESSION['firstname']=$info['firstname'];
			  $_SESSION['email']=$info['email'];
			  $_SESSION['avatar']=$info['avatar'];
				print_r	($_SESSION);
				}
			else
				$erreur="mot de passe ou email incorrect";
}
?>