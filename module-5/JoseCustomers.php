<!--
Jose Velazquez
Module 5.2 Assignment
09/03/2026
Purpose: This program creates a multidimensional array containing customer information.
Each customer record includes a first name, last name, age, and phone number.
The program displays all customer records and then uses PHP array methods to locate
and display specific customers based on different fields.
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jose Customers</title>

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
            width: 90%;
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

    <h1>Customer Array Program</h1>

    <p>
        This program creates an array of customers and searches the
        customer records using different data fields.
    </p>

    <?php

    // Create a multidimensional array containing 10 customers.
    $customers = array(
        array(
            "firstName" => "Maria",
            "lastName" => "Garcia",
            "age" => 32,
            "phone" => "555-101-1001"
        ),
        array(
            "firstName" => "James",
            "lastName" => "Wilson",
            "age" => 45,
            "phone" => "555-202-2002"
        ),
        array(
            "firstName" => "Sophia",
            "lastName" => "Martinez",
            "age" => 27,
            "phone" => "555-303-3003"
        ),
        array(
            "firstName" => "Michael",
            "lastName" => "Brown",
            "age" => 38,
            "phone" => "555-404-4004"
        ),
        array(
            "firstName" => "Emily",
            "lastName" => "Davis",
            "age" => 21,
            "phone" => "555-505-5005"
        ),
        array(
            "firstName" => "Daniel",
            "lastName" => "Lopez",
            "age" => 50,
            "phone" => "555-606-6006"
        ),
        array(
            "firstName" => "Olivia",
            "lastName" => "Johnson",
            "age" => 29,
            "phone" => "555-707-7007"
        ),
        array(
            "firstName" => "David",
            "lastName" => "Miller",
            "age" => 41,
            "phone" => "555-808-8008"
        ),
        array(
            "firstName" => "Isabella",
            "lastName" => "Anderson",
            "age" => 35,
            "phone" => "555-909-9009"
        ),
        array(
            "firstName" => "Christopher",
            "lastName" => "Thomas",
            "age" => 24,
            "phone" => "555-111-1111"
        )
    );

    /*
     * Function: displayCustomers
     * Purpose:
     * Displays customer records in an HTML table.
     *
     * Parameter:
     * $customerList - Array containing customer records.
     */
    function displayCustomers($customerList)
    {
        foreach ($customerList as $customer) {
    ?>

            <tr>
                <td><?php echo $customer["firstName"]; ?></td>
                <td><?php echo $customer["lastName"]; ?></td>
                <td><?php echo $customer["age"]; ?></td>
                <td><?php echo $customer["phone"]; ?></td>
            </tr>

    <?php
        }
    }
    ?>

    <h2>All Customers</h2>

    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Phone Number</th>
            </tr>
        </thead>

        <tbody>

            <?php
            // Display all customer records.
            displayCustomers($customers);
            ?>

        </tbody>
    </table>


    <?php
    /*
     * Search 1:
     * Use array_filter() to find the customer whose
     * first name is Sophia.
     */
    $firstNameSearch = array_filter(
        $customers,
        function ($customer) {
            return $customer["firstName"] == "Sophia";
        }
    );
    ?>

    <h2>Search by First Name: Sophia</h2>

    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Phone Number</th>
            </tr>
        </thead>

        <tbody>

            <?php displayCustomers($firstNameSearch); ?>

        </tbody>
    </table>


    <?php
    /*
     * Search 2:
     * Use array_filter() to find the customer whose
     * last name is Miller.
     */
    $lastNameSearch = array_filter(
        $customers,
        function ($customer) {
            return $customer["lastName"] == "Miller";
        }
    );
    ?>

    <h2>Search by Last Name: Miller</h2>

    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Phone Number</th>
            </tr>
        </thead>

        <tbody>

            <?php displayCustomers($lastNameSearch); ?>

        </tbody>
    </table>


    <?php
    /*
     * Search 3:
     * Use array_filter() to find customers who are
     * 40 years old or older.
     */
    $ageSearch = array_filter(
        $customers,
        function ($customer) {
            return $customer["age"] >= 40;
        }
    );
    ?>

    <h2>Search by Age: 40 or Older</h2>

    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Phone Number</th>
            </tr>
        </thead>

        <tbody>

            <?php displayCustomers($ageSearch); ?>

        </tbody>
    </table>


    <?php
    /*
     * Search 4:
     * Use array_column() and array_search() to find
     * a customer based on phone number.
     */

    // Create an array containing only the phone numbers.
    $phoneNumbers = array_column($customers, "phone");

    // Find the position of the requested phone number.
    $phoneIndex = array_search("555-707-7007", $phoneNumbers);

    // Place the matching customer into a new array.
    if ($phoneIndex !== false) {
        $phoneSearch = array($customers[$phoneIndex]);
    } else {
        $phoneSearch = array();
    }
    ?>

    <h2>Search by Phone Number: 555-707-7007</h2>

    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Phone Number</th>
            </tr>
        </thead>

        <tbody>

            <?php displayCustomers($phoneSearch); ?>

        </tbody>
    </table>

</body>

</html>