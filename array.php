<?php

$arr = [
    ['a','b','c'],
    ['d','e','f']
];

/* ARRAY MAP (apply a callback to all the elements) */ 

var_export(
    array_map(
        function($element)
        {
            return implode(",", $element); 
        },
        $arr
    )
);

/*
array (
  0 => 'a,b,c',
  1 => 'd,e,f',
)
*/
