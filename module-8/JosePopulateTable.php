<!--
Jose Velazquez
Module 8.2 Assignment
09/18/2026
Purpose: This program connects to the baseball_01 database
and inserts ten movie records into the jose_movies table.
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jose Populate Table</title>

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

    <h1>Populate Movie Table</h1>

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

    // Check database connection.
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
         * Insert ten movie records into the table.
         */
        $sql = "
            INSERT INTO jose_movies
                (title, genre, release_year, rating, date_added)
            VALUES
                ('The Dark Knight', 'Action', 2008, 9.0, '2026-09-01'),
                ('Interstellar', 'Science Fiction', 2014, 8.7, '2026-09-02'),
                ('Project Hail Mary', 'Science Fiction', 2026, 9.6, '2026-09-03'),
                ('Jurassic Park', 'Adventure', 1993, 8.2, '2026-09-04'),
                ('The Odyssey', 'Adventure', 2026, 9.8, '2026-09-05'),
                ('Avatar', 'Science Fiction', 2009, 8.5, '2026-09-06'),
                ('Toy Story', 'Animation', 1995, 8.3, '2026-09-07'),
                ('Inception', 'Science Fiction', 2010, 8.8, '2026-09-08'),
                ('Sinners', 'Horror', 2025, 8.7, '2026-09-09'),
                ('The Lion King', 'Animation', 1994, 8.5, '2026-09-10')
        ";

        // Execute the insert statement.
        if ($connection->query($sql) === true) {
    ?>

            <div class="message success">
                <h2>Records Added Successfully</h2>
                <p>
                    Ten movie records were successfully added
                    to the jose_movies table.
                </p>
            </div>

        <?php
        } else {
        ?>

            <div class="message error">
                <h2>Unable to Add Records</h2>
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