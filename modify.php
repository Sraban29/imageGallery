<?php
$masterid =array();
$masterid['id'] = 0;
$img_list = "";
$container = "";
$msg = "";
//code
include('dbConfig.php');

if(isset($_POST['submit'])){
    $img_counter = 0;
    $fetch_id = "SELECT id FROM mastertab WHERE title = '".$_POST['title-list']."'";
    $masterid = mysqli_fetch_array(mysqli_query($db,$fetch_id));
    $fecthImg = "SELECT filename FROM imgtab WHERE masterid =".$masterid['id'];
    $image_list = mysqli_query($db, $fecthImg);
    while ($images = mysqli_fetch_array($image_list)) {
        $img_list .= "<div class='list-item'><p class='img-name'>".$images['filename']."</p><input type='checkbox' name='file_for_op[]' class='input-checkbox' value='".$images['filename']."'/></div>";
        $img_counter++;
    }
    $addimg_container = "<div class='addimg'><p class='msg' style='color:#fff;'>".$msg."</p><form action='' method='post' enctype='multipart/form-data'><input type='hidden' name='hid_title' value='".$masterid['id']."' /><input type='hidden' name='img_count' value='".$img_counter."' /><label for='add-img' class='add-head'>Add image to your gallery</h2><input type='file' name='addimages[]' id='add-img' multiple accept='images/*' style='outline: 2px solid #ddd;margin: 30px 0;' /><br><input type='submit' class='btn' value='Upload' name='addimg' /></form></div>";

    $delete_container = "<section class='list-container'><form action='' method='post'>".$img_list."<div class='form-gruop modify-group'><input type='hidden' name='hid_title'id='hid_title' value='".$masterid['id']."' /><input type='submit' name='modify' value='Delete' class='btn' id='modify-btn'><input type='reset' value='Cancel' class='btn' /></div></form></section>";
    $container = "<div class='form-group'>".$addimg_container.$delete_container."</div>";

}

    if(isset($_POST['modify'])){//to run PHP script on submit
        $count = 0;
        if(!empty($_POST['file_for_op'])){
        // Loop to store and display values of individual checked checkbox.
            foreach($_POST['file_for_op'] as $selected){
                // $get_masterid = "SELECT masterid FROM imgtab WHERE filename='".$selected."'";
                // $id_arr = mysqli_query($db,$get_masterid);
                // $masterid = mysqli_fetch_array($id_arr);
                $del_img = "DELETE FROM imgtab WHERE masterid=".$_POST['hid_title']." AND filename='".$selected."'";
                // echo $del_img;
                if(mysqli_query($db, $del_img)){$count++; $msg = $count." file(s) deleted."; }
                else echo "Failed Delete";
            }
        }
        echo "<script>alert('".$msg."');</script>";
    }
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Modify | Image Gallery</title>
	<link rel="stylesheet" href="css/index_style.css">
</head>
<body class="body">
    <a class="btn back-btn" href="index.php">
<<<<<<< HEAD
        <img src="images/arrow-left2.svg" alt="back Btn" class="back-img">
=======
        <img src="arrow-left2.svg" alt="back Btn" class="back-img">
>>>>>>> cc906173c0ba3894ce1813c0a5baa814e2df11a1
    </a>
	<header class="header">
		<div class="top-bar"></div>
		<h1 class="heading">Modify your Image Gallery</h1>
	</header>
	<main class="container">
     <form action="" method="post" class="modify-form">
        <div class="form-group">
            <select name="title-list" id="title-list" class="input-text input-select">
                <option value="">SELECT TITLE</option>
                <?php
                    // echo "<option value='".$_POST['title-list']."' selected></option>";
                    $fetchTitle = "SELECT title FROM mastertab WHERE status = 1";
                    $res = mysqli_query($db, $fetchTitle);
                    if($res){
                        while($row = mysqli_fetch_array($res)){
                            echo "<option value='".$row['title']."'>".$row['title']."</option>";
                        }
                    }
                ?>
            </select>
            <input type="submit" name="submit" value="Search" class="btn" id="search" />
        </div>
     </form>
     <?php
        if (isset($_POST['addimg'])) {
            if(!empty(array_filter($_FILES['addimages']['name']))){
                $count = ++$_POST['img_count'];
                foreach($_FILES['addimages']['name'] as $key=>$val){
                    // File upload path
                    $fileName = basename($_FILES['addimages']['name'][$key]);
                    $filePath = $_FILES['addimages']['tmp_name'][$key];
                    $file = addslashes(file_get_contents($filePath));
                    $file_ins_q = "INSERT  INTO imgtab VALUES('',".$_POST['hid_title'].",".$count.",'".$fileName."','".$file."')";

                    if(mysqli_query($db,$file_ins_q)){
                        $count++;
                        $msg = ($count-$_POST['img_count'])." file(s) inserted";
                    }
                    else echo "failed insertion";
                }
                echo "<script>alert('".$msg."');</script>";
            }else echo "file upload failed";
        }
     ?>
    <?php echo $container; ?>
    </main>
</body>
</html>
