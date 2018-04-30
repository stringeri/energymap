<?php

$csvData = file_get_contents('http://example.com/yourfile.csv');
$csvDelimiter = ';';

$csvLines = str_getcsv($csvData, "\n");
foreach($csvLines as &$row) 
    $row = str_getcsv($row, $csvDelimiter);

$pairings = [
    // sql field -> csv column
    'firstname' => 0,
    'email' => 2,
    'lastname' => 1
];

$pdo = new PDO(); // Connect to your database

$linesToImport = [];
foreach ($csvLines as $line) {
    $currentLine = [];
    foreach ($pairings as $sqlField => $csvColumn) {
        $currentLine[] = isset($line[$csvColumn]) ? $pdo->quote($line[$csvColumn]) : 'null';
    }
    $linesToImport[] = implode(', ', $currentLine);
}

if (sizeof($linesToImport)) {
    $query = 'INSERT INTO `YourTable` (`' . implode('`, `', array_keys($pairings)) . '`) VALUES (' . implode('), (', $linesToImport) . ')';
    $pdo->exec($query);
}