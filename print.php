<?php 
include("config.php");
session_start();
$orderid = $_GET["orderid"];
$stmt = $dbo->prepare("SELECT * FROM user_booking WHERE num_user_booking = :pkorder");
$stmt->bindParam(':pkorder', $orderid); 
$stmt->execute();
$s = $stmt->fetch(PDO::FETCH_ASSOC);
$fkmatch = $s["num_booking"];

$stmta = $dbo->prepare("SELECT * FROM booking_bus WHERE num_booking = :pkorder");
$stmta->bindParam(':pkorder', $s["num_booking"]); 
$stmta->execute();
$sa = $stmta->fetch(PDO::FETCH_ASSOC);

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


    <div class="container text-center">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Payment Slip</strong>
                    </h2>
                    <hr>
					
					<body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">
			    
             <img src="img/rasmi.png" alt="" width="100" height="100" /><br/><br/>
              <?php if ($s["pstatus"] == "1") { ?>
			  <h3><?php echo $sa["title"]; ?></h3>
			  <h4><?php echo $sa["driver"]; ?></h4>
			  <h5><?php echo $sa["place"]; ?></h5>
              <p>Hi <?php echo $s["name"]; ?>, your transaction is accepted, please print this letter as a ticket
              <table class="table">
                <tbody>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>Name:</strong></td>
                    <td style="text-align:left"><?php echo $s["name"]; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>NRIC:</strong></td>
                    <td style="text-align:left"><?php echo $s["nric"]; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>Student ID:</strong></td>
                    <td style="text-align:left"><?php echo $s["std_id"]; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>Faculty:</strong></td>
                    <td style="text-align:left"><?php echo $s["faculty"]; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>Date:</strong></td>
                    <td style="text-align:left"><?php echo $s["date"]; ?> &nbsp;<strong>to</strong>&nbsp; <?php echo $s["date_last"]; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>E-Mail:</strong></td>
                    <td style="text-align:left"><?php echo $s["email"]; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>Phone:</strong></td>
                    <td style="text-align:left"><?php echo $s["phone"]; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>Address:</strong></td>
                    <td style="text-align:left"><?php echo $s["address"]; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>City:</strong></td>
                    <td style="text-align:left"><?php echo $s["city"]; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>State:</strong></td>
                    <td style="text-align:left"><?php echo $s["state"]; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>Postcode:</strong></td>
                    <td style="text-align:left"><?php echo $s["postcode"]; ?></td>
                  </tr>
                 
                  
                </tbody>
              </table>
              <form>
                    <input type="button" value="Print" class="btn btn-default" onClick="window.print()">
                  </form>
              <?php } ?>
              <br/><br/>
              
              
           </div>   
          
                         
				<div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- /.container -->

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

</body>

</html>
