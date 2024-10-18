<!-- copyright section start -->
<div style="position: fixed; background-color: orangered;" class="copyright_section">
        <div class="container">
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
            <a class="navbar-brand" href="index.php"> <h2>Zeta-X</h2> </a>
            <i style="background-color:black;" class="fas fa-search"></i>
            <a class="nav-link active" href="restaurants.php"><i class="fas fa-search"></i><span class="sr-only"></span></a>                      
            <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="restaurants.php"><i style="background-color:black;" class="fas fa-search"></i> <span class="sr-only"></span></a> </li> 
				<?php
					if(empty($_SESSION["user_id"]))
						{
						    echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Register</a> </li>';
						}
					else
						{										
							echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">My Orders</a> </li>';
							echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
						}
				?> 
                </ul>
                <i class="fa fa-search"></i>
                <i class="fa fa-facebook-f fa-stack-1x"></i>
            </div>
        </div>
    </div>
<!-- copyright section end -->