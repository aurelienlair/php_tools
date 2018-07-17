<?php

function answer(): ?int  {
        return null; //ok
}
 
function answer(): ?int  {
        return 42; // ok
}
#---------------------------------------------------------
$action = $_POST['action'] ?? 'default';

// The above is identical to this if/else statement
if (isset($_POST['action']) && strlen($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = 'default';
}

// Or
if (!empty($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = 'default';
}

#---------------------------------------------------------
# Elvis operator (doesn't check if is set)
$action = $_POST['action'] ?: 'default';

if (!$_POST['action']) {
    $action = $_POST['action'];
} else {
    $action = 'default';
}
#---------------------------------------------------------
# if $_POST['action'] is not null and not false

if (!empty($_POST['action'])) {

}
