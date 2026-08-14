<!--
Jose Velazquez
Module 1.3 Assignment
08/14/2026
Purpose: Demonstrate basic PHP code running inside
a standard HTML document using XAMPP.
-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jose's First PHP Program</title>
</head>

<body>

    <h1>My First PHP Program</h1>
    <p>This page demonstrates that PHP is installed and working correctly with XAMPP.</p>

    <?php

        // PHP Code Snippet #1
        $name = "Jose Velazquez";
        echo "<h2>Welcome, $name!</h2>";
        echo "<p>PHP is working correctly on my XAMPP server.</p>";
    ?>

    <hr>

    <h2>Simple PHP Calculation</h2>

    <?php
        // PHP Code Snippet #2
        $numberOne = 10;
        $numberTwo = 5;
        $total = $numberOne + $numberTwo;

        echo "<p>First Number: $numberOne</p>";
        echo "<p>Second Number: $numberTwo</p>";
        echo "<p><strong>Total: $total</strong></p>";
    ?>

    <hr>

    <p>Program successfully completed.</p>

</body>
</html>