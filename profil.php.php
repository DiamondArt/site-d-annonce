<!--menu de navigation et les styles-->
<?php 
include("menu/head.php");
include("menu/header-deux-search.php"); 
?>	 
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

?>		<div class=" col-lg-4">
            <div class="profile-item mx-auto mb-5 mb-lg-0"><a href="auteur.php?id=<?php echo $item['id'];?>">
			
              <img class="img-fluid img-thumbail mb-3" width="300" height="300" src="<?php echo 'avatar/'.$item['avatar'];?>">
            </a>
			<h5><?php echo $item['firstname'].' '.$item['lastname'];?></h5>
            <p class="font-weight-dark mb-0 "><?php echo $item['profession'];?></p>
			<div class="button"> 
				<a href="#" class="vue"><li class="fa fa-eye">200</li></a>
				<a href="#" class="vue"><li class="fa fa-thumbs-up">250</li></a>
				<a href="#" class="vue"><li class="fa fa-thumbs-down">200</li></a>
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
	?>

		 
          </div>
          </div>
          <div class="pagenation">
		   <ul id="pagin"></ul>		 		
      </div>
      </div>
    </section>
	  <!--fin section profile -->    
	  
    <!-- Footer et fichiers js pour le style-->
	<?php
	include("menu/footer.php");?>
<?php include("menu/scripts.php");?>
