<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UploadController extends Controller
{
    public function index ()
    {
        return view ('upload');
    }
    
    public static function store (){

        If(Input::hasFile('file')){
            
            $file = Input::file('file');

            $destinationPath = public_path(). '/uploads/';
            $filename = $file->getClientOriginalName();

            $file->move($destinationPath, $filename);

            echo  '<p class="strong">File name: ' . $filename . '</p><br>';
            $path = 'uploads/' . $filename;

            echo '<table>';
            echo '<tr>';
            echo '    <th>File name</th>';
            echo '    <th>Album code</th>';
            echo '<th>Track no</th>';
            echo '<th>Track name</th>';
            echo '<th>Duration</th>';
            echo '</tr>';

            $file = file($path);
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
                    //round up ms
                    $substr = substr($col6, 0, -2);
                    if ($substr !== 00) {
                        $col6 = substr($col6, 0, -3);
                        //add 1 to the last character
                        $i = substr($col6, -2);
                        //if last two characters !contain 0, remove last three characters and add 1 to the last character
                        //...else remove last three characters
                        $col6 = substr($col6, 0, -2);
                        $i++;
                        $col6 .= $i;
                    } else {
                        $col6 = substr($col6, 0, -3);
                    }
                    //corrects time format
                    if (strlen($col6) !== 5) {
                        $col6 = substr_replace($col6, '0',3 ,0);
                    }
                    echo '<tr><th>' . $col3 . '</th><th>' . $col3 . '</th><th>' . $col2 . '</th><th>' . $col3 . '</th><th>' . $col6 . '</th></tr>';
                }
            }
            echo '</table>';
        }
    }
}
