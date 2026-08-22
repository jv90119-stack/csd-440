<!--
Jose Velazquez
Module 2.2 Assignment
08/22/2026
Purpose:This PHP script generates a table of random numbers using nested loops.
The outer loop creates the rows, while the inner loop creates the columns.
Each cell in the table contains a random number between 1 and 100.
The table is styled with basic CSS for better readability.
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jose Random Number Table</title>

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

    <h1>PHP Random Number Table</h1>

    <p>
        This table uses PHP nested loops to generate random numbers.
    </p>

    <?php

    // Number of rows and columns to display.
    $rows = 5;
    $columns = 5;
    ?>

    <table>

        <thead>
            <tr>
                <th colspan="5">Random Numbers</th>
            </tr>
        </thead>

        <tbody>

            <?php
            // Outer loop controls the number of table rows.
            for ($row = 1; $row <= $rows; $row++) {
            ?>

                <tr>

                    <?php
                    // Inner loop controls the number of cells in each row.
                    for ($column = 1; $column <= $columns; $column++) {

                        // Generate a random number between 1 and 100.
                        $randomNumber = rand(1, 100);
                    ?>

                        <td>
                            <?php echo $randomNumber; ?>
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
        Refresh the page to generate a new set of random numbers.
    </p>

</body>

</html>