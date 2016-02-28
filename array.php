<?php

$arr = [
    ['a','b','c'],
    ['d','e','f']
];

/* ARRAY MAP */ 

var_export(
    array_map(
        function($elements)
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
