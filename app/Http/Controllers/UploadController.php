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
        $name = Input::get('name');
        if ($name !== null) {
            $ext = Input::get('ext');
            $conversion_table = Array('ä'=>'a', 'Ä'=>'A', 'á'=>'a', 'Á'=>'A', 'à'=>'a', 'À'=>'A', 'ã'=>'a', 'Ã'=>'A', 'â'=>'a', 'Â'=>'A', 'č'=>'c', 'Č'=>'C', 'ć'=>'c', 'Ć'=>'C', 'ď'=>'d', 'Ď'=>'D', 'ě'=>'e', 'Ě'=>'E', 'é'=>'e', 'É'=>'E', 'ë'=>'e', 'Ë'=>'E', 'è'=>'e', 'È'=>'E', 'ê'=>'e', 'Ê'=>'E', 'í'=>'i', 'Í'=>'I', 'ï'=>'i', 'Ï'=>'I', 'ì'=>'i', 'Ì'=>'I', 'î'=>'i', 'Î'=>'I', 'ľ'=>'l', 'Ľ'=>'L',
                                 'ĺ'=>'l', 'Ĺ'=>'L', 'ń'=>'n', 'Ń'=>'N', 'ň'=>'n', 'Ň'=>'N', 'ñ'=>'n', 'Ñ'=>'N', 'ó'=>'o', 'Ó'=>'O', 'ö'=>'o', 'Ö'=>'O', 'ô'=>'o', 'Ô'=>'O', 'ò'=>'o', 'Ò'=>'O', 'õ'=>'o', 'Õ'=>'O', 'ő'=>'o', 'Ő'=>'O', 'ř'=>'r', 'Ř'=>'R', 'ŕ'=>'r', 'Ŕ'=>'R', 'š'=>'s', 'Š'=>'S', 'ś'=>'s',
                                 'Ś'=>'S', 'ť'=>'t', 'Ť'=>'T', 'ú'=>'u', 'Ú'=>'U', 'ů'=>'u', 'Ů'=>'U', 'ü'=>'u', 'Ü'=>'U', 'ù'=>'u', 'Ù'=>'U', 'ũ'=>'u', 'Ũ'=>'U', 'û'=>'u', 'Û'=>'U', 'ý'=>'y', 'Ý'=>'Y', 'ž'=>'z', 'Ž'=>'Z', 'ź'=>'z', 'Ź'=>'Z');
            $name = strtr($name, $conversion_table);
            $name = preg_replace('/[^a-zA-Z0-9 ]/', '', $name);
            $name = str_replace(' ', '_', $name);
            echo '<p class="strong">Epizode name: ' . $name . '.' . $ext . '</p>';
            if (Input::hasFile('file')){
            
                $file = Input::file('file');
                $filename = $name . '.' . $ext;
                $destinationPath = public_path(). '/uploads/';
                $file->move($destinationPath, $filename);
                $path = 'uploads/' . $filename;
    
                echo '<table>';
                echo '<tr>';
                echo '<th>File name</th>';
                echo '<th>Album code</th>';
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
  
                        if(preg_match('/^([A-Z]+[0-9]+)_([0-9]+)-(.*)/si', $col3, $matches)) {
                            $album_code = $matches[1];
                            $track_no = $matches[2];
                            $track_name = $matches[3];
                        }else{
                            $album_code = null;
                            $track_no = null;
                            $track_name = $col3;
                        }

                        //removes hours
                        $col6 = substr($col6, 3);
                        //round up ms
                        $substr = substr($col6, 0, -2);
                        //if last two characters !contain 0, remove last three characters and add 1 to the last character
                        if ($substr !== 00) {
                            $col6 = substr($col6, 0, -3);
                            //add 1 to the last character
                            $i = substr($col6, -2);
                            $col6 = substr($col6, 0, -2);
                            $i++;
                            $col6 .= $i;
                        } else {
                            //...else remove last three characters
                            $col6 = substr($col6, 0, -3);
                        }
                        //corrects time format
                        if (strlen($col6) !== 5) {
                            $col6 = substr_replace($col6, '0',3 ,0);
                        }
                        echo '<tr><th>' . $col3 . '</th><th>' . $album_code . '</th><th>' . $track_no . '</th><th>' . $track_name . '</th><th>' . $col6 . '</th></tr>';
                    }
                }
                echo '</table>';
            } else {
                echo '<p class="strong">Please attach the file.</p>';
            }
        } else {
            echo  '<p class="strong">You need to fill in episode name.</p>';
        }    
    }
}
