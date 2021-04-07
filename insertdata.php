<?php 
session_start();
include('includes/config.php');
    ?>
<!DOCTYPE html>
<html>
<title>Send news</title>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/modern-business.css" rel="stylesheet">
<link href="css/post.css" rel="stylesheet">
	<?php

//if upload is pressed
if(isset($_POST['upload']))
{
	if((getimagesize($_FILES['image1']['tmp_name'])) == FALSE)
{
echo "Please select an image.";
}else{
	$target ="images/".basename($_FILES['image1']['name']);
	
	//connect to database
	$db=mysqli_connect("localhost","root","","newsportal");
	
	// get all the submitted data from the form
	$image=$_FILES['image1']['name'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	
	
	//stores the uploaded data into database
	$sql="INSERT INTO images(image,name,email,subject,message) VALUES ('$image','$name','$email','$subject','$message')";
	mysqli_query($db,$sql);
}
if(move_uploaded_file($_FILES['image1']['tmp_name'], $target))
	{
		$msg="Image Uploaded Successfully";
		}else{
			$msg="Image Not uploaded";
			}
	}
?>
</head>
<body>
<?php include('includes/header.php');?>
<div class="container">
<center>
<div class="col-md-8 centered" style="margin-top: 4%">
        <!-- Blog Entries Column -->
	
	<form class="text-center" action="insertdata.php" method="post" enctype="multipart/form-data">
	<p class="h4 mb-4">SEND US YOUR NEWS</p>
	<br>
	<input type="text" class="form-control mb-4" name="name" placeholder="Name">
	<p>upload image</p>
	<input type="file" class="form-control mb-4" name="image1" accept="image" required>
	<input type="email" class="form-control mb-4" name="email" placeholder="email">
	<input type="text" class="form-control mb-4" name="subject" placeholder="news title">
	<textarea type="text" rows="15" cols="80" class="form-control mb-4" name="message" placeholder="news details"></textarea>
	<input type="submit" class="btn btn-info btn-block mb-4" name="upload" value="submit">
</form>
<br>

</div>

</center>
</div>
  <!-- Footer -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <?php include('includes/footer.php');?>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>