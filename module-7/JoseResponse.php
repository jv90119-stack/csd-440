<!--
Jose Velazquez
Module 7.2 Assignment
09/09/2026
Purpose: This program receives data submitted from JoseForm.php.
It verifies that all required fields contain data and
checks that the information is entered correctly.
If the data is valid, the program displays the submitted
information in an HTML table. If errors are found, an
error message is displayed.
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jose Form Response</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f4f4f4;
        }

        .container {
            width: 700px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border: 1px solid #cccccc;
        }

        h1,
        h2 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #dddddd;
            width: 35%;
        }

        .error {
            border: 1px solid black;
            padding: 15px;
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

        // Create an array that will store validation errors.
        $errors = array();

        /*
         * Verify that the page was accessed through
         * a POST form submission.
         */
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Retrieve and trim submitted values.
            $firstName = trim($_POST["firstName"] ?? "");
            $lastName = trim($_POST["lastName"] ?? "");
            $email = trim($_POST["email"] ?? "");
            $age = trim($_POST["age"] ?? "");
            $birthDate = trim($_POST["birthDate"] ?? "");
            $state = trim($_POST["state"] ?? "");
            $contactMethod = trim($_POST["contactMethod"] ?? "");
            $comments = trim($_POST["comments"] ?? "");

            /*
             * Validate First Name.
             */
            if ($firstName == "") {
                $errors[] = "First name is required.";
            } elseif (!ctype_alpha(str_replace(array(" ", "-", "'"), "", $firstName))) {
                $errors[] = "First name contains invalid characters.";
            }

            /*
             * Validate Last Name.
             */
            if ($lastName == "") {
                $errors[] = "Last name is required.";
            } elseif (!ctype_alpha(str_replace(array(" ", "-", "'"), "", $lastName))) {
                $errors[] = "Last name contains invalid characters.";
            }

            /*
             * Validate Email Address.
             */
            if ($email == "") {
                $errors[] = "Email address is required.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Please enter a valid email address.";
            }

            /*
             * Validate Age.
             */
            if ($age == "") {
                $errors[] = "Age is required.";
            } elseif (!filter_var(
                $age,
                FILTER_VALIDATE_INT,
                array(
                    "options" => array(
                        "min_range" => 1,
                        "max_range" => 120
                    )
                )
            )) {
                $errors[] = "Age must be a whole number between 1 and 120.";
            }

            /*
             * Validate Birth Date.
             */
            if ($birthDate == "") {
                $errors[] = "Birth date is required.";
            } else {

                $dateObject = DateTime::createFromFormat(
                    "Y-m-d",
                    $birthDate
                );

                if (
                    !$dateObject ||
                    $dateObject->format("Y-m-d") != $birthDate
                ) {
                    $errors[] = "Please enter a valid birth date.";
                }
            }

            /*
             * Validate State.
             */
            $validStates = array(
                "California",
                "Massachusetts",
                "Nevada",
                "Arizona",
                "Texas"
            );

            if ($state == "") {
                $errors[] = "State is required.";
            } elseif (!in_array($state, $validStates)) {
                $errors[] = "Please select a valid state.";
            }

            /*
             * Validate Contact Method.
             */
            $validContactMethods = array(
                "Email",
                "Phone",
                "Text Message"
            );

            if ($contactMethod == "") {
                $errors[] = "Preferred contact method is required.";
            } elseif (!in_array($contactMethod, $validContactMethods)) {
                $errors[] = "Invalid contact method selected.";
            }

        } else {

            // Display an error if someone opens this page directly.
            $errors[] = "The form was not submitted correctly.";
        }
        ?>


        <?php
        /*
         * If no validation errors were found,
         * display the submitted information.
         */
        if (count($errors) == 0) {
        ?>

            <h1>Form Submitted Successfully</h1>

            <p>
                The information below was successfully received
                and validated.
            </p>

            <table>

                <tr>
                    <th>First Name</th>
                    <td>
                        <?php echo htmlspecialchars($firstName); ?>
                    </td>
                </tr>

                <tr>
                    <th>Last Name</th>
                    <td>
                        <?php echo htmlspecialchars($lastName); ?>
                    </td>
                </tr>

                <tr>
                    <th>Email Address</th>
                    <td>
                        <?php echo htmlspecialchars($email); ?>
                    </td>
                </tr>

                <tr>
                    <th>Age</th>
                    <td>
                        <?php echo htmlspecialchars($age); ?>
                    </td>
                </tr>

                <tr>
                    <th>Birth Date</th>
                    <td>
                        <?php echo htmlspecialchars($birthDate); ?>
                    </td>
                </tr>

                <tr>
                    <th>State</th>
                    <td>
                        <?php echo htmlspecialchars($state); ?>
                    </td>
                </tr>

                <tr>
                    <th>Preferred Contact Method</th>
                    <td>
                        <?php echo htmlspecialchars($contactMethod); ?>
                    </td>
                </tr>

                <tr>
                    <th>Comments</th>
                    <td>
                        <?php
                        if ($comments != "") {
                            echo nl2br(htmlspecialchars($comments));
                        } else {
                            echo "No comments provided.";
                        }
                        ?>
                    </td>
                </tr>

            </table>

        <?php
        /*
         * If validation errors were found,
         * display each error to the user.
         */
        } else {
        ?>

            <h1>Form Submission Error</h1>

            <p>
                The form could not be processed because of the
                following problem(s):
            </p>

            <div class="error">

                <ul>

                    <?php
                    foreach ($errors as $error) {
                    ?>

                        <li>
                            <?php echo htmlspecialchars($error); ?>
                        </li>

                    <?php
                    }
                    ?>

                </ul>

            </div>

        <?php
        }
        ?>

        <a href="JoseForm.php">
            Return to Form
        </a>

    </div>

</body>

</html>