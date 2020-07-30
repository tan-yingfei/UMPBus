<?php
include("config.php");

$datefrom = "";
$dateto="";
$busid ="";

if(isset($_POST['date']) && isset($_POST['date_last']) && isset($_POST['busid'])) {
	$datefrom = $_POST['date'];
	$dateto = $_POST['date_last'];
	$datefrom = date('Y-m-d', strtotime(str_replace('-', '/', $datefrom)));
	$dateto = date('Y-m-d', strtotime(str_replace('-', '/', $dateto)));
	$busid = $_POST['busid'];
	//echo "SELECT * FROM booking_bus LEFT JOIN user_booking ON booking_bus.num_booking = user_booking.num_booking WHERE user_booking.date_from >= '$datefrom' AND user_booking.date_last <= '$dateto' ";
	$stmta = $dbo->prepare("SELECT * FROM `user_booking` WHERE num_booking = '$busid' AND ('$datefrom'<=date_last) AND ('$dateto' >= date)");
	$stmta->execute();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>eBooking Online UMP Bus</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

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
					<div class="brand">UMP BUS BOOKING </div>
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

    <div class="container text-center">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Choose Date and Bus ID</strong>
                    </h2>
                    <hr>
					<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" >
				<div class="form-group">
					<label class="control-label col-sm-2" for="date">From :</label>
					<div class="col-sm-4">
						<input type='text' class="form-control" id='datetimepicker3' name="date" placeholder="Enter date" value="<?php if (isset($_POST['date'])) { echo $_POST['date']; } ?>" />
					</div>
						<label class="control-label col-sm-1" for="date"> To : </label>
					<div class="col-sm-4">
						<input type='text' class="form-control" id='datetimepicker4' name="date_last" placeholder="Enter date" value="<?php if (isset($_POST['date_last'])) { echo $_POST['date_last']; } ?>" />
					</div>
					
					<br/>
					<br/>
					<br>
					<label class="control-label col-sm-4" for="date" align="right" valign="center">Bus :</label>
					<div class="col-sm-5">
						<select class="form-control" name="busid" id="busid" required>
							<option value="" >Please select bus</option>
						<?php 
							$sql = $dbo->prepare("SELECT * FROM `booking_bus`");
							$sql->execute();
							$result = $sql->fetchAll();
							foreach(array_chunk($result, 3, true) as $chunked ) { 
								foreach($chunked as $detail) {
									?>
									<option value="<?php echo $detail['num_booking']; ?>" <?php if (isset($_POST['busid'])) { if ($_POST['busid'] == $detail['num_booking']) { echo "selected"; } } ?> ><?php echo $detail['title']; ?></option>
									<?php
								
								}
							}
							
						?>
						</select>
					</div>
				</div>
				<br><br>
				<div class="col-sm-12">
						<button type="submit" class="btn btn-primary " name="searchdate" id="searchdate">
							<b><span class="glyphicon glyphicon-search"></span>&nbsp;Search</b>
						</button>
					</div>
			</form>
			</br>
			</br>

		  <?php 
		  if (!empty($datefrom) && !empty($dateto)) {
          $result = $stmta->fetchAll();
		  if (!empty($result)) {
		  foreach(array_chunk($result, 3, true) as $chunked ) { 
		  ?>
          <div class="row">
          	<?php foreach($chunked as $detail) { ?>
           
                <br>
            	<div id="noty-holder"></div>
          
            <?php } ?>
          </div>
          <p>&nbsp;</p>
			  <?php }
                          
                          
			  } else {
				  ?>
				  <a href="booking1.php?id=<?php echo $busid; ?>&datefrom=<?php echo $_POST['date']; ?>&datetto=<?php echo $_POST['date_last']; ?>" class="btn btn-primary btn-lg" style="min-width:220px">
				  <span style="font-size:17px;" >Bus is Available ! Proceed --></span>
				  </a>
				  <?php
			  }

		  }
                  
                  ?>
					
					
                </div>
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6">
                    
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
	 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
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
		
            });
			function createNoty(message, type) {
				var html = '<div class="alert alert-' + type + ' alert-dismissable page-alert">';    
				html += '<button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>';
				html += message;
				html += '</div>';    
				$(html).hide().prependTo('#noty-holder').slideDown();
			};

			$(function(){
				createNoty('Sorry no bus available', 'danger');
				$('.page-alert .close').click(function(e) {
					e.preventDefault();
					$(this).closest('.page-alert').slideUp();
				});
			});
    </script>
    <script>
    $('body').vegas({
		slides: [
			{ src: 'img/bg/bg1.jpg' }
		],
		overlay: "img/bg/overlays/02.png"
	});
	</script>

</body>

</html>
