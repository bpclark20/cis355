<?php

/* 
 * This file contains functions that I re-used all over the place.
 */

// Ensures all files have the capability to connect to the database
require 'database.php';

// Ensures all pages maintain session state
#session_start();

// Checks the SQL connection
function checkConnect($mysqli) {
  if ($mysqli->connect_errno) {
      die('Unable to connect to database [' . $mysqli->connect_error . ']');
      exit();
  }
}

/* This function writes the opening HTML tags and includes
 * bootstrap for a consistent UI
 */
function writeHeader(){
    echo "<!DOCTYPE html><html lang='en'>
        <head><meta charset='UTF-8'>
        <title>Assignment #2</title>
        <!-- Latest compiled and minified CSS -->
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>
        </head>";
}

// This function writes the opening table tags used when presenting DB info.
function writeTableOpen(){
    echo "<table class='table table-striped table-bordered table-responsive'>";
}

function writeClosingTags(){
    echo"</div></body></html>";
}

function writeBodyOpen(){
    echo "<body>";
    echo "<div class='container'>";
}