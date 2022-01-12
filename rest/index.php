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

        <b>Create Record</b>

        <form id="post_form" action="" method="post" enctype="multipart/form-data">
            <br>
            Title: <input type="text" name="title" placeholder="Enter your Title of Post" required>
            <br>
            Image: <input type="file" name="image" required>
            <br>
            <button type="submit" name="submit">&nbsp;Save</button>
        </form>


</body>

</html>