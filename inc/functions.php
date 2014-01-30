<?php

// Convert Hex Color to RGBa
function hex2rgba( $hex, $opacity ) {
    $hex = str_replace("#", "", $hex);

    if(strlen($hex) == 3) {
        $r = hexdec(substr($hex,0,1).substr($hex,0,1));
        $g = hexdec(substr($hex,1,1).substr($hex,1,1));
        $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
    }
    
    $rgb = array($r, $g, $b);
    
    //return implode(",", $rgb); // returns the rgb values separated by commas
    return 'rgba(' . $r . ', ' . $g . ', ' . $b . ', ' . $opacity . ')'; // returns an array with the rgb values
}