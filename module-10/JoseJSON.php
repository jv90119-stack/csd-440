<!--
Jose Velazquez
Module 10.2 Assignment
09/29/2026
Purpose: This program displays a form containing eight required fields.
The submitted data is sent to JoseJSONResponse.php where it is validated
and converted into JSON format using the json_encode() function.
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jose JSON Form</title>

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

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 9px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            margin-top: 20px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Customer JSON Form</h1>

        <p>
            Please enter all requested information below.
        </p>

        <?php
        ?>

        <form action="JoseJSONResponse.php" method="post">

            <label for="firstName">
                First Name:
            </label>

            <input
                type="text"
                id="firstName"
                name="firstName"
                required>


            <label for="lastName">
                Last Name:
            </label>

            <input
                type="text"
                id="lastName"
                name="lastName"
                required>


            <label for="email">
                Email Address:
            </label>

            <input
                type="email"
                id="email"
                name="email"
                required>


            <label for="age">
                Age:
            </label>

            <input
                type="number"
                id="age"
                name="age"
                min="1"
                max="120"
                required>


            <label for="phone">
                Phone Number:
            </label>

            <input
                type="tel"
                id="phone"
                name="phone"
                required>


            <label for="birthDate">
                Birth Date:
            </label>

            <input
                type="date"
                id="birthDate"
                name="birthDate"
                required>


            <label for="state">
                State:
            </label>

            <select
                id="state"
                name="state"
                required>

                <option value="">
                    Select a State
                </option>

                <option value="Washington">
                    Washington
                </option>

                <option value="California">
                    California
                </option>

                <option value="Massachusetts">
                    Massachusetts
                </option>

                <option value="Texas">
                    Texas
                </option>

                <option value="Arizona">
                    Arizona
                </option>

            </select>


            <label for="favoriteColor">
                Favorite Color:
            </label>

            <input
                type="text"
                id="favoriteColor"
                name="favoriteColor"
                required>


            <input
                type="submit"
                value="Create JSON">

        </form>

    </div>

</body>

</html>