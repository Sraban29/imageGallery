<?php
$err = "";
$msg = "";

// Database configuration
$status = 1;
include('dbConfig.php');

////////////////////////////////

if (isset($_POST['submit'])){
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$date = $_POST['date'];
	$q = "INSERT INTO mastertab VALUES('','".mysqli_real_escape_string($db,$title)."','".mysqli_real_escape_string($db,$desc)."','".mysqli_real_escape_string($db,$date)."',".$status.")";
	//query for mastre table
	if(mysqli_query($db, $q)) {
		//$createTab = "CREATE TABLE `drdoproject`.`".$title."` ( `filename` VARCHAR(255) NOT NULL , `image` LONGBLOB NOT NULL , PRIMARY KEY (`filename`));";
			$getId = "SELECT id FROM mastertab WHERE title='".$title."'";
			$res = mysqli_query($db, $getId);

			if($res){
				$id = mysqli_fetch_array($res);
				$id = $id['id'];
			}else echo "Id fetch Error";
			if(!empty(array_filter($_FILES['images']['name']))){
				$count = 1;
				foreach($_FILES['images']['name'] as $key=>$val){
					// File upload path
					$fileName = basename($_FILES['images']['name'][$key]);
					$filePath = $_FILES['images']['tmp_name'][$key];
					$file = addslashes(file_get_contents($filePath));
					$file_ins_q = "INSERT  INTO imgtab VALUES('',".$id.",".$count.",'".$fileName."','".$file."')";

					if(mysqli_query($db,$file_ins_q)){ $msg = $count." file(s) inserted";$count++;}
					else echo "failed ins";
				}
			}else echo "file upload failed";
		//echo "<script>alert('File Uploaded successfully')</script>";
	}
	else $err .= "<p class='err'>Title exists , Enter different one</p>";

}

?>


<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Image Gallery</title>
	<link rel="stylesheet" href="css/index_style.css">
</head>
<body class="body">
	<a class="btn back-btn" href="index.php">
        <img src="arrow-left2.svg" alt="back Btn" class="back-img">
    </a>
	<header class="header">
		<div class="top-bar"></div>
		<h1 class="heading">Create New Image Gallery</h1>
	</header>
	<div class="container">
		<p class="msg" style=""><?php echo $msg; ?></p>
		<form action="" method="post" class="new-upload" enctype="multipart/form-data">
			<input type="text" name="title" placeholder="Title" class="input-text" spellcheck="false" /><br>
			<?php echo $err; ?>
			<textarea name="desc" placeholder="Description" cols="40" rows="10" spellcheck="false"></textarea><br>
			<input type="date" name="date" class="input-text" /><br>
			<input type="file" name="images[]" multiple accept="image/*" style="width: 100%;" /><br>
			<input type="submit" name="submit" value="Upload" class="btn" />
			<input type="reset" name="cancel" value="Cancel" class="btn" />
		</form>
    </div>
</body>
</html>
