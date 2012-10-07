<?php

use SessionManager\SessionManager;
use SessionManager\SessionTestHandler;

require_once '../library/bootstrap.php';

new SessionManager(new SessionTestHandler);
session_name('teste');
session_start();

if (!isset($_SESSION['hello'])) {
    $_SESSION['hello'] = 'hello session on!!';
}
    var_dump($_SESSION['hello']);
