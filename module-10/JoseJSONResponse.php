<!--
Jose Velazquez
Module 10.2 Assignment
09/29/2026
Purpose: This program receives form data from JoseJSON.php, validates
the submitted values, stores the information in an associative array,
and uses json_encode() to convert the array into JSON format. If the
submitted data is invalid or incomplete, an error message is displayed.
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jose JSON Response</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 30px;
        }

        .container {
            width: 750px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border: 1px solid #cccccc;
        }

        h1 {
            text-align: center;
        }

        .json-output {
            background-color: #eeeeee;
            border: 1px solid #999999;
            padding: 20px;
            margin-top: 20px;
            overflow-x: auto;
        }

        .error {
            background-color: #f8dddd;
            border: 1px solid #aa6666;
            padding: 20px;
            margin-top: 20px;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">

        <?php

        // Create an array for validation errors.
        $errors = array();

        /*
         * Verify that the page was reached through
         * a POST form submission.
         */
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Retrieve submitted form data.
            $firstName = trim($_POST["firstName"] ?? "");
            $lastName = trim($_POST["lastName"] ?? "");
            $email = trim($_POST["email"] ?? "");
            $age = trim($_POST["age"] ?? "");
            $phone = trim($_POST["phone"] ?? "");
            $birthDate = trim($_POST["birthDate"] ?? "");
            $state = trim($_POST["state"] ?? "");
            $favoriteColor = trim($_POST["favoriteColor"] ?? "");

            /*
             * Check that all required fields contain data.
             */
            if ($firstName == "") {
                $errors[] = "First name is required.";
            }

            if ($lastName == "") {
                $errors[] = "Last name is required.";
            }

            if ($email == "") {
                $errors[] = "Email address is required.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Please enter a valid email address.";
            }

            if ($age == "") {
                $errors[] = "Age is required.";
            } elseif (
                filter_var(
                    $age,
                    FILTER_VALIDATE_INT,
                    array(
                        "options" => array(
                            "min_range" => 1,
                            "max_range" => 120
                        )
                    )
                ) === false
            ) {
                $errors[] = "Age must be between 1 and 120.";
            }

            if ($phone == "") {
                $errors[] = "Phone number is required.";
            }

            if ($birthDate == "") {
                $errors[] = "Birth date is required.";
            }

            if ($state == "") {
                $errors[] = "State is required.";
            }

            if ($favoriteColor == "") {
                $errors[] = "Favorite color is required.";
            }

        } else {

            $errors[] = "The form was not submitted correctly.";
        }


        /*
         * If no errors exist, create an associative array
         * and encode it into JSON format.
         */
        if (count($errors) == 0) {

            $customerData = array(
                "firstName" => $firstName,
                "lastName" => $lastName,
                "email" => $email,
                "age" => (int)$age,
                "phone" => $phone,
                "birthDate" => $birthDate,
                "state" => $state,
                "favoriteColor" => $favoriteColor
            );

            /*
             * JSON_PRETTY_PRINT formats the JSON so that
             * the output is easier to read.
             */
            $jsonData = json_encode(
                $customerData,
                JSON_PRETTY_PRINT
            );
        ?>

            <h1>JSON Data Successfully Created</h1>

            <p>
                The submitted form data was successfully validated
                and converted into JSON format.
            </p>

            <div class="json-output">

                <pre><?php
                    echo htmlspecialchars($jsonData);
                ?></pre>

            </div>

        <?php
        } else {
        ?>

            <h1>Form Submission Error</h1>

            <p>
                The information could not be converted into JSON
                because of the following problem(s):
            </p>

            <div class="error">

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
        ?>

        <a href="JoseJSON.php">
            Return to JSON Form
        </a>

    </div>

</body>

</html>