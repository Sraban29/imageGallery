<?php
    $archive_msg = "";
    $backup_msg = "";
    //
    include('dbConfig.php');

    if (isset($_POST['delete'])) {
        $get_id="SELECT id FROM mastertab WHERE title='".$_POST['title-list']."'";
        $found_id = mysqli_query($db,$get_id);
        $id = mysqli_fetch_array($found_id);
        $delete_q = "DELETE FROM imgtab WHERE masterid = ".$id['id'];
        if (mysqli_query($db,$delete_q)) {
            $archive_msg .= "<p class='msg'>Delete Successful</p>";
        }else $archive_msg .= "<p class='err'>Delete Error</p>";
    }
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Delete | Image Gallery</title>
    <link rel="stylesheet" href="css/index_style.css">
</head>
<body class="body">
    <a class="btn back-btn" href="index.php">
        <img src="arrow-left2.svg" alt="back Btn" class="back-img">
    </a>
    <header class="header">
        <div class="top-bar"></div>
        <h1 class="heading">Delete your Image Gallery</h1>
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
            <input type="submit" name="delete" value="delete" class="btn" id="search" />
        </div>
        <? echo $archive_msg; ?>
     </form>
 </main>
</body>
</html>
