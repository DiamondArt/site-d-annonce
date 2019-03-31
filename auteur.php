<!--menu de navigation et les styles-->
<?php
    require 'functions/connexion.php';

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    
     
   
    $db = Database::connect();
    $query=$db->prepare(" SELECT * FROM prestataire WHERE prestataire.id = ?");
    $query->execute(array($id));
    $donnee=$query->fetch();
	$firstname 	  =    $donnee['firstname'];
	$lastname	  =    $donnee['lastname'];
	$email 		  =    $donnee['email'];
	$adresse	  =    $donnee['adresse'];
	$cartepostale =    $donnee['postal'];
	$phone        =    $donnee['phone'];
	$profession   =    $donnee['profession'];
	$image        =    $donnee['avatar'];
	$specialite_un=$donnee['specialite_un'];
	$specialite_deux=$donnee['specialite_deux'];
	$specialite_trois=$donnee['specialite_trois'];
	$specialite_quatre=$donnee['specialite_quatre'];
	$about=$donnee['about'];
	Database::disconnect();
	}
	else
		header("location:index.php");
	
	function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
	






?>
<?php include("menu/head.php");?>
<?php include("menu/header-deux.php");?>

<!--affichage d'un professionnel-->

 <section class="pro-section container">
 <center>
    <div class="row">
	    <div class="col-lg-3 pro-profile">
		<img class="img-fluid rounded-circle mb-3" src="<?php echo "avatar/".$image;?>" alt="">
		<h6 class="mb-5"><?php echo $firstname.' '.$lastname;?></h6>
		<p> <?php echo $adresse;?></p>
		<p><?php echo $email;?></p>
		<p> <?php echo $phone;?></a>
		<h4 class="mb-5"><?php echo $profession;?></h4>
		</div>
		<div class="description col-lg-9">
		<h4 class="mb-3">specialistés</h4>
		
		<p><?php echo $specialite_un;?></p>
		<p><?php echo $specialite_deux;?><p>
		<p><?php echo $specialite_trois;?><p>
		<p><?php echo $specialite_quatre;?></p>
		
		<p><?php echo $about;?></p>
		
		<div class="send-project">
		<a href="projet-form.php?firstname=<?php echo $firstname;?>" class="btn btn-primary btn-lg ">Send project</a>
		</div>		
		<a href="profile.php">retour</a>
	  </div>
   </div> 
   </center>
</section>
<br/>
<br/>

    <!-- footer et fichier js pour le style -->
<?php include("menu/footer.php");?>
<?php include("menu/scripts.php");?>
