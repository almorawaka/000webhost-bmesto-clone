<?php
require('db.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from spareparts where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
	<head>
	<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> Edit Spares</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0"> 
	</head>
	
	<div class="card text-center">
	  <div class="card-header">
	  <div class="card-footer text-muted">
		
	</div>
 <div class="card-body">
		<body>
		<div id="main">
	<div id="header">
	  <div id="logo">
		<div id="logo_text">
		  <!-- class="logo_colour", allows you to change the colour of the text -->
		  <h1><a href="home.php"> <span class="logo_colour"> </span></a></h1>
		  <h2>Division of Biomedical Engineering Services</h2>   
		  <h4> DEPARTMENT OF HEALTH SERVICES  </h4>
		
        <div class="container overflow-hidden">
            <div class="row gx-5">
                <div class="col">
                <div class="p-3 border bg-light">
		
		<div class="form">		
		<h4>Update Record</h4>
			<?php
			$status = "";
			if(isset($_POST['new']) && $_POST['new']==1)
			{
			$id=$_REQUEST['id'];
			$j_id =$_REQUEST['job_id'];
			$hospital_name =$_REQUEST['hospital_name'];
			$h_book =$_REQUEST['Hbook'];
			$s_no=$_REQUEST['stock_no'];
			$desc=$_REQUEST['description'];
			$qty=$_REQUEST['qty'];
		
			$submittedby = $_SESSION["username"];
 			

			//$update=" update spareparts set job_id='".$j_id."', hospital_name='".$hospital_name."', Hbook='".$h_book."',stock_no='".$s_no."',description='".$desc."',qty='".$qty."', submittedby='".$submittedby."' where id='".$id."'";
			$update="UPDATE `spareparts` SET `job_id`='".$j_id."',`hospital_name`='".$hospital_name."',`Hbook`='".$h_book."',`stock_no`='".$s_no."',`description`='".$desc."',`qty`='".$qty."',`submitby`='".$submittedby."' WHERE `id`='".$id."'";
			mysqli_query($con, $update) or die(mysqli_error());
			$status = "Record Updated Successfully. </br></br> <a href='view.php'>View Updated Record</a>";		
			echo '<p style="color:#FF0000;">'.$status.'</p>';
			}else {
			?>
			<p>	<a href="view_spare_parts.php?id=<?php echo $row["job_id"]; ?>"> View Updated Record </a> </p>
		<div>
        <form name="form" method="post" action=""> 
		<input type="hidden" name="new" value="1" />
		<p><input name="id" type="hidden" value="<?php echo $row['id'];?>" /></p>
		<p><input type="text" name="id" placeholder="id"  required value=" <?php echo $row['id'];?>" /></p>
		<p><input type="text" name="job_id" placeholder="Job Card No" required value=" <?php echo $row['job_id'];?>"/></p>
        <p><input type="text" name="hospital_name" placeholder="Hospital" required value=" <?php echo $row['hospital_name'];?>"/></p>
		<p><input type="text" name="Hbook" placeholder=" H 500" required value="<?php echo $row['Hbook'];?>"/></p>
		<p><input type="text" placeholder="Stock No" name="stock_no" required value="<?php echo $row['stock_no'];?>"/></p>
        <p><input type="text" placeholder="Description" name="description" required value ="<?php echo $row['description'];?>"/></p>
		<p><input type="text" placeholder="Quentity" name="qty" required value= "<?php echo $row['qty'];?>"></p> 
		
		<p><input name="submit" type="submit" value="Update" /></p>
		</form>
		<?php } ?>

		<br /><br /><br /><br />
		
		</div>
		</div>
		</body>
		
		<div class="caard-text center">
	<div class="card-footer ">
	<div class="card-footer text-muted">
	
		<a class="btn btn-primary" href="dashboard.php" role="button">DASH BOARD</a>
		<!-- <a class="btn btn-primary" target="blank" href="http://localhost/eldb/jobcardnew/fpdf/index.php" role="button">PRINT LAST JOB</a> -->
		<a class="btn btn-primary" href="view.php" role="button">VIEW ALL JOBS</a>
		<a class="btn btn-primary" href="insert.php" role="button">OPEN NEW JOB CARD</a>
	</div>
	</div>
	</div>
</html>
