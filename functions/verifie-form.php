
<?php
/* appel à labase de donnee*/
    require "functions/connexion.php";

/*variable de verification des champs*/
 

 $firstnameError = $lastnameError = $emailError = $passwordError = $adresseError =$cartepostaleError = $phoneError = $professionError = $firstname = $lastname = $email = $password = $adresse = $cartepostale = $phone ="";
 
    if (!empty($_POST)) 
    { 
        $firstname 			= test_input($_POST["firstname"]);
        $lastname			= test_input($_POST["lastname"]);
        $email 				= test_input($_POST["email"]);
        $password 			= test_input($_POST["password"]);
        $adresse			= test_input($_POST["adresse"]);
        $cartepostale		= test_input($_POST["cartepostale"]);
        $phone 				= test_input($_POST["phone"]);
       if(empty($firstname)) 
        {			
            $firstnameError = 'ce champ ne peut etre vide';
		}
		if(empty($lastname)) 
        {
            $lastnameError = 'Ce champ ne peut pas être vide';
        }
		if(!isEmail($email)) 
        {
            $emailError = 'invalid email';
        }
		if(empty($password)) 
        {
            $passwordError = 'Ce champ ne peut pas être vide';
        }
		else
		{
			$password = md5($password);
		}
        if(empty($adresse)) 
        {
            $adresseError = 'Ce champ ne peut pas être vide ';
        }
        if(empty($cartepostale)) 
        {
            $cartepostaleError = 'Ce champ ne peut pas être vide et doit etre valid';
        }
		if(!isPhone($phone)) 
        {
            $phoneError = 'Ce champ ne peut pas être vide et doit etre valid';
        }
        //si tous les champs sont valids alors insertion dans la table client
    if(!empty($firstname && $lastname && $email && $password && $adresse && $cartepostale && $phone))
	{
           $db = Database::connect();
		   $db->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
           $statement = $db->prepare("INSERT INTO client (firstname,lastname,email,password,adresse,postal,phone) values(?,?,?,?,?,?,?)");
            $statement->execute(array($firstname,$lastname,$email,$password,$adresse,$cartepostale,$phone));
			
	        Database::disconnect();
            header("Location: connexion.php");
	}
	
	  
	  
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
	/*verification des champs input type text*/

    function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>
