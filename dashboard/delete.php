<?php
require "functions/connexion.php"; //connexion à la base de donnee

//menu de navigation et les styles-->
include("menu/head.php");
 include("menu/nav.php");

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

    if(!empty($_POST)) 
    {
        $id = checkInput($_POST['id']);
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM message WHERE id = ?");
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: table.php"); 
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>
    <body>
 
         <div class="container admin">
            <div class="row">
			<br>
			<div class="col-md-8">
                <center>
                <form class="form" action="delete.php" role="form" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>"/>
                    <p class="alert alert-warning">Etes vous sur de vouloir supprimer cette annonce ?</p>
                    <div class="form-actions">
					<center>
                      <a class="btn btn-default" href="table.php">Non</a>                 <button type="submit" class="btn btn-warning">Oui</button>

					  </center>
                    </div>
                </form>
				</center>
            </div>
            </div>
        </div>   
</body>
   <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

