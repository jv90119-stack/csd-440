<!--
Jose Velazquez
Module 9.2 Assignment
09/24/2026
Purpose: This program allows the user to search the jose_movies database
table using a movie title. The program uses MySQLi and a prepared
statement to safely retrieve matching movie records.
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jose Movie Search</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 30px;
        }

        .container {
            width: 850px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border: 1px solid #cccccc;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 70%;
            margin: 20px auto;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 10px 20px;
            margin-top: 15px;
            cursor: pointer;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 25px;
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
            padding: 15px;
            margin-top: 20px;
        }

        .error {
            background-color: #f8dddd;
        }

        .success {
            background-color: #e7f5e7;
        }

        .navigation {
            text-align: center;
            margin-top: 25px;
        }

        .navigation a {
            margin: 10px;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Search Movie Records</h1>

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

        // Check for a database connection error.
        if ($connection->connect_error) {

            echo "<div class='message error'>";
            echo "Database connection failed: ";
            echo htmlspecialchars($connection->connect_error);
            echo "</div>";

        } else {
        ?>

            <form action="JoseQuery.php" method="post">

                <label for="searchTitle">
                    Enter a Movie Title:
                </label>

                <input
                    type="text"
                    id="searchTitle"
                    name="searchTitle"
                    placeholder="Example: Interstellar"
                    required>

                <input
                    type="submit"
                    value="Search Movies">

            </form>

            <?php

            /*
             * Only perform the search when the form
             * has been submitted.
             */
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $searchTitle = trim(
                    $_POST["searchTitle"] ?? ""
                );

                if ($searchTitle == "") {

                    echo "<div class='message error'>";
                    echo "Please enter a movie title.";
                    echo "</div>";

                } else {

                    /*
                     * The % wildcard allows partial-title searches.
                     */
                    $searchValue = "%" . $searchTitle . "%";

                    $sql = "
                        SELECT
                            movie_id,
                            title,
                            genre,
                            release_year,
                            rating,
                            date_added
                        FROM jose_movies
                        WHERE title LIKE ?
                        ORDER BY title
                    ";

                    $statement = $connection->prepare($sql);

                    $statement->bind_param(
                        "s",
                        $searchValue
                    );

                    $statement->execute();

                    $result = $statement->get_result();

                    if ($result->num_rows > 0) {
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
                                while ($row = $result->fetch_assoc()) {
                                ?>

                                    <tr>

                                        <td>
                                            <?php
                                            echo htmlspecialchars(
                                                $row["movie_id"]
                                            );
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            echo htmlspecialchars(
                                                $row["title"]
                                            );
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            echo htmlspecialchars(
                                                $row["genre"]
                                            );
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            echo htmlspecialchars(
                                                $row["release_year"]
                                            );
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            echo htmlspecialchars(
                                                $row["rating"]
                                            );
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            echo htmlspecialchars(
                                                $row["date_added"]
                                            );
                                            ?>
                                        </td>

                                    </tr>

                                <?php
                                }
                                ?>

                            </tbody>

                        </table>

                    <?php
                    } else {
                    ?>

                        <div class="message error">

                            No movies were found matching
                            "<?php
                            echo htmlspecialchars($searchTitle);
                            ?>".

                        </div>

            <?php
                    }

                    $statement->close();
                }
            }

            $connection->close();
        }
        ?>

        <div class="navigation">

            <a href="JoseIndex.php">
                Return to Main Menu
            </a>

            <a href="JoseForm.php">
                Add Movie
            </a>

        </div>

    </div>

</body>

</html>