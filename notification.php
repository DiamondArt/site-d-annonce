<?php
require "functions/connexion.php";
include("menu/head.php");
include("menu/nav.php");

?>

	<br/>
  <br/>
<br/>
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
$db= Database::connect();
$db->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
if(isset($_SESSION['id']) AND !empty($_SESSION['id']))
{
		$query=$db->prepare("SELECT * FROM reponse
		WHERE reponse.id_destinataire = ? ORDER BY reponse.date_envoie DESC");
		$query->execute(array($_SESSION['id']));
		$nbre_msg= $query->rowCount();
	if( $nbre_msg != 0)
	{
	 while($item=$query->fetch())
		{
?>	

                                        <tr>
                                        	<td><?php echo $item['sujet']?></td>
                                        	<td><?php echo $item['expediteur']?></td>
                                        	<td><?php echo $item['date_envoie']?></td>
                                        	<td><a class="btn btn-primary" href="resp.php?id=<?php echo $item['id']?>">Afficher</a></td>
											<td><a  href="delete.php?id=<?php echo $item['id']?>" class="btn btn-danger">supprimer</a></td>
                                        </tr>
<?php
 }
}
	else
	{
		echo "<h5 class='text-info'>Vous n'avez pas de notification</h5>";
	 }
}
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
<?php
 include("menu/scripts.php");?>
