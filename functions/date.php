<?php
//action pour like et dislike
session_start();
require "connexion.php"; //connexion à la base de donnee

  $db= Database::connect();
  $db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if(isset($_GET['t'],$_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id']))
  {
	  $getId = (int) $_GET['id'];
	  $getT = (int) $_GET['t'];

		$check = $db->prepare("SELECT id FROM prestataire WHERE id = ? ");
		$check->execute(array($getId));
		if($check->rowCount()== 1)
		{
			if($getT == 3)
			{
				$check_vue=$db->prepare("SELECT * FROM vue WHERE id_profile=? AND id_client=?");
				$check_vue->execute(array($getId,$_SESSION['id']));
				$item = $check_vue->fetch();
			if($check_vue->rowCount()==1)
			{
				if($item['date_vue'] < (date ($item['date_vue'],strtotime("next day"))))
				{
					$vue_update=$db->prepare("INSERT  INTO vue(id_profile,id_client,date_vue) VALUES (?,?,?)");
				   $vue_update->execute(array($getId,$_SESSION['id'],date("d-m-y H:i:s")));
				 }
			}
				else
				{
				$insert=$db->prepare("INSERT INTO vue (id_profile,id_client,date_vue) VALUES (?,?,?)");
				$insert->execute(array($getId,$_SESSION['id'],date("d-m-y H:i:s")));	
			   }
			
		}
		
		
		   header("Location:../auteur.php?id=".$getId);
	  }
		else
		{
			exit("Erreur fatale!");
		}
  }
  else
		{
			exit("Erreur fatale! revenir a l'accueil");
		}




?>