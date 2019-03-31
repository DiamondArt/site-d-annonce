<?php include("menu/head.php");?>
<?php include("menu/nav.php");
 ?>
 <?php
require "functions/connexion.php";
$db= Database::connect();
$db->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);

if(isset($_SESSION['id']) AND !empty($_SESSION['id']))
{
		$query=$db->prepare("SELECT * FROM reponse
		WHERE reponse.id_destinataire = ? ORDER BY reponse.date_envoie DESC");
		$query->execute(array($_SESSION['id']));
		$nbre_msg= $query->rowCount();
	
?>	

 <div class="content">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Vos notifications</h4>
              
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    	<th>Sujet</th>
                                    	<th>Ecrire par</th>
                                    	<th>Publier le</th>
                                    	
                                    </thead>
                                    <tbody>
<?php

if( $nbre_msg != 0)
	{
	 while($item=$query->fetch())
		{
      ?>                                  <tr>
                                        	<td><?php echo $item['sujet']?></td>
                                        	<td><?php echo $item['expediteur']?></td>
                                        	<td><?php echo $item['date_envoie']?></td>
                                        	<td><a class="btn btn-primary" href="resp.php?id=<?php echo $item['id']?>">Afficher</a></td>
											<td><a  href="delet.php?id=<?php echo $item['id']?>" class="btn btn-danger">supprimer</a></td>
                                        </tr>
<?php
 }
}
	else
	{
		echo "<h5 class='text-info'>Vous n'avez pas de notification</h5>";
	 }
}

else
	{
	echo "<script  text/javascript>document.location.href='../index.php';</script>";}
 Database::disconnect();

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
