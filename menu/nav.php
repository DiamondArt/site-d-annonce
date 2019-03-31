<?php
session_start();
?>
<nav class="navbar navbar-dark bg-dark fixed-top ">
         <a class=" navbar-brand" href="#"> <a/>
         <button  class="navbar-toggle btn btn-primary " type="button" data-toggle="collapse"  data-target="#but">
		<i class="fa fa-user"></i>         
		</button>
            <div class="collapse navbar-collapse "  id="but">
		     <br/>
            <ul class=" nav navbar-nav ">
             <li><a href="notification.php">Notification</a></li>
             <li><a href="modifie-profile.php?id=<?php echo $_SESSION['id'];?>">profile</a></li>
             <li><a href="logout.php">logout</a></li>
           </ul>
          </div>
     </nav>