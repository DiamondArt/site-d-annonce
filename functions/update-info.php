<?php

require "functions/connexion.php";

if(isset($_GET['id'])) 
    {
        $id = test_input($_GET['id']);
	}
	// initialisation des variables
 $firstnameError = $lastnameError = $emailError = $passwordError = $adresseError =$cartepostaleError = $imageError= $phoneError = $professionError = $firstname = $lastname = $email = $password = $adresse = $cartepostale = $phone =$image = $erreur="";
 
    if (!empty($_POST)) 
    { 
        $firstname 			= test_input($_POST["firstname"]);
        $lastname			= test_input($_POST["lastname"]);
        $email 				= test_input($_POST["email"]);
        $adresse			= test_input($_POST["adresse"]);
        $cartepostale		= test_input($_POST["cartepostale"]);
        $phone 				= test_input($_POST["phone"]);
		$image              = test_input($_FILES["image"]["name"]);
        $imagePath          = 'avatar/'. basename($image);
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
        if(empty($cartepostale)) 
        {
               $cartepostaleError = 'Ce champ ne peut pas être vide et doit etre valid';
			   $isSuccess = false;

        }
		if(!isPhone($phone)) 
        {
            $phoneError = 'Ce champ ne peut pas être vide et doit etre valid';
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
    
        //si tous les données sont valids alors update de la table client
         if (($isSuccess && $isImageUpdated && $isUploadSuccess) || ($isSuccess && !$isImageUpdated)) 
             {      	
		      $db = Database::connect();
     
					if($isImageUpdated)
						{
						$statement = $db->prepare("UPDATE client set firstname=?,lastname=?,email=?,adresse=?,postal=?,phone=?,avatar=?
						WHERE client_id = ?");
						$statement->execute(array($firstname,$lastname,$email,$adresse,$cartepostale,$phone,$image,$id));	
						}
					else
					{
						//update des information du client sans l'upload de l'avatar 
						$statement = $db->prepare("UPDATE client set firstname=?,lastname=?,email=?,adresse=?,postal=?,phone=?
						WHERE client_id = ?");
						$statement->execute(array($firstname,$lastname,$email,$adresse,$cartepostale,$phone,$id));	
					}
						Database::disconnect();
						$erreur="modification effectuée avec success";
						
			 }
			 else if($isImageUpdated && !$isUploadSuccess)
			 {
				$db = Database::connect();
				$statement = $db->prepare("SELECT * FROM client where client_id = ?");
				$statement->execute(array($id));
				$item = $statement->fetch();
				$image          = $item['avatar'];
				Database::disconnect();   
			 }			 
	}
	else
	{
	$db = Database::connect();
    $query=$db->prepare("SELECT * FROM client WHERE client_id =?");
    $query->execute(array($id));
    $donnee=$query->fetch();
	$firstname 	  =    $donnee['firstname'];
	$lastname	  =    $donnee['lastname'];
	$email 		  =    $donnee['email'];
	$adresse	  =    $donnee['adresse'];
	$cartepostale =    $donnee['postal'];
	$phone        =    $donnee['phone'];
	$image        =    $donnee['avatar'];
	
	Database::disconnect();
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