
<?php
require "functions/connexion.php";

 
 
  ?>
<?php include("menu/head.php");?>
<?php include("menu/nav.php");
if(isset($_SESSION['id']) AND !empty($_SESSION['id']))
{
	?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Vos annonces</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    	<th>Sujet</th>
                                    	<th>Ecrire par</th>
                                    	<th>Publier le</th>
                                    	
                                    </thead>
                                    <tbody>

	<?php
		$db=Database::connect();
		
		$db->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);

		$query=$db->query("SELECT message.id, message.sujet,message.destinataire,message.expediteur_firstname,message.expediteur_lastname,
		message.date_envoie,
		message.expediteur_id,client.client_id
		FROM message
		INNER JOIN client ON client.client_id = message.expediteur_id 
		WHERE message.destinataire ='{$_SESSION['firstname']}' ORDER BY message.date_envoie
		DESC");
		Database::disconnect();


	while($item=$query->fetch())
		
		{
	?>	

                                        <tr>
                                        	<td><?php echo $item['sujet']?></td>
                                        	<td><?php echo $item['expediteur_firstname']?></td>
                                        	<td><?php echo $item['date_envoie']?></td>
                                        	<td><a class="btn btn-primary" href="message.php?id=<?php echo $item['id']?>">Afficher</a></td>
											<td><a  href="delete.php?id=<?php echo $item['id']?>" class="btn btn-danger">Réfuser</a></td>
                                        </tr>
 <?php
    }
	?>
                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Contacts</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Nom</th>
                                    	<th>Mail</th>
                                    	<th>Adresse</th>
                                    	<th>Telephone</th>
                                    </thead>
                                    <tbody>
	 <?php
		$db=Database::connect();
		$query=$db->query("SELECT client.client_id, client.firstname,client.phone,client.lastname,client.email,client.adresse,
		message.expediteur_id,message.date_envoie
		FROM client
		INNER JOIN message ON message.expediteur_id = client.client_id
		WHERE message.destinataire ='{$_SESSION['firstname']}' ORDER BY message.date_envoie
		DESC");
		Database::disconnect();
		$msg= $query->rowCount();
			if($msg == 0)
			{
				echo"<h4 class='text-danger'> Vous n'avez aucune annonce </h4>";
			}
	while($item=$query->fetch())
		
	{

    ?>	
    
									
                                        <tr>
                                        	<td><?php echo $item['firstname']." ".$item['lastname']?></td>
                                        	<td><?php echo $item['email']?></td>
                                        	<td><?php echo $item['adresse']?></td>
                                        	<td><?php echo $item['phone']?></td>
                                        </tr>
  <?php }
}
else
{
	echo "<script language='javascript'> document.location.href='../index.php';</script>";
}
 ?>
                                      
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        

    </div>
</div>


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


</html>
