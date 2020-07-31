<!DOCTYPE html>
<html lang="en">

<head>

    

    <title>UMP CAR RENTAL RESERVATION</title>
	<!-- start: CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.min1.css" rel="stylesheet">
	<link rel="stylesheet" href="/css/vegas.css">
	 <link href="css/cover.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
	<!-- end: CSS -->
	
</head>

<body>
   <!--start: Wrapper -->
	<div id="wrapper">
		
		<!--start: Container -->
		<div class="container">
		
			<!--start: Header -->
			<header>
			
				<!--start: Row -->
				<div class="row">
					
					<!--start: Logo -->
					<div class="logo span4">
						<a class="brand" href="#"><img src="img/logoump.png" width="500" height="200"></a>
					</div>
					<!--end: Logo -->
					
					<!--start: Social Links -->
					<div class="span8">
						<div id="social-links">
							<ul class="social-small-grid">
								<li>
									<div class="social-small-item">				
										<div class="social-small-info-wrap">
											<div class="social-small-info">
												<div class="social-small-info-front social-small-twitter">
													<a href="http://twitter.com"></a>
												</div>
												<div class="social-small-info-back social-small-twitter-hover">
													<a href="http://twitter.com"></a>
												</div>	
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="social-small-item">				
										<div class="social-small-info-wrap">
											<div class="social-small-info">
												<div class="social-small-info-front social-small-facebook">
													<a href="http://facebook.com"></a>
												</div>
												<div class="social-small-info-back social-small-facebook-hover">
													<a href="http://facebook.com"></a>
												</div>	
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<!--end: Social Links -->
					
				</div>
				<!--end: Row -->
						
			</header>
			<!--end: Header-->
			
			<!--start: Navigation-->	
			<div class="navbar navbar-inverse">
    			<div class="navbar-inner">
        			<div class="container">
          				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            				<span class="icon-bar"></span>
            				<span class="icon-bar"></span>
            				<span class="icon-bar"></span>
          				</a>
          				<div class="nav-collapse collapse">
            				<ul class="nav">
              					<li class="active"><a href="index.php">Home</a></li>
              					<li><a href="choose.php">Bookings</a></li>
              					<li><a href="contact.php">Contact Us</a></li>
								<li><a href="login.php">Login</a></li>
              					<li class="dropdown">
                					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Car Details <b class="caret"></b></a>
                					<ul class="dropdown-menu">
                  						<li><a href="auto.php">Auto</a></li>
                  						<li><a href="manual.php">Manual</a></li>
                					</ul>
              					</li>
            				</ul>
          				</div>
        			</div>
      			</div>
    		</div>
    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Member Registration</strong>
                    </h2>
                    <hr>
					
					
					
                </div>
                <div class="inner cover" style="height:400px; overflow-y: scroll;">
         
              <form class="form-horizontal" id="ticket" name="ticket" role="form" method="post" action="confirmation.php">
                             
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="name">Name:</label>
                          <div class="col-sm-7">
                          <input type="text" class="form-control" required id="name" name="name" placeholder="Enter Name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="nric">NRIC:</label>
                          <div class="col-sm-6">
                          <input type="text"  pattern="\d*" class="form-control" required id="nric" name="nric" placeholder="Enter NRIC">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="nric">Student ID:</label>
                          <div class="col-sm-6">
                          <input type="text"   class="form-control" required id="std_id" name="std_id" placeholder="Enter ID">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="nric">Username</label>
                          <div class="col-sm-6">
                          <input type="text"   class="form-control" required id="username" name="username" placeholder="Enter Username">
						</div> 
                        </div>
						<div class="form-group">
                          <label class="control-label col-sm-2" for="nric">Password</label>
                          <div class="col-sm-6">
                          <input type="text"   class="form-control" required id="password" name="password" placeholder="Enter Password">
						</div> 
                        </div>                
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="email">E-mail:</label>
                          <div class="col-sm-7">
                          <input type="email" class="form-control" required id="email" name="email" placeholder="Enter E-mail">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="phone">Phone:</label>
                          <div class="col-sm-4">
                          <input type="tel" class="form-control" required  pattern="\d*" id="phone" name="phone" placeholder="Enter Phone Number">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="address">Address:</label>
                          <div class="col-sm-7">
                          <textarea class="form-control" rows="3" required id="adress" name="address" placeholder="Enter Address" ></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="city">City:</label>
                          <div class="col-sm-4">
                          <input type="text" class="form-control" required id="city" name="city" placeholder="Enter City">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="state">State:</label>
                          <div class="col-sm-4">
                          <select class="form-control" name="state">
                            <option value="Johor">Johor</option>
                            <option value="Kedah">Kedah</option>
                            <option value="Kelantan">Kelantan</option>
                            <option value="Kuala Lumpur">Kuala Lumpur</option>
                            <option value="Melaka">Melaka</option>
                            <option value="Negeri Sembilan">Negeri Sembilan</option>
                            <option value="Pahang">Pahang</option>
                            <option value="Perak">Perak</option>
                            <option value="Perlis">Perlis</option>
                            <option value="Pulau Pinang">Pulau Pinang</option>
                            <option value="Sabah">Sabah</option>
                            <option value="Sarawak">Sarawak</option>
                            <option value="Selangor">Selangor</option>
                            <option value="Terengganu">Terengganu</option>
                          </select>  
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="postcode">Postcode:</label>
                          <div class="col-sm-4">
                          <input type="text" maxlength="5"  pattern="\d*" class="form-control" id="postcode" required name="postcode" placeholder="Enter Postcode">
                          </div>
                        </div>                        
                          <button type="submit" name="submita" class="btn btn-default">Submit</button>
                        </div>  
                          </form>
                <div class="clearfix"></div>
            </div>
        </div>

        

    </div>
</body>

</html>
