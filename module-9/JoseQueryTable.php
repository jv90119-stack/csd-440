<!--
Jose Velazquez
Module 9.2 Assignment
09/24/2026
Purpose: This program connects to the baseball_01 database and queries
all records from the jose_movies table. The results are displayed in
a formatted HTML table to verify that the table was created and populated.
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jose Query Table</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #dddddd;
        }

        .message {
            text-align: center;
            margin: 20px;
        }
    </style>
</head>

<body>

    <h1>Movie Table Query Results</h1>

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

    // Check for connection problems.
    if ($connection->connect_error) {
        echo "<p class='message'>Database connection failed: "
            . htmlspecialchars($connection->connect_error)
            . "</p>";
    } else {

        /*
         * Select all movie records and order them by
         * the movie_id field.
         */
        $sql = "
            SELECT
                movie_id,
                title,
                genre,
                release_year,
                rating,
                date_added
            FROM jose_movies
            ORDER BY movie_id
        ";

        // Execute the query.
        $result = $connection->query($sql);

        if ($result && $result->num_rows > 0) {
    ?>

            <table>

                <thead>
                    <tr>
                        <th>Movie ID</th>
                        <th>Title</th>
                        <th>Genre</th>
                        <th>Release Year</th>
                        <th>Rating</th>
                        <th>Date Added</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    // Display every returned database record.
                    while ($row = $result->fetch_assoc()) {
                    ?>

                        <tr>

                            <td>
                                <?php
                                echo htmlspecialchars($row["movie_id"]);
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars($row["title"]);
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars($row["genre"]);
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars($row["release_year"]);
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars($row["rating"]);
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars($row["date_added"]);
                                ?>
                            </td>

                        </tr>

                    <?php
                    }
                    ?>

                </tbody>

            </table>

    <?php
        } elseif ($result) {

            echo "<p class='message'>No movie records were found.</p>";

        } else {

            echo "<p class='message'>Query failed: "
                . htmlspecialchars($connection->error)
                . "</p>";
        }

        // Close the database connection.
        $connection->close();
    }
    ?>

</body>

</html>