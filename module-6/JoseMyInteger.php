<!--
Jose Velazquez
Module 6.2 Assignment
09/03/2026
Purpose: This program defines a class named JoseMyInteger. The class
stores one integer value and provides methods for determining whether
a number is even, odd, or prime. The class also contains getter and
setter methods. Two objects are created to demonstrate and test all methods.
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jose MyInteger Class</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        h1,
        h2 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
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

        p {
            text-align: center;
        }
    </style>
</head>

<body>

    <h1>PHP MyInteger Class</h1>

    <p>
        This program creates a MyInteger class and tests its methods
        using two different objects.
    </p>

    <?php

    class JoseMyInteger
    {
        // Property used to store the integer value.
        private int $value;

        /**
         * Constructor
         *
         * Sets the initial integer value when an object is created.
         *
         * @param int $value Initial integer value.
         */
        public function __construct(int $value)
        {
            $this->value = $value;
        }

        /**
         * Getter method.
         *
         * @return int Current integer value.
         */
        public function getValue(): int
        {
            return $this->value;
        }

        /**
         * Setter method.
         *
         * @param int $value New integer value.
         */
        public function setValue(int $value): void
        {
            $this->value = $value;
        }

        /**
         * Determines whether the supplied integer is even.
         *
         * @param int $number Number to test.
         * @return bool True if even, otherwise false.
         */
        public function isEven(int $number): bool
        {
            return $number % 2 == 0;
        }

        /**
         * Determines whether the supplied integer is odd.
         *
         * @param int $number Number to test.
         * @return bool True if odd, otherwise false.
         */
        public function isOdd(int $number): bool
        {
            return $number % 2 != 0;
        }

        /**
         * Determines whether the object's stored value is prime.
         *
         * @return bool True if prime, otherwise false.
         */
        public function isPrime(): bool
        {
            // Numbers less than 2 are not prime.
            if ($this->value < 2) {
                return false;
            }

            // Check possible divisors up to the square root.
            for ($i = 2; $i <= sqrt($this->value); $i++) {
                if ($this->value % $i == 0) {
                    return false;
                }
            }

            return true;
        }
    }

    // Create the first instance with a value of 10.
    $integer1 = new JoseMyInteger(10);

    // Create the second instance with a value of 17.
    $integer2 = new JoseMyInteger(17);

    ?>

    <h2>Initial Object Tests</h2>

    <table>
        <thead>
            <tr>
                <th>Object</th>
                <th>Value</th>
                <th>Even?</th>
                <th>Odd?</th>
                <th>Prime?</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td>Object 1</td>

                <td>
                    <?php echo $integer1->getValue(); ?>
                </td>

                <td>
                    <?php
                    echo $integer1->isEven($integer1->getValue())
                        ? "Yes"
                        : "No";
                    ?>
                </td>

                <td>
                    <?php
                    echo $integer1->isOdd($integer1->getValue())
                        ? "Yes"
                        : "No";
                    ?>
                </td>

                <td>
                    <?php
                    echo $integer1->isPrime()
                        ? "Yes"
                        : "No";
                    ?>
                </td>
            </tr>

            <tr>
                <td>Object 2</td>

                <td>
                    <?php echo $integer2->getValue(); ?>
                </td>

                <td>
                    <?php
                    echo $integer2->isEven($integer2->getValue())
                        ? "Yes"
                        : "No";
                    ?>
                </td>

                <td>
                    <?php
                    echo $integer2->isOdd($integer2->getValue())
                        ? "Yes"
                        : "No";
                    ?>
                </td>

                <td>
                    <?php
                    echo $integer2->isPrime()
                        ? "Yes"
                        : "No";
                    ?>
                </td>
            </tr>

        </tbody>
    </table>


    <?php
    /*
     * Test the setter method by changing the values
     * of both objects.
     */

    $integer1->setValue(13);
    $integer2->setValue(20);
    ?>

    <h2>Tests After Using the Setter Method</h2>

    <table>
        <thead>
            <tr>
                <th>Object</th>
                <th>New Value</th>
                <th>Even?</th>
                <th>Odd?</th>
                <th>Prime?</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td>Object 1</td>

                <td>
                    <?php echo $integer1->getValue(); ?>
                </td>

                <td>
                    <?php
                    echo $integer1->isEven($integer1->getValue())
                        ? "Yes"
                        : "No";
                    ?>
                </td>

                <td>
                    <?php
                    echo $integer1->isOdd($integer1->getValue())
                        ? "Yes"
                        : "No";
                    ?>
                </td>

                <td>
                    <?php
                    echo $integer1->isPrime()
                        ? "Yes"
                        : "No";
                    ?>
                </td>
            </tr>

            <tr>
                <td>Object 2</td>

                <td>
                    <?php echo $integer2->getValue(); ?>
                </td>

                <td>
                    <?php
                    echo $integer2->isEven($integer2->getValue())
                        ? "Yes"
                        : "No";
                    ?>
                </td>

                <td>
                    <?php
                    echo $integer2->isOdd($integer2->getValue())
                        ? "Yes"
                        : "No";
                    ?>
                </td>

                <td>
                    <?php
                    echo $integer2->isPrime()
                        ? "Yes"
                        : "No";
                    ?>
                </td>
            </tr>

        </tbody>
    </table>

</body>

</html>