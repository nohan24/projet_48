<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

function isLogged()
{
    if (!isset($_SESSION['user'])) {
        redirect('login');
    }
}
?>