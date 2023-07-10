<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

function isLoggedAsSimple()
{
    if (!isset($_SESSION['user'])) {
        redirect('profil');
    }
}

function isLoggedAsAdmin()
{
    if (!isset($_SESSION['admin'])) {
        redirect('profil');
    }
}
