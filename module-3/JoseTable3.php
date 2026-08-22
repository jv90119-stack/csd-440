<!--
Jose Velazquez
Module 3.2 Assignment
08/22/2026
Purpose: This program creates a two-dimensional HTML table using PHP nested loops.
For each table cell, two random numbers are generated and passed to a function
located in an external PHP file. The returned sum is displayed in the cell.
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jose PHP Table 3</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            margin: 20px auto;
        }

        th,
        td {
            border: 1px solid black;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <h1>PHP Random Number Sum Table</h1>

    <p>
        Each cell displays the sum of two randomly generated numbers.
    </p>

    <?php

    // Load the external PHP function file.
    require_once "JoseFunctions.php";

    // Set the number of rows and columns in the table.
    $rows = 5;
    $columns = 5;
    ?>

    <table>

        <thead>
            <tr>
                <th colspan="5">Sum of Two Random Numbers</th>
            </tr>
        </thead>

        <tbody>

            <?php
            // Outer loop creates the table rows.
            for ($row = 1; $row <= $rows; $row++) {
            ?>

                <tr>

                    <?php
                    // Inner loop creates each table cell.
                    for ($column = 1; $column <= $columns; $column++) {

                        // Generate two random numbers from 1 through 50.
                        $randomNumber1 = rand(1, 50);
                        $randomNumber2 = rand(1, 50);

                        // Pass the numbers to the external function.
                        $sum = addNumbers($randomNumber1, $randomNumber2);
                    ?>

                        <td>
                            <?php echo $sum; ?>
                        </td>

                    <?php
                    } // End inner loop.
                    ?>

                </tr>

            <?php
            } // End outer loop.
            ?>

        </tbody>

    </table>

    <p>
        Refresh the page to generate new random numbers and sums.
    </p>

</body>

</html>