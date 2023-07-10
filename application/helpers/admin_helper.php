<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

function isAdmin($type)
{
    if ($type == 0) {
        return false;
    }
    else return true;
}
?>