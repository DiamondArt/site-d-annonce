<?php
session_start();
include "functions/connexion.php";

if(isset($_GET['id']))
{
	$id = $_GET['id'];
}

function update_image($avatar_tmp,$avatar)
{
    $db = Database::connect();
	move_uploaded_file($avatar_tmp,'avatar/'.$avatar);
	$query=$db-> prepare("UPDATE client SET avatar = ? WHERE client_id= ?"); 
	$query->execute(array($avatar,$id));
}

if(isset($_POST['submit']))
{
	
$avatar=$_FILES['avatar']['name'];
$avatar_tmp=$_FILES['avatar']['tmp_name'];

  if(!empty($avatar))
  {
	  $image_ext=strtolower(end(explode('.',$avatar)));
	  if(in_array($image_ext,array('jpg','jpeg','png','gif')))
	  {
		  
		  update_image($avatar_tmp,$avatar);
		  header("location:modifie-profile.php");
	  }else
		  {
			  echo "saisir une extension correcte";
		  }
  }
}

	else
	{
	$db = Database::connect();
    $query=$db->prepare("SELECT * FROM client WHERE client_id =?");
    $query->execute(array($id));
    $donnee=$query->fetch();
	
	$image        =    $donnee['avatar'];
	
	Database::disconnect();
	}

	?>
<?php	include("menu/head.php");?>

<form method="POST" action="" enctype="multipart/form-data">
<input type="file" name="avatar"><br/><br/>
<input type="submit" value="valider" name="submit">
</form>
