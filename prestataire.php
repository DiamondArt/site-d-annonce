<?php
     
   require "functions/verie-form-deux.php";
?>
<body>
<!--menu de navigation et les styles-->
<?php include("menu/head.php");?>
    <section class="features-icons bg-light text-center container-login100 ">
	 <center>
             <div class="container wrap-login100">  
			 <h3>Inscription<i class="fa fa-user"> </i> </h3>
			  <form action="" method="POST" class="login100-form needs-validation form-group" novalidate >
			      <div class="wrap-input100 input-group">
					   <input class="input form-control" type="text" id="firstname" name="firstname" placeholder="Firstname">
					</div>
					<i class="help-inline text-danger"> <?php echo $firstnameError;?></i>
					<div class="wrap-input100 input-group" >
				       <input class="input form-control" type="text" name="lastname"
					   id="lastname" placeholder="Lastname">
					   </div>
					   <i class="help-inline text-danger"><?php echo $lastnameError;?></i>

					 <div class="wrap-input100 input-group">
						   <input class="input form-control" type="email" name="email" placeholder="email" id="email" >
					     </div>
						  <i class="help-inline text-danger"><?php echo $emailError;?></i>
						 <div class="wrap-input100 input-group">
						     <input class="input form-control" type="password" name="password" placeholder="your password" id="password">
					     </div>		
						 <i class="help-inline text-danger"><?php echo $passwordError;?></i>
						  <div class="wrap-input100 input-group">
					         <input class="input form-control" type="text" name="adresse" id="adresse" placeholder="Adresse">
					        </div>
							<i class="help-inline text-danger"><?php echo $adresseError;?></i>
							<div class="wrap-input100 input-group">
					         <input class="input form-control" type="text" 
							 name="cartepostale" id="cartepostale" placeholder="carte postale">
					        </div>
							<i class="help-inline text-danger"><?php echo$cartepostaleError;?></i>
							<div class="wrap-input100 input-group">
							<span class="input-group-prepend"></span>
							<span class="input-group-text mb-2">+33</span>
							  <input class="input form-control input-medium fh-phone" data-country="FR" type="tel"  name="phone"
							  id="phone" placeholder="phone">
					         </div>
							  <i class="help-inline text-danger"><?php echo $phoneError;?></i>
							  <div class="wrap-input100 input-group">
							  <input class="input form-control " type="text" 
							  name="profession" id="profession" placeholder="profession">
					         </div>
							  <i class="help-inline text-danger"><?php echo $professionError;?></i>
							   <br/>
								<h6  class="mb-5">completez vos savoirs faire <h6>
							 <div class="wrap-input100 input-group">
						       <input class="input form-control" type="text" name="specialite_un" id="specialite_un" placeholder="ex:couture homme">
					         </div> 
							  <div class="wrap-input100 input-group">
						        <input class="input form-control" type="text" name="specialite_deux"  id="specialite_deux"placeholder="ex:couture femme">
					          </div> 
								<div class="wrap-input100 input-group">
						        <input class="input form-control" type="text" name="specialite_trois" id="specialite_trois" placeholder="ex:couture enfant"value="<?php echo $specialite_trois;?>">
					            </div>
								<div class="wrap-input100 input-group">
						        <input class="input form-control" type="text" name="specialite_quatre" id="specialite_quatre" placeholder="specialité"value="<?php echo $specialite_quatre;?>">
					            </div>
							  	    <div class="wrap-input100">
								 <input type="submit" class="input login-btn" value="S'inscrire">
					         <div class="text-center p-t-136">
					      <a class="txt2" href="connexion.php"> se connecter</a>
					   </div>
					   </div>
				   </form>
				</div> 
		</center>
 </section>

    <!-- script pour les styles -->
<?php include("menu/scripts.php");?>
