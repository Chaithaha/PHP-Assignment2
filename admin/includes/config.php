<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
 
header( 'Content-type: text/html; charset=utf-8' ); 