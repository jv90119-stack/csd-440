<!--
Jose Velazquez
Module 9.2 Assignment
09/24/2026
Purpose: This page serves as the main navigation page for the movie
database project. It provides links to the Module 9 programs and
the Module 8 database programs.
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jose Movie Database</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 30px;
        }

        .container {
            width: 700px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border: 1px solid #cccccc;
        }

        h1,
        h2 {
            text-align: center;
        }

        p {
            text-align: center;
        }

        .menu {
            width: 80%;
            margin: 25px auto;
        }

        .menu a {
            display: block;
            padding: 12px;
            margin: 10px 0;
            background-color: #dddddd;
            border: 1px solid #999999;
            text-decoration: none;
            color: black;
            text-align: center;
        }

        .menu a:hover {
            background-color: #cccccc;
        }
    </style>
</head>

<body>

    <?php
    ?>

    <div class="container">

        <h1>Movie Database</h1>

        <p>
            Select one of the options below to work with the
            jose_movies table in the baseball_01 database.
        </p>

        <h2>Module 9</h2>

        <div class="menu">

            <a href="JoseQuery.php">
                Search Movie Records
            </a>

            <a href="JoseForm.php">
                Add a Movie Record
            </a>

        </div>

        <h2>Module 8 Database Programs</h2>

        <div class="menu">

            <a href="JoseCreateTable.php">
                Create Movie Table
            </a>

            <a href="JosePopulateTable.php">
                Populate Movie Table
            </a>

            <a href="JoseQueryTable.php">
                Display All Movie Records
            </a>

            <a href="JoseDropTable.php">
                Drop Movie Table
            </a>

        </div>

    </div>

</body>

</html>