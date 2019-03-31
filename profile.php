<?php
include("menu/head.php");
include("menu/nav.php");
?>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Build a landing page for your business or project and generate more leads!</h1>
          </div>
		  <div class="bar-search col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form action="" method="GET">
               <div class="form-row">
                <div class="sub col-12 col-md-9 mb-2 mb-md-0 input-group" >
                  <input type="search" class="form-control form-control-lg" placeholder="Chercher par domaine" name="terme">
				  <span class="input-group-addon">
                   <input class="btn btn-block btn-lg btn-info" name="submit" type="submit" value="Rechercher"></span>
                </div>   
			</div>
			</form>
			
        </div>
      </div>
    </header>
	<?php
require"functions/connexion.php";//connexion a la base de donnee
$db = Database::connect();
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  
  if(isset($_GET['submit']) AND !empty($_GET['submit']))
  {
	  // la barre de recherche
	  $terme =htmlspecialchars(trim(strip_tags($_GET['terme'])));
	  $terme=strtolower($terme);
	 $terme_select= $db->prepare("SELECT * FROM prestataire WHERE profession LIKE ? ");
	 $terme_select->execute(array("%".$terme."%"));
	
?>
<section class="profile bg-light">
      <div class="container-fluid">
        <h1 class="mb-5"><center>Trouver un profesionnel</center></h1>  	
	  <div class="page row">
<?php	 
 
	while($terme_trouve  = $terme_select->fetch())
 {
$likes=$db->prepare("SELECT id FROM liked WHERE id_profile=?");
$likes->execute(array($terme_trouve['id']));
$likes=$likes->rowCount();

$vues=$db->prepare("SELECT id FROM vue WHERE id_profile=?");
$vues->execute(array($terme_trouve['id']));
$vues=$vues->rowCount();

$dislikes=$db->prepare("SELECT id FROM disliked WHERE id_profile=?");
$dislikes->execute(array($terme_trouve['id']));
$dislikes=$dislikes->rowCount();
	 ?>
	 
		  
			<div class=" col-lg-4">
            <div class="profile-item mx-auto mb-5 mb-lg-0">
			<a href="functions/date.php?t=3&id=<?=$item['id']?>">
			
              <img class="img-fluid img-thumbail mb-3"  src="<?php echo 'avatar/'.$terme_trouve['avatar'];?>">
            </a>
			<h5><?php echo $terme_trouve['firstname'].' '.$terme_trouve['lastname'];?></h5>
            <p class="font-weight-dark mb-0 "><?php echo $terme_trouve['profession'];?></p>
			<div class="button" id="bouttons"> 
				<a href="#" class="vue"><li class="fa fa-eye"></li> <?=$vues ?></a>
				<a href="functions/action.php?t=1&id=<?= $terme_trouve['id'];?>" class="vue">
				<!-- changement de couleur des bouttons likes et dislikes au clic-->
				<?php if($likes==1) {?>
				<li class="fa fa-thumbs-up text-primary"></li>
				<?php } else{?>	
				<li class="fa fa-thumbs-up "></li>
				<?php }?>
				<?=$likes?></a>
				<a  onClick="ajaxing()" href="functions/action.php?t=2&id=<?= $terme_trouve['id'];?>" class="vue">
				<?php if($dislikes==1){?>
				<li class="fa fa-thumbs-down text-primary"></li>
				<?php } else { ?>
					<li class="fa fa-thumbs-down"></li>
				<?php }?>
				<?=$dislikes?></a>
				</div>
				</div>
          </div>
		 
		 <?php	 
 }
 
	 
 ?>
 <div style=><a href='profile.php'><span class="fa fa-angle-double-left">Retour<span class="fa fa-angle-double-right"></a></div>
<?php 
 }
  else
  {
  Database::disconnect();
 ?>
  <!-- fin barre de recherche -->
  <!--liste des professionnels-->

	 <section class="profile bg-light">
      <div class="container-fluid">
        <h1 class="mb-5"><center>Trouver un profesionnel</center></h1>  		
			  <div class="page row">


<?php

	if(isset($_SESSION['id']) AND !empty($_SESSION['id']))
	{
	?>
<?php
$db=Database::connect();
$query=$db->query("SELECT prestataire.id, prestataire.firstname,prestataire.lastname,prestataire.avatar,prestataire.profession FROM prestataire ORDER BY prestataire.id DESC");

while($item=$query->fetch())
	
	{
$likes=$db->prepare("SELECT id FROM liked WHERE id_profile=?");
$likes->execute(array($item['id']));
$likes=$likes->rowCount();

$vues=$db->prepare("SELECT id FROM vue WHERE id_profile=?");
$vues->execute(array($item['id']));
$vues=$vues->rowCount();

$dislikes=$db->prepare("SELECT id FROM disliked WHERE id_profile=?");
$dislikes->execute(array($item['id']));

$dislikes=$dislikes->rowCount();
?>		<div class=" page col-lg-4">
            <div class="profile-item mx-auto mb-5 mb-lg-0"><a href="functions/date.php?t=3&id=<?=$item['id']?>">
			
              <img class="img-fluid img-thumbail mb-3" width="300" height="300" src="<?php echo 'avatar/'.$item['avatar'];?>">
            </a>
			<h5><?php echo $item['firstname'].' '.$item['lastname'];?></h5>
            <p class="font-weight-dark mb-0 "><?= $item['profession'];?></p>
			<div class="button" id="bouttons"> 
				<a href="#" class="vue"><li class="fa fa-eye"></li> <?=$vues?></a>
				<a href="functions/action.php?t=1&id=<?=$item['id']?>" class="vue">
				
				

				
				<li class="fa fa-thumbs-up "></li>

				<?=$likes?>
				</a>
	<a onClick="ajaxing()" href="functions/action.php?t=2&id=<?= $item['id']?>" class="vue">
	
   	<li class="fa fa-thumbs-down">  </li>
	<?=$dislikes?>
	
	</a>
				</div>
				</div>
          </div>
	<?php
	}
	

	?>
   <?php
}
else
{
	echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
}
	
	}
  ?>

		 
          </div>
         </div>
          <div class="pagenation">
		   <ul id="pagin">
		   
		   </ul>		 		
      </div>
      </div>
    </section>
	  <!--fin section profile -->    
	  
    <!-- Footer et fichiers js pour le style-->
	<?php
	include("menu/footer.php");?>
<?php include("menu/scripts.php");?>
<script language="javascript">
function getxhr()
{
try{
	xhr=new XMLHttpRequest();}
	catch(e)
	{
		try {
			xhr=new ActiveXObject("Microsoft.XMLHTTP");}
			catch(e1)
			{
				try {xhr = new ActiveXObject("Msxml2.XMLHTTP");}
				catch(e2)
				{
					alert("Ajax non supporté")
				}
			}
	}
	return xhr;
}
function ajaxing()
{
	xhr= getxhr();
	xhr.onreadtstatechange= function()
	{
		if(xhr.readyState==4)
		
document.getElementById("bouttons").innerHTML=xhtw.responseText;		
	}
	xhr.open("GET","functions/profile.php",true);
	xhr.send("null");
}
</script>


 </div>