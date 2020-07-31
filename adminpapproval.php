<?php 
include("config.php");
session_start();

if (!isset($_SESSION['user'])) {
	header('Location: login.php');
}

$orderid = $_GET["orderid"];

$stmt = $dbo->prepare("SELECT * FROM user_booking WHERE num_user_booking = :pkorder");
$stmt->bindParam(':pkorder', $orderid); 
$stmt->execute();
$s = $stmt->fetch(PDO::FETCH_ASSOC);
$fkmatch = $s["num_booking"];

if(isset($_POST["approve"])) {
	
		$sql = "UPDATE user_booking SET pstatus = :paydes , price =:prices , remarks =:remark
            WHERE num_user_booking = :pkorder";
		$stmt = $dbo->prepare($sql);
		$stmt->bindParam(':paydes', $_POST["pstatus"], PDO::PARAM_STR);
                $stmt->bindParam(':prices', $_POST["price"], PDO::PARAM_STR);
                $stmt->bindParam(':remark', $_POST["remarks"], PDO::PARAM_STR);
		$stmt->bindParam(':pkorder', $orderid, PDO::PARAM_STR); 	
		$stmt->execute();
		
		header('Location: adminpapproval.php?orderid='.$orderid);
	
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
                        <strong>Payment Approvals</strong>
                    </h2>
                    <hr>
					
					<div class="inner cover" style="height:400px; overflow-y: scroll;">
          <br/>
			  <h1>Payment</h1>
              <h3><?php if (!empty($s["pay"])) { ?><span class="glyphicon glyphicon-edit"></span> Approval<?php } else { ?><span class="glyphicon glyphicon-edit"></span> Approval<?php } ?></h3>
              <h4><?php if ($s["pstatus"] == "1") { ?><span style="color:green;" >Payment Status = Recieved</span><?php } else { ?><span style="color:yellow;" >Payment Status = Pending</span><?php } ?></h4>
              <br/><br/>
              <?php if (!empty($s["pay"])) { ?>
				  
				<!-- <img src="upload/<?php echo $orderid; ?>/<?php echo $s["pay"];?>" class="img-thumbnail" alt="" width="304" height="236">  -->
				  
			  <?php } ?>	  
              <br/><br/>
              <form class="form-horizontal" enctype="multipart/form-data" id="buy" name="buy" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?orderid=<?php echo $orderid; ?>">
              <div class="form-group">
                  <label class="control-label col-sm-2" for="pstatus">Payment Status:</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="pstatus" id="pstatus" style="color:#656565" required>
                    	<option value="0" >Pending</option>
                    	<option value="1" >Approve</option>
                    	<!--<option value="RM25 - Pentas Utama" >RM25 - Pentas Utama</option>-->
                    </select>
                      <br>
                  </div>
                  
                  <label class="control-label col-sm-2" for="price">Price:</label>
                  <div class="form-group">
                          <div class="col-sm-5">
                          <input type="text" class="form-control" required id="price" name="price" placeholder="Enter Price">
                          </div>
                </div>
                  
                  <label class="control-label col-sm-2" for="remarks">Remark:</label>
                  
                          <div class="col-sm-8">
                          <textarea rows="4" cols="80" class="form-control" required id="remarks" name="remarks" placeholder="Enter Remarks"></textarea>
                          </div>
                
                  
                 
                     
                  <br><br><br><br><br><br>
                          <button type="submit" name="approve" class="btn btn-success"><span class="glyphicon glyphicon-hdd"></span>&nbsp; Submit</button>
                 
              </form>
              <br/><br/>
              <table class="table">
                <tbody>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>Booking ID:</strong></td>
                    <td style="text-align:left"><?php echo $s["num_user_booking"]; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left" width="30%"><strong>Bus ID:</strong></td>
                    <td style="text-align:left"><?php echo $s["num_booking"]; ?></td>
                  </tr>
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
                    <td style="text-align:left" width="30%"><strong>Time:</strong></td>
                    <td style="text-align:left"><?php echo $s["time"]; ?> &nbsp;<strong>to</strong>&nbsp; <?php echo $s["time_last"]; ?></td>
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
                  <tr>
                    <td style="text-align:left" width="30%"><strong>Paper Work (Program):</strong></td>
                    <td style="text-align:left"><?php echo $s["pay"]; ?></td>
                  </tr>
                </tbody>
              </table>
              
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
