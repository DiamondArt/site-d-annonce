<?php
// update-info 
require "functions/update-info.php";
?>

<!-- menu de navigation et les styles -->
<?php include("menu/head.php");?>
<?php include("menu/header-deux.php");?>
<!-- modification du profile -->
<section class="pro-section container">
 <center>
  <div class="form-row"> 
	<div class="description col-lg-12"> 
	  <form action="<?php echo 'modifie-profile.php?id='.$id;?>" method="POST" class="form-group" enctype="multipart/form-data">
		 <div class="wrap-input100 input-group">
          <img class="img-fluid rounded-circle mb-3" width="250" src="avatar/<?php echo $image;?>" alt="">
		  <div class="input-file">
		   <input type="file"  name="image" id="image">
		   </div>
			 </div>
		  	  	<div class="col-lg-3 pro-profile mb-3">
                 <i class="help-inline text-success"><?php echo $imageError;?></i>
		          <div class="wrap-input100  input-group">
		         <i class="input-group-text text-info">nom</i>
			 <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $firstname;?>">
		  </div>
		  <i class="help-inline text-success"><?php echo $firstnameError;?></i>
	     <div class="wrap-input100 input-group ">
	  <i class="input-group-text text-info">prenoms</i>
	 <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $lastname;?>">
	  </div>
		 <i class="help-inline text-success"><?php echo $lastnameError;?></i>
		    <div class="wrap-input100 input-group">
			  <i class="input-group-text text-info">email:</i>
			   <input type="email" name="email" class="form-control" id="email" value="<?php echo $email;?>">
		      </div>
	    	<i class="help-inline text-success"><?php echo $emailError;?></i>
	     <div class="wrap-input100 input-group">
	   <i class="input-group-text text-info">adresse:</i>
	<input type="text" name="adresse" class="form-control" id="adresse" value="<?php echo $adresse;?>">
	</div>
	<i class="help-inline text-success"><?php echo $adresseError;?></i>
	 <div class="wrap-input100 input-group">
		<i class="input-group-text text-info">adresse postale:</i>
		   <input type="text" name="cartepostale" class="form-control" id="cartepostale" value="<?php echo $cartepostale;?>">
			</div>
			  <i class="help-inline text-success"><?php echo $cartepostaleError;?></i>
		        <div class="wrap-input100 input-group">
		      <i class="input-group-text text-info">phone:</i>
			 <input type="tel" name="phone" class="form-control" id="phone"value="<?php echo $phone;?>" > 
		</div>
	    <i class="help-inline text-success"><?php echo $phoneError;?></i>
		 </div>
		    <div class="send-project">
		      <input type="submit" class="btn btn-primary btn-lg" name="modifie" value="Modifier">
		   </div>	
		  <i class="help-inline text-success"><?php echo $erreur;?></i>
		 <a href="profile.php" class="help-inline text-info">retour</a>
        </form>		
	  </div>
     </div> 
   </center>
 </section>
  <br/>
<br/>
	
    <!-- footer et fichier js pour le style -->
<?php include("menu/footer.php");?>
<?php include("menu/scripts.php");?>
