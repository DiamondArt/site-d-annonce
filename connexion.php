<?php
require "functions/login.php";
?>
 <!-- menu navigation-->
<?php include("menu/head.php");?>

 <!--page connexion-->
		<section class="container-login100">
			<div class="wrap-login100">
			<center>
			   <form method="POST" action="" class="login100-form validate form-group">
				 <span class="login100-form-title">
						Connexion 
				  </span>
                   <div class="wrap-input100 validate-input input-group">
					   <input class="input form-control" type="email" id="email" name="email" placeholder="email">
					    </div>
					      <div class="wrap-input100 input-group" >
						     <input class="input form-control" type="password" name="password" id="password" placeholder="Password">
					          </div>
					      
					           <div class="wrap-input100 input-group">
					            <input type="submit" class="input login-btn form-control" value="Login"  name="login">
					            </div>
								<i class="help-inline text-danger"><?php echo $erreur;?></i>
					            <div class="text-center p-t-12">
					           <span class="txt1">Recupérer</span>
						       <a class="txt2" href="#">Password</a>
					        </div>
					       <div class="text-center  p-t-136">
					      <a class="txt2" href="register.php"> Creer un compte</a>

					   </div>
				   </form>
				</center>
			</div>
 </section>

	 <!--fichiers js pour le style-->
	 <?php include("menu/scripts.php");?>