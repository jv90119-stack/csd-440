<!--
Jose Velazquez
Module 8.2 Assignment
09/18/2026
Purpose: This program connects to the baseball_01 database using
MySQLi and creates a table named jose_movies. The table contains
multiple fields and data types that will be used in later assignments.
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jose Create Table</title>

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

    <h1>Create Movie Table</h1>

    <?php

    // Database connection information.
    $serverName = "localhost";
    $userName = "student1";
    $password = "pass";
    $databaseName = "baseball_01";

    // Create a connection to the MySQL database.
    $connection = new mysqli(
        $serverName,
        $userName,
        $password,
        $databaseName
    );

    // Check for a connection error.
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
         * SQL statement used to create the jose_movies table.
         *
         * Fields:
         * movie_id     - Integer primary key
         * title        - Movie title
         * genre        - Movie genre
         * release_year - Year released
         * rating       - Decimal movie rating
         * date_added   - Date added to collection
         */
        $sql = "
            CREATE TABLE jose_movies (
                movie_id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(100) NOT NULL,
                genre VARCHAR(50) NOT NULL,
                release_year INT NOT NULL,
                rating DECIMAL(3,1) NOT NULL,
                date_added DATE NOT NULL
            )
        ";

        // Execute the SQL statement.
        if ($connection->query($sql) === true) {
    ?>

            <div class="message success">
                <h2>Table Created Successfully</h2>
                <p>
                    The <strong>jose_movies</strong> table was
                    successfully created in the baseball_01 database.
                </p>
            </div>

        <?php
        } else {
        ?>

            <div class="message error">
                <h2>Table Creation Failed</h2>
                <p>
                    <?php echo htmlspecialchars($connection->error); ?>
                </p>
            </div>

    <?php
        }

        // Close the database connection.
        $connection->close();
    }
    ?>

</body>

</html>