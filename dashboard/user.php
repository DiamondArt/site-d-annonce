
<?php include("menu/head.php");?>
<?php include ("menu/nav.php");?>

<?php
// update-info 

require "functions/update-info.php";



?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                      <form  class="form-group mb-5" action="<?php echo 'user.php?id='.$id;?>" method="POST" enctype="multipart/form-data">
							  <div class="col-md-6">
                             <div class="card card-user">
                             <div class="image">
                            </div>
                                <div class="author">
                                 <img class="avatar border-gray"  src="../avatar/<?php echo $image;?>" alt="avatar"/>	
								 <hr>
								 	<div class="input-file">
		                   <input type="file"  name="image" id="image">
		                                 </div>
										 <i class="help-inline text-danger"><?php echo $imageError;?></i>	
                                            </div>
															 
                            </div>

									 <i class="help-inline text-danger"><?php echo $firstnameError;?></i>	
						</div>
                  
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="first name" value="<?php echo $firstname;?>">
                                            </div>
									 <i class="help-inline text-danger"><?php echo $firstnameError;?></i>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" value="<?php echo $lastname;?>">
                                            </div>
											<i class="help-inline text-danger"><?php echo $lastnameError;?></i>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?php echo $email;?>">
                                            </div>
											<i class="help-inline text-danger"><?php echo $emailError;?></i>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPhone">phone </label>
                                                <input type="text" class="form-control" placeholder="phone" name="phone" id="phone" value="<?php echo $phone;?>">
                                            </div>
											<i class="help-inline text-danger"><?php echo $phoneError;?></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Address</label>
                                                <input type="text" class="form-control" placeholder="Home Address" value="<?php echo $adresse;?>"  name="adresse" id="adresse">
                                            </div>
											<i class="help-inline text-danger"><?php echo $adresseError;?></i>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label> Addresse postale</label>
                                                <input type="text" class="form-control" placeholder="postal Address" value="<?php echo $postal;?>"  name="postal" id="postal">
                                            </div>
											<i class="help-inline text-danger"><?php echo $postalError;?></i>
                                        </div>
                                    </div>
									<div class="row">
									<div class="col-md-12">
                                            <div class="form-group">
                                                <label>Profession</label>
                                                <input type="text" class="form-control" placeholder="votre profession" value="<?php echo $profession;?>" name="profession" id="profession" >
                                            </div>
											<i class="help-inline text-danger"><?php echo $professionError;?></i>
                                        </div>
                                        </div>
                                     <div name="forme" class="row">
                                          <div class="col-md-12">
                                            <div  class="form-group">
                                                <label>Ajouter vos spécialitées</label>
                                                <input type="text" name="specialite_un"id="specialite_un" class="form-control" placeholder="spécialitée 1 ex:menuiserie" value="<?php echo $specialite_un;?>">
												<input type="text" name="specialite_deux" id="specialite_deux" class="form-control" placeholder="spécialitée 2" value="<?php echo $specialite_deux;?>">
												<input type="text"  name="specialite_trois" id="specialite_trois" class="form-control" placeholder="spécialitée 3" value="<?php echo $specialite_trois;?>" >
												<input type="text" name="specialite_quatre"id="specialite_quatre" class="form-control" placeholder="spécialitée 4" value="<?php echo $specialite_quatre;?>">
                                            </div>
                                        </div>
                                       </div>
										<h6 class="mb-3 text-danger">completer vos informations *</h6>
                                    <div class="row">
									    

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Ville</label>
                                                <input type="text" class="form-control" placeholder="ville"name="ville" id="ville" value="<?php echo $ville;?>">
                                            </div>
											<i class="help-inline text-danger"><?php echo $villeError;?></i>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Pays</label>
                                                <input type="text" class="form-control" placeholder="Pays" name="pays" id="pays"value="<?php echo $pays;?>">
                                            </div>
											<i class="help-inline text-danger"><?php echo $paysError;?></i>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control" placeholder="ZIP Code" name="code_postal" id="code_postal" value="<?php echo $code_postal;?>">
                                            </div>
											<i class="help-inline text-danger"><?php echo $code_postalError;?></i>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control" placeholder="Here can be your description"  name="about" id="about">
												<?php echo $about;?>
												</textarea>

                                            </div>
											<i class="help-inline text-danger"><?php echo $aboutError;?></i>

                                        </div>
										
                                    </div>

                                    <input type="submit" class="btn btn-info btn-fill pull-right" value="Update Profile">
									<i class="help-inline text-success"><?php echo $erreur;?></i>
                                    <div class="clearfix"></div>
                                </form>
                            </div>

                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</div>


</body>




    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	
</html>
