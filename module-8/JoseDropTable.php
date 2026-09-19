<!--
Jose Velazquez
Module 8.2 Assignment
09/18/2026
Purpose: This program connects to the baseball_01 database
and removes the jose_movies table.
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jose Drop Table</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            text-align: center;
        }

        .message {
            width: 70%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #333333;
        }

        .success {
            background-color: #e7f5e7;
        }

        .error {
            background-color: #f8dddd;
        }
    </style>
</head>

<body>

    <h1>Drop Movie Table</h1>

    <?php

    $serverName = "localhost";
    $userName = "student1";
    $password = "pass";
    $databaseName = "baseball_01";

    // Connect to the database.
    $connection = new mysqli(
        $serverName,
        $userName,
        $password,
        $databaseName
    );

    // Check the database connection.
    if ($connection->connect_error) {
    ?>

        <div class="message error">
            <h2>Connection Failed</h2>

            <p>
                <?php echo htmlspecialchars($connection->connect_error); ?>
            </p>
        </div>

    <?php
    } else {

        /*
         * DROP TABLE IF EXISTS prevents an error if the
         * table has already been removed.
         */
        $sql = "DROP TABLE IF EXISTS jose_movies";

        if ($connection->query($sql) === true) {
    ?>

            <div class="message success">
                <h2>Table Removed Successfully</h2>

                <p>
                    The jose_movies table was successfully
                    removed from the baseball_01 database.
                </p>
            </div>

        <?php
        } else {
        ?>

            <div class="message error">
                <h2>Unable to Remove Table</h2>

                <p>
                    <?php echo htmlspecialchars($connection->error); ?>
                </p>
            </div>

    <?php
        }

        // Close the connection.
        $connection->close();
    }
    ?>

</body>

</html>