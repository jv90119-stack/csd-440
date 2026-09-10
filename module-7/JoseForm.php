<!--
Jose Velazquez
Module 7.2 Assignment
09/09/2026
Purpose: This program displays an HTML form that collects seven different
pieces of information from the user. The form submits the information to
JoseResponse.php where the data is validated and displayed.
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jose Form</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f4f4f4;
        }

        .container {
            width: 600px;
            margin: auto;
            background-color: white;
            padding: 25px;
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
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        .radio-group {
            margin-top: 5px;
        }

        .radio-group input {
            width: auto;
        }

        .radio-group label {
            display: inline;
            font-weight: normal;
            margin-right: 15px;
        }

        input[type="submit"] {
            margin-top: 20px;
            background-color: #dddddd;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Customer Information Form</h1>

        <p>Please complete all seven fields below.</p>

        <?php
        ?>

        <form action="JoseResponse.php" method="post">

            <!-- Field 1: Text -->
            <label for="firstName">First Name:</label>
            <input
                type="text"
                id="firstName"
                name="firstName"
                required>

            <!-- Field 2: Text -->
            <label for="lastName">Last Name:</label>
            <input
                type="text"
                id="lastName"
                name="lastName"
                required>

            <!-- Field 3: Email -->
            <label for="email">Email Address:</label>
            <input
                type="email"
                id="email"
                name="email"
                required>

            <!-- Field 4: Number -->
            <label for="age">Age:</label>
            <input
                type="number"
                id="age"
                name="age"
                min="1"
                max="120"
                required>

            <!-- Field 5: Date -->
            <label for="birthDate">Birth Date:</label>
            <input
                type="date"
                id="birthDate"
                name="birthDate"
                required>

            <!-- Field 6: Select -->
            <label for="state">State:</label>
            <select id="state" name="state" required>
                <option value="">Select a State</option>
                <option value="California">California</option>
                <option value="Massachusetts">Massachusetts</option>
                <option value="Nevada">Nevada</option>
                <option value="Arizona">Arizona</option>
                <option value="Texas">Texas</option>
            </select>

            <!-- Field 7: Radio -->
            <label>Preferred Contact Method:</label>

            <div class="radio-group">
                <input
                    type="radio"
                    id="contactEmail"
                    name="contactMethod"
                    value="Email"
                    required>

                <label for="contactEmail">Email</label>

                <input
                    type="radio"
                    id="contactPhone"
                    name="contactMethod"
                    value="Phone">

                <label for="contactPhone">Phone</label>

                <input
                    type="radio"
                    id="contactText"
                    name="contactMethod"
                    value="Text Message">

                <label for="contactText">Text Message</label>
            </div>

            <label for="comments">Additional Comments:</label>

            <textarea
                id="comments"
                name="comments"
                rows="5"
                placeholder="Enter any additional comments"></textarea>

            <input type="submit" value="Submit Form">

        </form>

    </div>

</body>

</html>