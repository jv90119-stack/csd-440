<!--
Jose Velazquez
Module 11.2 Assignment
10/06/2026
Purpose: This program creates a PDF containing all movie records stored
in the Module 8 database.
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Jose PDF Report</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 40px;
        }

        .container {
            width: 700px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border: 1px solid #cccccc;
            text-align: center;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #dddddd;
            border: 1px solid #888888;
            color: black;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Movie Database PDF Report</h1>

        <p>
            This program creates a PDF containing all movie
            records stored in the Module 8 database.
        </p>

        <a
            class="button"
            href="JoseGeneratePDF.php">

            Generate Movie Database PDF

        </a>

    </div>

</body>

</html>