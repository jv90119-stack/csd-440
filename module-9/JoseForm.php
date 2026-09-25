<!--
Jose Velazquez
Module 9.2 Assignment
09/24/2026
Purpose: This program allows a user to enter information for a new movie.
The submitted information is validated and then inserted into the
jose_movies table using MySQLi and a prepared statement.
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jose Add Movie</title>

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

        h1 {
            text-align: center;
        }

        form {
            width: 80%;
            margin: auto;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 9px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            margin-top: 20px;
            cursor: pointer;
        }

        .message {
            padding: 15px;
            margin: 20px auto;
            width: 80%;
            text-align: center;
        }

        .success {
            background-color: #e7f5e7;
            border: 1px solid #669966;
        }

        .error {
            background-color: #f8dddd;
            border: 1px solid #aa6666;
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

        <h1>Add a Movie Record</h1>

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

        if ($connection->connect_error) {

            echo "<div class='message error'>";
            echo "Database connection failed: ";
            echo htmlspecialchars($connection->connect_error);
            echo "</div>";

        } else {

            /*
             * Process the form only after it has been submitted.
             */
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $title = trim($_POST["title"] ?? "");
                $genre = trim($_POST["genre"] ?? "");
                $releaseYear = trim(
                    $_POST["releaseYear"] ?? ""
                );
                $rating = trim($_POST["rating"] ?? "");
                $dateAdded = trim($_POST["dateAdded"] ?? "");

                $errors = array();

                // Validate title.
                if ($title == "") {
                    $errors[] = "Movie title is required.";
                }

                // Validate genre.
                if ($genre == "") {
                    $errors[] = "Genre is required.";
                }

                // Validate release year.
                if (
                    $releaseYear == "" ||
                    !filter_var(
                        $releaseYear,
                        FILTER_VALIDATE_INT
                    ) ||
                    $releaseYear < 1888 ||
                    $releaseYear > 2100
                ) {
                    $errors[] =
                        "Enter a valid release year.";
                }

                // Validate rating.
                if (
                    $rating == "" ||
                    !is_numeric($rating) ||
                    $rating < 0 ||
                    $rating > 10
                ) {
                    $errors[] =
                        "Rating must be between 0 and 10.";
                }

                // Validate date.
                if ($dateAdded == "") {
                    $errors[] =
                        "Date added is required.";
                }

                /*
                 * If no validation errors exist,
                 * insert the record.
                 */
                if (count($errors) == 0) {

                    $sql = "
                        INSERT INTO jose_movies
                        (
                            title,
                            genre,
                            release_year,
                            rating,
                            date_added
                        )
                        VALUES (?, ?, ?, ?, ?)
                    ";

                    $statement =
                        $connection->prepare($sql);

                    /*
                     * s = string
                     * s = string
                     * i = integer
                     * d = decimal/double
                     * s = string
                     */
                    $statement->bind_param(
                        "ssids",
                        $title,
                        $genre,
                        $releaseYear,
                        $rating,
                        $dateAdded
                    );

                    if ($statement->execute()) {
        ?>

                        <div class="message success">

                            <strong>
                                Movie added successfully!
                            </strong>

                            <br><br>

                            <?php
                            echo htmlspecialchars($title);
                            ?>

                            was added to the database.

                        </div>

                    <?php
                    } else {
                    ?>

                        <div class="message error">

                            Unable to add movie:

                            <?php
                            echo htmlspecialchars(
                                $statement->error
                            );
                            ?>

                        </div>

                    <?php
                    }

                    $statement->close();

                } else {
                    ?>

                    <div class="message error">

                        <strong>
                            Please correct the following:
                        </strong>

                        <ul>

                            <?php
                            foreach ($errors as $error) {
                            ?>

                                <li>
                                    <?php
                                    echo htmlspecialchars($error);
                                    ?>
                                </li>

                            <?php
                            }
                            ?>

                        </ul>

                    </div>

        <?php
                }
            }
        }
        ?>

        <form action="JoseForm.php" method="post">

            <label for="title">
                Movie Title:
            </label>

            <input
                type="text"
                id="title"
                name="title"
                required>


            <label for="genre">
                Genre:
            </label>

            <select
                id="genre"
                name="genre"
                required>

                <option value="">
                    Select a Genre
                </option>

                <option value="Action">
                    Action
                </option>

                <option value="Adventure">
                    Adventure
                </option>

                <option value="Animation">
                    Animation
                </option>

                <option value="Comedy">
                    Comedy
                </option>

                <option value="Crime">
                    Crime
                </option>

                <option value="Drama">
                    Drama
                </option>

                <option value="Horror">
                    Horror
                </option>

                <option value="Science Fiction">
                    Science Fiction
                </option>

            </select>


            <label for="releaseYear">
                Release Year:
            </label>

            <input
                type="number"
                id="releaseYear"
                name="releaseYear"
                min="1888"
                max="2100"
                required>


            <label for="rating">
                Rating:
            </label>

            <input
                type="number"
                id="rating"
                name="rating"
                min="0"
                max="10"
                step="0.1"
                required>


            <label for="dateAdded">
                Date Added:
            </label>

            <input
                type="date"
                id="dateAdded"
                name="dateAdded"
                required>


            <input
                type="submit"
                value="Add Movie">

        </form>

        <?php
        if (
            isset($connection) &&
            !$connection->connect_error
        ) {
            $connection->close();
        }
        ?>

        <div class="navigation">

            <a href="JoseIndex.php">
                Return to Main Menu
            </a>

            <a href="JoseQuery.php">
                Search Movies
            </a>

        </div>

    </div>

</body>

</html>