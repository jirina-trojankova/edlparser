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
    if (strpos ($row, $unmuted) !== false ) {
    echo '<tr><th>' . $row . '</th><th>' . $row . '</th><th>' . $row . '</th><th>' . $row . '</th></tr>';
    }
}
?>
</table>

</body>
</html>