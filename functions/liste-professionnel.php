<!--menu de navigation et les styles-->
<?php include("../menu/head.php");

?>
 <?php include("../menu/header-deux-search.php");?>
  <!--liste des professionnels-->

	 <section class="profile bg-light">
      <div class="container-fluid">
        <h1 class="mb-5"><center>Trouver un profesionnel</center></h1>           
		  <div class="page row">
<?php
				/* connection à la base de donnee*/

class Database
{
    private static $dbHost = "localhost";
    private static $dbName = "siteannonce";
    private static $dbUsername = "root";
    private static $dbUserpassword = "";
    
    private static $connection = null;
    
    public static function connect()
    {
        if(self::$connection == null)
        {
            try
            {
              self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName , self::$dbUsername, self::$dbUserpassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$connection;
    }
    
    public static function disconnect()
    {
        self::$connection = null;
    }

}



$db=Database::connect();
$query=$db->query("SELECT prestataire.id, prestataire.firstname,prestataire.lastname,prestataire.avatar,prestataire.profession FROM prestataire ORDER BY prestataire.id DESC");
   while($item=$query->fetch())
   {
?>	

		  <div class=" col-lg-4">
            <div class="profile-item mx-auto mb-5 mb-lg-0"><a href="auteur.php">
			
             <img class="img-fluid img-thumbail mb-3" src="<?php echo '../avatar/'.$item['avatar'];?>">
              </a>
			<h5><?php echo $item['firstname'].' '. $item['lastname'];?></h5>
            <p class="font-weight-light mb-0"><?php echo $item['profession'];?></p>
			  	<div class="button" > 
				<a href="#" class="vue"><li class="fa fa-eye">200</li></a>
				<a href="#" class="vue"><li class="fa fa-thumbs-up">250</li></a>
				<a href="#" class="vue"><li class="fa fa-thumbs-down">200</li></a>
				</div>
				</div>
          </div>
	


           
			</div>
          </div>
          </div>
          </div>
          <div class="pagenation">
		   <ul id="pagin"></ul>		 		
      </div>
      </div>
    </section>
	  <!--fin section profile -->    
	  
    <!-- Footer et fichiers js pour le style-->
   <?php }
   include("../menu/footer.php");?>
<?php include("../menu/scripts.php");?>
