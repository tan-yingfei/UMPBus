<?php 
include("config.php");
session_start();


if (!isset($_SESSION['user'])) {
	header('Location: login.php');
}

if (isset($_POST["submit"])) {
	
	$submit = true;
	$title = $_POST["title"];
	$date = $_POST["date"];
    $date_last = $_POST["date_last"];
	$time = $_POST["time"];
    $time_last = $_POST["time_last"];
    $driver = $_POST["driver"];
	//$place = $_POST["place"];
	$date = date('Y-m-d', strtotime(str_replace('-', '/', $date)));
	$date_last = date('Y-m-d', strtotime(str_replace('-', '/', $date_last)));


$sql = "INSERT INTO booking_bus (title, date, date_last, time, time_last, driver) VALUES (:a, :b, :c, :d, :e, :f)";
$stmt = $dbo->prepare($sql);
$stmt->bindParam(':a', $title, PDO::PARAM_STR); 
$stmt->bindParam(':b', $date, PDO::PARAM_STR);
$stmt->bindParam(':c', $date_last, PDO::PARAM_STR);
$stmt->bindParam(':d', $time, PDO::PARAM_STR);
$stmt->bindParam(':e', $time_last, PDO::PARAM_STR);
$stmt->bindParam(':f', $driver, PDO::PARAM_STR);
//$stmt->bindParam(':g', $place, PDO::PARAM_STR);

if($stmt->execute()) {
	$result = true;
}

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
	<link href="css/bootstrap.min1.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
	<link href="css/cover.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.css" />
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
                        <a href="admin.php">Admin Home</a>
                    </li>
                    <li>
                        <a href="add.php">Add Bus</a>
                    </li>
                    <li>
                        <a href="view.php">View Bus</a>
                    </li>
					<li>
                        <a href="vieworders.php">View Orders</a>
                    </li>
					
                    <li>
                        <a href="logout.php">Logout</a>
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
                        <strong>Add New Bus</strong>
                    </h2>
                    <hr>
                </div>
				
				

          <div class="inner cover">
          <?php if (isset($submit)) { ?>
          <?php if (isset($result)) { ?>
          <div class="alert alert-success" role="alert">Well done! Successfully processed.</div>
          <?php } else { ?>
          <div class="alert alert-warning" role="alert">Oh snap! Please try again.</div>
          <?php } ?>
          <?php } ?>
          <br />
              <!--<h2>Add Match</h2>-->
              <p></p>
              <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="title">Title:</label>
                  <div class="col-sm-4">
                    <input type="title" class="form-control" id="title" name="title" placeholder="Enter title">
                  </div>
                </div>
				<div class="form-group">
                  <label class="control-label col-sm-2" for="driver">Driver:</label>
                  <div class="col-sm-4">
                    <input type='text' class="form-control" id='driver' name="driver" placeholder="Enter driver" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="date"></label>
                  <div class="col-sm-4">
                    <input type='hidden' class="form-control" id='datetimepicker3' name="date" placeholder="Enter date" />
                  </div>
                  <label class="control-label col-sm-1" for="date"></label>
                  <div class="col-sm-4">
                    <input type='hidden' class="form-control" id='datetimepicker4' name="date_last" placeholder="Enter date" />
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
                <!--
                <div class="form-group">
                  <label class="control-label col-sm-2" for="time">Place:</label>
                  <div class="col-sm-6">
                    <input type='text' class="form-control" id='place' name="place" placeholder="Enter place" />
                  </div>
                </div>-->
                <button type="submit" class="btn btn-success" name="submit"><b><span class="glyphicon glyphicon-hdd"></span>&nbsp; Submit</b></button>
              </form>
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