
<?php
/*appel à la base de donnee*/
    require "functions/connexion.php";

/*variable de verification des champs*/
 
 $firstnameError = $lastnameError = $emailError = $passwordError = $adresseError =$cartepostaleError = $phoneError = $professionError = $firstname = $lastname = $email = $password = $adresse = $cartepostale = $phone =$profession = $specialite_un =$specialite_deux = $specialite_trois = $specialite_quatre ="";
 
    if (!empty($_POST)) 
    { 
        $firstname 			= test_input($_POST["firstname"]);
        $lastname			= test_input($_POST["lastname"]);
        $email 				= test_input($_POST["email"]);
        $password 			= test_input($_POST["password"]);
        $adresse			= test_input($_POST["adresse"]);
        $cartepostale		= test_input($_POST["cartepostale"]);
        $phone 				= test_input($_POST["phone"]);
        $profession 		= test_input($_POST["profession"]);
        $specialite_un 		= test_input($_POST["specialite_un"]);
        $specialite_deux 	= test_input($_POST["specialite_deux"]);
        $specialite_trois 	= test_input($_POST["specialite_trois"]);
        $specialite_quatre 		= test_input($_POST["specialite_quatre"]);
        
		//gestion des erreures
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
		if(empty($profession)) 
        {
            $professionError = 'Ce champ ne peut pas être vide et doit etre valid';
        }
		
        //insertion dans la table prestataire si tous les champs sont valids
    if(!empty($firstname && $lastname && $email && $password && $adresse && $cartepostale && $phone && $profession))
	{
            $db = Database::connect();
			$statement = $db->prepare("INSERT INTO prestataire(firstname,lastname,email,password,adresse,postal,phone,profession,specialite_un,specialite_deux,specialite_trois,specialite_quatre) values(?,?,?,?,?,?,?,?,?,?,?,?)");
			
            $statement->execute(array($firstname,$lastname,$email,$password,$adresse,$cartepostale,$phone,$profession,$specialite_un,$specialite_deux,$specialite_trois,$specialite_quatre));
			
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
