<?php

/*
 * Jose Velazquez
 * Module 11.2 Assignment
 * 10/06/2026
 * Purpose:
 * This program retrieves all movie records from the
 * jose_movies table and generates a PDF report using FPDF.
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/fpdf/fpdf.php";


class MoviePDF extends FPDF
{
    function Header()
    {
        $this->SetFont("Arial", "B", 16);

        $this->Cell(
            0,
            10,
            "Jose Movie Database Report",
            0,
            1,
            "C"
        );

        $this->SetFont("Arial", "", 10);

        $this->Cell(
            0,
            6,
            "Database: baseball_01",
            0,
            1,
            "C"
        );

        $this->Ln(4);
    }


    function Footer()
    {
        $this->SetY(-15);

        $this->SetFont(
            "Arial",
            "I",
            8
        );

        $this->Cell(
            0,
            10,
            "Page " . $this->PageNo(),
            0,
            0,
            "C"
        );
    }


    function TableHeader()
    {
        $this->SetFont(
            "Arial",
            "B",
            8
        );

        $this->Cell(12, 8, "ID", 1, 0, "C");
        $this->Cell(55, 8, "Movie Title", 1, 0, "C");
        $this->Cell(35, 8, "Genre", 1, 0, "C");
        $this->Cell(25, 8, "Year", 1, 0, "C");
        $this->Cell(20, 8, "Rating", 1, 0, "C");
        $this->Cell(35, 8, "Date Added", 1, 1, "C");
    }
}


// Database settings
$serverName = "localhost";
$userName = "student1";
$password = "pass";
$databaseName = "baseball_01";


// Connect to MySQL
$connection = new mysqli(
    $serverName,
    $userName,
    $password,
    $databaseName
);


// Check connection
if ($connection->connect_error) {
    die(
        "Database connection failed: "
        . $connection->connect_error
    );
}


// Query all movie records
$sql = "
    SELECT
        movie_id,
        title,
        genre,
        release_year,
        rating,
        date_added
    FROM jose_movies
    ORDER BY movie_id
";

$result = $connection->query($sql);


if (!$result) {
    die(
        "Database query failed: "
        . $connection->error
    );
}


// Create PDF
$pdf = new MoviePDF();

$pdf->SetTitle(
    "Jose Movie Database Report"
);

$pdf->SetAuthor(
    "Jose Velazquez"
);

$pdf->AddPage();


// General information
$pdf->SetFont(
    "Arial",
    "B",
    13
);

$pdf->Cell(
    0,
    10,
    "About the Movie Collection",
    0,
    1
);


$pdf->SetFont(
    "Arial",
    "",
    10
);

$generalInformation =
    "This movie database provides an organized way to store and "
    . "manage information about films. This report contains all "
    . "records stored in the jose_movies table. Each movie record "
    . "includes a unique ID, title, genre, release year, rating, "
    . "and date added.";

$pdf->MultiCell(
    0,
    6,
    $generalInformation
);

$pdf->Ln(5);


// Table title
$pdf->SetFont(
    "Arial",
    "B",
    11
);

$pdf->Cell(
    0,
    8,
    "Movie Database Records",
    0,
    1
);


// Table header
$pdf->TableHeader();

$pdf->SetFont(
    "Arial",
    "",
    8
);

$recordCount = 0;


// Display each database record
while ($row = $result->fetch_assoc()) {

    // Add another page if necessary
    if ($pdf->GetY() > 260) {

        $pdf->AddPage();

        $pdf->TableHeader();

        $pdf->SetFont(
            "Arial",
            "",
            8
        );
    }


    $pdf->Cell(
        12,
        8,
        $row["movie_id"],
        1,
        0,
        "C"
    );

    $pdf->Cell(
        55,
        8,
        $row["title"],
        1,
        0,
        "L"
    );

    $pdf->Cell(
        35,
        8,
        $row["genre"],
        1,
        0,
        "L"
    );

    $pdf->Cell(
        25,
        8,
        $row["release_year"],
        1,
        0,
        "C"
    );

    $pdf->Cell(
        20,
        8,
        $row["rating"],
        1,
        0,
        "C"
    );

    $pdf->Cell(
        35,
        8,
        $row["date_added"],
        1,
        1,
        "C"
    );

    $recordCount++;
}


// Table footer
$pdf->SetFont(
    "Arial",
    "B",
    9
);

$pdf->Cell(
    147,
    8,
    "Total Movie Records:",
    1,
    0,
    "R"
);

$pdf->Cell(
    35,
    8,
    $recordCount,
    1,
    1,
    "C"
);


$pdf->Ln(8);

$pdf->SetFont(
    "Arial",
    "I",
    9
);

$pdf->MultiCell(
    0,
    6,
    "This report was generated from the jose_movies table "
    . "using PHP, MySQLi, and FPDF."
);


// Close database connection
$connection->close();


// Display PDF in browser
$pdf->Output(
    "I",
    "JoseMovieDatabase.pdf"
);

exit;