<?php 
include("config.php");
session_start();


if (!isset($_SESSION['user'])) {
	header('Location: login.php');
}

$stmta = $dbo->prepare('SELECT * FROM user_booking ORDER BY num_user_booking DESC');
$stmta->execute();



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
    <link href="css/bootstrap-editable.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
	<link href="css/cover.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
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
                        <strong>Customer Booking List</strong>
                    </h2>
                    <hr>
					
					<div class="inner cover">
            <br><br>

      	<p></p>                                                                                      
          <div class="table-responsive" style=" width: 1950px;" >          
                <table class="table" id="vieworders" >
                    <thead>
                      <tr>
                        <th>Booking ID</th>
                        <th>Bus ID</th>
                        <th>Name</th>
                        <th>NRIC</th>
                        <th>Student ID</th>
                        <th>Faculty</th>
                        <th>Date</th>
                        <th>E-mail</th>
                        <th>Addr.</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Postc.</th>
                        <th>Price</th>
                        <th>Remarks</th>
                        <th>Paper Work</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody style="color:#000000">
                    <?php while($sa = $stmta->fetch(PDO::FETCH_ASSOC)) { 
					
					$stmtb = $dbo->prepare('SELECT * FROM booking_bus WHERE num_booking = :num_booking');
		 			$stmtb->bindParam(':num_booking', $sa["num_booking"], PDO::PARAM_STR);
					$stmtb->execute();
					$sb = $stmtb->fetch(PDO::FETCH_ASSOC);
					?>
                      <tr id="<?php echo $sa["num_user_booking"]; ?>">
                        <td><?php echo $sa["num_user_booking"]; ?></td>
                        <td><?php echo $sa["num_booking"]; ?></td>
                        <td><?php echo $sa["name"]; ?></td>
                        <td><?php echo $sa["nric"]; ?></td>
                        <td><?php echo $sa["std_id"]; ?></td>
                        <td><?php echo $sa["faculty"]; ?></td>
                        <td><?php echo $sa["date"]; ?> to <?php echo $sa["date_last"]; ?></td>
                        <td><?php echo $sa["email"]; ?></td>
                        <td><?php echo $sa["address"]; ?></td>
                        <td><?php echo $sa["phone"]; ?></td>
                        <td><?php echo $sa["city"]; ?></td>
                        <td><?php echo $sa["state"]; ?></td>
                        <td><?php echo $sa["postcode"]; ?></td>
                        <td><?php echo $sa["price"]; ?></td>
                        <td><?php echo $sa["remarks"]; ?></td>
                        
						<td><?php if ($sa["paper_work"] != "") { ?><a style="color:blue" href="upload/<?php echo $sa["num_user_booking"]; ?>/status/<?php echo $sa["paper_work"]; ?>" >Download</a><?php } ?></td>
                        <td><?php if ($sa["paper_work"] == "") { ?><span style="color:#FF0004" >Not Proc.</span><?php } elseif ($sa["paper_work"] != "") { 
						if ($sa["status"] == "0") { ?>
                        <span><a  style="color:yellow;"  target="_blank" href="adminapproval.php?orderid=<?php echo $sa["num_user_booking"]; ?>" >Pending</a></span><?php }  elseif ($sa["status"] == "1") { ?>
                        <span ><a target="_blank"  style="color: green;" href="adminapproval.php?orderid=<?php echo $sa["num_user_booking"]; ?>" >Approved</a></span><?php }  elseif ($sa["status"] == "3") { ?>
						<span ><a target="_blank"  style="color: red;" href="adminapproval.php?orderid=<?php echo $sa["num_user_booking"]; ?>" >Rejected</a></span><?php } }?>
						</td>
						
						<td><?php if ($sa["pay"] != "") { ?><a style="color:blue" href="upload/<?php echo $sa["num_user_booking"]; ?>/pstatus/<?php echo $sa["pay"]; ?>" >Download</a><?php } ?></td>
                        <td><?php if ($sa["pay"] == "") { ?><span style="color:#FF0004" >Not Proc.</span><?php } elseif ($sa["pay"] != "") { 
						if ($sa["pstatus"] == "0") { ?>
                        <span><a  style="color:yellow;"  target="_blank" href="adminpapproval.php?orderid=<?php echo $sa["num_user_booking"]; ?>" >Pending</a></span><?php }  elseif ($sa["pstatus"] == "1") { ?>
                        <span ><a target="_blank"  style="color: green;" href="adminpapproval.php?orderid=<?php echo $sa["num_user_booking"]; ?>" >Approved</a></span><?php }  elseif ($sa["pstatus"] == "3") { ?>
						<span ><a target="_blank"  style="color: red;" href="adminpapproval.php?orderid=<?php echo $sa["num_user_booking"]; ?>" >Rejected</a></span><?php } }?>
					    
						<td><a id="<?php echo $sa["num_user_booking"];?>" class="btn btn-danger delete"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a></td>
                      </tr>
                     <?php } ?> 
                    </tbody>
                </table>
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

	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-editable.min.js"></script>
    <script src="js/vegas.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="js/moment.js"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript">
	$(document).ready( function () {
		$('#vieworders').DataTable({
		searching: true,
		paging: false,
		ordering:  true,
        scrollY:   "400px",
        scrollCollapse: true,
		});
	} );
	</script>
        
	<script type="text/javascript" >
		
		$(document).ready(function()
		{
			$('table#vieworders td a.delete').click(function()
			{
				if (confirm("Are you sure you want to delete this row?"))
				{
					var id = $(this).parent().parent().attr('id');
					var data = 'id=' + id ;
					var parent = $(this).parent().parent();
		 
					$.ajax(
					{
						   type: "POST",
						   url: "deletevieworders.php",
						   dataType: "json",
						   data: data,
						   cache: false,
		 
						   success: function()
						   {
							
							setTimeout(function(){location.reload(true);},50)
							
						   }
					 });
				}
			});
		 
		
		});
		
		
		</script>
	
</body>

</html>
