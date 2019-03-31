<?php 
require "functions/connexion.php"; //connexion à la base de donnee

//menu de navigation et les styles-->
include("menu/head.php");
include("menu/nav.php");

$db=Database::connect();

$query=$db->prepare("SELECT * FROM reponse
		WHERE reponse.id = ?  AND reponse.id_destinataire= ?");
	$query->execute(array($_GET['id'],$_SESSION['id']));
	$item=$query->fetch()

?>

  
	 </br>
<!--section du formulaire pour soumission de projet-->


<section class="container " >
 <center>
  <div class="container-register">
    <form>
	 <div class="info mb-5"></div>
	 
				<div class="input-group">
				<p> Envoyer par Mr(Mme):&nbsp; <b><?php echo strtoupper( $item['expediteur']);?> </b></p> </div>
				
				<div class="input-group">
					 <p>le:&nbsp;&nbsp;&nbsp;<b> <?php echo date('d/m/Y à H:i:s',strtotime($item['date_envoie']));?></b>
						</p>
					       </div>
							<div class="wrap-input100 input-group">
						<span class="input-group-prepend"></span>
						<span class="input-group-text">SUJET</span>
						     <input disabled class="form-control" type="text" name="titre" id="titre" value="<?php echo $item['sujet'];?>" >
					         </div>
							  <div class="wrap-input100 input-group" >
						        <textarea disabled rows="5" cols="60" class="form-control"
								name="message" id="message" placeholder="rédiger ici votre demande">
								<?php echo $item['message'];?>

					            </textarea>
					            </div>
							    <div class="wrap-input100">
					         	  <a class="btn-lg btn-block btn-primary form-control mb-3" href="msg_rep.php?id=<?php echo $_GET['id'];?>">Répondre</a>
								  
								  <a href="notification.php" class="btn-lg btn-block btn-primary form-control">Retour</a>
					   </div>
				   </form>
		  		</div>
			</center>
        </section>
    </br>



  <!-- Footer et fichier js pour le style-->
   <?php include("menu/footer.php");?>
   <?php include("menu/scripts.php");?>

   