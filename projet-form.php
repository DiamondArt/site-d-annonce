<?php 
require "functions/connexion.php"; //connexion à la base de donnee

//menu de navigation et les styles-->
include("menu/head.php");
include("menu/header-deux.php");
$titre=$message=$fichier=$fichierError =$destinataire_id=$titreErreur=$messageErreur=$erreur="";

 if(isset($_SESSION['id']) AND !empty($_SESSION['id']))// la session en cours
 {
	if(isset($_GET['firstname']) && !empty($_GET['firstname'])) // nom du profesionnel
	{
		$destinataire= $_GET['firstname'];

	   if(isset($_POST['submit']))
		{
			$titre= test_input($_POST['titre']);
			$message= test_input($_POST['message']);
			$fichier= test_input($_FILES['fichier']['name']);
			$fichierPath = 'upload/'.basename($fichier);
			$fichierExtension =pathinfo($fichierPath,PATHINFO_EXTENSION);
			$success= true;
			
			if(empty($titre))
			{
				$titreErreur="Donner un titre à votre requete";
				$success= false;
			}
			if(empty($message))
			{
				$messageErreur="Rédiger votre message";
				$success= false;
			}	
			if(empty($fichier))
			{
				$fichierSuccess= false;
			}
			else
			{
				$fichierSuccess=true;
				$fichierUploard= true;
			}
			if($fichierExtension != "zip" && $fichierExtension != ".rar" ) //fichier zip et rar uniquement autorisés
					{
                $fichierError = "Les fichiers autorisés sont: .zip , .rar";
                $fichierUploard = false;
            }
			if($_FILES["fichier"]["size"] > 500000) //taille du fichier de 500kb
            {
                $fichierError = "Le fichier ne doit pas dépasser les 500KB";
                $fichierUploard = false;
            }
			
			if($fichierUploard) //erreur lors de l'upload
            {
                if(!move_uploaded_file($_FILES["fichier"]["tmp_name"], $fichierPath)) 
                {
                    $fichierError = "Il y a eu une erreur lors de l'upload";
                    $fichierUploard = false;
                } 
            }
			if (($success && $fichierSuccess && $fichierUploard) || ($success && !$fichierSuccess)) //si le titre,le message et le fichier existent insertion dans la bdd
           
		   {      	
		      $db = Database::connect();
             if($fichierSuccess)
				{
					$db->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
					 $statement=$db->prepare("INSERT INTO message (expediteur_id,expediteur_firstname, destinataire, sujet,corps,fichier,date_envoie) values (?,?,?,?,?,?,?)");
					 $statement->execute(array($_SESSION['id'],$_SESSION['firstname'],$destinataire,$titre,$message,$fichier,date('y-m-d:H:i:s')));	
				}
				else // sinon : insertion du titre,du message et de la date d'envoie
						{
						   $db->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
							 $statement=$db->prepare("INSERT INTO message (expediteur_id,expediteur_firstname,destinataire, sujet,corps,date_envoie) values (?,?,?,?,?,?)");
							$statement->execute(array($_SESSION['id'],$_SESSION['firstname'],
							$destinataire,$titre,$message,date('y-m-d:H:i:s')));
						  }
		   Database::disconnect();
		   $erreur="message envoyer";
	  }
    }
  }
  else 
   {
	header("location:profile.php");
   }
 } 
else //  cas où l'utilisateur est arrivé sur cette page par erreur
header("location:index.php");
	
		function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

  
	 </br>
<!--section du formulaire pour soumission de projet-->
<section class="container " >
 <center>
  <div class="container-register">
    <form class="login100-form form-group" action="" method="POST" enctype="multipart/form-data">
	 <div class="info mb-3">
	 <i class="help-inline text-success"><?php echo $erreur;?></i>
	<i class="help-inline text-info"> <b class="text-danger">info : </b>en cas d'envoie de fichier,veuillez mettre tous vos fichiers (images, pdf...) dans un fichier zip!</i>
	 </div>
	 
				<div> <p>Envoie d'annonce à Mr (Mme): <b><?php echo strtoupper( $destinataire);?></b></p> </div>
							<div class="wrap-input100 input-group">
						     <input class="form-control" type="text" name="titre" id="titre" placeholder="donner un titre à votre projet" >
							  <i class="help-inline text-danger"><?php echo $titreErreur;?></i>
					         </div>
							  <div class="wrap-input100 input-group" >
						        <textarea rows="5" cols="60" class="form-control"
								name="message" id="message" placeholder="rédiger ici votre demande">
					            </textarea>
								<i class="help-inline text-danger"><?php echo $messageErreur;?></i>
					            </div>
								<div class="wrap-input100 input-group">
							    <span class="input-group-prepend"> 
								<label class="custom-file-label">Click here to choose file</label>
						          <input class="custom-file-input form-control mb-3" type="file" name="fichier" id="fichier" accept=".zip">
					             </div> <i class="help-inline text-danger"><?php echo $fichierError;?></i>
							    <div class="wrap-input100">
					         	  <input type="submit" class="btn-lg btn-block btn-primary form-control mb-3" name="submit" value="envoyer">
								  
								  <a href="profile.php" class="btn-lg btn-block btn-primary form-control">Retour</a>
					   </div>
				   </form>
		  		</div>
			</center>
        </section>
    </br>

     <!-- Footer et fichier js pour le style-->
   <?php include("menu/footer.php");?>
   <?php include("menu/scripts.php");?>

   