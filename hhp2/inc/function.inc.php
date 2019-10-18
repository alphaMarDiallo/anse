<?php

// FONCTION DE REDIRECTION
function redirect($url)
{
    die('<meta http-equiv="refresh" content="0;URL=' . $url . '">');
}