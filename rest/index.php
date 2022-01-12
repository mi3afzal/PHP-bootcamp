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

        <script>
            const formData = new FormData();
            const fileField = document.querySelector('input[type="file"]');

            formData.append('title', 'abc123');
            formData.append('avatar', fileField.files[0]);

            fetch('http://localhost:8080/www/PHP-bootcamp-2022/rest/api/v1/images/create.php', {
                method: 'POST',
                body: formData
            })
            .then((response) => response.json())
            .then((result) => {
                console.log('Success:', result);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        </script>
</body>
</html>