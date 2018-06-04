<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parser_3</title>
    <style>
        table {
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
            border-collapse: collapse;
            width: 100%;
            /* font-weight: bold; */
        }
        
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 4px;
        }
        
        tr:nth-child(even) {
            background-color: #dddddd;
        }
        </style>
</head>
<body>
<table>
<tr>
<th>File name</th>
<th>Album code</th>
<th>Track no</th>
<th>Track name</th>
<th>Duration</th>
</tr>
<?php
ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$file = file('sample1.txt');
$unmuted = 'Unmuted';
foreach ($file as $row) {
//if row contains word unmuted it means it should be listed
    if ((strpos ($row, $unmuted) !== false) && (substr($row, 0, 1) !== "2")) {
        //replace several whitespaces by one
        $string = preg_replace('/\s+/', ' ', $row);
        //divides row into columns
        list($col1, $col2, $col3, $col4, $col5, $col6, $col7) = explode(' ', $string);
        //removes .L
        $col3 = chop($col3, ".L");
        //removes hours
        $col6 = substr($col6, 3);
        // $col6 = ceil($col6);
        //if last two characters !contain 0, remove last three characters and add 1 to the last character
        //...else remove last three characters
    echo '<tr><th>' . $col3 . '</th><th>' . $col3 . '</th><th>' . $col2 . '</th><th>' . $col3 . '</th><th>' . $col6 . '</th></tr>';
    }
}
?>
</table>

</body>
</html>