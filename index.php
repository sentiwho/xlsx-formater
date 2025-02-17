<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>Open Server Panel</title>
</head>

<body>
</body>

</html>

<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

// Load the XLSX file
$spreadsheet = IOFactory::load('price.xlsx');
$sheet = $spreadsheet->getActiveSheet();

// Define the desired column indices
$desiredColumns = [1,5,4,6];
// Open the output file in write mode
$outputFile = fopen('output.txt', 'w');

// Iterate over the data rows
foreach ($sheet->getRowIterator(2) as $row) {
    $dataRow = [];
    foreach ($desiredColumns as $columnIndex) {
        $columnLetter = Coordinate::stringFromColumnIndex($columnIndex);
        $cell = $sheet->getCell($columnLetter . $row->getRowIndex());
        $value = $cell->getValue();

        // Check if the cell value is a hyperlink
        if ($cell->getHyperlink() !== null) {
            // Get the hyperlink URL
            $hyperlinkUrl = $cell->getHyperlink()->getUrl();
            print_r(value: $hyperlinkUrl);
            // Replace the hyperlink with the URL
            $dataRow[] = $hyperlinkUrl;
        }

        $dataRow[] = $value;
    }
    fputcsv($outputFile, $dataRow, "\t");
}

// Close the output file
fclose($outputFile);

echo "Conversion completed. Check 'output.txt' file.";
?>