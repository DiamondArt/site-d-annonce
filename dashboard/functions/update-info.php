<?php
require "functions/connexion.php";

	if(isset($_GET['id'])) 
		{
			$id = test_input($_GET['id']);
		}
if($id == $_SESSION['id'])
{	
		// initialisation des variables
	 $firstnameError = $lastnameError = $emailError = $passwordError = $adresseError =$postalError = $phoneError =$imageError= $professionError =$paysError=$villeError=$aboutError=$code_postalError= $firstname = $lastname = $email = $adresse = $postal = $phone =$profession =$pays=$ville=$about=$code_postal =$image= $erreur="";
	 
    if (!empty($_POST)) 
    { 
        $firstname 			= test_input($_POST["firstname"]);
        $lastname			= test_input($_POST["lastname"]);
        $email 				= test_input($_POST["email"]);
        $adresse			= test_input($_POST["adresse"]);
        $postal		        = test_input($_POST["postal"]);
        $phone 				= test_input($_POST["phone"]);
        $pays 				= test_input($_POST["pays"]);
        $ville 				= test_input($_POST["ville"]);
        $code_postal 		= test_input($_POST["code_postal"]);
        $profession 		= test_input($_POST["profession"]);
        $specialite_un 		= test_input($_POST["specialite_un"]);
        $specialite_deux 	= test_input($_POST["specialite_deux"]);
        $specialite_trois 	= test_input($_POST["specialite_trois"]);
        $specialite_quatre 	= test_input($_POST["specialite_quatre"]);
        $about 				= test_input($_POST["about"]);
		$image              = test_input($_FILES["image"]["name"]);
        $imagePath          = '../avatar/'. basename($image);
        $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
        $isSuccess          = true;
		
		//verification des champs 
       if(empty($firstname)) 
        {			
            $firstnameError = 'ce champ ne peut etre vide';
			$isSuccess = false;

		}
		
		if(empty($lastname)) 
        {
            $lastnameError = 'Ce champ ne peut pas être vide';
			            $isSuccess = false;

        }
		
		if(!isEmail($email)) 
        {
           $emailError = 'invalid email';
		   $isSuccess = false;

        }
	
        if(empty($adresse)) 
        {
            $adresseError = 'Ce champ ne peut pas être vide ';
			$isSuccess = false;

        }
		
        if(empty($postal)) 
        {
               $postalError = 'Ce champ ne peut pas être vide et doit etre valid';
			   $isSuccess = false;

        }
		
		if(empty($code_postal)) 
        {
               $code_postalError = 'Ce champ ne peut pas être vide et doit etre valid';
			   $isSuccess = false;

        }
		
		if(empty($profession)) 
        {
               $professionError = 'Ce champ ne peut pas être vide et doit etre valid';
			   $isSuccess = false;
        }
		
		if(empty($pays)) 
        {
               $paysError = 'Ce champ ne peut pas être vide et doit etre valid';
			   $isSuccess = false;
        }
		
		if(empty($ville)) 
        {
               $villeError = 'Ce champ ne peut pas être vide et doit etre valid';
			   $isSuccess = false;
        }
		if(empty($about)) 
        {
               $aboutError = 'Ce champ ne peut pas être vide';
			   $isSuccess = false;
        }
		
		if(empty($image)) // le input file est vide, ce qui signifie que l'image n'a pas ete update
        {
            $isImageUpdated = false;
        }
		else
        {
            $isImageUpdated = true;
            $isUploadSuccess =true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            
            if($_FILES["image"]["size"] > 500000) 
            {
                $imageError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
                {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        }
		if(!isPhone($phone)) 
        {
            $phoneError = 'Ce champ ne peut pas être vide et doit etre valid';
			$isSuccess = false;

        }   
            
        //si tous les données sont valids alors update de la table client
		 if (($isSuccess && $isImageUpdated && $isUploadSuccess) || ($isSuccess && !$isImageUpdated)) 
             {      	
		      $db = Database::connect();
     
					if($isImageUpdated)
						{
				$statement = $db->prepare("UPDATE prestataire set firstname=?,lastname=?,email=?,adresse=?,postal=?,phone=?,profession=?,
		specialite_un=?,specialite_deux=?,specialite_trois=?,specialite_quatre=?,avatar=?
						WHERE id = ?");
						$statement->execute(array($firstname,$lastname,$email,$adresse,$postal,$phone,$profession,$specialite_un,$specialite_deux, $specialite_trois,$specialite_quatre,$image,$id));	
						}
					else
					{
		
						//update des information du client sans l'upload de l'avatar 
$statement = $db->prepare("UPDATE prestataire set firstname=?,lastname=?,email=?,adresse=?,postal=?,phone=?,profession=?,specialite_un=?,specialite_deux=?,specialite_trois=?,specialite_quatre=? WHERE id = ?");
						$statement->execute(array($firstname,$lastname,$email,$adresse,$postal,$phone,$profession,$specialite_un,$specialite_deux, $specialite_trois,$specialite_quatre,$id));	
					}
						Database::disconnect();
						$erreur="modification effectuée avec success";
						
			 }
			 else if($isImageUpdated && !$isUploadSuccess)
			 {
				$db = Database::connect();
				$statement = $db->prepare("SELECT * FROM prestataire WHERE id = ?");
				$statement->execute(array($id));
				$item = $statement->fetch();
				$image          = $item['avatar'];
				Database::disconnect();   
			 }	
	
    if(!empty($firstname && $lastname && $email && $adresse && $postal && $phone && $profession))  
		
	{      	
		      $db = Database::connect();
     
					
		$statement = $db->prepare("UPDATE prestataire set firstname=?,lastname=?,email=?,adresse=?,postal=?,phone=?,profession=?,specialite_un=?,specialite_deux=?,specialite_trois=?,specialite_quatre=? WHERE id = ?");
	$statement->execute(array($firstname,$lastname,$email,$adresse,$postal,$phone,$profession,$specialite_un,$specialite_deux, $specialite_trois,$specialite_quatre, $id));	
				
						Database::disconnect();
						$erreur="modification effectuée avec success";
	}					
	


if(!empty($pays && $ville && $about && $code_postal))
		{
			$db=Database::connect();
			$update= $db->prepare("UPDATE prestataire set pays=?,ville=?,about=?,code_postal=? WHERE id= ?");
			$update->execute(array($pays,$ville,$about,$code_postal,$id));
			$row=$update->rowCount();
			if($row==0)
			{
				$insert=$db->prepare("INSERT INTO prestataire(id,pays,ville,about,code_postal) VALUES(?,?,?,?,?)");
				$insert->execute(array($id,$pays,$ville,$about,$code_postal));
			}
		}
			
}

	else
	{
	$db = Database::connect();
    $query=$db->prepare("SELECT * FROM prestataire WHERE id =?");
    $query->execute(array($id));
    $donnee=$query->fetch();
	$firstname 	  =    $donnee['firstname'];
	$lastname	  =    $donnee['lastname'];
	$email 		  =    $donnee['email'];
	$adresse	  =    $donnee['adresse'];
	$pays	  =    $donnee['pays'];
	$ville	  =    $donnee['ville'];
	$code_postal	  =    $donnee['code_postal'];
	$image      =      $donnee['avatar'];
	$postal      =      $donnee['postal'];
	$phone        =    $donnee['phone'];
	$specialite_un        =    $donnee['specialite_un'];
	$specialite_deux        =    $donnee['specialite_deux'];
	$specialite_trois        =    $donnee['specialite_trois'];
	$specialite_quatre        =    $donnee['specialite_quatre'];
	$profession        =    $donnee['profession'];
	$about      =    $donnee['about'];
	Database::disconnect();
	}
}
	else
	{
	echo "<script  text/javascript>document.location.href='../index.php';</script>";
	}
/*verification des champs input type text*/
function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
function isEmail($email) 
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
				
/*verification de la saisie de telephone */

  function isPhone($phone) 
    {
        return preg_match("/^[0-9 ]*$/",$phone);
    }	

?>