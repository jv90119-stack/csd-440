<!--
Jose Velazquez
Module 4.2 Assignment
08/27/2026
Purpose: This program tests six strings to determine whether each one is a palindrome.
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jose Palindrome Test</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            margin: 20px auto;
            width: 80%;
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

    <h1>PHP Palindrome Test</h1>

    <p>
        This program tests six strings to determine whether each one
        is a palindrome.
    </p>

    <?php

    /**
     * Tests whether a string is a palindrome.
     *
     * @param string $text The string to be tested.
     * @return bool Returns true if the string is a palindrome
     *              and false if it is not.
     */
    function isPalindrome($text)
    {
        // Convert the string to lowercase so capitalization
        // does not affect the comparison.
        $lowercaseText = strtolower($text);

        // Reverse the string.
        $reversedText = strrev($lowercaseText);

        // Compare the original string with the reversed string.
        return $lowercaseText == $reversedText;
    }

    // Six strings to test.
    // Three are palindromes and three are not.
    $strings = array(
        "racecar",
        "level",
        "madam",
        "computer",
        "school",
        "programming"
    );
    ?>

    <table>

        <thead>
            <tr>
                <th>Original String</th>
                <th>Reversed String</th>
                <th>Palindrome Result</th>
            </tr>
        </thead>

        <tbody>

            <?php
            // Loop through each string in the array.
            foreach ($strings as $text) {

                // Reverse the current string for display.
                $reversedText = strrev($text);

                // Call the palindrome function to test the string.
                $result = isPalindrome($text);
            ?>

                <tr>

                    <td>
                        <?php echo $text; ?>
                    </td>

                    <td>
                        <?php echo $reversedText; ?>
                    </td>

                    <td>
                        <?php
                        if ($result) {
                            echo "Palindrome";
                        } else {
                            echo "Not a Palindrome";
                        }
                        ?>
                    </td>

                </tr>

            <?php
            }
            ?>

        </tbody>

    </table>

</body>

</html>