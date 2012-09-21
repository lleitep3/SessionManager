<?php

switch ($_GET['action']) {
    case 'open':
        session_start();
        list($key, $value) = explode(',', $_GET['item']);
        $_SESSION[$key] = $value;
        break;

    case 'close':
        session_destroy();
        break;
}

var_dump($_SESSION);