<html>

<head>
    <title>CRUD File Handling with Rest APIs</title>

    <style type="text/css">
        body {
            padding: 20px;
        }

        input,
        textarea {
            margin-bottom: 5px;
            margin-left: 50px;
            padding: 2px 3px;
            width: 209px;
        }
    </style>
</head>

<body>
    <?php
    $data = [];
    $db_name = "database.txt";
    $myfile = fopen($db_name, "r") or die("Unable to open file!");
    $file_data = fread($myfile, filesize($db_name));

    if (!empty($file_data)) $data = json_decode($file_data, true);
    fclose($myfile);

    if (isset($_POST['submit'])) {
        $image_name = time().$_FILES['image']['name'];
        move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image_name);
        $data[] = array("title" => $_POST['title'], "image" => $image_name);

        $myfile = fopen($db_name, "w+") or die("Unable to open!");
        if (fwrite($myfile, json_encode($data))) {
            header("location:index.php?m=Record Saved");
        }
    }
    if (isset($_POST['update'])) {
        if ($_FILES['image']['name'] != '') {
            $image_name = time() . $_FILES['image']['name'];
            move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image_name);
        }
        else
        {
            $image_name = $_POST['old_image'];
        }
        $data[$_POST['index']] = array("title" => $_POST['title'], "image" => $image_name);

        $myfile = fopen($db_name, "w+") or die("Unable to open!");
        if (fwrite($myfile, json_encode($data))) {
            header("location:index.php?m=Record Updated");
        }
    }
    if (isset($_GET['delete'])) {
        $index = $_GET['delete'];
        unset($data[$index]);
        $myfile = fopen($db_name, "w+") or die("Unable to open!");
        if (fwrite($myfile, json_encode($data))) {
            header("location:index.php?m=Record Deleted");
        }
    }

    ?>
    <h4>CRUD File Handling with Rest APIs</h4>
    <div><?php if(!empty($_GET['m']) ) echo $_GET['m']; ?></div>
    <?php
    if (isset($_GET['update'])) {
        $index = $_GET['update'];
    ?>
        <b>Update Record</b>

        <form id="post_form" action="" method="post" enctype="multipart/form-data">
            <br>
            Title: <input type="text" name="title" value="<?php echo $data[$index]['title']; ?>" placeholder="Enter your Title of Post" required>
            <br>
            Image: <input type="file" name="image">
            <br>
            <input type="hidden" name="old_image" value="<?php echo $data[$index]['image']; ?>">
            <input type="hidden" name="index" value="<?php echo $index; ?>">
            <img src="images/<?php echo $data[$index]['image']; ?>" height="100" width="80">
            <br>
            <button type="submit" name="update">&nbsp;Update</button>
        </form>
    <?php
    } else {
    ?>
        <b>Create Record</b>

        <form id="post_form" action="" method="post" enctype="multipart/form-data">
            <br>
            Title: <input type="text" name="title" placeholder="Enter your Title of Post" required>
            <br>
            Image: <input type="file" name="image" required>
            <br>
            <button type="submit" name="submit">&nbsp;Save</button>
        </form>
    <?php
    }
    ?>

    <br>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Image Title</th>
            <th>Image</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($data as $index => $row) {
            echo '<tr>
            <td>' . $index . '</td>
            <td>' . $row['title'] . '</td>
            <td><img src=images/' . $row['image'] . ' height=100 width=100></td>
            <td><a href=index.php?update=' . $index . '>Update</a></td>
            <td><a href=index.php?delete=' . $index . '>Delete</a></td>
        </tr>';
        } ?>
    </table>
</body>

</html>