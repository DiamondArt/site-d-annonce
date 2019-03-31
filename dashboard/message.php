<?php 
require "functions/connexion.php"; //connexion à la base de donnee

//menu de navigation et les styles-->
include("menu/head.php");
 include("menu/nav.php");
 
if(isset($_SESSION['id']) AND !empty($_SESSION['id']))
{
	$db=Database::connect();
	$query=$db->query("SELECT message.id, message.sujet,message.destinataire,message.expediteur_firstname,message.expediteur_lastname,
	message.date_envoie,message.corps,message.fichier,
	message.expediteur_id,client.client_id
	FROM message
	INNER JOIN client ON client.client_id = message.expediteur_id 
	WHERE message.id ='{$_GET['id']}' AND message.destinataire='{$_SESSION['firstname']}' ");
	$item=$query->fetch();

?>

  
	 </br>
<!--section du formulaire pour soumission de projet-->
 <section class="container " >
 <center>
  <div class="">
    <form class=" form-group" action="" method="POST" enctype="multipart/form-data">
	
			
				<div class="row">
				<div class="messge-form col-md-7">
				<div class="mb-5"> <p><label class="text-info">Envoyer par Mr(Mme): </label> <b>
				<?php echo strtoupper($item['expediteur_firstname']);?>
				</b></p> </div>
					<div class="input-group">
					 <p>
						<label class="text-info">le: <?php echo date('d/m/Y à H:i:s',strtotime($item['date_envoie']));?></label>
						</p>
					       </div>
						   <div class="input-group">
						    <p>
							<label class="text-info">Sujet:&nbsp;&nbsp;&nbsp;</label>
							<?php echo $item['sujet'];?></p>
					       </div>
							 <div class=" input-group">
							
							   <b class="text-info">Corps du message</b>
							   <br/>
							   <br/>
						          <textarea disabled rows="5"  cols="60" class="form-control"
								   name="message" id="message">
								  <?php echo $item['corps'];?>
					               </textarea>
					            </div>
								<br/>
							  <button class="btn-primary pull-right "> <a href="answer.php?id=<?php echo $_GET['id'];?>">Répondre</a></button>
						    </div>
							<p class="col-md-2">
								<a class="text-warning" target="_blank" href="../upload/<?php echo $item['fichier'];?>"> pièce jointe</a>
							</p>
							
						</div>
				   </form>
		  		</div>
			</center>
        </section>
    </br>
 <?php
	Database::disconnect();

 }
else
{
	header("location:../index.php");
}
?>
</body>
   <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
