<?php 
include("config.php");
session_start();

$num_booking = $_GET["id"]; 

$stmt = $dbo->prepare("SELECT * FROM booking_bus WHERE num_booking = :num_booking");
$stmt->bindParam(':num_booking', $num_booking);
$stmt->execute();
$s = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>eReservation Online UMP Bus</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.min1.css" rel="stylesheet">
	<link rel="stylesheet" href="/css/vegas.css">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.css" />
	 <link href="css/cover.css" rel="stylesheet">

	 <script src="js/ie-emulation-modes-warning.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style>
img {
    display: block;
    margin: auto;
    width: 40%;
}
</style>

<body>
<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img src="img/rasmi.png" alt="" width="500" height="200" />
					<div class="brand">UMP BUS RESERVATION </div>
    <div class="address-bar"><strong>Universiti Malaysia Pahang, Lebuhraya Tun Razak, 26300, Gambang, Kuantan, Pahang Darul Makmur</strong></div>
                </div>
            </div>
        </div>
    </footer>
    
	

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.php">Business Casual</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="choose.php">Bookings</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact Us</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Bus Details</strong>
                    </h2>
                    <hr>
					
					
					
                </div>
                <div class="inner cover" style="height:400px; overflow-y: scroll;">
          <?php if (isset($submit)) { ?>
          <?php if (isset($result)) { ?>
          <div class="alert alert-success" role="alert">Well done! Successfully processed.</div>
          <?php } else { ?>
          <div class="alert alert-warning" role="alert">Oh snap! Please try again.</div>
          <?php } ?>
          <?php } ?>
          <h2><strong><span class="glyphicon glyphicon-road"></span>&nbsp; Bus Details</strong></h2>
              <h3><?php echo $s["title"]; ?></h3>
              <h4><b>DATE:</b> <?php echo $_GET['datefrom']; ?> to <?php echo $_GET['datetto']; ?> 
                  <!--<br/><b>TIME:</b> <?php echo $s["time"]; $s["time_last"]; ?> to <?php echo $s["time_last"]; ?> --> 
                  <br/><b>DRIVER:</b> <?php echo $s["driver"]; ?>
                  <!--<br/><b>PLACE:</b> <?php echo $s["place"]; ?>-->
              </h4>
              <br/><br/>
              <p></p>
              <form class="form-horizontal" id="ticket" name="ticket" role="form" method="post" action="confirmation.php">
                             
                <h2><span class="glyphicon glyphicon-user"></span>&nbsp;User Details</h2>
              <p></p>
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
                          <label class="control-label col-sm-2" for="nric">STUDENT ID:</label>
                          <div class="col-sm-6">
                          <input type="text"   class="form-control" required id="std_id" name="std_id" placeholder="Enter ID">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="nric">FACULTY:</label>
                          <div class="col-sm-6">
                          <select class="form-control" name="faculty">
                            <option value="Faculty of Chemical and Process Engineering Technology">Faculty of Chemical and Process Engineering Technology</option>
                            <option value="Faculty of Civil Engineering Technology">Faculty of Civil Engineering Technology</option>
                            <option value="Faculty of Electrical and Electronic Engineering Technology">Faculty of Electrical and Electronic Engineering Technology</option>
                            <option value="Faculty of Manufacturing and Mechatronic Engineering Technology">Faculty of Manufacturing and Mechatronic Engineering Technology</option>
                            <option value="Faculty of Mechanical and Automotive Engineering Technology">Faculty of Mechanical and Automotive Engineering Technology</option>
                            <option value="Faculty of Computing">Faculty of Computing</option>
                            <option value="Faculty of Industrial Sciences and Technology">Faculty of Industrial Sciences and Technology</option>
                            <option value="Faculty of Industrial Management">Faculty of Industrial Management</option>
                          </select>  
                          </div>
                        </div>
              <div class="form-group">
                  <label class="control-label col-sm-2" for="date">Date:</label>
                  <div class="col-sm-4">
                    <input type='text' class="form-control" value="<?php echo $_GET['datefrom']; ?>" name="date" readonly />
                  </div>
                  <label class="control-label col-sm-1" for="date"> To </label>
                  <div class="col-sm-4">
                    <input type='text' class="form-control" value="<?php echo $_GET['datetto']; ?> " name="date_last" readonly />
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
                          <label class="control-label col-sm-2" for="address">Location Address:</label>
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
						 <div class="form-group">
                          <label class="control-label col-sm-2" for="terms">Terms & Conditions:</label>
                          <div class="col-sm-4">
                          <p style="text-align:left"><input type="checkbox" required name="terms"> I accept the <a style="color:#06F" data-toggle="modal" href="#myModal">Terms and Conditions</a></p>
                          </div>
                        </div>
						<div class="form-group">
                  <label class="control-label col-sm-2" for="time"></label>
                  <div class="col-sm-4">
                    <input type='hidden' class="form-control" id='datetimepicker5' name="time" placeholder="Enter time" />
                  </div>
                  <label class="control-label col-sm-1" for="time"></label>
                  <div class="col-sm-4">
                    <input type='hidden' class="form-control" id='datetimepicker6' name="time_last" placeholder="Enter time" />
                  </div>
                </div>
                        <input style="display:none" type='text'  name="num_booking" value="<?php echo $num_booking; ?>" />
                        <div class="form-group">
                          <button type="submit" name="submita" class="btn btn-default">Submit</button>
                        </div>  
                          </form>
                          
                          <div style="color:#000000" class="panel panel-default">
                              <div class="panel-heading">Reminder</div>
                              <div class="panel-body"><strong> 1.PLEASE READ THE TERMS & CONDITIONS. <br/> 2.PLEASE MAKE SURE YOUR DETAILS IS CORRECT BEFORE SUBMIT </strong><br/>
                              </div>
                            </div>
                  </div> 
                  
          
          
          
                                  
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" style="color:#000000;">Terms & Conditions</h4>
                        </div>
                        <div class="modal-body" style="overflow-y: scroll; height: 450px;">
                          <p style="color:#000000; text-align:left;">
                          1. False, inaccurate, misleading, unlawful, harmful, threatening, abusive, tortuous, harassing, defamatory, libelous, invasive of another's privacy, vulgar, profane, sexually oriented/suggestive/explicit, obscene, racially or ethnically offensive or otherwise objectionable.<br/>
						  2. Violates any laws, third party rights, or infringes on any patent, trademark, trade secret, copyright or other proprietary rights of any party.<br/>
						  

</div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                <div class="clearfix"></div>
            </div>
        </div>

        

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                   <p>Copyright &copy; UNIVERSITI MALAYSIA PAHANG 2002 - 2016</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/vegas.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="js/moment.js"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
            $(function () {
                $('#datetimepicker3').datetimepicker({
					format: 'DD/MM/YYYY',
				});
                $('#datetimepicker4').datetimepicker({
					format: 'DD/MM/YYYY',
				});
				$('#datetimepicker5').datetimepicker({
					format: 'h:m A',
				});
                $('#datetimepicker6').datetimepicker({
					format: 'h:m A',
				});
            });
    </script>

</body>

</html>
