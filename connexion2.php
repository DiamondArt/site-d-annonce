<?php
if(empty($_SESSION)) session_start();
require"functions/connexion.php";

$erreur="";
if(isset($_POST['login']))
{
	$nom=$_POST['firstname'];
	$password= md5($_POST['password']);
	
	$db= Database::connect();
	$query=$db->prepare("SELECT firstname,password FROM client WHERE firstname=? AND password=?");
	$query->execute(array($nom,$password));
	$donnee=$query->fetch();
	if($nom ==$donnee['firstname'] && $password==$donnee['password'])
	{
		
		$_SESSION['nom']=$donnee['firstname'];

			header("Location:profile.php");
			}
	else
	{
		$erreur="login ou mot de passe incorrect";
	}
	
}

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
                   <div class="wrap-input100 validate-input input-group"  data-validate = "Valid email  is required: ex@abc.xyz">
					   <input class="input100 form-control" type="text" id="firstname" name="firstname" placeholder="firstname">
					    </div>
					      <div class="wrap-input100 validate-input" >
						     <input class="input100 form-control" type="password" name="password" id="password" placeholder="Password">
					          </div>
					      
					           <div class="container-login100-form-btn">
					            <input type="submit" class="login100-form-btn" value="Login"  name="login">
					            </div>
								<i class="help-inline text-danger"><?php echo $erreur;?></i>
					            <div class="text-center p-t-12">
					           <span class="txt1">Recupérer</span>
						       <a class="txt2" href="#">Password</a>
					        </div>
					       <div class="text-center p-t-136">
					      <a class="txt2" href="register.php"> Creer un compte</a>

					   </div>
				   </form>
				</center>
			</div>
 </section>

	 <!--fichiers js pour le style-->
	 <?php include("menu/scripts.php");?>