<?php
require "functions/connexion.php"; //connexion à la base de donnee

//menu de navigation et les styles-->
include("menu/head.php");
 include("menu/nav.php");

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

    if(!empty($_POST)) 
    {
        $id = checkInput($_POST['id']);
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM reponse WHERE id = ?");
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: notification.php"); 
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>
   
         <section class="container ">
         <div class="container-register">
			<div class="col-md-8 mb-5" style="padding:5rem">
                <form class="login100-form form-group" action="delete.php" role="form" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>"/>
                    <p class="alert alert-warning">Etes vous sur de vouloir supprimer cette annonce ?</p>
                    <div class="form-actions">
					<center>
                      <a class="btn btn-default" href="notification.php">Non</a>                 <button type="submit" class="btn btn-warning">Oui</button>

					  </center>
                    </div>
                </form>
            </div>
            </div>
         
		</section>   
  <!-- Footer et fichier js pour le style-->
   <?php include("menu/scripts.php");?>

   