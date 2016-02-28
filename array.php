<?php

$arr = [
    ['a','b','c'],
    ['d','e','f']
];

/* ---------------------- ARRAY MAP (apply a callback to all the elements inside the sub arrays) ---------------------------- */ 

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

/* ---------------------- CALL_USER_FUNC_ARRAY (apply a callback to all the elements) ---------------------------- */ 

print_r(
    implode(
        ",\n", 
        call_user_func_array('array_merge', $arr)
    )
);

/*
a,
b,
c,
d,
e,
f
*/
