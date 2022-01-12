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
    <h4>CRUD File Handling with Rest APIs</h4>
    <b>Add Data</b>

    <form id="post_form" action="../api/post/create.php" method="post" enctype="multipart/form-data">
        <!-- Select Image: <input type="file" name="file" placeholder="Choose File"> -->
        <br>
        Title: <input type="text" name="title" placeholder="Enter your Title of Post">
        <br>
        Author: <input type="text" name="author" placeholder="Enter your Author Name of Post">
        <br>
        Body: <textarea name="body" rows="3" placeholder="Enter your Body of Post"></textarea>
        <br>
        <br>
        <button type="submit" name="submit">&nbsp;Save</button>
        <button type="reset" name="submit">&nbsp;Back</button>
    </form>

    <br>
</body>

</html>
<script id="source" language="javascript" type="text/javascript">
    $(function() {

        $('#post_form').on('submit', function(e) {

            e.preventDefault();

            $.ajax({
                type: 'json',
                url: '../api/post/create.php',
                data: $('form').serialize(),
                success: function() {
                    alert('form was submitted');
                }
            });

        });

    });
</script>