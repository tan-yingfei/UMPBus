<?php 
include("config.php");
session_start();
	
	$num_booking = $_POST["num_booking"];
	$name = $_POST["name"];
	$nric = $_POST["nric"];
        $std_id = $_POST ["std_id"];
        $faculty = $_POST ["faculty"];
        $date = $_POST["date"];
        $date_last = $_POST["date_last"];
        $time = $_POST ["time"];
        $time_last = $_POST ["time_last"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$address = $_POST["address"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$postcode = $_POST["postcode"];
      //  $paper_work = $_POST ["paper_work"];
	$date = date('Y-m-d', strtotime(str_replace('-', '/', $date)));
	$date_last = date('Y-m-d', strtotime(str_replace('-', '/', $date_last)));
	
	if (isset($_POST["submit"])) {
	
	$submit = true;
	
        $num_booking = $_POST["num_booking"];
	$name = $_POST["name"];
	$nric = $_POST["nric"];
        $std_id = $_POST ["std_id"];
        $faculty = $_POST ["faculty"];
        $date = $_POST["date"];
        $date_last = $_POST["date_last"];
        $time = $_POST ["time"];
        $time_last = $_POST ["time_last"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$address = $_POST["address"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$postcode = $_POST["postcode"];
	$status = "0";
	$pstatus = "0";
        //$paper_work = $_POST ["paper_work"];
	//$paydes = "3";
	

$sql = "INSERT INTO user_booking (num_booking, name, nric, std_id, faculty, date, date_last, time, time_last, email, phone, address, city, state, postcode, status, pstatus) VALUES (:num_bookingd, :named, :nricd, :std_idd, :facultyd, :dated, :date_lastd, :timed, :time_lastd, :emaild, :phoned, :addressd, :cityd, :stated, :postcoded, :status, :pstatus)";
$stmt = $dbo->prepare($sql);
$stmt->bindParam(':num_bookingd', $num_booking, PDO::PARAM_STR);
$stmt->bindParam(':named', $name, PDO::PARAM_STR);
$stmt->bindParam(':std_idd', $std_id, PDO::PARAM_STR);
$stmt->bindParam(':facultyd', $faculty, PDO::PARAM_STR);
$stmt->bindParam(':dated', $date, PDO::PARAM_STR);
$stmt->bindParam(':date_lastd', $date_last, PDO::PARAM_STR);
$stmt->bindParam(':timed', $time, PDO::PARAM_STR);
$stmt->bindParam(':time_lastd', $time_last, PDO::PARAM_STR);
$stmt->bindParam(':nricd', $nric, PDO::PARAM_STR);
$stmt->bindParam(':emaild', $email, PDO::PARAM_STR);
$stmt->bindParam(':phoned', $phone, PDO::PARAM_STR);
$stmt->bindParam(':addressd', $address, PDO::PARAM_STR);
$stmt->bindParam(':cityd', $city, PDO::PARAM_STR);
$stmt->bindParam(':stated', $state, PDO::PARAM_STR);
$stmt->bindParam(':postcoded', $postcode, PDO::PARAM_STR);
$stmt->bindParam(':status', $status, PDO::PARAM_STR);
$stmt->bindParam(':pstatus', $pstatus, PDO::PARAM_STR);
//$stmt->bindParam(':paper_workd', $paper_work, PDO::PARAM_STR);
//$stmt->bindParam(':paydes', $paydes, PDO::PARAM_STR);
if($stmt->execute()) {
	$result = true;
	
	$LastInsert = $dbo->lastInsertId($std_id); 
	
	
	$filename = "/upload/" . $LastInsert . "/";
	$filename = "/upload/" . $LastInsert . "/";
	
	mkdir("upload/"  . $LastInsert, 0777);
	mkdir("upload/"  . $LastInsert . "/pstatus", 0777);
	mkdir("upload/"  . $LastInsert . "/status", 0777);
	header('Location:booking2.php?orderid='.$LastInsert);
       
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

    <title>eReservation Online UMP Bus</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	 <link href="css/bootstrap.min1.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/vegas.css">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
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
                        <strong>Confirmation Page</strong>
                    </h2>
                    <hr>
					 <div class="inner cover" style="height:400px; overflow-y: scroll;">
              <br/>
              <h3><span class="glyphicon glyphicon-check"></span>&nbsp; Confirmation Page</h3>
              <br/><br/>
              <table class="table">
                <tbody>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>Name:</strong></td>
                    <td style="text-align:left"><?php echo $name; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>NRIC:</strong></td>
                    <td style="text-align:left"><?php echo $nric; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>Student ID:</strong></td>
                    <td style="text-align:left"><?php echo $std_id; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>Faculty:</strong></td>
                    <td style="text-align:left"><?php echo $faculty; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>Date:</strong></td>
                    <td style="text-align:left"><?php echo $date; ?> &nbsp;<strong>to</strong>&nbsp; <?php echo $date_last; ?></td>
                  </tr>
                
                  <tr>
                    <td style="text-align:left" width="30%"><strong>E-Mail:</strong></td>
                    <td style="text-align:left"><?php echo $email; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>Phone:</strong></td>
                    <td style="text-align:left"><?php echo $phone; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>Address:</strong></td>
                    <td style="text-align:left"><?php echo $address; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>City:</strong></td>
                    <td style="text-align:left"><?php echo $city; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>State:</strong></td>
                    <td style="text-align:left"><?php echo $state; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>Postcode:</strong></td>
                    <td style="text-align:left"><?php echo $postcode; ?></td>
                  </tr>
                  <!--
                  <tr>
                    <td style="text-align:left" width="30%"><strong>Paper Work (Program):</strong></td>
                    <td style="text-align:left"><?php echo $paper_work; ?></td>
                  </tr>-->
                </tbody>
              </table>
              <form class="form-horizontal" id="aticket" name="aticket" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group" style="display:none;">
                    
                    <input type='text' class="form-control" name="name" value="<?php echo $name; ?>"/>
                    <input type='text' class="form-control" name="nric" value="<?php echo $nric; ?>"/>
                    <input type='text' class="form-control" name="std_id" value="<?php echo $std_id; ?>"/>
                    <input type='text' class="form-control" name="faculty" value="<?php echo $faculty; ?>"/>
                    <input type='text' class="form-control" name="date" value="<?php echo $date; ?>"/>
                    <input type='text' class="form-control" name="date_last" value="<?php echo $date_last; ?>"/>
                    <input type='text' class="form-control" name="time" value="<?php echo $time; ?>"/>
                    <input type='text' class="form-control" name="time_last" value="<?php echo $time_last; ?>"/>
                    <input type='text' class="form-control" name="email" value="<?php echo $email; ?>"/>
                    <input type='text' class="form-control" name="phone" value="<?php echo $phone; ?>"/>
                    <input type='text' class="form-control" name="address" value="<?php echo $address; ?>"/>
                    <input type='text' class="form-control" name="city" value="<?php echo $city; ?>"/>
                    <input type='text' class="form-control" name="state" value="<?php echo $state; ?>"/>
                    <input type='text' class="form-control" name="postcode" value="<?php echo $postcode; ?>"/>
                    <input type='text' class="form-control" name="paper_work" value="<?php echo $paper_work; ?>"/>
                    <input type='text' class="form-control" name="num_booking" value="<?php echo $num_booking; ?>"/>
                </div>
                
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-default"><strong><span class="glyphicon glyphicon-ok"></span>&nbsp; Proceed to Submit</strong></button>
                        </div>  
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
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/vegas.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="js/moment.js"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
    

</body>

</html>
