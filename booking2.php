<?php 
include("config.php");
session_start();

$orderid = $_GET["orderid"];

$stmt = $dbo->prepare("SELECT * FROM user_booking WHERE num_user_booking = :num_user_booking");
$stmt->bindParam(':num_user_booking', $orderid); 
$stmt->execute();
$s = $stmt->fetch(PDO::FETCH_ASSOC);

$num_booking = $s["num_booking"];




if(isset($_POST["picasub"])) {
	
$target_dir = "upload/".$s["num_user_booking"]."/status/";
$target_file = $target_dir . basename($_FILES["pica"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


if(isset($_POST["submit"])) 
{
    $check = getimagesize($_FILES["pica"]["tmp_name"]);
    if($check !== false) 
    {
        echo "File is  - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else 
    {
        echo "File is not.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) 
{
    unlink($target_file);
    $uploadOk = 1;
}

if ($_FILES["pica"]["size"] > 2000000) 
{
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "pdf" ) 
{
    echo "Sorry, only DOC, DOCX, PDF, JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) 
{
    echo "Sorry, your file was not uploaded.";

}

else 
    {
    if (move_uploaded_file($_FILES["pica"]["tmp_name"], $target_file)) 
    {
        echo "The file ". basename( $_FILES["pica"]["name"]). " has been uploaded.";
		$uploaded = true;
		$status = "0";
		$sql = "UPDATE user_booking SET paper_work = :paper_work, status = :status 
            WHERE num_user_booking = :pkorder";
		$stmt = $dbo->prepare($sql);
		$stmt->bindParam(':paper_work', $_FILES["pica"]["name"], PDO::PARAM_STR); 
		$stmt->bindParam(':pkorder', $orderid, PDO::PARAM_STR); 	
		$stmt->bindParam(':status', $status, PDO::PARAM_STR); 	
		$stmt->execute();
		
		header('Location: booking2.php?orderid='.$orderid.'&f=1');
    } 
    else 
    {
        echo "Sorry, there was an error uploading your file.";
    }
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
                        <strong>Bookings and Approvals</strong>
                    </h2>
                    <hr>
					
					<div class="inner cover" style="height:400px; overflow-y: scroll;">
          <br/><br/><br/>
          <div class="alert alert-success" role="alert" style="text-shadow: none; color:#000000;">
              Well done! successfully processed.</div>
              <br/>
              <h3><span class="glyphicon glyphicon-list-alt"></span>&nbsp; BOOKING ID</h3>
              <a style="font-size: 18px" class="btn btn-default" ><?php echo $orderid; ?></a>
              <br/><br/>
		
              <p style="font-size: 24px; color: red;" >*Please Remember this booking ID to check your Approval*</p>
			  <?php if (empty($s["paper_work"])) { ?><p style="font-size: 24px; color: red;">*Please Upload Your Paperwork*</p><?php } else { ?><p style="font-size: 24px; color: green;">*Paperwork Uploaded*</p><?php } ?>
			 
             
              <?php if ($s["pstatus"] != "1") { ?>
              <form class="form-horizontal" enctype="multipart/form-data" id="buy" name="buy" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?orderid=<?php echo $orderid; ?>">
              	<div class="form-group">
                          <label class="control-label col-sm-5" for="pica"><?php if (!empty($s["paper_work"])) { ?> Change Paper Work:<?php } else { ?>Paper Work<?php } ?></label>
                          <div class="col-sm-7">
                          <input type="file" required class="form-control" id="pica" name="pica">
                          </div>
                 </div>
                 <div class="form-group">
                          <button type="submit" name="picasub" class="btn btn-default">Submit</button>
                 </div>
              </form>
              <?php } ?>
			  
			  <br/><br/>
              
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
                  <!--
                  <tr>
                    <td style="text-align:left" width="30%"><strong>Paper Work (Program):</strong></td>
                    <td style="text-align:left"><?php echo $s["paper_work"]; ?></td>
                  </tr>-->
                </tbody>
              </table>
              
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
